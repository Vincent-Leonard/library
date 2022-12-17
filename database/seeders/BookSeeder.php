<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Book;
use Carbon\Carbon;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $book = new Book();
        $book->title = 'Divergent';
        $book->author = 'Shakeshpere';
        $book->save();

        $book = new Book();
        $book->title = 'Rich Dad Poor Dad';
        $book->author = 'Mike';
        $book->save();
    }
}
