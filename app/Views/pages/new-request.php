<?php
ob_start();
?>
<style>
.organisation-select + .select2-container,
.select2-container {
    width: 100% !important;
}

.select2-container--default .select2-selection--single {
    height: 44px !important;
    min-height: 44px !important;
    display: flex !important;
    align-items: center !important;
    position: relative !important;
    background-color: #ffffff !important;
    border: 1px solid #cbd5e1 !important;
    border-radius: 8px !important;
    box-sizing: border-box !important;
    transition: border-color 0.2s ease, box-shadow 0.2s ease !important;
}

.select2-container--default:hover .select2-selection--single {
    border-color: #94a3b8 !important;
}

.select2-container--default.select2-container--focus .select2-selection--single,
.select2-container--default.select2-container--open .select2-selection--single {
    border-color: #1e4d7b !important;
    box-shadow: 0 0 0 3px rgba(30, 77, 123, 0.10) !important;
}

.select2-container--default .select2-selection--single .select2-selection__rendered {
    width: 100% !important;
    color: #334155 !important;
    font-size: 14px !important;
    font-weight: 400 !important;
    line-height: 42px !important;
    padding-left: 15px !important;
    padding-right: 72px !important;
    white-space: nowrap !important;
    overflow: hidden !important;
    text-overflow: ellipsis !important;
    box-sizing: border-box !important;
}

.select2-container--default .select2-selection--single .select2-selection__clear {
    position: absolute !important;
    top: 50% !important;
    right: 42px !important;
    left: auto !important;
    transform: translateY(-50%) !important;
    width: 18px !important;
    height: 18px !important;
    margin: 0 !important;
    padding: 0 !important;
    display: flex !important;
    align-items: center !important;
    justify-content: center !important;
    color: #64748b !important;
    font-size: 18px !important;
    font-weight: 400 !important;
    line-height: 18px !important;
    z-index: 2 !important;
    cursor: pointer !important;
}

.select2-container--default .select2-selection--single .select2-selection__clear:hover {
    color: #dc2626 !important;
}

.select2-container--default .select2-selection--single .select2-selection__arrow {
    position: absolute !important;
    top: 0 !important;
    right: 8px !important;
    width: 28px !important;
    height: 42px !important;
}

.select2-container--default .select2-selection--single .select2-selection__arrow b {
    position: absolute !important;
    top: 50% !important;
    left: 50% !important;
    margin: -2px 0 0 -4px !important;
    border-color: #64748b transparent transparent transparent !important;
    border-width: 5px 4px 0 4px !important;
}

.select2-container--default.select2-container--open .select2-selection--single .select2-selection__arrow b {
    margin-top: -3px !important;
    border-color: transparent transparent #1e4d7b transparent !important;
    border-width: 0 4px 5px 4px !important;
}

.select2-dropdown {
    background-color: #ffffff !important;
    border: 1px solid #cbd5e1 !important;
    border-radius: 8px !important;
    overflow: hidden !important;
    box-shadow: 0 10px 25px rgba(15, 23, 42, 0.12) !important;
    margin-top: 4px !important;
}

.select2-search--dropdown {
    padding: 8px !important;
    background: #ffffff !important;
    border-bottom: 1px solid #e2e8f0 !important;
}

.select2-search--dropdown .select2-search__field {
    width: 100% !important;
    height: 36px !important;
    padding: 7px 10px !important;
    color: #334155 !important;
    font-size: 13px !important;
    background: #ffffff !important;
    border: 1px solid #cbd5e1 !important;
    border-radius: 6px !important;
    outline: none !important;
    box-sizing: border-box !important;
}

.select2-search--dropdown .select2-search__field:focus {
    border-color: #1e4d7b !important;
    box-shadow: 0 0 0 2px rgba(30, 77, 123, 0.08) !important;
}

.select2-results__option {
    padding: 10px 14px !important;
    color: #334155 !important;
    font-size: 13px !important;
    transition: background-color 0.15s ease !important;
}

.select2-container--default .select2-results__option--highlighted[aria-selected] {
    background-color: #1e4d7b !important;
    color: #ffffff !important;
}

.select2-container--default .select2-results__option[aria-selected="true"] {
    background-color: #eff6ff !important;
    color: #1e4d7b !important;
    font-weight: 600 !important;
}

.select2-container--default .select2-selection--single .select2-selection__placeholder {
    color: #94a3b8 !important;
}

@media (max-width: 640px) {
    .select2-container--default .select2-selection--single {
        height: 42px !important;
        min-height: 42px !important;
    }
    .select2-container--default .select2-selection--single .select2-selection__rendered {
        line-height: 40px !important;
        padding-left: 13px !important;
        padding-right: 65px !important;
        font-size: 13px !important;
    }
    .select2-container--default .select2-selection--single .select2-selection__arrow {
        height: 40px !important;
    }
}

/* Hide centre details when checkbox is checked */
.centre-details.hidden-details {
    display: none !important;
}

/* Modal Styles */
#centreNotAvailableModal .inline-block {
    transition: all 0.3s ease;
}

#centreNotAvailableModal .fixed.inset-0 {
    transition: opacity 0.3s ease;
}

#centreNotAvailableModal .bg-gray-500 {
    transition: opacity 0.3s ease;
}

/* Modal z-index fix */
#centreNotAvailableModal {
    z-index: 99999;
}

/* Modal Styles - Improved */
#centreNotAvailableModal .inline-block {
    transition: all 0.3s ease;
}

#centreNotAvailableModal .fixed.inset-0 {
    transition: opacity 0.3s ease;
}

/* Modal z-index fix */
#centreNotAvailableModal {
    z-index: 99999;
}

/* ===== MODAL IMPROVEMENTS ===== */
#centreNotAvailableModal .inline-block.align-bottom {
    max-width: 520px !important;
    width: 100% !important;
    margin: 0 auto !important;
    border-radius: 16px !important;
    box-shadow: 0 25px 60px rgba(0, 0, 0, 0.3) !important;
}

/* Modal container - center alignment */
#centreNotAvailableModal .flex.items-center.justify-center {
    padding: 1rem !important;
}

/* Modal inner content padding adjustment */
#centreNotAvailableModal .bg-white.px-4.pt-5.pb-4 {
    padding: 1.5rem 1.5rem 1rem 1.5rem !important;
}

/* Modal header icon - smaller */
#centreNotAvailableModal .mx-auto.flex-shrink-0 {
    width: 40px !important;
    height: 40px !important;
    min-width: 40px !important;
}

#centreNotAvailableModal .mx-auto.flex-shrink-0 i {
    font-size: 1.1rem !important;
}

/* Modal title - smaller */
#centreNotAvailableModal h3.text-lg {
    font-size: 1.05rem !important;
}

/* Modal content text - smaller */
#centreNotAvailableModal .mt-3.bg-slate-50 {
    padding: 0.75rem 1rem !important;
}

#centreNotAvailableModal .mt-3.bg-slate-50 p.text-sm {
    font-size: 0.8rem !important;
}

#centreNotAvailableModal .space-y-3.text-xs {
    font-size: 0.7rem !important;
}

#centreNotAvailableModal .space-y-3.text-xs .flex.items-start.gap-2 {
    gap: 6px !important;
}

/* Modal checkbox - smaller */
#centreNotAvailableModal label.flex.items-start.gap-2 {
    gap: 8px !important;
}

#centreNotAvailableModal label.flex.items-start.gap-2 span.text-sm {
    font-size: 0.78rem !important;
}

/* Modal buttons - smaller */
#centreNotAvailableModal .bg-gray-50.px-4.py-3 {
    padding: 0.75rem 1.5rem !important;
    border-radius: 0 0 16px 16px !important;
}

#centreNotAvailableModal .bg-gray-50.px-4.py-3 button {
    font-size: 0.8rem !important;
    padding: 0.4rem 1rem !important;
}

/* Modal animation - smooth */
#centreNotAvailableModal .inline-block.align-bottom {
    animation: modalSlideIn 0.3s ease-out !important;
}

@keyframes modalSlideIn {
    from {
        opacity: 0;
        transform: scale(0.95) translateY(20px);
    }
    to {
        opacity: 1;
        transform: scale(1) translateY(0);
    }
}

/* Modal overlay animation */
#centreNotAvailableModal .fixed.inset-0 {
    animation: overlayFadeIn 0.3s ease-out !important;
}

@keyframes overlayFadeIn {
    from {
        opacity: 0;
    }
    to {
        opacity: 1;
    }
}

/* Responsive - mobile */
@media (max-width: 640px) {
    #centreNotAvailableModal .inline-block.align-bottom {
        max-width: 94% !important;
        margin: 0 auto !important;
        border-radius: 12px !important;
    }
    
    #centreNotAvailableModal .bg-white.px-4.pt-5.pb-4 {
        padding: 1rem 1rem 0.75rem 1rem !important;
    }
    
    #centreNotAvailableModal .bg-gray-50.px-4.py-3 {
        padding: 0.6rem 1rem !important;
        flex-direction: column-reverse !important;
        gap: 6px !important;
    }
    
    #centreNotAvailableModal .bg-gray-50.px-4.py-3 button {
        width: 100% !important;
        justify-content: center !important;
    }
    
    #centreNotAvailableModal .bg-gray-50.px-4.py-3 .sm\\:ml-3 {
        margin-left: 0 !important;
    }
    
    #centreNotAvailableModal .sm\\:flex.sm\\:flex-row-reverse {
        flex-direction: column-reverse !important;
    }
    
    #centreNotAvailableModal .mt-3.sm\\:mt-0.sm\\:ml-4 {
        margin-top: 0.5rem !important;
        margin-left: 0 !important;
    }
}

#centreNotAvailableModal{
    width:100%;
}
.centreNotAvailableModalPart{
    width:100%;
    background-color: rgba(0, 0, 0, 0.6) !important;
    backdrop-filter: blur(8px) !important;
    -webkit-backdrop-filter: blur(8px) !important;
    display: flex;
    justify-content: center;
    align-items: center;

}

.center-pi{
    display: flex;
    justify-content: space-between;
}


</style>

