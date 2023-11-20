<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Buku extends Model
{
    use HasFactory, Sluggable;

    protected $table = 'buku';

    protected $fillable = [
        'nama', 
        'slug',
        'pengarang', 
        'penerbit', 
        'halaman',
        'deskripsi',
        'tahun_terbit', 
        'jumlah_buku', 
        'gambar', 
        'kategori',
        'genre',
    ];


    public function user()
    {
        return $this->hasOne(User::class, 'buku_id');
    }
    

    public function rentlogs()
    {
        return $this->hasMany(RentLogs::class, 'buku_id');
    }



    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'nama'
            ]
        ];
    }

}