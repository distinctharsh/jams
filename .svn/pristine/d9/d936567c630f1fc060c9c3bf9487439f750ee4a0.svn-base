<?php
ob_start();
?>
<?php 
    $roleIds = session()->get('role_ids') ?? '';
    $userRoles = array_map('intval', array_filter(explode(',', $roleIds)));
    $hasRole = function (array $roles) use ($userRoles): bool {
        return !empty(array_intersect($roles, $userRoles));
    };
?>

<?php if (session()->getFlashdata('success')): ?>
<div class="booking-alert !bg-green-50 !border-green-500">
    <div class="alert-icon !bg-green-500">
        <i class="fas fa-check"></i>
    </div>
    <div class="alert-content">
        <h6>Success</h6>
        <p><?= session()->getFlashdata('success') ?></p>
    </div>
</div>
<?php endif; ?>

<?php if (session()->getFlashdata('error')): ?>
<div class="booking-alert !bg-red-50 !border-red-500">
    <div class="alert-icon !bg-red-500">
        <i class="fas fa-exclamation-triangle"></i>
    </div>
    <div class="alert-content">
        <h6>Error</h6>
        <p><?= session()->getFlashdata('error') ?></p>
    </div>
</div>
<?php endif; ?>

<style>
    .calendar-cell {
        display: flex;
        align-items: center;
        justify-content: center;
        height: 32px;
        font-size: 11px;
        font-weight: 600;
        border-radius: 6px;
        cursor: pointer;
        color: #334155;
        transition: all 0.2s ease;
        user-select: none;
    }
    .calendar-cell:hover:not(.fade) {
        background-color: #f1f5f9;
    }
    .calendar-cell.fade {
        color: #cbd5e1;
        cursor: default;
    }
    .calendar-cell.event-exam {
        background-color: #fef3c7 !important;
        color: #d97706 !important;
        border: 1px solid #f59e0b !important;
    }
    .calendar-cell.is-today {
        border: 2px solid #1e4d7b;
    }
    .calendar-cell.active-date {
        background-color: #1e4d7b !important;
        color: #ffffff !important;
        font-weight: bold;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.15);
        border: none !important;
    }
    .upcoming-div {
        height: 300px;
        overflow-y: auto;
        padding-right: 4px;
    }
</style>

<section class="stats-grid">
    <div class="stat-card total">
        <div class="stat-icon"><i class="fas fa-calendar-check"></i></div>
        <div class="stat-content">
            <span class="stat-title">Total Jammer Request</span>
            <h2>1,248</h2>
            <p><i class="fas fa-arrow-up"></i> 12% this month</p>
        </div>
    </div>

    <div class="stat-card pending">
        <div class="stat-icon"><i class="fas fa-clock"></i></div>
        <div class="stat-content">
            <span class="stat-title">Pending</span>
            <h2>42</h2>
            <p><i class="fas fa-hourglass-half"></i> 2% Remaining</p>
        </div>
    </div>

    <div class="stat-card completed">
        <div class="stat-icon"><i class="fas fa-check-circle"></i></div>
        <div class="stat-content">
            <span class="stat-title">Completed</span>
            <h2>1,186</h2>
            <p><i class="fas fa-arrow-up"></i> 8% Growth</p>
        </div>
    </div>

    <div class="stat-card flagged">
        <div class="stat-icon"><i class="fas fa-flag"></i></div>
        <div class="stat-content">
            <span class="stat-title">Rejected</span>
            <h2>20</h2>
            <p><i class="fas fa-exclamation-circle"></i> Needs Review</p>
        </div>
    </div>

    <div class="stat-card assigned-to-me">
        <div class="stat-icon"><i class="fas fa-user-gear"></i></div>
        <div class="stat-content">
            <span class="stat-title">Pending with Me</span>
            <h2>20</h2>
            <p><i class="fas fa-spinner"></i> In Progress</p>
        </div>
    </div>
</section>

