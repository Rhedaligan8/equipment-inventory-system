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
        Schema::create('desktop_laptop_pm_histories', function (Blueprint $table) {
            $table->id('desktop_laptop_pm_history_id');
            $table->unsignedBigInteger('equipment_id');
            $table->unsignedBigInteger('unit_id');
            $table->string('position');
            $table->string('system_boot_status_a');
            $table->text('system_boot_remarks_a')->nullable();
            $table->string('system_boot_status_b');
            $table->text('system_boot_remarks_b')->nullable();
            $table->string('network_settings_status_a');
            $table->text('network_settings_remarks_a')->nullable();
            $table->string('network_settings_status_b');
            $table->text('network_settings_remarks_b')->nullable();
            $table->string('network_settings_status_c');
            $table->text('network_settings_remarks_c')->nullable();
            $table->string('network_settings_status_d');
            $table->text('network_settings_remarks_d')->nullable();
            $table->string('computer_hardware_settings_status_a');
            $table->text('computer_hardware_settings_remarks_a')->nullable();
            $table->string('antivirus_status_a');
            $table->text('antivirus_remarks_a')->nullable();
            $table->string('proper_hardware_loads_status_a');
            $table->text('proper_hardware_loads_remarks_a')->nullable();
            $table->string('operating_system_checkup_status_a');
            $table->text('operating_system_checkup_remarks_a')->nullable();
            $table->string('disk_checkup_status_a');
            $table->text('disk_checkup_remarks_a')->nullable();
            $table->string('physical_cleaning_status_a');
            $table->text('physical_cleaning_remarks_a')->nullable();
            $table->string('hardware_inspection_status_a');
            $table->text('hardware_inspection_remarks_a')->nullable();
            $table->string('password_security_status_a');
            $table->text('password_security_remarks_a')->nullable();
            $table->string('user_accounts_status_a');
            $table->text('user_accounts_remarks_a')->nullable();
            $table->string('summary_status_a');
            $table->text('summary_remarks_a')->nullable();
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
        Schema::dropIfExists('desktop_laptop_pm_histories');
    }
};
