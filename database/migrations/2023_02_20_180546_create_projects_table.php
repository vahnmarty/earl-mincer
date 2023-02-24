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
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->string('address')->nullable();
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->string('zip')->nullable();
            $table->integer('system_size');
            $table->string('EPC_project_id')->nullable();
            $table->string('CRM_project_id')->nullable();
            $table->decimal('NPPW', $precision = 6, $scale = 4);
            $table->decimal('loan_amount', $precision = 10, $scale = 2);
            $table->string('Note')->nullable();
            $table->bigInteger('project_status_id')->unsigned();
            $table->foreign('project_status_id')->references('id')->on('project_status_types')->onDelete('cascade');
            $table->bigInteger('setter_id')->nullable()->unsigned();
            $table->foreign('setter_id')->references('id')->on('users')->onDelete('cascade');
            $table->bigInteger('closer_id')->nullable()->unsigned();
            $table->foreign('closer_id')->references('id')->on('users')->onDelete('cascade');
            $table->timestamp('start_at')->nullable();
            $table->timestamp('end_at')->nullable();
            
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
        Schema::dropIfExists('projects');
    }
};
