<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTablePay extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pay', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('student_id')->unsigned();
            $table->integer('class_id')->unsigned();
            $table->string('tuition')->comment('học phí');
            $table->integer('sale')->comment('số tiền được giảm');
            $table->integer('pay')->comment('số tiền cần thanh toán');
            $table->integer('pay1');
            $table->integer('pay2');
            $table->integer('rest')->comment('còn nợ');
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
        Schema::dropIfExists('pay');
    }
}