<div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
    <div id="toast-container"
         style="
            position:fixed;
            top:20px;
            right:20px;
            z-index:99999;
            display:flex;
            flex-direction:column;
            gap:10px;
            pointer-events:none;
         ">
    </div>

    <!-- =========================================================
         MODAL FOR CENTRE INFORMATION NOT AVAILABLE
    ========================================================== -->
    <div id="centreNotAvailableModal" class="fixed inset-0 z-[99999] hidden overflow-y-auto">
        <div class="centreNotAvailableModalPart">
            
            <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
            <div class="center-information-box inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
                <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                    <div class="sm:flex sm:items-start">
                        <div class="mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-amber-100 sm:mx-0 sm:h-10 sm:w-10">
                            <i class="fas fa-exclamation-triangle text-amber-600 text-xl"></i>
                        </div>
                        <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left w-full">
                            <h3 class="text-lg leading-6 font-bold text-[#1e4d7b]">
                                Centre Information Not Available
                            </h3>
                            <div class="mt-3 bg-slate-50 p-4 rounded-lg border border-slate-200">
                                <p class="text-sm font-semibold text-slate-700 mb-2">The Declarations should be in Detail:</p>
                               <div class="space-y-3 text-sm font-medium text-slate-700 leading-relaxed"> <div class="flex items-start gap-2"> <span class="font-bold text-[#1e4d7b] shrink-0">i.</span> <span><strong>Adequate arrangements should be made for safe custody of the jammers during its deployment in examination centers.</strong></span> </div> <div class="flex items-start gap-2"> <span class="font-bold text-[#1e4d7b] shrink-0">ii.</span> <span><strong>Each jammer deployed at the examination centers, as indicated in Annexures of the letter under reference, will be accounted for and any discrepancy in this regard will be reported immediately to the appropriate law enforcement agency and to the Office of Secretary (Security).</strong></span> </div> <div class="flex items-start gap-2"> <span class="font-bold text-[#1e4d7b] shrink-0">iii.</span> <span><strong>While deploying the jammers it will be ensured by <span style="color:#1e4d7b;">[Name of examination conducting body]</span> that the jammers do not interfere with existing mobile communication network outside examination center.</strong></span> </div> </div>
                            </div>
                            <div class="mt-4">
                                <label class="flex items-start gap-2 cursor-pointer">
                                    <input type="checkbox" id="modalDeclarationCheck" class="mt-1 w-4 h-4 text-[#1e4d7b] rounded border-slate-300 focus:ring-[#1e4d7b]">
                                    <span class="text-sm text-slate-700 font-medium">I confirm that the above declarations have been read and understood.</span>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                    <button type="button" id="modalSubmitBtn" class="w-full inline-flex justify-center rounded-lg border border-transparent shadow-sm px-4 py-2 bg-[#1e4d7b] text-base font-medium text-white hover:bg-[#163a5c] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#1e4d7b] sm:ml-3 sm:w-auto sm:text-sm disabled:opacity-50 disabled:cursor-not-allowed" disabled>
                       Confirm & Proceed
                    </button>
                    <button type="button" id="modalCancelBtn" class="mt-3 w-full inline-flex justify-center rounded-lg border border-slate-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-slate-700 hover:bg-slate-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#1e4d7b] sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
                        Cancel
                    </button>
                </div>
            </div>
        </div>
    </div>

    <div class="lg:col-span-2 space-y-6">   
    <?php
    $isEditMode = $isEditMode ?? false;
    $editData   = $editData   ?? null;
    $formAction = $isEditMode
        ? base_url('update-request/' . $editData['app_id'])
        : base_url('submit-request');
    ?>
    <form id="permissionForm"
          action="<?= $formAction ?>"
          method="POST"
          class="space-y-6"
          enctype="multipart/form-data"
          data-edit-mode="<?= $isEditMode ? '1' : '0' ?>"
          data-app-id="<?= $isEditMode ? $editData['app_id'] : '' ?>">
            <?= csrf_field() ?>
            <?php if ($isEditMode): ?>
                <input type="hidden" name="app_id" value="<?= $editData['app_id'] ?>">
            <?php endif; ?>

            <div class="gov-card p-6">
                <div class="flex items-center justify-between border-b border-slate-200 pb-4 mb-6">
                    <div class="flex items-center gap-3">
                        <i class="fas fa-file-signature text-[#e58500] text-2xl"></i>
                        <div>
                            <h2 class="text-xl font-bold text-[#1e4d7b]">
                                <?= $isEditMode ? 'Edit Permission Application' : 'New Permission Application' ?>
                            </h2>
                            <p class="text-xs text-slate-500 font-medium">
                                <?php if ($isEditMode): ?>
                                    Editing Application No: <strong><?= esc($editData['app_no']) ?></strong>
                                <?php else: ?>
                                    Form JPMS-1 · Application for deployment of signal jammers
                                <?php endif; ?>
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Organisation Details -->
                <div class="space-y-4">
                    <h3 class="text-base font-bold text-[#1e4d7b] flex items-center gap-2 border-b border-slate-100 pb-2">
                        <i class="fas fa-building"></i> Organisation Details
                    </h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-semibold text-slate-700 mb-1.5">Name of organisation</label>
                            <select name="organisation_name" id="organisation_name" class="organisation-select w-full" required>
                                <option value=""></option>
                                <?php if (!empty($organizations)): ?>
                                    <?php foreach ($organizations as $organisation): ?>
                                        <option value="<?= esc($organisation['org_name']) ?>"
                                            data-organization-id="<?= esc($organisation['id']) ?>"
                                            data-org-type="<?= esc($organisation['org_type']) ?>"
                                            <?= ((int)$organisation['id'] === (int)$organization_id) ? 'selected' : '' ?>>
                                            <?= esc($organisation['org_name']) ?>
                                        </option>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </select>
                            <input type="hidden" name="organization_id" id="organization_id" value="<?= esc($organization_id ?? '') ?>">
                        </div>
                        <div>
                            <label class="block text-sm font-semibold text-slate-700 mb-1.5">Type of organisation</label>
                            <select name="organisation_type" id="organisation_type" class="organisation-select w-full" required>
                                <option value=""></option>
                                <?php if (!empty($organization_types)): ?>
                                    <?php foreach ($organization_types as $type): ?>
                                        <option value="<?= esc($type['name']) ?>"
                                            data-type-id="<?= esc($type['id']) ?>"
                                            data-ugc-required="<?= esc($type['is_ugc_id_required']) ?>"
                                            <?= ((int)$type['id'] === (int)$org_type) ? 'selected' : '' ?>>
                                            <?= esc($type['name']) ?>
                                        </option>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </select>
                            <input type="hidden" name="org_type" id="org_type" value="<?= esc($org_type ?? '') ?>">
                        </div>
                    </div>
                </div>
            </div>

            <!-- EXAMINATION DETAILS -->
            <div class="gov-card p-6">
                <div class="space-y-5">
                    <h3 class="text-base font-bold text-[#1e4d7b] flex items-center gap-2 border-b border-slate-100 pb-2">
                        <i class="fas fa-graduation-cap"></i> Examination Details
                    </h3>

                    <div>
                        <label class="block text-sm font-semibold text-slate-700 mb-2">
                            Whether request for deployment of jammers is for a single examination?
                        </label>
                        <div class="flex items-center gap-6">
                            <label class="inline-flex items-center cursor-pointer text-sm font-medium text-slate-700">
                                <input type="radio" name="single_exam" value="yes" checked class="w-4 h-4 text-[#1e4d7b] focus:ring-[#1e4d7b]">
                                <span class="ml-2">Yes</span>
                            </label>
                            <label class="inline-flex items-center cursor-pointer text-sm font-medium text-slate-700">
                                <input type="radio" name="single_exam" value="no" class="w-4 h-4 text-[#1e4d7b] focus:ring-[#1e4d7b]">
                                <span class="ml-2">No</span>
                            </label>
                        </div>
                    </div>

                    <!-- SINGLE EXAMINATION (YES) -->
                    <div id="single-exam-container">
                        <div class="centre-details mt-4">
                            <div>
                                <label class="block text-sm font-semibold text-slate-700 mb-1.5">Name of examination</label>
                                <input type="text" name="single_exam_name"
                                    class="w-full px-4 py-2 border border-slate-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#1e4d7b] transition text-sm"
                                    placeholder="Enter examination name">
                            </div>
                        </div>

                        <div class="centre-details mt-4">
                            <div id="singleCentreNotAvailableWrapper" class="flex items-center justify-between mb-4 pb-3 border-b border-slate-200">
                                <label class="inline-flex items-center gap-2.5 cursor-pointer select-none">
                                    <input type="checkbox" name="single_centre_not_available_flag"
                                        class="single-centre-not-available centre-not-available w-4 h-4 text-[#1e4d7b] rounded border-slate-300 focus:ring-[#1e4d7b]">
                                    <span class="text-xs font-semibold text-slate-700">Centre Information Not Available</span>
                                </label>
                            </div>

                            <label class="block text-sm font-semibold text-slate-700 mb-2">Whether the request is for a single date of examination ?</label>
                            <div class="flex items-center gap-6 mb-3">
                                <label class="inline-flex items-center cursor-pointer">
                                    <input type="radio" name="exam_date_type" value="single" id="examDateSingle"
                                        class="w-4 h-4 text-[#1e4d7b] border-slate-300 focus:ring-[#1e4d7b]" checked>
                                    <span class="ml-2 text-sm text-slate-700">Yes</span>
                                </label>
                                <label class="inline-flex items-center cursor-pointer">
                                    <input type="radio" name="exam_date_type" value="multiple" id="examDateMultiple"
                                        class="w-4 h-4 text-[#1e4d7b] border-slate-300 focus:ring-[#1e4d7b]">
                                    <span class="ml-2 text-sm text-slate-700">No</span>
                                </label>
                            </div>

                            <div id="singleDateSection">
                                <div class="relative w-full md:w-1/2">
                                    <input type="text" name="single_exam_date" id="singleExamDateText" placeholder="dd/mm/yyyy"
                                        maxlength="10" autocomplete="off"
                                        class="date-text w-full px-4 py-2 border border-slate-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#1e4d7b] transition text-sm pr-10">
                                    <input type="date" id="singleExamDatePicker"
                                        class="date-picker absolute right-2 top-1/2 -translate-y-1/2 opacity-0 w-8 h-8 cursor-pointer z-10">
                                    <i class="fas fa-calendar-alt absolute right-3 top-1/2 -translate-y-1/2 text-slate-400 pointer-events-none"></i>
                                </div>

                                <div class="mt-5" id="singleDateCentreWrapper">
                                    <div class="flex items-center justify-between mb-2">
                                        <label class="block text-sm font-semibold text-slate-700">Centre of examination</label>
                                        <button type="button" id="addSingleDateCentre"
                                            class="inline-flex items-center gap-1.5 px-3 py-2 bg-white border border-[#1e4d7b] text-[#1e4d7b] text-xs font-semibold rounded-lg transition">
                                            <i class="fas fa-plus"></i> Add Centre
                                        </button>
                                    </div>
                                    <div id="single-date-centres-container"></div>
                                </div>
                            </div>

                            <div id="multipleDateSection" class="hidden">
                                <div id="multipleDateContainer" class="space-y-3"></div>
                                <div class="mt-4 flex justify-end">
                                    <button type="button" id="addSingleMultipleDate"
                                        class="px-3 py-2 rounded-lg bg-[#1e4d7b] text-white text-sm font-semibold hover:bg-[#123b60] transition whitespace-nowrap">
                                        <i class="fas fa-plus mr-1"></i> Add Date
                                    </button>
                                </div>
                            </div>
                        </div>

                        <div class="mt-5" id="singleExamExcelSection">
                            <label class="block text-sm font-semibold text-slate-700 mb-1.5">Upload Excel sheet of examinations / centres</label>
                            <div class="flex items-center gap-2">
                                <label class="flex-1 cursor-pointer flex items-center justify-center px-4 py-2.5 border border-dashed border-slate-300 bg-slate-50 hover:bg-slate-100 rounded-lg transition text-slate-600 text-sm font-medium">
                                    <i class="fas fa-file-excel text-emerald-600 mr-2 text-base"></i>
                                    Choose Excel File
                                    <input type="file" name="single_exam_excel" accept=".xlsx,.xls,.csv" class="hidden excel-input">
                                </label>
                                <span class="excel-file-name text-xs text-slate-400">No file selected</span>
                            </div>
                            <p class="text-[11px] text-slate-400 mt-1">Supported formats: XLSX, XLS, CSV</p>
                        </div>
                    </div>

                    <!-- MULTIPLE EXAMINATIONS (NO) -->
                    <div id="multiple-exam-container" class="hidden">
                        <div class="flex items-center justify-between mb-3">
                            <div>
                                <h4 class="text-sm font-bold text-[#1e4d7b]">Multiple Examination Details</h4>
                                <p class="text-xs text-slate-400 mt-0.5">Add examination and centre details separately.</p>
                            </div>
                            <button type="button" id="addExam"
                                class="inline-flex items-center gap-1.5 px-3 py-2 bg-[#1e4d7b] hover:bg-[#163a5c] text-white text-xs font-semibold rounded-lg transition">
                                <i class="fas fa-plus"></i>Add Examination
                            </button>
                        </div>
                        <div id="multiple-exams-list"></div>

                        <div class="mt-5">
                            <label class="block text-sm font-semibold text-slate-700 mb-1.5">Upload Excel sheet of examinations / centres</label>
                            <div class="flex items-center gap-2">
                                <label class="flex-1 cursor-pointer flex items-center justify-center px-4 py-2.5 border border-dashed border-slate-300 bg-slate-50 hover:bg-slate-100 rounded-lg transition text-slate-600 text-sm font-medium">
                                    <i class="fas fa-file-excel text-emerald-600 mr-2 text-base"></i>
                                    Choose Excel File
                                    <input type="file" name="multiple_exam_excel" accept=".xlsx,.xls,.csv" class="hidden excel-input">
                                </label>
                                <span class="excel-file-name text-xs text-slate-400">No file selected</span>
                            </div>
                            <p class="text-[11px] text-slate-400 mt-1">Supported formats: XLSX, XLS, CSV</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- VENDOR DETAILS -->
            <div class="gov-card p-6">
                <div class="space-y-4">
                    <div class="flex items-center justify-between border-b border-slate-100 pb-2">
                        <h3 class="text-base font-bold text-[#1e4d7b] flex items-center gap-2">
                            <i class="fas fa-microchip"></i> Vendor Details
                        </h3>
                        <button type="button" onclick="addVendor()"
                            class="inline-flex items-center gap-2 px-4 py-2 bg-[#1e4d7b] hover:bg-[#163a5c] text-white text-sm font-semibold rounded-lg transition">
                            <i class="fas fa-plus"></i> Add Vendor
                        </button>
                    </div>
                    <div id="vendorContainer">
                        <div class="vendor-item border border-slate-200 rounded-xl p-4 mb-4 bg-slate-50">
                            <div class="flex items-center justify-between mb-4">
                                <h4 class="font-semibold text-[#1e4d7b]"><i class="fas fa-building mr-1"></i> Vendor 1</h4>
                                <button type="button" onclick="removeVendor(this)"
                                    class="hidden text-red-500 hover:text-red-700 text-sm font-semibold">
                                    <i class="fas fa-trash-alt mr-1"></i> Remove
                                </button>
                            </div>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div>
                                    <label class="block text-sm font-semibold text-slate-700 mb-1.5">Name of vendor</label>
                                    <select name="vendor_id[]"
                                        class="vendor-select w-full px-4 py-2 border border-slate-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#1e4d7b] transition text-sm bg-white"
                                        required>
                                        <option value="">Select vendor</option>
                                    </select>
                                </div>
                                <div>
                                    <label class="block text-sm font-semibold text-slate-700 mb-1.5">Jammer model</label>
                                    <select name="jammer_model_ids[]"
                                        class="model-select w-full px-4 py-2 border border-slate-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#1e4d7b] transition text-sm bg-white">
                                        <option value="">Select jammer model</option>
                                    </select>
                                </div>
                            </div>
                            <div class="mt-4">
                                <label class="block text-sm font-semibold text-slate-700 mb-1.5">Technical specifications of jammers</label>
                                <div class="flex items-center gap-2">
                                    <label class="flex-1 cursor-pointer flex items-center justify-center px-4 py-2 border border-dashed border-slate-300 bg-white hover:bg-slate-100 rounded-lg transition text-slate-600 text-sm font-medium">
                                        <i class="fas fa-file-pdf text-[#e58500] mr-2"></i>
                                        <span>Choose file</span>
                                        <input type="file" name="technical_specifications[]" accept=".pdf"
                                            class="hidden tech-file-input" onchange="showFileName(this)">
                                    </label>
                                    <span class="file-name text-xs text-slate-400">No file selected</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- DECLARATIONS -->
            <div class="gov-card p-6 space-y-6">
                <div class="space-y-2">
                    <h3 class="text-base font-bold text-[#1e4d7b] mb-3 flex items-center gap-2 border-b border-slate-100 pb-2">
                        <i class="fas fa-file-contract"></i> Declarations
                    </h3>
                    <div class="space-y-3 bg-slate-50 p-4 rounded-lg border border-slate-200">
                        <label class="flex items-start gap-2 cursor-pointer">
                            <input type="checkbox" name="declarations[]" value="security"
                                class="mt-1 w-4 h-4 text-[#1e4d7b] rounded border-slate-300 focus:ring-[#1e4d7b]">
                            <span class="text-xs text-slate-700 font-medium leading-relaxed">
                                <strong>i.</strong> Adequate arrangements should be made for safe custody of the jammers during its deployment in examination centers.
                            </span>
                        </label>
                        <label class="flex items-start gap-2 cursor-pointer">
                            <input type="checkbox" name="declarations[]" value="accountability"
                                class="mt-1 w-4 h-4 text-[#1e4d7b] rounded border-slate-300 focus:ring-[#1e4d7b]">
                            <span class="text-xs text-slate-700 font-medium leading-relaxed">
                                <strong>ii.</strong> Each jammer deployed at the examination centers, as indicated in Annexures of the letter under reference, will be accounted for and any discrepancy in this regard will be reported immediately to the appropriate law enforcement agency and to the Office of Secretary (Security).
                            </span>
                        </label>
                        <label class="flex items-start gap-2 cursor-pointer">
                            <input type="checkbox" name="declarations[]" value="non_interference"
                                class="mt-1 w-4 h-4 text-[#1e4d7b] rounded border-slate-300 focus:ring-[#1e4d7b]">
                            <span class="text-xs text-slate-700 font-medium leading-relaxed">
                                <strong>iii.</strong> While deploying the jammers it will be ensured by <strong>[Name of examination conducting body]</strong> that the jammers do not interfere with existing mobile communication network outside examination center.
                            </span>
                        </label>
                    </div>
                </div>

                <div class="flex items-center gap-3 pt-2">
                    <button type="submit"
                        class="btn-orange w-40 h-11 rounded-lg font-semibold text-white shadow-sm opacity-50 cursor-not-allowed transition flex items-center justify-center gap-2"
                        id="submitBtn" disabled>
                        <i class="fas fa-paper-plane"></i>
                        <span id="submitBtnText"><?= $isEditMode ? 'Update Request' : 'Submit Request' ?></span>
                    </button>
                    <?php if (!$isEditMode): ?>
                        <button type="button" 
                                onclick="saveAsDraft()"
                                class="w-40 h-11 border border-amber-300 rounded-lg text-amber-700 font-semibold hover:bg-amber-50 transition flex items-center justify-center gap-2">
                            <i class="fas fa-file-pen"></i> Save as Draft
                        </button>
                    <?php endif; ?>
                    <button type="reset"
                        class="w-40 h-11 border border-slate-300 rounded-lg text-slate-700 font-semibold hover:bg-slate-50 transition flex items-center justify-center gap-2">
                        <i class="fas fa-undo"></i> Reset
                    </button>
                </div>
            </div>
         </form>
        <?php if ($isEditMode): ?>
            <script>
                window.IS_EDIT_MODE = true;
                window.EDIT_MODE_DATA = <?= json_encode($editData, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES) ?>;
                window.BASE_URL = '<?= base_url() ?>';
            </script>
        <?php else: ?>
            <script>
                window.IS_EDIT_MODE = false;
            </script>
        <?php endif; ?>
    </div>

    <div class="space-y-6 py-6">
        <div class="gov-card p-6">
            <h3 class="text-base font-bold text-[#1e4d7b] mb-4 flex items-center justify-between">
                <span>Submission progress</span>
            </h3>

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
<script src="<?= base_url('assets/js/tost.js') ?>"></script>
<script>
    const baseUrl = "<?= base_url() ?>";
