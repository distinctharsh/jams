<!-- Manage Organizations Page -->
<div class="space-y-6">

    <!-- Header Section -->
    <div class="gov-card p-6">
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
            <div class="flex items-center gap-3">
                <div class="w-12 h-12 rounded-xl bg-amber-50 border border-amber-200 flex items-center justify-center shrink-0">
                    <i class="fa-solid fa-sitemap text-[#e58500] text-xl"></i>
                </div>
                <div>
                    <h2 class="text-xl font-bold text-[#1e4d7b]">Manage Organizations</h2>
                    <p class="text-xs text-slate-500 mt-0.5">Overview and administration of registered organizations.</p>
                </div>
            </div>
            <button id="btnAddNew" class="px-4 py-2.5 bg-[#1e4d7b] hover:bg-[#163a5d] text-white font-semibold text-sm rounded-lg transition flex items-center justify-center gap-2 shadow-sm shrink-0">
                <i class="fas fa-plus text-xs"></i> Add Organization
            </button>
        </div>
    </div>

    <!-- Data Table Card -->
    <div class="gov-card p-5 overflow-hidden shadow-sm border border-slate-200 rounded-xl bg-white">
        <div class="overflow-x-auto">
            <table class="w-full text-sm gov-table rounded-lg overflow-hidden" id="orgTable">
                <thead class="bg-[#1e4d7b] text-white">
                    <tr>
                        <th class="px-5 py-3.5 text-left w-16 font-semibold uppercase tracking-wider text-xs">S.No.</th>
                        <th class="px-5 py-3.5 text-left font-semibold uppercase tracking-wider text-xs">Organization Name</th>
                        <th class="px-5 py-3.5 text-left font-semibold uppercase tracking-wider text-xs">Type</th>
                        <th class="px-5 py-3.5 text-left font-semibold uppercase tracking-wider text-xs">Auth Letter Req.</th>
                        <th class="px-5 py-3.5 text-left font-semibold uppercase tracking-wider text-xs">Status</th>
                        <th class="px-5 py-3.5 text-right pr-6 font-semibold uppercase tracking-wider text-xs">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100 bg-white text-slate-700">
                    <?php if(!empty($organizations)): ?>
                        <?php foreach($organizations as $index => $org): ?>
                            <tr class="hover:bg-slate-50/80 transition-colors duration-150">
                                <td class="px-5 py-4 text-left font-bold text-[#1e4d7b]">
                                    <?= $index + 1 ?>
                                </td>
                                <td class="px-5 py-4">
                                    <div class="font-bold text-slate-800"><?= esc($org['org_name']) ?></div>
                                    <?php if(!empty($org['org_description'])): ?>
                                        <div class="text-xs text-slate-500 truncate max-w-xs mt-0.5" title="<?= esc($org['org_description']) ?>">
                                            <?= esc($org['org_description']) ?>
                                        </div>
                                    <?php endif; ?>
                                </td>
                                <td class="px-5 py-4">
                                    <span class="inline-flex items-left px-3 py-1 rounded-full text-xs font-semibold bg-blue-50 text-[#1e4d7b] border border-blue-200/80">
                                        <?= esc($org['org_type_name'] ?? $org['type_name'] ?? $org['org_type']) ?>
                                    </span>
                                </td>
                                <td class="px-5 py-4 text-left">
                                    <?php if ($org['authorization_letter_required']): ?>
                                        <span class="inline-flex items-center gap-1 px-3 py-1 rounded-full text-xs font-semibold bg-amber-50 text-amber-700 border border-amber-200">
                                            <i class="fas fa-exclamation-circle text-[10px]"></i> Yes
                                        </span>
                                    <?php else: ?>
                                        <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-slate-100 text-slate-600 border border-slate-200">
                                            No
                                        </span>
                                    <?php endif; ?>
                                </td>
                                <td class="px-5 py-4 text-left">
                                    <?php if ($org['isactive']): ?>
                                        <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-lg border-l-4 border-green-500 bg-green-50 text-green-700 font-semibold text-xs shadow-sm">
                                            <i class="fas fa-check-circle"></i> Active
                                        </span>
                                    <?php else: ?>
                                        <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-lg border-l-4 border-red-500 bg-red-50 text-red-700 font-semibold text-xs shadow-sm">
                                            <i class="fas fa-times-circle"></i> Inactive
                                        </span>
                                    <?php endif; ?>
                                </td>
                                <td class="px-5 py-4 text-left pr-6">
                                    <div class="flex justify-left gap-2">
                                        <button class="w-8 h-8 rounded-lg bg-blue-50 text-[#1e4d7b] hover:bg-blue-100 border border-blue-100 transition edit-btn flex items-center justify-center" data-id="<?= $org['id'] ?>" title="Edit">
                                            <i class="fas fa-pen-to-square text-xs"></i>
                                        </button>
                                        <button class="w-8 h-8 rounded-lg bg-red-50 text-red-600 hover:bg-red-100 border border-red-100 transition delete-btn flex items-center justify-center" data-id="<?= $org['id'] ?>" title="Delete">
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
<div id="orgModal" class="fixed inset-0 bg-slate-900/50 backdrop-blur-sm z-50 hidden flex items-center justify-center p-4 transition-opacity">
    <div class="bg-white rounded-2xl shadow-xl w-full max-w-lg overflow-hidden transform transition-all">
        
        <!-- Modal Header -->
        <div class="px-6 py-4 bg-slate-50 border-b border-slate-200 flex items-center justify-between">
            <h3 class="text-base font-bold text-[#1e4d7b] flex items-center gap-2" id="modalTitle">
                <i class="fa-solid fa-sitemap text-[#e58500]"></i> Add Organization
            </h3>
            <button type="button" class="closeModal text-slate-400 hover:text-slate-600 w-8 h-8 rounded-lg flex items-center justify-center hover:bg-slate-200 transition">
                <i class="fas fa-times"></i>
            </button>
        </div>

        <!-- Form Body -->
        <form id="orgForm">
            <?= csrf_field() ?>
            <input type="hidden" name="id" id="org_id">

            <div class="p-6 space-y-4">
                <div>
                    <label class="block text-xs font-bold text-slate-600 uppercase tracking-wider mb-1.5">
                        Organization Name <span class="text-red-500">*</span>
                    </label>
                    <input type="text" name="org_name" id="org_name" class="w-full px-3.5 py-2.5 text-sm bg-slate-50 border border-slate-300 rounded-lg focus:ring-2 focus:ring-[#1e4d7b] focus:border-[#1e4d7b] focus:bg-white outline-none transition" placeholder="e.g. Staff Selection Commission" required>
                </div>

                <div>
                    <label class="block text-xs font-bold text-slate-600 uppercase tracking-wider mb-1.5">
                        Organization Type <span class="text-red-500">*</span>
                    </label>
                    <select name="org_type" id="org_type" class="w-full px-3.5 py-2.5 text-sm bg-slate-50 border border-slate-300 rounded-lg focus:ring-2 focus:ring-[#1e4d7b] focus:border-[#1e4d7b] focus:bg-white outline-none transition" required>
                        <option value="" disabled selected>Select Organization Type</option>
                        <?php if(!empty($orgTypes)): ?>
                            <?php foreach($orgTypes as $type): ?>
                                <option value="<?= esc($type['id']) ?>">
                                    <?= esc($type['name']) ?>
                                </option>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </select>
                </div>

                <div>
                    <label class="block text-xs font-bold text-slate-600 uppercase tracking-wider mb-1.5">Description</label>
                    <textarea name="org_description" id="org_description" rows="3" class="w-full px-3.5 py-2.5 text-sm bg-slate-50 border border-slate-300 rounded-lg focus:ring-2 focus:ring-[#1e4d7b] focus:border-[#1e4d7b] focus:bg-white outline-none transition" placeholder="Brief details about the organization..."></textarea>
                </div>

                <div class="p-4 bg-slate-50 border border-slate-200 rounded-xl space-y-3">
                    <label class="flex items-center justify-between cursor-pointer">
                        <span class="text-sm font-semibold text-slate-700">Authorization Letter Required</span>
                        <input type="checkbox" name="authorization_letter_required" id="auth_req" value="1" checked class="w-4 h-4 text-[#1e4d7b] rounded border-slate-300 focus:ring-[#1e4d7b]">
                    </label>

                    <hr class="border-slate-200"/>

                    <label class="flex items-center justify-between cursor-pointer" id="isActiveContainer" style="display: none;">
                        <span class="text-sm font-semibold text-slate-700">Is Active</span>
                        <input type="checkbox" name="isactive" id="isactive" value="1" checked class="w-4 h-4 text-[#1e4d7b] rounded border-slate-300 focus:ring-[#1e4d7b]">
                    </label>
                </div>
            </div>

            <!-- Modal Footer -->
            <div class="px-6 py-3.5 bg-slate-50 border-t border-slate-200 flex justify-end gap-3">
                <button type="button" class="closeModal px-4 py-2 bg-slate-100 hover:bg-slate-200 text-slate-700 text-sm font-medium rounded-lg border border-slate-300 transition">
                    Cancel
                </button>
                <button type="submit" id="saveBtn" class="px-5 py-2 bg-[#1e4d7b] hover:bg-[#163a5d] text-white text-sm font-semibold rounded-lg transition shadow-sm">
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
/* Buttons Design Customization */
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
</style>

