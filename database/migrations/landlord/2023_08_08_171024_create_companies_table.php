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
            $table->uuid('id')->primary(); 
             $table->string('name')->nullable();
            $table->uuid('uid')->unique()->nullable();
            $table->string('logo');
            $table->string('email')->nullable();
            $table->string('website')->nullable();
            $table->string('nuit');
            $table->string('contact1');
            $table->string('contact2')->nullable();
            $table->string('prefix')->nullable();
            $table->string('address')->nullable();
            $table->integer('status')->nullable();
             $table->string('userOwnerUID')->nullable();
            $table->string('app_uid')->nullable();
            $table->string('sync_uid')->nullable();
            $table->timestamp('sync_at')->nullable();
            $table->timestamps();
            $table->timestamp('server_created_at')->nullable();
            $table->timestamp('deleted_at')->nullable();
            $table->string('updated_user_uid')->nullable();
            $table->string('deleted_user_uid')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('companies');
    }
};
