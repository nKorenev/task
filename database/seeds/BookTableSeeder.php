<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class BookTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $count = DB::table('books')->count();
        if ($count == 0) {
            $books = [[
                'title' => 'Война и мир',
                'author' => 'Толстой',
                'year' => 1869,
            ], [
                'title' => 'Идиот',
                'author' => 'Достоевский',
                'year' => 1869,
            ], [
                'title' => 'Айвенго',
                'author' => 'Скотт',
                'year' => 1858,
            ]];
            foreach ($books as $book) {
                $new = App\Book::create($book);
                $addGenres = App\Book::find($new->id);
                $addGenres->genres()->sync([1]);
            }
        }
    }
}
