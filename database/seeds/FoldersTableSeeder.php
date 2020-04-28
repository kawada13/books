<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class FoldersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $genres = ['スポーツ', '恋愛', 'コメディ'];

        foreach ($genres as $genre) {
            DB::table('folders')->insert([
                'genre' => $genre,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }
    }
}
