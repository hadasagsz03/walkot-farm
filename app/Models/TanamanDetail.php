<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TanamanDetail extends Model
{
    protected $table = "tanaman_detail";
    protected $primaryKey = 'id_tanaman';
    protected $fillable = ['id_kategori', 'nama_tanaman_indonesia', 'nama_tanaman_latin', 'keterangan', 'manfaat', 'gambar', 'qrcode'];
    public function kategori()
    {
        return $this->belongsTo(TanamanKategori::class, 'id_kategori');
    }
    public $timestamps = false;
}
