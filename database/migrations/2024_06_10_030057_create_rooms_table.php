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
        Schema::create('rooms', function (Blueprint $table) {
            $table->id('room_id'); // This is the auto_increment primary key
            $table->integer('room_number'); // This is a regular integer column
            $table->string('hotel_name');
            $table->string('hotel_image')->nullable();
            $table->enum('room_type', ['single','double','twin','triple','quad','family','suite','studio','deluxe','executive','luxury','presidentialSuite','accessible','penthouse'])->default('single');
            $table->string('room_price');
            $table->enum('room_status', ['available', 'reserved', 'occupied','pending','checkedOut','outOfService'])->default('available');
            $table->string('room_excerpt')->nullable();
            $table->string('hotel_location')->nullable();
            $table->string('hotel_map')->nullable();
            $table->text('room_desc')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rooms');
    }
};
