<!-- Manage Designation Page -->
<div class="space-y-6">

    <!-- Header Section -->
    <div class="gov-card p-6">
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
            <div class="flex items-center gap-3">
                <div class="w-12 h-12 rounded-xl bg-amber-50 border border-amber-200 flex items-center justify-center shrink-0">
                   <i class="fas fa-id-badge text-[#e58500] text-xl"></i>
                </div>
                <div>
                    <h2 class="text-xl font-bold text-[#1e4d7b]">Designation Management</h2>
                    <p class="text-xs text-slate-500 mt-0.5">Overview and setup of system designations.</p>
                </div>
            </div>
            <button id="btnAddNewDesignation" class="px-4 py-2.5 bg-[#1e4d7b] hover:bg-[#163a5d] text-white font-semibold text-sm rounded-lg transition flex items-center justify-center gap-2 shadow-sm shrink-0">
                <i class="fas fa-plus text-xs"></i> Add Designation
            </button>
        </div>
    </div>

    <!-- Data Table Card -->
    <div class="gov-card p-5 overflow-hidden shadow-sm border border-slate-200 rounded-xl bg-white">
        <div class="overflow-x-auto">
            <table class="w-full text-sm gov-table rounded-lg overflow-hidden" id="designationTable">
                <thead class="bg-[#1e4d7b] text-white">
                    <tr>
                        <th class="px-5 py-3.5 text-left w-16 font-semibold uppercase tracking-wider text-xs">S.No.</th>
                        <th class="px-5 py-3.5 text-left font-semibold uppercase tracking-wider text-xs">Designation Name</th>
                        <th class="px-5 py-3.5 text-left font-semibold uppercase tracking-wider text-xs">Status</th>
                        <th class="px-5 py-3.5 text-left pr-6 font-semibold uppercase tracking-wider text-xs">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100 bg-white text-slate-700">
                    <?php if(!empty($designations)): ?>
                        <?php foreach($designations as $index => $des): ?>
                            <tr class="hover:bg-slate-50/80 transition-colors duration-150">
                                <td class="px-5 py-4 text-left font-bold text-[#1e4d7b]">
                                    <?= $index + 1 ?>
                                </td>
                                <td class="px-5 py-4 font-bold text-left text-slate-800">
                                    <?= esc($des['name'] ?? $des['designation_name'] ?? '') ?>
                                </td>
                                <td class="px-5 py-4 text-left">
                                    <?php if (($des['isactive'] ?? 1) == 1 || ($des['isactive'] ?? 1) == '1'): ?>
                                        <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-lg border-l-4 border-green-500 bg-green-50 text-green-700 font-semibold text-xs shadow-sm">
                                            <i class="fas fa-check-circle"></i> Active
                                        </span>
                                    <?php else: ?>
                                        <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-lg border-l-4 border-red-500 bg-red-50 text-red-700 font-semibold text-xs shadow-sm">
                                            <i class="fas fa-times-circle"></i> Inactive
                                        </span>
                                    <?php endif; ?>
                                </td>
                                <td class="px-5 py-4 text-right pr-6">
                                    <div class="flex justify-start gap-2">
                                        <button class="w-8 h-8 rounded-lg bg-blue-50 text-[#1e4d7b] hover:bg-blue-100 border border-blue-100 transition edit-des-btn flex items-center justify-center" data-id="<?= $des['id'] ?>" title="Edit">
                                            <i class="fas fa-pen-to-square text-xs"></i>
                                        </button>
                                        <button class="w-8 h-8 rounded-lg bg-red-50 text-red-600 hover:bg-red-100 border border-red-100 transition delete-des-btn flex items-center justify-center" data-id="<?= $des['id'] ?>" title="Delete">
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

