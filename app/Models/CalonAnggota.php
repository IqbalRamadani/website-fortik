<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CalonAnggota extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'calon_anggota';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'nim';

    /**
     * Indicates if the IDs are auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = false;

    /**
     * The data type of the primary key ID.
     *
     * @var string
     */
    protected $keyType = 'string';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nim',
        'nama_lengkap',
        'divisi',
        'status'
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'status' => 'string',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [];

    /**
     * Scope untuk filter status LULUS
     */
    public function scopeLulus($query)
    {
        return $query->where('status', 'LULUS');
    }

    /**
     * Scope untuk filter status TIDAK_LULUS
     */
    public function scopeTidakLulus($query)
    {
        return $query->where('status', 'TIDAK_LULUS');
    }

    /**
     * Accessor untuk mendapatkan status dalam format yang lebih readable
     */
    public function getStatusLabelAttribute()
    {
        return $this->status === 'LULUS' ? 'Lulus' : 'Tidak Lulus';
    }

    /**
     * Check apakah calon anggota lulus
     */
    public function isLulus(): bool
    {
        return $this->status === 'LULUS';
    }

    /**
     * Get divisi dengan fallback
     */
    public function getDivisiNameAttribute()
    {
        return $this->divisi ?? 'Belum ditentukan';
    }
}
