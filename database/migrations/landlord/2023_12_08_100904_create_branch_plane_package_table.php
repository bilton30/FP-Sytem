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
        Schema::create('branch_plane_package', function (Blueprint $table) {
            $table->uuid('id')->primary(); 
            $table->foreignUuid('branch_id')->references('id')->on('branches')->onDelete('cascade');
            $table->foreignUuid('plane_package_id')->references('id')->on('plane_package')->onDelete('cascade');
            $table->date('start_date');
            $table->date('end_date');
            $table->string('status');
              $table->integer('discount')->nullable();
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
        Schema::dropIfExists('branch_plane_package_benefits');
    }
};
