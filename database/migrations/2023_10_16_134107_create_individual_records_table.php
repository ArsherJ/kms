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
            $table->integer('age_in_months');
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

        // Creating triggers
        DB::unprepared(
            '
            CREATE TRIGGER calculate_age_in_months BEFORE INSERT ON individual_records
            FOR EACH ROW
            BEGIN
                SET NEW.age_in_months = TIMESTAMPDIFF(MONTH, NEW.birthdate, NOW());

                IF NEW.age_in_months BETWEEN 0 AND 5
                THEN SET NEW.micronutrient = "No";
                ELSEIF NEW.age_in_months BETWEEN 6 AND 23
                THEN SET NEW.micronutrient = "Yes";
                ELSE SET NEW.micronutrient = "No";
                END IF;
            END;
            '
        );

        DB::unprepared(
            '
            CREATE TRIGGER calculate_weight_for_age_status BEFORE INSERT ON individual_records
                FOR EACH ROW
                    BEGIN
                        SET NEW.weight_for_age_status = CASE NEW.age_in_months
                            WHEN 0 THEN
                                CASE
                                    WHEN NEW.sex = "Male" AND NEW.weight <= 2.1 THEN "Severely Underweight"
                                    WHEN NEW.sex = "Male" AND NEW.weight >= 2.1 AND NEW.weight <= 2.2 THEN "Underweight"
                                    WHEN NEW.sex = "Male" AND NEW.weight > 2.2 THEN "Normal"
                                    WHEN NEW.sex = "Female" AND NEW.weight <= 2.0 THEN "Severely Underweight"
                                    WHEN NEW.sex = "Female" AND NEW.weight >= 2.0 AND NEW.weight <= 2.1 THEN "Underweight"
                                    WHEN NEW.sex = "Female" AND NEW.weight > 2.1 THEN "Normal"
                                    ELSE "Exceeded Data Range"
                                END
                            WHEN 1 THEN
                                CASE 
                                    WHEN NEW.sex = "Male" AND NEW.weight <= 2.9 THEN "Severely Underweight"
                                    WHEN NEW.sex = "Male" AND NEW.weight >= 2.9 AND NEW.weight <= 3.0 THEN "Underweight"
                                    WHEN NEW.sex = "Male" AND NEW.weight > 3.0 THEN "Normal"
                                    WHEN NEW.sex = "Female" AND NEW.weight <= 2.7 THEN "Severely Underweight"
                                    WHEN NEW.sex = "Female" AND NEW.weight >= 2.7 AND NEW.weight <= 2.8 THEN "Underweight"
                                    WHEN NEW.sex = "Female" AND NEW.weight > 2.8 THEN "Normal"
                                    ELSE "Exceeded Data Range"
                            END
                            WHEN 2 THEN 
                                CASE 
                                    WHEN NEW.sex = "Male" AND NEW.weight <= 3.8 THEN "Severely Underweight"
                                    WHEN NEW.sex = "Male" AND NEW.weight >= 3.8 AND NEW.weight <= 3.9 THEN "Underweight"
                                    WHEN NEW.sex = "Male" AND NEW.weight > 3.9 THEN "Normal"
                                    WHEN NEW.sex = "Female" AND NEW.weight <= 3.4 THEN "Severely Underweight"
                                    WHEN NEW.sex = "Female" AND NEW.weight >= 3.4 AND NEW.weight <= 3.5 THEN "Underweight"
                                    WHEN NEW.sex = "Female" AND NEW.weight > 3.5 THEN "Normal"
                                    ELSE "Exceeded Data Range"
                                END
                            WHEN 3 THEN 
                                CASE 
                                    WHEN NEW.sex = "Male" AND NEW.weight <= 4.4 THEN "Severely Underweight"
                                    WHEN NEW.sex = "Male" AND NEW.weight >= 4.4 AND NEW.weight <= 4.5 THEN "Underweight"
                                    WHEN NEW.sex = "Male" AND NEW.weight > 4.5 THEN "Normal"
                                    WHEN NEW.sex = "Female" AND NEW.weight <= 4.0 THEN "Severely Underweight"
                                    WHEN NEW.sex = "Female" AND NEW.weight >= 4.0 AND NEW.weight <= 4.1 THEN "Underweight"
                                    WHEN NEW.sex = "Female" AND NEW.weight > 4.1 THEN "Normal"
                                    ELSE "Exceeded Data Range"
                                END
                            WHEN 4 THEN 
                                CASE 
                                    WHEN NEW.sex = "Male" AND NEW.weight <= 4.9 THEN "Severely Underweight"
                                    WHEN NEW.sex = "Male" AND NEW.weight >= 4.9 AND NEW.weight <= 5.0 THEN "Underweight"
                                    WHEN NEW.sex = "Male" AND NEW.weight > 5.0 THEN "Normal"
                                    WHEN NEW.sex = "Female" AND NEW.weight <= 4.4 THEN "Severely Underweight"
                                    WHEN NEW.sex = "Female" AND NEW.weight >= 4.4 AND NEW.weight <= 4.5 THEN "Underweight"
                                    WHEN NEW.sex = "Female" AND NEW.weight > 4.5 THEN "Normal"
                                    ELSE "Exceeded Data Range"
                                END
                            WHEN 5 THEN 
                                CASE 
                                    WHEN NEW.sex = "Male" AND NEW.weight <= 5.3 THEN "Severely Underweight"
                                    WHEN NEW.sex = "Male" AND NEW.weight >= 5.3 AND NEW.weight <= 5.4 THEN "Underweight"
                                    WHEN NEW.sex = "Male" AND NEW.weight > 5.4 THEN "Normal"
                                    WHEN NEW.sex = "Female" AND NEW.weight <= 4.8 THEN "Severely Underweight"
                                    WHEN NEW.sex = "Female" AND NEW.weight >= 4.8 AND NEW.weight <= 4.9 THEN "Underweight"
                                    WHEN NEW.sex = "Female" AND NEW.weight > 4.9 THEN "Normal"
                                    ELSE "Exceeded Data Range"
                                END
                            WHEN 6 THEN 
                                CASE 
                                    WHEN NEW.sex = "Male" AND NEW.weight <= 5.7 THEN "Severely Underweight"
                                    WHEN NEW.sex = "Male" AND NEW.weight >= 5.7 AND NEW.weight <= 5.8 THEN "Underweight"
                                    WHEN NEW.sex = "Male" AND NEW.weight > 5.8 THEN "Normal"
                                    WHEN NEW.sex = "Female" AND NEW.weight <= 5.1 THEN "Severely Underweight"
                                    WHEN NEW.sex = "Female" AND NEW.weight >= 5.1 AND NEW.weight <= 5.2 THEN "Underweight"
                                    WHEN NEW.sex = "Female" AND NEW.weight > 5.2 THEN "Normal"
                                    ELSE "Exceeded Data Range"
                                END
                            WHEN 7 THEN 
                                CASE 
                                    WHEN NEW.sex = "Male" AND NEW.weight <= 5.9 THEN "Severely Underweight"
                                    WHEN NEW.sex = "Male" AND NEW.weight >= 5.9 AND NEW.weight <= 6.0 THEN "Underweight"
                                    WHEN NEW.sex = "Male" AND NEW.weight > 6.0 THEN "Normal"
                                    WHEN NEW.sex = "Female" AND NEW.weight <= 5.3 THEN "Severely Underweight"
                                    WHEN NEW.sex = "Female" AND NEW.weight >= 5.3 AND NEW.weight <= 5.4 THEN "Underweight"
                                    WHEN NEW.sex = "Female" AND NEW.weight > 5.4 THEN "Normal"
                                    ELSE "Exceeded Data Range"
                                END
                            WHEN 8 THEN 
                                CASE 
                                    WHEN NEW.sex = "Male" AND NEW.weight <= 6.2 THEN "Severely Underweight"
                                    WHEN NEW.sex = "Male" AND NEW.weight >= 6.2 AND NEW.weight <= 6.3 THEN "Underweight"
                                    WHEN NEW.sex = "Male" AND NEW.weight > 6.3 THEN "Normal"
                                    WHEN NEW.sex = "Female" AND NEW.weight <= 5.6 THEN "Severely Underweight"
                                    WHEN NEW.sex = "Female" AND NEW.weight >= 5.6 AND NEW.weight <= 5.7 THEN "Underweight"
                                    WHEN NEW.sex = "Female" AND NEW.weight > 5.7 THEN "Normal"
                                    ELSE "Exceeded Data Range"
                                END
                            WHEN 9 THEN 
                                CASE 
                                    WHEN NEW.sex = "Male" AND NEW.weight <= 6.4 THEN "Severely Underweight"
                                    WHEN NEW.sex = "Male" AND NEW.weight >= 6.4 AND NEW.weight <= 6.5 THEN "Underweight"
                                    WHEN NEW.sex = "Male" AND NEW.weight > 6.5 THEN "Normal"
                                    WHEN NEW.sex = "Female" AND NEW.weight <= 5.8 THEN "Severely Underweight"
                                    WHEN NEW.sex = "Female" AND NEW.weight >= 5.8 AND NEW.weight <= 5.9 THEN "Underweight"
                                    WHEN NEW.sex = "Female" AND NEW.weight > 5.9 THEN "Normal"
                                    ELSE "Exceeded Data Range"
                                END
                            WHEN 10 THEN 
                                CASE 
                                    WHEN NEW.sex = "Male" AND NEW.weight <= 6.6 THEN "Severely Underweight"
                                    WHEN NEW.sex = "Male" AND NEW.weight >= 6.6 AND NEW.weight <= 6.7 THEN "Underweight"
                                    WHEN NEW.sex = "Male" AND NEW.weight > 6.7 THEN "Normal"
                                    WHEN NEW.sex = "Female" AND NEW.weight <= 5.9 THEN "Severely Underweight"
                                    WHEN NEW.sex = "Female" AND NEW.weight >= 5.9 AND NEW.weight <= 6.0 THEN "Underweight"
                                    WHEN NEW.sex = "Female" AND NEW.weight > 6.0 THEN "Normal"
                                    ELSE "Exceeded Data Range"
                                END
                            WHEN 11 THEN 
                                CASE 
                                    WHEN NEW.sex = "Male" AND NEW.weight <= 6.8 THEN "Severely Underweight"
                                    WHEN NEW.sex = "Male" AND NEW.weight >= 6.8 AND NEW.weight <= 6.9 THEN "Underweight"
                                    WHEN NEW.sex = "Male" AND NEW.weight > 6.9 THEN "Normal"
                                    WHEN NEW.sex = "Female" AND NEW.weight <= 6.1 THEN "Severely Underweight"
                                    WHEN NEW.sex = "Female" AND NEW.weight >= 6.1 AND NEW.weight <= 6.2 THEN "Underweight"
                                    WHEN NEW.sex = "Female" AND NEW.weight > 6.2 THEN "Normal"
                                    ELSE "Exceeded Data Range"
                                END
                            WHEN 12 THEN 
                                CASE 
                                    WHEN NEW.sex = "Male" AND NEW.weight <= 6.9 THEN "Severely Underweight"
                                    WHEN NEW.sex = "Male" AND NEW.weight >= 6.9 AND NEW.weight <= 7.0 THEN "Underweight"
                                    WHEN NEW.sex = "Male" AND NEW.weight > 7.0 THEN "Normal"
                                    WHEN NEW.sex = "Female" AND NEW.weight <= 6.3 THEN "Severely Underweight"
                                    WHEN NEW.sex = "Female" AND NEW.weight >= 6.3 AND NEW.weight <= 6.4 THEN "Underweight"
                                    WHEN NEW.sex = "Female" AND NEW.weight > 6.4 THEN "Normal"
                                    ELSE "Exceeded Data Range"
                                END
                            WHEN 13 THEN 
                                CASE 
                                    WHEN NEW.sex = "Male" AND NEW.weight <= 7.1 THEN "Severely Underweight"
                                    WHEN NEW.sex = "Male" AND NEW.weight >= 7.1 AND NEW.weight <= 7.2 THEN "Underweight"
                                    WHEN NEW.sex = "Male" AND NEW.weight > 7.2 THEN "Normal"
                                    WHEN NEW.sex = "Female" AND NEW.weight <= 6.4 THEN "Severely Underweight"
                                    WHEN NEW.sex = "Female" AND NEW.weight >= 6.4 AND NEW.weight <= 6.5 THEN "Underweight"
                                    WHEN NEW.sex = "Female" AND NEW.weight > 6.5 THEN "Normal"
                                    ELSE "Exceeded Data Range"
                                END
                            WHEN 14 THEN 
                                CASE 
                                    WHEN NEW.sex = "Male" AND NEW.weight <= 7.2 THEN "Severely Underweight"
                                    WHEN NEW.sex = "Male" AND NEW.weight >= 7.2 AND NEW.weight <= 7.3 THEN "Underweight"
                                    WHEN NEW.sex = "Male" AND NEW.weight > 7.3 THEN "Normal"
                                    WHEN NEW.sex = "Female" AND NEW.weight <= 6.6 THEN "Severely Underweight"
                                    WHEN NEW.sex = "Female" AND NEW.weight >= 6.6 AND NEW.weight <= 6.7 THEN "Underweight"
                                    WHEN NEW.sex = "Female" AND NEW.weight > 6.7 THEN "Normal"
                                    ELSE "Exceeded Data Range"
                                END
                            WHEN 15 THEN 
                                CASE 
                                    WHEN NEW.sex = "Male" AND NEW.weight <= 7.4 THEN "Severely Underweight"
                                    WHEN NEW.sex = "Male" AND NEW.weight >= 7.4 AND NEW.weight <= 7.5 THEN "Underweight"
                                    WHEN NEW.sex = "Male" AND NEW.weight > 7.5 THEN "Normal"
                                    WHEN NEW.sex = "Female" AND NEW.weight <= 6.7 THEN "Severely Underweight"
                                    WHEN NEW.sex = "Female" AND NEW.weight >= 6.7 AND NEW.weight <= 6.8 THEN "Underweight"
                                    WHEN NEW.sex = "Female" AND NEW.weight > 6.8 THEN "Normal"
                                    ELSE "Exceeded Data Range"
                                END
                            WHEN 16 THEN 
                                CASE 
                                    WHEN NEW.sex = "Male" AND NEW.weight <= 7.5 THEN "Severely Underweight"
                                    WHEN NEW.sex = "Male" AND NEW.weight >= 7.5 AND NEW.weight <= 7.6 THEN "Underweight"
                                    WHEN NEW.sex = "Male" AND NEW.weight > 7.6 THEN "Normal"
                                    WHEN NEW.sex = "Female" AND NEW.weight <= 6.9 THEN "Severely Underweight"
                                    WHEN NEW.sex = "Female" AND NEW.weight >= 6.9 AND NEW.weight <= 7.0 THEN "Underweight"
                                    WHEN NEW.sex = "Female" AND NEW.weight > 7.0 THEN "Normal"
                                    ELSE "Exceeded Data Range"
                                END
                            WHEN 17 THEN 
                                CASE 
                                    WHEN NEW.sex = "Male" AND NEW.weight <= 7.7 THEN "Severely Underweight"
                                    WHEN NEW.sex = "Male" AND NEW.weight >= 7.7 AND NEW.weight <= 7.8 THEN "Underweight"
                                    WHEN NEW.sex = "Male" AND NEW.weight > 7.8 THEN "Normal"
                                    WHEN NEW.sex = "Female" AND NEW.weight <= 6.9 THEN "Severely Underweight"
                                    WHEN NEW.sex = "Female" AND NEW.weight >= 6.9 AND NEW.weight <= 7.0 THEN "Underweight"
                                    WHEN NEW.sex = "Female" AND NEW.weight > 7.0 THEN "Normal"
                                    ELSE "Exceeded Data Range"
                                END
                            WHEN 18 THEN 
                                CASE 
                                    WHEN NEW.sex = "Male" AND NEW.weight <= 7.8 THEN "Severely Underweight"
                                    WHEN NEW.sex = "Male" AND NEW.weight >= 7.8 AND NEW.weight <= 7.9 THEN "Underweight"
                                    WHEN NEW.sex = "Male" AND NEW.weight > 7.9 THEN "Normal"
                                    WHEN NEW.sex = "Female" AND NEW.weight <= 7.2 THEN "Severely Underweight"
                                    WHEN NEW.sex = "Female" AND NEW.weight >= 7.2 AND NEW.weight <= 7.3 THEN "Underweight"
                                    WHEN NEW.sex = "Female" AND NEW.weight > 7.3 THEN "Normal"
                                    ELSE "Exceeded Data Range"
                                END
                            WHEN 19 THEN 
                                CASE 
                                    WHEN NEW.sex = "Male" AND NEW.weight <= 8.0 THEN "Severely Underweight"
                                    WHEN NEW.sex = "Male" AND NEW.weight >= 8.0 AND NEW.weight <= 8.1 THEN "Underweight"
                                    WHEN NEW.sex = "Male" AND NEW.weight > 8.1 THEN "Normal"
                                    WHEN NEW.sex = "Female" AND NEW.weight <= 7.3 THEN "Severely Underweight"
                                    WHEN NEW.sex = "Female" AND NEW.weight >= 7.3 AND NEW.weight <= 7.4 THEN "Underweight"
                                    WHEN NEW.sex = "Female" AND NEW.weight > 7.4 THEN "Normal"
                                    ELSE "Exceeded Data Range"
                                END
                            WHEN 20 THEN 
                                CASE 
                                    WHEN NEW.sex = "Male" AND NEW.weight <= 8.1 THEN "Severely Underweight"
                                    WHEN NEW.sex = "Male" AND NEW.weight >= 8.1 AND NEW.weight <= 8.2 THEN "Underweight"
                                    WHEN NEW.sex = "Male" AND NEW.weight > 8.2 THEN "Normal"
                                    WHEN NEW.sex = "Female" AND NEW.weight <= 7.5 THEN "Severely Underweight"
                                    WHEN NEW.sex = "Female" AND NEW.weight >= 7.5 AND NEW.weight <= 6.4 THEN "Underweight"
                                    WHEN NEW.sex = "Female" AND NEW.weight > 7.5 THEN "Normal"
                                    ELSE "Exceeded Data Range"
                                END
                            WHEN 21 THEN 
                                CASE 
                                    WHEN NEW.sex = "Male" AND NEW.weight <= 8.2 THEN "Severely Underweight"
                                    WHEN NEW.sex = "Male" AND NEW.weight >= 8.2 AND NEW.weight <= 8.3 THEN "Underweight"
                                    WHEN NEW.sex = "Male" AND NEW.weight > 8.3 THEN "Normal"
                                    WHEN NEW.sex = "Female" AND NEW.weight <= 7.6 THEN "Severely Underweight"
                                    WHEN NEW.sex = "Female" AND NEW.weight >= 7.6 AND NEW.weight <= 7.7 THEN "Underweight"
                                    WHEN NEW.sex = "Female" AND NEW.weight > 7.7 THEN "Normal"
                                    ELSE "Exceeded Data Range"
                                END
                            WHEN 22 THEN 
                                CASE 
                                    WHEN NEW.sex = "Male" AND NEW.weight <= 8.4 THEN "Severely Underweight"
                                    WHEN NEW.sex = "Male" AND NEW.weight >= 8.4 AND NEW.weight <= 8.5 THEN "Underweight"
                                    WHEN NEW.sex = "Male" AND NEW.weight > 8.5 THEN "Normal"
                                    WHEN NEW.sex = "Female" AND NEW.weight <= 7.8 THEN "Severely Underweight"
                                    WHEN NEW.sex = "Female" AND NEW.weight >= 7.8 AND NEW.weight <= 7.9 THEN "Underweight"
                                    WHEN NEW.sex = "Female" AND NEW.weight > 7.9 THEN "Normal"
                                    ELSE "Exceeded Data Range"
                                END
                            WHEN 23 THEN 
                                CASE 
                                    WHEN NEW.sex = "Male" AND NEW.weight <= 8.5 THEN "Severely Underweight"
                                    WHEN NEW.sex = "Male" AND NEW.weight >= 8.5 AND NEW.weight <= 8.6 THEN "Underweight"
                                    WHEN NEW.sex = "Male" AND NEW.weight > 8.6 THEN "Normal"
                                    WHEN NEW.sex = "Female" AND NEW.weight <= 7.9 THEN "Severely Underweight"
                                    WHEN NEW.sex = "Female" AND NEW.weight >= 7.9 AND NEW.weight <= 8.0 THEN "Underweight"
                                    WHEN NEW.sex = "Female" AND NEW.weight > 8.0 THEN "Normal"
                                    ELSE "Exceeded Data Range"
                                END
                            WHEN 24 THEN 
                                CASE 
                                    WHEN NEW.sex = "Male" AND NEW.weight <= 8.6 THEN "Severely Underweight"
                                    WHEN NEW.sex = "Male" AND NEW.weight >= 8.6 AND NEW.weight <= 8.7 THEN "Underweight"
                                    WHEN NEW.sex = "Male" AND NEW.weight > 8.7 THEN "Normal"
                                    WHEN NEW.sex = "Female" AND NEW.weight <= 8.1 THEN "Severely Underweight"
                                    WHEN NEW.sex = "Female" AND NEW.weight >= 8.1 AND NEW.weight <= 8.2 THEN "Underweight"
                                    WHEN NEW.sex = "Female" AND NEW.weight > 8.2 THEN "Normal"
                                    ELSE "Exceeded Data Range"
                                END
                            WHEN 25 THEN 
                                CASE 
                                    WHEN NEW.sex = "Male" AND NEW.weight <= 8.8 THEN "Severely Underweight"
                                    WHEN NEW.sex = "Male" AND NEW.weight >= 8.8 AND NEW.weight <= 8.9 THEN "Underweight"
                                    WHEN NEW.sex = "Male" AND NEW.weight > 8.9 THEN "Normal"
                                    WHEN NEW.sex = "Female" AND NEW.weight <= 8.2 THEN "Severely Underweight"
                                    WHEN NEW.sex = "Female" AND NEW.weight >= 8.2 AND NEW.weight <= 8.3 THEN "Underweight"
                                    WHEN NEW.sex = "Female" AND NEW.weight > 8.3 THEN "Normal"
                                    ELSE "Exceeded Data Range"
                                END
                            WHEN 26 THEN 
                                CASE 
                                    WHEN NEW.sex = "Male" AND NEW.weight <= 8.9 THEN "Severely Underweight"
                                    WHEN NEW.sex = "Male" AND NEW.weight >= 8.9 AND NEW.weight <= 9.0 THEN "Underweight"
                                    WHEN NEW.sex = "Male" AND NEW.weight > 9.0 THEN "Normal"
                                    WHEN NEW.sex = "Female" AND NEW.weight <= 8.4 THEN "Severely Underweight"
                                    WHEN NEW.sex = "Female" AND NEW.weight >= 8.4 AND NEW.weight <= 8.5 THEN "Underweight"
                                    WHEN NEW.sex = "Female" AND NEW.weight > 8.5 THEN "Normal"
                                    ELSE "Exceeded Data Range"
                                END
                            WHEN 27 THEN 
                                CASE 
                                    WHEN NEW.sex = "Male" AND NEW.weight <= 9.0 THEN "Severely Underweight"
                                    WHEN NEW.sex = "Male" AND NEW.weight >= 9.0 AND NEW.weight <= 9.1 THEN "Underweight"
                                    WHEN NEW.sex = "Male" AND NEW.weight > 9.1 THEN "Normal"
                                    WHEN NEW.sex = "Female" AND NEW.weight <= 8.5 THEN "Severely Underweight"
                                    WHEN NEW.sex = "Female" AND NEW.weight >= 8.5 AND NEW.weight <= 8.6 THEN "Underweight"
                                    WHEN NEW.sex = "Female" AND NEW.weight > 8.6 THEN "Normal"
                                    ELSE "Exceeded Data Range"
                                END
                            WHEN 28 THEN 
                                CASE 
                                    WHEN NEW.sex = "Male" AND NEW.weight <= 9.1 THEN "Severely Underweight"
                                    WHEN NEW.sex = "Male" AND NEW.weight >= 9.1 AND NEW.weight <= 9.2 THEN "Underweight"
                                    WHEN NEW.sex = "Male" AND NEW.weight > 9.2 THEN "Normal"
                                    WHEN NEW.sex = "Female" AND NEW.weight <= 8.6 THEN "Severely Underweight"
                                    WHEN NEW.sex = "Female" AND NEW.weight >= 8.6 AND NEW.weight <= 8.7 THEN "Underweight"
                                    WHEN NEW.sex = "Female" AND NEW.weight > 8.7 THEN "Normal"
                                    ELSE "Exceeded Data Range"
                                END
                            WHEN 29 THEN 
                                CASE 
                                    WHEN NEW.sex = "Male" AND NEW.weight <= 9.2 THEN "Severely Underweight"
                                    WHEN NEW.sex = "Male" AND NEW.weight >= 9.2 AND NEW.weight <= 9.3 THEN "Underweight"
                                    WHEN NEW.sex = "Male" AND NEW.weight > 9.3 THEN "Normal"
                                    WHEN NEW.sex = "Female" AND NEW.weight <= 8.8 THEN "Severely Underweight"
                                    WHEN NEW.sex = "Female" AND NEW.weight >= 8.8 AND NEW.weight <= 8.9 THEN "Underweight"
                                    WHEN NEW.sex = "Female" AND NEW.weight > 8.9 THEN "Normal"
                                    ELSE "Exceeded Data Range"
                                END
                            WHEN 30 THEN 
                                CASE 
                                    WHEN NEW.sex = "Male" AND NEW.weight <= 9.4 THEN "Severely Underweight"
                                    WHEN NEW.sex = "Male" AND NEW.weight >= 9.4 AND NEW.weight <= 9.5 THEN "Underweight"
                                    WHEN NEW.sex = "Male" AND NEW.weight > 9.5 THEN "Normal"
                                    WHEN NEW.sex = "Female" AND NEW.weight <= 8.9 THEN "Severely Underweight"
                                    WHEN NEW.sex = "Female" AND NEW.weight >= 8.9 AND NEW.weight <= 9.0 THEN "Underweight"
                                    WHEN NEW.sex = "Female" AND NEW.weight > 9.0 THEN "Normal"
                                    ELSE "Exceeded Data Range"
                                END
                            WHEN 31 THEN 
                                CASE 
                                    WHEN NEW.sex = "Male" AND NEW.weight <= 9.5 THEN "Severely Underweight"
                                    WHEN NEW.sex = "Male" AND NEW.weight >= 9.5 AND NEW.weight <= 9.6 THEN "Underweight"
                                    WHEN NEW.sex = "Male" AND NEW.weight > 9.6 THEN "Normal"
                                    WHEN NEW.sex = "Female" AND NEW.weight <= 9.0 THEN "Severely Underweight"
                                    WHEN NEW.sex = "Female" AND NEW.weight >= 9.0 AND NEW.weight <= 9.1 THEN "Underweight"
                                    WHEN NEW.sex = "Female" AND NEW.weight > 9.1 THEN "Normal"
                                    ELSE "Exceeded Data Range"
                                END
                            WHEN 32 THEN 
                                CASE 
                                    WHEN NEW.sex = "Male" AND NEW.weight <= 9.6 THEN "Severely Underweight"
                                    WHEN NEW.sex = "Male" AND NEW.weight >= 9.6 AND NEW.weight <= 9.7 THEN "Underweight"
                                    WHEN NEW.sex = "Male" AND NEW.weight > 9.7 THEN "Normal"
                                    WHEN NEW.sex = "Female" AND NEW.weight <= 9.1 THEN "Severely Underweight"
                                    WHEN NEW.sex = "Female" AND NEW.weight >= 9.1 AND NEW.weight <= 9.2 THEN "Underweight"
                                    WHEN NEW.sex = "Female" AND NEW.weight > 9.2 THEN "Normal"
                                    ELSE "Exceeded Data Range"
                                END
                            WHEN 33 THEN 
                                CASE 
                                    WHEN NEW.sex = "Male" AND NEW.weight <= 9.7 THEN "Severely Underweight"
                                    WHEN NEW.sex = "Male" AND NEW.weight >= 9.7 AND NEW.weight <= 9.8 THEN "Underweight"
                                    WHEN NEW.sex = "Male" AND NEW.weight > 9.8 THEN "Normal"
                                    WHEN NEW.sex = "Female" AND NEW.weight <= 9.3 THEN "Severely Underweight"
                                    WHEN NEW.sex = "Female" AND NEW.weight >= 9.3 AND NEW.weight <= 9.4 THEN "Underweight"
                                    WHEN NEW.sex = "Female" AND NEW.weight > 9.4 THEN "Normal"
                                    ELSE "Exceeded Data Range"
                                END
                            WHEN 34 THEN 
                                CASE 
                                    WHEN NEW.sex = "Male" AND NEW.weight <= 9.8 THEN "Severely Underweight"
                                    WHEN NEW.sex = "Male" AND NEW.weight >= 9.8 AND NEW.weight <= 9.9 THEN "Underweight"
                                    WHEN NEW.sex = "Male" AND NEW.weight > 9.9 THEN "Normal"
                                    WHEN NEW.sex = "Female" AND NEW.weight <= 9.4 THEN "Severely Underweight"
                                    WHEN NEW.sex = "Female" AND NEW.weight >= 9.4 AND NEW.weight <= 9.5 THEN "Underweight"
                                    WHEN NEW.sex = "Female" AND NEW.weight > 9.5 THEN "Normal"
                                    ELSE "Exceeded Data Range"
                                END
                            WHEN 35 THEN 
                                CASE 
                                    WHEN NEW.sex = "Male" AND NEW.weight <= 9.9 THEN "Severely Underweight"
                                    WHEN NEW.sex = "Male" AND NEW.weight >= 9.9 AND NEW.weight <= 10.0 THEN "Underweight"
                                    WHEN NEW.sex = "Male" AND NEW.weight > 10.0 THEN "Normal"
                                    WHEN NEW.sex = "Female" AND NEW.weight <= 9.5 THEN "Severely Underweight"
                                    WHEN NEW.sex = "Female" AND NEW.weight >= 9.5 AND NEW.weight <= 9.6 THEN "Underweight"
                                    WHEN NEW.sex = "Female" AND NEW.weight > 9.6 THEN "Normal"
                                    ELSE "Exceeded Data Range"
                                END
                            WHEN 36 THEN 
                                CASE 
                                    WHEN NEW.sex = "Male" AND NEW.weight <= 10.0 THEN "Severely Underweight"
                                    WHEN NEW.sex = "Male" AND NEW.weight >= 10.0 AND NEW.weight <= 10.1 THEN "Underweight"
                                    WHEN NEW.sex = "Male" AND NEW.weight > 10.1 THEN "Normal"
                                    WHEN NEW.sex = "Female" AND NEW.weight <= 9.6 THEN "Severely Underweight"
                                    WHEN NEW.sex = "Female" AND NEW.weight >= 9.6 AND NEW.weight <= 9.7 THEN "Underweight"
                                    WHEN NEW.sex = "Female" AND NEW.weight > 9.7 THEN "Normal"
                                    ELSE "Exceeded Data Range"
                                END
                            WHEN 37 THEN 
                                CASE 
                                    WHEN NEW.sex = "Male" AND NEW.weight <= 10.1 THEN "Severely Underweight"
                                    WHEN NEW.sex = "Male" AND NEW.weight >= 10.1 AND NEW.weight <= 10.2 THEN "Underweight"
                                    WHEN NEW.sex = "Male" AND NEW.weight > 10.2 THEN "Normal"
                                    WHEN NEW.sex = "Female" AND NEW.weight <= 9.7 THEN "Severely Underweight"
                                    WHEN NEW.sex = "Female" AND NEW.weight >= 9.7 AND NEW.weight <= 9.8 THEN "Underweight"
                                    WHEN NEW.sex = "Female" AND NEW.weight > 9.8 THEN "Normal"
                                    ELSE "Exceeded Data Range"
                                END
                            WHEN 38 THEN 
                                CASE 
                                    WHEN NEW.sex = "Male" AND NEW.weight <= 10.2 THEN "Severely Underweight"
                                    WHEN NEW.sex = "Male" AND NEW.weight >= 10.2 AND NEW.weight <= 10.3 THEN "Underweight"
                                    WHEN NEW.sex = "Male" AND NEW.weight > 10.3 THEN "Normal"
                                    WHEN NEW.sex = "Female" AND NEW.weight <= 9.8 THEN "Severely Underweight"
                                    WHEN NEW.sex = "Female" AND NEW.weight >= 9.8 AND NEW.weight <= 9.9 THEN "Underweight"
                                    WHEN NEW.sex = "Female" AND NEW.weight > 9.9 THEN "Normal"
                                    ELSE "Exceeded Data Range"
                                END
                            WHEN 39 THEN 
                                CASE 
                                    WHEN NEW.sex = "Male" AND NEW.weight <= 10.3 THEN "Severely Underweight"
                                    WHEN NEW.sex = "Male" AND NEW.weight >= 10.3 AND NEW.weight <= 10.4 THEN "Underweight"
                                    WHEN NEW.sex = "Male" AND NEW.weight > 10.4 THEN "Normal"
                                    WHEN NEW.sex = "Female" AND NEW.weight <= 9.9 THEN "Severely Underweight"
                                    WHEN NEW.sex = "Female" AND NEW.weight >= 9.9 AND NEW.weight <= 10.0 THEN "Underweight"
                                    WHEN NEW.sex = "Female" AND NEW.weight > 10.0 THEN "Normal"
                                    ELSE "Exceeded Data Range"
                                END
                            WHEN 40 THEN 
                                CASE 
                                    WHEN NEW.sex = "Male" AND NEW.weight <= 10.4 THEN "Severely Underweight"
                                    WHEN NEW.sex = "Male" AND NEW.weight >= 10.4 AND NEW.weight <= 10.5 THEN "Underweight"
                                    WHEN NEW.sex = "Male" AND NEW.weight > 10.5 THEN "Normal"
                                    WHEN NEW.sex = "Female" AND NEW.weight <= 10.1 THEN "Severely Underweight"
                                    WHEN NEW.sex = "Female" AND NEW.weight >= 10.1 AND NEW.weight <= 10.2 THEN "Underweight"
                                    WHEN NEW.sex = "Female" AND NEW.weight > 10.2 THEN "Normal"
                                    ELSE "Exceeded Data Range"
                                END
                            WHEN 41 THEN 
                                CASE 
                                    WHEN NEW.sex = "Male" AND NEW.weight <= 10.5 THEN "Severely Underweight"
                                    WHEN NEW.sex = "Male" AND NEW.weight >= 10.5 AND NEW.weight <= 10.6 THEN "Underweight"
                                    WHEN NEW.sex = "Male" AND NEW.weight > 10.6 THEN "Normal"
                                    WHEN NEW.sex = "Female" AND NEW.weight <= 10.2 THEN "Severely Underweight"
                                    WHEN NEW.sex = "Female" AND NEW.weight >= 10.2 AND NEW.weight <= 10.3 THEN "Underweight"
                                    WHEN NEW.sex = "Female" AND NEW.weight > 10.3 THEN "Normal"
                                    ELSE "Exceeded Data Range"
                                END
                            WHEN 42 THEN 
                                CASE 
                                    WHEN NEW.sex = "Male" AND NEW.weight <= 10.6 THEN "Severely Underweight"
                                    WHEN NEW.sex = "Male" AND NEW.weight >= 10.6 AND NEW.weight <= 10.7 THEN "Underweight"
                                    WHEN NEW.sex = "Male" AND NEW.weight > 10.7 THEN "Normal"
                                    WHEN NEW.sex = "Female" AND NEW.weight <= 10.3 THEN "Severely Underweight"
                                    WHEN NEW.sex = "Female" AND NEW.weight >= 10.3 AND NEW.weight <= 10.4 THEN "Underweight"
                                    WHEN NEW.sex = "Female" AND NEW.weight > 10.4 THEN "Normal"
                                    ELSE "Exceeded Data Range"
                                END
                            WHEN 43 THEN 
                                CASE 
                                    WHEN NEW.sex = "Male" AND NEW.weight <= 10.7 THEN "Severely Underweight"
                                    WHEN NEW.sex = "Male" AND NEW.weight >= 10.7 AND NEW.weight <= 10.8 THEN "Underweight"
                                    WHEN NEW.sex = "Male" AND NEW.weight > 10.8 THEN "Normal"
                                    WHEN NEW.sex = "Female" AND NEW.weight <= 10.4 THEN "Severely Underweight"
                                    WHEN NEW.sex = "Female" AND NEW.weight >= 10.4 AND NEW.weight <= 10.5 THEN "Underweight"
                                    WHEN NEW.sex = "Female" AND NEW.weight > 10.5 THEN "Normal"
                                    ELSE "Exceeded Data Range"
                                END
                            WHEN 44 THEN 
                                CASE 
                                    WHEN NEW.sex = "Male" AND NEW.weight <= 10.8 THEN "Severely Underweight"
                                    WHEN NEW.sex = "Male" AND NEW.weight >= 10.8 AND NEW.weight <= 10.9 THEN "Underweight"
                                    WHEN NEW.sex = "Male" AND NEW.weight > 10.9 THEN "Normal"
                                    WHEN NEW.sex = "Female" AND NEW.weight <= 10.5 THEN "Severely Underweight"
                                    WHEN NEW.sex = "Female" AND NEW.weight >= 10.5 AND NEW.weight <= 10.6 THEN "Underweight"
                                    WHEN NEW.sex = "Female" AND NEW.weight > 10.6 THEN "Normal"
                                    ELSE "Exceeded Data Range"
                                END
                            WHEN 45 THEN 
                                CASE 
                                    WHEN NEW.sex = "Male" AND NEW.weight <= 10.9 THEN "Severely Underweight"
                                    WHEN NEW.sex = "Male" AND NEW.weight >= 10.9 AND NEW.weight <= 11.0 THEN "Underweight"
                                    WHEN NEW.sex = "Male" AND NEW.weight > 11.0 THEN "Normal"
                                    WHEN NEW.sex = "Female" AND NEW.weight <= 10.6 THEN "Severely Underweight"
                                    WHEN NEW.sex = "Female" AND NEW.weight >= 10.6 AND NEW.weight <= 10.7 THEN "Underweight"
                                    WHEN NEW.sex = "Female" AND NEW.weight > 10.7 THEN "Normal"
                                    ELSE "Exceeded Data Range"
                                END
                            WHEN 46 THEN 
                                CASE 
                                    WHEN NEW.sex = "Male" AND NEW.weight <= 11.0 THEN "Severely Underweight"
                                    WHEN NEW.sex = "Male" AND NEW.weight >= 11.0 AND NEW.weight <= 11.1 THEN "Underweight"
                                    WHEN NEW.sex = "Male" AND NEW.weight > 11.1 THEN "Normal"
                                    WHEN NEW.sex = "Female" AND NEW.weight <= 10.7 THEN "Severely Underweight"
                                    WHEN NEW.sex = "Female" AND NEW.weight >= 10.7 AND NEW.weight <= 10.8 THEN "Underweight"
                                    WHEN NEW.sex = "Female" AND NEW.weight > 10.8 THEN "Normal"
                                    ELSE "Exceeded Data Range"
                                END
                            WHEN 47 THEN 
                                CASE 
                                    WHEN NEW.sex = "Male" AND NEW.weight <= 11.1 THEN "Severely Underweight"
                                    WHEN NEW.sex = "Male" AND NEW.weight >= 11.1 AND NEW.weight <= 11.2 THEN "Underweight"
                                    WHEN NEW.sex = "Male" AND NEW.weight > 11.2 THEN "Normal"
                                    WHEN NEW.sex = "Female" AND NEW.weight <= 10.8 THEN "Severely Underweight"
                                    WHEN NEW.sex = "Female" AND NEW.weight >= 10.8 AND NEW.weight <= 10.9 THEN "Underweight"
                                    WHEN NEW.sex = "Female" AND NEW.weight > 10.9 THEN "Normal"
                                    ELSE "Exceeded Data Range"
                                END
                            WHEN 48 THEN 
                                CASE 
                                    WHEN NEW.sex = "Male" AND NEW.weight <= 11.2 THEN "Severely Underweight"
                                    WHEN NEW.sex = "Male" AND NEW.weight >= 11.2 AND NEW.weight <= 11.3 THEN "Underweight"
                                    WHEN NEW.sex = "Male" AND NEW.weight > 11.3 THEN "Normal"
                                    WHEN NEW.sex = "Female" AND NEW.weight <= 10.9 THEN "Severely Underweight"
                                    WHEN NEW.sex = "Female" AND NEW.weight >= 10.9 AND NEW.weight <= 11.0 THEN "Underweight"
                                    WHEN NEW.sex = "Female" AND NEW.weight > 11.0 THEN "Normal"
                                    ELSE "Exceeded Data Range"
                                END
                            WHEN 49 THEN 
                                CASE 
                                    WHEN NEW.sex = "Male" AND NEW.weight <= 11.3 THEN "Severely Underweight"
                                    WHEN NEW.sex = "Male" AND NEW.weight >= 11.3 AND NEW.weight <= 11.4 THEN "Underweight"
                                    WHEN NEW.sex = "Male" AND NEW.weight > 11.4 THEN "Normal"
                                    WHEN NEW.sex = "Female" AND NEW.weight <= 11.0 THEN "Severely Underweight"
                                    WHEN NEW.sex = "Female" AND NEW.weight >= 11.0 AND NEW.weight <= 11.1 THEN "Underweight"
                                    WHEN NEW.sex = "Female" AND NEW.weight > 11.1 THEN "Normal"
                                    ELSE "Exceeded Data Range"
                                END
                            WHEN 50 THEN 
                                CASE 
                                    WHEN NEW.sex = "Male" AND NEW.weight <= 11.4 THEN "Severely Underweight"
                                    WHEN NEW.sex = "Male" AND NEW.weight >= 11.4 AND NEW.weight <= 11.5 THEN "Underweight"
                                    WHEN NEW.sex = "Male" AND NEW.weight > 11.5 THEN "Normal"
                                    WHEN NEW.sex = "Female" AND NEW.weight <= 11.1 THEN "Severely Underweight"
                                    WHEN NEW.sex = "Female" AND NEW.weight >= 11.1 AND NEW.weight <= 11.2 THEN "Underweight"
                                    WHEN NEW.sex = "Female" AND NEW.weight > 11.2 THEN "Normal"
                                    ELSE "Exceeded Data Range"
                                END
                            WHEN 51 THEN 
                                CASE 
                                    WHEN NEW.sex = "Male" AND NEW.weight <= 11.5 THEN "Severely Underweight"
                                    WHEN NEW.sex = "Male" AND NEW.weight >= 11.5 AND NEW.weight <= 11.6 THEN "Underweight"
                                    WHEN NEW.sex = "Male" AND NEW.weight > 11.6 THEN "Normal"
                                    WHEN NEW.sex = "Female" AND NEW.weight <= 11.2 THEN "Severely Underweight"
                                    WHEN NEW.sex = "Female" AND NEW.weight >= 11.2 AND NEW.weight <= 11.3 THEN "Underweight"
                                    WHEN NEW.sex = "Female" AND NEW.weight > 11.3 THEN "Normal"
                                    ELSE "Exceeded Data Range"
                                END
                            WHEN 52 THEN 
                                CASE 
                                    WHEN NEW.sex = "Male" AND NEW.weight <= 11.6 THEN "Severely Underweight"
                                    WHEN NEW.sex = "Male" AND NEW.weight >= 11.6 AND NEW.weight <= 11.7 THEN "Underweight"
                                    WHEN NEW.sex = "Male" AND NEW.weight > 11.7 THEN "Normal"
                                    WHEN NEW.sex = "Female" AND NEW.weight <= 11.3 THEN "Severely Underweight"
                                    WHEN NEW.sex = "Female" AND NEW.weight >= 11.3 AND NEW.weight <= 11.4 THEN "Underweight"
                                    WHEN NEW.sex = "Female" AND NEW.weight > 11.4 THEN "Normal"
                                    ELSE "Exceeded Data Range"
                                END
                            WHEN 53 THEN 
                                CASE 
                                    WHEN NEW.sex = "Male" AND NEW.weight <= 11.7 THEN "Severely Underweight"
                                    WHEN NEW.sex = "Male" AND NEW.weight >= 11.7 AND NEW.weight <= 11.8 THEN "Underweight"
                                    WHEN NEW.sex = "Male" AND NEW.weight > 11.8 THEN "Normal"
                                    WHEN NEW.sex = "Female" AND NEW.weight <= 11.4 THEN "Severely Underweight"
                                    WHEN NEW.sex = "Female" AND NEW.weight >= 11.4 AND NEW.weight <= 11.5 THEN "Underweight"
                                    WHEN NEW.sex = "Female" AND NEW.weight > 11.5 THEN "Normal"
                                    ELSE "Exceeded Data Range"
                                END
                            WHEN 54 THEN 
                                CASE 
                                    WHEN NEW.sex = "Male" AND NEW.weight <= 11.8 THEN "Severely Underweight"
                                    WHEN NEW.sex = "Male" AND NEW.weight >= 11.8 AND NEW.weight <= 11.9 THEN "Underweight"
                                    WHEN NEW.sex = "Male" AND NEW.weight > 11.9 THEN "Normal"
                                    WHEN NEW.sex = "Female" AND NEW.weight <= 11.5 THEN "Severely Underweight"
                                    WHEN NEW.sex = "Female" AND NEW.weight >= 11.5 AND NEW.weight <= 11.6 THEN "Underweight"
                                    WHEN NEW.sex = "Female" AND NEW.weight > 11.6 THEN "Normal"
                                    ELSE "Exceeded Data Range"
                                END
                            WHEN 55 THEN 
                                CASE 
                                    WHEN NEW.sex = "Male" AND NEW.weight <= 11.9 THEN "Severely Underweight"
                                    WHEN NEW.sex = "Male" AND NEW.weight >= 11.9 AND NEW.weight <= 12.0 THEN "Underweight"
                                    WHEN NEW.sex = "Male" AND NEW.weight > 12.0 THEN "Normal"
                                    WHEN NEW.sex = "Female" AND NEW.weight <= 11.6 THEN "Severely Underweight"
                                    WHEN NEW.sex = "Female" AND NEW.weight >= 11.6 AND NEW.weight <= 11.7 THEN "Underweight"
                                    WHEN NEW.sex = "Female" AND NEW.weight > 11.7 THEN "Normal"
                                    ELSE "Exceeded Data Range"
                                END
                            WHEN 56 THEN 
                                CASE 
                                    WHEN NEW.sex = "Male" AND NEW.weight <= 12.0 THEN "Severely Underweight"
                                    WHEN NEW.sex = "Male" AND NEW.weight >= 12.0 AND NEW.weight <= 12.1 THEN "Underweight"
                                    WHEN NEW.sex = "Male" AND NEW.weight > 12.1 THEN "Normal"
                                    WHEN NEW.sex = "Female" AND NEW.weight <= 11.7 THEN "Severely Underweight"
                                    WHEN NEW.sex = "Female" AND NEW.weight >= 11.7 AND NEW.weight <= 11.8 THEN "Underweight"
                                    WHEN NEW.sex = "Female" AND NEW.weight > 11.8 THEN "Normal"
                                    ELSE "Exceeded Data Range"
                                END
                            WHEN 57 THEN 
                                CASE 
                                    WHEN NEW.sex = "Male" AND NEW.weight <= 12.1 THEN "Severely Underweight"
                                    WHEN NEW.sex = "Male" AND NEW.weight >= 12.1 AND NEW.weight <= 12.2 THEN "Underweight"
                                    WHEN NEW.sex = "Male" AND NEW.weight > 12.2 THEN "Normal"
                                    WHEN NEW.sex = "Female" AND NEW.weight <= 11.8 THEN "Severely Underweight"
                                    WHEN NEW.sex = "Female" AND NEW.weight >= 11.8 AND NEW.weight <= 11.9 THEN "Underweight"
                                    WHEN NEW.sex = "Female" AND NEW.weight > 11.9 THEN "Normal"
                                    ELSE "Exceeded Data Range"
                                END
                            WHEN 58 THEN 
                                CASE 
                                    WHEN NEW.sex = "Male" AND NEW.weight <= 12.2 THEN "Severely Underweight"
                                    WHEN NEW.sex = "Male" AND NEW.weight >= 12.2 AND NEW.weight <= 12.3 THEN "Underweight"
                                    WHEN NEW.sex = "Male" AND NEW.weight > 12.3 THEN "Normal"
                                    WHEN NEW.sex = "Female" AND NEW.weight <= 11.9 THEN "Severely Underweight"
                                    WHEN NEW.sex = "Female" AND NEW.weight >= 11.9 AND NEW.weight <= 12.0 THEN "Underweight"
                                    WHEN NEW.sex = "Female" AND NEW.weight > 12.0 THEN "Normal"
                                    ELSE "Exceeded Data Range"
                                END
                            WHEN 59 THEN 
                                CASE 
                                    WHEN NEW.sex = "Male" AND NEW.weight <= 12.3 THEN "Severely Underweight"
                                    WHEN NEW.sex = "Male" AND NEW.weight >= 12.3 AND NEW.weight <= 12.4 THEN "Underweight"
                                    WHEN NEW.sex = "Male" AND NEW.weight > 12.4 THEN "Normal"
                                    WHEN NEW.sex = "Female" AND NEW.weight <= 12.0 THEN "Severely Underweight"
                                    WHEN NEW.sex = "Female" AND NEW.weight >= 12.0 AND NEW.weight <= 12.1 THEN "Underweight"
                                    WHEN NEW.sex = "Female" AND NEW.weight > 12.1 THEN "Normal"
                                    ELSE "Exceeded Data Range"
                                END
                            WHEN 60 THEN 
                                CASE 
                                    WHEN NEW.sex = "Male" AND NEW.weight <= 12.4 THEN "Severely Underweight"
                                    WHEN NEW.sex = "Male" AND NEW.weight >= 12.4 AND NEW.weight <= 12.5 THEN "Underweight"
                                    WHEN NEW.sex = "Male" AND NEW.weight > 12.5 THEN "Normal"
                                    WHEN NEW.sex = "Female" AND NEW.weight <= 12.1 THEN "Severely Underweight"
                                    WHEN NEW.sex = "Female" AND NEW.weight >= 12.1 AND NEW.weight <= 12.2 THEN "Underweight"
                                    WHEN NEW.sex = "Female" AND NEW.weight > 12.2 THEN "Normal"
                                    ELSE "Exceeded Data Range"
                                END
                            ELSE "Exceeded Data Range"
                        END;
                    END;
            '
        );
    }

    public function down(): void
    {
        Schema::dropIfExists('individual_records');
    }
};
