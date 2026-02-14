<?php

namespace App\Console\Commands;

use App\Models\CalonAnggota;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class ImportCsvEnhanced extends Command
{
    protected $signature = 'csv:import {file} {--update : Update existing records}';
    protected $description = 'Import calon anggota dari CSV dengan validasi';

    public function handle()
    {
        $filePath = $this->argument('file');

        // Check if file exists
        if (!File::exists($filePath)) {
            $this->error("❌ File tidak ditemukan: {$filePath}");
            return 1;
        }

        $this->info("📊 Memulai import dari: {$filePath}");
        $this->newLine();

        $file = fopen($filePath, 'r');
        
        // Skip header row
        $header = fgetcsv($file);
        $this->info("Header: " . implode(', ', $header));
        $this->newLine();

        $imported = 0;
        $updated = 0;
        $errors = 0;
        $errorDetails = [];

        // Create progress bar
        $totalLines = count(file($filePath)) - 1; // -1 untuk header
        $bar = $this->output->createProgressBar($totalLines);
        $bar->start();

        $lineNumber = 1;

        while (($row = fgetcsv($file)) !== false) {
            $lineNumber++;

            try {
                // Prepare data
                $data = [
                    'nim' => trim($row[0] ?? ''),
                    'nama_lengkap' => trim($row[1] ?? ''),
                    'divisi' => !empty(trim($row[2] ?? '')) ? trim($row[2]) : null,
                    'status' => strtoupper(trim($row[3] ?? ''))
                ];

                // Validate data
                $validator = Validator::make($data, [
                    'nim' => 'required|string|size:10|regex:/^[0-9]+$/',
                    'nama_lengkap' => 'required|string|max:255',
                    'divisi' => 'nullable|string|max:255',
                    'status' => 'required|in:LULUS,TIDAK_LULUS'
                ]);

                if ($validator->fails()) {
                    $errors++;
                    $errorDetails[] = [
                        'line' => $lineNumber,
                        'nim' => $data['nim'],
                        'error' => $validator->errors()->first()
                    ];
                    $bar->advance();
                    continue;
                }

                // Insert or update
                if ($this->option('update')) {
                    $existing = CalonAnggota::where('nim', $data['nim'])->first();
                    if ($existing) {
                        $existing->update($data);
                        $updated++;
                    } else {
                        CalonAnggota::create($data);
                        $imported++;
                    }
                } else {
                    // Skip if exists
                    if (CalonAnggota::where('nim', $data['nim'])->exists()) {
                        $errors++;
                        $errorDetails[] = [
                            'line' => $lineNumber,
                            'nim' => $data['nim'],
                            'error' => 'NIM sudah ada (gunakan --update untuk update)'
                        ];
                    } else {
                        CalonAnggota::create($data);
                        $imported++;
                    }
                }

                $bar->advance();

            } catch (\Exception $e) {
                $errors++;
                $errorDetails[] = [
                    'line' => $lineNumber,
                    'error' => $e->getMessage()
                ];
                $bar->advance();
            }
        }

        fclose($file);
        $bar->finish();

        // Display results
        $this->newLine(2);
        $this->info("╔════════════════════════════════════════╗");
        $this->info("║         HASIL IMPORT CSV               ║");
        $this->info("╚════════════════════════════════════════╝");
        $this->newLine();
        
        $this->line("✅ <fg=green>Data baru diimport:</> {$imported}");
        if ($updated > 0) {
            $this->line("🔄 <fg=yellow>Data diupdate:</> {$updated}");
        }
        $this->line("❌ <fg=red>Error:</> {$errors}");
        $this->newLine();

        // Show errors if any
        if ($errors > 0 && count($errorDetails) > 0) {
            $this->warn("Detail Error:");
            $this->newLine();
            
            foreach (array_slice($errorDetails, 0, 10) as $detail) {
                $line = $detail['line'] ?? '?';
                $nim = $detail['nim'] ?? 'N/A';
                $error = $detail['error'] ?? 'Unknown error';
                $this->line("  Baris {$line} | NIM: {$nim} | Error: {$error}");
            }
            
            if (count($errorDetails) > 10) {
                $remaining = count($errorDetails) - 10;
                $this->newLine();
                $this->line("  ... dan {$remaining} error lainnya");
            }
        }

        $this->newLine();
        return 0;
    }
}