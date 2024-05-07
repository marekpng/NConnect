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
        Schema::create('admins', function (Blueprint $table) {
            $table->string('name', 255); // Change 'meno' to 'name'
            $table->string('email')->unique(); // Add 'email' field
            $table->string('password'); // Add 'password' field
            $table->string('role')->default('admin'); // Add 'role' field with default value 'user'
            $table->timestamp('email_verified_at')->nullable(); // Add 'email_verified_at' field
            $table->rememberToken(); // Add 'remember_token' field
            $table->timestamps(); // Add 'created_at' and 'updated_at' fields
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('admins');
    }
};
