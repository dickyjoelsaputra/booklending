<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;
    protected $fillable = [
        'confirmed', 'user_id', 'book_id', 'rent_date', 'return_date'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function book()
    {
        // return $this->belongsTo(Book::class, 'book_id', 'id');
        return $this->belongsTo(Book::class);
    }
}
