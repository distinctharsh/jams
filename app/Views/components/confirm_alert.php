<div id="globalConfirmModal" class="fixed inset-0 bg-slate-900/60 backdrop-blur-xs z-[9999] hidden flex items-center justify-center p-4 opacity-0 transition-all duration-200">
    <div class="bg-white rounded-2xl shadow-2xl w-full max-w-md overflow-hidden transform scale-95 transition-all duration-200 border border-slate-100" id="globalConfirmBox">
        
        <div class="p-6 text-center">
            <div id="confirmIconWrapper" class="w-16 h-16 rounded-full bg-red-100 text-red-600 flex items-center justify-center mx-auto mb-4 border-4 border-red-50">
                <i id="confirmIcon" class="fas fa-exclamation-triangle text-2xl"></i>
            </div>

            <h3 id="confirmTitle" class="text-lg font-bold text-slate-800 mb-1">Are you sure?</h3>
            <p id="confirmMessage" class="text-xs text-slate-500 leading-relaxed">This action cannot be undone.</p>
        </div>

        <div class="px-6 py-4 bg-slate-50 border-t border-slate-100 flex items-center justify-end gap-3">
            <button type="button" id="confirmCancelBtn" class="px-4 py-2 bg-white hover:bg-slate-100 text-slate-700 text-xs font-semibold rounded-lg border border-slate-300 transition shadow-sm">
                Cancel
            </button>
            <button type="button" id="confirmOkBtn" class="px-5 py-2 bg-red-600 hover:bg-red-700 text-white text-xs font-semibold rounded-lg transition shadow-md shadow-red-200 flex items-center gap-2">
                <span id="confirmOkText">Yes, Delete</span>
            </button>
        </div>
    </div>
</div>

<script>
function showConfirmAlert(options = {}) {
    return new Promise((resolve) => {
        const modal = $('#globalConfirmModal');
        const box = $('#globalConfirmBox');
        
        const title = options.title || 'Are you sure?';
        const message = options.message || 'Do you really want to proceed with this action?';
        const confirmText = options.confirmText || 'Yes, Proceed';
        const cancelText = options.cancelText || 'Cancel';
        const type = options.type || 'danger';

        $('#confirmTitle').text(title);
        $('#confirmMessage').html(message);
        $('#confirmOkText').text(confirmText);
        $('#confirmCancelBtn').text(cancelText);

        const iconWrapper = $('#confirmIconWrapper');
        const icon = $('#confirmIcon');
        const okBtn = $('#confirmOkBtn');

        // Reset classes
        iconWrapper.attr('class', 'w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4 border-4 transition-transform');
        okBtn.attr('class', 'px-5 py-2 text-white text-xs font-semibold rounded-lg transition shadow-md flex items-center gap-2');

        if (type === 'danger') {
            iconWrapper.addClass('bg-red-100 text-red-600 border-red-50');
            icon.attr('class', 'fas fa-trash-can text-2xl');
            okBtn.addClass('bg-red-600 hover:bg-red-700 shadow-red-200');
        } else if (type === 'warning') {
            iconWrapper.addClass('bg-amber-100 text-amber-600 border-amber-50');
            icon.attr('class', 'fas fa-exclamation-triangle text-2xl');
            okBtn.addClass('bg-amber-600 hover:bg-amber-700 shadow-amber-200');
        } else { // info
            iconWrapper.addClass('bg-blue-100 text-blue-600 border-blue-50');
            icon.attr('class', 'fas fa-info-circle text-2xl');
            okBtn.addClass('bg-[#1e4d7b] hover:bg-[#163a5d] shadow-blue-200');
        }

        modal.removeClass('hidden');
        setTimeout(() => {
            modal.removeClass('opacity-0');
            box.removeClass('scale-95').addClass('scale-100');
        }, 10);

        const handleConfirm = () => { closeModal(); resolve(true); };
        const handleCancel = () => { closeModal(); resolve(false); };

        function closeModal() {
            box.removeClass('scale-100').addClass('scale-95');
            modal.addClass('opacity-0');
            setTimeout(() => {
                modal.addClass('hidden');
                $('#confirmOkBtn').off('click', handleConfirm);
                $('#confirmCancelBtn').off('click', handleCancel);
            }, 200);
        }

        $('#confirmOkBtn').off('click').on('click', handleConfirm);
        $('#confirmCancelBtn').off('click').on('click', handleCancel);
    });
}
</script>