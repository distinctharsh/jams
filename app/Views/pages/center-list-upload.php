<?php
ob_start();
?>
<style>
    .dt-buttons {
        display: inline-flex !important;
        gap: 0.5rem !important;
        margin-bottom: 0.5rem !important;
    }
    .dt-button {
        background-color: #f8fafc !important;
        border: 1px solid #cbd5e1 !important;
        color: #1e4d7b !important;
        font-size: 0.8125rem !important;
        font-weight: 600 !important;
        padding: 0.4rem 0.85rem !important;
        border-radius: 0.5rem !important;
        transition: all 0.2s ease !important;
        box-shadow: 0 1px 2px rgba(0, 0, 0, 0.05) !important;
    }
    .dt-button:hover {
        background-color: #1e4d7b !important;
        color: #ffffff !important;
        border-color: #1e4d7b !important;
    }
    .dataTables_length, .dataTables_filter input { margin-bottom: 10px !important }

    #centerListTable td.dataTables_empty {
        padding: 3rem 1rem !important;
        text-align: center !important;
        color: #64748b !important;
        font-weight: 500 !important;
    }
</style>

<div class="space-y-6">

    <!-- Header Card with Direct Upload Form -->
    <div class="gov-card p-6">
        <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-4">
            <div class="flex items-center gap-3">
                <div class="w-12 h-12 rounded-xl bg-blue-50 border border-blue-200 flex items-center justify-center shrink-0">
                    <i class="fas fas fa-upload text-[#1e4d7b] text-xl"></i>
                </div>
                <div>
                    <h2 class="text-xl font-bold text-[#1e4d7b]">Upload Center Lists</h2>
                    <p class="text-xs text-slate-500 mt-0.5">Download standard Excel format, fill details, and upload directly.</p>
                </div>
            </div>
            
            <div class="flex flex-wrap items-center gap-3">
                <a href="<?= base_url('center-lists/download-format') ?>" class="px-4 py-2.5 bg-amber-50 hover:bg-amber-100 text-amber-800 border border-amber-300 text-xs font-semibold rounded-lg transition shadow-sm flex items-center gap-2">
                    <i class="fas fa-download text-amber-600 text-sm"></i> Download Excel Format
                </a>

                <!-- Direct Upload Form -->
                <form id="directUploadForm" enctype="multipart/form-data" class="flex items-center gap-2">
                    <?= csrf_field() ?>
                    <input type="file" name="excel_file" id="direct_excel_file" accept=".xlsx, .xls, .csv" class="hidden" required>
                    
                    <button type="button" id="selectFileBtn" class="px-4 py-2.5 bg-slate-100 hover:bg-slate-200 text-slate-700 border border-slate-300 text-xs font-semibold rounded-lg transition shadow-sm flex items-center gap-2 cursor-pointer">
                        <i class="fas fa-folder-open text-slate-500"></i> <span id="fileNameLabel">Choose Excel File</span>
                    </button>

                    <button type="submit" id="directSaveBtn" class="px-4 py-2.5 bg-[#1e4d7b] hover:bg-[#163a5d] text-white text-xs font-semibold rounded-lg transition shadow-sm flex items-center gap-2 disabled:opacity-50" disabled>
                        <i class="fas fa-cloud-arrow-up text-sm"></i> Upload & Save
                    </button>
                </form>
            </div>
        </div>
    </div>

    <!-- Main Table Card -->
    <div class="gov-card p-5 overflow-hidden shadow-sm border border-slate-200 rounded-xl bg-white">
        <div class="overflow-x-auto">
            <table class="w-full text-sm gov-table rounded-lg overflow-hidden" id="centerListTable">
                <thead class="bg-[#1e4d7b] text-white">
                    <tr>
                        <th class="px-5 py-3.5 text-left w-16 font-semibold uppercase tracking-wider text-xs">S.No.</th>
                        <th class="px-5 py-3.5 text-left font-semibold uppercase tracking-wider text-xs">Application No / Request</th>
                        <th class="px-5 py-3.5 text-left font-semibold uppercase tracking-wider text-xs">File Name</th>
                        <th class="px-5 py-3.5 text-left font-semibold uppercase tracking-wider text-xs">Uploaded By</th>
                        <th class="px-5 py-3.5 text-left font-semibold uppercase tracking-wider text-xs">Uploaded At</th>
                        <th class="px-5 py-3.5 text-left font-semibold uppercase tracking-wider text-xs">Status</th>
                        <th class="px-5 py-3.5 text-left pr-6 font-semibold uppercase tracking-wider text-xs">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100 bg-white text-slate-700">
                    <?php if(!empty($center_lists)): ?>
                        <?php foreach($center_lists as $index => $item): ?>
                            <tr class="hover:bg-slate-50/80 transition-colors duration-150">
                                <td class="px-5 py-4 text-left font-bold text-[#1e4d7b]"><?= $index + 1 ?></td>
                                <td class="px-5 py-4 font-bold text-left text-slate-800"><?= esc($item['app_no'] ?? 'N/A') ?></td>
                                <td class="px-5 py-4 text-slate-600 font-medium text-left">
                                    <span class="flex items-center gap-1.5 text-emerald-700 font-semibold">
                                        <i class="fas fa-file-excel"></i> <?= esc($item['file_name']) ?>
                                    </span>
                                </td>
                                <td class="px-5 py-4 text-slate-600 font-medium text-left"><?= esc($item['uploaded_by_name'] ?? 'System') ?></td>
                                <td class="px-5 py-4 text-slate-500 text-xs text-left"><?= date('d-m-Y h:i A', strtotime($item['created_at'])) ?></td>
                                <td class="px-5 py-4 text-left">
                                    <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-lg border-l-4 border-emerald-500 bg-emerald-50 text-emerald-700 font-semibold text-xs shadow-sm">
                                        <i class="fas fa-check-circle"></i> Uploaded
                                    </span>
                                </td>
                                <td class="px-5 py-4 text-left pr-6">
                                    <div class="flex justify-left gap-2">
                                        <a href="<?= base_url('center-lists/download/'.$item['id']) ?>" class="w-8 h-8 rounded-lg bg-blue-50 text-[#1e4d7b] hover:bg-blue-100 border border-blue-100 transition flex items-center justify-center" title="Download Excel">
                                            <i class="fas fa-download text-xs"></i>
                                        </a>
                                        <button type="button" class="w-8 h-8 rounded-lg bg-red-50 text-red-600 hover:bg-red-100 border border-red-100 transition delete-center-list-btn flex items-center justify-center" data-id="<?= $item['id'] ?>" title="Delete">
                                            <i class="fas fa-trash-can text-xs"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<link rel="stylesheet" href="<?= base_url('assets/css/buttons.dataTables.min.css') ?>">
