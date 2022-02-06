<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // 初回実行時は全てのコメントアウトを外し、seedingする
        // $this->call(CreatorTypesTableSeeder::class);
        // $this->call(EquipmentTypesTableSeeder::class);
        // $this->call(AddEquipmentTypesTableSeeder::class);
        $this->call(EquipmentMakersTableSeeder::class);
    }
}
