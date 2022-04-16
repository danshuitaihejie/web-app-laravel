<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Diagram extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'description', 'content', 'author_id', 'image', 'public', 'created_at', 'updated_at'
    ];

    public function author()
    {
        return $this->belongsTo(User::class, 'author_id');
    }

    public static function publicDiagrams()
    {
        return Diagram::where('public', 1)->orderBy('updated_at', 'desc');
    }

    public static function myDiagrams()
    {
        return Diagram::where('author_id', auth()->user()->id)->orderBy('updated_at', 'desc');
    }
}
