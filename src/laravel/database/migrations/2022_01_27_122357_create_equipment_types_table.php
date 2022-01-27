<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEquipmentTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('equipment_types', function (Blueprint $table) {
            $table->increments('id'); //主キー
            $table->biginteger('creator_type_id'); //ユーザーが指定したcreator_type_idと一致するequipment_type、iconのみに絞り込みプルダウン選択肢にする
            $table->string('equipment_type');
            $table->string('equipment_type_icon_path');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('equipment_types');
    }
}
