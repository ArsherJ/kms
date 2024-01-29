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
        Schema::create('feeding_program_i_r_logs', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();

            // FOR SOFT DELETES
            $table->softDeletes();

            // RELATIONSHIP ATTR
            $table->foreignId('individual_record_id')->nullable()->constrained('individual_records')->onDelete('cascade')->onUpdate('cascade');

            $table->foreignId('feeding_program_id')->nullable()->constrained('feeding_programs')->onDelete('cascade')->onUpdate('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('feeding_program_i_r_logs');
    }
};
