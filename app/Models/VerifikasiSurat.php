<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VerifikasiSurat extends Model
{
    use HasFactory;

    protected$fillable = [
        'nomor_surat',
        'nama_wp',
        'npwpd',
        'tgl_selesai_surat',
        'hasil_surat',
        'surat_id'
    ];

    public function surat()
    {
        return $this->belongsTo(Surat::class);
    }
}
