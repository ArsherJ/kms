<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('individual_records', function (Blueprint $table)
        {
            $table->id();

            $table->string('child_number')->nullable();
            $table->string('address');
            $table->string('mother_last_name');
            $table->string('mother_first_name');
            $table->string('child_last_name');
            $table->string('child_first_name');

            $table->enum('ip_group', ['Yes', 'No']);
            $table->enum('micronutrient', ['Yes', 'No']);
            $table->enum('sex', ['Male', 'Female']);

            $table->date('birthdate');
            $table->integer('age_in_months')->nullable();
            $table->date('date_measured')->nullable();
            $table->float('height');
            $table->float('weight');

            $table->string('weight_for_age_status')->nullable();
            $table->string('height_length_for_age_status')->nullable();
            $table->string('weight_for_length_status')->nullable();

            $table->timestamps();
            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->foreign('created_by')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('updated_by')->references('id')->on('users')->onDelete('cascade');
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('individual_records');
    }
};
