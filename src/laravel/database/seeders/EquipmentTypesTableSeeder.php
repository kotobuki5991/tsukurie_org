<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;

class EquipmentTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // 音楽関連のレコード creator_type_id = 1
        $type1 = [
            'creator_type_id'          => '1',
            'equipment_type'           => 'guitar',
            'equipment_type_icon_path' => 'equipment_type_icon/guitar_icon.png',
        ];
        $type2 = [
            'creator_type_id'          => '1',
            'equipment_type'           => 'bass',
            'equipment_type_icon_path' => 'equipment_type_icon/bass_icon.png',
        ];
        $type3 = [
            'creator_type_id'          => '1',
            'equipment_type'           => 'piano',
            'equipment_type_icon_path' => 'equipment_type_icon/piano_icon.png',
        ];
        $type4 = [
            'creator_type_id'          => '1',
            'equipment_type'           => 'strings',
            'equipment_type_icon_path' => 'equipment_type_icon/strings_icon.png',
        ];
        $type5 = [
            'creator_type_id'          => '1',
            'equipment_type'           => 'synth',
            'equipment_type_icon_path' => 'equipment_type_icon/synth_icon.png',
        ];
        $type6 = [
            'creator_type_id'          => '1',
            'equipment_type'           => 'drum',
            'equipment_type_icon_path' => 'equipment_type_icon/drum_icon.png',
        ];
        $type7 = [
            'creator_type_id'          => '1',
            'equipment_type'           => 'mix/master',
            'equipment_type_icon_path' => 'equipment_type_icon/mix_master_icon.png',
        ];
        $type8 = [
            'creator_type_id'          => '1',
            'equipment_type'           => 'mic',
            'equipment_type_icon_path' => 'equipment_type_icon/mic_icon.png',
        ];
        $type9 = [
            'creator_type_id'          => '1',
            'equipment_type'           => 'headphones',
            'equipment_type_icon_path' => 'equipment_type_icon/headphones_icon.png',
        ];
        $type10 = [
            'creator_type_id'          => '1',
            'equipment_type'           => 'daw',
            'equipment_type_icon_path' => 'equipment_type_icon/daw_icon.png',
        ];
        $type11 = [
            'creator_type_id'          => '1',
            'equipment_type'           => 'audioI/F',
            'equipment_type_icon_path' => 'equipment_type_icon/audioif_icon.png',
        ];

        // モニターいれる？

        // イラスト関連のレコード creator_type_id = 2

        // 動画関連のレコード creator_type_id = 3



        $types = [$type1, $type2, $type3, $type4, $type5, $type6, $type7, $type8, $type9, $type10, $type11];

        DB::table('equipment_types')->insert($types);
    }
}
