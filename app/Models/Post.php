<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    // allowing these columns to be interacted
    protected $fillable = ['title', 'description', 'image'];
}
