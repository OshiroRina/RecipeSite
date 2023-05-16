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
            $table->foreignId('secondary_category_id')
            ->constrained();
            $table->string('name');
            $table->text('information')->nullable();
            $table->text('text')->nullable();
            $table->string('image')->nullable();
            $table->string('ingredient1')->nullable();
            $table->string('ingredient2')->nullable();
            $table->string('ingredient3')->nullable();
            $table->string('ingredient4')->nullable();
            $table->string('ingredient5')->nullable();
            $table->string('ingredient6')->nullable();
            $table->string('ingredient7')->nullable();
            $table->string('ingredient8')->nullable();
            $table->string('ingredient9')->nullable();
            $table->softDeletes();
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
        Schema::dropIfExists('recipes');
    }
};
