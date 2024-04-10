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
    Schema::create('car_tag', function (Blueprint $table) {
        $table->foreignId('tag_id')->constrained();
        $table->foreignId('car_id')->constrained();
        $table->primary(['tag_id', 'car_id']);
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('car_tag');
    }
};
