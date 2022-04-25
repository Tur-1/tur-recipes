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
        Schema::create('recipes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained('users')->cascadeOnDelete();
            $table->string('title');
            $table->string('fat');
            $table->string('carbs');
            $table->string('protein');
            $table->string('calories')->nullable();
            $table->string('ready_in_minutes')->nullable();
            $table->string('image');
            $table->longText('instructions')->nullable();
            $table->json('ingredients')->nullable();
            $table->json('meal_types')->nullable();
            $table->json('categories')->nullable();
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
        Schema::dropIfExists('reipces');
    }
};