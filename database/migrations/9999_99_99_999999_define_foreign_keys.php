<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DefineForeignKeys extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table("contacts_to_work", function (Blueprint $table) {
            $table->foreign("employee_id")->references("id")->on("employees");
            $table->foreign("work_id")->references("id")->on("works");
        });
        Schema::table("workers_to_work", function (Blueprint $table) {
            $table->foreign("work_id")->references("id")->on("works");
            $table->foreign("worker_id")->references("id")->on("workers");
        });
        Schema::table("trucks_to_work", function (Blueprint $table) {
            $table->foreign("truck_id")->references("id")->on("trucks");
            $table->foreign("work_id")->references("id")->on("works");
        });
        Schema::table("subcontractors_to_work", function (Blueprint $table) {
            $table->foreign("subcontractor_id")->references("id")->on("subcontractors");
            $table->foreign("work_id")->references("id")->on("works");
        });
        Schema::table("employees", function (Blueprint $table) {
            $table->foreign("company_id")->references("id")->on("companies");
        });
        Schema::table("works", function (Blueprint $table) {
            $table->foreign("customer_id")->references("id")->on("companies");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table("contacts_to_work", function (Blueprint $table) {
            $table->dropForeign(["employee_id"]);
            $table->dropForeign(["work_id"]);
        });
        Schema::table("workers_to_work", function (Blueprint $table) {
            $table->dropForeign(["work_id"]);
            $table->dropForeign(["worker_id"]);
        });
        Schema::table("trucks_to_work", function (Blueprint $table) {
            $table->dropForeign(["truck_id"]);
            $table->dropForeign(["work_id"]);
        });
        Schema::table("subcontractors_to_work", function (Blueprint $table) {
            $table->dropForeign(["subcontractor_id"]);
            $table->dropForeign(["work_id"]);
        });
        Schema::table("employees", function (Blueprint $table) {
            $table->dropForeign(["company_id"]);
        });
        Schema::table("works", function (Blueprint $table) {
            $table->dropForeign(["customer_id"]);
        });
    }
}
