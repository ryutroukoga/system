<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('members', function (Blueprint $table) {
            $table->bigIncrements('id'); // 自動増分のID
            $table->string('name'); // 生徒名
            $table->string('layer'); // レイヤー数字 1~5
            $table->string('unit'); // 単元 1, 2, 3-1, 設計, 製造 など
            $table->string('base'); // 拠点 都道府県名
            $table->string('comment')->nullable(); // メモ (たくさん書けるように text 型)
            $table->integer('teacher_id'); // teacherテーブルのID (外部キー)
            $table->tinyInteger('stop_flg')->default(0); // アクティブ 0:アクティブ, 1:非アクティブ
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('members');
    }
};
