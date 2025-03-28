<div>
    <!-- header -->
    <h1 class="font-bold mb-2 text-xs">Desktop PC/Laptop Maintenance Task Sheet for the Month of April, 2025</h1>

    <!-- equipment information -->
    <div class="mb-2">
        <div class="flex w-full gap-2 text-xs">
            <p class="font-bold w-44">Equipment Type</p>
            <p>: {{ $equipment->equipment_type->name }}</p>
        </div>
        <div class="flex w-full gap-2 text-xs">
            <p class="font-bold w-44">Brand</p>
            <p>: {{ $equipment->brand }}</p>
        </div>
        <div class="flex w-full gap-2 text-xs">
            <p class="font-bold w-44">Model</p>
            <p>: {{ $equipment->model }}</p>
        </div>
        <div class="flex w-full gap-2 text-xs">
            <p class="font-bold w-44">Acquired Date</p>
            <p>: {{ $equipment->acquired_date ?? "Unknown" }}</p>
        </div>
        <div class="flex w-full gap-2 text-xs">
            <p class="font-bold w-44">Serial Number</p>
            <p>: {{ $equipment->serial_number }}</p>
        </div>
        <div class="flex w-full gap-2 text-xs">
            <p class="font-bold w-44">MR No.</p>
            <p>: {{ $equipment->mr_no }}</p>
        </div>
        <div class="flex w-full gap-2 text-xs">
            <p class="font-bold w-44">Person Accountable</p>
            <p>: {{ $equipment->employee->lastname }}, {{ $equipment->employee->firstname }}</p>
        </div>
    </div>

    <!-- Main Tasks Table -->
    <table class="w-full mb-8 border-collapse border border-black text-sm leading-4">
        <thead>
            <tr class="bg-gray-100 text-xs">
                <th class="py-1 px-2 w-36 border border-black text-center">Task</th>
                <th class="py-1 px-2 w-72 border border-black text-center">Description</th>
                <th class=" py-1 px-2 w-12 border border-black">OK</th>
                <th class=" py-1 px-2 w-12 border border-black">Repair</th>
                <th class=" py-1 px-2 w-12 border border-black">N/A</th>
                <th class=" py-1 px-2 border border-black">Remarks</th>
            </tr>
        </thead>

        <tbody>
            <tr class="bg-black">
                <td colspan="6" class="p-2 border border-black font-bold"></td>
            </tr>

            <!-- System Boot -->
            <tr class="text-xs">
                <td class="py-1 px-2 border border-black text-center" rowspan="2">1. System Boot</td>
                <td class="py-1 px-2 border border-black">
                    a. Boot system from a cold start. Monitor for errors and speed of entire boot process.
                    <br>
                    <br>
                    <span class="text-[0.625rem]">(Normal boot up time are <strong>30 secs</strong> to
                        <strong>60 seconds</strong> until the desktop shows up. Start the timer when the any
                        logo/text appeared on the screen, or when after pressing specific key to proceed)</span>
                </td>
                <td class="py-1 px-2 border border-black text-center">
                    @if($equipment_pm->system_boot_status_a === "ok")
                        <span class="font-bold text-lg">&check;</span>
                    @endif
                </td>
                <td class="py-1 px-2 border border-black text-center">
                    @if($equipment_pm->system_boot_status_a === "repair")
                        <span class="font-bold text-lg">&check;</span>
                    @endif
                </td>
                <td class="py-1 px-2 border border-black text-center">
                    @if($equipment_pm->system_boot_status_a === "n/a")
                        <span class="font-bold text-lg">&check;</span>
                    @endif
                </td>
                <td class="py-1 px-2 border border-black">
                    {{ $equipment_pm->system_boot_remarks_a }}
                </td>
            </tr>

            <tr class="text-xs">
                <td class="py-1 px-2 border border-black">
                    b. Verify Startup apps
                    <br>
                    <br>
                    <span class="text-[0.625rem]">(Check for apps that were enabled in Startup Settings.
                        Disable apps that seems unnecessary.
                        To verify Startup apps, <strong>Open Task Manager</strong> (Ctrl+Shift+Esc), then click the
                        <strong>Startup Tab</strong>. To disable apps, click the selected app, then click the
                        <strong>Disable button</strong> on bottom-left corner.)</span>
                </td>
                <td class="py-1 px-2 border border-black text-center">
                    @if($equipment_pm->system_boot_status_b === "ok")
                        <span class="font-bold text-lg">&check;</span>
                    @endif
                </td>
                <td class="py-1 px-2 border border-black text-center">
                    @if($equipment_pm->system_boot_status_b === "repair")
                        <span class="font-bold text-lg">&check;</span>
                    @endif
                </td>
                <td class="py-1 px-2 border border-black text-center">
                    @if($equipment_pm->system_boot_status_b === "n/a")
                        <span class="font-bold text-lg">&check;</span>
                    @endif
                </td>
                <td class="py-1 px-2 border border-black">
                    {{ $equipment_pm->system_boot_remarks_b }}
                </td>
            </tr>

            <!-- Network Settings -->
            <tr class="text-xs">
                <td class="py-1 px-2 border border-black text-center" rowspan="4">2. Network Settings</td>
                <td class="py-1 px-2 border border-black">
                    a. Verify IP address is correct
                    <br>
                    <br>
                    <span class="text-[0.625rem]">(For LAN, The IP address settings should have the correct VLAN segment
                        for the
                        section.
                        Must be <strong>10.127.xx.1-254</strong>, where xx is the assigned VLAN of that
                        division/section. See table on
                        page 2 for list of VLAN per division/section)
                    </span>
                </td>
                <td class="py-1 px-2 border border-black text-center">
                    @if($equipment_pm->network_settings_status_a === "ok")
                        <span class="font-bold text-lg">&check;</span>
                    @endif
                </td>
                <td class="py-1 px-2 border border-black text-center">
                    @if($equipment_pm->network_settings_status_a === "repair")
                        <span class="font-bold text-lg">&check;</span>
                    @endif
                </td>
                <td class="py-1 px-2 border border-black text-center">
                    @if($equipment_pm->network_settings_status_a === "n/a")
                        <span class="font-bold text-lg">&check;</span>
                    @endif
                </td>
                <td class="py-1 px-2 border border-black">
                    {{ $equipment_pm->network_settings_remarks_a }}
                </td>
            </tr>

            <tr class="text-xs">
                <td class="py-1 px-2 border border-black">
                    b. Verify Startup apps
                    <br>
                    <br>
                    <span class="text-[0.625rem]">(The Domain Name must be <strong>“pnri.dost.gov.ph”</strong>. Go to
                        <strong>
                            Settings >
                            Network &
                            Internet > Network Properties
                        </strong>)</span>
                </td>
                <td class="py-1 px-2 border border-black text-center">
                    @if($equipment_pm->network_settings_status_b === "ok")
                        <span class="font-bold text-lg">&check;</span>
                    @endif
                </td>
                <td class="py-1 px-2 border border-black text-center">
                    @if($equipment_pm->network_settings_status_b === "repair")
                        <span class="font-bold text-lg">&check;</span>
                    @endif
                </td>
                <td class="py-1 px-2 border border-black text-center">
                    @if($equipment_pm->network_settings_status_b === "n/a")
                        <span class="font-bold text-lg">&check;</span>
                    @endif
                </td>
                <td class="py-1 px-2 border border-black">
                    {{ $equipment_pm->network_settings_remarks_b }}
                </td>
            </tr>

            <tr class="text-xs">
                <td class="py-1 px-2 border border-black">
                    c. Verify Firewall Setting
                    <br>
                    <br>
                    <span class="text-[0.625rem]">(The “Microsoft Defenders Firewall” should be set turned “On” and the
                        “System
                        Protection for Windows” should be turned “On”.)</span>
                </td>
                <td class="py-1 px-2 border border-black text-center">
                    @if($equipment_pm->network_settings_status_c === "ok")
                        <span class="font-bold text-lg">&check;</span>
                    @endif
                </td>
                <td class="py-1 px-2 border border-black text-center">
                    @if($equipment_pm->network_settings_status_c === "repair")
                        <span class="font-bold text-lg">&check;</span>
                    @endif
                </td>
                <td class="py-1 px-2 border border-black text-center">
                    @if($equipment_pm->network_settings_status_c === "n/a")
                        <span class="font-bold text-lg">&check;</span>
                    @endif
                </td>
                <td class="py-1 px-2 border border-black">
                    {{ $equipment_pm->network_settings_remarks_c }}
                </td>
            </tr>

            <tr class="text-xs">
                <td class="py-1 px-2 border border-black">
                    d. Verify Computer Name
                    <br>
                    <br>
                    <span class="text-[0.625rem]">(The “Computer Name” should be unique to the user and should follow
                        the
                        required format of “Section-Username”, ex. MISS-rjaluspo.)</span>
                </td>
                <td class="py-1 px-2 border border-black text-center">
                    @if($equipment_pm->network_settings_status_d === "ok")
                        <span class="font-bold text-lg">&check;</span>
                    @endif
                </td>
                <td class="py-1 px-2 border border-black text-center">
                    @if($equipment_pm->network_settings_status_d === "repair")
                        <span class="font-bold text-lg">&check;</span>
                    @endif
                </td>
                <td class="py-1 px-2 border border-black text-center">
                    @if($equipment_pm->network_settings_status_d === "n/a")
                        <span class="font-bold text-lg">&check;</span>
                    @endif
                </td>
                <td class="py-1 px-2 border border-black">
                    {{ $equipment_pm->network_settings_remarks_d }}
                </td>
            </tr>

            <!-- Computer Hardware Settings -->
            <tr class="text-xs">
                <td class="py-1 px-2 border border-black text-center">3. Computer Hardware Settings </td>
                <td class="py-1 px-2 border border-black">
                    a. Verify Device Manager settings (Windows OS)
                    <br>
                    <br>
                    <span class="text-[0.625rem]">(Verify Device Manager settings and check for any errors or any yellow
                        triangle icon, which means there are issues with the driver/hardware. Open <strong>Device
                            Manager</strong> to
                        verify these settings.)
                    </span>
                </td>
                <td class="py-1 px-2 border border-black text-center">
                    @if($equipment_pm->computer_hardware_settings_status_a === "ok")
                        <span class="font-bold text-lg">&check;</span>
                    @endif
                </td>
                <td class="py-1 px-2 border border-black text-center">
                    @if($equipment_pm->computer_hardware_settings_status_a === "repair")
                        <span class="font-bold text-lg">&check;</span>
                    @endif
                </td>
                <td class="py-1 px-2 border border-black text-center">
                    @if($equipment_pm->computer_hardware_settings_status_a === "n/a")
                        <span class="font-bold text-lg">&check;</span>
                    @endif
                </td>
                <td class="py-1 px-2 border border-black">
                    {{ $equipment_pm->computer_hardware_settings_remarks_a }}
                </td>
            </tr>

            <!-- Antivirus -->
            <tr class="text-xs">
                <td class="py-1 px-2 border border-black text-center">4. Antivirus</td>
                <td class="py-1 px-2 border border-black">
                    a. Verify Antivirus Software
                    <br>
                    <br>
                    <span class="text-[0.625rem]">(Check for any antivirus software enabled on the PC, If no antivirus,
                        check if
                        Windows Defender is enabled. Open <strong>Settings > Windows Security > Virus & Threat
                            Protection</strong> to
                        verify)
                    </span>
                </td>
                <td class="py-1 px-2 border border-black text-center">
                    @if($equipment_pm->antivirus_status_a === "ok")
                        <span class="font-bold text-lg">&check;</span>
                    @endif
                </td>
                <td class="py-1 px-2 border border-black text-center">
                    @if($equipment_pm->antivirus_status_a === "repair")
                        <span class="font-bold text-lg">&check;</span>
                    @endif
                </td>
                <td class="py-1 px-2 border border-black text-center">
                    @if($equipment_pm->antivirus_status_a === "n/a")
                        <span class="font-bold text-lg">&check;</span>
                    @endif
                </td>
                <td class="py-1 px-2 border border-black">
                    {{ $equipment_pm->antivirus_remarks_a }}
                </td>
            </tr>

            <!-- Proper Software loads -->
            <tr class="text-xs">
                <td class="py-1 px-2 border border-black text-center">5. Proper Software loads</td>
                <td class="py-1 px-2 border border-black">
                    a. Verify all required software is installed and operating correctly. Remove unauthorized software
                    <br>
                    <br>
                    <span class="text-[0.625rem]">(Only essential office or work-related software are installed and
                        operating
                        correctly. Remove unauthorized software. Open <strong>Control Panel > Programs > Programs &
                            Features</strong> for
                        list of installed programs)
                    </span>
                </td>
                <td class="py-1 px-2 border border-black text-center">
                    @if($equipment_pm->proper_hardware_loads_status_a === "ok")
                        <span class="font-bold text-lg">&check;</span>
                    @endif
                </td>
                <td class="py-1 px-2 border border-black text-center">
                    @if($equipment_pm->proper_hardware_loads_status_a === "repair")
                        <span class="font-bold text-lg">&check;</span>
                    @endif
                </td>
                <td class="py-1 px-2 border border-black text-center">
                    @if($equipment_pm->proper_hardware_loads_status_a === "n/a")
                        <span class="font-bold text-lg">&check;</span>
                    @endif
                </td>
                <td class="py-1 px-2 border border-black">
                    {{ $equipment_pm->proper_hardware_loads_remarks_a }}
                </td>
            </tr>


            <!-- Operating System Checkup -->
            <tr class="text-xs">
                <td class="py-1 px-2 border border-black text-center">6. Operating System Checkup</td>
                <td class="py-1 px-2 border border-black">
                    a. Run sfc /scannow to verify system files.
                    <br>
                    <br>
                    <span class="text-[0.625rem]">(Verify system files and check for errors. Open <strong>Command
                            Prompt</strong>, select <strong>run as
                            administrator</strong>, type <strong>sfc /scannow</strong> and wait for result)
                    </span>
                </td>
                <td class="py-1 px-2 border border-black text-center">
                    @if($equipment_pm->operating_system_checkup_status_a === "ok")
                        <span class="font-bold text-lg">&check;</span>
                    @endif
                </td>
                <td class="py-1 px-2 border border-black text-center">
                    @if($equipment_pm->operating_system_checkup_status_a === "repair")
                        <span class="font-bold text-lg">&check;</span>
                    @endif
                </td>
                <td class="py-1 px-2 border border-black text-center">
                    @if($equipment_pm->operating_system_checkup_status_a === "n/a")
                        <span class="font-bold text-lg">&check;</span>
                    @endif
                </td>
                <td class="py-1 px-2 border border-black">
                    {{ $equipment_pm->operating_system_checkup_remarks_a }}
                </td>
            </tr>

            <!-- Disk Cleanup -->
            <tr class="text-xs">
                <td class="py-1 px-2 border border-black text-center">7. Disk Checkup</td>
                <td class="py-1 px-2 border border-black">
                    a. Run a scandisk, including surface scan.
                    <br>
                    <br>
                    <span class="text-[0.625rem]">run scandisk and check for errors if any (run <strong>
                            CMD
                        </strong> as admin, type: <strong>chkdsk /i</strong> )
                    </span>
                </td>
                <td class="py-1 px-2 border border-black text-center">
                    @if($equipment_pm->disk_checkup_status_a === "ok")
                        <span class="font-bold text-lg">&check;</span>
                    @endif
                </td>
                <td class="py-1 px-2 border border-black text-center">
                    @if($equipment_pm->disk_checkup_status_a === "repair")
                        <span class="font-bold text-lg">&check;</span>
                    @endif
                </td>
                <td class="py-1 px-2 border border-black text-center">
                    @if($equipment_pm->disk_checkup_status_a === "n/a")
                        <span class="font-bold text-lg">&check;</span>
                    @endif
                </td>
                <td class="py-1 px-2 border border-black">
                    {{ $equipment_pm->disk_checkup_remarks_a }}
                </td>
            </tr>

            <!-- Physical Cleaning -->
            <tr class="text-xs">
                <td class="py-1 px-2 border border-black text-center">8. Physical Cleaning</td>
                <td class="py-1 px-2 border border-black">
                    a. Physical Cleaning
                    <br>
                    <br>
                    <span class="text-[0.625rem]">(Simply check any dust/dirt on the outside surface of the PC,
                        ventilation,
                        keyboard and mouse.)
                    </span>
                </td>
                <td class="py-1 px-2 border border-black text-center">
                    @if($equipment_pm->physical_cleaning_status_a === "ok")
                        <span class="font-bold text-lg">&check;</span>
                    @endif
                </td>
                <td class="py-1 px-2 border border-black text-center">
                    @if($equipment_pm->physical_cleaning_status_a === "repair")
                        <span class="font-bold text-lg">&check;</span>
                    @endif
                </td>
                <td class="py-1 px-2 border border-black text-center">
                    @if($equipment_pm->physical_cleaning_status_a === "n/a")
                        <span class="font-bold text-lg">&check;</span>
                    @endif
                </td>
                <td class="py-1 px-2 border border-black">
                    {{ $equipment_pm->physical_cleaning_remarks_a }}
                </td>
            </tr>

            <!-- Hardware Inspection -->
            <tr class="text-xs">
                <td class="py-1 px-2 border border-black text-center">9. Hardware Inspection</td>
                <td class="py-1 px-2 border border-black">
                    a. Verify physical hardware issues
                    <br>
                    <br>
                    <span class="text-[0.625rem]">Open <strong>Speccy</strong> and check the following:
                        <br>
                        <strong>CPU temperature</strong> - normal value: between <strong>150 to 160</strong> degrees
                        Fahrenheit (<strong>65 to 70</strong>
                        degrees
                        Celsius).
                        <br>
                        <strong>RAM</strong> – normal value: threshold of <strong>80%</strong> memory usage.
                        <br>
                        <strong>Motherboard</strong> – temperature normal value: between <strong>68</strong> degrees and
                        <strong>176</strong> degrees
                        Fahrenheit (<strong>20</strong>
                        degrees to <strong>80</strong> degrees Celsius).
                        <br>
                        <strong>Hard Disk Drive</strong> - The <strong>normal hard disk temperature</strong> is
                        <strong>25C –
                            45C.</strong> Having
                        slightly higher or lower
                        HDD temperature is still safe, but it will potentially reduce your hard drive lifespan and
                        reliability.
                    </span>
                </td>
                <td class="py-1 px-2 border border-black text-center">
                    @if($equipment_pm->hardware_inspection_status_a === "ok")
                        <span class="font-bold text-lg">&check;</span>
                    @endif
                </td>
                <td class="py-1 px-2 border border-black text-center">
                    @if($equipment_pm->hardware_inspection_status_a === "repair")
                        <span class="font-bold text-lg">&check;</span>
                    @endif
                </td>
                <td class="py-1 px-2 border border-black text-center">
                    @if($equipment_pm->hardware_inspection_status_a === "n/a")
                        <span class="font-bold text-lg">&check;</span>
                    @endif
                </td>
                <td class="py-1 px-2 border border-black">
                    {{ $equipment_pm->hardware_inspection_remarks_a }}
                </td>
            </tr>

            <!-- Password Security -->
            <tr class="text-xs">
                <td class="py-1 px-2 border border-black text-center">10. Password Security</td>
                <td class="py-1 px-2 border border-black">
                    a. Verify strong user password security
                    <br>
                    <br>
                    <span class="text-[0.625rem]">(Check if the PC requires user login strong password.)
                    </span>
                </td>
                <td class="py-1 px-2 border border-black text-center">
                    @if($equipment_pm->password_security_status_a === "ok")
                        <span class="font-bold text-lg">&check;</span>
                    @endif
                </td>
                <td class="py-1 px-2 border border-black text-center">
                    @if($equipment_pm->password_security_status_a === "repair")
                        <span class="font-bold text-lg">&check;</span>
                    @endif
                </td>
                <td class="py-1 px-2 border border-black text-center">
                    @if($equipment_pm->password_security_status_a === "n/a")
                        <span class="font-bold text-lg">&check;</span>
                    @endif
                </td>
                <td class="py-1 px-2 border border-black">
                    {{ $equipment_pm->password_security_remarks_a }}
                </td>
            </tr>

            <!-- User Accounts -->
            <tr class="text-xs">
                <td class="py-1 px-2 border border-black text-center">11. User Accounts</td>
                <td class="py-1 px-2 border border-black">
                    a. Verify single user account
                    <br>
                    <br>
                    <span class="text-[0.625rem]">(Verify single user account, excluding Administrator account and
                        inspect if
                        desktop notes contain exposed passwords)
                    </span>
                </td>
                <td class="py-1 px-2 border border-black text-center">
                    @if($equipment_pm->user_accounts_status_a === "ok")
                        <span class="font-bold text-lg">&check;</span>
                    @endif
                </td>
                <td class="py-1 px-2 border border-black text-center">
                    @if($equipment_pm->user_accounts_status_a === "repair")
                        <span class="font-bold text-lg">&check;</span>
                    @endif
                </td>
                <td class="py-1 px-2 border border-black text-center">
                    @if($equipment_pm->user_accounts_status_a === "n/a")
                        <span class="font-bold text-lg">&check;</span>
                    @endif
                </td>
                <td class="py-1 px-2 border border-black">
                    {{ $equipment_pm->user_accounts_remarks_a }}
                </td>
            </tr>

            <tr class="bg-black">
                <td colspan="6" class="p-2 border border-black font-bold"></td>
            </tr>

            <!-- Summary  -->
            <tr class="text-xs">
                <td class="py-1 px-2 border border-black text-center">12. Summary</td>
                <td class="py-1 px-2 border border-black">
                    a. Verify acceptable PC status
                    <br>
                    <br>
                    <span class="text-[0.625rem]">(Provide summary for overall performance and condition of
                        Desktop/Laptop)
                    </span>
                </td>
                <td class="py-1 px-2 border border-black text-center">
                    @if($equipment_pm->summary_status_a === "ok")
                        <span class="font-bold text-lg">&check;</span>
                    @endif
                </td>
                <td class="py-1 px-2 border border-black text-center">
                    @if($equipment_pm->summary_status_a === "repair")
                        <span class="font-bold text-lg">&check;</span>
                    @endif
                </td>
                <td class="py-1 px-2 border border-black text-center">
                    @if($equipment_pm->summary_status_a === "n/a")
                        <span class="font-bold text-lg">&check;</span>
                    @endif
                </td>
                <td class="py-1 px-2 border border-black">
                    {{ $equipment_pm->summary_remarks_a }}
                </td>
            </tr>
        </tbody>
    </table>

    <!-- additional data -->
    <div class="grid grid-cols-2 text-xs">
        <p> <span class="font-bold">Date conducted:</span> {{ $equipment_pm->created_at->format('F d, Y')}}</p>
        <div class="grid grid-cols-2 gap-y-4 gap-x-1">

            <span class="font-bold text-right">End user verification:
            </span>
            <p class="text-left line-clamp-1">
                {{ $equipment_pm->end_user_verification }}
            </p>

            <span class="font-bold text-right">Position:</span>
            <p class="text-left">{{ $equipment_pm->position }}</p>

            <span class="font-bold text-right">Section and Division:</span>
            <p class="text-left">
                {{ $division_section->division->division_code }}/{{ $division_section->unit_code }}
            </p>
        </div>
    </div>
</div>