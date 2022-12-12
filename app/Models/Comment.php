<?php

namespace App\Models;

use App\Models\Quacks;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Comment extends Model
{
    use HasFactory;
    protected $fillable = ['content', 'image', 'tags', 'quack_id', 'user_id'];


    public function user()
    {
        return $this->belongsTo(User::class);
    }



    public function quack()
    {
        return $this->belongsTo
        
        (Quack::class);
    }

}




