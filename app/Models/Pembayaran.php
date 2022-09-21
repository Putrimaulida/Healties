<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    use HasFactory;

    protected $fillable = [
        'kode_pembayaran', 'user_id', 'pasien_id', 'total', 'status'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function pasien(){
        return $this->belongsTo(Pasien::class);
    }
}
