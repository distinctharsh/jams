<!-- Manage Users Page -->
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
/* Custom Buttons Styling */
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

/* Custom Stylish Multi-Select Box */
.select2-results__option {
    padding: 8px 12px !important;
    display: flex !important;
    align-items: center !important;
}
.select2-results__option .select2-checkbox {
    margin-right: 10px !important;
    width: 16px !important;
    height: 16px !important;
    accent-color: #1e4d7b !important;
    cursor: pointer !important;
    pointer-events: none;
}
.select2-container--default .select2-results__option--highlighted[aria-selected="true"] {
    background-color: #1e4d7b !important;
    color: #ffffff !important;
}
.select2-container--default .select2-results__option--highlighted[aria-selected="false"] {
    background-color: #f1f5f9 !important;
    color: #0f172a !important;
}


</style>

<div class="space-y-6">
    <div class="gov-card p-6">
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
            <div class="flex items-center gap-3">
                <div class="w-12 h-12 rounded-xl bg-amber-50 border border-amber-200 flex items-center justify-center shrink-0">
                   <i class="fa-solid fa-users text-[#e58500] text-xl"></i>
                </div>
                <div>
                    <h2 class="text-xl font-bold text-[#1e4d7b]">User Management</h2>
                    <p class="text-xs text-slate-500 mt-0.5">Overview and setup of system user accounts.</p>
                </div>
            </div>
            <button id="btnAddNewUser" class="px-4 py-2.5 bg-[#1e4d7b] hover:bg-[#163a5d] text-white font-semibold text-sm rounded-lg transition flex items-center justify-center gap-2 shadow-sm shrink-0">
                <i class="fas fa-plus text-xs"></i> Add User
            </button>
        </div>
    </div>

    <!-- Data Table Card -->
    <div class="gov-card p-5 overflow-hidden shadow-sm border border-slate-200 rounded-xl bg-white">
        <div class="overflow-x-auto">
            <table class="w-full text-sm gov-table rounded-lg overflow-hidden" id="userTable">
                <thead class="bg-[#1e4d7b] text-white">
                    <tr>
                        <th class="px-5 py-3.5 text-left w-8 font-semibold uppercase tracking-wider text-xs">S.No.</th>
                        <th class="px-5 py-3.5 text-left font-semibold uppercase tracking-wider text-xs">Full Name</th>
                        <th class="px-5 py-3.5 text-left font-semibold uppercase tracking-wider text-xs">Email</th>
                        <th class="px-5 py-3.5 text-left font-semibold uppercase tracking-wider text-xs">Mobile No</th>
                        <th class="px-5 py-3.5 text-left font-semibold uppercase tracking-wider text-xs">Designation</th>
                        <th class="px-5 py-3.5 text-left font-semibold uppercase tracking-wider text-xs">Role</th>
                        <th class="px-5 py-3.5 text-left font-semibold uppercase tracking-wider text-xs">Org Type</th>
                        <th class="px-5 py-3.5 text-left font-semibold uppercase tracking-wider text-xs">Organization</th>
                        <th class="px-5 py-3.5 text-left font-semibold uppercase tracking-wider text-xs">UGC ID</th>
                        <th class="px-5 py-3.5 text-left font-semibold uppercase tracking-wider text-xs">Auth Letter</th>
                        <th class="px-5 py-3.5 text-left font-semibold uppercase tracking-wider text-xs">Status</th>
                        <th class="px-5 py-3.5 text-left pr-6 font-semibold uppercase tracking-wider text-xs">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100 bg-white text-slate-700">
                    <?php if(!empty($users)): ?>
                        <?php foreach($users as $index => $user): ?>
                            <tr class="hover:bg-slate-50/80 transition-colors duration-150">
                                <td class="px-5 py-4 text-left font-bold text-[#1e4d7b]">
                                    <?= $index + 1 ?>
                                </td>
                                <td class="px-5 py-4 font-bold text-slate-800">
                                    <?= esc($user['name']) ?>
                                </td>
                                <td class="px-5 py-4 text-slate-600 font-medium">
                                    <?= esc($user['email']) ?>
                                </td>
                                <td class="px-5 py-4 text-slate-600 font-medium">
                                    <?= esc($user['mobile_no'] ?? 'N/A') ?>
                                </td>
                                <td class="px-5 py-4 text-slate-600 font-medium">
                                    <?= esc($user['designation_name'] ?? $user['designation'] ?? 'N/A') ?>
                                </td>
                                <td class="px-5 py-4 text-slate-600 font-medium">
                                    <?= esc($user['role_name'] ?? $user['role'] ?? 'N/A') ?>
                                </td>
                                <td class="px-5 py-4 text-slate-600 font-medium">
                                    <?= esc($user['org_type_name'] ?? 'N/A') ?>
                                </td>
                                <td class="px-5 py-4 text-slate-600 font-medium">
                                    <?= esc($user['org_name'] ?? 'N/A') ?>
                                </td>
                                <td class="px-5 py-4">
                                    <span class="inline-flex items-center px-2.5 py-1 rounded-md text-xs font-semibold bg-amber-50 text-[#e58500] border border-amber-200">
                                        <?= esc($user['ugc_id'] ?? 'N/A') ?>
                                    </span>
                                </td>
                                <td class="px-5 py-4 text-left">
                                    <?php if(!empty($user['authorization_letter'])): ?>
                                        <a href="<?= base_url('uploads/authorization/'.$user['authorization_letter']) ?>" target="_blank" class="inline-flex items-center justify-center w-8 h-8 rounded-lg bg-slate-100 hover:bg-slate-200 text-[#1e4d7b] transition shadow-sm" title="View Authorization letter">
                                            <i class="fas fa-file-pdf text-red-500"></i>
                                        </a>
                                    <?php else: ?>
                                        <span class="text-xs text-slate-400">None</span>
                                    <?php endif; ?>
                                </td>
                                <td class="px-5 py-4 text-left">
                                    <?php if ($user['isactive'] == 1 || $user['isactive'] == '1'): ?>
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
                                        <button class="w-8 h-8 rounded-lg bg-blue-50 text-[#1e4d7b] hover:bg-blue-100 border border-blue-100 transition edit-user-btn flex items-center justify-center" data-id="<?= $user['id'] ?>" title="Edit">
                                            <i class="fas fa-pen-to-square text-xs"></i>
                                        </button>
                                        <button class="w-8 h-8 rounded-lg bg-red-50 text-red-600 hover:bg-red-100 border border-red-100 transition delete-user-btn flex items-center justify-center" data-id="<?= $user['id'] ?>" title="Delete">
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

