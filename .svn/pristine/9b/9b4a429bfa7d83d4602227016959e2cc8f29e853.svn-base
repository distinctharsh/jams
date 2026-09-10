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
    .dataTables_length, .dataTables_filter input{margin-bottom: 10px !important}
</style>

<div class="space-y-6">

    <div class="gov-card p-6">
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
            <div class="flex items-center gap-3">
                <div class="w-12 h-12 rounded-xl bg-amber-50 border border-amber-200 flex items-center justify-center shrink-0">
                   <i class="fas fa-sliders text-[#e58500] text-xl"></i>
                </div>
                <div>
                    <h2 class="text-xl font-bold text-[#1e4d7b]">System Settings</h2>
                    <p class="text-xs text-slate-500 mt-0.5">Overview and configuration of system setting parameters.</p>
                </div>
            </div>
        </div>
    </div>

    <div class="gov-card p-5 overflow-hidden shadow-sm border border-slate-200 rounded-xl bg-white">
        <div class="overflow-x-auto">
            <table class="w-full text-sm gov-table rounded-lg overflow-hidden" id="settingTable">
                <thead class="bg-[#1e4d7b] text-white">
                    <tr>
                        <th class="px-5 py-3.5 text-left w-16 font-semibold uppercase tracking-wider text-xs">S.No.</th>
                        <th class="px-5 py-3.5 text-left font-semibold uppercase tracking-wider text-xs">Description</th>
                        <th class="px-5 py-3.5 text-left font-semibold uppercase tracking-wider text-xs">Value</th>
                        <th class="px-5 py-3.5 text-left font-semibold uppercase tracking-wider text-xs">Status</th>
                        <th class="px-5 py-3.5 text-left pr-6 font-semibold uppercase tracking-wider text-xs">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100 bg-white text-slate-700">
                    <?php if(!empty($settings)): ?>
                        <?php foreach($settings as $index => $setting): ?>
                            <tr class="hover:bg-slate-50/80 transition-colors duration-150">
                                <td class="px-5 py-4 text-left font-bold text-[#1e4d7b]">
                                    <?= $index + 1 ?>
                                </td>
                                <td class="px-5 py-4 font-bold text-left text-slate-800">
                                    <?= esc($setting['desc']) ?>
                                </td>
                                <td class="px-5 py-4 text-slate-600 font-medium text-left">
                                    <?= !empty($setting['display_value']) ? esc($setting['display_value']) : '<span class="text-slate-400 italic">N/A</span>' ?>
                                </td>
                                <td class="px-5 py-4 text-left">
                                    <?php if ($setting['isactive'] == 1 || $setting['isactive'] == '1'): ?>
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
                                        <button class="w-8 h-8 rounded-lg bg-blue-50 text-[#1e4d7b] hover:bg-blue-100 border border-blue-100 transition edit-setting-btn flex items-center justify-center" data-id="<?= $setting['id'] ?>" title="Edit">
                                            <i class="fas fa-pen-to-square text-xs"></i>
                                        </button>
                                        <button class="w-8 h-8 rounded-lg bg-red-50 text-red-600 hover:bg-red-100 border border-red-100 transition delete-setting-btn flex items-center justify-center" data-id="<?= $setting['id'] ?>" data-desc="<?= esc($setting['desc']) ?>" title="Delete">
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

