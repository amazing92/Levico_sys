<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobs extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jobs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->text('note')->nullable();
            $table->text('name');
            $table->text('content')->nullable();
            $table->integer('status')->default(0)->comment('0 là chưa được gán cho nhân viên nào ,1 là đã được gán , 2 là đã hoàn thành');
            $table->integer('type_task')->default(0);
            $table->integer('as_employee_id')->default(0)->comment('mã nhân viên sẽ thực hiện');
            $table->integer('bonus')->default(0)->comment('tiền thưởng');
            $table->integer('fringe_benefits')->default(0)->comment('tiền phụ cấp');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jobs');
    }
}