<script src="<?= base_url('assets/js/jquery.min.js') ?>"></script>
<script src="<?= base_url('assets/js/tost.js') ?>"></script>
<script src="<?= base_url('assets/js/jquery.dataTables.min.js') ?>"></script>

<script>
$(document).ready(function() {
    if ($.fn && $.fn.DataTable) {
        $('#centerListTable').DataTable({
            "paging": true,
            "searching": true,
            "info": true,
            "responsive": true,
            "autoWidth": false,
            "columnDefs": [{ "orderable": false, "targets": [6] }]
        });
    }

    // Direct file trigger
    $('#selectFileBtn').click(function() {
        $('#direct_excel_file').click();
    });

    $('#direct_excel_file').change(function() {
        if (this.files && this.files[0]) {
            $('#fileNameLabel').text(this.files[0].name);
            $('#directSaveBtn').prop('disabled', false);
        } else {
            $('#fileNameLabel').text('Choose Excel File');
            $('#directSaveBtn').prop('disabled', true);
        }
    });

    function updateCSRF(hash) {
        if(hash) {
            $('#directUploadForm input[type="hidden"]').first().val(hash);
        }
    }

    $('#directUploadForm').submit(function(e) {
        e.preventDefault();
        
        let formData = new FormData(this);
        $('#directSaveBtn').prop('disabled', true).html('<i class="fas fa-spinner fa-spin"></i> Uploading...');

        $.ajax({
            url: "<?= base_url('center-lists/upload') ?>",
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            dataType: "json",
            success: function(res) {
                if(res.csrfHash) updateCSRF(res.csrfHash);

                if(res.success) {
                    showToast('success', res.message || 'Excel file uploaded successfully!');
                    setTimeout(() => { location.reload(); }, 1200);
                } else {
                    showToast('error', res.message || 'Failed to upload Excel file.');
                }
            },
            error: function() {
                showToast('error', 'An error occurred while uploading.');
            },
            complete: function() {
                $('#directSaveBtn').prop('disabled', false).html('<i class="fas fa-cloud-arrow-up text-sm"></i> Upload & Save');
            }
        });
    });
});
</script>

<?php
$page_content = ob_get_clean();
include dirname(__DIR__) . '/dashboard.php';
?>