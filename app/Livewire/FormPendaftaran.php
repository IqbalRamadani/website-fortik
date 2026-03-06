<?php

namespace App\Livewire;

use App\Models\Agenda;
use App\Models\Pendaftaran;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithFileUploads;

#[Layout('components.layout')]
class FormPendaftaran extends Component
{
    use WithFileUploads;

    public Agenda $agenda;
    public $nama_lengkap;
    public $email;
    public $no_whatsapp;
    public $instansi;
    public $bukti_file;

    public function submit()
    {
        $rules = [
            'nama_lengkap' => 'required|string|min:3|max:255',
            'email' => 'required|email|max:255',
            'no_whatsapp' => 'required|numeric|digits_between:10,14',
            'instansi' => 'required|string|max:255',
        ];

        // Validasi file strict berdasarkan jenis lomba
        $rules['bukti_file'] = $this->agenda->is_free 
            ? 'required|image|max:2048' 
            : 'required|file|mimes:jpg,jpeg,png,pdf|max:2048';

        $this->validate($rules);

        // Proteksi Logika
        if (Pendaftaran::where('agenda_id', $this->agenda->id)->count() >= $this->agenda->quota) {
            session()->flash('error', 'Maaf, kuota lomba penuh.'); return;
        }
        if (Pendaftaran::where('agenda_id', $this->agenda->id)->where('email', $this->email)->exists()) {
            session()->flash('error', 'Email ini sudah terdaftar.'); return;
        }

        $filePath = $this->bukti_file->store('bukti-pendaftaran', 'public');
        
        // AUTO-APPROVE LOGIC
        $statusAwal = $this->agenda->is_free ? 'approved' : 'pending';

        Pendaftaran::create([
            'agenda_id' => $this->agenda->id,
            'nama_lengkap' => $this->nama_lengkap,
            'email' => $this->email,
            'no_whatsapp' => $this->no_whatsapp,
            'instansi' => $this->instansi,
            'bukti_file' => $filePath,
            'status' => $statusAwal,
        ]);

        if ($statusAwal === 'approved') {
            session()->flash('success', 'Pendaftaran berhasil disetujui! Silakan cek menu "Cek Status" untuk bergabung ke Grup WhatsApp.');
        } else {
            session()->flash('success', 'Pendaftaran terkirim! Data sedang diverifikasi. Pantau menu "Cek Status" berkala.');
        }
        
        $this->reset(['nama_lengkap', 'email', 'no_whatsapp', 'instansi', 'bukti_file']);
    }

    public function render() { 
        return view('livewire.form-pendaftaran'); 
    }
}