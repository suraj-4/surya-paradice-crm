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
        Schema::create('staff', function (Blueprint $table) {
            $table->id('staff_id'); // This is the auto_increment primary key
            $table->string('staff_name');
            $table->string('staff_designation');
            $table->string('staff_mobile',20)->change();
            $table->string('staff_email');
            $table->string('staff_address');
            $table->date('staff_joining_date');
            $table->string('image')->nullable();
            // $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('staff');
    }
};
