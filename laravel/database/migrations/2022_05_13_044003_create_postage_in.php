<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostageIn extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('postage_in', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->text('note')->nullable();
            $table->string('name')->comment('nguồn thu ?');
            $table->integer('status')->default(0)->comment('0 là lập phiếu thu  , 1 là đã thu  ');
            $table->integer('price')->comment('số tiền thu ');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('postage_in');
    }
}
