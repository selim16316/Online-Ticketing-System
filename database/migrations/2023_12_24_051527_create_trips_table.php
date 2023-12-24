<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('trips', function (Blueprint $table) {
        $table->id();
        $table->date('date');
        $table->unsignedBigInteger('from_location_id');
        $table->unsignedBigInteger('to_location_id');
        $table->integer('available_seats')->default(36);
        $table->timestamps();

        $table->foreign('from_location_id')->references('id')->on('locations')->onDelete('cascade');
        $table->foreign('to_location_id')->references('id')->on('locations')->onDelete('cascade');
    });
}

public function down()
{
    Schema::dropIfExists('trips');
}
};
