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
        Schema::create('administrative_rts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('administrative_area_id')->constrained('administrative_areas')->onDelete('cascade');
            $table->string('number');
            $table->unsignedInteger('head');
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
        Schema::dropIfExists('administrative_rts');
    }
}; 