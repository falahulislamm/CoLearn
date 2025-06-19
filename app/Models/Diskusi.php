<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Diskusi extends Model
{
    use HasFactory;
    protected $table = 'diskusi';
    protected $fillable = ['id', 'title', 'konten', 'created_at', 'updated_at'];
    public $timestamps = false;
}
