<?php
ob_start();
?>
<!-- Requests Page Content -->
<div class="gov-card p-6" id="requests-list">
    <div class="flex items-center justify-between mb-6">
        <div class="flex items-center gap-3">
            <i class="fas fa-clipboard-list text-[#e58500] text-2xl"></i>
            <h2 class="text-xl font-bold text-[#1e4d7b]">All Requests</h2>
        </div>
        <button class="btn-orange px-4 py-2">
            <i class="fas fa-filter mr-2"></i> Filter
        </button>
    </div>
    
    <?php if (isset($requests) && !empty($requests)): ?>
        <div class="overflow-x-auto">
            <table class="w-full text-sm gov-table">
                <thead class="bg-[#1e4d7b] text-white">
                    <tr>
                        <th class="px-5 py-4 text-left">Request ID</th>
                        <th class="px-5 py-4 text-left">Organisation</th>
                        <th class="px-5 py-4 text-left">Exam Name</th>
                        <th class="px-5 py-4 text-left">Exam Date</th>
                        <th class="px-5 py-4 text-left">Status</th>
                        <th class="px-5 py-4 text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100 bg-white">
                    <?php foreach ($requests as $request): ?>
                    <tr class="hover:bg-slate-50 transition cursor-pointer" onclick="viewRequest(<?= $request['id'] ?>)">
                        <td class="px-5 py-4 font-bold text-[#1e4d7b]">#<?= str_pad($request['id'], 4, '0', STR_PAD_LEFT) ?></td>
                        <td class="px-5 py-4 font-medium text-slate-700">
                            <?= esc($request['organisation_name']) ?>
                        </td>
                        <td class="px-5 py-4 text-slate-500">
                            <?= esc($request['exam_name'] ?? 'N/A') ?>
                        </td>
                        <td class="px-5 py-4 text-slate-500">
                            <?= $request['exam_date'] ? date('d/m/Y', strtotime($request['exam_date'])) : 'N/A' ?>
                        </td>
                        <td class="px-5 py-4">
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
                        </td>
                        <td class="px-5 py-4 text-right">
                            <div class="flex justify-end gap-2">
                                <button class="w-9 h-9 rounded-lg bg-blue-50 text-blue-700 hover:bg-blue-100 transition" title="View" onclick="event.stopPropagation(); viewRequest(<?= $request['id'] ?>)">
                                    <i class="fas fa-eye"></i>
                                </button>
                                <button class="w-9 h-9 rounded-lg bg-yellow-50 text-yellow-700 hover:bg-yellow-100 transition" title="Edit" onclick="event.stopPropagation()">
                                    <i class="fas fa-pen-to-square"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    <?php else: ?>
        <div class="text-center py-12">
            <i class="fas fa-inbox text-slate-300 text-6xl mb-4"></i>
            <p class="text-slate-500">No requests found. Submit your first request!</p>
        </div>
    <?php endif; ?>
</div>

<!-- View Request Detail Container -->
<div id="view-request-content" class="hidden"></div>

<script>
function viewRequest(requestId) {
    fetch('<?= base_url('dashboard/get-request/') ?>' + requestId)
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                const viewRequestContent = document.getElementById('view-request-content');
                viewRequestContent.innerHTML = generateRequestHTML(data.request);
                showPage('view-request');
            } else {
                alert('Error loading request: ' + data.message);
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('Error loading request details');
        });
}

function showPage(pageName) {
    const requestsList = document.getElementById('requests-list');
    const viewRequestContent = document.getElementById('view-request-content');

    if (pageName === 'view-request') {
        requestsList.classList.add('hidden');
        viewRequestContent.classList.remove('hidden');
    } else {
        requestsList.classList.remove('hidden');
        viewRequestContent.classList.add('hidden');
    }
}

function switchTab(tabName) {
    const tabs = ['details', 'documents'];
    tabs.forEach(t => {
        const btn = document.getElementById(`tab-btn-${t}`);
        const content = document.getElementById(`tab-content-${t}`);
        
        if (t === tabName) {
            btn.classList.add('text-[#1e4d7b]', 'border-[#1e4d7b]', 'font-bold');
            btn.classList.remove('text-slate-500', 'border-transparent', 'font-medium');
            content.classList.remove('hidden');
        } else {
            btn.classList.remove('text-[#1e4d7b]', 'border-[#1e4d7b]', 'font-bold');
            btn.classList.add('text-slate-500', 'border-transparent', 'font-medium');
            content.classList.add('hidden');
        }
    });
}

