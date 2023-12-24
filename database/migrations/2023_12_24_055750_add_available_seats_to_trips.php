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
        Schema::table('trips', function (Blueprint $table) {
            $table->integer('available_seats')->default(36);
        });
    }

    public function down()
    {
        Schema::table('trips', function (Blueprint $table) {
            $table->dropColumn('available_seats');
        });
    }
};
