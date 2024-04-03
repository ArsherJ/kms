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
            $table->integer('age_in_months');
            $table->date('date_measured')->nullable();
            $table->float('height');
            $table->float('weight');

            $table->string('weight_for_age_status')->nullable();
            $table->string('height_length_for_age_status')->nullable();
            $table->string('weight_for_length_status')->nullable();

            $table->string('phone_number')->nullable();
            $table->enum('feeding_candidate', ['Yes', 'No'])->default('No');
            $table->enum('micronutrient', ['Vitamin A', 'Iron', 'Iodine', 'No'])->default('No');
            $table->enum('nutrient_given', ['Yes', 'No'])->nullable(); // no use
            $table->date('nutrient_given_date')->nullable();
            $table->enum('food_pack_given', ['Yes', 'No'])->nullable();
            $table->date('food_pack_given_date')->nullable();

            $table->timestamps();
            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->foreign('created_by')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('updated_by')->references('id')->on('users')->onDelete('cascade');
            $table->softDeletes();
        });

        // DB::statement
        // ('
        //     CREATE TRIGGER calculate_age_in_months BEFORE INSERT ON individual_records
        //     FOR EACH ROW
        //         BEGIN
        //             SET NEW.age_in_months = TIMESTAMPDIFF(MONTH, NEW.birthdate, NOW());

        //             IF NEW.age_in_months BETWEEN 0 AND 5
        //             THEN SET NEW.micronutrient = "No";
        //             ELSEIF NEW.age_in_months BETWEEN 6 AND 23
        //             THEN SET NEW.micronutrient = "Yes";
        //             ELSE SET NEW.micronutrient = "No";
        //             END IF;
        //         END;
        // ');

        DB::statement
        ('
            CREATE TRIGGER calculate_age_in_months BEFORE INSERT ON individual_records
            FOR EACH ROW
                BEGIN
                    SET NEW.age_in_months = TIMESTAMPDIFF(MONTH, NEW.birthdate, NOW());
                END;
        ');
    }

    public function down(): void
    {
        Schema::dropIfExists('individual_records');
    }
};
