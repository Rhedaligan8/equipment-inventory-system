<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('equipment_types', function (Blueprint $table) {
            $table->id(); // Auto-increment primary key
            $table->string('name')->unique(); // Name column
            $table->text('description')->nullable(); // description (optional)
            $table->boolean('status')->default(1); // Status (default to active)
            $table->timestamps(); // created_at & updated_at
        });
    }

    public function down()
    {
        Schema::dropIfExists('equipment_types');
    }
};
