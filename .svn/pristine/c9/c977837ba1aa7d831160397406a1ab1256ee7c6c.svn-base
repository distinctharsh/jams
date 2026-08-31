<?php
ob_start();
?>
<!-- Manage Vendors Page -->
<div class="space-y-6">

    <!-- Header Section -->
    <div class="gov-card p-6">
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
            <div class="flex items-center gap-3">
                <div class="w-12 h-12 rounded-xl bg-amber-50 border border-amber-200 flex items-center justify-center shrink-0">
                   <i class="fa-solid fa-handshake text-[#e58500] text-xl"></i>
                </div>
                <div>
                    <h2 class="text-xl font-bold text-[#1e4d7b]">Manage Vendors</h2>
                    <p class="text-xs text-slate-500 mt-0.5">Overview and setup of vendor records.</p>
                </div>
            </div>
            <button id="btnAddNewVendor" class="px-4 py-2.5 bg-[#1e4d7b] hover:bg-[#163a5d] text-white font-semibold text-sm rounded-lg transition flex items-center justify-center gap-2 shadow-sm shrink-0">
                <i class="fas fa-plus text-xs"></i> Add Vendor
            </button>
        </div>
    </div>

    <!-- Data Table Card -->
    <div class="gov-card p-5 overflow-hidden shadow-sm border border-slate-200 rounded-xl bg-white">
        <div class="overflow-x-auto">
            <table class="w-full text-sm gov-table rounded-lg overflow-hidden" id="vendorTable">
                <thead class="bg-[#1e4d7b] text-white">
                    <tr>
                        <th class="px-5 py-3.5 text-left w-16 font-semibold uppercase tracking-wider text-xs">S.No.</th>
                        <th class="px-5 py-3.5 text-left font-semibold uppercase tracking-wider text-xs">Vendor Name</th>
                        <th class="px-5 py-3.5 text-left font-semibold uppercase tracking-wider text-xs">Status</th>
                        <th class="px-5 py-3.5 text-left pr-6 font-semibold uppercase tracking-wider text-xs">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100 bg-white text-slate-700">
                    <?php if(!empty($vendors)): ?>
                        <?php foreach($vendors as $index => $vendor): ?>
                            <tr class="hover:bg-slate-50/80 transition-colors duration-150">
                                <td class="px-5 py-4 text-left font-bold text-[#1e4d7b]">
                                    <?= $index + 1 ?>
                                </td>
                                <td class="px-5 py-4 font-bold text-slate-800">
                                    <?= esc($vendor['vendor_name']) ?>
                                </td>
                                <td class="px-5 py-4 text-left">
                                    <?php if ($vendor['isactive'] == 1 || $vendor['isactive'] == '1'): ?>
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
                                    <div class="flex justify-left gap-2">
                                        <button class="w-8 h-8 rounded-lg bg-blue-50 text-[#1e4d7b] hover:bg-blue-100 border border-blue-100 transition edit-vendor-btn flex items-center justify-center" data-id="<?= $vendor['id'] ?>" title="Edit">
                                            <i class="fas fa-pen-to-square text-xs"></i>
                                        </button>
                                        <button class="w-8 h-8 rounded-lg bg-red-50 text-red-600 hover:bg-red-100 border border-red-100 transition delete-vendor-btn flex items-center justify-center" data-id="<?= $vendor['id'] ?>" title="Delete">
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
<div id="vendorModal" class="fixed inset-0 bg-slate-900/50 backdrop-blur-sm z-50 hidden flex items-center justify-center p-4 transition-opacity">
    <div class="bg-white rounded-2xl shadow-xl w-full max-w-lg overflow-hidden transform transition-all">
        
        <!-- Modal Header -->
        <div class="px-6 py-4 bg-slate-50 border-b border-slate-200 flex items-center justify-between">
            <h3 class="text-base font-bold text-[#1e4d7b] flex items-center gap-2" id="vendorModalTitle">
                <i class="fa-solid fa-truck-field text-[#e58500]"></i> Add Vendor
            </h3>
            <button type="button" class="closeVendorModal text-slate-400 hover:text-slate-600 w-8 h-8 rounded-lg flex items-center justify-center hover:bg-slate-200 transition">
                <i class="fas fa-times"></i>
            </button>
        </div>

        <!-- Form Body -->
        <form id="vendorForm">
            <?= csrf_field() ?>
            <input type="hidden" name="id" id="vendor_id">

            <div class="p-6 space-y-4">
                <div>
                    <label class="block text-xs font-bold text-slate-600 uppercase tracking-wider mb-1.5">
                        Vendor Name <span class="text-red-500">*</span>
                    </label>
                    <input type="text" name="vendor_name" id="vendor_name" class="w-full px-3.5 py-2.5 text-sm bg-slate-50 border border-slate-300 rounded-lg focus:ring-2 focus:ring-[#1e4d7b] focus:border-[#1e4d7b] focus:bg-white outline-none transition" placeholder="e.g. ABC Technologies" required>
                </div>

                <div class="p-4 bg-slate-50 border border-slate-200 rounded-xl" id="vendorIsActiveContainer" style="display: none;">
                    <label class="flex items-center justify-between cursor-pointer">
                        <span class="text-sm font-semibold text-slate-700">Is Active</span>
                        <input type="checkbox" name="isactive" id="vendor_isactive" value="1" checked class="w-4 h-4 text-[#1e4d7b] rounded border-slate-300 focus:ring-[#1e4d7b]">
                    </label>
                </div>
            </div>

            <!-- Modal Footer -->
            <div class="px-6 py-3.5 bg-slate-50 border-t border-slate-200 flex justify-end gap-3">
                <button type="button" class="closeVendorModal px-4 py-2 bg-slate-100 hover:bg-slate-200 text-slate-700 text-sm font-medium rounded-lg border border-slate-300 transition">
                    Cancel
                </button>
                <button type="submit" id="saveVendorBtn" class="px-5 py-2 bg-[#1e4d7b] hover:bg-[#163a5d] text-white text-sm font-semibold rounded-lg transition shadow-sm">
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

