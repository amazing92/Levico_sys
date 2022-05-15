<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTimekeeping extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('timekeeping', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->text('note')->nullable();
            $table->integer('status')->default(0)->comment('0 là chưa hoàn thành , 1 là đã hoàn thành , 2 là tạm dừng ');
            $table->integer('employee_id');
            $table->integer('job_id');
            $table->integer('exception_id')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('timekeeping');
    }
}
