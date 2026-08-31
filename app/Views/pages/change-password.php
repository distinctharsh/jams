<div class="max-w-xl mx-auto">
    <div class="gov-card p-6">
        <div class="flex items-center gap-3 mb-6 pb-4 border-b border-slate-200">
            <div class="w-10 h-10 rounded-full bg-amber-100 text-[#e58500] flex items-center justify-center font-bold">
                <i class="fas fa-key text-lg"></i>
            </div>
            <div>
                <h3 class="text-lg font-bold text-[#1e4d7b]">Change Password</h3>
                <p class="text-xs text-slate-500">Update your account password for security</p>
            </div>
        </div>

        <div id="passwordAlert" class="hidden p-3 mb-4 text-xs rounded-lg"></div>

        <form id="changePasswordForm" onsubmit="submitChangePassword(event)">
            <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>" class="csrf-token-input">
            
            <div class="mb-4">
                <label class="block text-xs font-bold text-slate-700 uppercase mb-2">Current Password</label>
                <input type="password" name="current_password" required class="w-full px-3 py-2 border border-slate-300 rounded-lg text-sm focus:outline-none focus:border-[#1e4d7b]">
            </div>

            <div class="mb-4">
                <label class="block text-xs font-bold text-slate-700 uppercase mb-2">New Password</label>
                <input type="password" name="new_password" id="new_password" required class="w-full px-3 py-2 border border-slate-300 rounded-lg text-sm focus:outline-none focus:border-[#1e4d7b]">
            </div>

            <div class="mb-6">
                <label class="block text-xs font-bold text-slate-700 uppercase mb-2">Confirm New Password</label>
                <input type="password" name="confirm_password" id="confirm_password" required class="w-full px-3 py-2 border border-slate-300 rounded-lg text-sm focus:outline-none focus:border-[#1e4d7b]">
            </div>

            <div class="flex justify-end gap-3">
                <button type="button" onclick="showPage('dashboard')" class="px-4 py-2 bg-slate-200 text-slate-700 rounded-lg text-xs font-semibold hover:bg-slate-300 transition">Cancel</button>
                <button type="submit" id="btnSubmitPassword" class="btn-orange px-5 py-2 text-xs font-semibold rounded-lg">Update Password</button>
            </div>
        </form>
    </div>
</div>

<script>
function submitChangePassword(e) {
    e.preventDefault();
    const form = document.getElementById('changePasswordForm');
    const alertBox = document.getElementById('passwordAlert');
    const formData = new FormData(form);

    fetch('<?= base_url('dashboard/update-password') ?>', {
        method: 'POST',
        body: formData,
        headers: {
            'X-Requested-With': 'XMLHttpRequest'
        }
    })
    .then(res => res.json())
    .then(data => {
        // Update CSRF Token
        if (data.csrfHash) {
            document.querySelectorAll('.csrf-token-input').forEach(el => el.value = data.csrfHash);
        }

        alertBox.classList.remove('hidden', 'bg-red-100', 'text-red-700', 'bg-emerald-100', 'text-emerald-700');
        if (data.success) {
            alertBox.classList.add('bg-emerald-100', 'text-emerald-700');
            alertBox.innerText = data.message;
            form.reset();
        } else {
            alertBox.classList.add('bg-red-100', 'text-red-700');
            alertBox.innerText = data.message;
        }
    })
    .catch(() => {
        alertBox.classList.remove('hidden');
        alertBox.classList.add('bg-red-100', 'text-red-700');
        alertBox.innerText = 'Something went wrong. Please try again.';
    });
}
</script>