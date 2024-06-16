<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('homes', function (Blueprint $table) {
            $table->id();
            $table->integer('status')->default('1'); //0: Disabled, 1:Enabled;
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->json('logo_path')->nullable();
            $table->enum('type', ['Sale', 'Rent'])->default('Sale');
            $table->enum('property_types', ['Apartment', 'Private House', 'Garage', 'Office', 'Store'])
                ->default('Apartment');
            $table->integer('price');
            $table->integer('room');
            $table->integer('square_feet');
            $table->integer('floor');
            $table->string('location_city');
            $table->string('phone');
            $table->string('description');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('homes', function (Blueprint $table) {
            $table->dropColumn('user_id'); // Drop the user_id column
        });    }
};
//<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