<div class="grid grid-cols-1 xl:grid-cols-12 gap-6 items-start">
    <div class="xl:col-span-8">
        <div class="gov-card overflow-hidden">
            <div class="px-5 py-4 flex items-center justify-between border-b border-slate-100">
                <div class="flex items-center gap-3">
                    <i class="fas fa-list-check text-[#1e4d7b] text-xl"></i>
                    <h2 class="text-base font-bold text-[#1e4d7b]">Pending Requests</h2>
                </div>
                <button class="btn-orange text-xs px-4 py-1.5" onclick="location.reload();">
                    <i class="fas fa-rotate-right"></i> Refresh
                </button>
            </div>
            <div class="overflow-x-auto p-4">
                <table class="w-full text-sm gov-table rounded-lg overflow-hidden" id="dashboardRequestsTable">
                    <thead class="bg-[#1e4d7b] text-white">
                        <tr>
                            <th class="px-5 py-3.5 text-left font-semibold uppercase tracking-wider text-xs">Request ID</th>
                            <th class="px-5 py-3.5 text-left font-semibold uppercase tracking-wider text-xs">Organisation</th>
                            <th class="px-5 py-3.5 text-left font-semibold uppercase tracking-wider text-xs">Exam Name</th>
                            <th class="px-5 py-3.5 text-left font-semibold uppercase tracking-wider text-xs">Exam Date</th>
                            <th class="px-5 py-3.5 text-left font-semibold uppercase tracking-wider text-xs">Status</th>
                            <th class="px-5 py-3.5 text-right pr-6 font-semibold uppercase tracking-wider text-xs">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100 bg-white text-slate-700">
                        <?php if (!empty($requests) && is_array($requests)): ?>
                            <?php foreach ($requests as $request): ?>
                                <tr class="hover:bg-slate-50 transition-colors duration-150">
                                    <td class="px-5 py-4 font-bold text-[#1e4d7b]">
                                        <?= esc($request['app_no'] ?? '#' . str_pad($request['id'], 4, '0', STR_PAD_LEFT)) ?>
                                    </td>
                                    
                                    <td class="px-5 py-4 font-bold text-slate-800">
                                        <?= !empty($request['organisation']) ? esc($request['organisation']) : 'N/A' ?>
                                    </td>

                                    <td class="px-5 py-4 font-semibold text-slate-800">
                                        <?php 
                                        if (!empty($request['exam_names'])) {
                                            $names = array_unique(explode('||', $request['exam_names']));
                                            foreach ($names as $name) {
                                                echo '<div class="leading-tight mb-1 last:mb-0">' . esc($name) . '</div>';
                                            }
                                        } else {
                                            echo 'N/A';
                                        }
                                        ?>
                                    </td>
                                    
                                    <td class="px-5 py-4 text-slate-600 font-medium">
                                        <?php 
                                        if (!empty($request['exam_dates'])) {
                                            $dates = explode('||', $request['exam_dates']);
                                            foreach ($dates as $d) {
                                                if (!empty($d) && $d !== '0000-00-00 00:00:00') {
                                                    echo '<div class="leading-tight mb-1 last:mb-0">' . date('d/m/Y', strtotime($d)) . '</div>';
                                                }
                                            }
                                        } else {
                                            echo 'N/A';
                                        }
                                        ?>
                                    </td>

                                    <td class="px-5 py-4 text-left">
                                        <?php 
                                        $statusName  = $request['status_name'] ?? 'Pending';
                                        $statusClass = 'bg-blue-50 text-blue-700 border-blue-500';
                                        $statusIcon  = 'fa-info-circle';

                                        if (stristr($statusName, 'approve')) {
                                            $statusClass = 'bg-emerald-50 text-emerald-700 border-emerald-500';
                                            $statusIcon  = 'fa-check-circle';
                                        } elseif (stristr($statusName, 'reject')) {
                                            $statusClass = 'bg-red-50 text-red-700 border-red-500';
                                            $statusIcon  = 'fa-times-circle';
                                        } elseif (stristr($statusName, 'pend') || stristr($statusName, 'submit')) {
                                            $statusClass = 'bg-amber-50 text-amber-700 border-amber-500';
                                            $statusIcon  = 'fa-clock';
                                        }
                                        ?>
                                        <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-lg border-l-4 <?= $statusClass ?> font-semibold text-xs shadow-sm">
                                            <i class="fas <?= $statusIcon ?>"></i>
                                            <?= esc($statusName) ?>
                                        </span>
                                    </td>

                                    <td class="px-5 py-4 text-right pr-6">
                                        <div class="flex justify-end items-center gap-1.5">
                                            <a href="<?= base_url('requests/view/' . $request['id']) ?>" 
                                            class="w-9 h-9 rounded-lg bg-blue-50 text-blue-700 hover:bg-blue-100 transition inline-flex items-center justify-center" 
                                            title="View">
                                                <i class="fas fa-eye"></i>
                                            </a>

                                            <?php if ($hasRole([1])): ?>
                                                <a href="<?= base_url('requests/edit/' . $request['id']) ?>" 
                                                class="w-9 h-9 rounded-lg bg-yellow-50 text-yellow-700 hover:bg-yellow-100 transition inline-flex items-center justify-center" 
                                                title="Edit">
                                                    <i class="fas fa-pen-to-square"></i>
                                                </a>
                                            <?php endif; ?>

                                            <?php if ($hasRole([2, 6])): ?>
                                                <button type="button" 
                                                        class="w-9 h-9 rounded-lg bg-emerald-50 text-emerald-700 hover:bg-emerald-100 transition inline-flex items-center justify-center" 
                                                        title="Approve" 
                                                        onclick="approveRequest(<?= $request['id'] ?>)">
                                                    <i class="fas fa-check"></i>
                                                </button>

                                                <button type="button" 
                                                        class="w-9 h-9 rounded-lg bg-rose-50 text-rose-700 hover:bg-rose-100 transition inline-flex items-center justify-center" 
                                                        title="Reject" 
                                                        onclick="rejectRequest(<?= $request['id'] ?>)">
                                                    <i class="fas fa-xmark"></i>
                                                </button>
                                            <?php endif; ?>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="6" class="text-center py-4 text-slate-400">No pending requests found.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="xl:col-span-4">
        <div class="sticky top-6">
            <div class="gov-card p-5">
                <div class="flex items-center justify-between mb-3">
                    <h3 class="font-bold text-[#1e4d7b] flex items-center gap-2 text-sm">
                        <i class="fas fa-calendar-alt text-[#e58500]"></i>
                        <span id="cal-month-title">Schedule</span>
                    </h3>
                    <div class="flex gap-1">
                        <button id="cal-prev" class="w-6 h-6 rounded border border-slate-200 text-slate-400 hover:bg-slate-50 transition">
                            <i class="fas fa-chevron-left text-xs"></i>
                        </button>
                        <button id="cal-next" class="w-6 h-6 rounded border border-slate-200 text-slate-400 hover:bg-slate-50 transition">
                            <i class="fas fa-chevron-right text-xs"></i>
                        </button>
                    </div>
                </div>

                <div class="grid grid-cols-7 gap-1 text-center text-[8px] font-bold text-slate-400 uppercase tracking-widest mb-1">
                    <span>M</span><span>T</span><span>W</span><span>T</span><span>F</span><span>S</span><span>S</span>
                </div>

                <div id="cal-grid" class="grid grid-cols-7 gap-1"></div>

                <div class="upcoming-div mt-4 space-y-2">
                    <div class="flex items-center justify-between mb-2">
                        <div id="deployment-header-title" class="text-[10px] font-bold text-slate-400 uppercase tracking-wider">Upcoming Deployments</div>
                        <button id="reset-filter-btn" class="text-[10px] text-blue-600 hover:underline hidden">Show All</button>
                    </div>

                    <div id="deployments-container" class="space-y-2"></div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="<?= base_url('assets/js/jquery-3.7.0.min.js') ?>"></script>
