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
            'creatortype' => '音楽',
        ];
        $type2 = [
            'creatortype' => 'イラスト',
        ];
        $type3 = [
            'creatortype' => '動画',
        ];

        $types = [$type1, $type2, $type3];

        DB::table('creator_types')->insert($types);
    }
}
