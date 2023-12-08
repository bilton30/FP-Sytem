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
        Schema::create('devices', function (Blueprint $table) {
             $table->uuid('id')->primary(); 
            $table->uuid('uid')->unique()->nullable();
            $table->string('name');
            $table->string('type');
            $table->string('architecture')->nullable();
            $table->string('status');
            $table->string('mac_address')->unique();
            $table->string('processor_id')->unique();
            $table->date('installation_date');
            $table->datetime('last_request_date')->nullable();
            $table->timestamps();
            $table->foreignUuid('branch_uid')->references('id')->on('branches')->onDelete('cascade');
            

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('devices');
    }
};
