<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('profiles', function (Blueprint $table) {
                        ////////////// ここから使用機材 ////////////////
            // 1
            $table->unsignedInteger('equipment_id_1')->nullable()->change(); //equipmentsテーブルのidと紐付け
            $table->unsignedInteger('equipment_maker_id_1')->nullable()->change(); //equipment_makersテーブルのidと紐付け

            // 2
            $table->unsignedInteger('equipment_id_2')->nullable()->change(); //equipmentsテーブルのidと紐付け
            $table->unsignedInteger('equipment_maker_id_2')->nullable()->change(); //equipment_makersテーブルのidと紐付け

            // 3
            $table->unsignedInteger('equipment_id_3')->nullable()->change(); //equipmentsテーブルのidと紐付け
            $table->unsignedInteger('equipment_maker_id_3')->nullable()->change(); //equipment_makersテーブルのidと紐付け

            // 4
            $table->unsignedInteger('equipment_id_4')->nullable()->change(); //equipmentsテーブルのidと紐付け
            $table->unsignedInteger('equipment_maker_id_4')->nullable()->change(); //equipment_makersテーブルのidと紐付け

            // 5
            $table->unsignedInteger('equipment_id_5')->nullable()->change(); //equipmentsテーブルのidと紐付け
            $table->unsignedInteger('equipment_maker_id_5')->nullable()->change(); //equipment_makersテーブルのidと紐付け

            // 6
            $table->unsignedInteger('equipment_id_6')->nullable()->change(); //equipmentsテーブルのidと紐付け
            $table->unsignedInteger('equipment_maker_id_6')->nullable()->change(); //equipment_makersテーブルのidと紐付け

            // 7
            $table->unsignedInteger('equipment_id_7')->nullable()->change(); //equipmentsテーブルのidと紐付け
            $table->unsignedInteger('equipment_maker_id_7')->nullable()->change(); //equipment_makersテーブルのidと紐付け

            // 8
            $table->unsignedInteger('equipment_id_8')->nullable()->change(); //equipmentsテーブルのidと紐付け
            $table->unsignedInteger('equipment_maker_id_8')->nullable()->change(); //equipment_makersテーブルのidと紐付け

            // 9
            $table->unsignedInteger('equipment_id_9')->nullable()->change(); //equipmentsテーブルのidと紐付け
            $table->unsignedInteger('equipment_maker_id_9')->nullable()->change(); //equipment_makersテーブルのidと紐付け

            // 10
            $table->unsignedInteger('equipment_id_10')->nullable()->change(); //equipmentsテーブルのidと紐付け
            $table->unsignedInteger('equipment_maker_id_10')->nullable()->change(); //equipment_makersテーブルのidと紐付け
            ////////////// ここまで使用機材 ////////////////

            // 外部キー制約を付与
            $table->foreign('equipment_id_1')->references('id')->on('equipment_types');
            $table->foreign('equipment_id_2')->references('id')->on('equipment_types');
            $table->foreign('equipment_id_3')->references('id')->on('equipment_types');
            $table->foreign('equipment_id_4')->references('id')->on('equipment_types');
            $table->foreign('equipment_id_5')->references('id')->on('equipment_types');
            $table->foreign('equipment_id_6')->references('id')->on('equipment_types');
            $table->foreign('equipment_id_7')->references('id')->on('equipment_types');
            $table->foreign('equipment_id_8')->references('id')->on('equipment_types');
            $table->foreign('equipment_id_9')->references('id')->on('equipment_types');
            $table->foreign('equipment_id_10')->references('id')->on('equipment_types');
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
