<div class="h-full flex flex-col">

    <div>
        <button x-on:click="activeTab = 'equipments'" class="btn btn-sm btn-primary text-base-100 self-end mb-2">
            <i class="bi bi-arrow-left-short"> </i>
            GO BACK</button>
    </div>
    @if(!$equipment_id && !$equipment)
        <div class="size-full flex justify-center items-center">
            <div>
                <span class="loading loading-spinner loading-xl"></span>
            </div>
        </div>
    @else
                <div class=" flex flex-col grow overflow-hidden gap-4">
                    <!-- header -->
                    <h1 class="font-bold text-xl font-inter">Desktop PC/Laptop Maintenance Task Sheet For the Month of
                        <select wire:model.defer="month" class="border border-black text-center">
                            <option value="january">January</option>
                            <option value="february">February</option>
                            <option value="march">March</option>
                            <option value="april">April</option>
                            <option value="may">May</option>
                            <option value="june">June</option>
                            <option value="july">July</option>
                            <option value="august">August</option>
                            <option value="september">September</option>
                            <option value="october">October</option>
                            <option value="november">November</option>
                            <option value="december">December</option>
                        </select>
                        -
                        <input wire:model.defer="year" class="border border-black text-center w-24" type="text">
                    </h1>

                    <div class="flex justify-center gap-8 overflow-hidden grow">
                        <!-- PM Form -->
                        <div class="flex flex-col gap-2 overflow-auto">
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
                                            <select class="select select-neutral focus:ring-0 focus:outline-none">
                                                <option disabled selected>Select status</option>
                                                <option>OK</option>
                                                <option>Repair</option>
                                                <option>N/A</option>
                                            </select>
                                            <textarea class="textarea textarea-neutral focus:ring-0 focus:outline-none"
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
                                            <select class="select select-neutral focus:ring-0 focus:outline-none">
                                                <option disabled selected>Select status</option>
                                                <option>OK</option>
                                                <option>Repair</option>
                                                <option>N/A</option>
                                            </select>
                                            <textarea class="textarea textarea-neutral focus:ring-0 focus:outline-none"
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
                                            <select class="select select-neutral focus:ring-0 focus:outline-none">
                                                <option disabled selected>Select status</option>
                                                <option>OK</option>
                                                <option>Repair</option>
                                                <option>N/A</option>
                                            </select>
                                            <textarea class="textarea textarea-neutral focus:ring-0 focus:outline-none"
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
                                            <select class="select select-neutral focus:ring-0 focus:outline-none">
                                                <option disabled selected>Select status</option>
                                                <option>OK</option>
                                                <option>Repair</option>
                                                <option>N/A</option>
                                            </select>
                                            <textarea class="textarea textarea-neutral focus:ring-0 focus:outline-none"
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
                                            <select class="select select-neutral focus:ring-0 focus:outline-none">
                                                <option disabled selected>Select status</option>
                                                <option>OK</option>
                                                <option>Repair</option>
                                                <option>N/A</option>
                                            </select>
                                            <textarea class="textarea textarea-neutral focus:ring-0 focus:outline-none"
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
                                            <select class="select select-neutral focus:ring-0 focus:outline-none">
                                                <option disabled selected>Select status</option>
                                                <option>OK</option>
                                                <option>Repair</option>
                                                <option>N/A</option>
                                            </select>
                                            <textarea class="textarea textarea-neutral focus:ring-0 focus:outline-none"
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
                                            <select class="select select-neutral focus:ring-0 focus:outline-none">
                                                <option disabled selected>Select status</option>
                                                <option>OK</option>
                                                <option>Repair</option>
                                                <option>N/A</option>
                                            </select>
                                            <textarea class="textarea textarea-neutral focus:ring-0 focus:outline-none"
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
                    <h4 class="my-2 text-sm">(Check for any antivirus software enabled on the PC, If no antivirus, check if Windows Defender is enabled. Open Settings > Windows Security > Virus & Threat Protection to verify)</h4>
                    <div class="flex flex-col gap-2">
                        <select class="select select-neutral focus:ring-0 focus:outline-none">
                            <option disabled selected>Select status</option>
                            <option>OK</option>
                            <option>Repair</option>
                            <option>N/A</option>
                        </select>
                        <textarea class="textarea textarea-neutral focus:ring-0 focus:outline-none" placeholder="Remarks"></textarea>
                    </div>
                </div>
            </div>
        </div>

        <!-- proper software loads -->
        <div>
            <h2 class="font-bold text-lg">5. Proper Software Loads</h2>
            <div class="flex flex-col gap-2">
                <div>
                    <h3>a. Verify all required software is installed and operating correctly. Remove unauthorized software</h3>
                    <h4 class="my-2 text-sm">(Only essential office or work-related software are installed and operating correctly. Remove unauthorized software. Open Control Panel > Programs > Programs & Features for list of installed programs)</h4>
                    <div class="flex flex-col gap-2">
                        <select class="select select-neutral focus:ring-0 focus:outline-none">
                            <option disabled selected>Select status</option>
                            <option>OK</option>
                            <option>Repair</option>
                            <option>N/A</option>
                        </select>
                        <textarea class="textarea textarea-neutral focus:ring-0 focus:outline-none" placeholder="Remarks"></textarea>
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
                    <h4 class="my-2 text-sm">(Verify system files and check for errors. Open Command Prompt, select run as administrator, type sfc /scannow and wait for result)</h4>
                    <div class="flex flex-col gap-2">
                        <select class="select select-neutral focus:ring-0 focus:outline-none">
                            <option disabled selected>Select status</option>
                            <option>OK</option>
                            <option>Repair</option>
                            <option>N/A</option>
                        </select>
                        <textarea class="textarea textarea-neutral focus:ring-0 focus:outline-none" placeholder="Remarks"></textarea>
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
                    <h4 class="my-2 text-sm">(run scandisk and check for errors if any (run CMD as admin, type: chkdsk /i))</h4>
                    <div class="flex flex-col gap-2">
                        <select class="select select-neutral focus:ring-0 focus:outline-none">
                            <option disabled selected>Select status</option>
                            <option>OK</option>
                            <option>Repair</option>
                            <option>N/A</option>
                        </select>
                        <textarea class="textarea textarea-neutral focus:ring-0 focus:outline-none" placeholder="Remarks"></textarea>
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
                    <h4 class="my-2 text-sm">(Simply check any dust/dirt on the outside surface of the PC, ventilation, keyboard and mouse.)</h4>
                    <div class="flex flex-col gap-2">
                        <select class="select select-neutral focus:ring-0 focus:outline-none">
                            <option disabled selected>Select status</option>
                            <option>OK</option>
                            <option>Repair</option>
                            <option>N/A</option>
                        </select>
                        <textarea class="textarea textarea-neutral focus:ring-0 focus:outline-none" placeholder="Remarks"></textarea>
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
                    <h4 class="my-2 text-sm">(Open Speccy and check the following:
                    CPU temperature - normal value: between 150 to 160 degrees Fahrenheit (65 to 70 degrees Celsius).
                    RAM – normal value: threshold of 80% memory usage.
                    Motherboard – temperature normal value: between 68 degrees and 176 degrees Fahrenheit (20 degrees to 80 degrees Celsius).
                    Hard Disk Drive - The normal hard disk temperature is 25C – 45C. Having slightly higher or lower HDD temperature is still safe, but it will potentially reduce your hard drive lifespan and reliability.)</h4>
                    <div class="flex flex-col gap-2">
                        <select class="select select-neutral focus:ring-0 focus:outline-none">
                            <option disabled selected>Select status</option>
                            <option>OK</option>
                            <option>Repair</option>
                            <option>N/A</option>
                        </select>
                        <textarea class="textarea textarea-neutral focus:ring-0 focus:outline-none" placeholder="Remarks"></textarea>
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
                        <select class="select select-neutral focus:ring-0 focus:outline-none">
                            <option disabled selected>Select status</option>
                            <option>OK</option>
                            <option>Repair</option>
                            <option>N/A</option>
                        </select>
                        <textarea class="textarea textarea-neutral focus:ring-0 focus:outline-none" placeholder="Remarks"></textarea>
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
                    <h4 class="my-2 text-sm">(Verify single user account, excluding Administrator account and inspect if desktop notes contain exposed passwords)</h4>
                    <div class="flex flex-col gap-2">
                        <select class="select select-neutral focus:ring-0 focus:outline-none">
                            <option disabled selected>Select status</option>
                            <option>OK</option>
                            <option>Repair</option>
                            <option>N/A</option>
                        </select>
                        <textarea class="textarea textarea-neutral focus:ring-0 focus:outline-none" placeholder="Remarks"></textarea>
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
                    <h4 class="my-2 text-sm">(Provide summary for overall performance and condition of Desktop/Laptop)</h4>
                    <div class="flex flex-col gap-2">
                        <select class="select select-neutral focus:ring-0 focus:outline-none">
                            <option disabled selected>Select status</option>
                            <option>OK</option>
                            <option>Repair</option>
                            <option>N/A</option>
                        </select>
                        <textarea class="textarea textarea-neutral focus:ring-0 focus:outline-none" placeholder="Remarks"></textarea>
                    </div>
                </div>
            </div>
        </div>
                        </div>
                        <!-- equipment information -->
                        <div class="flex flex-col gap-2 w-sm shrink-0">
                            <h1 class="text-lg font-bold">Equipment Information</h1>
                            <div class="w-full flex flex-col">
                                <label class="w-36 inline-block ">Equipment Type</label>
                                <input type="text" placeholder="Equipment type"
                                    class="focus:ring-0 focus:outline-none input input-neutral " />
                            </div>
                            <div class="w-full flex flex-col">
                                <label class="w-36 inline-block ">Brand</label>
                                <input type="text" placeholder="Brand"
                                    class="focus:ring-0 focus:outline-none input input-neutral " />
                            </div>
                            <div class="w-full flex flex-col">
                                <label class="w-36 inline-block ">Model</label>
                                <input type="text" placeholder="Model"
                                    class="focus:ring-0 focus:outline-none input input-neutral " />
                            </div>
                            <div class="w-full flex flex-col">
                                <label class="w-36 inline-block ">Acquired Date</label>
                                <input type="text" placeholder="Acquired date"
                                    class="focus:ring-0 focus:outline-none input input-neutral " />
                            </div>
                            <div class="w-full flex flex-col">
                                <label class="w-36 inline-block ">Serial Number</label>
                                <input type="text" placeholder="Serial number"
                                    class="focus:ring-0 focus:outline-none input input-neutral " />
                            </div>
                            <div class="w-full flex flex-col">
                                <label class="w-36 inline-block ">MR No</label>
                                <input type="text" placeholder="MR No"
                                    class="focus:ring-0 focus:outline-none input input-neutral " />
                            </div>
                            <div class="w-full flex flex-col">
                                <label class="w-36 inline-block ">Person Accountable</label>
                                <input type="text" placeholder="Person accountable"
                                    class="focus:ring-0 focus:outline-none input input-neutral " />
                            </div>
                        </div>
                    </div>
                </div>
    @endif
</div>