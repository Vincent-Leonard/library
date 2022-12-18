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
        return $this->belongsToMany(User::class, 'logs', 'user_id', 'book_id')->withPivot('borrow_date', 'due_date')->withTimeStamps();
    }
}
