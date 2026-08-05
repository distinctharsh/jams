<!-- View Request Page Content -->
<div class="gov-card p-6">
    <div class="flex items-center justify-between mb-6">
        <div class="flex items-center gap-3">
            <i class="fas fa-file-alt text-[#e58500] text-2xl"></i>
            <div>
                <h2 class="text-xl font-bold text-[#1e4d7b]">Request Details</h2>
                <p class="text-xs text-slate-500">Request ID: #<?= str_pad($request['id'], 4, '0', STR_PAD_LEFT) ?></p>
            </div>
        </div>
        <button onclick="showPage('requests')" class="btn-orange px-4 py-2">
            <i class="fas fa-arrow-left mr-2"></i> Back to Requests
        </button>
    </div>

    <?php if (session()->getFlashdata('success')): ?>
    <div class="booking-alert !bg-green-50 !border-green-500 mb-6">
        <div class="alert-icon !bg-green-500">
            <i class="fas fa-check"></i>
        </div>
        <div class="alert-content">
            <h6>Success</h6>
            <p><?= session()->getFlashdata('success') ?></p>
        </div>
    </div>
    <?php endif; ?>

<div class="grid gap-6">
    <div class="gov-card p-5">

        <!-- Organisation Details -->
        <h3 class="text-base font-bold text-[#1e4d7b] mb-4 flex items-center gap-2">
            <i class="fas fa-building"></i>
            Organisation Details
        </h3>

        <div class="space-y-3">
            <div>
                <label class="text-xs text-slate-500 font-medium">Organisation Name</label>
                <p class="text-sm font-semibold text-slate-800">${request.organisation_name}</p>
            </div>

            <div>
                <label class="text-xs text-slate-500 font-medium">Organisation Type</label>
                <p class="text-sm font-semibold text-slate-800">${request.organisation_type}</p>
            </div>

            ${request.letter_number ? `
            <div>
                <label class="text-xs text-slate-500 font-medium">Letter Number</label>
                <p class="text-sm font-semibold text-slate-800">${request.letter_number}</p>
            </div>
            ` : ''}
        </div>

        <!-- Examination Details -->
        <h3 class="text-base font-bold text-[#1e4d7b] mt-8 pt-4 border-t border-slate-200 flex items-center gap-2">
            <i class="fas fa-graduation-cap"></i>
            Examination Details
        </h3>

        <div class="space-y-3 mt-4">
            ${request.exam_name ? `
            <div>
                <label class="text-xs text-slate-500 font-medium">Exam Name</label>
                <p class="text-sm font-semibold text-slate-800">${request.exam_name}</p>
            </div>
            ` : ''}

            ${request.exam_date ? `
            <div>
                <label class="text-xs text-slate-500 font-medium">Exam Date</label>
                <p class="text-sm font-semibold text-slate-800">${new Date(request.exam_date).toLocaleDateString('en-GB')}</p>
            </div>
            ` : ''}

            ${request.exam_address ? `
            <div>
                <label class="text-xs text-slate-500 font-medium">Exam Address</label>
                <p class="text-sm font-semibold text-slate-800">${request.exam_address}</p>
            </div>
            ` : ''}
        </div>

        <!-- Vendor Details -->
        <h3 class="text-base font-bold text-[#1e4d7b] mt-8 pt-4 border-t border-slate-200 flex items-center gap-2">
            <i class="fas fa-microchip"></i>
            Vendor Details
        </h3>

        <div class="space-y-3 mt-4">
            ${request.vendor_name ? `
            <div>
                <label class="text-xs text-slate-500 font-medium">Vendor Name</label>
                <p class="text-sm font-semibold text-slate-800">${request.vendor_name}</p>
            </div>
            ` : '<p class="text-sm text-slate-500 italic">No vendor selected</p>'}
        </div>

        <!-- Contact Details -->
        <h3 class="text-base font-bold text-[#1e4d7b] mt-8 pt-4 border-t border-slate-200 flex items-center gap-2">
            <i class="fas fa-user-tie"></i>
            Contact Details
        </h3>

        <div class="space-y-3 mt-4">
            ${request.contact_person ? `
            <div>
                <label class="text-xs text-slate-500 font-medium">Contact Person</label>
                <p class="text-sm font-semibold text-slate-800">${request.contact_person}</p>
            </div>
            ` : ''}

            ${request.contact_email ? `
            <div>
                <label class="text-xs text-slate-500 font-medium">Email</label>
                <p class="text-sm font-semibold text-slate-800">${request.contact_email}</p>
            </div>
            ` : ''}

            ${request.contact_phone ? `
            <div>
                <label class="text-xs text-slate-500 font-medium">Phone</label>
                <p class="text-sm font-semibold text-slate-800">${request.contact_phone}</p>
            </div>
            ` : ''}
        </div>

    </div>
</div>

    <!-- Status & Actions -->
    <div class="gov-card p-5 mt-6">
        <div class="flex items-center justify-between">
            <div>
                <label class="text-xs text-slate-500 font-medium">Current Status</label>
                <?php 
                $statusClass = '';
                $statusIcon = '';
                switch($request['status']) {
                    case 'pending':
                        $statusClass = 'bg-yellow-100 text-yellow-800 border-yellow-500';
                        $statusIcon = 'fa-clock';
                        break;
                    case 'approved':
                        $statusClass = 'bg-green-100 text-green-800 border-green-500';
                        $statusIcon = 'fa-check';
                        break;
                    case 'rejected':
                        $statusClass = 'bg-red-100 text-red-800 border-red-500';
                        $statusIcon = 'fa-times';
                        break;
                    case 'completed':
                        $statusClass = 'bg-blue-100 text-blue-800 border-blue-500';
                        $statusIcon = 'fa-check-circle';
                        break;
                }
                ?>
                <span class="inline-flex items-center gap-2 px-4 py-2 rounded-lg border-l-4 <?= $statusClass ?> font-semibold text-sm shadow-sm">
                    <i class="fas <?= $statusIcon ?>"></i>
                    <?= ucfirst($request['status']) ?>
                </span>
            </div>
            <div class="flex gap-2">
                <button class="btn-orange px-4 py-2">
                    <i class="fas fa-edit mr-2"></i> Edit
                </button>
                <button class="px-4 py-2 border border-slate-300 rounded-lg text-slate-700 font-semibold hover:bg-slate-50 transition">
                    <i class="fas fa-print mr-2"></i> Print
                </button>
            </div>
        </div>
    </div>
</div>