<script>
$(document).ready(function() {
    let dataTableInstance = null;

    function initDataTable() {
        if ($.fn && $.fn.DataTable) {
            if ($.fn.DataTable.isDataTable('#orgTable')) {
                $('#orgTable').DataTable().destroy();
            }

            dataTableInstance = $('#orgTable').DataTable({
                "pageLength": 10,
                "lengthMenu": [ [10, 15, 25, 50, 100, -1], [10, 15, 25, 50, 100, "All"] ],
                "responsive": true,
                "autoWidth": false,
                "dom": '<"flex flex-col sm:flex-row sm:items-center justify-between gap-4 mb-3"<"flex items-center gap-4"Bl>f>rt<"flex flex-col sm:flex-row sm:items-center justify-between gap-4 mt-4"ip>',

                "columnDefs": [
                    { "orderable": false, "targets": [5] }
                ],
                "buttons": [
                    {
                        extend: 'copy',
                        text: '<i class="fas fa-copy me-1"></i> Copy',
                        exportOptions: { columns: [0, 1, 2, 3, 4] }
                    },
                    {
                        extend: 'csv',
                        text: '<i class="fas fa-file-csv me-1"></i> CSV',
                        exportOptions: { columns: [0, 1, 2, 3, 4] }
                    },
                    {
                        extend: 'excel',
                        text: '<i class="fas fa-file-excel me-1"></i> Excel',
                        exportOptions: { columns: [0, 1, 2, 3, 4] }
                    },
                    {
                        extend: 'pdf',
                        text: '<i class="fas fa-file-pdf me-1"></i> PDF',
                        exportOptions: { columns: [0, 1, 2, 3, 4] }
                    },
                    {
                        extend: 'print',
                        text: '<i class="fas fa-print me-1"></i> Print',
                        exportOptions: { columns: [0, 1, 2, 3, 4] }
                    }
                ],
                "language": {
                    "search": "_INPUT_",
                    "searchPlaceholder": "Search organization...",
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

    function openModal() {
        $('#orgModal').removeClass('hidden');
    }

    function closeModal() {
        $('#orgModal').addClass('hidden');
    }

    $('.closeModal').click(function() {
        closeModal();
    });

    function updateCSRF(hash) {
        if(hash) {
            $('#orgForm input[type="hidden"]').first().val(hash);
        }
    }

    $('#btnAddNew').click(function() {
        let csrfInput = $('#orgForm input[type="hidden"]').first();
        let csrfName = csrfInput.attr('name');
        let csrfVal = csrfInput.val();

        $('#orgForm')[0].reset();
        csrfInput.attr('name', csrfName).val(csrfVal);
        $('#org_id').val('');
        $('#auth_req').prop('checked', true);
        $('#isactive').prop('checked', true);
        $('#isActiveContainer').hide();
        $('#modalTitle').html('<i class="fa-solid fa-sitemap text-[#e58500]"></i> Add Organization');
        openModal();
    });

    attachEventListeners();

    // Save/Update AJAX
    $('#orgForm').submit(function(e) {
        e.preventDefault();
        $('#saveBtn').prop('disabled', true).text('Saving...');
        let formData = $(this).serialize();
        if ($('#org_id').val() === '' && !formData.includes('isactive')) {
            formData += '&isactive=1';
        }

        $.ajax({
            url: "<?= base_url('dashboard/save-organization') ?>",
            type: "POST",
            data: formData,
            dataType: "json",
            success: function(res) {
                if(res.csrfHash) updateCSRF(res.csrfHash);
                if(res.success) {
                    closeModal();
                    loadOrganizations();
                    showToast('success', res.message || 'Organization saved successfully!');
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
                $('#saveBtn').prop('disabled', false).text('Save Changes');
            }
        });
    });
    
    function loadOrganizations() {
        $.ajax({
            url: "<?= base_url('dashboard/get-organizations') ?>",
            type: "GET",
            dataType: "json",
            cache: false,
            success: function(res) {
                if(res.csrfHash) updateCSRF(res.csrfHash);
                if(res.success) {
                    renderOrganizationsTable(res.organizations);
                } else {
                    showToast('error', res.message || 'Failed to fetch updated data.');
                }
            },
            error: function() {
                showToast('error', 'Error loading organizations data.');
            }
        });
    }
    
    function renderOrganizationsTable(organizations) {
        if ($.fn.DataTable.isDataTable('#orgTable')) {
            $('#orgTable').DataTable().destroy();
        }

        let tbody = $('#orgTable tbody');
        tbody.empty();
        
        if(!organizations || organizations.length === 0) {
            tbody.html('<tr><td colspan="6" class="text-center py-12"><i class="fa-solid fa-sitemap text-slate-300 text-5xl mb-3 block"></i><p class="text-slate-500 font-medium">No organization records found.</p></td></tr>');
        } else {
            organizations.forEach(function(org, index) {
                let typeDisplayName = org.org_type_name || org.type_name || org.org_type || '';
                let isAuthReq = (org.authorization_letter_required == 1 || org.authorization_letter_required === true || org.authorization_letter_required == '1');
                let isActive = (org.isactive == 1 || org.isactive === true || org.isactive == '1');

                let row = '<tr class="hover:bg-slate-50/80 transition-colors duration-150">' +
                    '<td class="px-5 py-4 text-left font-bold text-[#1e4d7b]">' + (index + 1) + '</td>' +
                    '<td class="px-5 py-4">' +
                        '<div class="font-bold text-slate-800">' + (org.org_name ? org.org_name : '') + '</div>' +
                        (org.org_description ? '<div class="text-xs text-slate-500 truncate max-w-xs mt-0.5" title="' + org.org_description + '">' + org.org_description + '</div>' : '') +
                    '</td>' +
                    '<td class="px-5 py-4">' +
                        '<span class="inline-flex items-left px-3 py-1 rounded-full text-xs font-semibold bg-blue-50 text-[#1e4d7b] border border-blue-200/80">' + typeDisplayName + '</span>' +
                    '</td>' +
                    '<td class="px-5 py-4 text-left">' +
                        (isAuthReq ? 
                            '<span class="inline-flex items-center gap-1 px-3 py-1 rounded-full text-xs font-semibold bg-amber-50 text-amber-700 border border-amber-200"><i class="fas fa-exclamation-circle text-[10px]"></i> Yes</span>' : 
                            '<span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-slate-100 text-slate-600 border border-slate-200">No</span>') +
                    '</td>' +
                    '<td class="px-5 py-4 text-left">' +
                        (isActive ? 
                            '<span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-lg border-l-4 border-green-500 bg-green-50 text-green-700 font-semibold text-xs shadow-sm"><i class="fas fa-check-circle"></i> Active</span>' : 
                            '<span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-lg border-l-4 border-red-500 bg-red-50 text-red-700 font-semibold text-xs shadow-sm"><i class="fas fa-times-circle"></i> Inactive</span>') +
                    '</td>' +
                    '<td class="px-5 py-4 text-left pr-6">' +
                        '<div class="flex justify-left gap-2">' +
                            '<button class="w-8 h-8 rounded-lg bg-blue-50 text-[#1e4d7b] hover:bg-blue-100 border border-blue-100 transition edit-btn flex items-center justify-center" data-id="' + org.id + '" title="Edit"><i class="fas fa-pen-to-square text-xs"></i></button>' +
                            '<button class="w-8 h-8 rounded-lg bg-red-50 text-red-600 hover:bg-red-100 border border-red-100 transition delete-btn flex items-center justify-center" data-id="' + org.id + '" title="Delete"><i class="fas fa-trash-can text-xs"></i></button>' +
                        '</div>' +
                    '</td>' +
                    '</tr>';
                tbody.append(row);
            });
        }
        
        initDataTable();
        attachEventListeners();
    }
    
    function attachEventListeners() {
        $('.edit-btn').off('click').on('click', function() {
            let id = $(this).data('id');
            $.ajax({
                url: "<?= base_url('dashboard/get-organization/') ?>" + id,
                type: "GET",
                cache: false,
                dataType: "json",
                success: function(res) {
                    if(res.csrfHash) updateCSRF(res.csrfHash);
                    if(res.success) {
                        $('#org_id').val(res.data.id);
                        $('#org_name').val(res.data.org_name);
                        $('#org_type').val(res.data.org_type);
                        $('#org_description').val(res.data.org_description);
                        $('#auth_req').prop('checked', res.data.authorization_letter_required == 1 || res.data.authorization_letter_required == '1');
                        $('#isactive').prop('checked', res.data.isactive == 1 || res.data.isactive == '1');
                        $('#isActiveContainer').show();
                        $('#modalTitle').html('<i class="fa-solid fa-sitemap text-[#e58500]"></i> Edit Organization');
                        openModal();
                    } else {
                        showToast('error', res.message || 'Unable to fetch record.');
                    }
                },
                error: function() {
                    showToast('error', 'Error fetching organization data.');
                }
            });
        });

        $('.delete-btn').off('click').on('click', function() {
            if(!confirm('Are you sure you want to delete this record?')) return;
            let id = $(this).data('id');
            
            let csrfInput = $('#orgForm input[type="hidden"]').first();
            let dataParam = {};
            dataParam[csrfInput.attr('name')] = csrfInput.val();

            $.ajax({
                url: "<?= base_url('dashboard/delete-organization/') ?>" + id,
                type: "POST",
                data: dataParam,
                dataType: "json",
                success: function(res) {
                    if(res.csrfHash) updateCSRF(res.csrfHash);
                    if(res.success) {
                        loadOrganizations();
                        showToast('success', res.message || 'Organization deleted successfully!');
                    } else {
                        showToast('error', res.message || 'Unable to delete record.');
                    }
                },
                error: function() {
                    showToast('error', 'Error deleting organization.');
                }
            });
        });
    }
});
</script>