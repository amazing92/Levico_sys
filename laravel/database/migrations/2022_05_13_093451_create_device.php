<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDevice extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('device', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->string('name')->comment('tên thiết bị');
            $table->string('code')->comment('mã thiết bị');
            $table->integer('price')->default(0)->comment('giá thiết bị nếu có');
            $table->integer('status')->default(0)->comment('0 là mới ,1 là đang hoạt đông , 2 là đã lỗi thu hồi ');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('device');
    }
}
