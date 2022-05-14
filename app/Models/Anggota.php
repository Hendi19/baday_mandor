<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Anggota extends Model
{
    protected $table = "anggota";

    protected $primaryKey = "id";

    protected $fillable = [
        'no_anggota','name', 'tgl_lahir', 'jk', 'agama', 'no_hp', 'image', 'alamat'
    ];
}
