<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AddEquipmentTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // 音楽関連のレコード creator_type_id = 1
        $type12 = [
            'creator_type_id'          => '1',
            'equipment_type'           => 'os',
            'equipment_type_icon_path' => 'equipment_type_icon/os_icon.png',
        ];
        $type13 = [
            'creator_type_id'          => '1',
            'equipment_type'           => 'monitor',
            'equipment_type_icon_path' => 'equipment_type_icon/monitor_icon.png',
        ];

        // イラスト関連のレコード creator_type_id = 2
        $type14 = [
            'creator_type_id'          => '2',
            'equipment_type'           => 'illust_soft',
            'equipment_type_icon_path' => 'equipment_type_icon/illust_soft_icon.png',
        ];
        $type15 = [
            'creator_type_id'          => '2',
            'equipment_type'           => 'tablet',
            'equipment_type_icon_path' => 'equipment_type_icon/tablet_icon.png',
        ];
        $type16 = [
            'creator_type_id'          => '2',
            'equipment_type'           => 'os',
            'equipment_type_icon_path' => 'equipment_type_icon/os_icon.png',
        ];
        $type17 = [
            'creator_type_id'          => '2',
            'equipment_type'           => 'monitor',
            'equipment_type_icon_path' => 'equipment_type_icon/monitor_icon.png',
        ];

        // 動画関連のレコード creator_type_id = 3
        $type18 = [
            'creator_type_id'          => '3',
            'equipment_type'           => 'movie_soft',
            'equipment_type_icon_path' => 'equipment_type_icon/movie_soft_icon.png',
        ];
        $type19 = [
            'creator_type_id'          => '3',
            'equipment_type'           => 'illust_soft',
            'equipment_type_icon_path' => 'equipment_type_icon/illust_soft_icon.png',
        ];
        $type20 = [
            'creator_type_id'          => '3',
            'equipment_type'           => 'camera',
            'equipment_type_icon_path' => 'equipment_type_icon/camera_icon.png',
        ];
        $type21 = [
            'creator_type_id'          => '3',
            'equipment_type'           => 'tablet',
            'equipment_type_icon_path' => 'equipment_type_icon/tablet_icon.png',
        ];
        $type22 = [
            'creator_type_id'          => '3',
            'equipment_type'           => 'osF',
            'equipment_type_icon_path' => 'equipment_type_icon/os_icon.png',
        ];
        $type23 = [
            'creator_type_id'          => '3',
            'equipment_type'           => 'monitor',
            'equipment_type_icon_path' => 'equipment_type_icon/monitor_icon.png',
        ];

        $types = [$type12, $type13, $type14, $type15, $type16, $type17, $type18, $type19, $type20, $type21, $type22, $type23];

        DB::table('equipment_types')->insert($types);
    }
}