<!-- User Modal Dialog -->
<div id="userModal" class="fixed inset-0 bg-slate-900/50 backdrop-blur-sm z-50 hidden flex items-center justify-center p-4 transition-opacity">
    <div class="bg-white rounded-2xl shadow-xl w-full max-w-2xl overflow-hidden transform transition-all">
        
        <!-- Modal Header -->
        <div class="px-6 py-4 bg-slate-50 border-b border-slate-200 flex items-center justify-between">
            <h3 class="text-base font-bold text-[#1e4d7b] flex items-center gap-2" id="userModalTitle">
                <i class="fa-solid fa-user-plus text-[#e58500]"></i> Add User
            </h3>
            <button type="button" class="closeUserModal text-slate-400 hover:text-slate-600 w-8 h-8 rounded-lg flex items-center justify-center hover:bg-slate-200 transition">
                <i class="fas fa-times"></i>
            </button>
        </div>

        <!-- Form Body -->
        <form id="userForm" enctype="multipart/form-data">
            <?= csrf_field() ?>
            <input type="hidden" name="id" id="user_id">

            <div class="p-6 grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block text-xs font-bold text-slate-600 uppercase tracking-wider mb-1.5">
                        Full Name <span class="text-red-500">*</span>
                    </label>
                    <input type="text" name="name" id="user_name" class="w-full px-3.5 py-2.5 text-sm bg-slate-50 border border-slate-300 rounded-lg focus:ring-2 focus:ring-[#1e4d7b] focus:border-[#1e4d7b] focus:bg-white outline-none transition" placeholder="e.g. Rahul Sharma" required>
                </div>

                <div>
                    <label class="block text-xs font-bold text-slate-600 uppercase tracking-wider mb-1.5">
                        Email Address <span class="text-red-500">*</span>
                    </label>
                    <input type="email" name="email" id="user_email" class="w-full px-3.5 py-2.5 text-sm bg-slate-50 border border-slate-300 rounded-lg focus:ring-2 focus:ring-[#1e4d7b] focus:border-[#1e4d7b] focus:bg-white outline-none transition" placeholder="e.g. rahul@gov.in" required>
                </div>

                <div>
                    <label class="block text-xs font-bold text-slate-600 uppercase tracking-wider mb-1.5">
                        Mobile No
                    </label>
                    <input type="text" name="mobile_no" id="user_mobile_no" maxlength="15" class="w-full px-3.5 py-2.5 text-sm bg-slate-50 border border-slate-300 rounded-lg focus:ring-2 focus:ring-[#1e4d7b] focus:border-[#1e4d7b] focus:bg-white outline-none transition" placeholder="e.g. 9876543210">
                </div>

                <div>
                    <label class="block text-xs font-bold text-slate-600 uppercase tracking-wider mb-1.5">
                        Designation <span class="text-red-500">*</span>
                    </label>
                    <input type="text" name="designation" id="user_designation" class="w-full px-3.5 py-2.5 text-sm bg-slate-50 border border-slate-300 rounded-lg focus:ring-2 focus:ring-[#1e4d7b] focus:border-[#1e4d7b] focus:bg-white outline-none transition" placeholder="e.g. Under Secretary" required>
                </div>

                <div>
                    <div class="flex items-center justify-between mb-1.5">
                        <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider">
                            Roles <span class="text-red-500">*</span>
                        </label>
                    </div>
                    <div class="relative">
                        <select id="user_role_id" name="role_ids[]" multiple required class="custom-multiselect w-full px-2 py-1.5 bg-slate-50 border border-slate-300 rounded-lg text-sm text-slate-700">
                            <?php if(!empty($roles)): ?>
                                <?php foreach($roles as $role): ?>
                                    <option value="<?= $role['id'] ?>"><?= esc($role['name']) ?> (<?= esc($role['code']) ?>)</option>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </select>
                    </div>
                </div>

                <div>
                    <label class="block text-xs font-bold text-slate-600 uppercase tracking-wider mb-1.5">
                        Organization
                    </label>
                    <select name="organization_id" id="user_organization_id" class="w-full px-3.5 py-2.5 text-sm bg-slate-50 border border-slate-300 rounded-lg focus:ring-2 focus:ring-[#1e4d7b] focus:border-[#1e4d7b] focus:bg-white outline-none transition">
                        <option value="">Select Organization</option>
                        <?php if(!empty($organizations)): ?>
                            <?php foreach($organizations as $org): ?>
                                <option value="<?= $org['id'] ?>" data-org-type="<?= esc($org['org_type_id'] ?? $org['org_type'] ?? '') ?>">
                                    <?= esc($org['org_name']) ?>
                                </option>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </select>
                </div>

                <div>
                    <label class="block text-xs font-bold text-slate-600 uppercase tracking-wider mb-1.5">
                        Org Type
                    </label>
                    <select name="org_type" id="user_org_type" class="w-full px-3.5 py-2.5 text-sm bg-slate-50 border border-slate-300 rounded-lg focus:ring-2 focus:ring-[#1e4d7b] focus:border-[#1e4d7b] focus:bg-white outline-none transition">
                        <option value="">Select Org Type</option>
                        <?php if(!empty($orgTypes)): ?>
                            <?php foreach($orgTypes as $type): ?>
                                <option value="<?= $type['id'] ?>" data-type-id="<?= $type['id'] ?>" data-ugc-required="<?= esc($type['is_ugc_id_required'] ?? $type['is_ugc_required'] ?? '0') ?>">
                                    <?= esc($type['name']) ?>
                                </option>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </select>
                </div>

                <div id="user_ugc_container" style="display: none;">
                    <label class="block text-xs font-bold text-slate-600 uppercase tracking-wider mb-1.5">
                        UGC ID <span class="text-red-500" id="ugc_star">*</span>
                    </label>
                    <input type="text" name="ugc_id" id="user_ugc_id" class="w-full px-3.5 py-2.5 text-sm bg-slate-50 border border-slate-300 rounded-lg focus:ring-2 focus:ring-[#1e4d7b] focus:border-[#1e4d7b] focus:bg-white outline-none transition" placeholder="e.g. UGC-ADM-001">
                </div>

                <div>
                    <label class="block text-xs font-bold text-slate-600 uppercase tracking-wider mb-1.5">
                        Authorization Letter
                    </label>
                    <input type="file" name="authorization_letter" id="user_authorization_letter" class="w-full text-xs text-slate-500 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-xs file:font-semibold file:bg-blue-50 file:text-[#1e4d7b] hover:file:bg-blue-100">
                </div>

                <div class="col-span-1 md:col-span-2 p-4 bg-slate-50 border border-slate-200 rounded-xl" id="userIsActiveContainer" style="display: none;">
                    <label class="flex items-center justify-between cursor-pointer">
                        <span class="text-sm font-semibold text-slate-700">Is Active</span>
                        <input type="checkbox" name="isactive" id="user_isactive" value="1" checked class="w-4 h-4 text-[#1e4d7b] rounded border-slate-300 focus:ring-[#1e4d7b]">
                    </label>
                </div>
            </div>

            <!-- Modal Footer -->
            <div class="px-6 py-3.5 bg-slate-50 border-t border-slate-200 flex justify-end gap-3">
                <button type="button" class="closeUserModal px-4 py-2 bg-slate-100 hover:bg-slate-200 text-slate-700 text-sm font-medium rounded-lg border border-slate-300 transition">
                    Cancel
                </button>
                <button type="submit" id="saveUserBtn" class="px-5 py-2 bg-[#1e4d7b] hover:bg-[#163a5d] text-white text-sm font-semibold rounded-lg transition shadow-sm">
                    Save Changes
                </button>
            </div>
        </form>
    </div>
