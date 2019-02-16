<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWorksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('works', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('customer_id');
            $table->date('date')->nullable();
            $table->time('time')->nullable();
            $table->string('need')->nullable();
            $table->string('address')->nullable();
            $table->string('order_number', 100)->nullable();
            $table->string('lead', 100);
            $table->text('description');
            $table->string('comment')->nullable();
            $table->time('started_time')->nullable();
            $table->time('ended_time')->nullable();
            $table->timestamp('billed_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('works');
    }
}