<!-- Modal Dialog -->
<div id="designationModal" class="fixed inset-0 bg-slate-900/50 backdrop-blur-sm z-50 hidden flex items-center justify-center p-4 transition-opacity">
    <div class="bg-white rounded-2xl shadow-xl w-full max-w-md overflow-hidden transform transition-all">
        
        <!-- Modal Header -->
        <div class="px-6 py-4 bg-slate-50 border-b border-slate-200 flex items-center justify-between">
            <h3 class="text-base font-bold text-[#1e4d7b] flex items-center gap-2" id="designationModalTitle">
                <i class="fas fa-id-badge text-[#e58500]"></i> Add Designation
            </h3>
            <button type="button" class="closeDesModal text-slate-400 hover:text-slate-600 w-8 h-8 rounded-lg flex items-center justify-center hover:bg-slate-200 transition">
                <i class="fas fa-times"></i>
            </button>
        </div>

        <!-- Form Body -->
        <form id="designationForm">
            <?= csrf_field() ?>
            <input type="hidden" name="id" id="des_id">

            <div class="p-6 space-y-4">
                <!-- Designation Name -->
                <div>
                    <label class="block text-xs font-bold text-slate-600 uppercase tracking-wider mb-1.5">
                        Designation Name <span class="text-red-500">*</span>
                    </label>
                    <input type="text" name="name" id="des_name" class="w-full px-3.5 py-2.5 text-sm bg-slate-50 border border-slate-300 rounded-lg focus:ring-2 focus:ring-[#1e4d7b] focus:border-[#1e4d7b] focus:bg-white outline-none transition" placeholder="e.g. Director General / Joint Secretary" required>
                </div>

                <!-- Status Checkbox (Edit Mode Only) -->
                <div class="p-4 bg-slate-50 border border-slate-200 rounded-xl" id="desIsActiveContainer" style="display: none;">
                    <label class="flex items-center justify-between cursor-pointer">
                        <span class="text-sm font-semibold text-slate-700">Is Active</span>
                        <input type="checkbox" name="isactive" id="des_isactive" value="1" checked class="w-4 h-4 text-[#1e4d7b] rounded border-slate-300 focus:ring-[#1e4d7b]">
                    </label>
                </div>
            </div>

            <!-- Modal Footer -->
            <div class="px-6 py-3.5 bg-slate-50 border-t border-slate-200 flex justify-end gap-3">
                <button type="button" class="closeDesModal px-4 py-2 bg-slate-100 hover:bg-slate-200 text-slate-700 text-sm font-medium rounded-lg border border-slate-300 transition">
                    Cancel
                </button>
                <button type="submit" id="saveDesBtn" class="px-5 py-2 bg-[#1e4d7b] hover:bg-[#163a5d] text-white text-sm font-semibold rounded-lg transition shadow-sm">
                    Save Changes
                </button>
            </div>
        </form>
    </div>
</div>

<link rel="stylesheet" href="<?= base_url('assets/css/buttons.dataTables.min.css') ?>">
<script src="<?= base_url('assets/js/jquery-3.7.0.min.js') ?>"></script>
<script src="<?= base_url('assets/js/tost.js') ?>"></script>
<script src="<?= base_url('assets/js/jquery.dataTables.min.js') ?>"></script>
<script src="<?= base_url('assets/js/dataTables.buttons.min.js') ?>"></script>
<script src="<?= base_url('assets/js/jszip.min.js') ?>"></script>
<script src="<?= base_url('assets/js/pdfmake.min.js') ?>"></script>
<script src="<?= base_url('assets/js/vfs_fonts.js') ?>"></script>
<script src="<?= base_url('assets/js/buttons.html5.min.js') ?>"></script>
<script src="<?= base_url('assets/js/buttons.print.min.js') ?>"></script>

<style>
/* Custom Styled DataTables Layout (Exactly matching reference page) */
.dataTables_wrapper { font-family: inherit; }

.dataTables_wrapper .dataTables_length,
.dataTables_wrapper .dataTables_filter {
    margin-bottom: 1.25rem;
    font-size: 0.875rem;
    color: #475569;
    font-weight: 500;
}

.dataTables_wrapper .dataTables_length { float: left; }
.dataTables_wrapper .dataTables_filter { float: right; }

.dataTables_wrapper .dataTables_length select {
    padding: 6px 32px 6px 12px !important;
    border-radius: 8px;
    border: 1px solid #cbd5e1;
    background-color: #f8fafc;
    font-size: 0.875rem;
    color: #334155;
    outline: none;
    transition: all 0.2s;
    cursor: pointer;
}
.dataTables_wrapper .dataTables_length select:focus {
    border-color: #1e4d7b;
    background-color: #ffffff;
    box-shadow: 0 0 0 3px rgba(30, 77, 123, 0.1);
}

