<?php

namespace App\Models;

use App\Models\Comment;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Quacks extends Model
{
    use HasFactory;
    protected $fillable = ['content', 'image', 'tags','user_id'];



public function user()
{
return $this->belongsTo(User::class);
}

public function comments()
{
return $this->hasMany(Comment::class);

}

}