<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book_Logs extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'book_id',
        'borrow_date',
        'due_date',
    ];

    // public function user() {
    //     return $this->belongsTo(User::class, 'user_id', 'id');
    // }

    // public function book() {
    //     return $this->belongsTo(survey::class, 'book_id', 'id');
    // }
}
