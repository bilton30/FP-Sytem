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
        Schema::create('customers', function (Blueprint $table) {
            $table->uuid('id')->primary(); 
            $table->uuid('uid')->unique()->nullable();
            $table->string('name');
            $table->string('code')->nullable();
            $table->string('gender')->nullable();
            $table->string('nuit')->unique()->nullable();
            $table->string('email')->nullable();
            $table->string('contact1');
            $table->string('contact2')->nullable();
            $table->date('birthday')->nullable();
            $table->string('address')->nullable();
            $table->integer('status')->nullable();
            $table->string('sync_uid')->nullable();
            $table->timestamp('sync_at')->nullable();
            $table->timestamps();
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
        Schema::drop('customers');
    }
};
