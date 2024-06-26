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
        Schema::create('stages', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Adding the new column 'name'
            $table->string('date');
            $table->string('time');
            $table->string('title');
            $table->text('description');
            $table->string('presenter');
            $table->string('organization');
            $table->string('image')->nullable();
            $table->integer('capacity'); // Adding the new column 'capacity'
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
        Schema::dropIfExists('stages');
    }
};
