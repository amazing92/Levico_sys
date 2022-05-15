<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomer extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->text('note')->nullable();
            $table->string('name');
            $table->string('address')->nullable();
            $table->integer('device_id')->comment('mã thiết bị');
            $table->integer('box_id')->nullable()->comment('mã hộp');
            $table->integer('station_id')->nullable()->comment('mã trạm');
            $table->integer('postage')->comment('cước phí');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('customer');
    }
}
