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
        Schema::create('reipces', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
            $table->string('reipce_name');
            $table->string('fat');
            $table->string('carbs');
            $table->string('protein');
            $table->string('calories')->nullable();
            $table->string('time')->nullable();
            $table->string('image');
            $table->longText('instructions')->nullable();
            $table->json('ingredients')->nullable();

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