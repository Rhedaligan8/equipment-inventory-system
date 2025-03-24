<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('equipments', function (Blueprint $table) {
            $table->id('equipment_id');
            $table->unsignedBigInteger('person_accountable_id');
            $table->unsignedBigInteger('equipment_type_id');
            $table->unsignedBigInteger('person_accountable_current_unit_id');
            $table->unsignedBigInteger('location_id');
            $table->string('brand')->nullable();
            $table->string('model')->nullable();
            $table->string('serial_number')->nullable();
            $table->string('mr_no')->nullable();
            $table->text('remarks')->nullable();
            $table->date('acquired_date')->nullable();
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
        Schema::dropIfExists('equipments');
    }
};
