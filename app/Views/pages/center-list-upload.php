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

    <!-- Top Action Card -->
    <div class="gov-card p-6">
        <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-4">
            <div class="flex items-center gap-3">
                <div class="w-12 h-12 rounded-xl bg-blue-50 border border-blue-200 flex items-center justify-center shrink-0">
                    <i class="fas fa-upload text-[#1e4d7b] text-xl"></i>
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
            </div>
        </div>
    </div>

    <!-- Datatable Card with Total Request Columns -->
    <div class="gov-card p-5 overflow-hidden shadow-sm border border-slate-200 rounded-xl bg-white">
        <div class="overflow-x-auto">
            <table class="w-full text-sm gov-table rounded-lg overflow-hidden" id="centerListTable">
                <thead class="bg-[#1e4d7b] text-white">
                    <tr>
                        <th class="px-5 py-3.5 text-left font-semibold uppercase tracking-wider text-xs">Request ID</th>
                        <th class="px-5 py-3.5 text-left font-semibold uppercase tracking-wider text-xs">Organisation</th>
                        <th class="px-5 py-3.5 text-left font-semibold uppercase tracking-wider text-xs">Exam Name</th>
                        <th class="px-5 py-3.5 text-left font-semibold uppercase tracking-wider text-xs">Exam Date</th>
                        <th class="px-5 py-3.5 text-left font-semibold uppercase tracking-wider text-xs">Status</th>
                        <th class="px-5 py-3.5 text-left font-semibold uppercase tracking-wider text-xs">Center List Uploaded</th>
                        <th class="px-5 py-3.5 text-right pr-6 font-semibold uppercase tracking-wider text-xs">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100 bg-white text-slate-700">
                    <?php if(!empty($center_lists) && is_array($center_lists)): ?>
                        <?php foreach($center_lists as $request): ?>
                            <?php $appNoFormatted = esc($request['app_no'] ?? '#' . str_pad($request['id'], 4, '0', STR_PAD_LEFT)); ?>
                            <tr class="hover:bg-slate-50/80 transition-colors duration-150">
                                
                                <td class="px-5 py-4 font-bold text-[#1e4d7b]">
                                    <?= $appNoFormatted ?>
                                </td>
                                
                                <td class="px-5 py-4 font-bold text-slate-800">
                                    <?= !empty($request['organisation']) ? esc($request['organisation']) : 'N/A' ?>
                                </td>

                                <td class="px-5 py-4 font-semibold text-slate-800">
                                    <?php 
                                    if (!empty($request['exam_names'])) {
                                        $names = array_unique(explode('||', $request['exam_names']));
                                        foreach ($names as $name) {
                                            echo '<div class="leading-tight mb-1 last:mb-0">' . esc($name) . '</div>';
                                        }
                                    } else {
                                        echo 'N/A';
                                    }
                                    ?>
                                </td>
                                
                                <td class="px-5 py-4 text-slate-600 font-medium">
                                    <?php 
                                    if (!empty($request['exam_dates'])) {
                                        $dates = explode('||', $request['exam_dates']);
                                        foreach ($dates as $d) {
                                            if (!empty($d) && $d !== '0000-00-00 00:00:00') {
                                                echo '<div class="leading-tight mb-1 last:mb-0">' . date('d/m/Y', strtotime($d)) . '</div>';
                                            }
                                        }
                                    } else {
                                        echo 'N/A';
                                    }
                                    ?>
                                </td>

                                <td class="px-5 py-4 text-left">
                                    <?php 
                                    $statusVal = $request['status_name'] ?? '1';

                                    if (in_array($statusVal, [9, 10, 11, 12, '9', '10', '11', '12', 'APPROVED', 'COMPLETED'])) {
                                        $statusClass = 'bg-emerald-50 text-emerald-700 border-emerald-500';
                                        $statusIcon  = 'fa-check-circle';
                                    } elseif (in_array($statusVal, [14, '14', 'REJECTED'])) {
                                        $statusClass = 'bg-red-50 text-red-700 border-red-500';
                                        $statusIcon  = 'fa-times-circle';
                                    } elseif (in_array($statusVal, [13, '13', 'RETURNED'])) {
                                        $statusClass = 'bg-orange-50 text-orange-700 border-orange-500';
                                        $statusIcon  = 'fa-rotate-left';
                                    } else {
                                        $statusClass = 'bg-amber-50 text-amber-700 border-amber-500';
                                        $statusIcon  = 'fa-clock';
                                    }
                                    ?>

                                    <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-lg border-l-4 <?= $statusClass ?> font-semibold text-xs shadow-sm">
                                        <i class="fas <?= $statusIcon ?>"></i>
                                        <?= esc($statusVal) ?>
                                    </span>
                                </td>
                                
                                <td class="px-5 py-4 text-slate-600 font-medium">
                                    <?php if (isset($request['centre_list_ready']) && $request['centre_list_ready'] == 1): ?>
                                        <span class="text-xs font-semibold text-emerald-600 bg-emerald-50 px-2.5 py-1 rounded-md border border-emerald-200">Yes</span>
                                    <?php else: ?>
                                        <span class="text-xs font-semibold text-slate-500 bg-slate-100 px-2.5 py-1 rounded-md border border-slate-200">N/A</span>
                                    <?php endif; ?>
                                </td>

                                <td class="px-5 py-4 text-right pr-6">
                                    <div class="flex justify-end items-center gap-2">
                                        <?php if (isset($request['centre_list_ready']) && $request['centre_list_ready'] == 0): ?>
                                            <button type="button" 
                                                    class="w-8 h-8 rounded-lg bg-[#1e4d7b] hover:bg-[#163a5d] text-white border border-[#1e4d7b] transition flex items-center justify-center shadow-sm" 
                                                    title="Upload Center List Excel" 
                                                    onclick="openUploadModal('<?= $request['id'] ?>', '<?= $appNoFormatted ?>')">
                                                <i class="fas fa-cloud-arrow-up text-xs"></i>
                                            </button>
                                        <?php else: ?>
                                            <button class="w-8 h-8 rounded-lg bg-blue-50 text-[#1e4d7b] hover:bg-blue-100 border border-blue-100 transition flex items-center justify-center" 
                                                    title="View" 
                                                    onclick="pageviewRequest(<?= $request['id'] ?>)">
                                                <i class="fas fa-eye text-xs"></i>
                                            </button>
                                        <?php endif; ?>
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

