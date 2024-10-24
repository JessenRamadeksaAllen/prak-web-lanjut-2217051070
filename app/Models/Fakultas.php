<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fakultas extends Model
{
    use HasFactory;

    // Tentukan tabel yang digunakan model ini
    protected $table = 'fakultas';

    // Tentukan kolom mana saja yang bisa diisi melalui mass assignment
    protected $fillable = ['nama_fakultas'];

    /**
     * Relasi dengan model User (one-to-many relationship).
     * Satu fakultas bisa memiliki banyak user.
     */
    public function users()
    {
        return $this->hasMany(UserModel::class, 'fakultas_id');
    }
}
