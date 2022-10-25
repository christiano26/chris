<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kontak extends Model
{
    use HasFactory;
    protected $fillable = [
        'siswa_id',
        'jenis_kontak_id',
        'deskripsi'
    ];
    protected $table = 'jenis_kontak_siswa';
    public function siswa(){
        return $this->belongsTo('App\Models\Siswa', 'id_siswa');
    }
    public function jenis_kontak(){
        return $this->belongsTo('App\Models\JenisKontak', 'id_jenis');
    }
}
