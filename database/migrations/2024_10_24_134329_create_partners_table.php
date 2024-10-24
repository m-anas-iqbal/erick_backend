<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePartnersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('partners', function (Blueprint $table) {
            $table->id();
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('social_security_number')->nullable();
            $table->string('contact_number')->nullable();
            $table->string('lines_of_authority')->nullable();
            $table->string('years_of_experience')->nullable();
            $table->string('previous_employers')->nullable();
            $table->string('agency_company_name')->nullable();
            $table->string('position_title')->nullable();
            $table->string('employment_status')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('partners');
    }
}
