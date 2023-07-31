<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRichMenuTable extends Migration
{
    public function up()
    {
        Schema::create('rich_menu1', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('photo'); // 照片欄位
            $table->decimal('coordinate_x', 10, 7); // 座標軸 X (最多 10 位數字，小數點後 7 位)
            $table->decimal('coordinate_y', 10, 7); // 座標軸 Y (最多 10 位數字，小數點後 7 位)
            $table->integer('length'); // 長度欄位
            $table->integer('width'); // 寬度欄位
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('rich_menu1');
    }
}
