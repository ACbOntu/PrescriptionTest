<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePrescriptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prescriptions', function (Blueprint $table) {
            $table->increments('id');
            $table->date('date');
            $table->string('patient_name');
            $table->unsignedInteger('patient_age');
            $table->integer('gender')->default(1)->comment('0=female|1=male|2=others');
            $table->text('diagnosis');
            $table->text('medicines');
            $table->unsignedInteger('user_id')->nullable();
            $table->date('next_visit')->nullable();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('prescriptions');
    }
}
