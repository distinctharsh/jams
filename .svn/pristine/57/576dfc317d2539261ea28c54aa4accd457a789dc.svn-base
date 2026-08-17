<!-- MAIN LAYOUT: sidebar + content -->
<div class="flex flex-1 overflow-hidden">
  <!-- SIDEBAR -->
    <aside class="gov-sidebar">
    <div>
        <div class="flex items-center justify-between px-3 mb-3 pt-1">
        <span class="text-[9px] font-bold text-slate-400 uppercase tracking-wider nav-label">Main</span>
        <div class="icon-btn sidebar-toggle-btn" id="sidebarToggleBtn" onclick="toggleSidebar()" title="Toggle Sidebar">
            <i class="fas fa-xmark" id="toggleIcon"></i>
        </div>
        </div>

        <nav>
        <a href="#" class="nav-item active" onclick="showPage('dashboard')"><i class="fas fa-gauge-high"></i> <span>Dashboard</span></a>
        <a href="#" class="nav-item booking-btn" onclick="showPage('new-request')">
            <i class="fas fa-calendar-check"></i>
            <span>New Request</span>
        </a>
        <a href="#" class="nav-item" onclick="showPage('requests')"><i class="fas fa-clipboard-list"></i> <span>Requests <span class="badge" id="request-count">0</span></span></a>
        <a href="#" class="nav-item" onclick="showPage('users')"><i class="fas fa-users"></i> <span>Users</span></a>
        <a href="#" class="nav-item" onclick="showPage('analytics')"><i class="fas fa-chart-simple"></i> <span>Analytics</span></a>
        <div class="text-[9px] font-bold text-slate-400 uppercase tracking-wider px-3 mt-6 mb-2 nav-label">System</div>
        <a href="#" class="nav-item" onclick="showPage('settings')"><i class="fas fa-sliders"></i> <span>Settings</span></a>
        <a href="#" class="nav-item" onclick="showPage('audit-log')"><i class="fas fa-shield-halved"></i> <span>Audit Log</span></a>
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
    
    <!-- Users Content -->
    <div id="users" class="page-content">
        <?php include APPPATH.'Views/pages/users.php'; ?>
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
  </div>
</div>