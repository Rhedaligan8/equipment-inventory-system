<div class="flex flex-col gap-2 overflow-auto">
    <!-- header -->
    <h1 class="font-bold text-xl font-inter mb-2">
        Desktop PC/Laptop Maintenance Task Sheet For the Month of {{ date('F')  }}, {{  date('Y') }}
    </h1>
    <!-- system boot -->
    <div>
        <h2 class="font-bold text-lg">1. System Boot</h2>
        <div class="flex flex-col gap-2">
            <!-- a -->
            <div>
                <h3>a. Boot system from a cold start. Monitor for errors and speed of entire boot
                    process.</h3>
                <h4 class="my-2 text-sm">(For LAN, The IP address settings should have the
                    correct VLAN segment for the section.
                    Must be <b>10.127.xx.1-254</b>, where xx is the
                    assigned VLAN of that division/section. See table
                    on page 2 for list of VLAN per division/section )
                </h4>
                <div class="flex flex-col gap-2">
                    <select wire:model.defer="system_boot_status_a"
                        class="select select-neutral focus:ring-0 focus:outline-none">
                        <option value="">Select status</option>
                        <option value="ok">OK</option>
                        <option value="repair">Repair</option>
                        <option value="n/a">N/A</option>
                    </select>
                    @error('system_boot_status_a') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    <textarea wire:model.defer="system_boot_remarks_a"
                        class="textarea textarea-neutral focus:ring-0 focus:outline-none"
                        placeholder="Remarks"></textarea>
                </div>
            </div>
            <!-- b -->
            <div>
                <h3>b. Verify Startup Apps</h3>
                <h4 class="my-2 text-sm">(Check for apps that were enabled in Startup Settings. Disable apps
                    that seems unnecessary. To verify Startup apps, <b>Open Task Manager</b>
                    (Ctrl+Shift+Esc),
                    then click the <b>Startup Tab.</b> To disable apps, click that selected app, then click
                    the
                    <b>Disable button</b> on bottom-left corner.)
                </h4>
                <div class="flex flex-col gap-2">
                    <select wire:model.defer="system_boot_status_b"
                        class="select select-neutral focus:ring-0 focus:outline-none">
                        <option value="">Select status</option>
                        <option value="ok">OK</option>
                        <option value="repair">Repair</option>
                        <option value="n/a">N/A</option>
                    </select>
                    @error('system_boot_status_b') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    <textarea wire:model.defer="system_boot_remarks_b"
                        class="textarea textarea-neutral focus:ring-0 focus:outline-none"
                        placeholder="Remarks"></textarea>
                </div>
            </div>
        </div>
    </div>
    <!-- network settings -->
    <div>
        <h2 class="font-bold text-lg">2. Network Settings</h2>
        <div class="flex flex-col gap-2">
            <!-- a -->
            <div>
                <h3>a. Verify IP address is correct.</h3>
                <h4 class="my-2 text-sm">(Normal boot up time are 30secs to 60secs until the desktop shows
                    up.
                    Start
                    the timer when the
                    any logo/text appeared on the screen, or when after pressing specific ke to proceed)
                </h4>
                <div class="flex flex-col gap-2">
                    <select wire:model.defer="network_settings_status_a"
                        class="select select-neutral focus:ring-0 focus:outline-none">
                        <option value="">Select status</option>
                        <option value="ok">OK</option>
                        <option value="repair">Repair</option>
                        <option value="n/a">N/A</option>
                    </select>
                    @error('network_settings_status_a') <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                    <textarea wire:model.defer="network_settings_remarks_a"
                        class="textarea textarea-neutral focus:ring-0 focus:outline-none"
                        placeholder="Remarks"></textarea>
                </div>
            </div>
            <!-- b -->
            <div>
                <h3>b. Verify Domain Name</h3>
                <h4 class="my-2 text-sm">(The Domain Name must be “<b>pnri.dost.gov.ph</b>”.
                    <b>Go to Settings &gt; Network &amp; Internet &gt; Network
                        Properties</b>)
                </h4>
                <div class="flex flex-col gap-2">
                    <select wire:model.defer="network_settings_status_b"
                        class="select select-neutral focus:ring-0 focus:outline-none">
                        <option value="">Select status
                        </option>
                        <option value="ok">OK</option>
                        <option value="repair">Repair</option>
                        <option value="n/a">N/A</option>
                    </select>
                    @error('network_settings_status_b') <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                    <textarea wire:model.defer="network_settings_remarks_b"
                        class="textarea textarea-neutral focus:ring-0 focus:outline-none"
                        placeholder="Remarks"></textarea>
                </div>
            </div>
            <!-- c -->
            <div>
                <h3>c. Verify Firewall Setting</h3>
                <h4 class="my-2 text-sm">(The “Microsoft Defenders Firewall” should be
                    set turned “On” and the “System Protection for
                    Windows” should be turned “On”.)
                </h4>
                <div class="flex flex-col gap-2">
                    <select wire:model.defer="network_settings_status_c"
                        class="select select-neutral focus:ring-0 focus:outline-none">
                        <option value="">Select status</option>
                        <option value="ok">OK</option>
                        <option value="repair">Repair</option>
                        <option value="n/a">N/A</option>
                    </select>
                    @error('network_settings_status_c') <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                    <textarea wire:model.defer="network_settings_remarks_c"
                        class="textarea textarea-neutral focus:ring-0 focus:outline-none"
                        placeholder="Remarks"></textarea>
                </div>
            </div>
            <!-- d -->
            <div>
                <h3>d. Verify Computer Name</h3>
                <h4 class="my-2 text-sm">(The “Computer Name” should be unique to the
                    user and should follow the required format of
                    “Section-Username”, ex. MISS-rjaluspo.)
                </h4>
                <div class="flex flex-col gap-2">
                    <select wire:model.defer="network_settings_status_d"
                        class="select select-neutral focus:ring-0 focus:outline-none">
                        <option value="">Select status</option>
                        <option value="ok">OK</option>
                        <option value="repair">Repair</option>
                        <option value="n/a">N/A</option>
                    </select>
                    @error('network_settings_status_d') <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                    <textarea wire:model.defer="network_settings_remarks_d"
                        class="textarea textarea-neutral focus:ring-0 focus:outline-none"
                        placeholder="Remarks"></textarea>
                </div>
            </div>
        </div>
    </div>
    <!-- computer hardware settings -->
    <div>
        <h2 class="font-bold text-lg">3. Computer Hardware Settings</h2>
        <div class="flex flex-col gap-2">
            <!-- a -->
            <div>
                <h3>a. Verify Device Manager settings (Windows OS).</h3>
                <h4 class="my-2 text-sm">(Verify Device Manager settings and check for
                    any errors or any yellow triangle icon, which
                    means there are issues with the
                    driver/hardware. Open <b>Device Manager</b> to verify
                    these settings.)
                </h4>
                <div class="flex flex-col gap-2">
                    <select wire:model.defer="computer_hardware_settings_status_a"
                        class="select select-neutral focus:ring-0 focus:outline-none">
                        <option value="">Select status</option>
                        <option value="ok">OK</option>
                        <option value="repair">Repair</option>
                        <option value="n/a">N/A</option>
                    </select>
                    @error('computer_hardware_settings_status_a') <span
                        class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                    <textarea wire:model.defer="computer_hardware_settings_remarks_a"
                        class="textarea textarea-neutral focus:ring-0 focus:outline-none"
                        placeholder="Remarks"></textarea>
                </div>
            </div>
        </div>
    </div>
    <!-- antivirus -->
    <div>
        <h2 class="font-bold text-lg">4. Antivirus</h2>
        <div class="flex flex-col gap-2">
            <div>
                <h3>a. Verify Antivirus Software</h3>
                <h4 class="my-2 text-sm">(Check for any antivirus software enabled on the PC, If no
                    antivirus, check if Windows Defender is enabled. Open <b>Settings > Windows Security >
                        Virus & Threat Protection</b> to verify)</h4>
                <div class="flex flex-col gap-2">
                    <select wire:model.defer="antivirus_status_a"
                        class="select select-neutral focus:ring-0 focus:outline-none">
                        <option value="">Select status</option>
                        <option value="ok">OK</option>
                        <option value="repair">Repair</option>
                        <option value="n/a">N/A</option>
                    </select>
                    @error('antivirus_status_a') <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                    <textarea wire:model.defer="antivirus_remarks_a"
                        class="textarea textarea-neutral focus:ring-0 focus:outline-none"
                        placeholder="Remarks"></textarea>
                </div>
            </div>
        </div>
    </div>

    <!-- proper software loads -->
    <div>
        <h2 class="font-bold text-lg">5. Proper Software Loads</h2>
        <div class="flex flex-col gap-2">
            <div>
                <h3>a. Verify all required software is installed and operating correctly. Remove
                    unauthorized software</h3>
                <h4 class="my-2 text-sm">(Only essential office or work-related software are installed and
                    operating correctly. Remove unauthorized software. Open <b>Control Panel > Programs >
                        Programs & Features</b> for list of installed programs)</h4>
                <div class="flex flex-col gap-2">
                    <select wire:model.defer="proper_hardware_loads_status_a"
                        class="select select-neutral focus:ring-0 focus:outline-none">
                        <option value="">Select status</option>
                        <option value="ok">OK</option>
                        <option value="repair">Repair</option>
                        <option value="n/a">N/A</option>
                    </select>
                    @error('proper_hardware_loads_status_a') <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                    <textarea wire:model.defer="proper_hardware_loads_remarks_a"
                        class="textarea textarea-neutral focus:ring-0 focus:outline-none"
                        placeholder="Remarks"></textarea>
                </div>
            </div>
        </div>
    </div>

    <!-- operating system checkup -->
    <div>
        <h2 class="font-bold text-lg">6. Operating System Checkup</h2>
        <div class="flex flex-col gap-2">
            <div>
                <h3>a. Run sfc /scannow to verify system files</h3>
                <h4 class="my-2 text-sm">(Verify system files and check for errors. Open <b>Command Prompt</b>,
                    select <b>run as administrator</b>, type <b>sfc /scannow</b> and wait for result)</h4>
                <div class="flex flex-col gap-2">
                    <select wire:model.defer="operating_system_checkup_status_a"
                        class="select select-neutral focus:ring-0 focus:outline-none">
                        <option value="">Select status</option>
                        <option value="ok">OK</option>
                        <option value="repair">Repair</option>
                        <option value="n/a">N/A</option>
                    </select>
                    @error('operating_system_checkup_status_a') <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                    <textarea wire:model.defer="operating_system_checkup_remarks_a"
                        class="textarea textarea-neutral focus:ring-0 focus:outline-none"
                        placeholder="Remarks"></textarea>
                </div>
            </div>
        </div>
    </div>

    <!-- disk checkup -->
    <div>
        <h2 class="font-bold text-lg">7. Disk Checkup</h2>
        <div class="flex flex-col gap-2">
            <div>
                <h3>a. Run a scandisk, including surface scan</h3>
                <h4 class="my-2 text-sm">(run scandisk and check for errors if any (run <b>CMD</b> as admin, type:
                    <b>chkdsk /i</b>))
                </h4>
                <div class="flex flex-col gap-2">
                    <select wire:model.defer="disk_checkup_status_a"
                        class="select select-neutral focus:ring-0 focus:outline-none">
                        <option value="">Select status</option>
                        <option value="ok">OK</option>
                        <option value="repair">Repair</option>
                        <option value="n/a">N/A</option>
                    </select>
                    @error('disk_checkup_status_a') <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                    <textarea wire:model.defer="disk_checkup_remarks_a"
                        class="textarea textarea-neutral focus:ring-0 focus:outline-none"
                        placeholder="Remarks"></textarea>
                </div>
            </div>
        </div>
    </div>

    <!-- physical cleaning -->
    <div>
        <h2 class="font-bold text-lg">8. Physical Cleaning</h2>
        <div class="flex flex-col gap-2">
            <div>
                <h3>a. Physical Cleaning</h3>
                <h4 class="my-2 text-sm">(Simply check any dust/dirt on the outside surface of the PC,
                    ventilation, keyboard and mouse.)</h4>
                <div class="flex flex-col gap-2">
                    <select wire:model.defer="physical_cleaning_status_a"
                        class="select select-neutral focus:ring-0 focus:outline-none">
                        <option value="">Select status</option>
                        <option value="ok">OK</option>
                        <option value="repair">Repair</option>
                        <option value="n/a">N/A</option>
                    </select>
                    @error('physical_cleaning_status_a') <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                    <textarea wire:model.defer="physical_cleaning_remarks_a"
                        class="textarea textarea-neutral focus:ring-0 focus:outline-none"
                        placeholder="Remarks"></textarea>
                </div>
            </div>
        </div>
    </div>

    <!-- hardware inspection -->
    <div>
        <h2 class="font-bold text-lg">9. Hardware Inspection</h2>
        <div class="flex flex-col gap-2">
            <div>
                <h3>a. Verify physical hardware issues</h3>
                <h4 class="my-2 text-sm">(Open <b>Speccy</b> and check the following:
                    <br>
                    <b>CPU temperature</b> - normal value: between <b>150</b> to <b>160</b> degrees Fahrenheit
                    (<b>65</b> to <b>70</b> degrees
                    Celsius).
                    <br>
                    <b>RAM</b> – normal value: threshold of <b>80%</b> memory usage.
                    <br>
                    <b>Motherboard</b> – temperature normal value: between <b>68</b> degrees and <b>176</b> degrees
                    Fahrenheit
                    (<b>20</b> degrees to <b>80</b> degrees Celsius).
                    <br>
                    <b>Hard Disk Drive</b> - The <b>normal hard disk temperature</b> is <b>25C – 45C</b>. Having
                    slightly higher
                    or lower HDD temperature is still safe, but it will potentially reduce your hard drive
                    lifespan and reliability.)
                </h4>
                <div class="flex flex-col gap-2">
                    <select wire:model.defer="hardware_inspection_status_a"
                        class="select select-neutral focus:ring-0 focus:outline-none">
                        <option value="">Select status</option>
                        <option value="ok">OK</option>
                        <option value="repair">Repair</option>
                        <option value="n/a">N/A</option>
                    </select>
                    @error('hardware_inspection_status_a') <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                    <textarea wire:model.defer="hardware_inspection_remarks_a"
                        class="textarea textarea-neutral focus:ring-0 focus:outline-none"
                        placeholder="Remarks"></textarea>
                </div>
            </div>
        </div>
    </div>

    <!-- password security -->
    <div>
        <h2 class="font-bold text-lg">10. Password Security</h2>
        <div class="flex flex-col gap-2">
            <div>
                <h3>a. Verify strong user password security</h3>
                <h4 class="my-2 text-sm">(Check if the PC requires user login strong password.)</h4>
                <div class="flex flex-col gap-2">
                    <select wire:model.defer="password_security_status_a"
                        class="select select-neutral focus:ring-0 focus:outline-none">
                        <option value="">Select status</option>
                        <option value="ok">OK</option>
                        <option value="repair">Repair</option>
                        <option value="n/a">N/A</option>
                    </select>
                    @error('password_security_status_a') <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                    <textarea wire:model.defer="password_security_remarks_a"
                        class="textarea textarea-neutral focus:ring-0 focus:outline-none"
                        placeholder="Remarks"></textarea>
                </div>
            </div>
        </div>
    </div>

    <!-- user accounts -->
    <div>
        <h2 class="font-bold text-lg">11. User Accounts</h2>
        <div class="flex flex-col gap-2">
            <div>
                <h3>a. Verify single user account</h3>
                <h4 class="my-2 text-sm">(Verify single user account, excluding Administrator account and
                    inspect if desktop notes contain exposed passwords)</h4>
                <div class="flex flex-col gap-2">
                    <select wire:model.defer="user_accounts_status_a"
                        class="select select-neutral focus:ring-0 focus:outline-none">
                        <option value="">Select status</option>
                        <option value="ok">OK</option>
                        <option value="repair">Repair</option>
                        <option value="n/a">N/A</option>
                    </select>
                    @error('user_accounts_status_a') <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                    <textarea wire:model.defer="user_accounts_remarks_a"
                        class="textarea textarea-neutral focus:ring-0 focus:outline-none"
                        placeholder="Remarks"></textarea>
                </div>
            </div>
        </div>
    </div>

    <!-- summary -->
    <div>
        <h2 class="font-bold text-lg">12. Summary</h2>
        <div class="flex flex-col gap-2">
            <div>
                <h3>a. Verify acceptable PC status</h3>
                <h4 class="my-2 text-sm">(Provide summary for overall performance and condition of
                    Desktop/Laptop)</h4>
                <div class="flex flex-col gap-2">
                    <select wire:model.defer="summary_status_a"
                        class="select select-neutral focus:ring-0 focus:outline-none">
                        <option value="">Select status</option>
                        <option value="ok">OK</option>
                        <option value="repair">Repair</option>
                        <option value="n/a">N/A</option>
                    </select>
                    @error('summary_status_a') <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                    <textarea wire:model.defer="summary_remarks_a"
                        class="textarea textarea-neutral focus:ring-0 focus:outline-none"
                        placeholder="Remarks"></textarea>
                </div>
            </div>
        </div>
    </div>
    <!-- additional information -->
    <h2 class="font-bold text-lg">Additional Information</h2>
    <div class="flex flex-col gap-2">
        <!-- <div class="flex flex-col">
            <label for="date_conducted">Date conducted</label>
            <input wire:model.defer="date_conducted" type="date"
                class="input-neutral focus:ring-0 focus:outline-none input">
            @error('date_conducted') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div> -->
        <!-- <div class="flex flex-col">
            <label for="date_conducted">End user verification</label>
            <input placeholder="End user verification" type="text"
                class="input-neutral focus:ring-0 focus:outline-none input">
        </div> -->
        <div class="flex flex-col">
            <label for="position">End user position</label>
            <input wire:model.defer="position" placeholder="Position" id="position" type="text"
                class="input-neutral focus:ring-0 focus:outline-none input">
            @error('position') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>
    </div>
    <button wire:click="submitPM" wire:loading.attr="disabled"
        class="my-4 btn btn-accent text-base-100 flex-start font-bold">SUBMIT</button>
</div>