<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'author', 'publisher', 'release', 'description', 'image'
    ];

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'book_category', 'book_id', 'category_id');
    }
    public function transaction()
    {
        return $this->hasOne(Transaction::class, 'book_id', 'id');
    }
}
