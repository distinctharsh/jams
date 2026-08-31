<!-- MAIN LAYOUT: sidebar + content -->
<style>
/* Sidebar Section Header */
.sidebar-section-header {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 5px 10px 8px;
    margin-bottom: 8px;
}

/* Main Label */
.sidebar-section-title {
    display: flex;
    align-items: center;
    gap: 3px;
    font-size: 14px;
    font-weight: 800;
    text-transform: uppercase;
    letter-spacing: 0.12em;
    color: #1e4d7b;
    white-space: nowrap;
}

.sidebar-section-title i {
    font-size: 8px;
    opacity: 0.75;
}

/* Toggle Button */
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

.sidebar-toggle-btn i {
    font-size: 10px;
    transition: transform 0.25s ease;
}

.sidebar-toggle-btn:hover {
    background: #f1f5f9;
    border-color: #cbd5e1;
    color: #1e4d7b;
    transform: translateY(-1px);
}

.sidebar-toggle-btn:active {
    transform: scale(0.94);
}

/* Collapsed Sidebar */
.gov-sidebar.collapsed .sidebar-section-header {
    justify-content: center;
    padding-left: 0;
    padding-right: 0;
}

.gov-sidebar.collapsed .sidebar-section-title {
    display: none;
}

.gov-sidebar.collapsed .sidebar-toggle-btn i {
    transform: rotate(180deg);
}
.sidebar-section-header {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 0 12px;
}

.sidebar-section-title {
    display: flex;
    align-items: center;
    gap: 6px;
    font-size: 11px;
    font-weight: 700;
}

.sidebar-section-title i {
    font-size: 15px;   /* Dashboard icon bigger */
}

.sidebar-toggle-btn {
    width: 32px;
    height: 32px;
    min-width: 32px;
    border: none;
    border-radius: 7px;
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    font-size: 17px;   /* Toggle icon bigger */
    transition: all 0.2s ease;
}

.sidebar-toggle-btn i {
    font-size: 17px;
}

