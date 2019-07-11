<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class GenreTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $count = DB::table('genres')->count();
        if ($count == 0) {
           $temp = new App\Genre;
           $temp->name = 'Роман';
           $temp->save();
           $temp = new App\Genre;
           $temp->name = 'Поэзия';
           $temp->save();
           $temp = new App\Genre;
           $temp->name = 'Повесть';
           $temp->save();
        }
    }
}
