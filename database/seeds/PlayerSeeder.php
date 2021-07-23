<?php

use Illuminate\Database\Seeder;

class PlayerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('players')->insert([
            [
                'name' => '大迫敬介',
                'affiliation' => 'サンフレッチェ広島',
                'image' => '/images/players/大迫敬介.jpg',
                'age' => '21'
            ],
            [
                'name' => '谷晃生',
                'affiliation' => '湘南ベルマーレ',
                'image' => '/images/players/谷晃生.jpg',
                'age' => '20'
            ],
            [
                'name' => '冨安健洋',
                'affiliation' => 'ボローニャ',
                'image' => '/images/players/冨安健洋.jpg',
                'age' => '22'
            ],
            [
                'name' => '板倉滉',
                'affiliation' => 'フローニンゲン',
                'image' => '/images/players/板倉滉.jpg',
                'age' => '24'
            ],
        ]);
    }
}
