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
        Schema::create('plane_package_penefits', function (Blueprint $table) {
            $table->uuid('id')->primary(); 
            $table->foreignUuid('benefit_id')->references('id')->on('benefits')->onDelete('cascade');
            $table->foreignUuid('plane_package_id')->references('id')->on('plane_package')->onDelete('cascade');
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
        Schema::dropIfExists('_plane_package_penefits');
    }
};