.sidebar-toggle-btn:hover {
    transform: scale(1.05);
}
</style>
<div class="flex flex-1 overflow-hidden">
  <!-- SIDEBAR -->
    <aside class="gov-sidebar">
    <div>
        <div class="sidebar-section-header">
            <a href="#" onclick="showPage('dashboard')" class="sidebar-section-title nav-label">
                <i class="fas fa-layer-group me-1"></i>
               Dashboard
            </a>
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
        <!-- <a href="#" class="nav-item active" onclick="showPage('dashboard')"><i class="fas fa-gauge-high"></i> <span>Dashboard</span></a> -->
        <a href="#" class="nav-item booking-btn" onclick="showPage('new-request')">
            <i class="fas fa-calendar-check"></i>
            <span>New Request</span>
        </a>
        <a href="/requests" class="nav-item" onclick="showPage('requests')"><i class="fas fa-clipboard-list"></i> <span>Requests <span class="badge" id="request-count">0</span></span></a>
        <a href="/analytics" class="nav-item" onclick="showPage('analytics')"><i class="fas fa-chart-simple"></i> <span>Reports</span></a>
        <div class="text-[9px] font-bold text-slate-400 uppercase tracking-wider px-3 mt-6 mb-2 nav-label">System</div>
        <a href="/settings" class="nav-item" onclick="showPage('settings')"><i class="fas fa-sliders"></i> <span>Settings</span></a>
        <a href="/audit-log" class="nav-item" onclick="showPage('audit-log')"><i class="fas fa-shield-halved"></i> <span>Audit Log</span></a>
        <div class="text-[9px] font-bold text-slate-400 uppercase tracking-wider px-3 mt-6 mb-2 nav-label">Admin</div>
        <a href="/registration" class="nav-item" onclick="showPage('registration')"><i class="fas fa-id-card"></i> <span>Pending Registration</span></a>
        <a href="/users" class="nav-item" onclick="showPage('users')"><i class="fas fa-users"></i> <span>Users</span></a>
        <a href="/organization" class="nav-item" onclick="showPage('organization')"><i class="fa-solid fa-sitemap"></i> <span>Manage Organization</span></a>
        <a href="/organization-type" class="nav-item" onclick="showPage('organization-type')"><i class="fa-solid fa-layer-group"></i> <span>Organization Types</span></a>
        <a href="/vendor" class="nav-item" onclick="showPage('vendor')"><i class="fas fa-handshake"></i> <span>Vendor</span></a>
        <a href="/model" class="nav-item" onclick="showPage('model')"><i class="fas fa-microchip"></i> <span>Model</span></a>
        <a href="/designation" class="nav-item" onclick="showPage('designation')"><i class="fas fa-user-tag"></i> <span>Designation</span></a>
        </nav>
    </div>
    </aside>

  <!-- MAIN CONTENT -->
  <div class="main-content" id="mainContent">
    <!-- Dashboard Content -->
    <div id="dashboard" class="page-content active">
        <?php include APPPATH.'Views/pages/dashboard.php'; ?>
    </div>
    
    <!-- New Request Content -->
    <div id="new-request" class="page-content">
        <?php include APPPATH.'Views/pages/new-request.php'; ?>
    </div>
    
    <!-- Requests Content -->
    <div id="requests" class="page-content">
        <?php 
        $requestModel = new \App\Models\RequestModel();
        $requestData['requests'] = $requestModel->getAllRequests();
        $requestCount = count($requestData['requests']);
        echo view('pages/requests-content', $requestData);
        ?>
    </div>
    
    <!-- Analytics Content -->
    <div id="analytics" class="page-content">
        <?php include APPPATH.'Views/pages/analytics.php'; ?>
    </div>
    
    <!-- Settings Content -->
    <div id="settings" class="page-content">
        <?php include APPPATH.'Views/pages/settings.php'; ?>
    </div>
    
    <!-- Audit Log Content -->
    <div id="audit-log" class="page-content">
        <?php include APPPATH.'Views/pages/audit-log.php'; ?>
    </div>
    
    <!-- View Request Content -->
    <div id="view-request" class="page-content">
        <div id="view-request-content">
            <?php 
            if (session()->getFlashdata('show_view_request') && session()->getFlashdata('current_request')) {
                $requestData['request'] = session()->getFlashdata('current_request');
                echo view('pages/view-request', $requestData);
            }
            ?>
        </div>
    </div>

    <!-- Users Content -->
    <div id="users" class="page-content">
        <?php 
        $userModel    = new \App\Models\UserModel();
        $orgModel     = new \App\Models\OrganizationModel();
        $orgTypeModel = new \App\Models\OrgTypeModel();
        $designationModel = new \App\Models\DesignationModel();
        $roleModel        = new \App\Models\RoleModel();

        $userData['users']         = $userModel->getAllUsers();
        $userData['organizations'] = $orgModel->getAllOrganizations();
        $userData['orgTypes']      = $orgTypeModel->getAllOrgTypes();
        $userData['designations']  = $designationModel->findAll();
        $userData['roles']         = $roleModel->findAll();

        echo view('pages/users', $userData);
        ?>
    </div>

    <!-- Registration Content -->
    <div id="registration" class="page-content">
        <?php 
        $regModel     = new \App\Models\RegistrationModel();
        $orgModel     = new \App\Models\OrganizationModel();
        $orgTypeModel = new \App\Models\OrgTypeModel();

        $regData['registrations'] = $regModel->getRegistrationsWithDetails();
        $regData['organizations'] = $orgModel->getAllOrganizations();
        $regData['orgTypes']      = $orgTypeModel->getAllOrgTypes();

        echo view('pages/registrations', $regData);
        ?>
    </div>


    <!-- Designation Content -->
    <div id="designation" class="page-content">
        <?php 
        $desModel = new \App\Models\DesignationModel();
        $desData['designations'] = $desModel->getAllDesignations();

        echo view('pages/designation', $desData);
        ?>
    </div>
    
    <!-- Organization Content -->
    <div id="organization" class="page-content">
        <?php 
        $orgModel = new \App\Models\OrganizationModel();
        $orgTypeModel = new \App\Models\OrgTypeModel();

        $orgData['organizations'] = $orgModel->getAllOrganizations();
        $orgData['orgTypes']      = $orgTypeModel->getAllOrgTypes();

        echo view('pages/organization', $orgData);
        ?>
    </div>

    <!-- Organization Type Content -->
    <div id="organization-type" class="page-content">
        <?php 
        $orgTypeModel = new \App\Models\OrgTypeModel();
        $orgTypeData['orgTypes'] = $orgTypeModel->getAllOrgTypes();
        echo view('pages/organization-type', $orgTypeData);
        ?>
    </div>

    <!-- Vendor Content -->
    <div id="vendor" class="page-content">
        <?php 
        $vendorModel = new \App\Models\VendorModel();
        $vendorData['vendors'] = $vendorModel->getAllVendors();
        echo view('pages/vendor', $vendorData);
        ?>
    </div>

    <!-- Model Content -->
    <div id="model" class="page-content">
        <?php 
        $modelModel = new \App\Models\ModelModel();
        $modelData['models'] = $modelModel->getAllModels();
        echo view('pages/model', $modelData);
        ?>
    </div>

    <!-- Change Password Content Container -->
    <div id="change-password" class="page-content">
        <?php include APPPATH.'Views/pages/change-password.php'; ?>
    </div>

  </div>
</div>

<head>
    <script src="<?= base_url('assets/js/jquery-3.7.0.min.js') ?>"></script>
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