<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pengguna extends Model
{
    use HasFactory;

    protected $table = 'user';
    protected $fillable = ['id', 'nama', 'nim', 'email', 'telp', 'created_at', 'updated_at'];
    public $timestamps = false;
}
