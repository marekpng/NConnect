<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomSitesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('custom_sites', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->binary('myFile'); // Use binary for BLOB storage
            $table->string('path')->unique(); // Path should be unique
            $table->timestamps(); // This will create created_at and updated_at columns
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('custom_sites');
    }
}
