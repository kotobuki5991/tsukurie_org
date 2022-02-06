<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EquipmentMakersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // ギター用のレコード equipment_type_id = 1
        $guitar_maker1 = ['equipment_type_id' => '1', 'equipment_maker' => 'ここにメーカー',];
        $guitar_maker2 = ['equipment_type_id' => '1', 'equipment_maker' => 'ここにメーカー',];
        $guitar_maker3 = ['equipment_type_id' => '1', 'equipment_maker' => 'ここにメーカー',];
        $guitar_maker4 = ['equipment_type_id' => '1', 'equipment_maker' => 'ここにメーカー',];
        $guitar_maker5 = ['equipment_type_id' => '1', 'equipment_maker' => 'ここにメーカー',];
        $guitar_maker6 = ['equipment_type_id' => '1', 'equipment_maker' => 'ここにメーカー',];
        $guitar_maker7 = ['equipment_type_id' => '1', 'equipment_maker' => 'ここにメーカー',];
        // ベース用のレコード equipment_type_id = 2
        $bass_maker1 = ['equipment_type_id' => '2', 'equipment_maker' => 'ここにメーカー',];
        $bass_maker2 = ['equipment_type_id' => '2', 'equipment_maker' => 'ここにメーカー',];
        $bass_maker3 = ['equipment_type_id' => '2', 'equipment_maker' => 'ここにメーカー',];
        $bass_maker4 = ['equipment_type_id' => '2', 'equipment_maker' => 'ここにメーカー',];
        $bass_maker5 = ['equipment_type_id' => '2', 'equipment_maker' => 'ここにメーカー',];
        $bass_maker6 = ['equipment_type_id' => '2', 'equipment_maker' => 'ここにメーカー',];
        $bass_maker7 = ['equipment_type_id' => '2', 'equipment_maker' => 'ここにメーカー',];
        // ピアノ用のレコード equipment_type_id = 3
        $piano_maker1 = ['equipment_type_id' => '3', 'equipment_maker' => 'ここにメーカー',];
        $piano_maker2 = ['equipment_type_id' => '3', 'equipment_maker' => 'ここにメーカー',];
        $piano_maker3 = ['equipment_type_id' => '3', 'equipment_maker' => 'ここにメーカー',];
        $piano_maker4 = ['equipment_type_id' => '3', 'equipment_maker' => 'ここにメーカー',];
        $piano_maker5 = ['equipment_type_id' => '3', 'equipment_maker' => 'ここにメーカー',];
        $piano_maker6 = ['equipment_type_id' => '3', 'equipment_maker' => 'ここにメーカー',];
        $piano_maker7 = ['equipment_type_id' => '3', 'equipment_maker' => 'ここにメーカー',];
        // ストリングス用のレコード equipment_type_id = 4
        $strings_maker1 = ['equipment_type_id' => '4', 'equipment_maker' => 'ここにメーカー',];
        $strings_maker2 = ['equipment_type_id' => '4', 'equipment_maker' => 'ここにメーカー',];
        $strings_maker3 = ['equipment_type_id' => '4', 'equipment_maker' => 'ここにメーカー',];
        $strings_maker4 = ['equipment_type_id' => '4', 'equipment_maker' => 'ここにメーカー',];
        $strings_maker5 = ['equipment_type_id' => '4', 'equipment_maker' => 'ここにメーカー',];
        $strings_maker6 = ['equipment_type_id' => '4', 'equipment_maker' => 'ここにメーカー',];
        $strings_maker7 = ['equipment_type_id' => '4', 'equipment_maker' => 'ここにメーカー',];
        // シンセ用のレコード equipment_type_id = 5
        $synth_maker1 = ['equipment_type_id' => '5', 'equipment_maker' => 'ここにメーカー',];
        $synth_maker2 = ['equipment_type_id' => '5', 'equipment_maker' => 'ここにメーカー',];
        $synth_maker3 = ['equipment_type_id' => '5', 'equipment_maker' => 'ここにメーカー',];
        $synth_maker4 = ['equipment_type_id' => '5', 'equipment_maker' => 'ここにメーカー',];
        $synth_maker5 = ['equipment_type_id' => '5', 'equipment_maker' => 'ここにメーカー',];
        $synth_maker6 = ['equipment_type_id' => '5', 'equipment_maker' => 'ここにメーカー',];
        $synth_maker7 = ['equipment_type_id' => '5', 'equipment_maker' => 'ここにメーカー',];
        // ドラム用のレコード equipment_type_id = 6
        $drum_maker1 = ['equipment_type_id' => '6', 'equipment_maker' => 'ここにメーカー',];
        $drum_maker2 = ['equipment_type_id' => '6', 'equipment_maker' => 'ここにメーカー',];
        $drum_maker3 = ['equipment_type_id' => '6', 'equipment_maker' => 'ここにメーカー',];
        $drum_maker4 = ['equipment_type_id' => '6', 'equipment_maker' => 'ここにメーカー',];
        $drum_maker5 = ['equipment_type_id' => '6', 'equipment_maker' => 'ここにメーカー',];
        $drum_maker6 = ['equipment_type_id' => '6', 'equipment_maker' => 'ここにメーカー',];
        $drum_maker7 = ['equipment_type_id' => '6', 'equipment_maker' => 'ここにメーカー',];
        // ミックス・マスター用のレコード equipment_type_id = 7
        $mix_master_maker1 = ['equipment_type_id' => '7', 'equipment_maker' => 'ここにメーカー',];
        $mix_master_maker2 = ['equipment_type_id' => '7', 'equipment_maker' => 'ここにメーカー',];
        $mix_master_maker3 = ['equipment_type_id' => '7', 'equipment_maker' => 'ここにメーカー',];
        $mix_master_maker4 = ['equipment_type_id' => '7', 'equipment_maker' => 'ここにメーカー',];
        $mix_master_maker5 = ['equipment_type_id' => '7', 'equipment_maker' => 'ここにメーカー',];
        $mix_master_maker6 = ['equipment_type_id' => '7', 'equipment_maker' => 'ここにメーカー',];
        $mix_master_maker7 = ['equipment_type_id' => '7', 'equipment_maker' => 'ここにメーカー',];
        // マイク用のレコード equipment_type_id = 8
        $mic_maker1 = ['equipment_type_id' => '8', 'equipment_maker' => 'ここにメーカー',];
        $mic_maker2 = ['equipment_type_id' => '8', 'equipment_maker' => 'ここにメーカー',];
        $mic_maker3 = ['equipment_type_id' => '8', 'equipment_maker' => 'ここにメーカー',];
        $mic_maker4 = ['equipment_type_id' => '8', 'equipment_maker' => 'ここにメーカー',];
        $mic_maker5 = ['equipment_type_id' => '8', 'equipment_maker' => 'ここにメーカー',];
        $mic_maker6 = ['equipment_type_id' => '8', 'equipment_maker' => 'ここにメーカー',];
        $mic_maker7 = ['equipment_type_id' => '8', 'equipment_maker' => 'ここにメーカー',];
        // ヘッドフォン用のレコード equipment_type_id = 9
        $headphones_maker1 = ['equipment_type_id' => '9', 'equipment_maker' => 'ここにメーカー',];
        $headphones_maker2 = ['equipment_type_id' => '9', 'equipment_maker' => 'ここにメーカー',];
        $headphones_maker3 = ['equipment_type_id' => '9', 'equipment_maker' => 'ここにメーカー',];
        $headphones_maker4 = ['equipment_type_id' => '9', 'equipment_maker' => 'ここにメーカー',];
        $headphones_maker5 = ['equipment_type_id' => '9', 'equipment_maker' => 'ここにメーカー',];
        $headphones_maker6 = ['equipment_type_id' => '9', 'equipment_maker' => 'ここにメーカー',];
        $headphones_maker7 = ['equipment_type_id' => '9', 'equipment_maker' => 'ここにメーカー',];
        // DAW用のレコード equipment_type_id = 10
        $daw_maker1 = ['equipment_type_id' => '10', 'equipment_maker' => 'ここにメーカー',];
        $daw_maker2 = ['equipment_type_id' => '10', 'equipment_maker' => 'ここにメーカー',];
        $daw_maker3 = ['equipment_type_id' => '10', 'equipment_maker' => 'ここにメーカー',];
        $daw_maker4 = ['equipment_type_id' => '10', 'equipment_maker' => 'ここにメーカー',];
        $daw_maker5 = ['equipment_type_id' => '10', 'equipment_maker' => 'ここにメーカー',];
        $daw_maker6 = ['equipment_type_id' => '10', 'equipment_maker' => 'ここにメーカー',];
        $daw_maker7 = ['equipment_type_id' => '10', 'equipment_maker' => 'ここにメーカー',];
        // オーディオIF用のレコード equipment_type_id = 11
        $audio_if_maker1 = ['equipment_type_id' => '11', 'equipment_maker' => 'ここにメーカー',];
        $audio_if_maker2 = ['equipment_type_id' => '11', 'equipment_maker' => 'ここにメーカー',];
        $audio_if_maker3 = ['equipment_type_id' => '11', 'equipment_maker' => 'ここにメーカー',];
        $audio_if_maker4 = ['equipment_type_id' => '11', 'equipment_maker' => 'ここにメーカー',];
        $audio_if_maker5 = ['equipment_type_id' => '11', 'equipment_maker' => 'ここにメーカー',];
        $audio_if_maker6 = ['equipment_type_id' => '11', 'equipment_maker' => 'ここにメーカー',];
        $audio_if_maker7 = ['equipment_type_id' => '11', 'equipment_maker' => 'ここにメーカー',];
        // OS用のレコード equipment_type_id = 12
        $os_maker_music_1 = ['equipment_type_id' => '12', 'equipment_maker' => 'ここにメーカー',];
        $os_maker_music_2 = ['equipment_type_id' => '12', 'equipment_maker' => 'ここにメーカー',];
        // モニター用のレコード equipment_type_id = 13
        $monitor_maker_music_1 = ['equipment_type_id' => '13', 'equipment_maker' => 'ここにメーカー',];
        $monitor_maker_music_2 = ['equipment_type_id' => '13', 'equipment_maker' => 'ここにメーカー',];
        $monitor_maker_music_3 = ['equipment_type_id' => '13', 'equipment_maker' => 'ここにメーカー',];
        $monitor_maker_music_4 = ['equipment_type_id' => '13', 'equipment_maker' => 'ここにメーカー',];
        $monitor_maker_music_5 = ['equipment_type_id' => '13', 'equipment_maker' => 'ここにメーカー',];
        $monitor_maker_music_6 = ['equipment_type_id' => '13', 'equipment_maker' => 'ここにメーカー',];
        $monitor_maker_music_7 = ['equipment_type_id' => '13', 'equipment_maker' => 'ここにメーカー',];

        // ここからイラスト用

        // イラストソフト用のレコード equipment_type_id = 14
        $illust_soft_maker_illust_1 = ['equipment_type_id' => '14', 'equipment_maker' => 'ここにメーカー',];
        $illust_soft_maker_illust_2 = ['equipment_type_id' => '14', 'equipment_maker' => 'ここにメーカー',];
        $illust_soft_maker_illust_3 = ['equipment_type_id' => '14', 'equipment_maker' => 'ここにメーカー',];
        $illust_soft_maker_illust_4 = ['equipment_type_id' => '14', 'equipment_maker' => 'ここにメーカー',];
        $illust_soft_maker_illust_5 = ['equipment_type_id' => '14', 'equipment_maker' => 'ここにメーカー',];
        $illust_soft_maker_illust_6 = ['equipment_type_id' => '14', 'equipment_maker' => 'ここにメーカー',];
        $illust_soft_maker_illust_7 = ['equipment_type_id' => '14', 'equipment_maker' => 'ここにメーカー',];
        // タブレット用のレコード equipment_type_id = 15
        $tablet_maker_illust_1 = ['equipment_type_id' => '15', 'equipment_maker' => 'ここにメーカー',];
        $tablet_maker_illust_2 = ['equipment_type_id' => '15', 'equipment_maker' => 'ここにメーカー',];
        $tablet_maker_illust_3 = ['equipment_type_id' => '15', 'equipment_maker' => 'ここにメーカー',];
        $tablet_maker_illust_4 = ['equipment_type_id' => '15', 'equipment_maker' => 'ここにメーカー',];
        $tablet_maker_illust_5 = ['equipment_type_id' => '15', 'equipment_maker' => 'ここにメーカー',];
        $tablet_maker_illust_6 = ['equipment_type_id' => '15', 'equipment_maker' => 'ここにメーカー',];
        $tablet_maker_illust_7 = ['equipment_type_id' => '15', 'equipment_maker' => 'ここにメーカー',];
        // OS用のレコード equipment_type_id = 16
        $os_maker_illust_1 = ['equipment_type_id' => '16', 'equipment_maker' => 'ここにメーカー',];
        $os_maker_illust_2 = ['equipment_type_id' => '16', 'equipment_maker' => 'ここにメーカー',];
        // モニター用のレコード equipment_type_id = 17
        $monitor_maker_illust_1 = ['equipment_type_id' => '17', 'equipment_maker' => 'ここにメーカー',];
        $monitor_maker_illust_2 = ['equipment_type_id' => '17', 'equipment_maker' => 'ここにメーカー',];
        $monitor_maker_illust_3 = ['equipment_type_id' => '17', 'equipment_maker' => 'ここにメーカー',];
        $monitor_maker_illust_4 = ['equipment_type_id' => '17', 'equipment_maker' => 'ここにメーカー',];
        $monitor_maker_illust_5 = ['equipment_type_id' => '17', 'equipment_maker' => 'ここにメーカー',];
        $monitor_maker_illust_6 = ['equipment_type_id' => '17', 'equipment_maker' => 'ここにメーカー',];
        $monitor_maker_illust_7 = ['equipment_type_id' => '17', 'equipment_maker' => 'ここにメーカー',];

        // ここから動画用

        // 動画ソフト用のレコード equipment_type_id = 18
        $movie_soft_maker_movie_1 = ['equipment_type_id' => '18', 'equipment_maker' => 'ここにメーカー',];
        $movie_soft_maker_movie_2 = ['equipment_type_id' => '18', 'equipment_maker' => 'ここにメーカー',];
        $movie_soft_maker_movie_3 = ['equipment_type_id' => '18', 'equipment_maker' => 'ここにメーカー',];
        $movie_soft_maker_movie_4 = ['equipment_type_id' => '18', 'equipment_maker' => 'ここにメーカー',];
        $movie_soft_maker_movie_5 = ['equipment_type_id' => '18', 'equipment_maker' => 'ここにメーカー',];
        $movie_soft_maker_movie_6 = ['equipment_type_id' => '18', 'equipment_maker' => 'ここにメーカー',];
        $movie_soft_maker_movie_7 = ['equipment_type_id' => '18', 'equipment_maker' => 'ここにメーカー',];
        // イラストソフト用のレコード equipment_type_id = 19
        $illust_soft_maker_movie_1 = ['equipment_type_id' => '19', 'equipment_maker' => 'ここにメーカー',];
        $illust_soft_maker_movie_2 = ['equipment_type_id' => '19', 'equipment_maker' => 'ここにメーカー',];
        $illust_soft_maker_movie_3 = ['equipment_type_id' => '19', 'equipment_maker' => 'ここにメーカー',];
        $illust_soft_maker_movie_4 = ['equipment_type_id' => '19', 'equipment_maker' => 'ここにメーカー',];
        $illust_soft_maker_movie_5 = ['equipment_type_id' => '19', 'equipment_maker' => 'ここにメーカー',];
        $illust_soft_maker_movie_6 = ['equipment_type_id' => '19', 'equipment_maker' => 'ここにメーカー',];
        $illust_soft_maker_movie_7 = ['equipment_type_id' => '19', 'equipment_maker' => 'ここにメーカー',];
        // カメラ用のレコード equipment_type_id = 20
        $illust_soft_maker_movie_1 = ['equipment_type_id' => '20', 'equipment_maker' => 'ここにメーカー',];
        $illust_soft_maker_movie_2 = ['equipment_type_id' => '20', 'equipment_maker' => 'ここにメーカー',];
        $illust_soft_maker_movie_3 = ['equipment_type_id' => '20', 'equipment_maker' => 'ここにメーカー',];
        $illust_soft_maker_movie_4 = ['equipment_type_id' => '20', 'equipment_maker' => 'ここにメーカー',];
        $illust_soft_maker_movie_5 = ['equipment_type_id' => '20', 'equipment_maker' => 'ここにメーカー',];
        $illust_soft_maker_movie_6 = ['equipment_type_id' => '20', 'equipment_maker' => 'ここにメーカー',];
        $illust_soft_maker_movie_7 = ['equipment_type_id' => '20', 'equipment_maker' => 'ここにメーカー',];
        // タブレット用のレコード equipment_type_id = 21
        $tablet_maker_movie_1 = ['equipment_type_id' => '21', 'equipment_maker' => 'ここにメーカー',];
        $tablet_maker_movie_2 = ['equipment_type_id' => '21', 'equipment_maker' => 'ここにメーカー',];
        $tablet_maker_movie_3 = ['equipment_type_id' => '21', 'equipment_maker' => 'ここにメーカー',];
        $tablet_maker_movie_4 = ['equipment_type_id' => '21', 'equipment_maker' => 'ここにメーカー',];
        $tablet_maker_movie_5 = ['equipment_type_id' => '21', 'equipment_maker' => 'ここにメーカー',];
        $tablet_maker_movie_6 = ['equipment_type_id' => '21', 'equipment_maker' => 'ここにメーカー',];
        $tablet_maker_movie_7 = ['equipment_type_id' => '21', 'equipment_maker' => 'ここにメーカー',];
        // OS用のレコード equipment_type_id = 22
        $os_maker_movie_1 = ['equipment_type_id' => '22', 'equipment_maker' => 'ここにメーカー',];
        $os_maker_movie_2 = ['equipment_type_id' => '22', 'equipment_maker' => 'ここにメーカー',];
        // モニター用のレコード equipment_type_id = 23
        $monitor_maker_movie_1 = ['equipment_type_id' => '23', 'equipment_maker' => 'ここにメーカー',];
        $monitor_maker_movie_2 = ['equipment_type_id' => '23', 'equipment_maker' => 'ここにメーカー',];
        $monitor_maker_movie_3 = ['equipment_type_id' => '23', 'equipment_maker' => 'ここにメーカー',];
        $monitor_maker_movie_4 = ['equipment_type_id' => '23', 'equipment_maker' => 'ここにメーカー',];
        $monitor_maker_movie_5 = ['equipment_type_id' => '23', 'equipment_maker' => 'ここにメーカー',];
        $monitor_maker_movie_6 = ['equipment_type_id' => '23', 'equipment_maker' => 'ここにメーカー',];
        $monitor_maker_movie_7 = ['equipment_type_id' => '23', 'equipment_maker' => 'ここにメーカー',];



        $types = [];

        DB::table('equipment_types')->insert($types);

    }
}