.dataTables_wrapper .dataTables_filter input {
    padding: 6px 14px !important;
    border-radius: 8px;
    border: 1px solid #cbd5e1;
    background-color: #f8fafc;
    margin-left: 8px;
    outline: none;
    font-size: 0.875rem;
    transition: all 0.2s;
    width: 220px;
}
.dataTables_wrapper .dataTables_filter input:focus {
    border-color: #1e4d7b;
    background-color: #ffffff;
    box-shadow: 0 0 0 3px rgba(30, 77, 123, 0.1);
}

.dataTables_wrapper .dataTables_info {
    padding-top: 1rem !important;
    font-size: 0.85rem;
    color: #64748b !important;
    float: left;
}

.dataTables_wrapper .dataTables_paginate {
    padding-top: 0.75rem !important;
    float: right;
}

.dataTables_wrapper .dataTables_paginate .paginate_button {
    border-radius: 6px !important;
    border: 1px solid #e2e8f0 !important;
    background: #ffffff !important;
    color: #475569 !important;
    font-size: 0.85rem !important;
    font-weight: 600 !important;
    padding: 5px 12px !important;
    margin-left: 4px !important;
    transition: all 0.15s ease-in-out;
}

.dataTables_wrapper .dataTables_paginate .paginate_button:hover {
    background: #f1f5f9 !important;
    color: #1e4d7b !important;
    border-color: #cbd5e1 !important;
}

.dataTables_wrapper .dataTables_paginate .paginate_button.current,
.dataTables_wrapper .dataTables_paginate .paginate_button.current:hover {
    background: #1e4d7b !important;
    color: #ffffff !important;
    border-color: #1e4d7b !important;
    box-shadow: 0 1px 2px rgba(0,0,0,0.05);
}

.dataTables_wrapper .dataTables_paginate .paginate_button.disabled,
.dataTables_wrapper .dataTables_paginate .paginate_button.disabled:hover {
    opacity: 0.5;
    cursor: not-allowed;
    background: #f8fafc !important;
    border-color: #e2e8f0 !important;
}

.dataTables_wrapper::after {
    content: "";
    clear: both;
    display: table;
}
</style>

