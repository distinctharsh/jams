<?php
ob_start();
?>
<div class="grid gap-6">
    <div class="space-y-6 max-w-[1500px] mx-auto w-full">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 items-start">
            <!-- LEFT COLUMN -->
            <div class="lg:col-span-2 space-y-6">
                <!-- REQUEST DETAILS CARD -->
                <div class="gov-card p-5">
                    <!-- HEADER -->
                    <div class="flex items-center justify-between mb-6 gap-4">
                        <div class="flex items-center gap-3 min-w-0">
                            <div class="w-11 h-11 rounded-xl bg-orange-50 flex items-center justify-center shrink-0">
                                <i class="fas fa-file-alt text-[#e58500] text-xl"></i>
                            </div>
                            <div>
                                <h2 class="text-xl font-bold text-[#1e4d7b]">Request Details</h2>
                                <p class="text-xs text-slate-500 mt-0.5">Request ID: #0045</p>
                            </div>
                        </div>
                        <button type="button" onclick="window.location.href='<?= base_url('new-request') ?>'" class="btn-orange px-4 py-2 rounded-lg font-semibold text-sm whitespace-nowrap">
                            <i class="fas fa-arrow-left mr-2"></i>Back to Requests
                        </button>
                    </div>

                    <!-- TAB HEADER -->
                    <div class="flex border-b border-slate-200 mb-6 gap-6">
                        <button type="button" id="tab-btn-details" onclick="switchTab('details')" class="pb-3 text-sm font-bold text-[#1e4d7b] border-b-2 border-[#1e4d7b] flex items-center gap-2 transition">
                            <i class="fas fa-info-circle"></i>Details
                        </button>
                        <button type="button" id="tab-btn-documents" onclick="switchTab('documents')" class="pb-3 text-sm font-medium text-slate-500 border-b-2 border-transparent hover:text-slate-700 flex items-center gap-2 transition">
                            <i class="fas fa-folder-open"></i>
                            Documents
                        </button>
                    </div>

                    <!-- DETAILS TAB -->
                    <div id="tab-content-details" class="space-y-4">
                        <!-- APPLICATION DETAILS -->
                        <div>
                            <div class="flex items-center gap-2 mb-4">
                                <div class="w-8 h-8 rounded-lg bg-orange-50 flex items-center justify-center">
                                    <i class="fas fa-file-alt text-[#e58500] text-sm"></i>
                                </div>
                                <div>
                                    <h3 class="text-base font-bold text-[#1e4d7b]">Application Details</h3>
                                    <p class="text-[11px] text-slate-400">Basic application and reference information</p>
                                </div>
                            </div>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-3">
                                <div class="bg-slate-50/70 border border-slate-200 rounded-lg px-4 py-3">
                                    <label class="block text-[11px] font-medium text-slate-500 mb-1">Application Number</label>
                                    <p class="text-sm font-semibold text-slate-800">JPMS/2026/001057</p>
                                </div>
                                <div class="bg-slate-50/70 border border-slate-200 rounded-lg px-4 py-3">
                                    <label class="block text-[11px] font-medium text-slate-500 mb-1">Authorised Contact</label>
                                    <p class="text-sm font-semibold text-slate-800">Ananya Rao</p>
                                </div>
                                <div class="bg-slate-50/70 border border-slate-200 rounded-lg px-4 py-3">
                                    <label class="block text-[11px] font-medium text-slate-500 mb-1">Reference Number</label>
                                    <p class="text-sm font-semibold text-slate-800">F.No. 11/36/2026-JAM</p>
                                </div>
                                <div class="bg-slate-50/70 border border-slate-200 rounded-lg px-4 py-3">
                                    <label class="block text-[11px] font-medium text-slate-500 mb-1">Permission Number</label>
                                    <p class="text-sm font-semibold text-slate-500">—</p>
                                </div>
                            </div>
                        </div>

                        <hr class="my-6 border-slate-200">

                        <!-- ORGANISATION DETAILS -->
                        <div>
                            <div class="flex items-center gap-2 mb-4">
                                <div class="w-8 h-8 rounded-lg bg-orange-50 flex items-center justify-center">
                                    <i class="fas fa-building text-[#e58500] text-sm"></i>
                                </div>
                                <div>
                                    <h3 class="text-base font-bold text-[#1e4d7b]">Organisation Details</h3>
                                    <p class="text-[11px] text-slate-400">Registered organisation information</p>
                                </div>
                            </div>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-3">
                                <div class="bg-slate-50/70 border border-slate-200 rounded-lg px-4 py-3">
                                    <label class="block text-[11px] font-medium text-slate-500 mb-1">Organisation Name</label>
                                    <p class="text-sm font-semibold text-slate-800">Global Education Services Pvt Ltd</p>
                                </div>
                                <div class="bg-slate-50/70 border border-slate-200 rounded-lg px-4 py-3">
                                    <label class="block text-[11px] font-medium text-slate-500 mb-1">Organisation Type</label>
                                    <p class="text-sm font-semibold text-slate-800">Private Limited</p>
                                </div>
                                <div class="md:col-span-2 bg-slate-50/70 border border-slate-200 rounded-lg px-4 py-3">
                                    <label class="block text-[11px] font-medium text-slate-500 mb-1">Letter Number</label>
                                    <p class="text-sm font-semibold text-slate-800">GES/2026/0045</p>
                                </div>
                            </div>
                        </div>

                        <hr class="my-6 border-slate-200">

                        <!-- EXAMINATION DETAILS -->
                        <div>
                            <div class="flex items-center gap-2 mb-4">
                                <div class="w-8 h-8 rounded-lg bg-orange-50 flex items-center justify-center">
                                    <i class="fas fa-graduation-cap text-[#e58500] text-sm"></i>
                                </div>
                                <div>
                                    <h3 class="text-base font-bold text-[#1e4d7b]">Examination Details</h3>
                                    <p class="text-[11px] text-slate-400">Examination schedule and centre information</p>
                                </div>
                            </div>
                            <div class="overflow-x-auto border border-slate-200 rounded-lg">
                                <table class="w-full min-w-[760px] text-sm">
                                    <thead>
                                        <tr class="bg-slate-50 border-b border-slate-200">
                                            <th class="px-4 py-3 text-left text-[11px] font-bold text-slate-600">S. No.</th>
                                            <th class="px-4 py-3 text-left text-[11px] font-bold text-slate-600">Exam Name</th>
                                            <th class="px-4 py-3 text-left text-[11px] font-bold text-slate-600">Exam Date</th>
                                            <th class="px-4 py-3 text-left text-[11px] font-bold text-slate-600">Exam Address</th>
                                        </tr>
                                    </thead>
                                    <tbody class="divide-y divide-slate-100">
                                        <tr class="hover:bg-slate-50 transition">
                                            <td class="px-4 py-3 align-top text-slate-700 font-medium">1</td>
                                            <td class="px-4 py-3 align-top text-slate-800 font-semibold">Joint Entrance Examination (JEE) Main 2026</td>
                                            <td class="px-4 py-3 align-top text-slate-700 whitespace-nowrap">15 June 2026</td>
                                            <td class="px-4 py-3 align-top text-slate-700 leading-relaxed">Convention Hall, Plot No. 45, Sector 18, New Delhi - 110001</td>
                                        </tr>
                                        <tr class="hover:bg-slate-50 transition">
                                            <td class="px-4 py-3 align-top text-slate-700 font-medium">2</td>
                                            <td class="px-4 py-3 align-top text-slate-800 font-semibold">National Eligibility cum Entrance Test (NEET) UG 2026</td>
                                            <td class="px-4 py-3 align-top text-slate-700 whitespace-nowrap">05 July 2026</td>
                                            <td class="px-4 py-3 align-top text-slate-700 leading-relaxed">Examination Centre, Sector 62, Noida, Uttar Pradesh - 201309</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <hr class="my-6 border-slate-200">

                        <!-- VENDOR DETAILS -->
                        <div>
                            <div class="flex items-center gap-2 mb-4">
                                <div class="w-8 h-8 rounded-lg bg-orange-50 flex items-center justify-center">
                                    <i class="fas fa-microchip text-[#e58500] text-sm"></i>
                                </div>
                                <div>
                                    <h3 class="text-base font-bold text-[#1e4d7b]">Vendor Details</h3>
                                    <p class="text-[11px] text-slate-400">Vendors associated with this application</p>
                                </div>
                            </div>
                            <div class="overflow-x-auto border border-slate-200 rounded-lg">
                                <table class="w-full min-w-[500px] text-sm">
                                    <thead>
                                        <tr class="bg-slate-50 border-b border-slate-200">
                                            <th class="px-4 py-3 text-left text-[11px] font-bold text-slate-600">S. No.</th>
                                            <th class="px-4 py-3 text-left text-[11px] font-bold text-slate-600">Vendor Name</th>
                                        </tr>
                                    </thead>
                                    <tbody class="divide-y divide-slate-100">
                                        <tr class="hover:bg-slate-50 transition">
                                            <td class="px-4 py-3 text-slate-700 font-medium">1</td>
                                            <td class="px-4 py-3 text-slate-800 font-semibold">Tech Solutions India</td>
                                        </tr>
                                        <tr class="hover:bg-slate-50 transition">
                                            <td class="px-4 py-3 text-slate-700 font-medium">2</td>
                                            <td class="px-4 py-3 text-slate-800 font-semibold">Secure Communication Systems Pvt. Ltd.</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <hr class="my-6 border-slate-200">

                        <!-- CONTACT DETAILS -->
                        <div>
                            <div class="flex items-center gap-2 mb-4">
                                <div class="w-8 h-8 rounded-lg bg-orange-50 flex items-center justify-center">
                                    <i class="fas fa-user-tie text-[#e58500] text-sm"></i>
                                </div>
                                <div>
                                    <h3 class="text-base font-bold text-[#1e4d7b]">Contact Details</h3>
                                    <p class="text-[11px] text-slate-400">Authorised contact information</p>
                                </div>
                            </div>
                            <div class="grid grid-cols-1 md:grid-cols-3 gap-3">
                                <div class="bg-slate-50/70 border border-slate-200 rounded-lg px-4 py-3">
                                    <label class="block text-[11px] font-medium text-slate-500 mb-2">Contact Person</label>
                                    <div class="flex items-center gap-2">
                                        <div class="w-7 h-7 rounded-full bg-blue-50 flex items-center justify-center">
                                            <i class="fas fa-user text-[#1e4d7b] text-[10px]"></i>
                                        </div>
                                        <p class="text-sm font-semibold text-slate-800">Ananya Rao</p>
                                    </div>
                                </div>
                                <div class="bg-slate-50/70 border border-slate-200 rounded-lg px-4 py-3">
                                    <label class="block text-[11px] font-medium text-slate-500 mb-2">Email Address</label>
                                    <div class="flex items-center gap-2 min-w-0">
                                        <div class="w-7 h-7 rounded-full bg-blue-50 flex items-center justify-center shrink-0">
                                            <i class="fas fa-envelope text-[#1e4d7b] text-[10px]"></i>
                                        </div>
                                        <p class="text-sm font-semibold text-slate-800 truncate">ananya.rao@globaledu.in</p>
                                    </div>
                                </div>
                                <div class="bg-slate-50/70 border border-slate-200 rounded-lg px-4 py-3">
                                    <label class="block text-[11px] font-medium text-slate-500 mb-2">Phone Number</label>
                                    <div class="flex items-center gap-2">
                                        <div class="w-7 h-7 rounded-full bg-blue-50 flex items-center justify-center">
                                            <i class="fas fa-phone text-[#1e4d7b] text-[10px]"></i>
                                        </div>
                                        <p class="text-sm font-semibold text-slate-800">+91 98765 43210</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- DOCUMENTS TAB -->
                    <div id="tab-content-documents" class="hidden space-y-4">
                        <div class="flex items-center gap-2 mb-4">
                            <div class="w-8 h-8 rounded-lg bg-orange-50 flex items-center justify-center">
                                <i class="fas fa-folder-open text-[#e58500] text-sm"></i>
                            </div>
                            <div>
                                <h3 class="text-base font-bold text-[#1e4d7b]">Application Documents</h3>
                                <p class="text-[11px] text-slate-400">Documents submitted with this application</p>
                            </div>
                        </div>
                        <div class="space-y-3">
                            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3 p-4 bg-slate-50/70 border border-slate-200 rounded-lg">
                                <div class="flex items-center gap-3 min-w-0">
                                    <div class="w-10 h-10 rounded-lg bg-red-50 flex items-center justify-center shrink-0">
                                        <i class="fas fa-file-pdf text-red-500 text-lg"></i>
                                    </div>
                                    <div class="min-w-0">
                                        <h4 class="text-sm font-semibold text-slate-800 truncate">application-JPMS-001045-v1.pdf</h4>
                                        <p class="text-xs text-slate-500 mt-0.5">Uploaded on 15 May 2026</p>
                                    </div>
                                </div>
                                <div class="flex gap-2 shrink-0">
                                    <button type="button" class="px-3 py-1.5 bg-green-50 text-green-700 rounded-lg font-medium text-xs hover:bg-green-100 transition flex items-center gap-1">
                                        <i class="fas fa-eye"></i>Preview
                                    </button>
                                    <button type="button" onclick="downloadApplicationPdf()" class="w-8 h-8 bg-blue-50 text-[#1e4d7b] rounded-lg hover:bg-blue-100 transition flex items-center justify-center">
                                        <i class="fas fa-download"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3 p-4 bg-slate-50/70 border border-slate-200 rounded-lg">
                                <div class="flex items-center gap-3 min-w-0">
                                    <div class="w-10 h-10 rounded-lg bg-emerald-50 flex items-center justify-center shrink-0">
                                        <i class="fas fa-file-excel text-emerald-600 text-lg"></i>
                                    </div>
                                    <div class="min-w-0">
                                        <h4 class="text-sm font-semibold text-slate-800 truncate">application-JPMS-001045-v1.xls</h4>
                                        <p class="text-xs text-slate-500 mt-0.5">Excel Schedule Attachment</p>
                                    </div>
                                </div>
                                <div class="flex gap-2 shrink-0">
                                    <button type="button" class="px-3 py-1.5 bg-green-50 text-green-700 rounded-lg font-medium text-xs hover:bg-green-100 transition flex items-center gap-1">
                                        <i class="fas fa-eye"></i>Preview
                                    </button>
                                    <button type="button" class="w-8 h-8 bg-blue-50 text-[#1e4d7b] rounded-lg hover:bg-blue-100 transition flex items-center justify-center">
                                        <i class="fas fa-download"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3 p-4 bg-slate-50/70 border border-slate-200 rounded-lg">
                                <div class="flex items-center gap-3 min-w-0">
                                    <div class="w-10 h-10 rounded-lg bg-amber-50 flex items-center justify-center shrink-0">
                                        <i class="fas fa-file-signature text-amber-600 text-lg"></i>
                                    </div>
                                    <div class="min-w-0">
                                        <h4 class="text-sm font-semibold text-slate-800">Signed Application Copy</h4>
                                        <p class="text-xs text-slate-500 mt-0.5">Authorized Signatory Copy</p>
                                    </div>
                                </div>
                                <div class="flex gap-2 shrink-0">
                                    <button type="button" class="px-3 py-1.5 bg-green-50 text-green-700 rounded-lg font-medium text-xs hover:bg-green-100 transition flex items-center gap-1">
                                        <i class="fas fa-eye"></i>Preview
                                    </button>
                                    <button type="button" class="w-8 h-8 bg-blue-50 text-[#1e4d7b] rounded-lg hover:bg-blue-100 transition flex items-center justify-center">
                                        <i class="fas fa-download"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- RIGHT COLUMN -->
            <div class="space-y-4 lg:sticky lg:top-6">

                <!-- SUBMISSION PROGRESS -->
                <div class="gov-card p-5">
                    <h3 class="text-base font-bold text-slate-800 mb-5">Submission progress</h3>

                    <!-- FORM COMPLETENESS -->
                    <div class="mb-5">
                        <div class="flex justify-between items-center mb-2">
                            <span class="text-xs text-slate-500">Form completeness</span>
                            <span id="formCompleteness" class="text-xs font-bold text-slate-700">88%</span>
                        </div>
                        <div class="w-full h-2 bg-slate-200 rounded-full overflow-hidden">
                            <div id="formProgressBar" class="h-2 bg-[#1e4d7b] rounded-full transition-all duration-500" style="width:88%;"></div>
                        </div>
                    </div>

                    <!-- STEPS -->
                    <div class="space-y-5">

                        <!-- STEP 1 -->
                        <div class="flex items-start gap-3">
                            <div class="w-7 h-7 rounded-full bg-[#1e4d7b] text-white flex items-center justify-center text-xs font-bold shrink-0">
                                <i class="fas fa-check text-[10px]"></i>
                            </div>
                            <div class="flex-1 pt-0.5">
                                <h4 class="text-sm font-bold text-slate-800">Fill the application</h4>
                                <p class="text-xs text-slate-500 mt-0.5 leading-relaxed">Organisation, examination, vendor and declarations.</p>
                            </div>
                        </div>

                        <!-- STEP 2 -->
                        <div class="flex items-start gap-3">
                            <div class="w-7 h-7 rounded-full border-2 border-[#1e4d7b] text-[#1e4d7b] flex items-center justify-center text-xs font-bold shrink-0">2</div>
                            <div class="flex-1 pt-0.5">
                                <h4 class="text-sm font-bold text-slate-800">PDF generated</h4>
                                <p class="text-xs text-slate-500 mt-0.5 leading-relaxed">A government-format application PDF is generated on submit.</p>
                            </div>
                        </div>

                        <!-- STEP 3 -->
                        <div class="flex items-start gap-3">
                            <div class="w-7 h-7 rounded-full border border-slate-300 text-slate-500 flex items-center justify-center text-xs font-semibold shrink-0">3</div>
                            <div class="flex-1 pt-0.5">
                                <h4 class="text-sm font-semibold text-slate-600">Sign the PDF</h4>
                                <p class="text-xs text-slate-400 mt-0.5 leading-relaxed">Download, get it signed by the authorised signatory.</p>
                            </div>
                        </div>

                        <!-- STEP 4 -->
                        <div class="flex items-start gap-3">
                            <div class="w-7 h-7 rounded-full border border-slate-300 text-slate-500 flex items-center justify-center text-xs font-semibold shrink-0">4</div>
                            <div class="flex-1 pt-0.5">
                                <h4 class="text-sm font-semibold text-slate-600">Upload signed PDF</h4>
                                <p class="text-xs text-slate-400 mt-0.5 leading-relaxed">Upload the signed file for Dealing Hand verification.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- GENERATED APPLICATION PDF -->
                <div class="gov-card p-5">
                    <h3 class="text-base font-bold text-slate-800 mb-4 flex items-center gap-2">
                        <i class="far fa-file-alt text-[#1e4d7b]"></i>
                        Generated application PDF
                    </h3>

                    <!-- APPLICATION INFORMATION -->
                    <div class="border border-slate-200 bg-slate-50 rounded-lg p-3 mb-3">
                        <p id="applicationNumber" class="text-xs font-bold text-slate-800">
                            <?= esc($application_number ?? 'JPMS/2026/001057') ?>
                        </p>
                        <p id="applicationOrganisation" class="text-xs text-slate-500 mt-1">
                            <?= esc($organisation_name ?? 'fgdf') ?>
                        </p>
                        <div class="mt-2">
                            <span id="applicationStatus" class="inline-flex items-center px-2.5 py-1 rounded-md bg-blue-50 text-[#1e4d7b] text-[10px] font-bold">
                                Submitted
                            </span>
                        </div>
                    </div>

                    <!-- PREVIEW PDF BUTTON -->
                    <button type="button" id="previewPdfBtn" onclick="previewApplicationPdf()" class="w-full px-4 py-2.5 mb-2 bg-slate-50 border border-slate-300 hover:bg-slate-100 text-slate-700 rounded-lg text-sm font-semibold transition flex items-center justify-center gap-2">
                        <i class="far fa-file-alt"></i>
                        Preview PDF
                    </button>

                    <!-- DOWNLOAD TO SIGN -->
                    <button type="button" id="downloadToSignBtn" onclick="downloadApplicationPdf()" class="w-full px-4 py-2.5 mb-2 bg-slate-50 border border-slate-300 hover:bg-slate-100 text-slate-700 rounded-lg text-sm font-semibold transition flex items-center justify-center gap-2">
                        <i class="fas fa-download"></i>
                        Download to sign
                    </button>

                    <!-- UPLOAD SIGNED PDF -->
                    <button type="button" id="selectSignedPdfBtn" onclick="document.getElementById('signedPdfInput').click()" class="w-full px-4 py-2.5 bg-[#1e4d7b] hover:bg-[#163a5d] text-white rounded-lg text-sm font-semibold transition flex items-center justify-center gap-2">
                        <i class="fas fa-pen"></i>
                        Upload signed PDF
                    </button>

                    <!-- FILE INPUT -->
                    <input type="file" id="signedPdfInput" name="signed_pdf" accept=".pdf,application/pdf" class="hidden" onchange="handleSignedPdf(this)">

                    <!-- SELECTED SIGNED PDF -->
                    <div id="signedPdfPreview" class="hidden mt-3">
                        <div class="flex items-center gap-2 p-3 bg-green-50 border border-green-200 rounded-lg">
                            <div class="w-8 h-8 rounded-lg bg-white flex items-center justify-center shrink-0">
                                <i class="fas fa-file-pdf text-red-500"></i>
                            </div>
                            <div class="flex-1 min-w-0">
                                <p id="signedPdfFileName" class="text-xs font-semibold text-slate-700 truncate"></p>
                                <p id="signedPdfFileSize" class="text-[10px] text-slate-500"></p>
                            </div>
                            <button type="button" onclick="removeSignedPdf(event)" class="w-7 h-7 rounded-lg bg-red-50 text-red-600 hover:bg-red-100 flex items-center justify-center transition">
                                <i class="fas fa-times text-xs"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<!-- APPLICATION PDF PREVIEW MODAL -->
