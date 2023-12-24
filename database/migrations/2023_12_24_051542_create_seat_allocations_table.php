<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
   // database/migrations/yyyy_mm_dd_create_seat_allocations_table.php

public function up()
{
    Schema::create('seat_allocations', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('user_id');
        $table->unsignedBigInteger('trip_id');
        $table->integer('seat_number');
        $table->timestamps();

        $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        $table->foreign('trip_id')->references('id')->on('trips')->onDelete('cascade');
    });
}

public function down()
{
    Schema::dropIfExists('seat_allocations');
}

};