<!-- Upload Modal Popup -->
<div id="uploadModal" class="fixed inset-0 z-50 hidden overflow-y-auto bg-slate-900/60 backdrop-blur-sm flex items-center justify-center p-4">
    <div class="relative w-full max-w-md bg-white rounded-2xl shadow-2xl border border-slate-100 overflow-hidden transform transition-all">
        <div class="bg-[#1e4d7b] px-6 py-4 flex items-center justify-between text-white">
            <div class="flex items-center gap-2.5">
                <i class="fas fa-file-excel text-amber-400 text-lg"></i>
                <h3 class="font-bold text-base">Upload Center List Excel</h3>
            </div>
            <button type="button" onclick="closeUploadModal()" class="text-white/80 hover:text-white transition text-lg font-bold">&times;</button>
        </div>

        <form id="modalUploadForm" enctype="multipart/form-data" class="p-6 space-y-5">
            <?= csrf_field() ?>
            <input type="hidden" name="app_id" id="modal_app_id">

            <div class="bg-blue-50/70 rounded-xl p-3.5 border border-blue-100 flex items-center justify-between">
                <span class="text-xs font-medium text-slate-600">Target Request ID:</span>
                <span id="modal_app_no_display" class="text-xs font-bold text-[#1e4d7b] bg-white px-2.5 py-1 rounded-md border border-blue-200">#0000</span>
            </div>

            <div class="border-2 border-dashed border-slate-300 hover:border-[#1e4d7b] rounded-xl p-6 text-center cursor-pointer bg-slate-50 hover:bg-blue-50/30 transition duration-150" id="dropZone">
                <div class="w-12 h-12 bg-blue-100/70 text-[#1e4d7b] rounded-full flex items-center justify-center mx-auto mb-3 pointer-events-none">
                    <i class="fas fa-folder-open text-xl"></i>
                </div>
                <p class="text-sm font-semibold text-slate-700 mb-1 pointer-events-none" id="selectedFileNameDisplay">Click to choose file or drag here</p>
                <p class="text-xs text-slate-400 pointer-events-none">Supports .xlsx, .xls, .csv formats</p>
                <input type="file" name="excel_file" id="modal_excel_file" accept=".xlsx, .xls, .csv" class="hidden" required>
            </div>

            <div class="flex items-center justify-end gap-3 pt-2">
                <button type="button" onclick="closeUploadModal()" class="px-4 py-2 bg-slate-100 hover:bg-slate-200 text-slate-700 text-xs font-semibold rounded-lg transition">
                    Cancel
                </button>
                <button type="submit" id="modalSubmitBtn" class="px-5 py-2 bg-[#1e4d7b] hover:bg-[#163a5d] text-white text-xs font-semibold rounded-lg transition shadow-sm flex items-center gap-2 disabled:opacity-50" disabled>
                    <i class="fas fa-cloud-arrow-up"></i> Upload & Submit
                </button>
            </div>
        </form>
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
            "autoWidth": false
        });
    }

    // Direct Click Event on DropZone (Infinite Loop Prevented)
    $('#dropZone').on('click', function(e) {
        if (!$(e.target).is('#modal_excel_file')) {
            $('#modal_excel_file').trigger('click');
        }
    });

    $('#modal_excel_file').on('click', function(e) {
        e.stopPropagation();
    });

    $('#dropZone').on('dragover dragenter', function(e) {
        e.preventDefault();
        e.stopPropagation();
        $(this).addClass('border-[#1e4d7b] bg-blue-50/50');
    });

    $('#dropZone').on('dragleave drop', function(e) {
        e.preventDefault();
        e.stopPropagation();
        $(this).removeClass('border-[#1e4d7b] bg-blue-50/50');
    });

    $('#dropZone').on('drop', function(e) {
        let files = e.originalEvent.dataTransfer.files;
        if (files && files.length > 0) {
            $('#modal_excel_file')[0].files = files;
            $('#modal_excel_file').trigger('change');
        }
    });

    $('#modal_excel_file').on('change', function() {
        if (this.files && this.files[0]) {
            let name = this.files[0].name;
            $('#selectedFileNameDisplay').text(name).addClass('text-[#1e4d7b]');
            $('#modalSubmitBtn').prop('disabled', false);
        } else {
            resetModalFileInput();
        }
    });

    // Modal Form AJAX Submit Event
    $('#modalUploadForm').submit(function(e) {
        e.preventDefault();
        let formData = new FormData(this);
        let btn = $('#modalSubmitBtn');
        btn.prop('disabled', true).html('<i class="fas fa-spinner fa-spin"></i> Uploading...');

        $.ajax({
            url: "<?= base_url('center-lists/upload') ?>",
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            dataType: "json",
            success: function(res) {
                if(res.csrfHash) {
                    updateCSRF(res.csrfHash);
                }

                if(res.success) {
                    showToast('success', res.message || 'Excel file uploaded successfully!');
                    closeUploadModal();
                    setTimeout(() => { location.reload(); }, 1200);
                } else {
                    showToast('error', res.message || 'Failed to upload Excel file.');
                    btn.prop('disabled', false).html('<i class="fas fa-cloud-arrow-up"></i> Upload & Submit');
                }
            },
            error: function() {
                showToast('error', 'An error occurred while uploading.');
                btn.prop('disabled', false).html('<i class="fas fa-cloud-arrow-up"></i> Upload & Submit');
            }
        });
    });
});

function openUploadModal(appId, appNo) {
    $('#modal_app_id').val(appId);
    $('#modal_app_no_display').text(appNo);
    resetModalFileInput();
    $('#uploadModal').removeClass('hidden');
}

function closeUploadModal() {
    $('#uploadModal').addClass('hidden');
    resetModalFileInput();
}

function resetModalFileInput() {
    $('#modal_excel_file').val('');
    $('#selectedFileNameDisplay').text('Click to choose file or drag here').removeClass('text-[#1e4d7b]');
    $('#modalSubmitBtn').prop('disabled', true);
}

function updateCSRF(hash) {
    if(hash) {
        $('input[name="<?= csrf_token() ?>"]').val(hash);
    }
}

function pageviewRequest(requestId) {
    if (requestId) {
        window.location.href = '/request-view/' + requestId;
    } else {
        console.error('Request ID is required');
    }
}
</script>

<?php
$page_content = ob_get_clean();
include dirname(__DIR__) . '/dashboard.php';
?>