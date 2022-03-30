<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeEquipmentUrlVarcharToTextOnProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('profiles', function (Blueprint $table) {
            $table->text('equipment_url_1')->change();
            $table->text('equipment_url_2')->change();
            $table->text('equipment_url_3')->change();
            $table->text('equipment_url_4')->change();
            $table->text('equipment_url_5')->change();
            $table->text('equipment_url_6')->change();
            $table->text('equipment_url_7')->change();
            $table->text('equipment_url_8')->change();
            $table->text('equipment_url_9')->change();
            $table->text('equipment_url_10')->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('profiles', function (Blueprint $table) {
            //
        });
    }
}
