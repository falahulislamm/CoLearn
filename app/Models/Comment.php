<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Comment extends Model
{
    use HasFactory;

    protected $table = 'comment';
    protected $fillable = ['id', 'konten', 'created_at', 'updated_at', 'diskusi_id', 'user_id'];
    public $timestamps = false;

    public function diskusi(){
        return $this->belongsTo(Diskusi::class, 'diskusi_id'); //belongsTo -> one to many
    }

    public function pengguna(){
        return $this->belongsTo(Pengguna::class, 'user_id'); //belongsTo -> one to many
    }
}
