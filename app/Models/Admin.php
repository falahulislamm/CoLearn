<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Admin extends Model
{
    use HasFactory;

    protected $table = 'admin';
    protected $fillable = ['id', 'nama', 'email', 'telp', 'created_at', 'updated_at'];
    public $timestamps = false;
}