function generateRequestHTML(request) {
    let statusClass = '';
    let statusIcon = '';
    switch(request.status) {
        case 'pending':
            statusClass = 'bg-yellow-100 text-yellow-800 border-yellow-500';
            statusIcon = 'fa-clock';
            break;
        case 'approved':
            statusClass = 'bg-green-100 text-green-800 border-green-500';
            statusIcon = 'fa-check';
            break;
        case 'rejected':
            statusClass = 'bg-red-100 text-red-800 border-red-500';
            statusIcon = 'fa-times';
            break;
        case 'completed':
            statusClass = 'bg-blue-100 text-blue-800 border-blue-500';
            statusIcon = 'fa-check-circle';
            break;
    }
    
    return `
    <div class="space-y-6 max-w-6xl mx-auto">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 items-start">
            
            <!-- LEFT COLUMN: Main Card with Integrated Tabs -->
            <div class="lg:col-span-2 space-y-6">
                
                <div class="gov-card p-5">
                    
                    <!-- Integrated Tab Switcher Header -->
                    <div class="flex border-b border-slate-200 mb-6 gap-6">
                        <button id="tab-btn-details" onclick="switchTab('details')" class="pb-3 text-sm font-bold text-[#1e4d7b] border-b-2 border-[#1e4d7b] flex items-center gap-2 transition">
                            <i class="fas fa-info-circle"></i> Details
                        </button>
                        <button id="tab-btn-documents" onclick="switchTab('documents')" class="pb-3 text-sm font-medium text-slate-500 border-b-2 border-transparent hover:text-slate-700 flex items-center gap-2 transition">
                            <i class="fas fa-folder-open"></i> Documents
                        </button>

                    </div>

                    <!-- TAB 1: DETAILS -->
                    <div id="tab-content-details" class="space-y-4">
                        <h3 class="text-base font-bold text-[#1e4d7b] mb-4 flex items-center gap-2 pb-2">
                            <i class="fas fa-file-alt text-[#e58500]"></i> Application details
                        </h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label class="text-xs text-slate-500 font-medium block mb-1">Application number</label>
                                <p class="text-sm font-semibold text-slate-800">JPMS/2026/001057</p>
                            </div>
                            <div>
                                <label class="text-xs text-slate-500 font-medium block mb-1">Authorised contact</label>
                                <p class="text-sm font-semibold text-slate-800">Ananya Rao</p>
                            </div>
                        </div>
                        ${request.letter_number ? `
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-4 pt-3">
                            <div>
                                <label class="text-xs text-slate-500 font-medium block mb-1">Reference number</label>
                                <p class="text-sm font-semibold text-slate-800">F.No. 11/36/2026-JAM</p>
                            </div>
                            <div>
                                <label class="text-xs text-slate-500 font-medium block mb-1">Permission number</label>
                                <p class="text-sm font-semibold text-slate-800">—</p>
                            </div>
                        </div>
                        ` : ''}

                        <hr class="my-5 border-slate-200"/>

                        <div>
                            <h3 class="text-base font-bold text-[#1e4d7b] mb-4 flex items-center gap-2 pb-2">
                                <i class="fas fa-building text-[#e58500]"></i> Organisation Details
                            </h3>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div>
                                    <label class="text-xs text-slate-500 font-medium block mb-1">Organisation Name</label>
                                    <p class="text-sm font-semibold text-slate-800">${request.organisation_name}</p>
                                </div>
                                <div>
                                    <label class="text-xs text-slate-500 font-medium block mb-1">Organisation Type</label>
                                    <p class="text-sm font-semibold text-slate-800">${request.organisation_type}</p>
                                </div>
                                ${request.letter_number ? `
                                <div class="md:col-span-2 pt-2 border-t border-slate-50">
                                    <label class="text-xs text-slate-500 font-medium block mb-1">Letter Number</label>
                                    <p class="text-sm font-semibold text-slate-800">${request.letter_number}</p>
                                </div>
                                ` : ''}
                            </div>
                        </div>

                        <hr class="my-5 border-slate-200"/>

                        <div>
                            <h3 class="text-base font-bold text-[#1e4d7b] mb-4 flex items-center gap-2 pb-2">
                                <i class="fas fa-graduation-cap text-[#e58500]"></i> Examination Details
                            </h3>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                ${request.exam_name ? `
                                <div>
                                    <label class="text-xs text-slate-500 font-medium block mb-1">Exam Name</label>
                                    <p class="text-sm font-semibold text-slate-800">${request.exam_name}</p>
                                </div>
                                ` : ''}
                                ${request.exam_date ? `
                                <div>
                                    <label class="text-xs text-slate-500 font-medium block mb-1">Exam Date</label>
                                    <p class="text-sm font-semibold text-slate-800">${new Date(request.exam_date).toLocaleDateString('en-GB')}</p>
                                </div>
                                ` : ''}
                                ${request.exam_address ? `
                                <div class="md:col-span-2 pt-2 border-t border-slate-50">
                                    <label class="text-xs text-slate-500 font-medium block mb-1">Exam Address</label>
                                    <p class="text-sm font-semibold text-slate-800">${request.exam_address}</p>
                                </div>
                                ` : ''}
                            </div>
                        </div>

                        <hr class="my-5 border-slate-200"/>

                        <div>
                            <h3 class="text-base font-bold text-[#1e4d7b] mb-4 flex items-center gap-2 pb-2">
                                <i class="fas fa-microchip text-[#e58500]"></i> Vendor Details
                            </h3>
                            <div>
                                ${request.vendor_name ? `
                                <div>
                                    <label class="text-xs text-slate-500 font-medium block mb-1">Vendor Name</label>
                                    <p class="text-sm font-semibold text-slate-800">${request.vendor_name}</p>
                                </div>
                                ` : '<p class="text-sm text-slate-500 italic">No vendor selected</p>'}
                            </div>
                        </div>

                        <hr class="my-5 border-slate-200"/>

                        <div>
                            <h3 class="text-base font-bold text-[#1e4d7b] mb-4 flex items-center gap-2 pb-2">
                                <i class="fas fa-user-tie text-[#e58500]"></i> Contact Details
                            </h3>
                            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                                ${request.contact_person ? `
                                <div>
                                    <label class="text-xs text-slate-500 font-medium block mb-1">Contact Person</label>
                                    <p class="text-sm font-semibold text-slate-800">${request.contact_person}</p>
                                </div>
                                ` : ''}
                                ${request.contact_email ? `
                                <div>
                                    <label class="text-xs text-slate-500 font-medium block mb-1">Email</label>
                                    <p class="text-sm font-semibold text-slate-800">${request.contact_email}</p>
                                </div>
                                ` : ''}
                                ${request.contact_phone ? `
                                <div>
                                    <label class="text-xs text-slate-500 font-medium block mb-1">Phone</label>
                                    <p class="text-sm font-semibold text-slate-800">${request.contact_phone}</p>
                                </div>
                                ` : ''}
                            </div>
                        </div>
                    </div>

                    <!-- TAB 2: DOCUMENTS -->
                    <div id="tab-content-documents" class="hidden space-y-4">
                        <h3 class="text-base font-bold text-[#1e4d7b] mb-4 flex items-center gap-2 pb-2">
                            <i class="fas fa-file-pdf text-[#e58500]"></i> Application Documents
                        </h3>

                        <div class="space-y-3">
                            <div class="flex items-center justify-between p-3 bg-slate-50 border border-slate-200 rounded-lg">
                                <div class="flex items-center gap-3">
                                    <i class="fas fa-file-pdf text-red-500 text-xl"></i>
                                    <div>
                                        <h4 class="text-sm font-semibold text-slate-800">application-JPMS-001045-v1.pdf</h4>
                                        <p class="text-xs text-slate-500">Uploaded on ${request.created_at ? new Date(request.created_at).toLocaleDateString('en-GB') : 'N/A'}</p>
                                    </div>
                                </div>
                                <div class="flex gap-2">
                                    <button class="px-3 py-1.5 bg-green-50 text-green-700 rounded-lg font-medium text-xs hover:bg-green-100 transition flex items-center gap-1">
                                        <i class="fas fa-eye"></i>
                                        Preview
                                    </button>
                                    <button class="px-3 py-1.5 bg-blue-50 text-[#1e4d7b] rounded-lg font-medium text-xs hover:bg-blue-100 transition flex items-center gap-1">
                                        <i class="fas fa-download"></i>
                                    </button>

                                </div>
                            </div>

                            <div class="flex items-center justify-between p-3 bg-slate-50 border border-slate-200 rounded-lg">
                                <div class="flex items-center gap-3">
                                    <i class="fas fa-file-excel text-emerald-600 text-xl"></i>
                                    <div>
                                        <h4 class="text-sm font-semibold text-slate-800">application-JPMS-001045-v1.xls</h4>
                                        <p class="text-xs text-slate-500">Excel Schedule Attachment</p>
                                    </div>
                                </div>
                                <div class="flex gap-2">
                                    <button class="px-3 py-1.5 bg-green-50 text-green-700 rounded-lg font-medium text-xs hover:bg-green-100 transition flex items-center gap-1">
                                        <i class="fas fa-eye"></i>
                                        Preview
                                    </button>
                                    <button class="px-3 py-1.5 bg-blue-50 text-[#1e4d7b] rounded-lg font-medium text-xs hover:bg-blue-100 transition flex items-center gap-1">
                                        <i class="fas fa-download"></i>
                                    </button>

                                </div>
                            </div>

                            <div class="flex items-center justify-between p-3 bg-slate-50 border border-slate-200 rounded-lg">
                                <div class="flex items-center gap-3">
                                    <i class="fas fa-file-signature text-amber-600 text-xl"></i>
                                    <div>
                                        <h4 class="text-sm font-semibold text-slate-800">Signed Application Copy</h4>
                                        <p class="text-xs text-slate-500">Authorized Signatory Copy</p>
                                    </div>
                                </div>
                                <div class="flex gap-2">
                                    <button class="px-3 py-1.5 bg-green-50 text-green-700 rounded-lg font-medium text-xs hover:bg-green-100 transition flex items-center gap-1">
                                        <i class="fas fa-eye"></i>
                                        Preview
                                    </button>
                                    <button class="px-3 py-1.5 bg-blue-50 text-[#1e4d7b] rounded-lg font-medium text-xs hover:bg-blue-100 transition flex items-center gap-1">
                                        <i class="fas fa-download"></i>
                                    </button>

                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <!-- ACTIONS CARD -->
                <div class="gov-card p-5">
                    <h3 class="text-base font-bold text-[#1e4d7b] mb-4 flex items-center gap-2 pb-2 border-b border-slate-200">
                        <i class="fas fa-tasks text-[#e58500]"></i> Actions
                    </h3>
                    
                    <div class="flex flex-wrap items-center gap-3">
                        <button type="button" class="px-4 py-2 bg-slate-100 hover:bg-slate-200 text-slate-700 font-medium text-sm rounded-lg border border-slate-300 transition flex items-center gap-2">
                            <i class="fas fa-file-pdf text-red-600"></i> Application PDF
                        </button>
                        <button type="button" class="px-4 py-2 bg-[#1e4d7b] hover:bg-[#163a5d] text-white font-medium text-sm rounded-lg transition flex items-center gap-2 shadow-sm">
                            <i class="fas fa-check-circle"></i> Approve & Forward
                        </button>
                        <button type="button" class="px-4 py-2 bg-slate-100 hover:bg-slate-200 text-slate-700 font-medium text-sm rounded-lg border border-slate-300 transition flex items-center gap-2">
                            <i class="fas fa-undo"></i> Return
                        </button>
                        <button type="button" class="px-4 py-2 bg-slate-100 hover:bg-slate-200 text-slate-700 font-medium text-sm rounded-lg border border-slate-300 transition flex items-center gap-2">
                            <i class="fas fa-folder-plus"></i> Request Documents
                        </button>
                        <button type="button" class="px-4 py-2 bg-slate-100 hover:bg-slate-200 text-slate-700 font-medium text-sm rounded-lg border border-slate-300 transition flex items-center gap-2">
                            <i class="fas fa-comment-dots"></i> Add Remarks
                        </button>
                        <button type="button" class="px-4 py-2 bg-red-600 hover:bg-red-700 text-white font-medium text-sm rounded-lg transition flex items-center gap-2 shadow-sm">
                            <i class="fas fa-times-circle"></i> Reject
                        </button>
                    </div>
                </div>

            </div>

            <!-- RIGHT COLUMN: Timeline Sidebar -->
            <div class="space-y-6 sticky">

                <div class="gov-card p-6">
                    <h3 class="text-base font-bold text-[#1e4d7b] mb-4 flex items-center justify-between pb-2">
                        <span class="flex items-center gap-2">
                            <i class="fas fa-stream text-[#e58500]"></i> Timeline
                        </span>
                    </h3>

                    <div class="space-y-6 relative before:absolute before:left-[15px] before:top-2 before:bottom-2 before:w-[2px] before:bg-slate-200">
                        
                        <div class="flex items-start gap-3 relative">
                            <div class="w-8 h-8 rounded-full bg-emerald-500 text-white flex items-center justify-center text-xs ring-4 ring-emerald-50 z-10 shrink-0">
                                <i class="fas fa-check"></i>
                            </div>
                            <div>
                                <h4 class="text-sm font-bold text-slate-800">Application Submitted</h4>
                                <p class="text-xs text-slate-500 mt-0.5">Submitted by applicant</p>
                                <span class="text-[10px] text-slate-400 block mt-1">
                                    ${request.created_at ? new Date(request.created_at).toLocaleString('en-GB') : 'Completed'}
                                </span>
                            </div>
                        </div>

                        <div class="flex items-start gap-3 relative">
                            <div class="w-8 h-8 rounded-full ${request.status !== 'pending' ? 'bg-emerald-500 text-white' : 'bg-[#1e4d7b] text-white ring-4 ring-blue-50'} flex items-center justify-center text-xs z-10 shrink-0">
                                <i class="fas ${request.status !== 'pending' ? 'fa-check' : 'fa-spinner fa-spin'}"></i>
                            </div>

                            <div class="flex-1">
                                <h4 class="text-sm font-bold ${request.status !== 'pending' ? 'text-slate-800' : 'text-[#1e4d7b]'}">
                                    Dealing Hand Verification
                                </h4>

                                <p class="text-xs text-slate-500 mt-0.5">
                                    Verification of uploaded documents
                                </p>

                                <!-- Info Box -->
                                <div class="mt-3 rounded-lg border border-blue-200 bg-blue-50 p-1">
                                    <p class="text-slate-500 mt-1 timeline-comment">
                                        Documents are under verification.
                                    </p>
                      
                                </div>

                            </div>
                        </div>

                        <div class="flex items-start gap-3 relative">
                            <div class="w-8 h-8 rounded-full ${request.status === 'approved' || request.status === 'completed' ? 'bg-emerald-500 text-white' : request.status === 'rejected' ? 'bg-red-500 text-white' : 'bg-slate-100 border-2 border-slate-300 text-slate-400'} flex items-center justify-center text-xs z-10 shrink-0">
                                <i class="fas ${request.status === 'approved' || request.status === 'completed' ? 'fa-check' : request.status === 'rejected' ? 'fa-times' : 'fa-stamp'}"></i>
                            </div>
                            <div>
                                <h4 class="text-sm font-bold ${request.status === 'approved' || request.status === 'completed' ? 'text-slate-800' : request.status === 'rejected' ? 'text-red-600' : 'text-slate-400'}">
                                    ${request.status === 'rejected' ? 'Application Rejected' : 'Competent Authority Approval'}
                                </h4>
                                <p class="text-xs text-slate-400 mt-0.5">Final approval & NOC clearance</p>
                            </div>
                        </div>

                        <div class="flex items-start gap-3 relative">
                            <div class="w-8 h-8 rounded-full ${request.status === 'completed' ? 'bg-emerald-500 text-white' : 'bg-slate-100 border-2 border-slate-300 text-slate-400'} flex items-center justify-center text-xs z-10 shrink-0">
                                <i class="fas ${request.status === 'completed' ? 'fa-check-double' : 'fa-flag'}"></i>
                            </div>
                            <div>
                                <h4 class="text-sm font-bold ${request.status === 'completed' ? 'text-slate-800' : 'text-slate-400'}">Jammer Deployment Complete</h4>
                                <p class="text-xs text-slate-400 mt-0.5">Vendor deployment report received</p>
                            </div>
                        </div>

                        
                    </div>

                    <hr class="m-5">
                    <p class="text-sm text-slate-700">
                        <i class="fas fa-info-circle text-blue-600 mr-2"></i>
                        <strong>Next Stage:</strong>
                        <span class="font-semibold text-[#1e4d7b]">Under Secretary</span>
                    </p>
                    
                </div>

            </div>

        </div>

    </div>
    `;
}
</script>
<?php
$page_content = ob_get_clean();
include dirname(__DIR__) . '/dashboard.php';
?>