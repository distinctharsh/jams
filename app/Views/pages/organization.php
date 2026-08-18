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
    <div class="gov-card overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-sm gov-table" id="orgTable">
                <thead class="bg-[#1e4d7b] text-white">
                    <tr>
                        <th class="px-5 py-4 text-center w-16">#</th>
                        <th class="px-5 py-4 text-left">Organization Name</th>
                        <th class="px-5 py-4 text-left">Type</th>
                        <th class="px-5 py-4 text-center">Auth Letter Req.</th>
                        <th class="px-5 py-4 text-center">Status</th>
                        <th class="px-5 py-4 text-right pr-6">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100 bg-white">
                    <?php if(!empty($organizations)): ?>
                        <?php foreach($organizations as $index => $org): ?>
                            <tr class="hover:bg-slate-50 transition">
                                <td class="px-5 py-4 text-center font-bold text-[#1e4d7b]">
                                    #<?= str_pad($index + 1, 3, '0', STR_PAD_LEFT) ?>
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
                                    <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold bg-blue-50 text-[#1e4d7b] border border-blue-200">
                                        Type <?= esc($org['org_type']) ?>
                                    </span>
                                </td>
                                <td class="px-5 py-4 text-center">
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
                                <td class="px-5 py-4 text-center">
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
                                <td class="px-5 py-4 text-right pr-6">
                                    <div class="flex justify-end gap-2">
                                        <button class="w-9 h-9 rounded-lg bg-blue-50 text-[#1e4d7b] hover:bg-blue-100 transition edit-btn" data-id="<?= $org['id'] ?>" title="Edit">
                                            <i class="fas fa-pen-to-square"></i>
                                        </button>
                                        <button class="w-9 h-9 rounded-lg bg-red-50 text-red-600 hover:bg-red-100 transition delete-btn" data-id="<?= $org['id'] ?>" title="Delete">
                                            <i class="fas fa-trash-can"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="6" class="text-center py-12">
                                <i class="fa-solid fa-sitemap text-slate-300 text-5xl mb-3 block"></i>
                                <p class="text-slate-500 font-medium">No organization records found.</p>
                            </td>
                        </tr>
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
            <input type="hidden" name="csrf_token" value="<?= csrf_hash() ?>">
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
                        <option value="1">Statutory Body</option>
                        <option value="2">Autonomous Body</option>
                        <option value="3">UGC</option>
                        <option value="4">Other</option>
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

<!-- Scripts -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
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
            $('input[name="csrf_token"]').val(hash);
        }
    }

    $('#btnAddNew').click(function() {
        $('#orgForm')[0].reset();
        $('#org_id').val('');
        $('#auth_req').prop('checked', true);
        $('#isactive').prop('checked', true);
        $('#isActiveContainer').hide();
        $('#modalTitle').html('<i class="fa-solid fa-sitemap text-[#e58500]"></i> Add Organization');
        openModal();
    });

    // Initial attachment of event listeners
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
                    alert(res.message);
                } else if(res.errors) {
                    alert(Object.values(res.errors).join("\n"));
                } else {
                    alert(res.message || 'Something went wrong.');
                }
            },
            error: function() {
                alert('An error occurred while saving.');
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
            success: function(res) {
                if(res.success) {
                    renderOrganizationsTable(res.organizations);
                }
            },
            error: function() {
                alert('Error loading organizations data');
            }
        });
    }
    
    // Function to render the table
    function renderOrganizationsTable(organizations) {
        let tbody = $('#orgTable tbody');
        tbody.empty();
        
        if(organizations.length === 0) {
            tbody.html('<tr><td colspan="6" class="text-center py-12"><i class="fa-solid fa-sitemap text-slate-300 text-5xl mb-3 block"></i><p class="text-slate-500 font-medium">No organization records found.</p></td></tr>');
            return;
        }
        
        organizations.forEach(function(org, index) {
            let row = '<tr class="hover:bg-slate-50 transition">' +
                '<td class="px-5 py-4 text-center font-bold text-[#1e4d7b]">#' + String(index + 1).padStart(3, '0') + '</td>' +
                '<td class="px-5 py-4">' +
                    '<div class="font-bold text-slate-800">' + org.org_name + '</div>' +
                    (org.org_description ? '<div class="text-xs text-slate-500 truncate max-w-xs mt-0.5" title="' + org.org_description + '">' + org.org_description + '</div>' : '') +
                '</td>' +
                '<td class="px-5 py-4">' +
                    '<span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold bg-blue-50 text-[#1e4d7b] border border-blue-200">Type ' + org.org_type + '</span>' +
                '</td>' +
                '<td class="px-5 py-4 text-center">' +
                    (org.authorization_letter_required ? 
                        '<span class="inline-flex items-center gap-1 px-3 py-1 rounded-full text-xs font-semibold bg-amber-50 text-amber-700 border border-amber-200"><i class="fas fa-exclamation-circle text-[10px]"></i> Yes</span>' : 
                        '<span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-slate-100 text-slate-600 border border-slate-200">No</span>') +
                '</td>' +
                '<td class="px-5 py-4 text-center">' +
                    (org.isactive ? 
                        '<span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-lg border-l-4 border-green-500 bg-green-50 text-green-700 font-semibold text-xs shadow-sm"><i class="fas fa-check-circle"></i> Active</span>' : 
                        '<span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-lg border-l-4 border-red-500 bg-red-50 text-red-700 font-semibold text-xs shadow-sm"><i class="fas fa-times-circle"></i> Inactive</span>') +
                '</td>' +
                '<td class="px-5 py-4 text-right pr-6">' +
                    '<div class="flex justify-end gap-2">' +
                        '<button class="w-9 h-9 rounded-lg bg-blue-50 text-[#1e4d7b] hover:bg-blue-100 transition edit-btn" data-id="' + org.id + '" title="Edit"><i class="fas fa-pen-to-square"></i></button>' +
                        '<button class="w-9 h-9 rounded-lg bg-red-50 text-red-600 hover:bg-red-100 transition delete-btn" data-id="' + org.id + '" title="Delete"><i class="fas fa-trash-can"></i></button>' +
                    '</div>' +
                '</td>' +
                '</tr>';
            tbody.append(row);
        });
        
        attachEventListeners();
    }
    
    // Function to attach event listeners to dynamically created buttons
    function attachEventListeners() {
        $('.edit-btn').off('click').on('click', function() {
            let id = $(this).data('id');
            $.ajax({
                url: "<?= base_url('dashboard/get-organization/') ?>" + id,
                type: "GET",
                dataType: "json",
                success: function(res) {
                    if(res.csrfHash) updateCSRF(res.csrfHash);
                    if(res.success) {
                        $('#org_id').val(res.data.id);
                        $('#org_name').val(res.data.org_name);
                        $('#org_type').val(res.data.org_type);
                        $('#org_description').val(res.data.org_description);
                        $('#auth_req').prop('checked', res.data.authorization_letter_required == 1);
                        $('#isactive').prop('checked', res.data.isactive == 1);
                        $('#isActiveContainer').show();
                        $('#modalTitle').html('<i class="fa-solid fa-sitemap text-[#e58500]"></i> Edit Organization');
                        openModal();
                    } else {
                        alert(res.message || 'Unable to fetch record.');
                    }
                },
                error: function() {
                    alert('Error fetching organization data');
                }
            });
        });

        $('.delete-btn').off('click').on('click', function() {
            if(!confirm('Are you sure you want to delete this record?')) return;
            let id = $(this).data('id');
            $.ajax({
                url: "<?= base_url('dashboard/delete-organization/') ?>" + id,
                type: "POST",
                data: { csrf_token: $('input[name="csrf_token"]').val() },
                dataType: "json",
                success: function(res) {
                    if(res.csrfHash) updateCSRF(res.csrfHash);
                    if(res.success) {
                        loadOrganizations();
                        alert(res.message);
                    } else {
                        alert(res.message || 'Unable to delete record.');
                    }
                },
                error: function() {
                    alert('Error deleting organization');
                }
            });
        });
    }
});
</script>