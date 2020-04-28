<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class ComicsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (range(1, 3) as $num) {
            DB::table('comics')->insert([
                'folder_id' => 1,
                'user_id' => 1,
                'title' => "サンプル漫画 {$num}",
                'comment' => "面白い {$num}",
                'status' => $num,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }
    }
}
