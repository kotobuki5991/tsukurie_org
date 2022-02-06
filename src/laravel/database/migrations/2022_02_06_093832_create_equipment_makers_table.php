<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEquipmentMakersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('equipment_makers', function (Blueprint $table) {
            $table->increments('id'); //主キー
            //ユーザーが指定したcreator_type_idと一致するequipment_type、iconのみに絞り込みプルダウン選択肢にする
            $table->biginteger('equipment_type_id')->references('id')->on('equipment_types');
            $table->string('equipment_maker');
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
        Schema::dropIfExists('equipment_makers');
    }
}