</script>
<script>
$(document).ready(function () {

    // ============================================================
    // SUBMIT BUTTON TOGGLE
    // ============================================================
    function toggleSubmitButton() {
        const checkedCount = $('input[name="declarations[]"]:checked').length;
        const $btn = $('#submitBtn');
        if (checkedCount === 3) {
            $btn.prop('disabled', false);
            $btn.removeClass('opacity-50 cursor-not-allowed').addClass('hover:opacity-90');
        } else {
            $btn.prop('disabled', true);
            $btn.addClass('opacity-50 cursor-not-allowed').removeClass('hover:opacity-90');
        }
    }
    toggleSubmitButton();
    $(document).on('change', 'input[name="declarations[]"]', toggleSubmitButton);

    // ============================================================
    // MAIN SINGLE / MULTIPLE EXAM TOGGLE
    // ============================================================
    $('input[name="single_exam"]').on('change', function () {
        if ($(this).val() === 'yes') {
            $('#single-exam-container').removeClass('hidden');
            $('#multiple-exam-container').addClass('hidden');
            enableSection('#single-exam-container');
            disableSection('#multiple-exam-container');
        } else {
            $('#single-exam-container').addClass('hidden');
            $('#multiple-exam-container').removeClass('hidden');
            disableSection('#single-exam-container');
            enableSection('#multiple-exam-container');
            if ($('#multiple-exams-list .exam-item').length === 0) addExamination();
        }
    });

    function enableSection(sel) { $(sel).find('input, textarea, select, button').prop('disabled', false); }
    function disableSection(sel) { $(sel).find('input, textarea, select, button').prop('disabled', true); }

    // ============================================================
    // CSRF HELPERS
    // ============================================================
    function getCSRFToken() { return $('input[name="csrf_test_name"]').val() || ''; }
    function updateCSRF(res) { if (res && res.csrf_hash) $('input[name="csrf_test_name"]').val(res.csrf_hash); }

    // ============================================================
    // ✅ UNIVERSAL FILE INPUT DISPLAY HANDLER
    // ============================================================
    $(document).on('change', 'input[type="file"]', function () {
        const input = this;
        const $input = $(this);

        let $display = $input.closest('.flex, .mt-4, .mt-3, .mt-2')
                              .find('.excel-file-name, .file-name')
                              .first();
        if (!$display.length) {
            $display = $input.closest('label').next('span');
        }
        if (!$display.length) {
            $display = $input.closest('label').parent().find('span').last();
        }
        if (!$display.length) {
            console.warn('File display span not found for input:', input.name);
            return;
        }

        if (input.files && input.files.length > 0) {
            const fileName = input.files.length > 1
                ? input.files.length + ' files selected'
                : input.files[0].name;
            $display
                .text(fileName)
                .removeClass('text-slate-400 text-green-600')
                .addClass('text-emerald-600 font-medium');
        } else {
            $display
                .text('No file selected')
                .removeClass('text-emerald-600 text-green-600 font-medium')
                .addClass('text-slate-400');
        }
    });

    // ============================================================
    // DATE FORMATTER (dd/mm/yyyy)
    // ============================================================
    $(document).on('input', '.date-text, .multiple-date-text, .single-multi-date-text', function () {
        let v = $(this).val().replace(/\D/g, '');
        if (v.length > 8) v = v.substring(0, 8);
        if (v.length >= 5) v = v.substring(0, 2) + '/' + v.substring(2, 4) + '/' + v.substring(4);
        else if (v.length >= 3) v = v.substring(0, 2) + '/' + v.substring(2);
        $(this).val(v);
    });

    $(document).on('change', '.date-picker', function () {
        const v = $(this).val();
        if (!v) return;
        const p = v.split('-');
        if (p.length === 3) {
            $(this).closest('.relative').find('.date-text').val(p[2] + '/' + p[1] + '/' + p[0]);
        }
    });

    $(document).on('change', '.single-multi-date-picker, .multiple-date-picker', function () {
        const v = $(this).val();
        if (!v) return;
        const p = v.split('-');
        if (p.length === 3) {
            $(this).closest('.relative').find('.single-multi-date-text, .multiple-date-text').val(p[2] + '/' + p[1] + '/' + p[0]);
        }
    });

    // ============================================================
    // SELECT2 - STATE / DISTRICT
    // ============================================================
    function initStateSelect2(el) {
        const $el = $(el);
        if (!$el.length) return;
        if ($el.hasClass('select2-hidden-accessible')) $el.select2('destroy');
        $el.select2({ width: '100%', placeholder: 'Select State / UT', allowClear: true });
    }
    function initDistrictSelect2(el) {
        const $el = $(el);
        if (!$el.length) return;
        if ($el.hasClass('select2-hidden-accessible')) $el.select2('destroy');
        $el.select2({ width: '100%', placeholder: 'Select District / City', allowClear: true });
    }

    function loadIndianStatesForElement(stateSelect, selectedState = '') {
        const $s = $(stateSelect);
        if (!$s.length) return;
        $.ajax({
            url: baseUrl + '/location/get-states',
            type: 'GET',
            dataType: 'json',
            success: function (response) {
                $s.empty().append('<option value="">Select State / UT</option>');
                if (response.status && response.data && response.data.length) {
                    $.each(response.data, function (i, st) {
                        $s.append($('<option>', {
                            value: st.id, text: st.state_name,
                            selected: String(st.id) === String(selectedState)
                        }));
                    });
                }
                initStateSelect2($s);
            },
            error: function () {
                $s.empty().append('<option value="">Unable to load states</option>');
                initStateSelect2($s);
            }
        });
    }

    function loadDistricts(stateId, districtElement) {
        $.ajax({
            url: baseUrl + '/location/get-cities',
            type: 'POST',
            dataType: 'json',
            data: { state_id: stateId, csrf_test_name: getCSRFToken() },
            success: function (response) {
                updateCSRF(response);
                const $d = $(districtElement);
                $d.empty().append('<option value="">Select District / City</option>');
                if (response.status && Array.isArray(response.data) && response.data.length) {
                    $.each(response.data, function (i, dist) {
                        $d.append($('<option>', { value: dist.id, text: dist.city_name }));
                    });
                } else {
                    $d.append('<option value="">No District / City Found</option>');
                }
                $d.prop('disabled', false);
                initDistrictSelect2($d);
                $d.trigger('change');
            },
            error: function () {
                const $d = $(districtElement);
                $d.empty().append('<option value="">Unable to load District / City</option>').prop('disabled', true);
                initDistrictSelect2($d);
            }
        });
    }

    $(document).on('change', '.single-centre-state, .multiple-centre-state, .single-multi-centre-state', function () {
        const stateId = $(this).val();
        const $c = $(this).closest('.centre-item, .exam-centre, .single-multi-centre');
        const $d = $c.find('.single-centre-district, .multiple-centre-district, .single-multi-centre-district').first();
        if (!$d.length) return;
        $d.val(null).empty().append('<option value="">Select District / City</option>').prop('disabled', true);
        initDistrictSelect2($d);
        if (stateId) loadDistricts(stateId, $d);
    });

    // ============================================================
    // CENTRE NOT AVAILABLE MODAL
    // ============================================================
    let modalTriggerCheckbox = null;

    $(document).on('change', '.centre-not-available', function (e) {
        const $cb = $(this);
        if ($cb.is(':checked')) {
            $cb.prop('checked', false);
            modalTriggerCheckbox = $cb;
            $('#modalDeclarationCheck').prop('checked', false);
            $('#modalSubmitBtn').prop('disabled', true)
                .addClass('opacity-50 cursor-not-allowed');
            $('#centreNotAvailableModal').removeClass('hidden').css('display', 'flex');
        } else {
            handleCentreVisibility($cb, false);
        }
    });

    $(document).on('change', '#modalDeclarationCheck', function () {
        const checked = $(this).is(':checked');
        const $btn = $('#modalSubmitBtn');
        if (checked) {
            $btn.prop('disabled', false).removeClass('opacity-50 cursor-not-allowed');
        } else {
            $btn.prop('disabled', true).addClass('opacity-50 cursor-not-allowed');
        }
    });

    $(document).on('click', '#modalSubmitBtn', function () {
        if (!modalTriggerCheckbox) return;
        const $cb = modalTriggerCheckbox;
        $cb.prop('checked', true);
        handleCentreVisibility($cb, true);
        closeModal();
    });

    $(document).on('click', '#modalCancelBtn', function () {
        if (modalTriggerCheckbox) {
            modalTriggerCheckbox.prop('checked', false);
            modalTriggerCheckbox = null;
        }
        closeModal();
    });

    function closeModal() {
        $('#centreNotAvailableModal').addClass('hidden').css('display', '');
        $('#modalDeclarationCheck').prop('checked', false);
        $('#modalSubmitBtn').prop('disabled', true).addClass('opacity-50 cursor-not-allowed');
        modalTriggerCheckbox = null;
    }

    // ============================================================
    // HANDLE CENTRE VISIBILITY
    // ✅ FIX: "Add Date" button (#addSingleMultipleDate) always visible
    // ============================================================
    function handleCentreVisibility($cb, isChecked) {
        if ($cb.hasClass('single-centre-not-available')) {
            const dateType = $('input[name="exam_date_type"]:checked').val();
            if (dateType === 'single') {
                const $wrapper = $('#singleDateCentreWrapper');
                if (isChecked) {
                    $wrapper.slideUp(300);
                    $wrapper.find('input, select, textarea').prop('disabled', true);
                    $('#addSingleDateCentre').hide();
                } else {
                    $wrapper.slideDown(300);
                    $wrapper.find('input, select, textarea').prop('disabled', false);
                    $('#addSingleDateCentre').show();
                }
            } else {
                const $groups = $('#multipleDateContainer .date-centre-group');
                if (isChecked) {
                    $groups.find('.centre-block-for-date').slideUp(300);
                    $groups.find('.centre-block-for-date input, .centre-block-for-date select, .centre-block-for-date textarea').prop('disabled', true);
                    // ✅ REMOVED: $('#addSingleMultipleDate').hide();
                } else {
                    $groups.find('.centre-block-for-date').slideDown(300);
                    $groups.find('.centre-block-for-date input, .centre-block-for-date select, .centre-block-for-date textarea').prop('disabled', false);
                    // ✅ REMOVED: $('#addSingleMultipleDate').show();
                }
            }
            return;
        }

        if ($cb.closest('.exam-item').length) {
            const $exam = $cb.closest('.exam-item');
            const $items = $exam.find('.exam-centre');
            const $add = $exam.find('.add-exam-centre');
            if (isChecked) {
                $items.slideUp(300); $add.hide();
                $items.find('input, select, textarea').prop('disabled', true);
            } else {
                // ✅ Only show "Add Centre" if date type is single
                const dateType = $exam.find('input.multiple-exam-date-type:checked').val();
                $items.slideDown(300);
                if (dateType === 'single') $add.show(); else $add.hide();
                $items.find('input, select, textarea').prop('disabled', false);
            }
        }
    }

    // ============================================================
    // SINGLE EXAM (YES) — SINGLE DATE CENTRE BLOCK
    // ============================================================
    function getSingleDateCentreHTML(centreNo) {
        return `
            <div class="centre-item border border-slate-200 rounded-xl p-4 bg-slate-50 mt-3" data-single-centre-no="${centreNo}">
                <div class="flex justify-between items-center mb-4">
                    <span class="text-xs font-bold text-[#1e4d7b]">Centre ${centreNo}</span>
                    ${centreNo > 1 ? `<button type="button" class="remove-single-date-centre text-red-500 hover:text-red-700 text-xs font-semibold transition"><i class="fas fa-trash-alt mr-1"></i> Remove</button>` : ''}
                </div>
                <div class="centre-details grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-xs font-semibold text-slate-700 mb-1.5">Centre Name</label>
                        <input type="text" name="single_centre_name[]" class="centre-name w-full px-3 py-2 border border-slate-300 rounded-lg bg-white text-sm" placeholder="Enter centre name">
                    </div>
                    <div>
                        <label class="block text-xs font-semibold text-slate-700 mb-1.5">Centre Coordinates</label>
                        <input type="text" name="single_centre_coordinates[]" class="centre-coordinates w-full px-3 py-2 border border-slate-300 rounded-lg bg-white text-sm" placeholder="e.g. 28.6139, 77.2090">
                    </div>
                    <div>
                        <label class="block text-xs font-semibold text-slate-700 mb-1.5">State</label>
                        <select name="single_centre_state[]" class="single-centre-state w-full px-3 py-2 border border-slate-300 rounded-lg bg-white text-sm">
                            <option value="">Select State / UT</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-xs font-semibold text-slate-700 mb-1.5">District</label>
                        <select name="single_centre_district[]" class="single-centre-district w-full px-3 py-2 border border-slate-300 rounded-lg bg-white text-sm" disabled>
                            <option value="">Select District / City</option>
                        </select>
                    </div>
                    <div class="center-pi md:col-span-2 grid grid-cols-1 md:grid-cols-3 gap-4">
                        <div class="w-full">
                            <label class="block text-xs font-semibold text-slate-600 mb-1">Contact Person</label>
                            <input type="text" name="contact_person[]" class="w-full px-3 py-2 border border-slate-300 rounded-lg text-sm" placeholder="Full name">
                        </div>
                        <div class="w-full">
                            <label class="block text-xs font-semibold text-slate-600 mb-1">Email</label>
                            <input type="email" name="contact_email[]" class="w-full px-3 py-2 border border-slate-300 rounded-lg text-sm" placeholder="email@example.com">
                        </div>
                        <div class="w-full">
                            <label class="block text-xs font-semibold text-slate-600 mb-1">Phone</label>
                            <input type="tel" name="contact_phone[]" class="w-full px-3 py-2 border border-slate-300 rounded-lg text-sm" placeholder="+91 XXXXX XXXXX">
                        </div>
                    </div>
                    <div class="md:col-span-2">
                        <label class="block text-xs font-semibold text-slate-700 mb-1.5">Centre Address</label>
                        <textarea name="single_centre_address[]" rows="2" class="centre-address w-full px-3 py-2 border border-slate-300 rounded-lg bg-white text-sm" placeholder="Enter complete centre address..."></textarea>
                    </div>
                </div>
            </div>`;
    }

    function initSingleDateCentreBlock() {
        const $container = $('#single-date-centres-container');
        if (!$container.length) return;
        if ($container.find('.centre-item').length === 0) {
            $container.append(getSingleDateCentreHTML(1));
            const $new = $container.find('.centre-item').last();
            loadIndianStatesForElement($new.find('.single-centre-state'));
            initDistrictSelect2($new.find('.single-centre-district'));
        }
    }

    $(document).on('click', '#addSingleDateCentre', function () {
        const $container = $('#single-date-centres-container');
        const centreNo = $container.find('.centre-item').length + 1;
        $container.append(getSingleDateCentreHTML(centreNo));
        const $new = $container.find('.centre-item').last();
        loadIndianStatesForElement($new.find('.single-centre-state'));
        initDistrictSelect2($new.find('.single-centre-district'));
    });

    $(document).on('click', '.remove-single-date-centre', function () {
        $(this).closest('.centre-item').remove();
        $('#single-date-centres-container .centre-item').each(function (i) {
            const n = i + 1;
            $(this).attr('data-single-centre-no', n);
            $(this).find('span.text-xs.font-bold').text('Centre ' + n);
        });
    });

    // ============================================================
    // SINGLE EXAM (YES) — MULTIPLE DATES
    // ============================================================
    function getSingleMultiCentreHTML(centreNo) {
        return `
            <div class="single-multi-centre border border-slate-200 rounded-lg p-4 bg-white mb-3">
                <div class="flex items-center justify-between mb-4">
                    <span class="text-xs font-bold text-slate-600">Centre ${centreNo}</span>
                    ${centreNo > 1 ? `<button type="button" class="remove-single-multi-centre text-red-500 hover:text-red-700 text-xs font-semibold"><i class="fas fa-trash-alt mr-1"></i> Remove</button>` : ''}
                </div>
                <div class="centre-details grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-xs font-semibold text-slate-700 mb-1.5">Centre Name</label>
                        <input type="text" name="single_multi_centre_name[]" class="centre-name w-full px-3 py-2 border border-slate-300 rounded-lg bg-white text-sm" placeholder="Enter centre name">
                    </div>
                    <div>
                        <label class="block text-xs font-semibold text-slate-700 mb-1.5">Centre Coordinates</label>
                        <input type="text" name="single_multi_centre_coordinates[]" class="centre-coordinates w-full px-3 py-2 border border-slate-300 rounded-lg bg-white text-sm" placeholder="e.g. 28.6139, 77.2090">
                    </div>
                    <div>
                        <label class="block text-xs font-semibold text-slate-700 mb-1.5">State / UT</label>
                        <select name="single_multi_centre_state[]" class="single-multi-centre-state w-full px-3 py-2 border border-slate-300 rounded-lg bg-white text-sm">
                            <option value="">Select State / UT</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-xs font-semibold text-slate-700 mb-1.5">City / District</label>
                        <select name="single_multi_centre_district[]" class="single-multi-centre-district w-full px-3 py-2 border border-slate-300 rounded-lg bg-white text-sm" disabled>
                            <option value="">Select District / City</option>
                        </select>
                    </div>
                    <div class="md:col-span-2 grid grid-cols-1 md:grid-cols-3 gap-3">
                        <div class="w-full">
                            <label class="block text-xs font-semibold text-slate-600 mb-1">Contact Person</label>
                            <input type="text" name="single_multi_contact_person[]"
                                   class="w-full px-3 py-2 border border-slate-300 rounded-lg text-sm"
                                   placeholder="Full name">
                        </div>
                        <div class="w-full">
                            <label class="block text-xs font-semibold text-slate-600 mb-1">Email</label>
                            <input type="email" name="single_multi_contact_email[]"
                                   class="w-full px-3 py-2 border border-slate-300 rounded-lg text-sm"
                                   placeholder="email@example.com">
                        </div>
                        <div class="w-full">
                            <label class="block text-xs font-semibold text-slate-600 mb-1">Phone</label>
                            <input type="tel" name="single_multi_contact_phone[]"
                                   class="w-full px-3 py-2 border border-slate-300 rounded-lg text-sm"
                                   placeholder="+91 XXXXX XXXXX">
                        </div>
                    </div>
                    <div class="md:col-span-2">
                        <label class="block text-xs font-semibold text-slate-700 mb-1.5">Centre Address</label>
                        <textarea name="single_multi_centre_address[]" rows="2" class="centre-address w-full px-3 py-2 border border-slate-300 rounded-lg bg-white text-sm" placeholder="Enter complete centre address..."></textarea>
                    </div>
                  </div>
            </div>`;
    }

    // ✅ FIX: Newly added date rows also honour "Centre Information Not Available"
    function addSingleMultipleDateRow() {
        const $container = $('#multipleDateContainer');
        const rowId = 'sm-' + Date.now() + '-' + Math.floor(Math.random() * 1000);

        const group = document.createElement('div');
        group.className = 'date-centre-group border border-slate-200 rounded-xl p-4 bg-slate-50/50 mb-4 bg-slate-50';
        group.setAttribute('data-group-id', rowId);

        group.innerHTML = `
            <div class="exam-date-row flex items-center gap-2 mb-3">
                <div class="relative w-full md:w-1/2">
                   <label class="block text-xs font-bold text-slate-600 mb-1">Date of examination</label>
                    <input type="text" name="single_multi_exam_dates[]" placeholder="dd/mm/yyyy" maxlength="10" autocomplete="off"
                        class="single-multi-date-text w-full px-4 py-2 border border-slate-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#1e4d7b] transition text-sm pr-10">
                   <input type="date" class="single-multi-date-picker absolute right-2 top-1/2 mt-3 -translate-y-1/2 opacity-0 w-8 h-8 z-10">
                    <i class="fas fa-calendar-alt absolute right-3 top-1/2 mt-3 -translate-y-1/2 text-slate-400 cursor-pointer z-20"></i>
                </div>
                <button type="button" class="remove-single-multi-date px-3 py-2 mt-4 rounded-lg bg-red-600 text-white text-sm font-semibold hover:bg-red-700 transition whitespace-nowrap">
                    <i class="fas fa-trash-alt mr-1"></i> Remove Date
                </button>
            </div>
            <div class="centre-block-for-date" data-centre-block-for="${rowId}">
                <div class="flex items-center justify-between mb-2">
                    <label class="block text-xs font-bold text-slate-600">Centre of examination</label>
                    <button type="button" class="add-single-multi-centre inline-flex items-center gap-1 px-2.5 py-1.5 bg-white border border-[#1e4d7b] text-[#1e4d7b] text-xs font-semibold rounded-lg transition" data-row-id="${rowId}">
                        <i class="fas fa-plus"></i> Add Centre
                    </button>
                </div>
                <div class="single-multi-centres-container">
                    ${getSingleMultiCentreHTML(1)}
                </div>
            </div>`;

        $container.append(group);

        const $newCentre = $(group).find('.single-multi-centre').first();
        loadIndianStatesForElement($newCentre.find('.single-multi-centre-state'));
        initDistrictSelect2($newCentre.find('.single-multi-centre-district'));

        // ✅ If "Centre Information Not Available" is already checked,
        //    hide the centre block for this newly added row as well.
        if ($('.single-centre-not-available').is(':checked')) {
            $(group).find('.centre-block-for-date').hide();
            $(group).find('.centre-block-for-date input, .centre-block-for-date select, .centre-block-for-date textarea').prop('disabled', true);
        }
    }

    function initSingleMultipleDateBlock() {
        const $container = $('#multipleDateContainer');
        if (!$container.length) return;
        if ($container.find('.date-centre-group').length === 0) {
            addSingleMultipleDateRow();
        }
    }

    $(document).on('click', '#addSingleMultipleDate', function () {
        addSingleMultipleDateRow();
    });

    $(document).on('click', '.remove-single-multi-date', function () {
        $(this).closest('.date-centre-group').remove();
    });

    $(document).on('click', '.add-single-multi-centre', function () {
        const $block = $(this).closest('.centre-block-for-date');
        const $container = $block.find('.single-multi-centres-container');
        const centreNo = $container.find('.single-multi-centre').length + 1;
        $container.append(getSingleMultiCentreHTML(centreNo));
        const $new = $container.find('.single-multi-centre').last();
        loadIndianStatesForElement($new.find('.single-multi-centre-state'));
        initDistrictSelect2($new.find('.single-multi-centre-district'));
    });

    $(document).on('click', '.remove-single-multi-centre', function () {
        const $container = $(this).closest('.single-multi-centres-container');
        $(this).closest('.single-multi-centre').remove();
        $container.find('.single-multi-centre').each(function (i) {
            const n = i + 1;
            $(this).find('span.text-xs.font-bold').text('Centre ' + n);
        });
    });

    // ============================================================
    // SINGLE EXAM DATE TYPE TOGGLE
    // ============================================================
    $('#examDateSingle').on('change', function () {
        if ($(this).is(':checked')) {
            $('#singleDateSection').removeClass('hidden');
            $('#multipleDateSection').addClass('hidden');
            $('#singleExamExcelSection').removeClass('hidden');

            if ($('.single-centre-not-available').is(':checked')) {
                $('#singleDateCentreWrapper').hide();
                $('#singleDateCentreWrapper input, #singleDateCentreWrapper select, #singleDateCentreWrapper textarea').prop('disabled', true);
                $('#addSingleDateCentre').hide();
            }
        }
    });

    $('#examDateMultiple').on('change', function () {
        if ($(this).is(':checked')) {
            $('#singleDateSection').addClass('hidden');
            $('#multipleDateSection').removeClass('hidden');
            $('#singleExamExcelSection').addClass('hidden');
            if ($('#multipleDateContainer .date-centre-group').length === 0) {
                addSingleMultipleDateRow();
            }

            if ($('.single-centre-not-available').is(':checked')) {
                $('#multipleDateContainer .centre-block-for-date').hide();
                $('#multipleDateContainer .centre-block-for-date input, #multipleDateContainer .centre-block-for-date select, #multipleDateContainer .centre-block-for-date textarea').prop('disabled', true);
                // ✅ REMOVED: $('#addSingleMultipleDate').hide();
            }
        }
    });

    // ============================================================
    // MULTIPLE EXAM (NO) – BUILD
    // ============================================================
    let examCounter = 0;
    $('#addExam').on('click', addExamination);

    function getCentreHTML(examId, centreNo) {
        return `
            <div class="exam-centre border border-slate-200 rounded-lg p-4 bg-white mb-3">
                <div class="flex items-center justify-between mb-4">
                    <span class="text-xs font-bold text-slate-600">Centre ${centreNo}</span>
                    ${centreNo > 1 ? `<button type="button" class="remove-exam-centre text-red-500 hover:text-red-700 text-xs font-semibold"><i class="fas fa-trash-alt mr-1"></i> Remove</button>` : ''}
                </div>
                <div class="centre-details grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-xs font-semibold text-slate-700 mb-1.5">Centre Name</label>
                        <input type="text" name="multiple_centre_name[${examId}][]" class="centre-name w-full px-3 py-2 border border-slate-300 rounded-lg bg-white text-sm" placeholder="Enter centre name">
                    </div>
                    <div>
                        <label class="block text-xs font-semibold text-slate-700 mb-1.5">Centre Coordinates</label>
                        <input type="text" name="multiple_centre_coordinates[${examId}][]" class="centre-coordinates w-full px-3 py-2 border border-slate-300 rounded-lg bg-white text-sm" placeholder="e.g. 28.6139, 77.2090">
                    </div>
                    <div>
                        <label class="block text-xs font-semibold text-slate-700 mb-1.5">State / UT</label>
                        <select name="multiple_centre_state[${examId}][]" class="multiple-centre-state w-full">
                            <option value="">Select State / UT</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-xs font-semibold text-slate-700 mb-1.5">City / District</label>
                        <select name="multiple_centre_district[${examId}][]" class="multiple-centre-district w-full" disabled>
                            <option value="">Select District / City</option>
                        </select>
                    </div>
                    <div class="md:col-span-2 grid grid-cols-1 md:grid-cols-3 gap-3">
                        <div class="w-full">
                            <label class="block text-xs font-semibold text-slate-600 mb-1">Contact Person</label>
                            <input type="text" name="contact_person[${examId}][]" class="w-full px-3 py-2 border border-slate-300 rounded-lg text-sm" placeholder="Full name">
                        </div>
                        <div class="w-full">
                            <label class="block text-xs font-semibold text-slate-600 mb-1">Email</label>
                            <input type="email" name="contact_email[${examId}][]" class="w-full px-3 py-2 border border-slate-300 rounded-lg text-sm" placeholder="email@example.com">
                        </div>
                        <div class="w-full">
                            <label class="block text-xs font-semibold text-slate-600 mb-1">Phone</label>
                            <input type="tel" name="contact_phone[${examId}][]" class="w-full px-3 py-2 border border-slate-300 rounded-lg text-sm" placeholder="+91 XXXXX XXXXX">
                        </div>
                    </div>
                    <div class="md:col-span-2">
                        <label class="block text-xs font-semibold text-slate-700 mb-1.5">Centre Address</label>
                        <textarea name="multiple_centre_address[${examId}][]" rows="2" class="centre-address w-full px-3 py-2 border border-slate-300 rounded-lg bg-white text-sm" placeholder="Enter complete centre address..."></textarea>
                    </div>
                </div>
            </div>`;
    }

    function addExamination() {
        examCounter++;
        const examId = examCounter;
        const html = `
            <div class="exam-item border border-slate-200 rounded-xl p-5 bg-slate-50 mb-4" data-exam-id="${examId}">
                <div class="flex items-center justify-between border-b border-slate-200 pb-3 mb-4">
                    <div class="flex items-center gap-2">
                        <span class="flex items-center justify-center w-7 h-7 rounded-full bg-[#1e4d7b] text-white text-xs font-bold">${examId}</span>
                        <span class="text-sm font-bold text-[#1e4d7b]">Examination ${examId}</span>
                    </div>
                    <button type="button" class="remove-examination text-red-500 hover:text-red-700 text-xs font-semibold"><i class="fas fa-trash-alt mr-1"></i> Remove Examination</button>
                </div>
                <div class="flex items-center justify-between mb-4 pb-3 border-b border-slate-200">
                    <label class="inline-flex items-center gap-2.5 cursor-pointer select-none">
                        <input type="checkbox" name="multiple_centre_not_available[${examId}][]" class="centre-not-available w-4 h-4 text-[#1e4d7b] rounded border-slate-300">
                        <span class="text-xs font-semibold text-slate-700">Centre Information Not Available</span>
                    </label>
                    <button type="button" class="add-exam-centre inline-flex items-center gap-1.5 px-3 py-2 bg-white border border-[#1e4d7b] text-[#1e4d7b] text-xs font-semibold rounded-lg transition">
                        <i class="fas fa-plus"></i> Add Centre
                    </button>
                </div>
                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-1.5">Name of examination</label>
                    <input type="text" name="multiple_exam_name[]" class="w-full px-4 py-2 border border-slate-300 rounded-lg bg-white text-sm" placeholder="Enter examination name">
                </div>
                <div class="mt-4">
                    <label class="block text-sm font-semibold text-slate-700 mb-2">Whether the request is for a single date of examination ?</label>
                    <div class="flex items-center gap-6 mb-3">
                        <label class="inline-flex items-center cursor-pointer">
                            <input type="radio" name="multiple_exam_date_type[${examId}]" value="single"
                                class="multiple-exam-date-type w-4 h-4 text-[#1e4d7b]" data-exam-id="${examId}" checked>
                            <span class="ml-2 text-sm text-slate-700">Yes</span>
                        </label>
                        <label class="inline-flex items-center cursor-pointer">
                            <input type="radio" name="multiple_exam_date_type[${examId}]" value="multiple"
                                class="multiple-exam-date-type w-4 h-4 text-[#1e4d7b]" data-exam-id="${examId}">
                            <span class="ml-2 text-sm text-slate-700">No</span>
                        </label>
                    </div>
                    <div class="multiple-single-date-section" data-exam-id="${examId}">
                        <div class="relative w-full md:w-1/2">
                            <input type="text" name="multiple_single_exam_date[]" placeholder="dd/mm/yyyy"
                                maxlength="10" autocomplete="off"
                                class="date-text w-full px-4 py-2 border border-slate-300 rounded-lg bg-white text-sm pr-10">
                            <input type="date" class="date-picker absolute right-2 top-1/2 -translate-y-1/2 opacity-0 w-8 h-8 cursor-pointer z-10">
                            <i class="fas fa-calendar-alt absolute right-3 top-1/2 -translate-y-1/2 text-slate-400 pointer-events-none"></i>
                        </div>
                        <div class="mt-5">
                            <label class="block text-sm font-semibold text-slate-700 mb-1.5">Centre of examination</label>
                            <div class="exam-centres-container">
                                ${getCentreHTML(examId, 1)}
                            </div>
                        </div>
                    </div>
                    <div class="multiple-multiple-date-section hidden" data-exam-id="${examId}">
                        <div class="multiple-date-container space-y-3" data-exam-id="${examId}"></div>
                        <div class="mt-4 flex justify-end">
                            <button type="button"
                                class="add-multiple-exam-date px-3 py-2 rounded-lg bg-[#1e4d7b] text-white text-sm font-semibold hover:bg-[#123b60] transition whitespace-nowrap"
                                data-exam-id="${examId}">
                                <i class="fas fa-plus mr-1"></i> Add Date
                            </button>
                        </div>
                    </div>
                </div>
            </div>`;
        $('#multiple-exams-list').append(html);
        const $newExam = $('#multiple-exams-list .exam-item:last-child');
        $newExam.find('.multiple-single-date-section .exam-centre').each(function () {
            loadIndianStatesForElement($(this).find('.multiple-centre-state'));
            initDistrictSelect2($(this).find('.multiple-centre-district'));
        });

        // ✅ Default state: single date type → Add Centre visible
        $newExam.find('.add-exam-centre').show();
    }

    // ✅ FIX: Newly added date group also honours "Centre Information Not Available"
    function addMultipleDateGroup($container, examId) {
        const rowId = 'm-' + Date.now() + '-' + Math.floor(Math.random() * 1000);
        const group = document.createElement('div');
        group.className = 'date-centre-group border border-slate-200 rounded-xl p-4 bg-white/70 mb-4';
        group.setAttribute('data-group-id', rowId);

        group.innerHTML = `
            <div class="exam-date-row flex items-center gap-2 mb-3">
                <div class="relative w-full md:w-1/2">
                 <label class="block text-xs font-bold text-slate-600 mb-1">Date of examination</label>
                    <input type="text" name="multiple_exam_dates[${examId}][]" placeholder="dd/mm/yyyy" maxlength="10" autocomplete="off"
                        class="multiple-date-text w-full px-4 py-2 border border-slate-300 rounded-lg bg-white text-sm pr-10">
                    <input type="date" class="multiple-date-picker absolute right-2 top-1/2 mt-3 -translate-y-1/2 opacity-0 w-8 h-8 cursor-pointer z-10">
                    <i class="fas fa-calendar-alt absolute right-3 top-1/2 mt-3 -translate-y-1/2 text-slate-400 cursor-pointer z-20"></i>
                </div>
                <button type="button" class="remove-multiple-exam-date px-3 py-2 mt-4 rounded-lg bg-red-600 text-white text-sm font-semibold hover:bg-red-700 transition whitespace-nowrap">
                    <i class="fas fa-trash-alt mr-1"></i> Remove Date
                </button>
            </div>
            <div class="centre-block-for-date" data-centre-block-for="${rowId}">
                <div class="flex items-center justify-between mb-2">
                    <label class="block text-xs font-bold text-slate-600">Centre of examination</label>
                    <button type="button" class="add-multiple-exam-centre-btn inline-flex items-center gap-1 px-2.5 py-1.5 bg-white border border-[#1e4d7b] text-[#1e4d7b] text-xs font-semibold rounded-lg transition" data-exam-id="${examId}" data-row-id="${rowId}">
                        <i class="fas fa-plus"></i> Add Centre
                    </button>
                </div>
                <div class="exam-centres-container">
                    ${getCentreHTML(examId, 1)}
                </div>
            </div>`;
        $container.append(group);

        const $newCentre = $(group).find('.exam-centre').first();
        loadIndianStatesForElement($newCentre.find('.multiple-centre-state'));
        initDistrictSelect2($newCentre.find('.multiple-centre-district'));

        // ✅ If "Centre Information Not Available" is already checked for this exam,
        //    hide the centre block for this newly added row.
        const $exam = $container.closest('.exam-item');
        if ($exam.find('.centre-not-available').is(':checked')) {
            $(group).find('.centre-block-for-date').hide();
            $(group).find('.centre-block-for-date input, .centre-block-for-date select, .centre-block-for-date textarea').prop('disabled', true);
        }
    }

    // ============================================================
    // ✅ MULTIPLE EXAM DATE TYPE TOGGLE
    // ============================================================
    $(document).on('change', '.multiple-exam-date-type', function () {
        const examId = $(this).data('exam-id');
        const val = $(this).val();
        const $exam = $(this).closest('.exam-item');

        if (val === 'multiple') {
            $exam.find('.multiple-single-date-section').addClass('hidden');
            $exam.find('.multiple-multiple-date-section').removeClass('hidden');
            $exam.find('.add-exam-centre').hide();

            const $container = $exam.find('.multiple-date-container');
            if ($container.find('.date-centre-group').length === 0) {
                addMultipleDateGroup($container, examId);
            }
        } else {
            $exam.find('.multiple-multiple-date-section').addClass('hidden');
            $exam.find('.multiple-single-date-section').removeClass('hidden');
            $exam.find('.add-exam-centre').show();
        }
    });

    $(document).on('click', '.add-multiple-exam-date', function () {
        const examId = $(this).data('exam-id');
        const $container = $(this).closest('.multiple-multiple-date-section').find('.multiple-date-container');
        addMultipleDateGroup($container, examId);
    });

    $(document).on('click', '.remove-multiple-exam-date', function () {
        $(this).closest('.date-centre-group').remove();
    });

    $(document).on('click', '.add-multiple-exam-centre-btn', function () {
        const examId = $(this).data('exam-id');
        const $block = $(this).closest('.centre-block-for-date');
        const $container = $block.find('.exam-centres-container');
        const centreNo = $container.find('.exam-centre').length + 1;
        $container.append(getCentreHTML(examId, centreNo));
        const $new = $container.find('.exam-centre').last();
        loadIndianStatesForElement($new.find('.multiple-centre-state'));
        initDistrictSelect2($new.find('.multiple-centre-district'));
    });

    $(document).on('click', '.add-exam-centre', function () {
        const $exam = $(this).closest('.exam-item');
        const examId = $exam.data('exam-id');
        const $container = $exam.find('.multiple-single-date-section .exam-centres-container');
        const centreNo = $container.find('.exam-centre').length + 1;
        $container.append(getCentreHTML(examId, centreNo));
        const $new = $container.find('.exam-centre').last();
        loadIndianStatesForElement($new.find('.multiple-centre-state'));
        initDistrictSelect2($new.find('.multiple-centre-district'));
    });

    $(document).on('click', '.remove-exam-centre', function () {
        const $container = $(this).closest('.exam-centres-container');
        $(this).closest('.exam-centre').remove();
        $container.find('.exam-centre').each(function (i) {
            $(this).find('span.text-xs.font-bold').text('Centre ' + (i + 1));
        });
    });

    $(document).on('click', '.remove-examination', function () {
        $(this).closest('.exam-item').remove();
        $('#multiple-exams-list .exam-item').each(function (i) {
            const n = i + 1;
            $(this).attr('data-exam-id', n);
            $(this).find('.rounded-full').text(n);
        });
    });

    // ============================================================
    // ORGANISATION SELECT2
    // ============================================================
    $('#organisation_name').select2({
        width: '100%', placeholder: 'Select or type organisation name',
        tags: true, allowClear: true, minimumResultsForSearch: 0,
        createTag: function (params) {
            const term = $.trim(params.term);
            if (term === '') return null;
            return { id: term, text: term, newTag: true };
        }
    });

    $('#organisation_type').select2({
        width: '100%', placeholder: 'Select or type organisation type',
        tags: true, allowClear: true, minimumResultsForSearch: 0,
        createTag: function (params) {
            const term = $.trim(params.term);
            if (term === '') return null;
            return { id: term, text: term, newTag: true };
        }
    });

    $('#organisation_name').on('change', function () {
        const $opt = $(this).find('option:selected');
        const orgId = $opt.attr('data-organization-id');
        const orgType = $opt.attr('data-org-type');
        $('#organization_id').val(orgId || '');
        if (orgType) {
            const $t = $('#organisation_type option').filter(function () {
                return $(this).attr('data-type-id') == orgType;
            });
            if ($t.length) $('#organisation_type').val($t.val()).trigger('change');
        }
    });

    $('#organisation_type').on('change', function () {
        const typeId = $(this).find('option:selected').attr('data-type-id');
        $('#org_type').val(typeId || '');
    });

    // ============================================================
    // VENDOR FUNCTIONS
    // ============================================================
    let vendorCount = 1;

    function initializeModelSelect($select) {
        if ($select.hasClass('select2-hidden-accessible')) $select.select2('destroy');
        $select.select2({ placeholder: 'Select jammer model', allowClear: true, width: '100%' });
    }

    function loadVendors() {
        $.ajax({
            url: baseUrl + '/getVendors',
            type: 'GET',
            dataType: 'json',
            success: function (response) {
                if (response.status) {
                    $('.vendor-select').each(function () {
                        populateVendorSelect($(this), response.vendors);
                    });
                    updateCSRF(response);
                }
            },
            error: function () {
                populateVendorSelectFallback($('.vendor-select'));
            }
        });
    }

    function populateVendorSelect($select, vendors) {
        const cur = $select.val();
        $select.empty().append('<option value="">Select vendor</option>');
        $.each(vendors, function (i, v) {
            $select.append($('<option>', { value: v.id, text: v.vendor_name }));
        });
        if (cur) $select.val(cur);
    }

    function populateVendorSelectFallback($select) {
        const fb = [
            { id: 1, vendor_name: 'Bharat Secure Systems Pvt. Ltd.' },
            { id: 2, vendor_name: 'Netra Defence Electronics' },
            { id: 3, vendor_name: 'Shakti Communication Works' },
            { id: 4, vendor_name: 'Indus RF Technologies' }
        ];
        $select.each(function () { populateVendorSelect($(this), fb); });
    }

    window.addVendor = function () {
        vendorCount++;
        const container = document.getElementById('vendorContainer');
        const vendor = document.createElement('div');
        vendor.className = 'vendor-item border border-slate-200 rounded-xl p-4 mb-4 bg-slate-50';
        vendor.innerHTML = `
            <div class="flex items-center justify-between mb-4">
                <h4 class="font-semibold text-[#1e4d7b]"><i class="fas fa-building mr-1"></i> Vendor ${vendorCount}</h4>
                <button type="button" onclick="removeVendor(this)" class="text-red-500 hover:text-red-700 text-sm font-semibold">
                    <i class="fas fa-trash-alt mr-1"></i> Remove
                </button>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-1.5">Name of vendor</label>
                    <select name="vendor_id[]" class="vendor-select w-full px-4 py-2 border border-slate-300 rounded-lg text-sm bg-white" required>
                        <option value="">Select vendor</option>
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-1.5">Jammer model</label>
                    <select name="jammer_model_ids[]" class="model-select w-full px-4 py-2 border border-slate-300 rounded-lg text-sm bg-white" required>
                        <option value="">Select vendor first</option>
                    </select>
                </div>
            </div>
            <div class="mt-4">
                <label class="block text-sm font-semibold text-slate-700 mb-1.5">Technical specifications of jammers</label>
                <div class="flex items-center gap-2">
                    <label class="flex-1 cursor-pointer flex items-center justify-center px-4 py-2 border border-dashed border-slate-300 bg-white hover:bg-slate-100 rounded-lg transition text-slate-600 text-sm font-medium">
                        <i class="fas fa-file-pdf text-[#e58500] mr-2"></i>
                        <span>Choose file</span>
                        <input type="file" name="technical_specifications[]" accept=".pdf" class="hidden tech-file-input">
                    </label>
                    <span class="file-name text-xs text-slate-400">No file selected</span>
                </div>
            </div>`;
        container.appendChild(vendor);
        initializeModelSelect($(vendor).find('.model-select'));
        $.ajax({
            url: baseUrl + '/getVendors', type: 'GET', dataType: 'json',
            success: function (response) {
                if (response.status) {
                    populateVendorSelect($(vendor).find('.vendor-select'), response.vendors);
                    updateCSRF(response);
                }
            },
            error: function () { populateVendorSelectFallback($(vendor).find('.vendor-select')); }
        });
        updateRemoveButtons();
    };

    window.removeVendor = function (button) {
        const v = button.closest('.vendor-item');
        if (v) v.remove();
        renumberVendors();
        updateRemoveButtons();
    };

    function renumberVendors() {
        const vendors = document.querySelectorAll('.vendor-item');
        vendors.forEach(function (v, i) {
            const t = v.querySelector('h4');
            if (t) t.innerHTML = '<i class="fas fa-building mr-1"></i> Vendor ' + (i + 1);
        });
        vendorCount = vendors.length;
    }

    function updateRemoveButtons() {
        const vendors = document.querySelectorAll('.vendor-item');
        vendors.forEach(function (v) {
            const btn = v.querySelector('button[onclick="removeVendor(this)"]');
            if (!btn) return;
            if (vendors.length === 1) btn.classList.add('hidden');
            else btn.classList.remove('hidden');
        });
    }

    function loadModels(vendorId, $modelSelect) {
        $modelSelect.empty();
        if (!vendorId) {
            $modelSelect.append('<option value="">Select vendor first</option>');
            initializeModelSelect($modelSelect);
            return;
        }
        $modelSelect.append('<option value="">Loading models...</option>');
        initializeModelSelect($modelSelect);
        $.ajax({
            url: baseUrl + '/getJammerModelsByVendor',
            type: 'POST',
            dataType: 'json',
            data: { vendor_id: vendorId, csrf_test_name: getCSRFToken() },
            headers: { 'X-CSRF-TOKEN': getCSRFToken() },
            success: function (response) {
                updateCSRF(response);
                $modelSelect.empty();
                if (response.status && response.models && response.models.length) {
                    $modelSelect.append('<option value="">Select jammer model</option>');
                    $.each(response.models, function (i, m) {
                        $modelSelect.append($('<option>', { value: m.id, text: m.name }));
                    });
                } else {
                    $modelSelect.append('<option value="">No models available</option>');
                }
                initializeModelSelect($modelSelect);
            },
            error: function () {
                $modelSelect.empty().append('<option value="">Error loading models</option>');
                initializeModelSelect($modelSelect);
            }
        });
    }

    $(document).on('change', '.vendor-select', function () {
        const vendorId = $(this).val();
        const $v = $(this).closest('.vendor-item');
        loadModels(vendorId, $v.find('.model-select'));
    });

    loadVendors();

    // ============================================================
    // ✅ SUBMIT HANDLER
    // ============================================================
    window.submitRequest = function () {
        const form = document.getElementById('permissionForm');
        if (!form) { showToast('error', 'Form not found!'); return; }

        let hasError = false;
        form.querySelectorAll('input[required], select[required], textarea[required]').forEach(function (el) {
            if (el.offsetParent === null) return;
            if (el.disabled) return;
            if (!el.checkValidity()) {
                if (!hasError) {
                    el.reportValidity();
                    hasError = true;
                }
            }
        });
        if (hasError) return;

        if ($('input[name="declarations[]"]:checked').length < 3) {
            showToast('warning', 'Please accept all declarations before submitting.');
            return;
        }

        const $btn = $('#submitBtn');
        const originalText = $btn.html();
        $btn.html('<i class="fas fa-spinner fa-spin mr-2"></i> Submitting...').prop('disabled', true);

        const formData = new FormData(form);
        const singleExam = $('input[name="single_exam"]:checked').val();
        if (!singleExam) {
            $btn.html(originalText).prop('disabled', false);
            showToast('warning', 'Please select exam type.');
            return;
        }
        formData.append('single_exam', singleExam);

        // -------- SINGLE EXAM (YES) --------
        if (singleExam === 'yes') {
            formData.append('single_exam_name', $('input[name="single_exam_name"]').val() || '');
            const dateType = $('input[name="exam_date_type"]:checked').val() || 'single';
            formData.append('single_exam_date_type', dateType);

            const centreNotAvailable = $('.single-centre-not-available').is(':checked') ? '1' : '0';
            formData.append('single_centre_not_available', centreNotAvailable);

            if (dateType === 'single') {
                formData.append('single_exam_date', $('#singleExamDateText').val() || '');

                const names = [], coords = [], states = [], districts = [], addresses = [];
                const cPersons = [], cEmails = [], cPhones = [];

                $('#single-date-centres-container .centre-item').each(function () {
                    names.push($(this).find('.centre-name').val() || '');
                    coords.push($(this).find('.centre-coordinates').val() || '');
                    states.push($(this).find('.single-centre-state').val() || '');
                    districts.push($(this).find('.single-centre-district').val() || '');
                    addresses.push($(this).find('.centre-address').val() || '');
                    cPersons.push($(this).find('input[name="contact_person[]"]').val() || '');
                    cEmails.push($(this).find('input[name="contact_email[]"]').val() || '');
                    cPhones.push($(this).find('input[name="contact_phone[]"]').val() || '');
                });

                formData.append('single_centre_names_json', JSON.stringify(names));
                formData.append('single_centre_coordinates_json', JSON.stringify(coords));
                formData.append('single_centre_states_json', JSON.stringify(states));
                formData.append('single_centre_districts_json', JSON.stringify(districts));
                formData.append('single_centre_addresses_json', JSON.stringify(addresses));
                formData.append('single_centre_contact_persons_json', JSON.stringify(cPersons));
                formData.append('single_centre_contact_emails_json', JSON.stringify(cEmails));
                formData.append('single_centre_contact_phones_json', JSON.stringify(cPhones));
            } else {
                const smDates = [];
                const smCentreNames = [], smCentreCoords = [], smCentreStates = [], smCentreDistricts = [], smCentreAddresses = [];
                const smCentreContacts = [], smCentreEmails = [], smCentrePhones = [];

                $('#multipleDateContainer .date-centre-group').each(function () {
                    const $group = $(this);
                    const dateVal = $group.find('.single-multi-date-text').val() || '';
                    smDates.push(dateVal);

                    const cNames = [], cCoords = [], cStates = [], cDistricts = [], cAddresses = [];
                    const cPersons = [], cEmails = [], cPhones = [];

                    $group.find('.single-multi-centre').each(function () {
                        cNames.push($(this).find('.centre-name').val() || '');
                        cCoords.push($(this).find('.centre-coordinates').val() || '');
                        cStates.push($(this).find('.single-multi-centre-state').val() || '');
                        cDistricts.push($(this).find('.single-multi-centre-district').val() || '');
                        cAddresses.push($(this).find('.centre-address').val() || '');
                        cPersons.push($(this).find('input[name="single_multi_contact_person[]"]').val() || '');
                        cEmails.push($(this).find('input[name="single_multi_contact_email[]"]').val() || '');
                        cPhones.push($(this).find('input[name="single_multi_contact_phone[]"]').val() || '');
                    });

                    smCentreNames.push(cNames);
                    smCentreCoords.push(cCoords);
                    smCentreStates.push(cStates);
                    smCentreDistricts.push(cDistricts);
                    smCentreAddresses.push(cAddresses);
                    smCentreContacts.push(cPersons);
                    smCentreEmails.push(cEmails);
                    smCentrePhones.push(cPhones);
                });

                formData.append('single_multi_exam_dates_json', JSON.stringify(smDates));
                formData.append('single_multi_centre_names_json', JSON.stringify(smCentreNames));
                formData.append('single_multi_centre_coordinates_json', JSON.stringify(smCentreCoords));
                formData.append('single_multi_centre_states_json', JSON.stringify(smCentreStates));
                formData.append('single_multi_centre_districts_json', JSON.stringify(smCentreDistricts));
                formData.append('single_multi_centre_addresses_json', JSON.stringify(smCentreAddresses));
                formData.append('single_multi_centre_contact_persons_json', JSON.stringify(smCentreContacts));
                formData.append('single_multi_centre_contact_emails_json', JSON.stringify(smCentreEmails));
                formData.append('single_multi_centre_contact_phones_json', JSON.stringify(smCentrePhones));
            }
        }

        // -------- MULTIPLE EXAM (NO) --------
        const mExamNames = [], mExamDateTypes = [], mExamDatesSingle = [], mExamDatesMultiple = [];
        const mCentreNames = [], mCentreCoords = [], mCentreStates = [], mCentreDistricts = [], mCentreAddresses = [];
        const mCentreContacts = [], mCentreEmails = [], mCentrePhones = [];

        $('.exam-item').each(function () {
            const examId = $(this).data('exam-id');
            const examName = $(this).find('input[name="multiple_exam_name[]"]').val() || '';
            mExamNames.push(examName);

            const dateType = $(this).find(`input[name="multiple_exam_date_type[${examId}]"]:checked`).val() || 'single';
            mExamDateTypes.push(dateType);

            if (dateType === 'single') {
                mExamDatesSingle.push($(this).find('input[name="multiple_single_exam_date[]"]').val() || '');
                mExamDatesMultiple.push([]);
            } else {
                const dates = [];
                $(this).find(`input[name^="multiple_exam_dates[${examId}]"]`).each(function () {
                    dates.push($(this).val() || '');
                });
                mExamDatesSingle.push('');
                mExamDatesMultiple.push(dates);
            }

            const cNames = [], cCoords = [], cStates = [], cDistricts = [], cAddresses = [];
            const cPersons = [], cEmails = [], cPhones = [];

            $(this).find('.exam-centre').each(function () {
                cNames.push($(this).find('.centre-name').val() || '');
                cCoords.push($(this).find('.centre-coordinates').val() || '');
                cStates.push($(this).find('.multiple-centre-state').val() || '');
                cDistricts.push($(this).find('.multiple-centre-district').val() || '');
                cAddresses.push($(this).find('.centre-address').val() || '');
                cPersons.push($(this).find('input[name^="contact_person"]').val() || '');
                cEmails.push($(this).find('input[name^="contact_email"]').val() || '');
                cPhones.push($(this).find('input[name^="contact_phone"]').val() || '');
            });

            mCentreNames.push(cNames);
            mCentreCoords.push(cCoords);
            mCentreStates.push(cStates);
            mCentreDistricts.push(cDistricts);
            mCentreAddresses.push(cAddresses);
            mCentreContacts.push(cPersons);
            mCentreEmails.push(cEmails);
            mCentrePhones.push(cPhones);
        });

        formData.append('multiple_exam_names_json', JSON.stringify(mExamNames));
        formData.append('multiple_exam_date_types_json', JSON.stringify(mExamDateTypes));
        formData.append('multiple_exam_dates_single_json', JSON.stringify(mExamDatesSingle));
        formData.append('multiple_exam_dates_multiple_json', JSON.stringify(mExamDatesMultiple));
        formData.append('multiple_centre_names_json', JSON.stringify(mCentreNames));
        formData.append('multiple_centre_coordinates_json', JSON.stringify(mCentreCoords));
        formData.append('multiple_centre_states_json', JSON.stringify(mCentreStates));
        formData.append('multiple_centre_districts_json', JSON.stringify(mCentreDistricts));
        formData.append('multiple_centre_addresses_json', JSON.stringify(mCentreAddresses));
        formData.append('multiple_centre_contact_persons_json', JSON.stringify(mCentreContacts));
        formData.append('multiple_centre_contact_emails_json', JSON.stringify(mCentreEmails));
        formData.append('multiple_centre_contact_phones_json', JSON.stringify(mCentrePhones));

        // -------- VENDORS --------
        const vendorIds = [], jammerModelIds = [];
        $('.vendor-item').each(function () {
            vendorIds.push($(this).find('select[name="vendor_id[]"]').val() || '');
            jammerModelIds.push($(this).find('select[name="jammer_model_ids[]"]').val() || '');
        });
        formData.append('vendor_ids_json', JSON.stringify(vendorIds));
        formData.append('jammer_ids_json', JSON.stringify(jammerModelIds));

        // -------- DECLARATIONS --------
        const decls = [];
        $('input[name="declarations[]"]:checked').each(function () { decls.push($(this).val()); });
        formData.append('declarations_json', JSON.stringify(decls));

        // -------- ORG --------
        formData.append('organisation_name', $('#organisation_name').val() || '');
        formData.append('organisation_type_name', $('#organisation_type').val() || '');

        // -------- AJAX --------
        $.ajax({
            url: baseUrl + '/submit-request',
            type: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            cache: false,
            headers: { 'X-CSRF-TOKEN': $('input[name="csrf_test_name"]').val() },
            success: function (response) {
                $btn.html(originalText).prop('disabled', false);
                if (response.success) {
                    showToast('success', response.message || 'Application submitted successfully!');
                    setTimeout(function () {
                        if (response.redirect_url) window.location.href = response.redirect_url;
                    }, 1500);
                } else {
                    showToast('error', response.message || 'Something went wrong.');
                }
            },
            error: function (xhr) {
                $btn.html(originalText).prop('disabled', false);
                let msg = 'An error occurred while submitting the form.';
                if (xhr.status === 403) {
                    msg = 'Security token expired. Please refresh the page.';
                    location.reload();
                    return;
                } else if (xhr.responseJSON && xhr.responseJSON.message) {
                    msg = xhr.responseJSON.message;
                }
                showToast('error', msg);
            }
        });
    };

    // ============================================================
    // INITIAL SETUP
    // ============================================================
    initSingleDateCentreBlock();
    initSingleMultipleDateBlock();

    const selectedExam = $('input[name="single_exam"]:checked').val();
    if (selectedExam === 'no') {
        $('#single-exam-container').addClass('hidden');
        $('#multiple-exam-container').removeClass('hidden');
        disableSection('#single-exam-container');
        enableSection('#multiple-exam-container');
        if ($('#multiple-exams-list .exam-item').length === 0) addExamination();
    }

});
</script>

