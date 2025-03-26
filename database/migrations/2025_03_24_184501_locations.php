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
        Schema::create('locations', function (Blueprint $table) {
            $table->bigIncrements('location_id'); // Auto-increment primary key
            $table->string('name')->unique(); // Name column
            $table->text('remarks')->nullable(); // Remarks (optional)
            $table->boolean('status')->default(1); // Status (default to active)
            $table->timestamps(); // created_at & updated_at
        });
    }

    public function down()
    {
        Schema::dropIfExists('locations');
    }
};
