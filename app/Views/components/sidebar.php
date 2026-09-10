<style>
.sidebar-top-bar {
    display: flex;
    align-items: center;
    padding: 10px 14px;
}

.sidebar-toggle-btn {
    width: 27px;
    height: 27px;
    min-width: 27px;
    border: 1px solid #e2e8f0;
    border-radius: 8px;
    background: #cc7700;
    color: #fff;
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    transition: all 0.2s ease;
    box-shadow: 0 1px 2px rgba(15, 23, 42, 0.05);
}

.sidebar-toggle-btn:hover {
    background: #f1f5f9;
    border-color: #cbd5e1;
    color: #1e4d7b;
    transform: translateY(-1px);
}

.sidebar-category-header {
    font-size: 14px;
    font-weight: 800;
    color: #334155;
    text-transform: uppercase;
    letter-spacing: 0.08em;
    padding: 8px 12px;
    margin-top: 18px;
    margin-bottom: 8px;
    border-bottom: 2px solid #cbd5e1;
}

.dashboard-hr {
    border: none;
    border-bottom: 1px solid #cbd5e1; 
    margin: 8px 12px;
}

.gov-sidebar.collapsed .sidebar-top-bar {
    justify-content: center;
    padding: 10px 0;
}

.gov-sidebar.collapsed .sidebar-category-header {
    display: none;
}

.gov-sidebar.collapsed .sidebar-toggle-btn i {
    transform: rotate(180deg);
}
</style>

<div class="flex overflow-hidden">
    <aside class="gov-sidebar">
    <div>
        <div class="sidebar-top-bar">
            <button
                type="button"
                class="sidebar-toggle-btn"
                id="sidebarToggleBtn"
                onclick="toggleSidebar()"
                title="Toggle Sidebar"
                aria-label="Toggle Sidebar">
                <i class="fas fa-chevron-left" id="toggleIcon"></i>
            </button>
        </div>
        <nav>
            <?php 
            $roleIds = session()->get('role_ids') ?? '';
            $userRoles = array_map('intval', array_filter(explode(',', $roleIds)));
            $hasRole = function (array $roles) use ($userRoles): bool {
                return !empty(array_intersect($roles, $userRoles));
            };
            ?>

            <a href="<?= base_url('dashboard') ?>" class="nav-item">
                <i class="fas fa-layer-group"></i> 
                <span>Dashboard</span>
            </a>

            <hr class="dashboard-hr">

            <?php if ($hasRole([1])): ?>
                <a href="<?= base_url('new-request') ?>" class="nav-item booking-btn">
                    <i class="fas fa-calendar-check"></i>
                    <span>New Jammer Request</span>
                </a>
            <?php endif; ?>

            <?php if ($hasRole([1,2,3,4,5,6,7,9])): ?>
                <a href="<?= base_url('requests') ?>" class="nav-item">
                    <i class="fas fa-clipboard-list"></i> 
                    <span>
                        Total Request 
                    </span>
                </a>
            <?php endif; ?>

            <?php if ($hasRole([1,2,3,4,5,6,7,9])): ?>
                <a href="https://cabsec.gov.in/others/jammerpolicy/" target="_blank" class="nav-item">
                    <i class="fas fa-book-open"></i> 
                    <span>Jammer Guidelines</span>
                </a>
            <?php endif; ?>

            <?php if ($hasRole([1,2,3,4,5,6,7,9])): ?>
                <a href="<?= base_url('requests') ?>" class="nav-item">
                    <i class="fas fa-upload"></i> 
                    <span>Upload Center Lists</span>
                </a>
            <?php endif; ?>

            <?php if ($hasRole([1,2,3,4,5,6,7,8,9])): ?>
                <a href="<?= base_url('analytics') ?>" class="nav-item">
                    <i class="fas fa-chart-simple"></i> 
                    <span>Reports</span>
                </a>
            <?php endif; ?>

            <?php if ($hasRole([9])): ?>
                <div class="sidebar-category-header nav-label">System</div>
            <?php endif; ?>
            <?php if ($hasRole([9])): ?><a href="<?= base_url('settings') ?>" class="nav-item"><i class="fas fa-sliders"></i> <span>Settings</span></a><?php endif; ?>
            <?php if ($hasRole([9])): ?><a href="<?= base_url('audit-log') ?>" class="nav-item"><i class="fas fa-shield-halved"></i> <span>Audit Log</span></a><?php endif; ?>
            <?php if ($hasRole([9])): ?><a href="<?= base_url('audit-trail') ?>" class="nav-item"><i class="fas fa-history"></i> <span>Audit Trail</span></a><?php endif; ?>

            <?php if ($hasRole([4,9])): ?>
                <div class="sidebar-category-header nav-label">Admin</div>
            <?php endif; ?>
            <?php if ($hasRole([4,7,9])): ?><a href="<?= base_url('registrations') ?>" class="nav-item"><i class="fas fa-id-card"></i> <span>Pending Registration</span></a><?php endif; ?>
            <?php if ($hasRole([4,9])): ?><a href="<?= base_url('users') ?>" class="nav-item"><i class="fas fa-users"></i> <span>Users</span></a><?php endif; ?>
            <?php if ($hasRole([4,9])): ?><a href="<?= base_url('organizations') ?>" class="nav-item"><i class="fa-solid fa-sitemap"></i> <span>Manage Organization</span></a><?php endif; ?>
            <?php if ($hasRole([4,9])): ?><a href="<?= base_url('organization-types') ?>" class="nav-item"><i class="fa-solid fa-layer-group"></i> <span>Organization Types</span></a><?php endif; ?>
            <?php if ($hasRole([4,9])): ?><a href="<?= base_url('vendors') ?>" class="nav-item"><i class="fas fa-handshake"></i> <span>Vendor</span></a><?php endif; ?>
            <?php if ($hasRole([4,9])): ?><a href="<?= base_url('models') ?>" class="nav-item"><i class="fas fa-microchip"></i> <span>Model</span></a><?php endif; ?>
        </nav>
    </div>
    </aside>
</div>

<head>
    <script src="<?= base_url('assets/js/jquery.min.js') ?>"></script>
    <link rel="stylesheet" href="<?= base_url('assets/css/jquery.dataTables.min.css') ?>">

    <script src="<?= base_url('assets/js/jquery.dataTables.min.js') ?>"></script>
    <script src="<?= base_url('assets/js/dataTables.buttons.min.js') ?>"></script>
    <script src="<?= base_url('assets/js/jszip.min.js') ?>"></script>
    <script src="<?= base_url('assets/js/pdfmake.min.js') ?>"></script>
    <script src="<?= base_url('assets/js/vfs_fonts.js') ?>"></script>
    <script src="<?= base_url('assets/js/buttons.html5.min.js') ?>"></script>
    <script src="<?= base_url('assets/js/buttons.print.min.js') ?>"></script>
    <link rel="stylesheet" href="<?= base_url('assets/css/buttons.dataTables.min.css') ?>">
</head>