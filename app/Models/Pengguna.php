<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pengguna extends Model
{
    use HasFactory;

    protected $table = 'user';
    protected $fillable = ['id', 'nama', 'nim', 'email', 'telp', 'created_at', 'updated_at', 'jurusan_id', 'peminatan_id'];
    public $timestamps = false;

    public function jurusan(){
        return $this->belongsTo(Jurusan::class, 'jurusan_id'); //belongsTo -> one to many
    }

    public function peminatan(){
        return $this->belongsTo(Peminatan::class, 'peminatan_id'); //belongsTo -> one to many
    }

}
