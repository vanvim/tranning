<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableClass extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('class', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->integer('number')->comment('sĩ số');
            $table->string('start_time');
            $table->integer('teacher_id')->unsigned();
            $table->integer('course_id')->unsigned()->comment('mã khóa học');
            $table->string('schedule')->comment('lịch học');
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
        Schema::dropIfExists('class');
    }
}
