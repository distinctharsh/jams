<div class="space-y-6">
    <div class="gov-card p-6">
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
            <div class="flex items-center gap-3">
                <div class="w-12 h-12 rounded-xl bg-amber-50 border border-amber-200 flex items-center justify-center shrink-0">
                <i class="fas fa-user-plus text-[#e58500] text-xl"></i>
                </div>
                <div>
                    <h2 class="text-xl font-bold text-[#1e4d7b]">Registration Pending for Approval</h2>
                    <p class="text-xs text-slate-500 mt-0.5">Manage user registration applications and approvals.</p>
                </div>
            </div>

            <!-- Status Filter Buttons -->
            <div class="flex items-center gap-2 bg-slate-100 p-1 rounded-xl border border-slate-200 shrink-0">
                <button type="button" data-filter="Pending" class="status-filter-btn px-4 py-1.5 text-xs font-semibold rounded-lg bg-amber-500 text-white shadow-sm transition">
                    <i class="fas fa-clock me-1"></i> Pending
                </button>
                <button type="button" data-filter="Approved" class="status-filter-btn px-4 py-1.5 text-xs font-semibold rounded-lg text-slate-600 hover:text-slate-800 hover:bg-slate-200 transition">
                    <i class="fas fa-check-circle me-1 filter-icon text-green-600"></i> Approved
                </button>
                <button type="button" data-filter="Rejected" class="status-filter-btn px-4 py-1.5 text-xs font-semibold rounded-lg text-slate-600 hover:text-slate-800 hover:bg-slate-200 transition">
                    <i class="fas fa-times-circle me-1 filter-icon text-red-600"></i> Rejected
                </button>
            </div>
        </div>
    </div>

    <div class="gov-card p-5 overflow-hidden shadow-sm border border-slate-200 rounded-xl bg-white">
        <div class="overflow-x-auto">
            <table class="w-full text-sm gov-table rounded-lg overflow-hidden" id="registrationTable">
                <thead class="bg-[#1e4d7b] text-white">
                    <tr>
                        <th class="px-5 py-3.5 text-left font-semibold uppercase tracking-wider text-xs">Reg. No</th>
                        <th class="px-5 py-3.5 text-left font-semibold uppercase tracking-wider text-xs">Applicant Name</th>
                        <th class="px-5 py-3.5 text-left font-semibold uppercase tracking-wider text-xs">Contact Info</th>
                        <th class="px-5 py-3.5 text-left font-semibold uppercase tracking-wider text-xs">Organization</th>
                        <th class="px-5 py-3.5 text-left font-semibold uppercase tracking-wider text-xs">Auth Letter</th>
                        <th class="px-5 py-3.5 text-left font-semibold uppercase tracking-wider text-xs">Status</th>
                        <th class="px-5 py-3.5 text-left pr-6 font-semibold uppercase tracking-wider text-xs">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100 bg-white text-slate-700">
                    <?php if(!empty($registrations)): ?>
                        <?php foreach($registrations as $reg): ?>
                            <tr class="hover:bg-slate-50/80 transition-colors duration-150">
                                <td class="px-5 py-4 font-bold text-[#1e4d7b]">
                                    <?= esc($reg['reg_no']) ?>
                                </td>
                                <td class="px-5 py-4 font-bold text-slate-800">
                                    <?= esc($reg['name']) ?>
                                    <div class="text-xs font-normal text-slate-500"><?= esc($reg['designation'] ?? '') ?></div>
                                </td>
                                <td class="px-5 py-4 text-xs text-slate-600">
                                    <div><i class="fas fa-envelope text-slate-400 me-1"></i><?= esc($reg['email']) ?></div>
                                    <div class="mt-0.5"><i class="fas fa-phone text-slate-400 me-1"></i><?= esc($reg['mobile_no']) ?></div>
                                </td>
                                <td class="px-5 py-4 text-xs text-slate-700">
                                    <div class="font-semibold"><?= esc($reg['organization_name'] ?? 'N/A') ?></div>
                                    <div class="text-slate-500"><?= esc($reg['org_type_name'] ?? 'N/A') ?></div>
                                </td>
                                <td class="px-5 py-4 text-left">
                                    <?php if(!empty($reg['authorization_letter'])): ?>
                                        <a href="<?= base_url('uploads/authorization/'.$reg['authorization_letter']) ?>" target="_blank" class="inline-flex items-center justify-center w-8 h-8 rounded-lg bg-slate-100 hover:bg-slate-200 text-[#1e4d7b] transition shadow-sm" title="View Document">
                                            <i class="fas fa-eye text-sm"></i>
                                        </a>
                                    <?php else: ?>
                                        <span class="text-xs text-slate-400">None</span>
                                    <?php endif; ?>
                                </td>
                                <td class="px-5 py-4 text-left" data-order="<?= $reg['current_status'] ?? 1 ?>">
                                    <?php if(($reg['current_status'] ?? 1) == 1): ?>
                                        <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-lg border-l-4 border-amber-500 bg-amber-50 text-amber-700 font-semibold text-xs shadow-sm">
                                            <i class="fas fa-clock"></i> Pending
                                        </span>
                                    <?php elseif(($reg['current_status'] ?? 1) == 4): ?>
                                        <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-lg border-l-4 border-green-500 bg-green-50 text-green-700 font-semibold text-xs shadow-sm">
                                            <i class="fas fa-check-circle"></i> Approved
                                        </span>
                                    <?php else: ?>
                                        <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-lg border-l-4 border-red-500 bg-red-50 text-red-700 font-semibold text-xs shadow-sm">
                                            <i class="fas fa-times-circle"></i> Rejected
                                        </span>
                                    <?php endif; ?>
                                </td>
                                <td class="px-5 py-4 text-left pr-6">
                                    <?php if(($reg['current_status'] ?? 1) == 1): ?>
                                        <div class="flex items-center gap-2">
                                            <!-- Approve Button -->
                                            <button class="px-3 py-1.5 rounded-lg bg-green-600 text-white hover:bg-green-700 border border-green-600 transition text-xs font-semibold approve-reg-btn flex items-center gap-1 shadow-sm" data-id="<?= $reg['id'] ?>" data-name="<?= esc($reg['name']) ?>">
                                                <i class="fas fa-check"></i> Approve
                                            </button>
                                            <!-- Reject Button -->
                                            <button class="px-3 py-1.5 rounded-lg bg-red-50 text-red-600 hover:bg-red-100 border border-red-200 transition text-xs font-semibold reject-reg-btn flex items-center gap-1 shadow-sm" data-id="<?= $reg['id'] ?>" data-name="<?= esc($reg['name']) ?>">
                                                <i class="fas fa-xmark"></i> Reject
                                            </button>
                                        </div>
                                    <?php else: ?>
                                        <span class="text-xs text-slate-400 font-medium">Processed</span>
                                    <?php endif; ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<div id="actionModal" class="fixed inset-0 bg-slate-900/50 backdrop-blur-sm z-50 hidden flex items-center justify-center p-4">
    <div class="bg-white rounded-2xl shadow-xl w-full max-w-md overflow-hidden">
        <div class="px-6 py-4 bg-slate-50 border-b border-slate-200 flex items-center justify-between">
            <h3 class="text-base font-bold text-[#1e4d7b]" id="actionModalHeaderTitle">Application Action</h3>
            <button type="button" class="closeModal text-slate-400 hover:text-slate-600 w-8 h-8 rounded-lg flex items-center justify-center">
                <i class="fas fa-times"></i>
            </button>
        </div>
        <form id="actionForm">
            <?= csrf_field() ?>
            <input type="hidden" name="reg_id" id="action_reg_id">
            <input type="hidden" name="action" id="action_type">
            <div class="p-6 space-y-4">
                <p class="text-sm text-slate-600">Applicant: <strong id="action_applicant_name" class="text-slate-800"></strong></p>
                <div>
                    <label class="block text-xs font-bold text-slate-600 uppercase mb-1" id="remarksLabel">Remarks</label>
                    <textarea name="remarks" id="action_remarks" rows="3" class="w-full px-3 py-2 text-sm border rounded-lg focus:ring-2 focus:ring-[#1e4d7b] outline-none" placeholder="Enter remarks..."></textarea>
                </div>
            </div>
            <div class="px-6 py-3.5 bg-slate-50 border-t flex justify-between gap-3">
                <button type="button" class="closeModal px-4 py-2 bg-slate-100 text-slate-700 text-sm font-medium rounded-lg">Cancel</button>
                <button type="submit" id="submitActionBtn" class="px-5 py-2 text-white text-sm font-semibold rounded-lg shadow-sm">Submit</button>
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
    let registrationDataTable = null;
    let activeFilter = 'Pending';

    $.fn.dataTable.ext.search.push(
        function(settings, data, dataIndex) {
            if (!activeFilter || activeFilter === 'All') {
                return true;
            }
            let statusText = data[5] || '';
            return statusText.indexOf(activeFilter) !== -1;
        }
    );

    function initDataTable() {
        if ($.fn && $.fn.DataTable) {
            if ($.fn.DataTable.isDataTable('#registrationTable')) {
                $('#registrationTable').DataTable().destroy();
            }

            registrationDataTable = $('#registrationTable').DataTable({
                "pageLength": 10,
                "lengthMenu": [ [10, 15, 25, 50, 100, -1], [10, 15, 25, 50, 100, "All"] ],
                "responsive": true,
                "autoWidth": false,
                "dom": '<"flex flex-col sm:flex-row sm:items-center justify-between gap-4 mb-3"<"flex items-center gap-4"Bl>f>rt<"flex flex-col sm:flex-row sm:items-center justify-between gap-4 mt-4"ip>',
                "buttons": [
                    { 
                        extend: 'copy', 
                        text: '<i class="fas fa-copy me-1"></i> Copy',
                        title: 'Registrations',
                        exportOptions: { columns: [0, 1, 2, 3, 4] }
                    },
                    {
                        extend: 'csv',
                        text: '<i class="fas fa-file-csv me-1"></i> CSV',
                        title: 'Registrations',
                        filename: 'Registrations',
                        exportOptions: { columns: [0, 1, 2, 3, 4] }
                    },
                    {
                        extend: 'excel',
                        text: '<i class="fas fa-file-excel me-1"></i> Excel',
                        title: 'Registrations',
                        filename: 'Registrations',
                        exportOptions: { columns: [0, 1, 2, 3, 4] }
                    },
                    {
                        extend: 'pdf',
                        text: '<i class="fas fa-file-pdf me-1"></i> PDF',
                        title: 'Registrations',
                        filename: 'Registrations',
                        exportOptions: { columns: [0, 1, 2, 3, 4] }
                    },
                    {
                        extend: 'print',
                        text: '<i class="fas fa-print me-1"></i> Print',
                        title: 'Registrations',
                        exportOptions: { columns: [0, 1, 2, 3, 4] }
                    }
                ],
                "columnDefs": [
                    { "orderable": false, "targets": [5] }
                ],
                "language": {
                    "search": "_INPUT_",
                    "searchPlaceholder": "Search registration...",
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

            registrationDataTable.draw();
        }
    }

    initDataTable();

    $('.status-filter-btn').on('click', function() {
        activeFilter = $(this).data('filter');
        $('.status-filter-btn')
            .removeClass('bg-amber-500 bg-green-600 bg-red-600 text-white shadow-sm')
            .addClass('text-slate-600 hover:text-slate-800 hover:bg-slate-200');

        $('.status-filter-btn[data-filter="Approved"] i').addClass('text-green-600').removeClass('text-white');
        $('.status-filter-btn[data-filter="Rejected"] i').addClass('text-red-600').removeClass('text-white');

        if (activeFilter === 'Pending') {
            $(this).addClass('bg-amber-500 text-white shadow-sm').removeClass('text-slate-600 hover:bg-slate-200');
        } else if (activeFilter === 'Approved') {
            $(this).addClass('bg-green-600 text-white shadow-sm').removeClass('text-slate-600 hover:bg-slate-200');
            $(this).find('i').removeClass('text-green-600').addClass('text-white');
        } else if (activeFilter === 'Rejected') {
            $(this).addClass('bg-red-600 text-white shadow-sm').removeClass('text-slate-600 hover:bg-slate-200');
            $(this).find('i').removeClass('text-red-600').addClass('text-white');
        }

        if (registrationDataTable) {
            registrationDataTable.draw();
        }
    });

    $('.closeModal').click(function() {
        $('#actionModal').addClass('hidden');
    });

    function updateCSRF(hash) {
        if(hash) $('input[type="hidden"][name^="csrf"]').val(hash);
    }

    $(document).on('click', '.approve-reg-btn', function() {
        let id = $(this).data('id');
        let name = $(this).data('name');

        $('#action_reg_id').val(id);
        $('#action_type').val(4);
        $('#action_applicant_name').text(name);
        $('#action_remarks').val('');

        $('#actionModalHeaderTitle').text('Approve Application');
        $('#remarksLabel').text('Remarks (Optional)');
        $('#action_remarks').attr('placeholder', 'Enter approval remarks (optional)...');

        $('#submitActionBtn')
            .removeClass('bg-red-600 hover:bg-red-700')
            .addClass('bg-green-600 hover:bg-green-700')
            .text('Confirm Approval');

        $('#actionModal').removeClass('hidden');
    });

    $(document).on('click', '.reject-reg-btn', function() {
        let id = $(this).data('id');
        let name = $(this).data('name');

        $('#action_reg_id').val(id);
        $('#action_type').val(5);
        $('#action_applicant_name').text(name);
        $('#action_remarks').val('');

        $('#actionModalHeaderTitle').text('Reject Application');
        $('#remarksLabel').text('Reason / Remarks');
        $('#action_remarks').attr('placeholder', 'Enter reason for rejection...');
        $('#submitActionBtn')
            .removeClass('bg-green-600 hover:bg-green-700')
            .addClass('bg-red-600 hover:bg-red-700')
            .text('Confirm Rejection');

        $('#actionModal').removeClass('hidden');
    });

    $('#actionForm').submit(function(e) {
        e.preventDefault();
        
        let actionType = $('#action_type').val();
        let btnText = (actionType == 4) ? 'Approving...' : 'Rejecting...';
        $('#submitActionBtn').prop('disabled', true).text(btnText);

        $.ajax({
            url: "<?= base_url('dashboard/approve-registration') ?>",
            type: "POST",
            data: $(this).serialize(),
            dataType: "json",
            success: function(res) {
                if(res.csrfHash) updateCSRF(res.csrfHash);
                if(res.success) {
                    $('#actionModal').addClass('hidden');
                    if(typeof showToast === "function") {
                        showToast('success', res.message || 'Action processed successfully!');
                    }
                    location.reload();
                } else {
                    if(typeof showToast === "function") {
                        showToast('error', res.message || 'Action failed');
                    } else {
                        alert(res.message || 'Action failed');
                    }
                }
            },
            complete: function() {
                let defaultBtnText = (actionType == 4) ? 'Confirm Approval' : 'Confirm Rejection';
                $('#submitActionBtn').prop('disabled', false).text(defaultBtnText);
            }
        });
    });
});
</script>