<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;

    protected $table = 'barang'; // Sesuaikan dengan nama tabel di database
    protected $fillable = [
        'nama',
        'jenis_barang',
        'kode_barang',
        'gambar',
        'deskripsi',
    ];

    public function getData()
    {
        $categories = $this->select('jenis_barang')->distinct()->pluck('jenis_barang');
        $result = collect();

        foreach ($categories as $category) {
            $result->push($this->where('jenis_barang', $category)->inRandomOrder()->firstOrFail());
        }

        return $result;
    }
}
