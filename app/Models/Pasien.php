<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pasien extends Model
{
    use HasFactory;

    protected $fillable = [
        'dokter_id', 'nik', 'nama_pasien', 'alamat', 'tanggal_datang', 'keluhan', 'status'
    ];

    public function dokter(){
        return $this->belongsTo(Dokter::class);
    }

    public function pasien(){
        return $this->hasMany(Pasien::class);
    }
}
