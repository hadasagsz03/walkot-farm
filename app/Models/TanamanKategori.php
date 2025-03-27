<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TanamanKategori extends Model
{
    protected $table = "tanaman_kategori";
    protected $primaryKey = 'id_kategori';
    protected $fillable = ['nama_kategori'];


    public function tanaman()
    {
        return $this->hasMany(TanamanDetail::class, 'id_kategori');
    }
}
