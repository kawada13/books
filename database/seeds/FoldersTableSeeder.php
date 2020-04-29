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
        $user = DB::table('users')->first(); 

        $genres = ['スポーツ', '恋愛', '推理'];

        foreach ($genres as $genre) {
            DB::table('folders')->insert([
                'genre' => $genre,
                'user_id' => $user->id, 
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }
    }
}
