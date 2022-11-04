<?php

use Brick\Math\BigInteger;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Symfony\Component\Uid\Ulid;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fitness_checking_applications', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('applicant_id');
            $table->unsignedBigInteger('location_id');
            $table->unsignedBigInteger('vehicle_id');
            $table->string('status');
            $table->string('payment_status');
            $table->string('ref')->default('FCA-'.new Ulid());
            $table->timestamps();
            $table->foreign('applicant_id')->references('id')->on('users');
            $table->foreign('location_id')->references('id')->on('fitness_checking_locations');
            $table->foreign('vehicle_id')->references('id')->on('vehicles');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('fitness_checking_applications');
    }
};