<div id="applicationPdfModal" class="fixed inset-0 z-[99999] hidden">
    <!-- BACKDROP -->
    <div class="absolute inset-0 bg-slate-900/75 backdrop-blur-sm" onclick="closeApplicationPdfPreview()"></div>

    <!-- MODAL -->
    <div class="relative z-10 w-[96%] max-w-6xl h-[94vh] mx-auto mt-[3vh] bg-slate-100 rounded-xl shadow-2xl overflow-hidden flex flex-col">

        <!-- DOCUMENT PREVIEW AREA -->
        <div id="applicationPreviewContent" class="flex-1 overflow-y-auto bg-slate-200">

            <!-- DOCUMENT -->
            <div id="applicationPdfDocument" class="bg-white text-slate-900 shadow-lg">

                <!-- TOP TRICOLOR LINE -->
                <div class="h-1 w-full bg-gradient-to-r from-[#FF9933] via-white to-[#138808]"></div>

                <!-- GOVERNMENT HEADER -->
                <div class="px-8 md:px-12 pt-7 pb-5">
                    <!-- HEADER -->
                    <div class="flex flex-col items-center justify-center">
                        <!-- EMBLEM -->
                        <div class="w-16 h-16 flex items-center justify-center shrink-0 mb-2">
                            <img 
                                src="<?= base_url('assets/image/Emblem_of_India.svg.webp') ?>" 
                                alt="Government of India Emblem" 
                                class="w-full h-full object-contain"
                            >
                        </div>
                        <!-- GOVERNMENT TEXT -->
                        <div class="text-center">
                            <div class="text-[10px] tracking-[0.35em] font-bold text-black uppercase">
                                Government of India
                            </div>
                        </div>
                    </div>
                    <!-- DIVIDER LINES -->
                    <div class="mt-5 border-t-2 border-[#1e4d7b]"></div>
                    <div class="mt-1 border-t border-slate-300"></div>
                </div>

                <!-- LETTER META -->
                <div class="px-8 md:px-12">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-2 text-xs font-medium mb-5">
                        <div><span class="font-semibold">F.No.:</span> <span id="modalFileNumber">11/37/2026-JAM</span></div>
                        <div class="md:text-right"><span class="font-semibold">Dated:</span> <span id="modalDate">01 September 2026</span></div>
                    </div>
                </div>

                <!-- DOCUMENT TITLE -->
                <div class="px-8 md:px-12">
                    <div class="text-center mb-6">
                        <h2 class="inline-block text-base md:text-lg font-bold uppercase font-serif tracking-wide border-b-2 border-slate-800 pb-1">APPLICATION FOR JAMMER DEPLOYMENT PERMISSION</h2>
                    </div>
                </div>

                <!-- APPLICATION INTRO -->
                <div class="px-8 md:px-12">
                    <p class="text-sm leading-7 text-justify mb-5">This application is submitted by the following organisation for seeking permission for deployment of jammers during the examination(s) mentioned below.</p>
                </div>

                <!-- 1. APPLICANT / ORGANISATION DETAILS -->
                <div class="px-8 md:px-12">
                    <div class="mb-5">
                        <div class="flex items-center gap-2 border-b-2 border-[#1e4d7b] pb-2 mb-3">
                            <span class="w-6 h-6 rounded bg-[#1e4d7b] text-white flex items-center justify-center text-[11px] font-bold">1</span>
                            <h3 class="text-sm font-bold uppercase text-[#1e4d7b]">APPLICANT / ORGANISATION DETAILS</h3>
                        </div>
                        <table class="w-full border-collapse text-xs">
                            <tbody>
                                <tr>
                                    <td class="w-[30%] border border-slate-300 bg-slate-50 px-3 py-2 font-semibold text-slate-600">Application Number</td>
                                    <td id="modalAppNo" class="border border-slate-300 px-3 py-2 font-bold">JPMS/2026/001058</td>
                                </tr>
                                <tr>
                                    <td class="border border-slate-300 bg-slate-50 px-3 py-2 font-semibold text-slate-600">Name of Organisation</td>
                                    <td id="modalOrganisation" class="border border-slate-300 px-3 py-2 font-semibold">dfsd</td>
                                </tr>
                                <tr>
                                    <td class="border border-slate-300 bg-slate-50 px-3 py-2 font-semibold text-slate-600">Type of Organisation</td>
                                    <td id="modalOrganisationType" class="border border-slate-300 px-3 py-2 font-semibold">State Government Department</td>
                                </tr>
                                <tr>
                                    <td class="border border-slate-300 bg-slate-50 px-3 py-2 font-semibold text-slate-600">Letter Number</td>
                                    <td id="modalLetterNumber" class="border border-slate-300 px-3 py-2">sdfsd</td>
                                </tr>
                                <tr>
                                    <td class="border border-slate-300 bg-slate-50 px-3 py-2 font-semibold text-slate-600">Letter Attached</td>
                                    <td id="modalLetterAttached" class="border border-slate-300 px-3 py-2">—</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- 2. EXAMINATION DETAILS -->
                <div class="px-8 md:px-12">
                    <div class="mb-6">
                        <div class="flex items-center gap-2 border-b-2 border-[#1e4d7b] pb-2 mb-3">
                            <span class="w-6 h-6 rounded bg-[#1e4d7b] text-white flex items-center justify-center text-[11px] font-bold">2</span>
                            <h3 class="text-sm font-bold uppercase text-[#1e4d7b]">EXAMINATION DETAILS</h3>
                        </div>
                        <div class="overflow-x-auto">
                            <table class="w-full border-collapse text-[11px]">
                                <thead>
                                    <tr class="bg-[#1e4d7b] text-white">
                                        <th class="border border-[#163a5d] px-2 py-2 text-center w-[40px]">S.No.</th>
                                        <th class="border border-[#163a5d] px-2 py-2 text-left">Examination Name</th>
                                        <th class="border border-[#163a5d] px-2 py-2 text-center">Examination Date</th>
                                        <th class="border border-[#163a5d] px-2 py-2 text-left">Examination Address</th>
                                        <th class="border border-[#163a5d] px-2 py-2 text-center">Single Examination</th>
                                        <th class="border border-[#163a5d] px-2 py-2 text-center">Centre Assessed</th>
                                    </tr>
                                </thead>
                                <tbody id="modalExaminationTableBody">
                                    <tr>
                                        <td class="border border-slate-300 px-2 py-2 text-center">1</td>
                                        <td id="modalExamName" class="border border-slate-300 px-2 py-2 font-semibold">sdfsdf</td>
                                        <td id="modalExamDate" class="border border-slate-300 px-2 py-2 text-center">02 September 2026</td>
                                        <td id="modalExamAddress" class="border border-slate-300 px-2 py-2">sdfsdf</td>
                                        <td id="modalSingleExam" class="border border-slate-300 px-2 py-2 text-center">Yes</td>
                                        <td id="modalCentreAssessed" class="border border-slate-300 px-2 py-2 text-center">No</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <!-- 3. VENDOR DETAILS -->
                <div class="px-8 md:px-12">
                    <div class="mb-6">
                        <div class="flex items-center gap-2 border-b-2 border-[#1e4d7b] pb-2 mb-3">
                            <span class="w-6 h-6 rounded bg-[#1e4d7b] text-white flex items-center justify-center text-[11px] font-bold">3</span>
                            <h3 class="text-sm font-bold uppercase text-[#1e4d7b]">VENDOR DETAILS</h3>
                        </div>
                        <div class="overflow-x-auto">
                            <table class="w-full border-collapse text-[11px]">
                                <thead>
                                    <tr class="bg-[#1e4d7b] text-white">
                                        <th class="border border-[#163a5d] px-2 py-2 text-center w-[50px]">S.No.</th>
                                        <th class="border border-[#163a5d] px-2 py-2 text-left">Vendor Name</th>
                                        <th class="border border-[#163a5d] px-2 py-2 text-left">Jammer Model</th>
                                        <th class="border border-[#163a5d] px-2 py-2 text-left">Manufacturer / Make</th>
                                        <th class="border border-[#163a5d] px-2 py-2 text-center">Quantity</th>
                                    </tr>
                                </thead>
                                <tbody id="modalVendorTableBody">
                                    <tr>
                                        <td class="border border-slate-300 px-2 py-2 text-center">1</td>
                                        <td id="modalVendor" class="border border-slate-300 px-2 py-2 font-semibold">Netra Defence Electronics</td>
                                        <td id="modalJammerModel" class="border border-slate-300 px-2 py-2">NDE Sentinel 5G</td>
                                        <td id="modalManufacturer" class="border border-slate-300 px-2 py-2">—</td>
                                        <td id="modalQuantity" class="border border-slate-300 px-2 py-2 text-center">—</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <!-- 4. DECLARATION -->
                <div class="px-8 md:px-12">
                    <div class="mb-7">
                        <div class="flex items-center gap-2 border-b-2 border-[#1e4d7b] pb-2 mb-3">
                            <span class="w-6 h-6 rounded bg-[#1e4d7b] text-white flex items-center justify-center text-[11px] font-bold">4</span>
                            <h3 class="text-sm font-bold uppercase text-[#1e4d7b]">DECLARATION</h3>
                        </div>
                        <p class="text-xs leading-6 text-justify">It is certified that the information furnished in this application is true and correct to the best of our knowledge and belief. The organisation undertakes to comply with all applicable instructions, guidelines and conditions relating to deployment and safe custody of jammers during the examination(s).</p>
                        <p class="text-xs leading-6 text-justify mt-2">The authorised representative shall be responsible for ensuring that the equipment is deployed only for the approved purpose and at the approved examination centre(s).</p>
                    </div>
                </div>

                <!-- SIGNATURE AREA -->
                <div class="px-8 md:px-12 pb-10">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-10 mt-8">
                        <div>
                            <p class="text-xs font-semibold text-slate-600">Place:</p>
                            <div class="mt-10 border-t border-slate-300 w-40"></div>
                        </div>
                        <div class="text-right">
                            <div class="h-14"></div>
                            <div class="border-t border-slate-400 pt-2 inline-block min-w-[210px]">
                                <p class="text-xs font-bold text-slate-700">Authorised Signatory</p>
                                <p class="text-[10px] text-slate-500 mt-1">Name &amp; Designation</p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <!-- ACTION FOOTER -->
        <div class="flex items-center justify-end gap-2 px-5 py-3 bg-white border-t border-slate-200 shrink-0">
            <button type="button" onclick="closeApplicationPdfPreview()" class="px-4 py-2 bg-white border border-slate-300 hover:bg-slate-100 text-slate-700 rounded-lg text-xs font-semibold flex items-center gap-2 transition">
                <i class="fas fa-times"></i> Close
            </button>
            <button type="button" onclick="printApplicationPreview()" class="px-4 py-2 bg-slate-700 hover:bg-slate-800 text-white rounded-lg text-xs font-semibold flex items-center gap-2 transition">
                <i class="fas fa-print"></i> Print
            </button>
            <button type="button" onclick="downloadApplicationPreview()" class="px-4 py-2 bg-[#1e4d7b] hover:bg-[#163a5d] text-white rounded-lg text-xs font-semibold flex items-center gap-2 transition">
                <i class="fas fa-download"></i> Download
            </button>
        </div>

    </div>
