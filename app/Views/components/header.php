<!-- HEADER (deep blue #1e4d7b + orange #e58500) -->
<header class="gov-header">
  <div class="brand">
    <!-- Emblem + Cabinet Secretariat branding — BIGGER & BOLDER -->
    <div class="emblem-wrapper">
      <img src="<?= base_url('assets/image/Emblem_of_India.svg.webp') ?>" alt="Government of India Emblem">
      <div class="cabinet-text">
        <span class="hindi">मंत्रिमंडल सचिवालय</span>
        <span class="english">Cabinet Secretariat</span>
        <span class="gov-india">Government of India</span>
      </div>
    </div>
    </div>
    <div class="header-actions">
        <div class="icon-btn back-btn" onclick="history.back()">
            <i class="fas fa-arrow-left"></i>
        </div>
        <button class="btn-orange" onclick="showPage('new-request')">
            <i class="fas fa-plus"></i> New Request
        </button>
        <div class="relative" id="notificationDropdown">
            <div class="icon-btn relative" id="bellIconBtn">
                <i class="far fa-bell"></i>
                <span class="dot"></span>
            </div>

            <div class="notification-popover" id="notificationMenu">
                <div class="notif-header">
                <div class="flex items-center justify-between">
                    <h4 class="font-bold text-slate-800 text-sm flex items-center gap-2">
                    <i class="fa-solid fa-bell text-[#e58500]"></i> Notifications
                    </h4>
                    <span class="bg-amber-100 text-[#e58500] text-[10px] font-bold px-2 py-0.5 rounded-full">3 New</span>
                </div>
                </div>

                <div class="notif-body">
                <a href="#" class="notif-item unread">
                    <div class="notif-icon bg-amber-50 text-[#e58500]">
                    <i class="fas fa-user-plus text-xs"></i>
                    </div>
                    <div class="notif-content">
                    <p class="notif-title">New User Registration</p>
                    <p class="notif-sub">A new user account request is pending for approval.</p>
                    <span class="notif-time">2 mins ago</span>
                    </div>
                </a>

                <a href="#" class="notif-item unread">
                    <div class="notif-icon bg-blue-50 text-[#1e4d7b]">
                    <i class="fas fa-file-signature text-xs"></i>
                    </div>
                    <div class="notif-content">
                    <p class="notif-title">New Request Submitted</p>
                    <p class="notif-sub">Request #1024 updated by Cabinet Division.</p>
                    <span class="notif-time">1 hour ago</span>
                    </div>
                </a>

                <a href="#" class="notif-item">
                    <div class="notif-icon bg-emerald-50 text-emerald-600">
                    <i class="fas fa-check-circle text-xs"></i>
                    </div>
                    <div class="notif-content">
                    <p class="notif-title">Approval Completed</p>
                    <p class="notif-sub">User authorization document successfully verified.</p>
                    <span class="notif-time">Yesterday</span>
                    </div>
                </a>
                </div>

                <div class="notif-footer">
                <a href="#">Mark all as read</a>
                <a href="#" class="text-[#1e4d7b]">View All</a>
                </div>
            </div>
        </div>

      <div class="relative" id="profileDropdown">
        <button class="profile-trigger" onclick="toggleDropdown()">
            <div class="profile-avatar">
                <i class="fas fa-user"> </i>
            </div>
            <div class="profile-details">
                <span class="profile-name"><?= esc(session()->get('full_name')) ?></span>
                <span class="profile-role">Administrator</span>
            </div>
            <i class="fas fa-chevron-down dropdown-arrow"></i>
        </button>
        <div class="dropdown-menu-gov" id="dropdownMenu">
            <div class="dropdown-user">
                <h5><?= esc(session()->get('full_name')) ?></h5>
                <small>Cabinet Secretariat</small>

            </div>
            <a href="#">
                <i class="fas fa-user-circle"></i>
                <span>My Profile</span>
            </a>
            <a href="#">
                <i class="fas fa-key"></i>
                <span>Change Password</span>
            </a>
            <a href="#">
                <i class="fas fa-gear"></i>
                <span>Settings</span>
            </a>
            <div class="dropdown-divider"></div>
            <a href="<?= base_url('logout') ?>" class="logout">
                <i class="fas fa-right-from-bracket"></i>
                <span>Logout</span>
            </a>
        </div>
      </div>
    </div>
</header>