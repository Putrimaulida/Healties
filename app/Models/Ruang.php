<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ruang extends Model
{
    use HasFactory;

    protected $fillable = [
        'ruang', 'status'
    ];

    public function rawat_inap(){
        return $this->hasMany(RawatInap::class);
    }
}