</div>


<script>
function switchTab(tab) {
    const detailsContent = document.getElementById('tab-content-details');
    const documentsContent = document.getElementById('tab-content-documents');
    const detailsButton = document.getElementById('tab-btn-details');
    const documentsButton = document.getElementById('tab-btn-documents');

    if (tab === 'details') {
        detailsContent.classList.remove('hidden');
        documentsContent.classList.add('hidden');
        detailsButton.classList.remove('font-medium', 'text-slate-500', 'border-transparent');
        detailsButton.classList.add('font-bold', 'text-[#1e4d7b]', 'border-[#1e4d7b]');
        documentsButton.classList.remove('font-bold', 'text-[#1e4d7b]', 'border-[#1e4d7b]');
        documentsButton.classList.add('font-medium', 'text-slate-500', 'border-transparent');
    }

    if (tab === 'documents') {
        detailsContent.classList.add('hidden');
        documentsContent.classList.remove('hidden');
        documentsButton.classList.remove('font-medium', 'text-slate-500', 'border-transparent');
        documentsButton.classList.add('font-bold', 'text-[#1e4d7b]', 'border-[#1e4d7b]');
        detailsButton.classList.remove('font-bold', 'text-[#1e4d7b]', 'border-[#1e4d7b]');
        detailsButton.classList.add('font-medium', 'text-slate-500', 'border-transparent');
    }
}
</script>
<script>
/* =========================================================
   APPLICATION PDF PREVIEW
   ========================================================= */