<script>
   // ============================================================
    // EDIT REQUEST — Load form with existing data
    // ============================================================
    window.saveAsDraft = function () {
    const form = document.getElementById('permissionForm');
    if (!form) { showToast('error', 'Form not found!'); return; }

    // ✅ Check declarations first
    if ($('input[name="declarations[]"]:checked').length < 3) {
        showToast('warning', 'Please accept all declarations before saving draft.');
        return;
    }

    // Basic validation - only check if org is selected
    const orgName = $('#organisation_name').val() || '';
    if (!orgName.trim()) {
        showToast('warning', 'Please select an organisation before saving draft.');
        return;
    }

    const $btn = $('button[type="save_as_draft"]');
    const originalText = $btn.html();
    $btn.html('<i class="fas fa-spinner fa-spin mr-2"></i> Saving...').prop('disabled', true);

    const formData = new FormData(form);
    const singleExam = $('input[name="single_exam"]:checked').val() || 'no';
    formData.append('single_exam', singleExam);
    formData.append('save_as_draft', '1');

    // -------- SINGLE EXAM (YES) --------
    if (singleExam === 'yes') {
        formData.append('single_exam_name', $('input[name="single_exam_name"]').val() || '');
        const dateType = $('input[name="exam_date_type"]:checked').val() || 'single';
        formData.append('single_exam_date_type', dateType);

        const centreNotAvailable = $('.single-centre-not-available').is(':checked') ? '1' : '0';
        formData.append('single_centre_not_available', centreNotAvailable);

        if (dateType === 'single') {
            formData.append('single_exam_date', $('#singleExamDateText').val() || '');

            const names = [], coords = [], states = [], districts = [], addresses = [];
            const cPersons = [], cEmails = [], cPhones = [];

            $('#single-date-centres-container .centre-item').each(function () {
                names.push($(this).find('.centre-name').val() || '');
                coords.push($(this).find('.centre-coordinates').val() || '');
                states.push($(this).find('.single-centre-state').val() || '');
                districts.push($(this).find('.single-centre-district').val() || '');
                addresses.push($(this).find('.centre-address').val() || '');
                cPersons.push($(this).find('input[name="contact_person[]"]').val() || '');
                cEmails.push($(this).find('input[name="contact_email[]"]').val() || '');
                cPhones.push($(this).find('input[name="contact_phone[]"]').val() || '');
            });

            formData.append('single_centre_names_json', JSON.stringify(names));
            formData.append('single_centre_coordinates_json', JSON.stringify(coords));
            formData.append('single_centre_states_json', JSON.stringify(states));
            formData.append('single_centre_districts_json', JSON.stringify(districts));
            formData.append('single_centre_addresses_json', JSON.stringify(addresses));
            formData.append('single_centre_contact_persons_json', JSON.stringify(cPersons));
            formData.append('single_centre_contact_emails_json', JSON.stringify(cEmails));
            formData.append('single_centre_contact_phones_json', JSON.stringify(cPhones));
        } else {
            const smDates = [];
            const smCentreNames = [], smCentreCoords = [], smCentreStates = [], smCentreDistricts = [], smCentreAddresses = [];
            const smCentreContacts = [], smCentreEmails = [], smCentrePhones = [];

            $('#multipleDateContainer .date-centre-group').each(function () {
                const $group = $(this);
                const dateVal = $group.find('.single-multi-date-text').val() || '';
                smDates.push(dateVal);

                const cNames = [], cCoords = [], cStates = [], cDistricts = [], cAddresses = [];
                const cPersons = [], cEmails = [], cPhones = [];

                $group.find('.single-multi-centre').each(function () {
                    cNames.push($(this).find('.centre-name').val() || '');
                    cCoords.push($(this).find('.centre-coordinates').val() || '');
                    cStates.push($(this).find('.single-multi-centre-state').val() || '');
                    cDistricts.push($(this).find('.single-multi-centre-district').val() || '');
                    cAddresses.push($(this).find('.centre-address').val() || '');
                    cPersons.push($(this).find('input[name="single_multi_contact_person[]"]').val() || '');
                    cEmails.push($(this).find('input[name="single_multi_contact_email[]"]').val() || '');
                    cPhones.push($(this).find('input[name="single_multi_contact_phone[]"]').val() || '');
                });

                smCentreNames.push(cNames);
                smCentreCoords.push(cCoords);
                smCentreStates.push(cStates);
                smCentreDistricts.push(cDistricts);
                smCentreAddresses.push(cAddresses);
                smCentreContacts.push(cPersons);
                smCentreEmails.push(cEmails);
                smCentrePhones.push(cPhones);
            });

            formData.append('single_multi_exam_dates_json', JSON.stringify(smDates));
            formData.append('single_multi_centre_names_json', JSON.stringify(smCentreNames));
            formData.append('single_multi_centre_coordinates_json', JSON.stringify(smCentreCoords));
            formData.append('single_multi_centre_states_json', JSON.stringify(smCentreStates));
            formData.append('single_multi_centre_districts_json', JSON.stringify(smCentreDistricts));
            formData.append('single_multi_centre_addresses_json', JSON.stringify(smCentreAddresses));
            formData.append('single_multi_centre_contact_persons_json', JSON.stringify(smCentreContacts));
            formData.append('single_multi_centre_contact_emails_json', JSON.stringify(smCentreEmails));
            formData.append('single_multi_centre_contact_phones_json', JSON.stringify(smCentrePhones));
        }
    }

    // -------- MULTIPLE EXAM (NO) --------
    const mExamNames = [], mExamDateTypes = [], mExamDatesSingle = [], mExamDatesMultiple = [];
    const mCentreNames = [], mCentreCoords = [], mCentreStates = [], mCentreDistricts = [], mCentreAddresses = [];
    const mCentreContacts = [], mCentreEmails = [], mCentrePhones = [];

    $('.exam-item').each(function () {
        const examId = $(this).data('exam-id');
        const examName = $(this).find('input[name="multiple_exam_name[]"]').val() || '';
        mExamNames.push(examName);

        const dateType = $(this).find(`input[name="multiple_exam_date_type[${examId}]"]:checked`).val() || 'single';
        mExamDateTypes.push(dateType);

        if (dateType === 'single') {
            mExamDatesSingle.push($(this).find('input[name="multiple_single_exam_date[]"]').val() || '');
            mExamDatesMultiple.push([]);
        } else {
            const dates = [];
            $(this).find(`input[name^="multiple_exam_dates[${examId}]"]`).each(function () {
                dates.push($(this).val() || '');
            });
            mExamDatesSingle.push('');
            mExamDatesMultiple.push(dates);
        }

        const cNames = [], cCoords = [], cStates = [], cDistricts = [], cAddresses = [];
        const cPersons = [], cEmails = [], cPhones = [];

        $(this).find('.exam-centre').each(function () {
            cNames.push($(this).find('.centre-name').val() || '');
            cCoords.push($(this).find('.centre-coordinates').val() || '');
            cStates.push($(this).find('.multiple-centre-state').val() || '');
            cDistricts.push($(this).find('.multiple-centre-district').val() || '');
            cAddresses.push($(this).find('.centre-address').val() || '');
            cPersons.push($(this).find('input[name^="contact_person"]').val() || '');
            cEmails.push($(this).find('input[name^="contact_email"]').val() || '');
            cPhones.push($(this).find('input[name^="contact_phone"]').val() || '');
        });

        mCentreNames.push(cNames);
        mCentreCoords.push(cCoords);
        mCentreStates.push(cStates);
        mCentreDistricts.push(cDistricts);
        mCentreAddresses.push(cAddresses);
        mCentreContacts.push(cPersons);
        mCentreEmails.push(cEmails);
        mCentrePhones.push(cPhones);
    });

    formData.append('multiple_exam_names_json', JSON.stringify(mExamNames));
    formData.append('multiple_exam_date_types_json', JSON.stringify(mExamDateTypes));
    formData.append('multiple_exam_dates_single_json', JSON.stringify(mExamDatesSingle));
    formData.append('multiple_exam_dates_multiple_json', JSON.stringify(mExamDatesMultiple));
    formData.append('multiple_centre_names_json', JSON.stringify(mCentreNames));
    formData.append('multiple_centre_coordinates_json', JSON.stringify(mCentreCoords));
    formData.append('multiple_centre_states_json', JSON.stringify(mCentreStates));
    formData.append('multiple_centre_districts_json', JSON.stringify(mCentreDistricts));
    formData.append('multiple_centre_addresses_json', JSON.stringify(mCentreAddresses));
    formData.append('multiple_centre_contact_persons_json', JSON.stringify(mCentreContacts));
    formData.append('multiple_centre_contact_emails_json', JSON.stringify(mCentreEmails));
    formData.append('multiple_centre_contact_phones_json', JSON.stringify(mCentrePhones));

    // -------- VENDORS --------
    const vendorIds = [], jammerModelIds = [];
    $('.vendor-item').each(function () {
        vendorIds.push($(this).find('select[name="vendor_id[]"]').val() || '');
        jammerModelIds.push($(this).find('select[name="jammer_model_ids[]"]').val() || '');
    });
    formData.append('vendor_ids_json', JSON.stringify(vendorIds));
    formData.append('jammer_ids_json', JSON.stringify(jammerModelIds));

    // -------- DECLARATIONS --------
    const decls = [];
    $('input[name="declarations[]"]:checked').each(function () { decls.push($(this).val()); });
    formData.append('declarations_json', JSON.stringify(decls));

    // -------- ORG --------
    formData.append('organisation_name', $('#organisation_name').val() || '');
    formData.append('organisation_type_name', $('#organisation_type').val() || '');

    // -------- AJAX --------
    $.ajax({
        url: baseUrl + '/save-draft',
        type: 'POST',
        data: formData,
        contentType: false,
        processData: false,
        cache: false,
        headers: { 'X-CSRF-TOKEN': $('input[name="csrf_test_name"]').val() },
        success: function (response) {
            $btn.html(originalText).prop('disabled', false);
            if (response.success) {
                showToast('success', response.message || 'Draft saved successfully!');
                if (response.redirect_url) {
                    setTimeout(function () {
                        window.location.href = response.redirect_url;
                    }, 1500);
                }
            } else {
                showToast('error', response.message || 'Something went wrong.');
            }
        },
        error: function (xhr) {
            $btn.html(originalText).prop('disabled', false);
            let msg = 'An error occurred while saving draft.';
            if (xhr.status === 403) {
                msg = 'Security token expired. Please refresh the page.';
                location.reload();
                return;
            } else if (xhr.responseJSON && xhr.responseJSON.message) {
                msg = xhr.responseJSON.message;
            }
            showToast('error', msg);
        }
    });
};   
</script>

