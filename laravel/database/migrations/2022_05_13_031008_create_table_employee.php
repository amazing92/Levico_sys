<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableEmployee extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employee', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->text('note')->nullable();
            $table->text('em_code')->comment('mã nhân viên');
            $table->string('name');
            $table->string('address')->nullable();
            $table->string('area')->nullable();
            $table->string('position')->nullable();
            $table->integer('coefficients_salary_id')->default(0)->comment('fk table coefficients_salary');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employee');
    }
}
