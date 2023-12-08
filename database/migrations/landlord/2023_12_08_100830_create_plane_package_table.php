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
        Schema::create('plane_package', function (Blueprint $table) {
            $table->uuid('id')->primary(); 
            $table->foreignUuid('plan_id')->references('id')->on('plans')->onDelete('cascade');
            $table->foreignUuid('package_id')->references('id')->on('packages')->onDelete('cascade');
           $table->decimal('price',15,2);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('plane_package_benefits');
    }
};
