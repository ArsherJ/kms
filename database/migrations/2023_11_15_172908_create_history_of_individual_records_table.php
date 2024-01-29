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
        Schema::create('history_of_individual_records', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();

            // FOR SOFT DELETES
            $table->softDeletes();

            // RELATIONSHIP ATTR
            $table->foreignId('individual_record_id')->nullable()->constrained('individual_records')->onDelete('cascade')->onUpdate('cascade');

            // ADDED ATTR
            $table->float('height');
            $table->float('weight');
            $table->float('bmi');
            $table->string('bmi_category');
            $table->string('date_recorded')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('history_of_individual_records');
    }
};
