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
        Schema::create('subjects', function (Blueprint $table) {
            $table->id();
            $table->string('course_code');
            $table->string('descriptive_title');
            $table->decimal('total_units',4,1);
            $table->decimal('lec_units',4,1);
            $table->decimal('lab_units',4,1);
            $table->decimal('hours_week',4,1);
            $table->string('pre_requisite');
            $table->integer('year_level',);
            $table->integer('semester',);
            $table->string('curriculum');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subjects');
    }
};
