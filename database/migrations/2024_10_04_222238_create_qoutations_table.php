<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQoutationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('qoutations', function (Blueprint $table) {
            $table->id();
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('email')->nullable();
            $table->string('contact_number')->nullable();
            $table->date('date_of_birth')->nullable();
            $table->string('gender')->nullable(); // Consider using enum for predefined values
            $table->string('occupation')->nullable();
            $table->string('work_address')->nullable();
            $table->string('work_email')->nullable();
            $table->string('insurance_type')->nullable();
            $table->decimal('coverage_amount', 10, 2)->default(0);// Adjust precision as necessary
            $table->string('premium_payment')->nullable(); // Consider using enum for predefined values
            $table->longText('description')->nullable(); // Consider using enum for predefined values
            $table->timestamps(); // Includes created_at and updated_at
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('qoutations');
    }
}
