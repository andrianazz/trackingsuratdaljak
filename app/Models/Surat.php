<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Surat extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $with = ['bidang', 'jenissurat', 'subbidang'];

    public function bidang()
    {
        return $this->belongsTo(Bidang::class);
    }

    public function jenissurat()
    {
        return $this->belongsTo(JenisSurat::class);
    }

    public function subbidang()
    {
        return $this->belongsTo(SubBidang::class);
    }
}