/* =========================================================
   OPEN APPLICATION PREVIEW MODAL
   ========================================================= */
function previewApplicationPdf() {
    const modal = document.getElementById('applicationPdfModal');

    if (!modal) {
        console.error('Application PDF modal not found.');
        return;
    }

    const applicationNumberElement = document.getElementById('applicationNumber');
    const modalApplicationNumber = document.getElementById('modalApplicationNumber');
    const modalAppNo = document.getElementById('modalAppNo');

    if (applicationNumberElement) {
        const applicationNumber = applicationNumberElement.textContent.trim();

        if (modalApplicationNumber) {
            modalApplicationNumber.textContent = applicationNumber;
        }

        if (modalAppNo) {
            modalAppNo.textContent = applicationNumber;
        }
    }

    modal.classList.remove('hidden');
    document.body.classList.add('overflow-hidden');
}

/* =========================================================
   CLOSE APPLICATION PREVIEW MODAL
   ========================================================= */
function closeApplicationPdfPreview() {
    const modal = document.getElementById('applicationPdfModal');

    if (!modal) {
        return;
    }

    modal.classList.add('hidden');
    document.body.classList.remove('overflow-hidden');
}

/* =========================================================
   PRINT APPLICATION PREVIEW
 ========================================================= */
function printApplicationPreview() {

    const content = document.getElementById('applicationPreviewContent');

    if (!content) {
        console.error('Application preview content not found.');
        return;
    }

    const applicationNumber = getModalValue('modalAppNo');
    const organisation = getModalValue('modalOrganisation');
    const organisationType = getModalValue('modalOrganisationType');
    const letterNumber = getModalValue('modalLetterNumber');
    const letterAttached = getModalValue('modalLetterAttached');

    const singleExam = getModalValue('modalSingleExam');
    const examName = getModalValue('modalExamName');
    const examDate = getModalValue('modalExamDate');
    const examAddress = getModalValue('modalExamAddress');
    const centreAssessed = getModalValue('modalCentreAssessed');

    const vendor = getModalValue('modalVendor');
    const jammerModel = getModalValue('modalJammerModel');

    const manufacturerElement = document.getElementById('modalManufacturer');
    const quantityElement = document.getElementById('modalQuantity');

    const manufacturer = manufacturerElement
        ? getModalValue('modalManufacturer')
        : '—';

    const quantity = quantityElement
        ? getModalValue('modalQuantity')
        : '—';

    const printWindow = window.open(
        '',
        '_blank',
        'width=1000,height=800'
    );

    if (!printWindow) {
        alert('Please allow pop-ups to print the application.');
        return;
    }

    printWindow.document.write(`
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>${escapeHtml(applicationNumber)}</title>

    <style>
        * {
            box-sizing: border-box;
        }

        html,
        body {
            margin: 0;
            padding: 0;
            background: #ffffff;
            color: #0f172a;
            font-family: Arial, Helvetica, sans-serif;
        }

        @page {
            size: A4;
            margin: 10mm;
        }

        body {
            width: 100%;
        }

        .document {
            width: 100%;
            max-width: 210mm;
            margin: 0 auto;
            background: #ffffff;
        }

        .tricolor {
            height: 4px;
            width: 100%;
            background: linear-gradient(
                to right,
                #FF9933 0%,
                #FF9933 33.33%,
                #ffffff 33.33%,
                #ffffff 66.66%,
                #138808 66.66%,
                #138808 100%
            );
            -webkit-print-color-adjust: exact;
            print-color-adjust: exact;
        }

        .header {
            padding: 20px 28px 15px;
        }

        .gov-header {
            text-align: center;
        }

        .emblem {
            width: 64px;
            height: 64px;
            object-fit: contain;
            display: block;
            margin: 0 auto 7px;
        }

        .gov-text {
            font-size: 10px;
            letter-spacing: 3.5px;
            font-weight: 700;
            color: #000000;
            text-transform: uppercase;
        }

        .divider-main {
            margin-top: 17px;
            border-top: 2px solid #1e4d7b;
        }

        .divider-sub {
            margin-top: 4px;
            border-top: 1px solid #cbd5e1;
        }

        .meta-wrapper {
            padding: 0 28px;
        }

        .meta {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 10px;
            font-size: 11px;
            font-weight: 500;
            margin-bottom: 18px;
        }

        .meta-right {
            text-align: right;
        }

        .meta strong {
            font-weight: 700;
        }

        .document-title {
            padding: 0 28px;
        }

        .title-box {
            text-align: center;
            margin-bottom: 20px;
        }

        .title {
            display: inline-block;
            font-family: Georgia, "Times New Roman", serif;
            font-size: 16px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.7px;
            border-bottom: 2px solid #1e293b;
            padding-bottom: 4px;
        }

        .content {
            padding: 0 28px;
        }

        .intro {
            font-size: 11.5px;
            line-height: 1.7;
            text-align: justify;
            margin: 0 0 18px;
        }

        .section {
            margin-bottom: 20px;
            page-break-inside: avoid;
        }

        .section-heading {
            display: flex;
            align-items: center;
            gap: 8px;
            border-bottom: 2px solid #1e4d7b;
            padding-bottom: 6px;
            margin-bottom: 10px;
            page-break-after: avoid;
        }

        .section-number {
            width: 24px;
            height: 24px;
            min-width: 24px;
            border-radius: 4px;
            background: #1e4d7b;
            color: #ffffff;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 11px;
            font-weight: 700;
            -webkit-print-color-adjust: exact;
            print-color-adjust: exact;
        }

        .section-title {
            font-size: 12px;
            font-weight: 700;
            color: #1e4d7b;
            text-transform: uppercase;
            margin: 0;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            font-size: 10px;
            table-layout: fixed;
        }

        thead {
            display: table-header-group;
        }

        th {
            background: #1e4d7b;
            color: #ffffff;
            border: 1px solid #163a5d;
            padding: 7px 6px;
            font-weight: 700;
            vertical-align: middle;
            -webkit-print-color-adjust: exact;
            print-color-adjust: exact;
        }

        td {
            border: 1px solid #cbd5e1;
            padding: 7px 8px;
            vertical-align: top;
            word-wrap: break-word;
            overflow-wrap: anywhere;
        }

        .label-cell {
            width: 30%;
            background: #f8fafc;
            color: #475569;
            font-weight: 700;
            -webkit-print-color-adjust: exact;
            print-color-adjust: exact;
        }

        .value-cell {
            color: #111827;
            font-weight: 600;
        }

        .center {
            text-align: center;
        }

        .left {
            text-align: left;
        }

        .exam-table th:nth-child(1) {
            width: 7%;
        }

        .exam-table th:nth-child(2) {
            width: 22%;
        }

        .exam-table th:nth-child(3) {
            width: 15%;
        }

        .exam-table th:nth-child(4) {
            width: 31%;
        }

        .exam-table th:nth-child(5) {
            width: 13%;
        }

        .exam-table th:nth-child(6) {
            width: 12%;
        }

        .vendor-table th:nth-child(1) {
            width: 8%;
        }

        .vendor-table th:nth-child(2) {
            width: 24%;
        }

        .vendor-table th:nth-child(3) {
            width: 25%;
        }

        .vendor-table th:nth-child(4) {
            width: 28%;
        }

        .vendor-table th:nth-child(5) {
            width: 15%;
        }

        .declaration {
            font-size: 10.5px;
            line-height: 1.7;
            text-align: justify;
            margin: 0;
        }

        .declaration + .declaration {
            margin-top: 7px;
        }

        .signature-area {
            padding: 0 28px 30px;
        }

        .signature-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 40px;
            margin-top: 28px;
        }

        .place-label {
            font-size: 10.5px;
            font-weight: 700;
            color: #475569;
        }

        .place-line {
            margin-top: 38px;
            width: 140px;
            border-top: 1px solid #cbd5e1;
        }

        .signature {
            text-align: right;
        }

        .signature-space {
            height: 50px;
        }

        .signature-line {
            display: inline-block;
            min-width: 190px;
            border-top: 1px solid #94a3b8;
            padding-top: 6px;
        }

        .signatory {
            font-size: 10.5px;
            font-weight: 700;
            color: #334155;
        }

        .designation {
            font-size: 9px;
            color: #64748b;
            margin-top: 4px;
        }

        @media print {
            html,
            body {
                width: 100%;
                margin: 0;
                padding: 0;
                background: #ffffff;
            }

            .document {
                width: 100%;
                max-width: 100%;
                margin: 0;
            }

            .section {
                page-break-inside: avoid;
            }

            .section-heading {
                page-break-after: avoid;
            }

            table {
                page-break-inside: auto;
            }

            tr {
                page-break-inside: avoid;
                page-break-after: auto;
            }

            .tricolor,
            th,
            .section-number {
                -webkit-print-color-adjust: exact;
                print-color-adjust: exact;
            }
        }
    </style>
</head>

<body>
    <div class="document">
        <div class="tricolor"></div>

        <div class="header">
            <div class="gov-header">
                <img
                    src="<?= base_url('assets/image/Emblem_of_India.svg.webp') ?>"
                    class="emblem"
                    alt="Government of India Emblem"
                >
                <div class="gov-text">
                    Government of India
                </div>
            </div>

            <div class="divider-main"></div>
            <div class="divider-sub"></div>
        </div>

        <div class="meta-wrapper">
            <div class="meta">
                <div>
                    <strong>F.No.:</strong>
                    11/37/2026-JAM
                </div>

                <div class="meta-right">
                    <strong>Dated:</strong>
                    01 September 2026
                </div>
            </div>
        </div>

        <div class="document-title">
            <div class="title-box">
                <div class="title">
                    Application for Jammer Deployment Permission
                </div>
            </div>
        </div>

        <div class="content">
            <p class="intro">
                This application is submitted by the following
                organisation for seeking permission for deployment
                of jammers during the examination(s) mentioned below.
            </p>

            <div class="section">
                <div class="section-heading">
                    <div class="section-number">1</div>
                    <div class="section-title">Applicant / Organisation Details</div>
                </div>

                <table>
                    <tbody>
                        <tr>
                            <td class="label-cell">Application Number</td>
                            <td class="value-cell">${escapeHtml(applicationNumber)}</td>
                        </tr>
                        <tr>
                            <td class="label-cell">Name of Organisation</td>
                            <td class="value-cell">${escapeHtml(organisation)}</td>
                        </tr>
                        <tr>
                            <td class="label-cell">Type of Organisation</td>
                            <td class="value-cell">${escapeHtml(organisationType)}</td>
                        </tr>
                        <tr>
                            <td class="label-cell">Letter Number</td>
                            <td class="value-cell">${escapeHtml(letterNumber)}</td>
                        </tr>
                        <tr>
                            <td class="label-cell">Letter Attached</td>
                            <td class="value-cell">${escapeHtml(letterAttached)}</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="section">
                <div class="section-heading">
                    <div class="section-number">2</div>
                    <div class="section-title">Examination Details</div>
                </div>

                <table class="exam-table">
                    <thead>
                        <tr>
                            <th class="center">S.No.</th>
                            <th class="left">Examination Name</th>
                            <th class="center">Examination Date</th>
                            <th class="left">Examination Address</th>
                            <th class="center">Single Examination</th>
                            <th class="center">Centre Assessed</th>
                        </tr>
                    </thead>

                    <tbody>
                        <tr>
                            <td class="center">1</td>
                            <td class="value-cell">${escapeHtml(examName)}</td>
                            <td class="center">${escapeHtml(examDate)}</td>
                            <td>${escapeHtml(examAddress)}</td>
                            <td class="center">${escapeHtml(singleExam)}</td>
                            <td class="center">${escapeHtml(centreAssessed)}</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="section">
                <div class="section-heading">
                    <div class="section-number">3</div>
                    <div class="section-title">Vendor Details</div>
                </div>

                <table class="vendor-table">
                    <thead>
                        <tr>
                            <th class="center">S.No.</th>
                            <th class="left">Vendor Name</th>
                            <th class="left">Jammer Model</th>
                            <th class="left">Manufacturer / Make</th>
                            <th class="center">Quantity</th>
                        </tr>
                    </thead>

                    <tbody>
                        <tr>
                            <td class="center">1</td>
                            <td class="value-cell">${escapeHtml(vendor)}</td>
                            <td>${escapeHtml(jammerModel)}</td>
                            <td>${escapeHtml(manufacturer || '—')}</td>
                            <td class="center">${escapeHtml(quantity || '—')}</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="section">
                <div class="section-heading">
                    <div class="section-number">4</div>
                    <div class="section-title">Declaration</div>
                </div>

                <p class="declaration">
                    It is certified that the information furnished
                    in this application is true and correct to the
                    best of our knowledge and belief. The organisation
                    undertakes to comply with all applicable
                    instructions, guidelines and conditions relating
                    to deployment and safe custody of jammers during
                    the examination(s).
                </p>

                <p class="declaration">
                    The authorised representative shall be responsible
                    for ensuring that the equipment is deployed only
                    for the approved purpose and at the approved
                    examination centre(s).
                </p>
            </div>
        </div>

        <div class="signature-area">
            <div class="signature-grid">
                <div>
                    <div class="place-label">Place:</div>
                    <div class="place-line"></div>
                </div>

                <div class="signature">
                    <div class="signature-space"></div>
                    <div class="signature-line">
                        <div class="signatory">Authorised Signatory</div>
                        <div class="designation">Name &amp; Designation</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
`);

    printWindow.document.close();

    setTimeout(function() {
        printWindow.focus();
        printWindow.print();

        setTimeout(function() {
            printWindow.close();
        }, 500);

    }, 700);
}

