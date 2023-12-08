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
        Schema::create('branches', function (Blueprint $table) {
            $table->uuid('id')->primary(); 
            $table->uuid('uid')->unique()->nullable();
            $table->string('name');
            $table->string('logo')->nullable();
            $table->string('email')->nullable()->unique();
            $table->string('contact1');
            $table->string('userOwnerUID')->nullable();
            $table->string('address')->nullable();
            $table->string('nuit')->nullable()->unique();
          
            $table->string('sms_balance')->nullable();
            $table->jsonb('physical_location');
            $table->timestamps();
            // $table->foreignUuid('payment_uid')->references('id')->on('payments')->onDelete('cascade');
            $table->foreignUuid('company_id')->references('id')->on('Companies')->onDelete('cascade');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('branches');
    }
};