</div>

<script>
$(document).ready(function() {
    let userDataTable = null;

    function initDataTable() {
        if ($.fn && $.fn.DataTable) {
            if ($.fn.DataTable.isDataTable('#userTable')) {
                $('#userTable').DataTable().destroy();
            }

            userDataTable = $('#userTable').DataTable({
                "pageLength": 10,
                "lengthMenu": [ [10, 15, 25, 50, 100, -1], [10, 15, 25, 50, 100, "All"] ],
                "responsive": true,
                "autoWidth": false,
                "dom": '<"flex flex-col sm:flex-row sm:items-center justify-between gap-4 mb-3"<"flex items-center gap-4"Bl>f>rt<"flex flex-col sm:flex-row sm:items-center justify-between gap-4 mt-4"ip>',
                "columnDefs": [
                    { "orderable": false, "targets": [9, 11] }
                ],
                "buttons": [
                    {
                        extend: 'copy',
                        text: '<i class="fas fa-copy me-1"></i> Copy',
                        title: 'Users',
                        exportOptions: { columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 10] }
                    },
                    {
                        extend: 'csv',
                        text: '<i class="fas fa-file-csv me-1"></i> CSV',
                        title: 'Users',
                        filename: 'Users',
                        exportOptions: { columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 10] }
                    },
                    {
                        extend: 'excel',
                        text: '<i class="fas fa-file-excel me-1"></i> Excel',
                        title: 'Users',
                        filename: 'Users',
                        exportOptions: { columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 10] }
                    },
                    {
                        extend: 'pdf',
                        text: '<i class="fas fa-file-pdf me-1"></i> PDF',
                        title: 'Users',
                        filename: 'Users',
                        exportOptions: { columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 10] }
                    },
                    {
                        extend: 'print',
                        text: '<i class="fas fa-print me-1"></i> Print',
                        title: 'Users',
                        exportOptions: { columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 10] }
                    }
                ],
                "language": {
                    "search": "_INPUT_",
                    "searchPlaceholder": "Search users...",
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

    function initRoleSelect2() {
        const $role = $('#user_role_id');

        if (!$role.length || typeof $.fn.select2 === 'undefined') return;

        if ($role.hasClass('select2-hidden-accessible')) {
            $role.select2('destroy');
        }

        function formatOption(state) {
            if (!state.id) return state.text;
            
            var isSelected = $(state.element).prop('selected');
            var $element = $(
                '<span><input type="checkbox" class="select2-checkbox" ' + (isSelected ? 'checked="checked"' : '') + ' /> ' + state.text + '</span>'
            );
            return $element;
        }

        $role.select2({
            width: '100%',
            closeOnSelect: false,
            dropdownParent: $('#userModal'),
            placeholder: 'Select Roles',
            allowClear: true,
            templateResult: formatOption
        });
    }

    initRoleSelect2();

    function openUserModal() { $('#userModal').removeClass('hidden'); }
    function closeUserModal() { $('#userModal').addClass('hidden'); }

    $('.closeUserModal').click(function() { closeUserModal(); });
    $('#user_organization_id').change(function() {
        let selectedOrgType = $(this).find(':selected').data('org-type');
        
        if (selectedOrgType) {
            $('#user_org_type').val(selectedOrgType).trigger('change');
        } else {
            $('#user_org_type').val('').trigger('change');
        }
    });

    $('#user_org_type').change(function() {
        let isUgcRequired = $(this).find(':selected').data('ugc-required');

        if (parseInt(isUgcRequired) === 1) {
            $('#user_ugc_container').slideDown(200);
            $('#user_ugc_id').prop('required', true);
        } else {
            $('#user_ugc_container').slideUp(200);
            $('#user_ugc_id').prop('required', false).val('');
        }
    });

    function updateCSRF(hash) {
        if(hash) { $('#userForm input[type="hidden"]').first().val(hash); }
    }

    $('#btnAddNewUser').click(function() {
        let csrfInput = $('#userForm input[type="hidden"]').first();
        let csrfName = csrfInput.attr('name');
        let csrfVal = csrfInput.val();

        $('#userForm')[0].reset();
        csrfInput.attr('name', csrfName).val(csrfVal);

        $('#user_id').val('');
        $('#user_designation').val('');
        $('#user_role_id').val(null).trigger('change');
        $('#user_isactive').prop('checked', true);
        $('#userIsActiveContainer').hide();
        $('#user_org_type').val('').trigger('change');
        $('#user_organization_id').val('').trigger('change');
        $('#userModalTitle').html('<i class="fa-solid fa-user-plus text-[#e58500]"></i> Add User');
        openUserModal();
    });

    attachUserEventListeners();

    // AJAX Form Submit
    $('#userForm').submit(function(e) {
        e.preventDefault();
        $('#saveUserBtn').prop('disabled', true).text('Saving...');
        
        let formData = new FormData(this);

        if ($('#user_id').val() !== '') {
            formData.set('isactive', $('#user_isactive').is(':checked') ? '1' : '0');
        } else {
            formData.set('isactive', '1');
        }

        $.ajax({
            url: "<?= base_url('dashboard/save-user') ?>",
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            dataType: "json",
            success: function(res) {
                if(res.csrfHash) updateCSRF(res.csrfHash);

                if(res.success) {
                    closeUserModal();
                    loadUsers();
                    if(typeof showToast === 'function') showToast('success', res.message || 'User saved successfully!');
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
                $('#saveUserBtn').prop('disabled', false).text('Save Changes');
            }
        });
    });

    function loadUsers() {
        $.ajax({
            url: "<?= base_url('dashboard/get-users') ?>",
            type: "GET",
            dataType: "json",
            success: function(res) {
                if(res.csrfHash) updateCSRF(res.csrfHash);
                if(res.success) {
                    renderUsersTable(res.users);
                }
            },
            error: function() {
                if(typeof showToast === 'function') showToast('error', 'Error loading user data.');
            }
        });
    }

    function renderUsersTable(users) {
        if ($.fn.DataTable.isDataTable('#userTable')) {
            $('#userTable').DataTable().destroy();
        }

        let tbody = $('#userTable tbody');
        tbody.empty();

        if(!users || users.length === 0) {
            tbody.html('<tr><td colspan="12" class="text-center py-12"><i class="fa-solid fa-users text-slate-300 text-5xl mb-3 block"></i><p class="text-slate-500 font-medium">No user records found.</p></td></tr>');
        } else {
            users.forEach(function(user, index) {
                let isActive = (user.isactive == 1 || user.isactive == '1');
                let authDoc = user.authorization_letter ? 
                    '<a href="<?= base_url('uploads/authorization/') ?>' + user.authorization_letter + '" target="_blank" class="inline-flex items-center gap-1 text-xs text-[#1e4d7b] hover:underline font-semibold"><i class="fas fa-file-pdf text-red-500"></i></a>' : 
                    '<span class="text-xs text-slate-400">None</span>';

                let row = '<tr class="hover:bg-slate-50/80 transition-colors duration-150">' +
                    '<td class="px-5 py-4 text-left font-bold text-[#1e4d7b]">' + (index + 1) + '</td>' +
                    '<td class="px-5 py-4 font-bold text-slate-800">' + (user.name ? user.name : '') + '</td>' +
                    '<td class="px-5 py-4 text-slate-600 font-medium">' + (user.email ? user.email : '') + '</td>' +
                    '<td class="px-5 py-4 text-slate-600 font-medium">' + (user.mobile_no ? user.mobile_no : 'N/A') + '</td>' +
                    '<td class="px-5 py-4 text-slate-600 font-medium">' + (user.designation ? user.designation : 'N/A') + '</td>' +
                    '<td class="px-5 py-4 text-slate-600 font-medium">' + (user.role_name ? user.role_name : (user.role ? user.role : 'N/A')) + '</td>' +
                    '<td class="px-5 py-4 text-slate-600 font-medium">' + (user.org_type_name ? user.org_type_name : 'N/A') + '</td>' +
                    '<td class="px-5 py-4 text-slate-600 font-medium">' + (user.org_name ? user.org_name : 'N/A') + '</td>' +
                    '<td class="px-5 py-4"><span class="inline-flex items-center px-2.5 py-1 rounded-md text-xs font-semibold bg-amber-50 text-[#e58500] border border-amber-200">' + (user.ugc_id ? user.ugc_id : 'N/A') + '</span></td>' +
                    '<td class="px-5 py-4 text-left">' + authDoc + '</td>' +
                    '<td class="px-5 py-4 text-left">' +
                        (isActive ? 
                            '<span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-lg border-l-4 border-green-500 bg-green-50 text-green-700 font-semibold text-xs shadow-sm"><i class="fas fa-check-circle"></i> Active</span>' : 
                            '<span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-lg border-l-4 border-red-500 bg-red-50 text-red-700 font-semibold text-xs shadow-sm"><i class="fas fa-times-circle"></i> Inactive</span>') +
                    '</td>' +
                    '<td class="px-5 py-4 text-right pr-6">' +
                        '<div class="flex justify-start gap-2">' +
                            '<button class="w-8 h-8 rounded-lg bg-blue-50 text-[#1e4d7b] hover:bg-blue-100 border border-blue-100 transition edit-user-btn flex items-center justify-center" data-id="' + user.id + '" title="Edit"><i class="fas fa-pen-to-square text-xs"></i></button>' +
                            '<button class="w-8 h-8 rounded-lg bg-red-50 text-red-600 hover:bg-red-100 border border-red-100 transition delete-user-btn flex items-center justify-center" data-id="' + user.id + '" title="Delete"><i class="fas fa-trash-can text-xs"></i></button>' +
                        '</div>' +
                    '</td>' +
                    '</tr>';
                tbody.append(row);
            });
        }

        initDataTable();
        attachUserEventListeners();
    }

    function attachUserEventListeners() {
        $(document).on('click', '.edit-user-btn', function(e) {
            e.preventDefault();
            let id = $(this).data('id');
            $.ajax({
                url: "<?= base_url('dashboard/get-user/') ?>" + id,
                type: "GET",
                dataType: "json",
                success: function(res) {
                    if(res.csrfHash) updateCSRF(res.csrfHash);
                    if(res.success) {
                        let user = res.data;
                        $('#user_id').val(user.id);
                        $('#user_name').val(user.name);
                        $('#user_email').val(user.email);
                        $('#user_mobile_no').val(user.mobile_no || '');
                        $('#user_designation').val(user.designation || '');
                        let rolesToSelect = [];
                        if (Array.isArray(user.role_ids)) {
                            rolesToSelect = user.role_ids.map(String);
                        } else if (typeof user.role_ids === 'string') {
                            rolesToSelect = user.role_ids.split(',').map(s => s.trim());
                        } else if (user.role_id) {
                            rolesToSelect = [user.role_id.toString()];
                        }
                        $('#user_role_id').val(rolesToSelect).trigger('change');

                        if (user.organization_id) {
                            $('#user_organization_id').val(user.organization_id.toString());
                        } else {
                            $('#user_organization_id').val('');
                        }

                        if (user.org_type) {
                            $('#user_org_type').val(user.org_type.toString());
                            let $selectedOpt = $('#user_org_type option:selected');
                            let isUgcRequired = $selectedOpt.data('ugc-required');
                            if (parseInt(isUgcRequired) === 1) {
                                $('#user_ugc_container').show();
                                $('#user_ugc_id').prop('required', true).val(user.ugc_id || '');
                            } else {
                                $('#user_ugc_container').hide();
                                $('#user_ugc_id').prop('required', false).val('');
                            }
                        } else {
                            $('#user_org_type').val('');
                            $('#user_ugc_container').hide();
                            $('#user_ugc_id').prop('required', false).val('');
                        }

                        $('#user_isactive').prop('checked', user.isactive == 1 || user.isactive == '1');
                        $('#userIsActiveContainer').show();
                        $('#userModalTitle').html('<i class="fa-solid fa-user-pen text-[#e58500]"></i> Edit User');                  
                        openUserModal();
                    } else {
                        if(typeof showToast === 'function') showToast('error', res.message || 'Unable to fetch record.');
                    }
                },
                error: function(xhr, status, error) {
                    console.error("AJAX Error: ", error);
                    if(typeof showToast === 'function') showToast('error', 'Error fetching user data.');
                }
            });
        });

        $(document).on('click', '.delete-user-btn', function(e) {
            e.preventDefault();
            if(!confirm('Are you sure you want to deactivate this user?')) return;
            let id = $(this).data('id');

            let csrfInput = $('#userForm input[type="hidden"]').first();
            let dataParam = {};
            dataParam[csrfInput.attr('name')] = csrfInput.val();

            $.ajax({
                url: "<?= base_url('dashboard/delete-user/') ?>" + id,
                type: "POST",
                data: dataParam,
                dataType: "json",
                success: function(res) {
                    if(res.csrfHash) updateCSRF(res.csrfHash);
                    if(res.success) {
                        loadUsers();
                        if(typeof showToast === 'function') showToast('success', res.message || 'User deactivated successfully!');
                    } else {
                        if(typeof showToast === 'function') showToast('error', res.message || 'Unable to delete record.');
                    }
                },
                error: function() {
                    if(typeof showToast === 'function') showToast('error', 'Error deleting user.');
                }
            });
        });
    }
});
</script>