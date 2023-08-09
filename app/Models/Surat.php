<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Surat extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $with = ['bidang', 'jenisSurat', 'subBidang'];

    public function bidang()
    {
        return $this->belongsTo(Bidang::class);
    }

    public function jenisSurat()
    {
        return $this->belongsTo(JenisSurat::class);
    }

    public function subBidang()
    {
        return $this->belongsTo(SubBidang::class);
    }

    public function verifikasiSurat()
    {
        return $this->hasOne(VerifikasiSurat::class);
    }
}
