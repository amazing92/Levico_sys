<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoefficientsSalary extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coefficients_salary', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->text('note')->nullable();
            $table->string('name')->comment('hệ số lương');
            $table->integer('salary')->comment('mức lương');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('coefficients_salary');
    }
}
