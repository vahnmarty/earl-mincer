<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comp_plans', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->boolean('active');
            $table->integer('setter_percent');
            $table->decimal('setter_per_watt', $precision = 10, $scale = 4);
            $table->integer('M1_percent');
            $table->integer('M1_max_payment');
            $table->bigInteger('company_id')->unsigned()->default(1);
            $table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade');
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
        Schema::dropIfExists('comp_plans');
    }
};
