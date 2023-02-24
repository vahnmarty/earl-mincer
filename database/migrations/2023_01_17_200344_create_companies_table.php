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
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('account_type_id')->nullable();
            $table->string('name')->unique();
            $table->string('short_name')->nullable();
            $table->string('contact_name')->nullable();
            $table->string('contact_email')->nullable();
            $table->string('contact_phone')->nullable();
            $table->string('response_email')->nullable();
            $table->timestamp('start_date')->nullable();
            $table->timestamp('end_date')->nullable();
            $table->boolean('approval_email_to_payee')->nullable()->default(false);
            $table->bigInteger('account_type')->unsigned()->nullable();
            $table->foreign('account_type')->references('id')->on('company_account_types')->onDelete('cascade'); 
            $table->timestamp('modified_at')->nullable();
            $table->bigInteger('modified_by')->unsigned()->nullable();
            $table->foreign('modified_by')->references('id')->on('users')->onDelete('cascade');            
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
        Schema::dropIfExists('companies');
    }
};
