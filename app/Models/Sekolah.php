<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sekolah extends Model
{
    //
    protected $table = "sekolah";

    protected $fillable = [
        'nama',
        'kod',
        'jenis',
        'alamat'
    ];

    public function users()
    {
        return $this->hasMany(User::class);
    }
}
