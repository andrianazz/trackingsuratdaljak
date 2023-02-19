<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubBidang extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function surats()
    {
        return $this->hasMany(Surat::class);
    }
}
