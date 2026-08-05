<div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

    <div class="lg:col-span-2 space-y-6">
        
        <form action="<?= base_url('dashboard/submit-request') ?>" method="POST" class="space-y-6" enctype="multipart/form-data">
            <?= csrf_field() ?>

            <div class="gov-card p-6">
                <div class="flex items-center justify-between border-b border-slate-200 pb-4 mb-6">
                    <div class="flex items-center gap-3">
                        <i class="fas fa-file-signature text-[#e58500] text-2xl"></i>
                        <div>
                            <h2 class="text-xl font-bold text-[#1e4d7b]">New Permission Application</h2>
                            <p class="text-xs text-slate-500 font-medium">Form JPMS-1 · Application for deployment of signal jammers</p>
                        </div>
                    </div>
                </div>

                <div class="space-y-4">
                    <h3 class="text-base font-bold text-[#1e4d7b] flex items-center gap-2 border-b border-slate-100 pb-2">
                        <i class="fas fa-building"></i> Organisation Details
                    </h3>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-semibold text-slate-700 mb-1.5">Name of organisation</label>
                            <input type="text" name="organisation_name" class="w-full px-4 py-2 border border-slate-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#1e4d7b] transition text-sm" placeholder="Enter organisation name" required>
                        </div>
                        <div>
                            <label class="block text-sm font-semibold text-slate-700 mb-1.5">Type of organisation</label>
                            <select name="organisation_type" class="w-full px-4 py-2 border border-slate-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#1e4d7b] transition text-sm bg-white" required>
                                <option value="">Select type of organisation</option>
                                <option value="central-government-department">Central Government Department</option>
                                <option value="state-government-department">State Government Department</option>
                                <option value="autonomous-examination-body">Autonomous Examination Body</option>
                                <option value="public-sector-undertaking">Public Sector Undertaking</option>
                                <option value="university-educational-institution">University / Educational Institution</option>
                                <option value="private-organisation">Private Organisation</option>
                            </select>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-semibold text-slate-700 mb-1.5">Letter number</label>
                            <input type="text" name="letter_number" class="w-full px-4 py-2 border border-slate-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#1e4d7b] transition text-sm" placeholder="e.g. F.No. 11/30/2026-EXAM">
                        </div>
                        <div>
                            <label class="block text-sm font-semibold text-slate-700 mb-1.5">Or upload letter</label>
                            <div class="flex items-center gap-2">
                                <label class="flex-1 cursor-pointer flex items-center justify-center px-4 py-2 border border-dashed border-slate-300 bg-slate-50 hover:bg-slate-100 rounded-lg transition text-slate-600 text-sm font-medium">
                                    <i class="fas fa-upload text-[#1e4d7b] mr-2"></i> Choose file
                                    <input type="file" class="hidden">
                                </label>
                                <span class="text-xs text-slate-400">No file selected</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="gov-card p-6">
                <div class="space-y-4">
                    <h3 class="text-base font-bold text-[#1e4d7b] flex items-center gap-2 border-b border-slate-100 pb-2">
                        <i class="fas fa-graduation-cap"></i> Examination Details
                    </h3>

                    <div>
                        <label class="block text-sm font-semibold text-slate-700 mb-2">Whether request for deployment of jammers is for a single examination?</label>
                        <div class="flex items-center gap-6">
                            <label class="inline-flex items-center cursor-pointer text-sm font-medium text-slate-700">
                                <input type="radio" name="single_exam" value="yes" checked onchange="toggleExamFields(true)" class="w-4 h-4 text-[#1e4d7b] focus:ring-[#1e4d7b]">
                                <span class="ml-2">Yes</span>
                            </label>
                            <label class="inline-flex items-center cursor-pointer text-sm font-medium text-slate-700">
                                <input type="radio" name="single_exam" value="no" onchange="toggleExamFields(false)" class="w-4 h-4 text-[#1e4d7b] focus:ring-[#1e4d7b]">
                                <span class="ml-2">No</span>
                            </label>
                        </div>
                    </div>

                    <div id="single-exam-container" class="space-y-4">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-semibold text-slate-700 mb-1.5">Name of examination</label>
                                <input type="text" name="exam_name" class="w-full px-4 py-2 border border-slate-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#1e4d7b] transition text-sm" placeholder="Enter examination name" required>
                            </div>
                            <div>
                                <label class="block text-sm font-semibold text-slate-700 mb-1.5">Date of examination</label>
                                <div class="relative">
                                    <input type="text" name="exam_date" id="examDateText" placeholder="dd/mm/yyyy" maxlength="10" oninput="formatDateInput(this)" class="w-full px-4 py-2 border border-slate-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#1e4d7b] transition text-sm pr-10" required>
                                    <input type="date" id="examDatePicker" onchange="syncPickerToText(this)" class="absolute right-2 top-1/2 -translate-y-1/2 opacity-0 w-8 h-8 cursor-pointer z-10">
                                    <i class="fas fa-calendar-alt absolute right-3 top-1/2 -translate-y-1/2 text-slate-400 pointer-events-none"></i>
                                </div>
                            </div>
                        </div>

                        <div>
                            <label class="block text-sm font-semibold text-slate-700 mb-1.5">Address of examination</label>
                            <textarea name="exam_address" rows="2" class="w-full px-4 py-2 border border-slate-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#1e4d7b] transition text-sm" placeholder="Enter venue / centre full address..." required></textarea>
                        </div>
                    </div>

                    <div id="multiple-exam-container" class="space-y-2 hidden">
                        <label class="block text-sm font-semibold text-slate-700 mb-1.5">Upload Excel sheet of examinations</label>
                        <div class="flex items-center gap-2">
                            <label class="flex-1 cursor-pointer flex items-center justify-center px-4 py-2.5 border border-dashed border-slate-300 bg-slate-50 hover:bg-slate-100 rounded-lg transition text-slate-600 text-sm font-medium">
                                <i class="fas fa-file-excel text-emerald-600 mr-2 text-base"></i> Choose file
                                <input type="file" accept=".xlsx, .xls, .csv" class="hidden">
                            </label>
                            <span class="text-xs text-slate-400">No file selected</span>
                        </div>
                    </div>

                    <div class="flex items-start gap-2 pt-1">
                        <input type="checkbox" id="susceptibility" class="mt-1 w-4 h-4 text-[#1e4d7b] rounded border-slate-300 focus:ring-[#1e4d7b]">
                        <label for="susceptibility" class="text-xs text-slate-600 font-medium cursor-pointer">
                            Whether centre has been assessed in terms of susceptibility to unscrupulous practices
                        </label>
                    </div>
                </div>
            </div>

            <div class="gov-card p-6">
                <div class="space-y-4">
                    <h3 class="text-base font-bold text-[#1e4d7b] flex items-center gap-2 border-b border-slate-100 pb-2">
                        <i class="fas fa-microchip"></i> Vendor Details
                    </h3>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-semibold text-slate-700 mb-1.5">Name of vendor</label>
                            <select name="vendor_name" class="w-full px-4 py-2 border border-slate-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#1e4d7b] transition text-sm bg-white" required>
                                <option value="">Select vendor</option>
                                <option value="bharat-secure-systems-pvt-ltd">Bharat Secure Systems Pvt. Ltd.</option>
                                <option value="netra-defence-electronics">Netra Defence Electronics</option>
                                <option value="shakti-communication-works">Shakti Communication Works</option>
                                <option value="indus-rf-technologies">Indus RF Technologies</option>
                            </select>
                        </div>
                        <div>
                            <label class="block text-sm font-semibold text-slate-700 mb-1.5">Jammer model</label>
                            <select class="w-full px-4 py-2 border border-slate-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#1e4d7b] transition text-sm bg-white">
                                <option value="">Select jammer model</option>
                                <option value="bss-jx-400">BSS-JX 400 (Multi-band)</option>
                                <option value="nde-sentinel-5g">NDE Sentinel 5G</option>
                                <option value="shakti-sj-2100">Shakti SJ-2100</option>
                                <option value="indus-rf-guard-pro">Indus RF Guard Pro</option>
                            </select>
                        </div>
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-slate-700 mb-1.5">Technical specifications of jammers</label>
                        <div class="flex items-center gap-2">
                            <label class="flex-1 cursor-pointer flex items-center justify-center px-4 py-2 border border-dashed border-slate-300 bg-slate-50 hover:bg-slate-100 rounded-lg transition text-slate-600 text-sm font-medium">
                                <i class="fas fa-file-pdf text-[#e58500] mr-2"></i> Choose file
                                <input type="file" class="hidden">
                            </label>
                            <span class="text-xs text-slate-400">No file selected</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="gov-card p-6">
                <div class="space-y-4">
                    <h3 class="text-base font-bold text-[#1e4d7b] flex items-center gap-2 border-b border-slate-100 pb-2">
                        <i class="fas fa-user-tie"></i> Contact Details
                    </h3>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-semibold text-slate-700 mb-1.5">Contact person</label>
                            <input type="text" name="contact_person" class="w-full px-4 py-2 border border-slate-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#1e4d7b] transition text-sm" placeholder="Full name" required>
                        </div>
                        <div>
                            <label class="block text-sm font-semibold text-slate-700 mb-1.5">Email</label>
                            <input type="email" name="contact_email" class="w-full px-4 py-2 border border-slate-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#1e4d7b] transition text-sm" placeholder="email@example.com" required>
                        </div>
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-slate-700 mb-1.5">Phone</label>
                        <input type="tel" name="contact_phone" class="w-full px-4 py-2 border border-slate-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#1e4d7b] transition text-sm" placeholder="+91 XXXXX XXXXX" required>
                    </div>
                </div>
            </div>

            <div class="gov-card p-6 space-y-6">
                <div class="space-y-2">
                    <h3 class="text-base font-bold text-[#1e4d7b] mb-3 flex items-center gap-2 border-b border-slate-100 pb-2">
                        <i class="fas fa-file-contract"></i> Declarations
                    </h3>
                    <div class="space-y-2 bg-slate-50 p-4 rounded-lg border border-slate-200">
                        <label class="flex items-start gap-2 cursor-pointer">
                            <input type="checkbox" checked class="mt-1 w-4 h-4 text-[#1e4d7b] rounded border-slate-300 focus:ring-[#1e4d7b]">
                            <span class="text-xs text-slate-700 font-medium">Adequate security arrangements are available at the site.</span>
                        </label>
                        <label class="flex items-start gap-2 cursor-pointer">
                            <input type="checkbox" checked class="mt-1 w-4 h-4 text-[#1e4d7b] rounded border-slate-300 focus:ring-[#1e4d7b]">
                            <span class="text-xs text-slate-700 font-medium">Each and every jammer will be deployed and accounted for.</span>
                        </label>
                        <label class="flex items-start gap-2 cursor-pointer">
                            <input type="checkbox" checked class="mt-1 w-4 h-4 text-[#1e4d7b] rounded border-slate-300 focus:ring-[#1e4d7b]">
                            <span class="text-xs text-slate-700 font-medium">Deployment will not interfere with public mobile communications outside venue premises.</span>
                        </label>
                    </div>
                </div>

                <div class="flex items-center gap-3 pt-2">
                    <button type="submit" class="btn-orange px-6 py-2.5 rounded-lg font-semibold text-white shadow-sm hover:opacity-90 transition flex items-center gap-2">
                        <i class="fas fa-paper-plane"></i> Submit Application
                    </button>
                    <button type="reset" class="px-6 py-2.5 border border-slate-300 rounded-lg text-slate-700 font-semibold hover:bg-slate-50 transition flex items-center gap-2">
                        <i class="fas fa-undo"></i> Reset
                    </button>
                </div>
            </div>

        </form>
            </div>

        </form>
    </div>

    <div class="space-y-6">
        <div class="gov-card p-6">
            <h3 class="text-base font-bold text-[#1e4d7b] mb-4 flex items-center justify-between">
                <span>Submission progress</span>
            </h3>

            <div class="mb-6">
                <div class="flex justify-between items-center text-xs font-semibold text-slate-600 mb-1.5">
                    <span>Form completeness</span>
                    <span class="text-[#e58500] font-bold">13%</span>
                </div>
                <div class="w-full bg-slate-200 h-2 rounded-full overflow-hidden">
                    <div class="bg-[#e58500] h-2 rounded-full" style="width: 13%"></div>
                </div>
            </div>

            <div class="space-y-5 relative before:absolute before:left-[15px] before:top-2 before:bottom-2 before:w-[2px] before:bg-slate-200">
                <div class="flex items-start gap-3 relative">
                    <div class="w-8 h-8 rounded-full bg-[#1e4d7b] text-white flex items-center justify-center font-bold text-xs ring-4 ring-blue-50 z-10 shrink-0">
                        1
                    </div>
                    <div>
                        <h4 class="text-sm font-bold text-[#1e4d7b]">Fill the application</h4>
                        <p class="text-xs text-slate-500 mt-0.5">Organisation, examination, vendor and declarations.</p>
                    </div>
                </div>

                <div class="flex items-start gap-3 relative">
                    <div class="w-8 h-8 rounded-full bg-slate-100 border-2 border-slate-300 text-slate-500 flex items-center justify-center font-bold text-xs z-10 shrink-0">
                        2
                    </div>
                    <div>
                        <h4 class="text-sm font-bold text-slate-600">PDF generated</h4>
                        <p class="text-xs text-slate-400 mt-0.5">A government-format application PDF is generated on submit.</p>
                    </div>
                </div>

                <div class="flex items-start gap-3 relative">
                    <div class="w-8 h-8 rounded-full bg-slate-100 border-2 border-slate-300 text-slate-500 flex items-center justify-center font-bold text-xs z-10 shrink-0">
                        3
                    </div>
                    <div>
                        <h4 class="text-sm font-bold text-slate-600">Sign the PDF</h4>
                        <p class="text-xs text-slate-400 mt-0.5">Download, get it signed by the authorised signatory.</p>
                    </div>
                </div>

                <div class="flex items-start gap-3 relative">
                    <div class="w-8 h-8 rounded-full bg-slate-100 border-2 border-slate-300 text-slate-500 flex items-center justify-center font-bold text-xs z-10 shrink-0">
                        4
                    </div>
                    <div>
                        <h4 class="text-sm font-bold text-slate-600">Upload signed PDF</h4>
                        <p class="text-xs text-slate-400 mt-0.5">Upload to send the file for Dealing Hand verification.</p>
                    </div>
                </div>

            </div>
        </div>

        <div class="gov-card p-6 bg-amber-50/40 border-amber-200/60">
            <div class="flex items-center gap-2 mb-3 text-[#e58500]">
                <i class="fas fa-shield-alt text-lg"></i>
                <h3 class="text-sm font-bold text-slate-800">Before you submit</h3>
            </div>
            
            <ul class="text-xs text-slate-600 space-y-2.5 leading-relaxed">
                <li class="flex items-start gap-2">
                    <i class="fas fa-check text-[#e58500] text-[10px] mt-1 shrink-0"></i>
                    <span>Keep the <strong>sanction letter</strong>, examination schedule and vendor jammer specifications ready in PDF or Excel format.</span>
                </li>
                <li class="flex items-start gap-2">
                    <i class="fas fa-check text-[#e58500] text-[10px] mt-1 shrink-0"></i>
                    <span>On submission, the system generates the application in <strong>government letter format</strong>.</span>
                </li>
                <li class="flex items-start gap-2">
                    <i class="fas fa-check text-[#e58500] text-[10px] mt-1 shrink-0"></i>
                    <span>Download it, obtain the <strong>authorised signature</strong>, and upload the signed copy — the file then moves to the Dealing Hand.</span>
                </li>
                <li class="flex items-start gap-2 pt-1 border-t border-amber-200/50">
                    <i class="fas fa-info-circle text-[#1e4d7b] text-[10px] mt-1 shrink-0"></i>
                    <span class="text-slate-500">Jammer models must be from the <strong>approved vendor list</strong> of the Wing.</span>
                </li>
            </ul>
        </div>

    </div>

</div>

<script>
    function toggleExamFields(isSingle) {
        const singleContainer = document.getElementById('single-exam-container');
        const multipleContainer = document.getElementById('multiple-exam-container');
        
        if (isSingle) {
            singleContainer.classList.remove('hidden');
            multipleContainer.classList.add('hidden');
        } else {
            singleContainer.classList.add('hidden');
            multipleContainer.classList.remove('hidden');
        }
    }

    function formatDateInput(input) {
        let val = input.value.replace(/\D/g, '');
        if (val.length > 8) val = val.substring(0, 8);
        if (val.length >= 5) {
            input.value = val.substring(0, 2) + '/' + val.substring(2, 4) + '/' + val.substring(4);
        } else if (val.length >= 3) {
            input.value = val.substring(0, 2) + '/' + val.substring(2);
        } else {
            input.value = val;
        }
    }

    function syncPickerToText(picker) {
        if (!picker.value) return;
        const [year, month, day] = picker.value.split('-');
        document.getElementById('examDateText').value = `${day}/${month}/${year}`;
    }
</script>