<div id="settingModal" class="fixed inset-0 bg-slate-900/50 backdrop-blur-sm z-50 hidden flex items-center justify-center p-4 transition-opacity">
    <div class="bg-white rounded-2xl shadow-xl w-full max-w-lg overflow-hidden transform transition-all">
        
        <div class="px-6 py-4 bg-slate-50 border-b border-slate-200 flex items-center justify-between">
            <h3 class="text-base font-bold text-[#1e4d7b] flex items-center gap-2" id="settingModalTitle">
                <i class="fas fa-sliders text-[#e58500]"></i> Edit Setting
            </h3>
            <button type="button" class="closeSettingModal text-slate-400 hover:text-slate-600 w-8 h-8 rounded-lg flex items-center justify-center hover:bg-slate-200 transition">
                <i class="fas fa-times"></i>
            </button>
        </div>

        <form id="settingForm">
            <?= csrf_field() ?>
            <input type="hidden" name="id" id="setting_id">

            <div class="p-6 space-y-4">
                <div>
                    <label class="block text-xs font-bold text-slate-600 uppercase tracking-wider mb-1.5">
                        Description <span class="text-red-500">*</span>
                    </label>
                    <textarea name="desc" id="setting_desc" rows="3" class="w-full px-3.5 py-2.5 text-sm bg-slate-50 border border-slate-300 rounded-lg focus:ring-2 focus:ring-[#1e4d7b] focus:border-[#1e4d7b] focus:bg-white outline-none transition" required></textarea>
                </div>

                <div id="valueInputContainer">
                    <label class="block text-xs font-bold text-slate-600 uppercase tracking-wider mb-1.5">
                        Value
                    </label>
                    <input type="text" name="value" id="setting_value" class="w-full px-3.5 py-2.5 text-sm bg-slate-50 border border-slate-300 rounded-lg focus:ring-2 focus:ring-[#1e4d7b] focus:border-[#1e4d7b] focus:bg-white outline-none transition" placeholder="Enter setting value">
                </div>

                <div id="valueSelectContainer" class="hidden">
                    <label class="block text-xs font-bold text-slate-600 uppercase tracking-wider mb-1.5">
                        Select User
                    </label>
                    <select id="setting_value_user" class="w-full px-3.5 py-2.5 text-sm bg-slate-50 border border-slate-300 rounded-lg focus:ring-2 focus:ring-[#1e4d7b] focus:border-[#1e4d7b] focus:bg-white outline-none transition">
                        <option value="">-- Select User --</option>
                        <?php if(!empty($users)): ?>
                            <?php foreach($users as $user): ?>
                                <option value="<?= $user['id'] ?>"><?= esc($user['name']) ?> - <?= esc($user['email']) ?></option>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </select>
                </div>

                <div class="p-4 bg-slate-50 border border-slate-200 rounded-xl" id="settingIsActiveContainer">
                    <label class="flex items-center justify-between cursor-pointer">
                        <span class="text-sm font-semibold text-slate-700">Is Active</span>
                        <input type="checkbox" name="isactive" id="setting_isactive" value="1" class="w-4 h-4 text-[#1e4d7b] rounded border-slate-300 focus:ring-[#1e4d7b]">
                    </label>
                </div>
            </div>

            <div class="px-6 py-3.5 bg-slate-50 border-t border-slate-200 flex justify-end gap-3">
                <button type="button" class="closeSettingModal px-4 py-2 bg-slate-100 hover:bg-slate-200 text-slate-700 text-sm font-medium rounded-lg border border-slate-300 transition">
                    Cancel
                </button>
                <button type="submit" id="saveSettingBtn" class="px-5 py-2 bg-[#1e4d7b] hover:bg-[#163a5d] text-white text-sm font-semibold rounded-lg transition shadow-sm">
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
    let settingDataTable = null;
    let globalUsers = <?= json_encode($users ?? []) ?>;

    function initDataTable() {
        if ($.fn && $.fn.DataTable) {
            if ($.fn.DataTable.isDataTable('#settingTable')) {
                $('#settingTable').DataTable().destroy();
            }

            settingDataTable = $('#settingTable').DataTable({
                "paging": false,
                "searching": false,
                "info": false,
                "responsive": true,
                "autoWidth": false,
                "dom": 'rt',
                "columnDefs": [
                    { "orderable": false, "targets": [4] }
                ]
            });
        }
    }

    initDataTable();

    function openSettingModal() {
        $('#settingModal').removeClass('hidden');
    }

    function closeSettingModal() {
        $('#settingModal').addClass('hidden');
    }

    $('.closeSettingModal').click(function() {
        closeSettingModal();
    });

    function updateCSRF(hash) {
        if(hash) {
            $('#settingForm input[type="hidden"]').first().val(hash);
        }
    }

    // Checking if ID is '2' or '3' for User Dropdown
    function toggleValueInputById(settingId) {
        if (['2', '3'].includes(String(settingId))) {
            $('#valueInputContainer').addClass('hidden');
            $('#setting_value').attr('name', '');
            
            $('#valueSelectContainer').removeClass('hidden');
            $('#setting_value_user').attr('name', 'value');
        } else {
            $('#valueSelectContainer').addClass('hidden');
            $('#setting_value_user').attr('name', '');

            $('#valueInputContainer').removeClass('hidden');
            $('#setting_value').attr('name', 'value');
        }
    }

    $('#settingForm').submit(function(e) {
        e.preventDefault();
        $('#saveSettingBtn').prop('disabled', true).text('Saving...');
        
        let formData = $(this).serializeArray();
        
        if (!$('#setting_isactive').is(':checked')) {
            formData.push({ name: 'isactive', value: '0' });
        }

        $.ajax({
            url: "<?= base_url('save-setting') ?>",
            type: "POST",
            data: $.param(formData),
            dataType: "json",
            success: function(res) {
                if(res.csrfHash) updateCSRF(res.csrfHash);

                if(res.success) {
                    closeSettingModal();
                    loadSettings();
                    showToast('success', res.message || 'Setting updated successfully!');
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
                $('#saveSettingBtn').prop('disabled', false).text('Save Changes');
            }
        });
    });

    function loadSettings() {
        $.ajax({
            url: "<?= base_url('get-settings') ?>",
            type: "GET",
            dataType: "json",
            success: function(res) {
                if(res.csrfHash) updateCSRF(res.csrfHash);
                if(res.users) globalUsers = res.users;
                if(res.success) {
                    renderSettingsTable(res.settings);
                }
            },
            error: function() {
                showToast('error', 'Error loading settings data.');
            }
        });
    }

    function renderSettingsTable(settings) {
        if ($.fn.DataTable.isDataTable('#settingTable')) {
            $('#settingTable').DataTable().destroy();
        }

        let tbody = $('#settingTable tbody');
        tbody.empty();

        if (!settings || settings.length === 0) {
            tbody.html('<tr><td colspan="5" class="text-center py-12"><i class="fas fa-sliders text-slate-300 text-5xl mb-3 block"></i><p class="text-slate-500 font-medium">No setting records found.</p></td></tr>');
        } else {
            settings.forEach(function(setting, index) {
                let isActive = (setting.isactive == 1 || setting.isactive == '1');
                
                let displayValue = setting.display_value || setting.value;
                if (['2', '3'].includes(String(setting.id))) {
                    let foundUser = globalUsers.find(u => String(u.id) === String(setting.value));
                    if (foundUser) {
                        displayValue = foundUser.name;
                    }
                }

                let row = '<tr class="hover:bg-slate-50/80 transition-colors duration-150">' +
                    '<td class="px-5 py-4 text-left font-bold text-[#1e4d7b]">' + (index + 1) + '</td>' +
                    '<td class="px-5 py-4 font-bold text-left text-slate-800">' + setting.desc + '</td>' +
                    '<td class="px-5 py-4 text-slate-600 font-medium text-left">' + (displayValue ? displayValue : '<span class="text-slate-400 italic">N/A</span>') + '</td>' +
                    '<td class="px-5 py-4 text-left">' +
                        (isActive ? 
                            '<span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-lg border-l-4 border-green-500 bg-green-50 text-green-700 font-semibold text-xs shadow-sm"><i class="fas fa-check-circle"></i> Active</span>' : 
                            '<span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-lg border-l-4 border-red-500 bg-red-50 text-red-700 font-semibold text-xs shadow-sm"><i class="fas fa-times-circle"></i> Inactive</span>') +
                    '</td>' +
                    '<td class="px-5 py-4 text-left pr-6">' +
                        '<div class="flex justify-left gap-2">' +
                            '<button class="w-8 h-8 rounded-lg bg-blue-50 text-[#1e4d7b] hover:bg-blue-100 border border-blue-100 transition edit-setting-btn flex items-center justify-center" data-id="' + setting.id + '" title="Edit"><i class="fas fa-pen-to-square text-xs"></i></button>' +
                            '<button class="w-8 h-8 rounded-lg bg-red-50 text-red-600 hover:bg-red-100 border border-red-100 transition delete-setting-btn flex items-center justify-center" data-id="' + setting.id + '" data-desc="' + setting.desc + '" title="Delete"><i class="fas fa-trash-can text-xs"></i></button>' +
                        '</div>' +
                    '</td>' +
                    '</tr>';
                tbody.append(row);
            });
        }

        initDataTable();
        attachSettingEventListeners();
    }

    function attachSettingEventListeners() {
        $(document).off('click', '.edit-setting-btn').on('click', '.edit-setting-btn', function(e) {
            e.preventDefault();
            let id = $(this).attr('data-id');

            $.ajax({
                url: "<?= base_url('get-setting/') ?>" + id,
                type: "GET",
                dataType: "json",
                success: function(res) {
                    if(res.csrfHash) updateCSRF(res.csrfHash);

                    if(res.success) {
                        $('#setting_id').val(res.data.id);
                        $('#setting_desc').val(res.data.desc);
                        
                        toggleValueInputById(res.data.id);

                        if (['2', '3'].includes(String(res.data.id))) {
                            $('#setting_value_user').val(res.data.value);
                        } else {
                            $('#setting_value').val(res.data.value);
                        }
                        
                        if (res.data.isactive == 1 || res.data.isactive == '1') {
                            $('#setting_isactive').prop('checked', true);
                        } else {
                            $('#setting_isactive').prop('checked', false);
                        }

                        $('#settingModalTitle').html('<i class="fas fa-sliders text-[#e58500]"></i> Edit Setting');
                        openSettingModal();
                    } else {
                        showToast('error', res.message || 'Unable to fetch record.');
                    }
                },
                error: function() {
                    showToast('error', 'Error fetching setting data.');
                }
            });
        });

        $(document).off('click', '.delete-setting-btn').on('click', '.delete-setting-btn', function(e) {
            e.preventDefault();
            let id = $(this).attr('data-id');
            let settingDesc = $(this).attr('data-desc') || 'this setting';

            Swal.fire({
                title: 'Deactivate Setting?',
                text: `Are you sure you want to deactivate "${settingDesc}"?`,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#dc2626',
                cancelButtonColor: '#64748b',
                confirmButtonText: 'Yes, Deactivate',
                cancelButtonText: 'Cancel',
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {
                    let csrfInput = $('#settingForm input[type="hidden"]').first();
                    let dataParam = {};
                    if(csrfInput.length > 0) {
                        dataParam[csrfInput.attr('name')] = csrfInput.val();
                    }

                    $.ajax({
                        url: "<?= base_url('delete-setting/') ?>" + id,
                        type: "POST",
                        data: dataParam,
                        dataType: "json",
                        success: function(res) {
                            if(res.csrfHash) updateCSRF(res.csrfHash);
                            if(res.success) {
                                loadSettings();
                                showToast('success', res.message || 'Setting deactivated successfully!');
                            } else {
                                showToast('error', res.message || 'Unable to deactivate record.');
                            }
                        },
                        error: function() {
                            showToast('error', 'Error deactivating setting.');
                        }
                    });
                }
            });
        });
    }

    attachSettingEventListeners();
});
</script>
<?php
$page_content = ob_get_clean();
include dirname(__DIR__) . '/dashboard.php';
?>