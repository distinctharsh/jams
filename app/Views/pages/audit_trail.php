<?php
ob_start();
?>

<style>
.dataTables_length, div.dataTables_wrapper div.dataTables_length {
    display: none !important;
}

.dt-buttons .dt-button {
    background-color: #ffffff !important;
    border: 1px solid #cbd5e1 !important;
    color: #334155 !important;
    font-size: 0.75rem !important;
    font-weight: 600 !important;
    padding: 0.4rem 0.8rem !important;
    border-radius: 0.5rem !important;
    box-shadow: 0 1px 2px 0 rgb(0 0 0 / 0.05) !important;
    transition: all 0.15s ease-in-out !important;
}
.dt-buttons .dt-button:hover {
    background-color: #f8fafc !important;
    border-color: #94a3b8 !important;
    color: #1e4d7b !important;
}

.dataTables_filter input {
    border: 1px solid #cbd5e1 !important;
    border-radius: 0.5rem !important;
    padding: 0.4rem 0.75rem !important;
    font-size: 0.875rem !important;
    outline: none !important;
    transition: all 0.15s ease-in-out !important;
}
.dataTables_filter input:focus {
    border-color: #1e4d7b !important;
    box-shadow: 0 0 0 3px rgba(30, 77, 123, 0.15) !important;
}
</style>

