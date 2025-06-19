<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Peminatan extends Model
{
    use HasFactory;
    protected $table = 'peminatan';
    protected $fillable = ['id', 'nama', 'jurusan_id'];
    public $timestamps = false;
    public function jurusan(){
        return $this->belongsTo(Jurusan::class, 'jurusan_id');
    }
}