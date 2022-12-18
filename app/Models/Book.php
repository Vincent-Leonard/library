<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'author',
        'synopsis',
        'is_borrowed'
    ];

    public function users() {
        return $this->belongsToMany(User::class, 'logs', 'book_id', 'user_id')->withPivot('borrow_date', 'due_date')->withTimeStamps();
    }
}