<script src="<?= base_url('assets/js/jquery.dataTables.min.js') ?>"></script>

<script>
$(document).ready(function() {
    if ($.fn && $.fn.DataTable) {
        $('#dashboardRequestsTable').DataTable({
            "dom": 'rtip',
            "pageLength": 5,
            "lengthChange": false,
            "responsive": true,
            "autoWidth": false,
            "language": {
                "paginate": {
                    "previous": "<i class='fas fa-chevron-left text-xs'></i>",
                    "next": "<i class='fas fa-chevron-right text-xs'></i>"
                }
            }
        });
    }
});

document.addEventListener('DOMContentLoaded', function () {
    const examDatesMap = <?= json_encode($exam_dates_map ?? (object)[]) ?>;

    let today = new Date();
    let currMonth = today.getMonth();
    let currYear = today.getFullYear();
    let selectedDateStr = null;

    const monthNames = [
        "January", "February", "March", "April", "May", "June", 
        "July", "August", "September", "October", "November", "December"
    ];

    const monthShortNames = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];

    function formatDateFormatted(dateString) {
        const d = new Date(dateString);
        if (isNaN(d)) return dateString;
        const day = String(d.getDate()).padStart(2, '0');
        const month = monthShortNames[d.getMonth()];
        const year = d.getFullYear();
        return `${day} ${month} ${year}`;
    }

    function renderDeploymentsList(exams, filterTitle = null) {
        const container = document.getElementById('deployments-container');
        const headerTitle = document.getElementById('deployment-header-title');
        const resetBtn = document.getElementById('reset-filter-btn');

        if (filterTitle) {
            headerTitle.textContent = filterTitle;
            resetBtn.classList.remove('hidden');
        } else {
            headerTitle.textContent = 'Upcoming Deployments';
            resetBtn.classList.add('hidden');
        }

        container.innerHTML = '';

        if (!exams || exams.length === 0) {
            container.innerHTML = `
                <div class="p-4 text-center text-slate-400 text-xs bg-slate-50 rounded-xl border border-dashed border-slate-200">
                    No scheduled exams found.
                </div>`;
            return;
        }

        exams.forEach(exam => {
            const formattedDate = formatDateFormatted(exam.event_date);
            const examTitle = exam.exam_name || 'Scheduled Exam';
            const displayAppNo = exam.app_no ? exam.app_no : '';

            const cardHTML = `
                <a href="#" class="block p-3 bg-slate-50 border border-slate-100 rounded-xl hover:border-slate-300 transition-colors">
                    <div class="flex items-center gap-2 mb-1">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-radio size-3.5 shrink-0 text-primary" aria-hidden="true">
                            <path d="M16.247 7.761a6 6 0 0 1 0 8.478"></path>
                            <path d="M19.075 4.933a10 10 0 0 1 0 14.134"></path>
                            <path d="M4.925 19.067a10 10 0 0 1 0-14.134"></path>
                            <path d="M7.753 16.239a6 6 0 0 1 0-8.478"></path>
                            <circle cx="12" cy="12" r="2"></circle>
                        </svg>
                        <span class="text-xs font-semibold text-slate-800">${examTitle}</span>
                    </div>
                    <div class="flex items-center gap-2 text-[11px] text-slate-500">
                        <span>${formattedDate}</span>
                        <span>•</span>
                        <span class="bg-slate-200/60 text-slate-700 px-1.5 py-0.5 rounded text-[10px] font-medium">${displayAppNo}</span>
                    </div>
                </a>
            `;
            container.insertAdjacentHTML('beforeend', cardHTML);
        });
    }

    function getExamsForCurrentMonth(month, year) {
        let monthExams = [];
        const formatMonth = String(month + 1).padStart(2, '0');
        const prefix = `${year}-${formatMonth}`;

        Object.keys(examDatesMap).forEach(dateStr => {
            if (dateStr.startsWith(prefix)) {
                monthExams.push(...examDatesMap[dateStr]);
            }
        });

        monthExams.sort((a, b) => new Date(a.event_date) - new Date(b.event_date));
        return monthExams;
    }

    function renderCalendar(month, year) {
        const grid = document.getElementById('cal-grid');
        const title = document.getElementById('cal-month-title');
        grid.innerHTML = '';

        title.textContent = `${monthNames[month]} ${year}`;

        const firstDayIndex = (new Date(year, month, 1).getDay() + 6) % 7;
        const totalDays = new Date(year, month + 1, 0).getDate();
        const prevLastDay = new Date(year, month, 0).getDate();

        for (let x = firstDayIndex; x > 0; x--) {
            const dayDiv = document.createElement('div');
            dayDiv.className = 'calendar-cell fade';
            dayDiv.textContent = prevLastDay - x + 1;
            grid.appendChild(dayDiv);
        }

        for (let d = 1; d <= totalDays; d++) {
            const dayDiv = document.createElement('div');
            dayDiv.className = 'calendar-cell';
            dayDiv.textContent = d;

            const formatMonth = String(month + 1).padStart(2, '0');
            const formatDay = String(d).padStart(2, '0');
            const dateStr = `${year}-${formatMonth}-${formatDay}`;

            if (
                d === today.getDate() && 
                month === today.getMonth() && 
                year === today.getFullYear()
            ) {
                dayDiv.classList.add('is-today');
            }

            let hasExam = examDatesMap[dateStr] && examDatesMap[dateStr].length > 0;
            if (hasExam) {
                dayDiv.classList.add('event-exam');
            }

            if (selectedDateStr === dateStr) {
                dayDiv.classList.add('active-date');
            }

            dayDiv.addEventListener('click', function () {
                document.querySelectorAll('#cal-grid .calendar-cell').forEach(el => {
                    el.classList.remove('active-date');
                });
                dayDiv.classList.add('active-date');
                selectedDateStr = dateStr;

                const selectedExams = examDatesMap[dateStr] || [];
                renderDeploymentsList(selectedExams, `Exams for ${formatDateFormatted(dateStr)}`);
            });

            grid.appendChild(dayDiv);
        }

        const totalCellsRendered = firstDayIndex + totalDays;
        const remainingCells = (7 - (totalCellsRendered % 7)) % 7;
        for (let i = 1; i <= remainingCells; i++) {
            const dayDiv = document.createElement('div');
            dayDiv.className = 'calendar-cell fade';
            dayDiv.textContent = i;
            grid.appendChild(dayDiv);
        }

        if (!selectedDateStr) {
            const currentMonthExams = getExamsForCurrentMonth(month, year);
            renderDeploymentsList(currentMonthExams);
        }
    }

    document.getElementById('reset-filter-btn').addEventListener('click', function() {
        selectedDateStr = null;
        document.querySelectorAll('#cal-grid .calendar-cell').forEach(el => {
            el.classList.remove('active-date');
        });
        const currentMonthExams = getExamsForCurrentMonth(currMonth, currYear);
        renderDeploymentsList(currentMonthExams);
    });

    document.getElementById('cal-prev').addEventListener('click', function () {
        currMonth--;
        if (currMonth < 0) {
            currMonth = 11;
            currYear--;
        }
        selectedDateStr = null;
        renderCalendar(currMonth, currYear);
    });

    document.getElementById('cal-next').addEventListener('click', function () {
        currMonth++;
        if (currMonth > 11) {
            currMonth = 0;
            currYear++;
        }
        selectedDateStr = null;
        renderCalendar(currMonth, currYear);
    });

    renderCalendar(currMonth, currYear);
});
</script>

<?php
$page_content = ob_get_clean();
include dirname(__DIR__) . '/dashboard.php';
?>