<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tanaman extends Model
{
    use HasFactory;

    protected $table = 'tanaman_detail'; // Pastikan ini sesuai dengan tabel di database
    protected $primaryKey = 'id_tanaman'; // Sesuaikan dengan nama primary key di database
    public $timestamps = false; // Jika tabel tidak menggunakan created_at dan updated_at

    public function kategori()
    {
        return $this->belongsTo(TanamanKategori::class, 'id_kategori');
    }
}