/* =========================================================
   GET MODAL VALUE
   ========================================================= */
function getModalValue(id) {
    const element = document.getElementById(id);

    if (!element) {
        return '—';
    }

    const value = element.textContent.trim();
    return value || '—';
}

/* =========================================================
   ESCAPE HTML
   ========================================================= */
function escapeHtml(value) {
    if (value === null || value === undefined) {
        return '';
    }

    return String(value)
        .replace(/&/g, '&amp;')
        .replace(/</g, '&lt;')
        .replace(/>/g, '&gt;')
        .replace(/"/g, '&quot;')
        .replace(/'/g, '&#039;');
}

/* =========================================================
   DOWNLOAD APPLICATION PREVIEW
   ========================================================= */
function downloadApplicationPreview() {
    const pdfUrl = "<?= esc($application_pdf_url ?? '') ?>";

    if (pdfUrl && pdfUrl.trim() !== '') {
        const link = document.createElement('a');
        link.href = pdfUrl;
        link.download = getApplicationFileName();
        document.body.appendChild(link);
        link.click();
        document.body.removeChild(link);
        return;
    }

    printApplicationPreview();
}

/* =========================================================
   APPLICATION FILE NAME
   ========================================================= */
function getApplicationFileName() {
    const element = document.getElementById('modalAppNo');

    if (element && element.textContent.trim()) {
        let number = element.textContent.trim();
        number = number.replace(/[^a-zA-Z0-9-_]/g, '-');
        return number + '.pdf';
    }

    return 'JPMS-Application.pdf';
}

/* =========================================================
   SIGNED PDF
   ========================================================= */
function handleSignedPdf(input) {
    const file = input.files[0];

    if (!file) {
        return;
    }

    const isPdf = file.type === 'application/pdf' || file.name.toLowerCase().endsWith('.pdf');

    if (!isPdf) {
        alert('Please select a PDF file only.');
        input.value = '';
        return;
    }

    const maxSize = 10 * 1024 * 1024;

    if (file.size > maxSize) {
        alert('PDF size must not exceed 10 MB.');
        input.value = '';
        return;
    }

    const preview = document.getElementById('signedPdfPreview');
    const fileName = document.getElementById('signedPdfFileName');
    const fileSize = document.getElementById('signedPdfFileSize');

    if (fileName) {
        fileName.textContent = file.name;
    }

    if (fileSize) {
        fileSize.textContent = formatFileSize(file.size);
    }

    if (preview) {
        preview.classList.remove('hidden');
    }
}

/* =========================================================
   FORMAT FILE SIZE
   ========================================================= */
function formatFileSize(bytes) {
    if (!bytes) {
        return '0 Bytes';
    }

    const units = ['Bytes', 'KB', 'MB', 'GB'];
    const index = Math.floor(Math.log(bytes) / Math.log(1024));

    return parseFloat((bytes / Math.pow(1024, index)).toFixed(2)) + ' ' + units[index];
}

/* =========================================================
   REMOVE SIGNED PDF
   ========================================================= */
function removeSignedPdf(event) {
    if (event) {
        event.preventDefault();
        event.stopPropagation();
    }

    const input = document.getElementById('signedPdfInput');
    const preview = document.getElementById('signedPdfPreview');
    const fileName = document.getElementById('signedPdfFileName');
    const fileSize = document.getElementById('signedPdfFileSize');

    if (input) {
        input.value = '';
    }

    if (preview) {
        preview.classList.add('hidden');
    }

    if (fileName) {
        fileName.textContent = '';
    }

    if (fileSize) {
        fileSize.textContent = '';
    }
}

/* =========================================================
   ESC KEY
   ========================================================= */
document.addEventListener('keydown', function(event) {
    if (event.key !== 'Escape') {
        return;
    }

    const modal = document.getElementById('applicationPdfModal');

    if (modal && !modal.classList.contains('hidden')) {
        closeApplicationPdfPreview();
    }
});
</script>

<?php
$page_content = ob_get_clean();
include dirname(__DIR__) . '/dashboard.php';
?>