<script>
$(document).ready(function() {
    let vendorDataTable = null;

    function initDataTable() {
        if ($.fn && $.fn.DataTable) {
            if ($.fn.DataTable.isDataTable('#vendorTable')) {
                $('#vendorTable').DataTable().destroy();
            }

            vendorDataTable = $('#vendorTable').DataTable({
                "pageLength": 10,
                "lengthMenu": [ [10, 15, 25, 50, 100, -1], [10, 15, 25, 50, 100, "All"] ],
                "responsive": true,
                "autoWidth": false,
                "dom": '<"flex flex-col sm:flex-row sm:items-center justify-between gap-4 mb-3"<"flex items-center gap-4"Bl>f>rt<"flex flex-col sm:flex-row sm:items-center justify-between gap-4 mt-4"ip>',
                "buttons": [
                    {
                        extend: 'copy',
                        text: '<i class="fas fa-copy me-1"></i> Copy',
                        title: 'Vendors',
                        exportOptions: { columns: [0, 1, 2] }
                    },
                    {
                        extend: 'csv',
                        text: '<i class="fas fa-file-csv me-1"></i> CSV',
                        title: 'Vendors',
                        filename: 'Vendors',
                        exportOptions: { columns: [0, 1, 2] }
                    },
                    {
                        extend: 'excel',
                        text: '<i class="fas fa-file-excel me-1"></i> Excel',
                        title: 'Vendors',
                        filename: 'Vendors',
                        exportOptions: { columns: [0, 1, 2] }
                    },
                    {
                        extend: 'pdf',
                        text: '<i class="fas fa-file-pdf me-1"></i> PDF',
                        title: 'Vendors',
                        filename: 'Vendors',
                        exportOptions: { columns: [0, 1, 2] }
                    },
                    {
                        extend: 'print',
                        text: '<i class="fas fa-print me-1"></i> Print',
                        title: 'Vendors',
                        exportOptions: { columns: [0, 1, 2] }
                    }
                ],

                "columnDefs": [
                    { "orderable": false, "targets": [3] }
                ],
                "language": {
                    "search": "_INPUT_",
                    "searchPlaceholder": "Search vendor...",
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

    // Initialize DataTable on page load
    initDataTable();

    function openVendorModal() {
        $('#vendorModal').removeClass('hidden');
    }

    function closeVendorModal() {
        $('#vendorModal').addClass('hidden');
    }

    $('.closeVendorModal').click(function() {
        closeVendorModal();
    });

    function updateCSRF(hash) {
        if(hash) {
            $('#vendorForm input[type="hidden"]').first().val(hash);
        }
    }

    $('#btnAddNewVendor').click(function() {
        let csrfInput = $('#vendorForm input[type="hidden"]').first();
        let csrfName = csrfInput.attr('name');
        let csrfVal = csrfInput.val();

        $('#vendorForm')[0].reset();

        csrfInput.attr('name', csrfName).val(csrfVal);

        $('#vendor_id').val('');
        $('#vendor_isactive').prop('checked', true);
        $('#vendorIsActiveContainer').hide();
        $('#vendorModalTitle').html('<i class="fa-solid fa-truck-field text-[#e58500]"></i> Add Vendor');
        openVendorModal();
    });

    attachVendorEventListeners();

    // AJAX Form Submit
    $('#vendorForm').submit(function(e) {
        e.preventDefault();
        $('#saveVendorBtn').prop('disabled', true).text('Saving...');
        let formData = $(this).serialize();

        if ($('#vendor_id').val() === '' && !formData.includes('isactive')) {
            formData += '&isactive=1';
        }

        $.ajax({
            url: "<?= base_url('dashboard/save-vendor') ?>",
            type: "POST",
            data: formData,
            dataType: "json",
            success: function(res) {
                if(res.csrfHash) updateCSRF(res.csrfHash);

                if(res.success) {
                    closeVendorModal();
                    loadVendors();
                    showToast('success', res.message || 'Vendor saved successfully!');
                } else if(res.errors) {
                    let errorMsg = Object.values(res.errors).join("<br>");
                    showToast('error', errorMsg);
                } else {
                    showToast('error', res.message || 'Something went wrong.');
                }
            },
            error: function() {
                showToast('error', 'An error occurred while saving.');
            },
            complete: function() {
                $('#saveVendorBtn').prop('disabled', false).text('Save Changes');
            }
        });
    });

    function loadVendors() {
        $.ajax({
            url: "<?= base_url('dashboard/get-vendors') ?>",
            type: "GET",
            dataType: "json",
            success: function(res) {
                if(res.csrfHash) updateCSRF(res.csrfHash);
                if(res.success) {
                    renderVendorsTable(res.vendors);
                }
            },
            error: function() {
                showToast('error', 'Error loading vendor data.');
            }
        });
    }

    function renderVendorsTable(vendors) {
        if ($.fn.DataTable.isDataTable('#vendorTable')) {
            $('#vendorTable').DataTable().destroy();
        }

        let tbody = $('#vendorTable tbody');
        tbody.empty();

        if(!vendors || vendors.length === 0) {
            tbody.html('<tr><td colspan="4" class="text-center py-12"><i class="fa-solid fa-truck-field text-slate-300 text-5xl mb-3 block"></i><p class="text-slate-500 font-medium">No vendor records found.</p></td></tr>');
        } else {
            vendors.forEach(function(vendor, index) {
                let isActive = (vendor.isactive == 1 || vendor.isactive == '1');
                let row = '<tr class="hover:bg-slate-50/80 transition-colors duration-150">' +
                    '<td class="px-5 py-4 text-left font-bold text-[#1e4d7b]">#' + String(index + 1).padStart(3, '0') + '</td>' +
                    '<td class="px-5 py-4 font-bold text-slate-800">' + (vendor.vendor_name ? vendor.vendor_name : '') + '</td>' +
                    '<td class="px-5 py-4 text-left">' +
                        (isActive ? 
                            '<span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-lg border-l-4 border-green-500 bg-green-50 text-green-700 font-semibold text-xs shadow-sm"><i class="fas fa-check-circle"></i> Active</span>' : 
                            '<span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-lg border-l-4 border-red-500 bg-red-50 text-red-700 font-semibold text-xs shadow-sm"><i class="fas fa-times-circle"></i> Inactive</span>') +
                    '</td>' +
                    '<td class="px-5 py-4 text-right pr-6">' +
                        '<div class="flex justify-end gap-2">' +
                            '<button class="w-8 h-8 rounded-lg bg-blue-50 text-[#1e4d7b] hover:bg-blue-100 border border-blue-100 transition edit-vendor-btn flex items-center justify-center" data-id="' + vendor.id + '" title="Edit"><i class="fas fa-pen-to-square text-xs"></i></button>' +
                            '<button class="w-8 h-8 rounded-lg bg-red-50 text-red-600 hover:bg-red-100 border border-red-100 transition delete-vendor-btn flex items-center justify-center" data-id="' + vendor.id + '" title="Delete"><i class="fas fa-trash-can text-xs"></i></button>' +
                        '</div>' +
                    '</td>' +
                    '</tr>';
                tbody.append(row);
            });
        }

        initDataTable();
        attachVendorEventListeners();
    }

    function attachVendorEventListeners() {
        $('.edit-vendor-btn').off('click').on('click', function() {
            let id = $(this).data('id');
            $.ajax({
                url: "<?= base_url('dashboard/get-vendor/') ?>" + id,
                type: "GET",
                dataType: "json",
                success: function(res) {
                    if(res.csrfHash) updateCSRF(res.csrfHash);
                    if(res.success) {
                        $('#vendor_id').val(res.data.id);
                        $('#vendor_name').val(res.data.vendor_name);
                        $('#vendor_isactive').prop('checked', res.data.isactive == 1 || res.data.isactive == '1');
                        $('#vendorIsActiveContainer').show();
                        $('#vendorModalTitle').html('<i class="fa-solid fa-truck-field text-[#e58500]"></i> Edit Vendor');
                        openVendorModal();
                    } else {
                        showToast('error', res.message || 'Unable to fetch record.');
                    }
                },
                error: function() {
                    showToast('error', 'Error fetching vendor data.');
                }
            });
        });

        $('.delete-vendor-btn').off('click').on('click', function() {
            if(!confirm('Are you sure you want to delete this vendor?')) return;
            let id = $(this).data('id');

            let csrfInput = $('#vendorForm input[type="hidden"]').first();
            let dataParam = {};
            dataParam[csrfInput.attr('name')] = csrfInput.val();

            $.ajax({
                url: "<?= base_url('dashboard/delete-vendor/') ?>" + id,
                type: "POST",
                data: dataParam,
                dataType: "json",
                success: function(res) {
                    if(res.csrfHash) updateCSRF(res.csrfHash);
                    if(res.success) {
                        loadVendors();
                        showToast('success', res.message || 'Vendor deleted successfully!');
                    } else {
                        showToast('error', res.message || 'Unable to delete record.');
                    }
                },
                error: function() {
                    showToast('error', 'Error deleting vendor.');
                }
            });
        });
    }
});
</script>
<?php
$page_content = ob_get_clean();
include dirname(__DIR__) . '/dashboard.php';
?>