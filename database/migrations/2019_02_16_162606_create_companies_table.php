<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 144)->unique();
            $table->string('tax', 25)->unique()->nullable();
            $table->string('bill_country', 144)->nullable();
            $table->string('bill_zip', 25)->nullable();
            $table->string('bill_city', 144)->nullable();
            $table->string('bill_address', 144)->nullable();
            $table->string('post_country', 144)->nullable();
            $table->string('post_zip', 25)->nullable();
            $table->string('post_city', 144)->nullable();
            $table->string('post_address', 144)->nullable();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('companies');
    }
}
