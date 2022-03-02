<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Diagram extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'description', 'content', 'author_id', 'image', 'public', 'created_at', 'updated_at'
    ];
}
