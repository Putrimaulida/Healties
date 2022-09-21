<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RawatInap extends Model
{
    use HasFactory;

    protected $fillable = [
        'ruang_id', 'pasien_id'
    ];

    public function ruang(){
        return $this->belongsTo(Ruang::class);
    }
    
    public function pasien(){
        return $this->belongsTo(Pasien::class);
    }
}