<script>
$(document).ready(function() {
    let designationDataTable = null;

    function initDataTable() {
        if ($.fn && $.fn.DataTable) {
            if ($.fn.DataTable.isDataTable('#designationTable')) {
                $('#designationTable').DataTable().destroy();
            }

            designationDataTable = $('#designationTable').DataTable({
                "pageLength": 10,
                "lengthMenu": [ [10, 15, 25, 50, 100, -1], [10, 15, 25, 50, 100, "All"] ],
                "responsive": true,
                "autoWidth": false,
                "dom": '<"flex flex-col sm:flex-row sm:items-center justify-between gap-4 mb-3"<"flex items-center gap-4"Bl>f>rt<"flex flex-col sm:flex-row sm:items-center justify-between gap-4 mt-4"ip>',
                "buttons": [
                    {
                        extend: 'copy',
                        text: '<i class="fas fa-copy me-1"></i> Copy',
                        title: 'Designations',
                        exportOptions: { columns: [0, 1, 2] }
                    },
                    {
                        extend: 'csv',
                        text: '<i class="fas fa-file-csv me-1"></i> CSV',
                        title: 'Designations',
                        filename: 'Designations',
                        exportOptions: { columns: [0, 1, 2] }
                    },
                    {
                        extend: 'excel',
                        text: '<i class="fas fa-file-excel me-1"></i> Excel',
                        title: 'Designations',
                        filename: 'Designations',
                        exportOptions: { columns: [0, 1, 2] }
                    },
                    {
                        extend: 'pdf',
                        text: '<i class="fas fa-file-pdf me-1"></i> PDF',
                        title: 'Designations',
                        filename: 'Designations',
                        exportOptions: { columns: [0, 1, 2] }
                    },
                    {
                        extend: 'print',
                        text: '<i class="fas fa-print me-1"></i> Print',
                        title: 'Designations',
                        exportOptions: { columns: [0, 1, 2] }
                    }
                ],
                "columnDefs": [
                    { "orderable": false, "targets": [3] }
                ],
                "language": {
                    "search": "_INPUT_",
                    "searchPlaceholder": "Search designation...",
                    "lengthMenu": "Show _MENU_ entries",
                    "info": "Showing _START_ to _END_ of _TOTAL_ entries",
                    "infoEmpty": "Showing 0 to 0 of 0 entries",
                    "infoFiltered": "(filtered from _MAX_ total entries)",
                    "paginate": {
                        "previous": "<i class='fas fa-chevron-left text-xs'></i>",
                        "next": "<i class='fas fa-chevron-right text-xs'></i>"
                    }
                }
            });
        } else {
            console.error("DataTables plugin is not loaded properly.");
        }
    }

    initDataTable();

    function openDesModal() {
        $('#designationModal').removeClass('hidden');
    }

    function closeDesModal() {
        $('#designationModal').addClass('hidden');
    }

    $('.closeDesModal').click(function() {
        closeDesModal();
    });

    function updateCSRF(hash) {
        if(hash) {
            $('#designationForm input[type="hidden"]').first().val(hash);
        }
    }

    $('#btnAddNewDesignation').click(function() {
        let csrfInput = $('#designationForm input[type="hidden"]').first();
        let csrfName = csrfInput.attr('name');
        let csrfVal = csrfInput.val();

        $('#designationForm')[0].reset();
        csrfInput.attr('name', csrfName).val(csrfVal);

        $('#des_id').val('');
        $('#des_isactive').prop('checked', true);
        $('#desIsActiveContainer').hide();
        $('#designationModalTitle').html('<i class="fas fa-id-badge text-[#e58500]"></i> Add Designation');
        openDesModal();
    });

    attachDesEventListeners();

    // AJAX Form Submit
    $('#designationForm').submit(function(e) {
        e.preventDefault();
        $('#saveDesBtn').prop('disabled', true).text('Saving...');
        let formData = $(this).serialize();

        if ($('#des_id').val() === '' && !formData.includes('isactive')) {
            formData += '&isactive=1';
        }

        $.ajax({
            url: "<?= base_url('dashboard/save-designation') ?>",
            type: "POST",
            data: formData,
            dataType: "json",
            success: function(res) {
                if(res.csrfHash) updateCSRF(res.csrfHash);

                if(res.success) {
                    closeDesModal();
                    loadDesignations();
                    if(typeof showToast === 'function') showToast('success', res.message || 'Designation saved successfully!');
                } else if(res.errors) {
                    let errorMsg = Object.values(res.errors).join("<br>");
                    if(typeof showToast === 'function') showToast('error', errorMsg);
                } else {
                    if(typeof showToast === 'function') showToast('error', res.message || 'Something went wrong.');
                }
            },
            error: function() {
                if(typeof showToast === 'function') showToast('error', 'An error occurred while saving.');
            },
            complete: function() {
                $('#saveDesBtn').prop('disabled', false).text('Save Changes');
            }
        });
    });

    function loadDesignations() {
        $.ajax({
            url: "<?= base_url('dashboard/get-designations') ?>",
            type: "GET",
            dataType: "json",
            success: function(res) {
                if(res.csrfHash) updateCSRF(res.csrfHash);
                if(res.success) {
                    renderDesignationsTable(res.designations);
                }
            },
            error: function() {
                if(typeof showToast === 'function') showToast('error', 'Error loading designation data.');
            }
        });
    }

    function renderDesignationsTable(designations) {
        if ($.fn.DataTable.isDataTable('#designationTable')) {
            $('#designationTable').DataTable().destroy();
        }

        let tbody = $('#designationTable tbody');
        tbody.empty();

        if(!designations || designations.length === 0) {
            tbody.html('<tr><td colspan="4" class="text-center py-12"><i class="fas fa-id-badge text-slate-300 text-5xl mb-3 block"></i><p class="text-slate-500 font-medium">No designation records found.</p></td></tr>');
        } else {
            designations.forEach(function(des, index) {
                let isActive = (des.isactive == 1 || des.isactive == '1');
                let desName = des.name ? des.name : (des.designation_name ? des.designation_name : '');
                let statusText = isActive ? 'Active' : 'Inactive';
                
                let row = '<tr class="hover:bg-slate-50/80 transition-colors duration-150">' +
                    '<td class="px-5 py-4 text-left font-bold text-[#1e4d7b]">#' + String(index + 1).padStart(3, '0') + '</td>' +
                    '<td class="px-5 py-4 font-bold text-slate-800 text-left">' + desName + '</td>' +
                    '<td class="px-5 py-4 text-left" data-order="' + statusText + '">' +
                        (isActive ? 
                            '<span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-lg border-l-4 border-green-500 bg-green-50 text-green-700 font-semibold text-xs shadow-sm"><i class="fas fa-check-circle"></i> Active</span>' : 
                            '<span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-lg border-l-4 border-red-500 bg-red-50 text-red-700 font-semibold text-xs shadow-sm"><i class="fas fa-times-circle"></i> Inactive</span>') +
                    '</td>' +
                    '<td class="px-5 py-4 text-right pr-6">' +
                        '<div class="flex justify-start gap-2">' +
                            '<button class="w-8 h-8 rounded-lg bg-blue-50 text-[#1e4d7b] hover:bg-blue-100 border border-blue-100 transition edit-des-btn flex items-center justify-center" data-id="' + des.id + '" title="Edit"><i class="fas fa-pen-to-square text-xs"></i></button>' +
                            '<button class="w-8 h-8 rounded-lg bg-red-50 text-red-600 hover:bg-red-100 border border-red-100 transition delete-des-btn flex items-center justify-center" data-id="' + des.id + '" title="Delete"><i class="fas fa-trash-can text-xs"></i></button>' +
                        '</div>' +
                    '</td>' +
                    '</tr>';
                tbody.append(row);
            });
        }

        initDataTable();
        attachDesEventListeners();
    }

    function attachDesEventListeners() {
        $('.edit-des-btn').off('click').on('click', function() {
            let id = $(this).data('id');
            $.ajax({
                url: "<?= base_url('dashboard/get-designation/') ?>" + id,
                type: "GET",
                dataType: "json",
                success: function(res) {
                    if(res.csrfHash) updateCSRF(res.csrfHash);
                    if(res.success) {
                        $('#des_id').val(res.data.id);
                        $('#des_name').val(res.data.name || res.data.designation_name);
                        $('#des_isactive').prop('checked', res.data.isactive == 1 || res.data.isactive == '1');
                        $('#desIsActiveContainer').show();
                        $('#designationModalTitle').html('<i class="fas fa-id-badge text-[#e58500]"></i> Edit Designation');
                        openDesModal();
                    } else {
                        if(typeof showToast === 'function') showToast('error', res.message || 'Unable to fetch record.');
                    }
                },
                error: function() {
                    if(typeof showToast === 'function') showToast('error', 'Error fetching designation data.');
                }
            });
        });

        $('.delete-des-btn').off('click').on('click', function() {
            if(!confirm('Are you sure you want to deactivate this designation?')) return;
            let id = $(this).data('id');

            let csrfInput = $('#designationForm input[type="hidden"]').first();
            let dataParam = {};
            dataParam[csrfInput.attr('name')] = csrfInput.val();

            $.ajax({
                url: "<?= base_url('dashboard/delete-designation/') ?>" + id,
                type: "POST",
                data: dataParam,
                dataType: "json",
                success: function(res) {
                    if(res.csrfHash) updateCSRF(res.csrfHash);
                    if(res.success) {
                        loadDesignations();
                        if(typeof showToast === 'function') showToast('success', res.message || 'Designation deactivated successfully!');
                    } else {
                        if(typeof showToast === 'function') showToast('error', res.message || 'Unable to delete record.');
                    }
                },
                error: function() {
                    if(typeof showToast === 'function') showToast('error', 'Error deleting designation.');
                }
            });
        });
    }
});
</script>