<div class="space-y-6">
    <div class="gov-card p-6">
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
            <div class="flex items-center gap-3">
                <div class="w-12 h-12 rounded-xl bg-amber-50 border border-amber-200 flex items-center justify-center shrink-0">
                    <i class="fas fa-history text-[#e58500] text-xl"></i>
                </div>
                <div>
                    <h2 class="text-xl font-bold text-[#1e4d7b]">Audit Trail</h2>
                    <p class="text-xs text-slate-500 mt-0.5">View and track all user actions and system activities.</p>
                </div>
            </div>
        </div>
    </div>

    <div class="gov-card p-5 overflow-hidden shadow-sm border border-slate-200 rounded-xl bg-white">
        <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 mb-4">
            <div class="flex flex-wrap items-center gap-3">
                <div id="custom-buttons-container"></div>
                <div class="flex items-center gap-2 bg-slate-50 border border-slate-200 rounded-lg px-3 py-1.5 shadow-sm hover:border-slate-300 transition-colors">
                    <span class="text-xs font-medium text-slate-500">Show:</span>
                    <select id="customPageLength" class="bg-transparent text-xs font-semibold text-slate-700 outline-none cursor-pointer pr-1">
                        <option value="10" selected>10 entries</option>
                        <option value="15">15 entries</option>
                        <option value="25">25 entries</option>
                        <option value="50">50 entries</option>
                        <option value="100">100 entries</option>
                        <option value="-1">All entries</option>
                    </select>
                </div>
            </div>
            <div id="custom-search-container"></div>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-sm gov-table rounded-lg overflow-hidden" id="auditTrailTable">
                <thead class="bg-[#1e4d7b] text-white">
                    <tr>
                        <th class="px-5 py-3.5 text-left w-16 font-semibold uppercase tracking-wider text-xs">S.No.</th>
                        <th class="px-5 py-3.5 text-left font-semibold uppercase tracking-wider text-xs">Login Name</th>
                        <th class="px-5 py-3.5 text-left font-semibold uppercase tracking-wider text-xs">Action</th>
                        <th class="px-5 py-3.5 text-left font-semibold uppercase tracking-wider text-xs">Description</th>
                        <th class="px-5 py-3.5 text-left font-semibold uppercase tracking-wider text-xs">IP Address</th>
                        <th class="px-5 py-3.5 text-left font-semibold uppercase tracking-wider text-xs">Date & Time</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100 bg-white text-slate-700">
                    <?php if(!empty($audit_logs)): ?>
                        <?php foreach($audit_logs as $index => $log): ?>
                            <tr class="hover:bg-slate-50/80 transition-colors duration-150">
                                <td class="px-5 py-4 text-left font-bold text-[#1e4d7b]">
                                    <?= $index + 1 ?>
                                </td>
                                <td class="px-5 py-4 font-bold text-slate-800">
                                    <?= esc($log['login_name'] ?? 'N/A') ?>
                                </td>
                                <td class="px-5 py-4 text-left">
                                    <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-lg bg-blue-50 text-[#1e4d7b] font-semibold text-xs border border-blue-100">
                                        <?= esc($log['action']) ?>
                                    </span>
                                </td>
                                <td class="px-5 py-4 text-slate-600 max-w-xs truncate" title="<?= esc($log['action_description']) ?>">
                                    <?= esc($log['action_description'] ?? '-') ?>
                                </td>
                                <td class="px-5 py-4 text-slate-600 font-mono text-xs">
                                    <?= esc($log['ip_address'] ?? 'N/A') ?>
                                </td>
                                <td class="px-5 py-4 text-slate-500 text-xs whitespace-nowrap">
                                    <?= !empty($log['created_at']) ? date('d-m-Y h:i:s A', strtotime($log['created_at'])) : '-' ?>
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
<script src="<?= base_url('assets/js/jquery-3.7.0.min.js') ?>"></script>
<script src="<?= base_url('assets/js/tost.js') ?>"></script>
<script src="<?= base_url('assets/js/jquery.dataTables.min.js') ?>"></script>
<script src="<?= base_url('assets/js/dataTables.buttons.min.js') ?>"></script>
<script src="<?= base_url('assets/js/jszip.min.js') ?>"></script>
<script src="<?= base_url('assets/js/pdfmake.min.js') ?>"></script>
<script src="<?= base_url('assets/js/vfs_fonts.js') ?>"></script>
<script src="<?= base_url('assets/js/buttons.html5.min.js') ?>"></script>
<script src="<?= base_url('assets/js/buttons.print.min.js') ?>"></script>

<script>
$(document).ready(function() {
    let auditDataTable = null;

    if ($.fn && $.fn.DataTable) {
        if ($.fn.DataTable.isDataTable('#auditTrailTable')) {
            $('#auditTrailTable').DataTable().destroy();
        }

        auditDataTable = $('#auditTrailTable').DataTable({
            "pageLength": 10,
            "responsive": true,
            "autoWidth": false,
            "order": [[0, "asc"]],
            "dom": 'Bfrtip',
            "buttons": [
                { extend: 'copy', text: '<i class="fas fa-copy me-1"></i> Copy', title: 'Audit Trail Records', exportOptions: { columns: [0, 1, 2, 3, 4, 5] } },
                { extend: 'csv', text: '<i class="fas fa-file-csv me-1"></i> CSV', filename: 'Audit_Trail', exportOptions: { columns: [0, 1, 2, 3, 4, 5] } },
                { extend: 'excel', text: '<i class="fas fa-file-excel me-1"></i> Excel', filename: 'Audit_Trail', exportOptions: { columns: [0, 1, 2, 3, 4, 5] } },
                { extend: 'pdf', text: '<i class="fas fa-file-pdf me-1"></i> PDF', filename: 'Audit_Trail', exportOptions: { columns: [0, 1, 2, 3, 4, 5] } },
                { extend: 'print', text: '<i class="fas fa-print me-1"></i> Print', exportOptions: { columns: [0, 1, 2, 3, 4, 5] } }
            ],
            "language": {
                "search": "_INPUT_",
                "searchPlaceholder": "Search audit log...",
                "info": "Showing _START_ to _END_ of _TOTAL_ entries",
                "infoEmpty": "Showing 0 to 0 of 0 entries",
                "infoFiltered": "(filtered from _MAX_ total entries)",
                "paginate": {
                    "previous": "<i class='fas fa-chevron-left text-xs'></i>",
                    "next": "<i class='fas fa-chevron-right text-xs'></i>"
                }
            },
            "initComplete": function() {
                $('.dt-buttons').appendTo('#custom-buttons-container');
                $('.dataTables_filter').appendTo('#custom-search-container');
            }
        });

        $('#customPageLength').on('change', function() {
            let selectedVal = parseInt($(this).val());
            auditDataTable.page.len(selectedVal).draw();
        });
    }
});
</script>

<?php
$page_content = ob_get_clean();
include dirname(__DIR__) . '/dashboard.php';
?>