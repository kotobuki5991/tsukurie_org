<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->increments('id'); //主キー
            $table->biginteger('user_id'); //usersテーブルと紐付け
            $table->integer('creator_type_id')->nullable(); //creater_typesテーブルと紐付け
            $table->string('profile_icon')->nullable(); //S3にアップロードしたurl
            $table->string('top_image')->nullable(); //S3にアップロードしたurl
            $table->text('message')->nullable(); //直接入力
            ////////////// ここから使用機材 ////////////////
            // 1
            $table->integer('equipment_id_1')->nullable(); //equipmentsテーブルのidと紐付け
            $table->integer('equipment_maker_id_1')->nullable(); //equipment_makersテーブルのidと紐付け
            $table->string('equipment_url_1')->nullable(); //直接入力
            // 2
            $table->integer('equipment_id_2')->nullable(); //equipmentsテーブルのidと紐付け
            $table->integer('equipment_maker_id_2')->nullable(); //equipment_makersテーブルのidと紐付け
            $table->string('equipment_url_2')->nullable(); //直接入力
            // 3
            $table->integer('equipment_id_3')->nullable(); //equipmentsテーブルのidと紐付け
            $table->integer('equipment_maker_id_3')->nullable(); //equipment_makersテーブルのidと紐付け
            $table->string('equipment_url_3')->nullable(); //直接入力
            // 4
            $table->integer('equipment_id_4')->nullable(); //equipmentsテーブルのidと紐付け
            $table->integer('equipment_maker_id_4')->nullable(); //equipment_makersテーブルのidと紐付け
            $table->string('equipment_url_4')->nullable(); //直接入力
            // 5
            $table->integer('equipment_id_5')->nullable(); //equipmentsテーブルのidと紐付け
            $table->integer('equipment_maker_id_5')->nullable(); //equipment_makersテーブルのidと紐付け
            $table->string('equipment_url_5')->nullable(); //直接入力
            // 6
            $table->integer('equipment_id_6')->nullable(); //equipmentsテーブルのidと紐付け
            $table->integer('equipment_maker_id_6')->nullable(); //equipment_makersテーブルのidと紐付け
            $table->string('equipment_url_6')->nullable(); //直接入力
            // 7
            $table->integer('equipment_id_7')->nullable(); //equipmentsテーブルのidと紐付け
            $table->integer('equipment_maker_id_7')->nullable(); //equipment_makersテーブルのidと紐付け
            $table->string('equipment_url_7')->nullable(); //直接入力
            // 8
            $table->integer('equipment_id_8')->nullable(); //equipmentsテーブルのidと紐付け
            $table->integer('equipment_maker_id_8')->nullable(); //equipment_makersテーブルのidと紐付け
            $table->string('equipment_url_8')->nullable(); //直接入力
            // 9
            $table->integer('equipment_id_9')->nullable(); //equipmentsテーブルのidと紐付け
            $table->integer('equipment_maker_id_9')->nullable(); //equipment_makersテーブルのidと紐付け
            $table->string('equipment_url_9')->nullable(); //直接入力
            // 10
            $table->integer('equipment_id_10')->nullable(); //equipmentsテーブルのidと紐付け
            $table->integer('equipment_maker_id_10')->nullable(); //equipment_makersテーブルのidと紐付け
            $table->string('equipment_url_10')->nullable(); //直接入力
            ////////////// ここまで使用機材 ////////////////
            $table->integer('publish_flag')->nullable(false)->default(0); //公開フラグ 0で非公開、1で公開
            $table->integer('billing_flag')->nullable(false)->default(0); //課金フラグ 0で非課金、1で課金中
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
        Schema::dropIfExists('profiles');
    }
}
