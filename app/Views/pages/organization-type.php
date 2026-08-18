<!-- Manage Organization Types Page -->
<div class="space-y-6">

    <!-- Header Section -->
    <div class="gov-card p-6">
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
            <div class="flex items-center gap-3">
                <div class="w-12 h-12 rounded-xl bg-amber-50 border border-amber-200 flex items-center justify-center shrink-0">
                    <i class="fa-solid fa-layer-group text-[#e58500] text-xl"></i>
                </div>
                <div>
                    <h2 class="text-xl font-bold text-[#1e4d7b]">Manage Organization Types</h2>
                    <p class="text-xs text-slate-500 mt-0.5">Overview and setup of organization categories and rules.</p>
                </div>
            </div>
            <button id="btnAddNewType" class="px-4 py-2.5 bg-[#1e4d7b] hover:bg-[#163a5d] text-white font-semibold text-sm rounded-lg transition flex items-center justify-center gap-2 shadow-sm shrink-0">
                <i class="fas fa-plus text-xs"></i> Add Type
            </button>
        </div>
    </div>

    <!-- Data Table Card -->
    <div class="gov-card p-5 overflow-hidden shadow-sm border border-slate-200 rounded-xl bg-white">
        <div class="overflow-x-auto">
            <table class="w-full text-sm gov-table rounded-lg overflow-hidden" id="orgTypeTable">
                <thead class="bg-[#1e4d7b] text-white">
                    <tr>
                        <th class="px-5 py-3.5 text-left w-16 font-semibold uppercase tracking-wider text-xs">S.No.</th>
                        <th class="px-5 py-3.5 text-left font-semibold uppercase tracking-wider text-xs">Type Name</th>
                        <th class="px-5 py-3.5 text-left font-semibold uppercase tracking-wider text-xs">Competent Authority</th>
                        <th class="px-5 py-3.5 text-left font-semibold uppercase tracking-wider text-xs">UGC ID Req.</th>
                        <th class="px-5 py-3.5 text-left font-semibold uppercase tracking-wider text-xs">Status</th>
                        <th class="px-5 py-3.5 text-left pr-6 font-semibold uppercase tracking-wider text-xs">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100 bg-white text-slate-700">
                    <?php if(!empty($orgTypes)): ?>
                        <?php foreach($orgTypes as $index => $type): ?>
                            <tr class="hover:bg-slate-50/80 transition-colors duration-150">
                                <td class="px-5 py-4 text-left font-bold text-[#1e4d7b]">
                                    <?= $index + 1 ?>
                                </td>
                                <td class="px-5 py-4 font-bold text-slate-800">
                                    <?= esc($type['name']) ?>
                                </td>
                                <td class="px-5 py-4 text-slate-600">
                                    <?= !empty($type['competent_authority']) ? esc($type['competent_authority']) : '<span class="text-slate-400 italic">N/A</span>' ?>
                                </td>
                                <td class="px-5 py-4 text-left">
                                    <?php if ($type['is_ugc_id_required']): ?>
                                        <span class="inline-flex items-center gap-1 px-3 py-1 rounded-full text-xs font-semibold bg-amber-50 text-amber-700 border border-amber-200">
                                            <i class="fas fa-check text-[10px]"></i> Yes
                                        </span>
                                    <?php else: ?>
                                        <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-slate-100 text-slate-600 border border-slate-200">
                                            No
                                        </span>
                                    <?php endif; ?>
                                </td>
                                <td class="px-5 py-4 text-left">
                                    <?php if ($type['isactive']): ?>
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
                                        <button class="w-8 h-8 rounded-lg bg-blue-50 text-[#1e4d7b] hover:bg-blue-100 border border-blue-100 transition edit-type-btn flex items-center justify-center" data-id="<?= $type['id'] ?>" title="Edit">
                                            <i class="fas fa-pen-to-square text-xs"></i>
                                        </button>
                                        <button class="w-8 h-8 rounded-lg bg-red-50 text-red-600 hover:bg-red-100 border border-red-100 transition delete-type-btn flex items-center justify-center" data-id="<?= $type['id'] ?>" title="Delete">
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
<div id="orgTypeModal" class="fixed inset-0 bg-slate-900/50 backdrop-blur-sm z-50 hidden flex items-center justify-center p-4 transition-opacity">
    <div class="bg-white rounded-2xl shadow-xl w-full max-w-lg overflow-hidden transform transition-all">
        
        <!-- Modal Header -->
        <div class="px-6 py-4 bg-slate-50 border-b border-slate-200 flex items-center justify-between">
            <h3 class="text-base font-bold text-[#1e4d7b] flex items-center gap-2" id="typeModalTitle">
                <i class="fa-solid fa-layer-group text-[#e58500]"></i> Add Organization Type
            </h3>
            <button type="button" class="closeTypeModal text-slate-400 hover:text-slate-600 w-8 h-8 rounded-lg flex items-center justify-center hover:bg-slate-200 transition">
                <i class="fas fa-times"></i>
            </button>
        </div>

        <!-- Form Body -->
        <form id="orgTypeForm">
            <!-- Dynamic CodeIgniter CSRF Field -->
            <?= csrf_field() ?>
            <input type="hidden" name="id" id="type_id">

            <div class="p-6 space-y-4">
                <div>
                    <label class="block text-xs font-bold text-slate-600 uppercase tracking-wider mb-1.5">
                        Type Name <span class="text-red-500">*</span>
                    </label>
                    <input type="text" name="name" id="type_name" class="w-full px-3.5 py-2.5 text-sm bg-slate-50 border border-slate-300 rounded-lg focus:ring-2 focus:ring-[#1e4d7b] focus:border-[#1e4d7b] focus:bg-white outline-none transition" placeholder="e.g. Autonomous Body" required>
                </div>

                <div>
                    <label class="block text-xs font-bold text-slate-600 uppercase tracking-wider mb-1.5">
                        Competent Authority
                    </label>
                    <input type="text" name="competent_authority" id="competent_authority" class="w-full px-3.5 py-2.5 text-sm bg-slate-50 border border-slate-300 rounded-lg focus:ring-2 focus:ring-[#1e4d7b] focus:border-[#1e4d7b] focus:bg-white outline-none transition" placeholder="e.g. Ministry of Education">
                </div>

                <div class="p-4 bg-slate-50 border border-slate-200 rounded-xl space-y-3">
                    <label class="flex items-center justify-between cursor-pointer">
                        <span class="text-sm font-semibold text-slate-700">Is UGC ID Required?</span>
                        <input type="checkbox" name="is_ugc_id_required" id="is_ugc_id_required" value="1" class="w-4 h-4 text-[#1e4d7b] rounded border-slate-300 focus:ring-[#1e4d7b]">
                    </label>

                    <hr class="border-slate-200"/>

                    <label class="flex items-center justify-between cursor-pointer" id="typeIsActiveContainer" style="display: none;">
                        <span class="text-sm font-semibold text-slate-700">Is Active</span>
                        <input type="checkbox" name="isactive" id="type_isactive" value="1" checked class="w-4 h-4 text-[#1e4d7b] rounded border-slate-300 focus:ring-[#1e4d7b]">
                    </label>
                </div>
            </div>

            <!-- Modal Footer -->
            <div class="px-6 py-3.5 bg-slate-50 border-t border-slate-200 flex justify-end gap-3">
                <button type="button" class="closeTypeModal px-4 py-2 bg-slate-100 hover:bg-slate-200 text-slate-700 text-sm font-medium rounded-lg border border-slate-300 transition">
                    Cancel
                </button>
                <button type="submit" id="saveTypeBtn" class="px-5 py-2 bg-[#1e4d7b] hover:bg-[#163a5d] text-white text-sm font-semibold rounded-lg transition shadow-sm">
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
    let orgTypeDataTable = null;

    function initDataTable() {
        if ($.fn && $.fn.DataTable) {
            if ($.fn.DataTable.isDataTable('#orgTypeTable')) {
                $('#orgTypeTable').DataTable().destroy();
            }

            orgTypeDataTable = $('#orgTypeTable').DataTable({
                "pageLength": 10,
                "lengthMenu": [ [10, 15, 25, 50, 100, -1], [10, 15, 25, 50, 100, "All"] ],
                "responsive": true,
                "autoWidth": false,
                "dom": '<"flex flex-col sm:flex-row sm:items-center justify-between gap-4"<"flex items-center gap-4"Bl>f>rt<"flex flex-col sm:flex-row sm:items-center justify-between gap-4 mt-4"ip>',
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

                "columnDefs": [
                    { "orderable": false, "targets": [5] }
                ],
                "language": {
                    "search": "_INPUT_",
                    "searchPlaceholder": "Search type...",
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

    function openTypeModal() {
        $('#orgTypeModal').removeClass('hidden');
    }

    function closeTypeModal() {
        $('#orgTypeModal').addClass('hidden');
    }

    $('.closeTypeModal').click(function() {
        closeTypeModal();
    });

    function updateCSRF(hash) {
        if(hash) {
            $('#orgTypeForm input[type="hidden"]').first().val(hash);
        }
    }

    $('#btnAddNewType').click(function() {
        let csrfInput = $('#orgTypeForm input[type="hidden"]').first();
        let csrfName = csrfInput.attr('name');
        let csrfVal = csrfInput.val();

        $('#orgTypeForm')[0].reset();
        csrfInput.attr('name', csrfName).val(csrfVal);

        $('#type_id').val('');
        $('#is_ugc_id_required').prop('checked', false);
        $('#type_isactive').prop('checked', true);
        $('#typeIsActiveContainer').hide();
        $('#typeModalTitle').html('<i class="fa-solid fa-layer-group text-[#e58500]"></i> Add Organization Type');
        openTypeModal();
    });

    attachTypeEventListeners();

    // AJAX Form Submit
    $('#orgTypeForm').submit(function(e) {
        e.preventDefault();
        $('#saveTypeBtn').prop('disabled', true).text('Saving...');
        let formData = $(this).serialize();
        if ($('#type_id').val() === '' && !formData.includes('isactive')) {
            formData += '&isactive=1';
        }

        $.ajax({
            url: "<?= base_url('dashboard/save-org-type') ?>",
            type: "POST",
            data: formData,
            dataType: "json",
            success: function(res) {
                if(res.csrfHash) updateCSRF(res.csrfHash);

                if(res.success) {
                    closeTypeModal();
                    loadOrgTypes();
                    showToast('success', res.message || 'Organization type saved successfully!');
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
                $('#saveTypeBtn').prop('disabled', false).text('Save Changes');
            }
        });
    });

    function loadOrgTypes() {
        $.ajax({
            url: "<?= base_url('dashboard/get-org-types') ?>",
            type: "GET",
            dataType: "json",
            success: function(res) {
                if(res.success) {
                    renderOrgTypesTable(res.orgTypes);
                }
            },
            error: function() {
                showToast('error', 'Error loading organization types data.');
            }
        });
    }

    function renderOrgTypesTable(orgTypes) {
        if ($.fn.DataTable.isDataTable('#orgTypeTable')) {
            $('#orgTypeTable').DataTable().destroy();
        }

        let tbody = $('#orgTypeTable tbody');
        tbody.empty();

        if(!orgTypes || orgTypes.length === 0) {
            tbody.html('<tr><td colspan="6" class="text-center py-12"><i class="fa-solid fa-layer-group text-slate-300 text-5xl mb-3 block"></i><p class="text-slate-500 font-medium">No organization type records found.</p></td></tr>');
        } else {
            orgTypes.forEach(function(type, index) {
                let row = '<tr class="hover:bg-slate-50/80 transition-colors duration-150">' +
                    '<td class="px-5 py-4 text-left font-bold text-[#1e4d7b]">#' + String(index + 1).padStart(3, '0') + '</td>' +
                    '<td class="px-5 py-4 font-bold text-slate-800">' + type.name + '</td>' +
                    '<td class="px-5 py-4 text-slate-600">' + (type['competent_authority'] ? type['competent_authority'] : '<span class="text-slate-400 italic">N/A</span>') + '</td>' +
                    '<td class="px-5 py-4 text-left">' +
                        (type.is_ugc_id_required == 1 ? 
                            '<span class="inline-flex items-center gap-1 px-3 py-1 rounded-full text-xs font-semibold bg-amber-50 text-amber-700 border border-amber-200"><i class="fas fa-check text-[10px]"></i> Yes</span>' : 
                            '<span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-slate-100 text-slate-600 border border-slate-200">No</span>') +
                    '</td>' +
                    '<td class="px-5 py-4 text-left">' +
                        (type.isactive == 1 ? 
                            '<span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-lg border-l-4 border-green-500 bg-green-50 text-green-700 font-semibold text-xs shadow-sm"><i class="fas fa-check-circle"></i> Active</span>' : 
                            '<span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-lg border-l-4 border-red-500 bg-red-50 text-red-700 font-semibold text-xs shadow-sm"><i class="fas fa-times-circle"></i> Inactive</span>') +
                    '</td>' +
                    '<td class="px-5 py-4 text-right pr-6">' +
                        '<div class="flex justify-end gap-2">' +
                            '<button class="w-8 h-8 rounded-lg bg-blue-50 text-[#1e4d7b] hover:bg-blue-100 border border-blue-100 transition edit-type-btn flex items-center justify-center" data-id="' + type.id + '" title="Edit"><i class="fas fa-pen-to-square text-xs"></i></button>' +
                            '<button class="w-8 h-8 rounded-lg bg-red-50 text-red-600 hover:bg-red-100 border border-red-100 transition delete-type-btn flex items-center justify-center" data-id="' + type.id + '" title="Delete"><i class="fas fa-trash-can text-xs"></i></button>' +
                        '</div>' +
                    '</td>' +
                    '</tr>';
                tbody.append(row);
            });
        }

        initDataTable();
        attachTypeEventListeners();
    }

    function attachTypeEventListeners() {
        $('.edit-type-btn').off('click').on('click', function() {
            let id = $(this).data('id');
            $.ajax({
                url: "<?= base_url('dashboard/get-org-type/') ?>" + id,
                type: "GET",
                dataType: "json",
                success: function(res) {
                    if(res.csrfHash) updateCSRF(res.csrfHash);
                    if(res.success) {
                        $('#type_id').val(res.data.id);
                        $('#type_name').val(res.data.name);
                        $('#competent_authority').val(res.data['competent_authority']);
                        $('#is_ugc_id_required').prop('checked', res.data.is_ugc_id_required == 1);
                        $('#type_isactive').prop('checked', res.data.isactive == 1);
                        $('#typeIsActiveContainer').show();
                        $('#typeModalTitle').html('<i class="fa-solid fa-layer-group text-[#e58500]"></i> Edit Organization Type');
                        openTypeModal();
                    } else {
                        showToast('error', res.message || 'Unable to fetch record.');
                    }
                },
                error: function() {
                    showToast('error', 'Error fetching organization type data.');
                }
            });
        });

        $('.delete-type-btn').off('click').on('click', function() {
            if(!confirm('Are you sure you want to delete this record?')) return;
            let id = $(this).data('id');

            let csrfInput = $('#orgTypeForm input[type="hidden"]').first();
            let dataParam = {};
            dataParam[csrfInput.attr('name')] = csrfInput.val();

            $.ajax({
                url: "<?= base_url('dashboard/delete-org-type/') ?>" + id,
                type: "POST",
                data: dataParam,
                dataType: "json",
                success: function(res) {
                    if(res.csrfHash) updateCSRF(res.csrfHash);
                    if(res.success) {
                        loadOrgTypes();
                        showToast('success', res.message || 'Organization type deleted successfully!');
                    } else {
                        showToast('error', res.message || 'Unable to delete record.');
                    }
                },
                error: function() {
                    showToast('error', 'Error deleting organization type.');
                }
            });
        });
    }
});
</script>