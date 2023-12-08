<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLandlordTenantsTable extends Migration
{
    public function up()
    {
        Schema::create('tenants', function (Blueprint $table) {
            // $table->id();
            $table->uuid('id')->primary(); 
            $table->string('name');
            $table->string('domain');
            $table->string('database');
            $table->foreignUuid('company_id')->references('id')->on('companies')->onDelete('cascade');
            $table->timestamps();
        });
    }
}
