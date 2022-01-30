<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CreatorTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $type1 = [
            'creator_type' => '音楽',
        ];
        $type2 = [
            'creator_type' => 'イラスト',
        ];
        $type3 = [
            'creator_type' => '動画',
        ];
        $type4 = [
            'creator_type' => '未選択',
        ];

        $types = [$type1, $type2, $type3, $type4];

        DB::table('creator_types')->insert($types);
    }
}