<script>
/**
 * EDIT REQUEST JS
 * Ye file SIRF edit mode me load hoti hai.
 */
(function () {
    'use strict';

    const BASE = (window.BASE_URL || '/').replace(/\/$/, '');
    const EDIT_DATA = window.EDIT_MODE_DATA || null;

    function getCSRFToken() {
        return $('input[name="csrf_test_name"]').val() || '';
    }

    function updateCSRF(res) {
        if (res && res.csrf_hash) {
            $('input[name="csrf_test_name"]').val(res.csrf_hash);
        }
    }

    function escapeHtml(str) {
        return String(str || '')
            .replace(/&/g, '&amp;')
            .replace(/</g, '&lt;')
            .replace(/>/g, '&gt;')
            .replace(/"/g, '&quot;')
            .replace(/'/g, '&#39;');
    }

    // ============================================================
    // GLOBAL FILE HANDLER
    // ============================================================
    window.__editShowFileName = function (input) {
        if (!input) return;

        const $input = $(input);
        const files = input.files;

        let $display = $input.closest('label').siblings('.file-name').first();
        if (!$display.length) $display = $input.closest('.flex').find('.file-name').last();
        if (!$display.length) $display = $input.closest('.mt-4, .mt-3, .mt-2').find('.file-name').last();
        if (!$display.length) return;

        if (files && files.length > 0) {
            const fileName = files.length > 1
                ? files.length + ' files selected'
                : files[0].name;
            const safe = escapeHtml(fileName);

            $display.html(
                `<span class="text-emerald-600 font-medium truncate max-w-[220px] inline-block" title="${safe}">${safe}</span>`
            );
        } else {
            const originalHtml = $display.data('original-html');
            if (originalHtml) {
                $display.html(originalHtml);
            } else {
                $display.html('<span class="text-xs text-slate-400">No file selected</span>');
            }
        }
    };

    $(document).on('change', 'input[type="file"]', function () {
        window.__editShowFileName(this);
    });

    // ============================================================
    // HYDRATE MAIN
    // ============================================================
    function hydrateEditMode(data) {
        if (!data || !data.application) return;
        const app = data.application;

        $('#organization_id').val(data.organization_id || '');
        $('#org_type').val(data.org_type || '');

        const orgText = app.organisation || '';
        if (orgText) {
            if ($('#organisation_name option').filter(function () {
                return $(this).val() === orgText;
            }).length === 0) {
                $('#organisation_name').append(new Option(orgText, orgText, true, true));
            }
            $('#organisation_name').val(orgText).trigger('change.select2');
        }

        const orgTypeText = app.organisation_type || '';
        if (orgTypeText) {
            if ($('#organisation_type option').filter(function () {
                return $(this).val() === orgTypeText;
            }).length === 0) {
                $('#organisation_type').append(new Option(orgTypeText, orgTypeText, true, true));
            }
            $('#organisation_type').val(orgTypeText).trigger('change.select2');
        }

        // DECLARATIONS
        const decl = data.declarations || {};
        $('input[name="declarations[]"][value="security"]').prop('checked', decl.security == 1);
        $('input[name="declarations[]"][value="accountability"]').prop('checked', decl.accountability == 1);
        $('input[name="declarations[]"][value="non_interference"]').prop('checked', decl.non_interference == 1);
        $('input[name="declarations[]"]').trigger('change');

        // SINGLE / MULTIPLE
        const isSingle = data.is_single_exam == 1;
        $('input[name="single_exam"][value="' + (isSingle ? 'yes' : 'no') + '"]')
            .prop('checked', true).trigger('change');

        if (isSingle) hydrateSingleExam(data);
        else hydrateMultipleExam(data);

        hydrateVendors(data);

        console.log('[EDIT] Hydration done');
    }

    // ============================================================
    // SINGLE EXAM
    // ============================================================
    function hydrateSingleExam(data) {
        const dates = data.existing_dates || []; // each has ->centres from controller

        if (dates.length > 0) {
            $('input[name="single_exam_name"]').val(dates[0].exam_name || '');
        }

        const isMultiDate = dates.length > 1;

        if (!isMultiDate) {
            $('input[name="exam_date_type"][value="single"]').prop('checked', true).trigger('change');
            $('#singleDateSection').removeClass('hidden');
            $('#multipleDateSection').addClass('hidden');
            $('#singleExamExcelSection').removeClass('hidden');

            if (dates.length > 0 && dates[0].exam_date) {
                const p = dates[0].exam_date.split(' ')[0].split('-');
                if (p.length === 3) {
                    $('#singleExamDateText').val(p[2] + '/' + p[1] + '/' + p[0]);
                }
            }

            const singleCentres = (dates[0] && dates[0].centres) ? dates[0].centres : [];

            const $c = $('#single-date-centres-container').empty();
            if (singleCentres.length === 0) {
                appendSingleDateCentreRow($c, 1, null);
            } else {
                singleCentres.forEach(function (row, i) {
                    appendSingleDateCentreRow($c, i + 1, row);
                });
            }

            if (data.centre_list_ready == 0 && $('.single-centre-not-available').length) {
                $('.single-centre-not-available').prop('checked', true).trigger('change');
            }
        } else {
            $('input[name="exam_date_type"][value="multiple"]').prop('checked', true).trigger('change');
            $('#singleDateSection').addClass('hidden');
            $('#multipleDateSection').removeClass('hidden');
            $('#singleExamExcelSection').addClass('hidden');

            const $container = $('#multipleDateContainer').empty();
            dates.forEach(function (dt, di) {
                appendSingleMultiDateGroup($container, di, dt, dt.centres || []);
            });
        }
    }

    function appendSingleDateCentreRow($container, centreNo, row) {
        const html = `
            <div class="centre-item border border-slate-200 rounded-xl p-4 bg-slate-50 mt-3" data-single-centre-no="${centreNo}">
                <div class="flex justify-between items-center mb-4">
                    <span class="text-xs font-bold text-[#1e4d7b]">Centre ${centreNo}</span>
                    ${centreNo > 1 ? `<button type="button" class="remove-single-date-centre text-red-500 hover:text-red-700 text-xs font-semibold"><i class="fas fa-trash-alt mr-1"></i> Remove</button>` : ''}
                </div>
                <div class="centre-details grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-xs font-semibold text-slate-700 mb-1.5">Centre Name</label>
                        <input type="text" name="single_centre_name[]" class="centre-name w-full px-3 py-2 border border-slate-300 rounded-lg bg-white text-sm">
                    </div>
                    <div>
                        <label class="block text-xs font-semibold text-slate-700 mb-1.5">Centre Coordinates</label>
                        <input type="text" name="single_centre_coordinates[]" class="centre-coordinates w-full px-3 py-2 border border-slate-300 rounded-lg bg-white text-sm">
                    </div>
                    <div>
                        <label class="block text-xs font-semibold text-slate-700 mb-1.5">State</label>
                        <select name="single_centre_state[]" class="single-centre-state w-full px-3 py-2 border border-slate-300 rounded-lg bg-white text-sm">
                            <option value="">Select State / UT</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-xs font-semibold text-slate-700 mb-1.5">District</label>
                        <select name="single_centre_district[]" class="single-centre-district w-full px-3 py-2 border border-slate-300 rounded-lg bg-white text-sm" disabled>
                            <option value="">Select District / City</option>
                        </select>
                    </div>
                    <div class="md:col-span-2 grid grid-cols-1 md:grid-cols-3 gap-4">
                        <div class="w-full">
                            <label class="block text-xs font-semibold text-slate-600 mb-1">Contact Person</label>
                            <input type="text" name="contact_person[]" class="w-full px-3 py-2 border border-slate-300 rounded-lg text-sm">
                        </div>
                        <div class="w-full">
                            <label class="block text-xs font-semibold text-slate-600 mb-1">Email</label>
                            <input type="email" name="contact_email[]" class="w-full px-3 py-2 border border-slate-300 rounded-lg text-sm">
                        </div>
                        <div class="w-full">
                            <label class="block text-xs font-semibold text-slate-600 mb-1">Phone</label>
                            <input type="tel" name="contact_phone[]" class="w-full px-3 py-2 border border-slate-300 rounded-lg text-sm">
                        </div>
                    </div>
                    <div class="md:col-span-2">
                        <label class="block text-xs font-semibold text-slate-700 mb-1.5">Centre Address</label>
                        <textarea name="single_centre_address[]" rows="2" class="centre-address w-full px-3 py-2 border border-slate-300 rounded-lg bg-white text-sm"></textarea>
                    </div>
                </div>
            </div>`;
        $container.append(html);
        const $item = $container.find('.centre-item').last();
        if (row) {
            $item.find('.centre-name').val(row.centre_name || '');
            $item.find('.centre-coordinates').val(row.centre_coordinates || '');
            $item.find('.centre-address').val(row.centre_address || '');
            $item.find('input[name="contact_person[]"]').val(row.coorrdinator_name || '');
            $item.find('input[name="contact_email[]"]').val(row.coordinator_email || '');
            $item.find('input[name="contact_phone[]"]').val(row.coordinator_mobile_no || '');
        }
        loadStateAndDistrict(
            $item.find('.single-centre-state'),
            $item.find('.single-centre-district'),
            row ? row.state : '',
            row ? row.district : ''
        );
    }

    function appendSingleMultiDateGroup($container, dateIndex, dateRow, dateCentres) {
        const rowId = 'sm-edit-' + Date.now() + '-' + dateIndex;
        const dateStr = (dateRow.exam_date || '').split(' ')[0];
        const p = dateStr.split('-');
        const displayDate = p.length === 3 ? (p[2] + '/' + p[1] + '/' + p[0]) : '';

        const group = document.createElement('div');
        group.className = 'date-centre-group border border-slate-200 rounded-xl p-4 bg-slate-50 mb-4';
        group.setAttribute('data-group-id', rowId);
        group.innerHTML = `
            <div class="exam-date-row flex items-center gap-2 mb-3">
                <div class="relative w-full md:w-1/2">
                    <label class="block text-xs font-bold text-slate-600 mb-1">Date of examination</label>
                    <input type="text" name="single_multi_exam_dates[]" placeholder="dd/mm/yyyy" maxlength="10" autocomplete="off"
                        class="single-multi-date-text w-full px-4 py-2 border border-slate-300 rounded-lg text-sm pr-10" value="${displayDate}">
                    <input type="date" class="single-multi-date-picker absolute right-2 top-1/2 mt-3 -translate-y-1/2 opacity-0 w-8 h-8 z-10">
                    <i class="fas fa-calendar-alt absolute right-3 top-1/2 mt-3 -translate-y-1/2 text-slate-400 cursor-pointer z-20"></i>
                </div>
                <button type="button" class="remove-single-multi-date px-3 py-2 mt-4 rounded-lg bg-red-600 text-white text-sm font-semibold">
                    <i class="fas fa-trash-alt mr-1"></i> Remove Date
                </button>
            </div>
            <div class="centre-block-for-date" data-centre-block-for="${rowId}">
                <div class="flex items-center justify-between mb-2">
                    <label class="block text-xs font-bold text-slate-600">Centre of examination</label>
                    <button type="button" class="add-single-multi-centre inline-flex items-center gap-1 px-2.5 py-1.5 bg-white border border-[#1e4d7b] text-[#1e4d7b] text-xs font-semibold rounded-lg" data-row-id="${rowId}">
                        <i class="fas fa-plus"></i> Add Centre
                    </button>
                </div>
                <div class="single-multi-centres-container"></div>
            </div>`;
        $container.append(group);
        const $group = $(group);
        const $cContainer = $group.find('.single-multi-centres-container');

        if (!dateCentres || dateCentres.length === 0) {
            appendSingleMultiCentreRow($cContainer, 1, null);
        } else {
            dateCentres.forEach(function (row, i) {
                appendSingleMultiCentreRow($cContainer, i + 1, row);
            });
        }
    }

    function appendSingleMultiCentreRow($container, centreNo, row) {
        const html = `
            <div class="single-multi-centre border border-slate-200 rounded-lg p-4 bg-white mb-3">
                <div class="flex items-center justify-between mb-4">
                    <span class="text-xs font-bold text-slate-600">Centre ${centreNo}</span>
                    ${centreNo > 1 ? `<button type="button" class="remove-single-multi-centre text-red-500 hover:text-red-700 text-xs font-semibold"><i class="fas fa-trash-alt mr-1"></i> Remove</button>` : ''}
                </div>
                <div class="centre-details grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-xs font-semibold text-slate-700 mb-1.5">Centre Name</label>
                        <input type="text" name="single_multi_centre_name[]" class="centre-name w-full px-3 py-2 border border-slate-300 rounded-lg bg-white text-sm">
                    </div>
                    <div>
                        <label class="block text-xs font-semibold text-slate-700 mb-1.5">Centre Coordinates</label>
                        <input type="text" name="single_multi_centre_coordinates[]" class="centre-coordinates w-full px-3 py-2 border border-slate-300 rounded-lg bg-white text-sm">
                    </div>
                    <div>
                        <label class="block text-xs font-semibold text-slate-700 mb-1.5">State / UT</label>
                        <select name="single_multi_centre_state[]" class="single-multi-centre-state w-full px-3 py-2 border border-slate-300 rounded-lg bg-white text-sm">
                            <option value="">Select State / UT</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-xs font-semibold text-slate-700 mb-1.5">City / District</label>
                        <select name="single_multi_centre_district[]" class="single-multi-centre-district w-full px-3 py-2 border border-slate-300 rounded-lg bg-white text-sm" disabled>
                            <option value="">Select District / City</option>
                        </select>
                    </div>
                    <div class="md:col-span-2 grid grid-cols-1 md:grid-cols-3 gap-3">
                        <div class="w-full">
                            <label class="block text-xs font-semibold text-slate-600 mb-1">Contact Person</label>
                            <input type="text" name="single_multi_contact_person[]" class="w-full px-3 py-2 border border-slate-300 rounded-lg text-sm">
                        </div>
                        <div class="w-full">
                            <label class="block text-xs font-semibold text-slate-600 mb-1">Email</label>
                            <input type="email" name="single_multi_contact_email[]" class="w-full px-3 py-2 border border-slate-300 rounded-lg text-sm">
                        </div>
                        <div class="w-full">
                            <label class="block text-xs font-semibold text-slate-600 mb-1">Phone</label>
                            <input type="tel" name="single_multi_contact_phone[]" class="w-full px-3 py-2 border border-slate-300 rounded-lg text-sm">
                        </div>
                    </div>
                    <div class="md:col-span-2">
                        <label class="block text-xs font-semibold text-slate-700 mb-1.5">Centre Address</label>
                        <textarea name="single_multi_centre_address[]" rows="2" class="centre-address w-full px-3 py-2 border border-slate-300 rounded-lg bg-white text-sm"></textarea>
                    </div>
                </div>
            </div>`;
        $container.append(html);
        const $item = $container.find('.single-multi-centre').last();
        if (row) {
            $item.find('.centre-name').val(row.centre_name || '');
            $item.find('.centre-coordinates').val(row.centre_coordinates || '');
            $item.find('.centre-address').val(row.centre_address || '');
            $item.find('input[name="single_multi_contact_person[]"]').val(row.coorrdinator_name || '');
            $item.find('input[name="single_multi_contact_email[]"]').val(row.coordinator_email || '');
            $item.find('input[name="single_multi_contact_phone[]"]').val(row.coordinator_mobile_no || '');
        }
        loadStateAndDistrict(
            $item.find('.single-multi-centre-state'),
            $item.find('.single-multi-centre-district'),
            row ? row.state : '',
            row ? row.district : ''
        );
    }

    // ============================================================
    // MULTIPLE EXAM
    // ============================================================
    function hydrateMultipleExam(data) {
        const dates = data.existing_dates || []; // each has ->centres

        // Group dates by exam_name
        const examOrder = [];
        const examMap   = {};
        dates.forEach(function (d) {
            const name = d.exam_name || 'Examination';
            if (!examMap[name]) { examMap[name] = []; examOrder.push(name); }
            examMap[name].push(d);
        });

        if (examOrder.length === 0) return;

        $('#multiple-exams-list').empty();
        let examCounter = 0;

        examOrder.forEach(function (examName) {
            examCounter++;
            appendMultipleExamBlock(examCounter, examName, examMap[examName]);
        });
    }

    function appendMultipleExamBlock(examId, examName, examDates) {
        const isSingle = examDates.length <= 1;

        const html = `
            <div class="exam-item border border-slate-200 rounded-xl p-5 bg-slate-50 mb-4" data-exam-id="${examId}">
                <div class="flex items-center justify-between border-b border-slate-200 pb-3 mb-4">
                    <div class="flex items-center gap-2">
                        <span class="flex items-center justify-center w-7 h-7 rounded-full bg-[#1e4d7b] text-white text-xs font-bold">${examId}</span>
                        <span class="text-sm font-bold text-[#1e4d7b]">Examination ${examId}</span>
                    </div>
                    <button type="button" class="remove-examination text-red-500 hover:text-red-700 text-xs font-semibold">
                        <i class="fas fa-trash-alt mr-1"></i> Remove Examination
                    </button>
                </div>
                <div class="flex items-center justify-between mb-4 pb-3 border-b border-slate-200">
                    <label class="inline-flex items-center gap-2.5 cursor-pointer select-none">
                        <input type="checkbox" name="multiple_centre_not_available[${examId}][]" class="centre-not-available w-4 h-4 text-[#1e4d7b] rounded border-slate-300">
                        <span class="text-xs font-semibold text-slate-700">Centre Information Not Available</span>
                    </label>
                    <button type="button" class="add-exam-centre inline-flex items-center gap-1.5 px-3 py-2 bg-white border border-[#1e4d7b] text-[#1e4d7b] text-xs font-semibold rounded-lg">
                        <i class="fas fa-plus"></i> Add Centre
                    </button>
                </div>
                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-1.5">Name of examination</label>
                    <input type="text" name="multiple_exam_name[]" class="w-full px-4 py-2 border border-slate-300 rounded-lg bg-white text-sm" value="${escapeHtml(examName)}">
                </div>
                <div class="mt-4">
                    <label class="block text-sm font-semibold text-slate-700 mb-2">Whether the request is for a single date of examination ?</label>
                    <div class="flex items-center gap-6 mb-3">
                        <label class="inline-flex items-center cursor-pointer">
                            <input type="radio" name="multiple_exam_date_type[${examId}]" value="single"
                                class="multiple-exam-date-type w-4 h-4 text-[#1e4d7b]" data-exam-id="${examId}" ${isSingle ? 'checked' : ''}>
                            <span class="ml-2 text-sm text-slate-700">Yes</span>
                        </label>
                        <label class="inline-flex items-center cursor-pointer">
                            <input type="radio" name="multiple_exam_date_type[${examId}]" value="multiple"
                                class="multiple-exam-date-type w-4 h-4 text-[#1e4d7b]" data-exam-id="${examId}" ${!isSingle ? 'checked' : ''}>
                            <span class="ml-2 text-sm text-slate-700">No</span>
                        </label>
                    </div>
                    <div class="multiple-single-date-section ${isSingle ? '' : 'hidden'}" data-exam-id="${examId}">
                        <div class="relative w-full md:w-1/2">
                            <input type="text" name="multiple_single_exam_date[]" placeholder="dd/mm/yyyy"
                                maxlength="10" autocomplete="off"
                                class="date-text w-full px-4 py-2 border border-slate-300 rounded-lg bg-white text-sm pr-10">
                            <input type="date" class="date-picker absolute right-2 top-1/2 -translate-y-1/2 opacity-0 w-8 h-8 z-10">
                            <i class="fas fa-calendar-alt absolute right-3 top-1/2 -translate-y-1/2 text-slate-400 pointer-events-none"></i>
                        </div>
                        <div class="mt-5">
                            <label class="block text-sm font-semibold text-slate-700 mb-1.5">Centre of examination</label>
                            <div class="exam-centres-container"></div>
                        </div>
                    </div>
                    <div class="multiple-multiple-date-section ${!isSingle ? '' : 'hidden'}" data-exam-id="${examId}">
                        <div class="multiple-date-container space-y-3" data-exam-id="${examId}"></div>
                        <div class="mt-4 flex justify-end">
                            <button type="button" class="add-multiple-exam-date px-3 py-2 rounded-lg bg-[#1e4d7b] text-white text-sm font-semibold" data-exam-id="${examId}">
                                <i class="fas fa-plus mr-1"></i> Add Date
                            </button>
                        </div>
                    </div>
                </div>
            </div>`;
        $('#multiple-exams-list').append(html);
        const $exam = $('#multiple-exams-list .exam-item').last();

        if (isSingle) {
            const dt = examDates[0];
            if (dt && dt.exam_date) {
                const p = dt.exam_date.split(' ')[0].split('-');
                if (p.length === 3) {
                    $exam.find('input[name="multiple_single_exam_date[]"]').val(p[2] + '/' + p[1] + '/' + p[0]);
                }
            }
            const dateCentres = dt.centres || [];
            const $cContainer = $exam.find('.multiple-single-date-section .exam-centres-container').empty();
            if (dateCentres.length === 0) {
                appendMultipleCentreRow($cContainer, examId, 1, null);
            } else {
                dateCentres.forEach(function (row, i) {
                    appendMultipleCentreRow($cContainer, examId, i + 1, row);
                });
            }
            $exam.find('.add-exam-centre').show();
        } else {
            const $mContainer = $exam.find('.multiple-date-container').empty();
            examDates.forEach(function (dt, di) {
                appendMultipleDateGroup($mContainer, examId, di, dt, dt.centres || []);
            });
            $exam.find('.add-exam-centre').hide();
        }
    }

    function appendMultipleDateGroup($container, examId, dateIndex, dt, dateCentres) {
        const rowId = 'm-edit-' + Date.now() + '-' + dateIndex;
        const dateStr = (dt.exam_date || '').split(' ')[0];
        const p = dateStr.split('-');
        const displayDate = p.length === 3 ? (p[2] + '/' + p[1] + '/' + p[0]) : '';

        const group = document.createElement('div');
        group.className = 'date-centre-group border border-slate-200 rounded-xl p-4 bg-white/70 mb-4';
        group.setAttribute('data-group-id', rowId);
        group.innerHTML = `
            <div class="exam-date-row flex items-center gap-2 mb-3">
                <div class="relative w-full md:w-1/2">
                    <label class="block text-xs font-bold text-slate-600 mb-1">Date of examination</label>
                    <input type="text" name="multiple_exam_dates[${examId}][]" placeholder="dd/mm/yyyy" maxlength="10" autocomplete="off"
                        class="multiple-date-text w-full px-4 py-2 border border-slate-300 rounded-lg bg-white text-sm pr-10" value="${displayDate}">
                    <input type="date" class="multiple-date-picker absolute right-2 top-1/2 mt-3 -translate-y-1/2 opacity-0 w-8 h-8 z-10">
                    <i class="fas fa-calendar-alt absolute right-3 top-1/2 mt-3 -translate-y-1/2 text-slate-400 cursor-pointer z-20"></i>
                </div>
                <button type="button" class="remove-multiple-exam-date px-3 py-2 mt-4 rounded-lg bg-red-600 text-white text-sm font-semibold hover:bg-red-700 transition whitespace-nowrap">
                    <i class="fas fa-trash-alt mr-1"></i> Remove Date
                </button>
            </div>
            <div class="centre-block-for-date" data-centre-block-for="${rowId}">
                <div class="flex items-center justify-between mb-2">
                    <label class="block text-xs font-bold text-slate-600">Centre of examination</label>
                    <button type="button" class="add-multiple-exam-centre-btn inline-flex items-center gap-1 px-2.5 py-1.5 bg-white border border-[#1e4d7b] text-[#1e4d7b] text-xs font-semibold rounded-lg" data-exam-id="${examId}" data-row-id="${rowId}">
                        <i class="fas fa-plus"></i> Add Centre
                    </button>
                </div>
                <div class="exam-centres-container"></div>
            </div>`;
        $container.append(group);
        const $group = $(group);
        const $cContainer = $group.find('.exam-centres-container');

        if (!dateCentres || dateCentres.length === 0) {
            appendMultipleCentreRow($cContainer, examId, 1, null);
        } else {
            dateCentres.forEach(function (row, i) {
                appendMultipleCentreRow($cContainer, examId, i + 1, row);
            });
        }
    }

    function appendMultipleCentreRow($container, examId, centreNo, row) {
        const html = `
            <div class="exam-centre border border-slate-200 rounded-lg p-4 bg-white mb-3">
                <div class="flex items-center justify-between mb-4">
                    <span class="text-xs font-bold text-slate-600">Centre ${centreNo}</span>
                    ${centreNo > 1 ? `<button type="button" class="remove-exam-centre text-red-500 hover:text-red-700 text-xs font-semibold"><i class="fas fa-trash-alt mr-1"></i> Remove</button>` : ''}
                </div>
                <div class="centre-details grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-xs font-semibold text-slate-700 mb-1.5">Centre Name</label>
                        <input type="text" name="multiple_centre_name[${examId}][]" class="centre-name w-full px-3 py-2 border border-slate-300 rounded-lg bg-white text-sm">
                    </div>
                    <div>
                        <label class="block text-xs font-semibold text-slate-700 mb-1.5">Centre Coordinates</label>
                        <input type="text" name="multiple_centre_coordinates[${examId}][]" class="centre-coordinates w-full px-3 py-2 border border-slate-300 rounded-lg bg-white text-sm">
                    </div>
                    <div>
                        <label class="block text-xs font-semibold text-slate-700 mb-1.5">State / UT</label>
                        <select name="multiple_centre_state[${examId}][]" class="multiple-centre-state w-full">
                            <option value="">Select State / UT</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-xs font-semibold text-slate-700 mb-1.5">City / District</label>
                        <select name="multiple_centre_district[${examId}][]" class="multiple-centre-district w-full" disabled>
                            <option value="">Select District / City</option>
                        </select>
                    </div>
                    <div class="md:col-span-2 grid grid-cols-1 md:grid-cols-3 gap-3">
                        <div class="w-full">
                            <label class="block text-xs font-semibold text-slate-600 mb-1">Contact Person</label>
                            <input type="text" name="contact_person[${examId}][]" class="w-full px-3 py-2 border border-slate-300 rounded-lg text-sm">
                        </div>
                        <div class="w-full">
                            <label class="block text-xs font-semibold text-slate-600 mb-1">Email</label>
                            <input type="email" name="contact_email[${examId}][]" class="w-full px-3 py-2 border border-slate-300 rounded-lg text-sm">
                        </div>
                        <div class="w-full">
                            <label class="block text-xs font-semibold text-slate-600 mb-1">Phone</label>
                            <input type="tel" name="contact_phone[${examId}][]" class="w-full px-3 py-2 border border-slate-300 rounded-lg text-sm">
                        </div>
                    </div>
                    <div class="md:col-span-2">
                        <label class="block text-xs font-semibold text-slate-700 mb-1.5">Centre Address</label>
                        <textarea name="multiple_centre_address[${examId}][]" rows="2" class="centre-address w-full px-3 py-2 border border-slate-300 rounded-lg bg-white text-sm"></textarea>
                    </div>
                </div>
            </div>`;
        $container.append(html);
        const $item = $container.find('.exam-centre').last();
        if (row) {
            $item.find('.centre-name').val(row.centre_name || '');
            $item.find('.centre-coordinates').val(row.centre_coordinates || '');
            $item.find('.centre-address').val(row.centre_address || '');
            $item.find('input[name^="contact_person"]').val(row.coorrdinator_name || '');
            $item.find('input[name^="contact_email"]').val(row.coordinator_email || '');
            $item.find('input[name^="contact_phone"]').val(row.coordinator_mobile_no || '');
        }
        loadStateAndDistrict(
            $item.find('.multiple-centre-state'),
            $item.find('.multiple-centre-district'),
            row ? row.state : '',
            row ? row.district : ''
        );
    }

    // ============================================================
    // VENDORS — Existing PDF Name (Green, No Link)
    // ============================================================
    function hydrateVendors(data) {
        const vendors = data.existing_vendors || [];
        if (vendors.length === 0) return;

        $('#vendorContainer').empty();
        let count = 0;

        vendors.forEach(function (v) {
            count++;

            const existingPdfName = (v.existing_pdf_name || '').trim();

            let fileNameHtml;
            if (existingPdfName !== '') {
                const safeName = escapeHtml(existingPdfName);
                fileNameHtml = `<span class="text-xs text-emerald-600 font-medium truncate max-w-[220px] inline-block" title="${safeName}">${safeName}</span>`;
            } else {
                fileNameHtml = `<span class="text-xs text-slate-400">No file selected</span>`;
            }

            const el = document.createElement('div');
            el.className = 'vendor-item border border-slate-200 rounded-xl p-4 mb-4 bg-slate-50';
            el.innerHTML = `
                <div class="flex items-center justify-between mb-4">
                    <h4 class="font-semibold text-[#1e4d7b]"><i class="fas fa-building mr-1"></i> Vendor ${count}</h4>
                    <button type="button" onclick="removeVendor(this)" class="text-red-500 hover:text-red-700 text-sm font-semibold">
                        <i class="fas fa-trash-alt mr-1"></i> Remove
                    </button>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-semibold text-slate-700 mb-1.5">Name of vendor</label>
                        <select name="vendor_id[]" class="vendor-select w-full px-4 py-2 border border-slate-300 rounded-lg text-sm bg-white" required>
                            <option value="">Select vendor</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-slate-700 mb-1.5">Jammer model</label>
                        <select name="jammer_model_ids[]" class="model-select w-full px-4 py-2 border border-slate-300 rounded-lg text-sm bg-white" required>
                            <option value="">Select jammer model</option>
                        </select>
                    </div>
                </div>
                <div class="mt-4">
                    <label class="block text-sm font-semibold text-slate-700 mb-1.5">Technical specifications of jammers</label>
                    <div class="flex items-center gap-2">
                        <label class="flex-1 cursor-pointer flex items-center justify-center px-4 py-2 border border-dashed border-slate-300 bg-white hover:bg-slate-100 rounded-lg transition text-slate-600 text-sm font-medium">
                            <i class="fas fa-file-pdf text-[#e58500] mr-2"></i>
                            <span>Choose file (blank = keep existing)</span>
                            <input type="file" name="technical_specifications[]" accept=".pdf"
                                   class="hidden tech-file-input"
                                   onchange="window.__editShowFileName(this)">
                        </label>
                        <span class="file-name text-xs">${fileNameHtml}</span>
                    </div>
                </div>`;
            document.getElementById('vendorContainer').appendChild(el);

            const $fileNameSpan = $(el).find('.file-name');
            $fileNameSpan.data('original-html', $fileNameSpan.html());

            const $el = $(el);

            $.ajax({
                url: BASE + '/getVendors',
                type: 'GET',
                dataType: 'json',
                success: function (res) {
                    if (res.status) {
                        const $sel = $el.find('.vendor-select');
                        $sel.empty().append('<option value="">Select vendor</option>');
                        $.each(res.vendors, function (i, vd) {
                            $sel.append($('<option>', { value: vd.id, text: vd.vendor_name }));
                        });
                        $sel.val(v.vendor_id);

                        $.ajax({
                            url: BASE + '/getJammerModelsByVendor',
                            type: 'POST',
                            dataType: 'json',
                            data: { vendor_id: v.vendor_id, csrf_test_name: getCSRFToken() },
                            success: function (mr) {
                                updateCSRF(mr);
                                const $m = $el.find('.model-select');
                                $m.empty().append('<option value="">Select jammer model</option>');
                                if (mr.status && mr.models && mr.models.length) {
                                    $.each(mr.models, function (i, m) {
                                        $m.append($('<option>', { value: m.id, text: m.name }));
                                    });
                                }
                                $m.val(v.jammer_id);
                            }
                        });
                    }
                }
            });
        });
    }

    // ============================================================
    // STATE / DISTRICT
    // ============================================================
    function loadStateAndDistrict($stateSel, $distSel, selectedState, selectedDistrict) {
        if (!$stateSel.length) return;

        $.ajax({
            url: BASE + '/location/get-states',
            type: 'GET',
            dataType: 'json',
            success: function (response) {
                $stateSel.empty().append('<option value="">Select State / UT</option>');
                if (response.status && response.data && response.data.length) {
                    $.each(response.data, function (i, st) {
                        $stateSel.append($('<option>', {
                            value: st.id,
                            text: st.state_name,
                            selected: String(st.id) === String(selectedState)
                        }));
                    });
                }
                if ($stateSel.hasClass('select2-hidden-accessible')) $stateSel.select2('destroy');
                $stateSel.select2({ width: '100%', placeholder: 'Select State / UT', allowClear: true });

                if (selectedState) {
                    $.ajax({
                        url: BASE + '/location/get-cities',
                        type: 'POST',
                        dataType: 'json',
                        data: { state_id: selectedState, csrf_test_name: getCSRFToken() },
                        success: function (dr) {
                            updateCSRF(dr);
                            $distSel.empty().append('<option value="">Select District / City</option>');
                            if (dr.status && dr.data && dr.data.length) {
                                $.each(dr.data, function (i, dist) {
                                    $distSel.append($('<option>', {
                                        value: dist.id,
                                        text: dist.city_name,
                                        selected: String(dist.id) === String(selectedDistrict)
                                    }));
                                });
                            }
                            $distSel.prop('disabled', false);
                            if ($distSel.hasClass('select2-hidden-accessible')) $distSel.select2('destroy');
                            $distSel.select2({ width: '100%', placeholder: 'Select District / City', allowClear: true });
                        }
                    });
                }
            }
        });
    }

    // ============================================================
    // SUBMIT EDIT
    // ============================================================
    window.submitEditRequest = function () {
        const form = document.getElementById('permissionForm');
        if (!form) { showToast('error', 'Form not found!'); return; }

        let hasError = false;
        form.querySelectorAll('input[required], select[required], textarea[required]').forEach(function (el) {
            if (el.offsetParent === null) return;
            if (el.disabled) return;
            if (!el.checkValidity()) {
                if (!hasError) { el.reportValidity(); hasError = true; }
            }
        });
        if (hasError) return;

        if ($('input[name="declarations[]"]:checked').length < 3) {
            showToast('warning', 'Please accept all declarations.');
            return;
        }

        const $btn = $('#submitBtn');
        const originalText = $btn.html();
        $btn.html('<i class="fas fa-spinner fa-spin mr-2"></i> Updating...').prop('disabled', true);

        const formData = new FormData(form);
        const singleExam = $('input[name="single_exam"]:checked').val();
        formData.append('single_exam', singleExam);

        // SINGLE
        if (singleExam === 'yes') {
            formData.append('single_exam_name', $('input[name="single_exam_name"]').val() || '');
            const dateType = $('input[name="exam_date_type"]:checked').val() || 'single';
            formData.append('single_exam_date_type', dateType);
            formData.append('single_centre_not_available', $('.single-centre-not-available').is(':checked') ? '1' : '0');

            if (dateType === 'single') {
                formData.append('single_exam_date', $('#singleExamDateText').val() || '');
                const names = [], coords = [], states = [], districts = [], addresses = [];
                const persons = [], emails = [], phones = [];
                $('#single-date-centres-container .centre-item').each(function () {
                    names.push($(this).find('.centre-name').val() || '');
                    coords.push($(this).find('.centre-coordinates').val() || '');
                    states.push($(this).find('.single-centre-state').val() || '');
                    districts.push($(this).find('.single-centre-district').val() || '');
                    addresses.push($(this).find('.centre-address').val() || '');
                    persons.push($(this).find('input[name="contact_person[]"]').val() || '');
                    emails.push($(this).find('input[name="contact_email[]"]').val() || '');
                    phones.push($(this).find('input[name="contact_phone[]"]').val() || '');
                });
                formData.append('single_centre_names_json', JSON.stringify(names));
                formData.append('single_centre_coordinates_json', JSON.stringify(coords));
                formData.append('single_centre_states_json', JSON.stringify(states));
                formData.append('single_centre_districts_json', JSON.stringify(districts));
                formData.append('single_centre_addresses_json', JSON.stringify(addresses));
                formData.append('single_centre_contact_persons_json', JSON.stringify(persons));
                formData.append('single_centre_contact_emails_json', JSON.stringify(emails));
                formData.append('single_centre_contact_phones_json', JSON.stringify(phones));
            } else {
                const smDates = [];
                const smNames = [], smCoords = [], smStates = [], smDists = [], smAddrs = [];
                const smPersons = [], smEmails = [], smPhones = [];
                $('#multipleDateContainer .date-centre-group').each(function () {
                    const $g = $(this);
                    smDates.push($g.find('.single-multi-date-text').val() || '');
                    const cN = [], cC = [], cS = [], cD = [], cA = [], cP = [], cE = [], cPh = [];
                    $g.find('.single-multi-centre').each(function () {
                        cN.push($(this).find('.centre-name').val() || '');
                        cC.push($(this).find('.centre-coordinates').val() || '');
                        cS.push($(this).find('.single-multi-centre-state').val() || '');
                        cD.push($(this).find('.single-multi-centre-district').val() || '');
                        cA.push($(this).find('.centre-address').val() || '');
                        cP.push($(this).find('input[name="single_multi_contact_person[]"]').val() || '');
                        cE.push($(this).find('input[name="single_multi_contact_email[]"]').val() || '');
                        cPh.push($(this).find('input[name="single_multi_contact_phone[]"]').val() || '');
                    });
                    smNames.push(cN); smCoords.push(cC); smStates.push(cS);
                    smDists.push(cD); smAddrs.push(cA); smPersons.push(cP);
                    smEmails.push(cE); smPhones.push(cPh);
                });
                formData.append('single_multi_exam_dates_json', JSON.stringify(smDates));
                formData.append('single_multi_centre_names_json', JSON.stringify(smNames));
                formData.append('single_multi_centre_coordinates_json', JSON.stringify(smCoords));
                formData.append('single_multi_centre_states_json', JSON.stringify(smStates));
                formData.append('single_multi_centre_districts_json', JSON.stringify(smDists));
                formData.append('single_multi_centre_addresses_json', JSON.stringify(smAddrs));
                formData.append('single_multi_centre_contact_persons_json', JSON.stringify(smPersons));
                formData.append('single_multi_centre_contact_emails_json', JSON.stringify(smEmails));
                formData.append('single_multi_centre_contact_phones_json', JSON.stringify(smPhones));
            }
        }

        // ============================================================
        // MULTIPLE EXAM — FIXED (nested centres per date)
        // ============================================================
        const mNames = [], mTypes = [], mDSingle = [], mDMulti = [];
        const mCN = [], mCC = [], mCS = [], mCD = [], mCA = [], mCP = [], mCE = [], mCPh = [];
        let anyMultipleCentreNA = false;

        $('.exam-item').each(function () {
            const $exam = $(this);
            const examId = $exam.data('exam-id');

            mNames.push($exam.find('input[name="multiple_exam_name[]"]').val() || '');

            const dt = $exam.find(`input[name="multiple_exam_date_type[${examId}]"]:checked`).val() || 'single';
            mTypes.push(dt);

            if ($exam.find('.centre-not-available').is(':checked')) {
                anyMultipleCentreNA = true;
            }

            // Per-exam nested arrays
            const examCN = [], examCC = [], examCS = [], examCD = [], examCA = [], examCP = [], examCE = [], examCPh = [];

            if (dt === 'single') {
                mDSingle.push($exam.find('input[name="multiple_single_exam_date[]"]').val() || '');
                mDMulti.push([]);

                // Single date → one flat centre group
                const cN = [], cC = [], cS = [], cD = [], cA = [], cP = [], cE = [], cPh = [];
                $exam.find('.multiple-single-date-section .exam-centre').each(function () {
                    cN.push($(this).find('.centre-name').val() || '');
                    cC.push($(this).find('.centre-coordinates').val() || '');
                    cS.push($(this).find('.multiple-centre-state').val() || '');
                    cD.push($(this).find('.multiple-centre-district').val() || '');
                    cA.push($(this).find('.centre-address').val() || '');
                    cP.push($(this).find('input[name^="contact_person"]').val() || '');
                    cE.push($(this).find('input[name^="contact_email"]').val() || '');
                    cPh.push($(this).find('input[name^="contact_phone"]').val() || '');
                });
                examCN.push(cN); examCC.push(cC); examCS.push(cS); examCD.push(cD);
                examCA.push(cA); examCP.push(cP); examCE.push(cE); examCPh.push(cPh);
            } else {
                mDSingle.push('');
                const arr = [];
                $exam.find(`input[name^="multiple_exam_dates[${examId}]"]`).each(function () {
                    arr.push($(this).val() || '');
                });
                mDMulti.push(arr);

                // Multiple dates → nest centres per date group
                $exam.find('.multiple-date-container .date-centre-group').each(function () {
                    const $group = $(this);
                    const cN = [], cC = [], cS = [], cD = [], cA = [], cP = [], cE = [], cPh = [];
                    $group.find('.exam-centre').each(function () {
                        cN.push($(this).find('.centre-name').val() || '');
                        cC.push($(this).find('.centre-coordinates').val() || '');
                        cS.push($(this).find('.multiple-centre-state').val() || '');
                        cD.push($(this).find('.multiple-centre-district').val() || '');
                        cA.push($(this).find('.centre-address').val() || '');
                        cP.push($(this).find('input[name^="contact_person"]').val() || '');
                        cE.push($(this).find('input[name^="contact_email"]').val() || '');
                        cPh.push($(this).find('input[name^="contact_phone"]').val() || '');
                    });
                    examCN.push(cN); examCC.push(cC); examCS.push(cS); examCD.push(cD);
                    examCA.push(cA); examCP.push(cP); examCE.push(cE); examCPh.push(cPh);
                });
            }

            mCN.push(examCN); mCC.push(examCC); mCS.push(examCS); mCD.push(examCD);
            mCA.push(examCA); mCP.push(examCP); mCE.push(examCE); mCPh.push(examCPh);
        });

        formData.append('multiple_exam_names_json', JSON.stringify(mNames));
        formData.append('multiple_exam_date_types_json', JSON.stringify(mTypes));
        formData.append('multiple_exam_dates_single_json', JSON.stringify(mDSingle));
        formData.append('multiple_exam_dates_multiple_json', JSON.stringify(mDMulti));
        formData.append('multiple_centre_names_json', JSON.stringify(mCN));
        formData.append('multiple_centre_coordinates_json', JSON.stringify(mCC));
        formData.append('multiple_centre_states_json', JSON.stringify(mCS));
        formData.append('multiple_centre_districts_json', JSON.stringify(mCD));
        formData.append('multiple_centre_addresses_json', JSON.stringify(mCA));
        formData.append('multiple_centre_contact_persons_json', JSON.stringify(mCP));
        formData.append('multiple_centre_contact_emails_json', JSON.stringify(mCE));
        formData.append('multiple_centre_contact_phones_json', JSON.stringify(mCPh));
        formData.append('multiple_centre_not_available_present', anyMultipleCentreNA ? '1' : '0');

        // VENDORS
        const vIds = [], jIds = [];
        $('.vendor-item').each(function () {
            vIds.push($(this).find('select[name="vendor_id[]"]').val() || '');
            jIds.push($(this).find('select[name="jammer_model_ids[]"]').val() || '');
        });
        formData.append('vendor_ids_json', JSON.stringify(vIds));
        formData.append('jammer_ids_json', JSON.stringify(jIds));

        // DECLARATIONS
        const decls = [];
        $('input[name="declarations[]"]:checked').each(function () { decls.push($(this).val()); });
        formData.append('declarations_json', JSON.stringify(decls));

        // ORG
        formData.append('organisation_name', $('#organisation_name').val() || '');
        formData.append('organisation_type_name', $('#organisation_type').val() || '');

        // AJAX
        const appId = form.dataset.appId;
        $.ajax({
            url: BASE + '/update-request/' + appId,
            type: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            cache: false,
            headers: { 'X-CSRF-TOKEN': getCSRFToken() },
            success: function (response) {
                $btn.html(originalText).prop('disabled', false);
                if (response.success) {
                    showToast('success', response.message || 'Application updated successfully!');
                    setTimeout(function () {
                        if (response.redirect_url) window.location.href = response.redirect_url;
                    }, 1500);
                } else {
                    showToast('error', response.message || 'Something went wrong.');
                }
            },
            error: function (xhr) {
                $btn.html(originalText).prop('disabled', false);
                let msg = 'An error occurred while updating.';
                if (xhr.status === 403) {
                    msg = 'Security token expired. Please refresh.';
                    location.reload();
                    return;
                } else if (xhr.responseJSON && xhr.responseJSON.message) {
                    msg = xhr.responseJSON.message;
                }
                showToast('error', msg);
            }
        });
    };

    // ============================================================
    // HOOK SUBMIT BUTTON
    // ============================================================
    $(document).off('click', '#submitBtn').on('click', '#submitBtn', function (e) {
        e.preventDefault();
        if (window.IS_EDIT_MODE) {
            window.submitEditRequest();
        } else if (typeof window.submitRequest === 'function') {
            window.submitRequest();
        }
    });

    // ============================================================
    // BOOT
    // ============================================================
    $(document).ready(function () {
        setTimeout(function () {
            if (EDIT_DATA) hydrateEditMode(EDIT_DATA);

            const checked = $('input[name="declarations[]"]:checked').length;
            const $btn = $('#submitBtn');
            if (checked === 3) {
                $btn.prop('disabled', false)
                    .removeClass('opacity-50 cursor-not-allowed')
                    .addClass('hover:opacity-90');
            } else {
                $btn.prop('disabled', true)
                    .addClass('opacity-50 cursor-not-allowed')
                    .removeClass('hover:opacity-90');
            }
        }, 200);
    });

})();
</script>

<?php
$page_content = ob_get_clean();
include dirname(__DIR__) . '/dashboard.php';
?>