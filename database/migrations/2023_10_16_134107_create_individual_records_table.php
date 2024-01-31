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
            $table->enum('sex', ['Male', 'Female']);

            $table->date('birthdate');
            $table->date('date_measured')->nullable();
            $table->float('height');
            $table->float('weight');
            $table->float('length');

            $table->integer('age_in_months')->default(0)->nullable();
            $table->string('weight_for_age_status')->nullable();
            $table->string('height_for_age_status')->nullable();
            $table->string('ltht_status')->nullable();

            $table->timestamps();
            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->foreign('created_by')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('updated_by')->references('id')->on('users')->onDelete('cascade');
            $table->softDeletes();

            // Original Table Properties:
                // $table->string('id_number');
                // $table->string('first_name');
                // $table->string('middle_name')->nullable();
                // $table->string('last_name');
                // $table->string('gender');
                // $table->date('birthdate');
                // $table->float('height');
                // $table->float('weight');
                // $table->float('bmi');
                // $table->string('bmi_category');
                // $table->string('status');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('individual_records');
    }
};
