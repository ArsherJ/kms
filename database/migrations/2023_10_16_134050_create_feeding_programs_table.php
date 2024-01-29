<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('feeding_programs', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();

            // FOR SOFT DELETES
            $table->softDeletes();

            // ADDED ATTR
            $table->string('title');
            $table->string('location');
            $table->longText('description');
            $table->time('time_of_program');
            $table->date('date_of_program');
            $table->dateTime('date_posted');
            $table->string('status');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('feeding_programs');
    }
};
