<?php
// Get CSRF token and name
$csrfName = csrf_token();
$csrfHash = csrf_hash();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Change Password - Cabinet Secretariat</title>
  <!-- Font Awesome 6 -->
  <link href="<?= base_url('assets/vendor/fontawesome-free/css/all.min.css') ?>" rel="stylesheet">
  <!-- Google Font: Inter -->
  <link rel="stylesheet" href="<?= base_url('assets/css/fonts.css') ?>">
  <script src="https://cdn.tailwindcss.com"></script>
  <meta name="csrf-token" content="gov-csrf-2026">
  
  <style>
    /* ========== BASE STYLES ========== */
    * { margin: 0; padding: 0; box-sizing: border-box; }
    body {
      font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
      background: #f5f8fd;
      color: #1e293b;
      height: 100vh;
      overflow: hidden;
      display: flex;
      flex-direction: column;
    }
    
    /* Scrollbar */
    ::-webkit-scrollbar { width: 6px; height: 6px; }
    ::-webkit-scrollbar-track { background: #e9edf2; border-radius: 20px; }
    ::-webkit-scrollbar-thumb { background: #FF9933; border-radius: 20px; }
    ::-webkit-scrollbar-thumb:hover { background: #e0852b; }

    .flex { display: flex; }
    .flex-1 { flex: 1; }
    .overflow-hidden { overflow: hidden; }
    .flex-col { flex-direction: column; }

    /* ========== HEADER ========== */
    .gov-header {
      background: #1e4d7b;
      color: white;
      border-bottom: 3px solid #e58500;
      padding: 0 1.5rem;
      height: 80px;
      display: flex;
      align-items: center;
      justify-content: space-between;
      flex-shrink: 0;
      box-shadow: 0 4px 12px rgba(0,0,0,0.06);
      gap: 1rem;
      width: 100%;
      z-index: 100;
    }

    .gov-header .brand {
      display: flex;
      align-items: center;
      gap: 12px;
      min-width: 0;
      flex-shrink: 1;
    }

    .emblem-wrapper {
      display: flex;
      align-items: center;
      gap: 14px;
      min-width: 0;
    }

    .emblem-wrapper img {
      height: 56px;
      width: auto;
      filter: brightness(0) invert(1);
      opacity: 0.95;
      flex-shrink: 0;
    }

    .cabinet-text {
      display: flex;
      flex-direction: column;
      line-height: 1.2;
      white-space: nowrap;
      min-width: 0;
    }

    .cabinet-text .hindi {
      font-size: 1.1rem;
      font-weight: 800;
      letter-spacing: 0.02em;
      color: #fff;
    }

    .cabinet-text .english {
      font-size: 1.25rem;
      font-weight: 900;
      letter-spacing: 0.02em;
      color: #fff;
      text-shadow: 0 1px 2px rgba(0,0,0,0.1);
    }

    .cabinet-text .gov-india {
      font-size: 0.7rem;
      opacity: 0.8;
      font-weight: 600;
      letter-spacing: 0.06em;
      color: #fff;
    }

    .gov-header .header-actions {
      display: flex;
      align-items: center;
      gap: 1.2rem;
      flex-shrink: 0;
    }

    .gov-header .header-actions .icon-btn {
      width: 40px;
      height: 40px;
      background: rgba(255,255,255,0.08);
      border-radius: 40px;
      display: flex;
      align-items: center;
      justify-content: center;
      color: white;
      transition: 0.2s;
      border: 1px solid transparent;
      cursor: pointer;
      position: relative;
    }

    .gov-header .header-actions .icon-btn:hover {
      background: rgba(255,255,255,0.18);
      border-color: #e58500;
    }

    .gov-header .header-actions .icon-btn .dot {
      position: absolute;
      top: 8px;
      right: 8px;
      width: 8px;
      height: 8px;
      background: #e58500;
      border-radius: 50%;
      border: 2px solid #1e4d7b;
    }

    .btn-orange {
      background: #e58500;
      color: white;
      font-weight: 600;
      padding: 0.4rem 1.2rem;
      border-radius: 40px;
      transition: 0.2s;
      border: none;
      font-size: 0.7rem;
      cursor: pointer;
      display: flex;
      align-items: center;
      gap: 6px;
    }

    .btn-orange:hover {
      background: #cc7700;
      transform: scale(0.97);
    }

    .profile-trigger {
      display: flex;
      align-items: center;
      gap: 8px;
      padding: 4px 12px 4px 4px;
      background: #fff;
      border-radius: 40px;
      cursor: pointer;
      transition: 0.2s;
      border: 1px solid #d9e2ec;
    }

    .profile-trigger:hover {
      border-color: #e58500;
      box-shadow: 0 3px 10px rgba(0,0,0,0.08);
    }

    .profile-avatar {
      width: 32px;
      height: 32px;
      border-radius: 50%;
      background: #e58500;
      display: flex;
      align-items: center;
      justify-content: center;
      color: #fff;
      font-size: 14px;
    }

    .profile-name {
      font-size: 13px;
      font-weight: 600;
      color: #1e293b;
    }

    .dropdown-arrow {
      color: #94a3b8;
      font-size: 11px;
    }

    .back-btn {
      width: 40px;
      height: 40px;
      background: rgba(255,255,255,0.08);
      border-radius: 40px;
      display: flex;
      align-items: center;
      justify-content: center;
      color: white;
      cursor: pointer;
      border: 1px solid transparent;
      transition: 0.2s;
    }

    .back-btn:hover {
      background: rgba(255,255,255,0.18);
      border-color: #e58500;
    }

    .relative { position: relative; }

    /* Notification Popover */
    #notificationDropdown {
      position: relative;
      display: inline-block;
    }

    .notification-popover {
      display: none;
      position: absolute;
      top: calc(100% + 8px);
      right: 0;
      width: 320px;
      background: #ffffff;
      border: 1px solid #e2e8f0;
      border-radius: 14px;
      box-shadow: 0 12px 30px rgba(0, 0, 0, 0.12);
      z-index: 1000;
      overflow: hidden;
    }

    #notificationDropdown:hover .notification-popover,
    .notification-popover:hover {
      display: block;
    }

    .notif-header {
      padding: 12px 16px;
      background: #f8fafc;
      border-bottom: 1px solid #e2e8f0;
    }

    .notif-body {
      max-height: 280px;
      overflow-y: auto;
    }

    .notif-item {
      display: flex;
      align-items: flex-start;
      gap: 12px;
      padding: 12px 16px;
      border-bottom: 1px solid #f1f5f9;
      text-decoration: none;
      transition: background-color 0.2s ease;
    }

    .notif-item:hover {
      background-color: #f8fafc;
    }

    .notif-item.unread {
      background-color: #f0f7ff;
    }

    .notif-icon {
      width: 32px;
      height: 32px;
      border-radius: 50%;
      display: flex;
      align-items: center;
      justify-content: center;
      flex-shrink: 0;
    }

    .notif-content {
      flex: 1;
    }

    .notif-title {
      font-size: 12px;
      font-weight: 700;
      color: #1e293b;
      margin: 0;
      line-height: 1.3;
    }

    .notif-sub {
      font-size: 11px;
      color: #64748b;
      margin: 2px 0 4px 0;
      line-height: 1.3;
    }

    .notif-time {
      font-size: 10px;
      color: #94a3b8;
      font-weight: 500;
    }

    .notif-footer {
      padding: 10px 16px;
      background: #f8fafc;
      border-top: 1px solid #e2e8f0;
      display: flex;
      justify-content: space-between;
      align-items: center;
      font-size: 11px;
      font-weight: 600;
    }

    .notif-footer a {
      color: #64748b;
      text-decoration: none;
    }

    .notif-footer a:hover {
      color: #e58500;
    }

    /* Dropdown Menu */
    .dropdown-menu-gov {
      display: none;
      position: absolute;
      top: 55px;
      right: 0;
      width: 260px;
      background: #fff;
      border: 1px solid #e5e7eb;
      border-radius: 8px;
      box-shadow: 0 10px 30px rgba(0,0,0,.12);
      overflow: hidden;
      z-index: 999;
    }

    .dropdown-menu-gov.show {
      display: block;
    }

    .dropdown-user {
      padding: 16px 18px;
      background: #f8fafc;
      border-bottom: 1px solid #e5e7eb;
    }

    .dropdown-user h5 {
      margin: 0;
      font-size: 15px;
      font-weight: 600;
      color: #111827;
    }

    .dropdown-menu-gov a {
      display: flex;
      align-items: center;
      gap: 12px;
      padding: 13px 18px;
      text-decoration: none;
      color: #374151;
      font-size: 14px;
      transition: .2s;
    }

    .dropdown-menu-gov a:hover {
      background: #f1f5f9;
    }

    .dropdown-menu-gov a i {
      width: 18px;
      color: #64748b;
    }

    .dropdown-divider {
      height: 1px;
      background: #e5e7eb;
    }

    .logout {
      color: #dc2626 !important;
    }

    .logout i {
      color: #dc2626 !important;
    }

    /* ========== SIDEBAR ========== */
    .gov-sidebar {
      background: #e9edf2;
      border-right: 1px solid #e2e8f0;
      width: 230px;
      flex-shrink: 0;
      padding: 1.2rem 0.8rem 1.5rem;
      height: 100%;
      overflow-y: auto;
      transition: width 0.3s ease;
      display: flex;
      flex-direction: column;
    }

    .gov-sidebar.collapsed {
      width: 60px;
    }

    .gov-sidebar.collapsed .nav-item span { display: none; }
    .gov-sidebar.collapsed .nav-label { display: none; }
    .gov-sidebar.collapsed .nav-item { justify-content: center; padding: 0.6rem; }
    .gov-sidebar.collapsed .badge { display: none; }

    .sidebar-section-header {
      display: flex;
      align-items: center;
      justify-content: space-between;
      padding: 0 10px 12px 10px;
    }

    .sidebar-section-title {
      display: flex;
      align-items: center;
      gap: 6px;
      font-size: 11px;
      font-weight: 700;
      color: #1e4d7b;
      text-decoration: none;
      text-transform: uppercase;
      letter-spacing: 0.08em;
    }

    .sidebar-section-title i {
      font-size: 15px;
    }

    .sidebar-toggle-btn {
      width: 32px;
      height: 32px;
      min-width: 32px;
      border: none;
      border-radius: 7px;
      background: #cc7700;
      color: #fff;
      cursor: pointer;
      display: flex;
      align-items: center;
      justify-content: center;
      transition: 0.2s;
    }

    .sidebar-toggle-btn:hover {
      background: #f1f5f9;
      color: #1e4d7b;
      transform: scale(1.05);
    }

    .sidebar-toggle-btn i {
      font-size: 17px;
    }

    .gov-sidebar .nav-item {
      display: flex;
      align-items: center;
      gap: 12px;
      padding: 0.6rem 1rem;
      border-radius: 12px;
      font-weight: 500;
      font-size: 0.85rem;
      color: #334155;
      transition: 0.15s;
      margin-bottom: 2px;
      text-decoration: none;
      cursor: pointer;
    }

    .gov-sidebar .nav-item i {
      width: 22px;
      text-align: center;
      color: #5f6b7a;
      font-size: 1rem;
    }

    .gov-sidebar .nav-item:hover {
      background: #f0f5fe;
      color: #1e4d7b;
    }

    .gov-sidebar .nav-item.active {
      background: #1e4d7b;
      color: white;
      box-shadow: 0 4px 10px rgba(30,77,123,0.25);
    }

    .gov-sidebar .nav-item.active i {
      color: white;
    }

    .gov-sidebar .nav-item .badge {
      margin-left: auto;
      background: #e58500;
      color: white;
      font-size: 0.6rem;
      font-weight: 700;
      padding: 0.1rem 0.6rem;
      border-radius: 30px;
    }

    .nav-label {
      font-size: 9px;
      font-weight: 700;
      color: #94a3b8;
      text-transform: uppercase;
      letter-spacing: 0.08em;
      padding: 0 12px;
      margin-top: 6px;
      margin-bottom: 4px;
    }

    .mt-6 { margin-top: 1.5rem; }
    .mb-2 { margin-bottom: 0.5rem; }

    /* ========== MAIN CONTENT ========== */
    .main-wrapper {
      flex: 1;
      display: flex;
      overflow: hidden;
    }

    .main-content {
      flex: 1;
      overflow-y: auto;
      padding: 2rem;
      background: #f5f8fd;
      display: flex;
      align-items: center;
      justify-content: center;
    }

    /* ========== PASSWORD CARD ========== */
    .gov-password-card {
      background: #fff;
      border-radius: 20px;
      border: 1px solid #e9edf4;
      box-shadow: 0 10px 30px rgba(30,77,123,0.10);
      overflow: hidden;
      width: 100%;
      max-width: 480px;
      position: relative;
    }

    .gov-password-card::before {
      content: '';
      position: absolute;
      top: 0;
      left: 0;
      right: 0;
      height: 5px;
      background: linear-gradient(90deg, #1e4d7b, #2f73b3, #e58500);
    }

    .card-header-custom {
      padding: 1.5rem 2rem 0.5rem 2rem;
      text-align: center;
    }

    .card-header-custom .icon-wrapper {
      width: 64px;
      height: 64px;
      margin: 0 auto 0.8rem;
      background: linear-gradient(135deg, #1e4d7b, #2f73b3);
      border-radius: 50%;
      display: flex;
      align-items: center;
      justify-content: center;
      box-shadow: 0 8px 20px rgba(30,77,123,0.25);
    }

    .card-header-custom .icon-wrapper i {
      font-size: 28px;
      color: #fff;
    }

    .card-header-custom h3 {
      font-weight: 800;
      color: #1e4d7b;
      font-size: 1.4rem;
      letter-spacing: -0.02em;
    }

    .card-header-custom p {
      color: #64748b;
      font-size: 0.85rem;
      font-weight: 500;
    }

    .card-body-custom {
      padding: 1.5rem 2rem 2rem 2rem;
    }

    /* ========== FORM ELEMENTS ========== */
    .gov-form-label {
      font-size: 0.75rem;
      font-weight: 700;
      color: #1e4d7b;
      text-transform: uppercase;
      letter-spacing: 0.03em;
      display: block;
      margin-bottom: 0.3rem;
    }

    .gov-form-control {
      border: 2px solid #e2e8f0;
      border-radius: 10px;
      padding: 0.7rem 1rem;
      font-size: 0.9rem;
      width: 100%;
      outline: none;
      transition: 0.3s;
      background: #fafcff;
    }

    .gov-form-control:focus {
      border-color: #1e4d7b;
      box-shadow: 0 0 0 3px rgba(30,77,123,0.10);
    }

    .gov-form-control.is-invalid {
      border-color: #dc2626;
    }

    .gov-form-control.is-valid {
      border-color: #10b981;
    }

    .gov-password-wrapper {
      position: relative;
    }

    .gov-password-wrapper .toggle-password {
      position: absolute;
      right: 12px;
      top: 50%;
      transform: translateY(-50%);
      background: none;
      border: none;
      color: #94a3b8;
      cursor: pointer;
      padding: 4px;
    }

    .gov-password-wrapper .toggle-password:hover {
      color: #1e4d7b;
    }

    /* Password Strength */
    .strength-bar-wrap {
      margin-top: 6px;
      height: 4px;
      border-radius: 4px;
      background: #e2e8f0;
      overflow: hidden;
    }

    .strength-bar {
      height: 100%;
      width: 0%;
      border-radius: 4px;
      transition: 0.3s;
    }

    .strength-text {
      font-size: 0.65rem;
      font-weight: 600;
      margin-top: 4px;
      display: flex;
      justify-content: space-between;
    }

    /* Password Requirements */
    .req-list {
      display: flex;
      flex-wrap: wrap;
      gap: 0.3rem 1rem;
      margin-top: 4px;
      font-size: 0.65rem;
    }

    .req-item {
      display: flex;
      align-items: center;
      gap: 4px;
      color: #94a3b8;
    }

    .req-item.met {
      color: #10b981;
    }

    .req-item i {
      font-size: 0.5rem;
    }

    /* Alert */
    .gov-alert {
      border-radius: 10px;
      padding: 0.7rem 1rem;
      font-size: 0.85rem;
      font-weight: 600;
      display: none;
      align-items: center;
      gap: 10px;
      margin-bottom: 1rem;
      border-left: 4px solid;
    }

    .gov-alert.show {
      display: flex;
    }

    .gov-alert-success {
      background: #ecfdf5;
      border-color: #10b981;
      color: #065f46;
    }

    .gov-alert-danger {
      background: #fef2f2;
      border-color: #dc2626;
      color: #991b1b;
    }

    .btn-gov {
      background: linear-gradient(135deg, #ff9800, #e58500);
      color: #fff;
      border: none;
      border-radius: 10px;
      padding: 0.75rem 1.5rem;
      font-weight: 700;
      font-size: 0.9rem;
      width: 100%;
      cursor: pointer;
      transition: 0.3s;
      display: flex;
      align-items: center;
      justify-content: center;
      gap: 8px;
    }

    .btn-gov:hover:not(:disabled) {
      transform: translateY(-2px);
      box-shadow: 0 8px 20px rgba(229,133,0,0.3);
    }

    .btn-gov:disabled {
      opacity: 0.6;
      cursor: not-allowed;
    }

    .spinner {
      width: 1.1rem;
      height: 1.1rem;
      border: 2px solid rgba(255,255,255,0.3);
      border-top-color: #fff;
      border-radius: 50%;
      animation: spin 0.6s linear infinite;
    }

    @keyframes spin {
      to { transform: rotate(360deg); }
    }

    .mb-3 { margin-bottom: 0.75rem; }
    .mb-4 { margin-bottom: 1rem; }
    .me-1 { margin-right: 0.25rem; }

    /* ========== FOOTER ========== */
    .gov-footer {
      background: #1e4d7b;
      color: rgba(255,255,255,0.75);
      border-top: 2px solid #e58500;
      padding: 0.6rem 2rem;
      font-size: 0.7rem;
      display: flex;
      justify-content: space-between;
      align-items: center;
      flex-shrink: 0;
      width: 100%;
      min-height: 46px;
    }

    .gov-footer a {
      color: rgba(255,255,255,0.6);
      margin-left: 1.2rem;
      transition: 0.2s;
      text-decoration: none;
    }

    .gov-footer a:hover {
      color: #e58500;
    }

    .gov-footer .footer-accent {
      color: #e58500;
      font-weight: 600;
    }

    /* ========== RESPONSIVE ========== */
    @media(max-width: 992px) {
      .gov-sidebar {
        width: 60px;
      }
      .gov-sidebar .nav-item span { display: none; }
      .gov-sidebar .nav-label { display: none; }
      .gov-sidebar .nav-item { justify-content: center; padding: 0.6rem; }
    }

    @media(max-width: 768px) {
      .gov-header { height: 70px; padding: 0 1rem; }
      .cabinet-text .hindi { font-size: 0.9rem; }
      .cabinet-text .english { font-size: 1rem; }
      .cabinet-text .gov-india { font-size: 0.6rem; }
      .emblem-wrapper img { height: 42px; }
      .main-content { padding: 1rem; }
      .card-body-custom { padding: 1.2rem; }
      .card-header-custom { padding: 1rem 1.2rem 0.3rem; }
      .gov-footer { flex-direction: column; gap: 4px; padding: 0.5rem 1rem; }
    }

    @media(max-width: 480px) {
      .cabinet-text .gov-india { display: none; }
      .cabinet-text .hindi { display: none; }
      .emblem-wrapper img { height: 34px; }
      .profile-name { display: none; }
      .profile-trigger { padding: 2px 6px 2px 2px; }
      .btn-orange span { display: none; }
      .card-body-custom { padding: 1rem; }
    }

    /* Page content visibility */
    .page-content {
      display: none;
    }
    .page-content.active {
      display: block;
    }

    /* Text colors */
    .text-slate-800 { color: #1e293b; }
    .text-[#e58500] { color: #e58500; }
    .text-[#1e4d7b] { color: #1e4d7b; }
    .text-emerald-600 { color: #059669; }
    .bg-amber-100 { background-color: #fef3c7; }
    .bg-amber-50 { background-color: #fffbeb; }
    .bg-blue-50 { background-color: #eff6ff; }
    .bg-emerald-50 { background-color: #ecfdf5; }
    .rounded-full { border-radius: 9999px; }
    .px-2 { padding-left: 0.5rem; padding-right: 0.5rem; }
    .py-0\.5 { padding-top: 0.125rem; padding-bottom: 0.125rem; }
    .text-xs { font-size: 0.75rem; }
    .text-[10px] { font-size: 10px; }
    .font-bold { font-weight: 700; }
  </style>
</head>
<body>

<!-- ============================================================ -->
<!-- SINGLE HEADER -->
<!-- ============================================================ -->
<header class="gov-header">
  <div class="brand">
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
      <i class="fas fa-plus"></i> <span>New Request</span>
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
          <i class="fas fa-user"></i>
        </div>
        <div class="profile-details">
          <span class="profile-name">
            <?= esc(session()->get('name', 'User')) ?>
          </span>
        </div>
        <i class="fas fa-chevron-down dropdown-arrow"></i>
      </button>
      <div class="dropdown-menu-gov" id="dropdownMenu">
        <div class="dropdown-user">
          <h5><?= esc(session()->get('name', 'User')) ?></h5>
        </div>
        <a href="<?= base_url('change-password'); ?>">
          <i class="fas fa-key"></i>
          <span>Change Password</span>
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

<!-- ============================================================ -->
<!-- SINGLE MAIN WRAPPER: Sidebar + Content -->
<!-- ============================================================ -->
<div class="main-wrapper">

  <!-- SINGLE SIDEBAR -->
  <aside class="gov-sidebar" id="govSidebar">
    <div>
      <div class="sidebar-section-header">
        <a href="#" onclick="showPage('dashboard')" class="sidebar-section-title nav-label">
          <i class="fas fa-layer-group me-1"></i>
          Dashboard
        </a>
        <button type="button" class="sidebar-toggle-btn" onclick="toggleSidebar()" title="Toggle Sidebar">
          <i class="fas fa-chevron-left" id="toggleIcon"></i>
        </button>
      </div>
      <nav>
        <a href="#" class="nav-item booking-btn" onclick="showPage('new-request')">
          <i class="fas fa-calendar-check"></i>
          <span>New Request</span>
        </a>
        <a href="#" class="nav-item" onclick="showPage('requests')">
          <i class="fas fa-clipboard-list"></i> 
          <span>Requests <span class="badge" id="request-count">0</span></span>
        </a>
        <a href="#" class="nav-item" onclick="showPage('analytics')">
          <i class="fas fa-chart-simple"></i> <span>Reports</span>
        </a>
        <div class="nav-label mt-6 mb-2">System</div>
        <a href="#" class="nav-item" onclick="showPage('settings')">
          <i class="fas fa-sliders"></i> <span>Settings</span>
        </a>
        <a href="#" class="nav-item" onclick="showPage('audit-log')">
          <i class="fas fa-shield-halved"></i> <span>Audit Log</span>
        </a>
        <div class="nav-label mt-6 mb-2">Admin</div>
        <a href="#" class="nav-item" onclick="showPage('registration')">
          <i class="fas fa-id-card"></i> <span>Pending Registration</span>
        </a>
        <a href="#" class="nav-item" onclick="showPage('users')">
          <i class="fas fa-users"></i> <span>Users</span>
        </a>
        <a href="#" class="nav-item" onclick="showPage('organization')">
          <i class="fa-solid fa-sitemap"></i> <span>Manage Organization</span>
        </a>
        <a href="#" class="nav-item" onclick="showPage('organization-type')">
          <i class="fa-solid fa-layer-group"></i> <span>Organization Types</span>
        </a>
        <a href="#" class="nav-item" onclick="showPage('vendor')">
          <i class="fas fa-handshake"></i> <span>Vendor</span>
        </a>
        <a href="#" class="nav-item" onclick="showPage('model')">
          <i class="fas fa-microchip"></i> <span>Model</span>
        </a>
        <a href="#" class="nav-item" onclick="showPage('designation')">
          <i class="fas fa-user-tag"></i> <span>Designation</span>
        </a>
      </nav>
    </div>
  </aside>

  
  <!-- SINGLE MAIN CONTENT -->
<div class="main-content">
  <!-- ===== FORCED PASSWORD CHANGE BANNER ===== -->
  <?php if(session()->get('password_reset_req') == 1): ?>
  <div style="position: fixed; top: 80px; left: 0; right: 0; z-index: 999; padding: 0.75rem 2rem; background: #dc2626; color: #fff; text-align: center; font-weight: 700; font-size: 0.95rem; display: flex; align-items: center; justify-content: center; gap: 12px; box-shadow: 0 4px 20px rgba(220,38,38,0.35); border-bottom: 3px solid #b91c1c; animation: pulseBanner 2s infinite;">
    <i class="fas fa-exclamation-triangle" style="font-size: 1.2rem;"></i>
    <span>⚠️ Immediate Password Change Required — Please change your password immediately to get full access to this system.</span>
    <i class="fas fa-exclamation-triangle" style="font-size: 1.2rem;"></i>
  </div>
  <style>
    @keyframes pulseBanner {
      0%, 100% { opacity: 1; }
      50% { opacity: 0.92; }
    }
  </style>
  <?php endif; ?>

  <div class="gov-password-card" style="max-width: 560px; padding: 0.5rem 0 0.5rem 0;">
    <div class="card-header-custom" style="padding: 0.8rem 2rem 0.2rem 2rem;">
      <div class="icon-wrapper" style="width: 48px; height: 48px; margin: 0 auto 0.4rem;">
        <i class="fas fa-key" style="font-size: 22px;"></i>
      </div>
      <h3 style="font-size: 1.2rem; margin: 0;">Change Password</h3>
      <p style="font-size: 0.75rem; margin: 0;">Update your account password securely</p>
    </div>

    <div class="card-body-custom" style="padding: 0.8rem 2rem 1.5rem 2rem;">
      <!-- Alert -->
      <div id="passwordMessage" class="gov-alert" style="margin-bottom: 0.6rem; padding: 0.5rem 1rem; font-size: 0.8rem;">
        <i class="fas fa-info-circle"></i>
        <span id="messageText"></span>
      </div>

      <form id="changePasswordForm" autocomplete="off">
        <?= csrf_field() ?>

        <!-- Current Password -->
        <div class="mb-2" style="margin-bottom: 0.5rem;">
          <label class="gov-form-label" for="current_password" style="font-size: 0.7rem; margin-bottom: 0.15rem;">
            <i class="fas fa-lock me-1"></i> Current Password
          </label>
          <div class="gov-password-wrapper">
            <input type="password" class="gov-form-control" id="current_password" 
                   name="current_password" placeholder="Enter current password" required
                   style="padding: 0.5rem 1rem; font-size: 0.85rem; border-radius: 8px;">
            <button type="button" class="toggle-password" onclick="togglePass('current_password')" style="right: 10px;">
              <i class="fas fa-eye"></i>
            </button>
          </div>
        </div>

        <!-- New Password -->
        <div class="mb-2" style="margin-bottom: 0.5rem;">
          <label class="gov-form-label" for="new_password" style="font-size: 0.7rem; margin-bottom: 0.15rem;">
            <i class="fas fa-shield-alt me-1"></i> New Password
          </label>
          <div class="gov-password-wrapper">
            <input type="password" class="gov-form-control" id="new_password" 
                   name="new_password" placeholder="Enter new password (min 8 chars)" 
                   minlength="8" required
                   style="padding: 0.5rem 1rem; font-size: 0.85rem; border-radius: 8px;">
            <button type="button" class="toggle-password" onclick="togglePass('new_password')" style="right: 10px;">
              <i class="fas fa-eye"></i>
            </button>
          </div>
          <!-- Strength -->
          <div class="strength-bar-wrap" style="margin-top: 4px; height: 3px;">
            <div class="strength-bar" id="strengthBar"></div>
          </div>
          <div class="strength-text" style="font-size: 0.6rem; margin-top: 2px;">
            <span id="strengthText" style="color:#94a3b8;">Weak</span>
            <span style="color:#94a3b8;">Strength</span>
          </div>
          <!-- Requirements -->
          <div class="req-list" style="gap: 0.2rem 0.8rem; font-size: 0.6rem; margin-top: 2px;">
            <span class="req-item unmet" id="reqLength"><i class="fas fa-circle"></i> 8+ chars</span>
            <span class="req-item unmet" id="reqUpper"><i class="fas fa-circle"></i> Uppercase</span>
            <span class="req-item unmet" id="reqLower"><i class="fas fa-circle"></i> Lowercase</span>
            <span class="req-item unmet" id="reqNumber"><i class="fas fa-circle"></i> Number</span>
          </div>
        </div>

        <!-- Confirm Password -->
        <div class="mb-3" style="margin-bottom: 0.6rem;">
          <label class="gov-form-label" for="confirm_password" style="font-size: 0.7rem; margin-bottom: 0.15rem;">
            <i class="fas fa-check-circle me-1"></i> Confirm Password
          </label>
          <div class="gov-password-wrapper">
            <input type="password" class="gov-form-control" id="confirm_password" 
                   name="confirm_password" placeholder="Confirm new password" 
                   minlength="8" required
                   style="padding: 0.5rem 1rem; font-size: 0.85rem; border-radius: 8px;">
            <button type="button" class="toggle-password" onclick="togglePass('confirm_password')" style="right: 10px;">
              <i class="fas fa-eye"></i>
            </button>
          </div>
          <div style="font-size:0.6rem; font-weight:600; margin-top:2px;">
            <span id="matchText" style="color:#94a3b8;">Passwords must match</span>
          </div>
        </div>

        <button type="submit" id="changeBtn" class="btn-gov" style="padding: 0.6rem 1.5rem; font-size: 0.85rem; border-radius: 8px;">
          <i class="fas fa-save"></i> <span id="btnText">Change Password</span>
        </button>
      </form>
    </div>
  </div>
</div>



</div>

<!-- ============================================================ -->
<!-- SINGLE FOOTER -->
<!-- ============================================================ -->
<footer class="gov-footer">
  <div>© 2026 Cabinet Secretariat — <span class="footer-accent">Government of India</span></div>
  <div>
    <a href="#">Privacy</a>
    <a href="#">Security</a>
    <a href="#"><i class="fas fa-cog"></i></a>
  </div>
</footer>

<div id="complaintNotification" style="
        position: fixed;
        bottom: 50px;
        left: 11px;
        width: 206px;
        background: linear-gradient(135deg, #1e4d7b 0%, #2f73b3 100%);
        padding: 0;
        border-radius: 12px;
        box-shadow: 0 8px 24px rgba(0,0,0,0.2);
        transform: translateX(-400px);
        transition: transform 0.4s ease-in-out;
        z-index: 9999;
        overflow: hidden;
        font-family: 'Inter', sans-serif;
    ">
      <div style="
          background: rgba(255,255,255,0.15);
          padding: 12px 16px;
          display: flex;
          justify-content: space-between;
          align-items: center;
          border-bottom: 1px solid rgba(255,255,255,0.2);
      ">
          <div style="display: flex; align-items: center; gap: 8px;">
              <i class="fa-solid fa-bell" style="color: #fff; font-size: 14px;"></i>
              <strong style="font-size: 13px; color: #fff; font-weight: 600;">Notification</strong>
          </div>
          <button onclick="hideNotification()" style="
              border: none;
              background: rgba(255,255,255,0.2);
              color: #fff;
              font-size: 16px;
              cursor: pointer;
              line-height: 1;
              padding: 2px 6px;
              border-radius: 4px;
          " onmouseover="this.style.background='rgba(255,255,255,0.3)'" onmouseout="this.style.background='rgba(255,255,255,0.2)'">
              ×
          </button>
      </div>

      <div id="notificationContent" style="padding: 14px 16px; background: #ffffff; color: #334155;">
          <div style="border-left: 4px solid #e58500; padding-left: 10px; margin-bottom: 10px;">
              <h6 style="margin: 0; font-size: 13px; font-weight: 700; color: #1e4d7b;">
                  Pending Registration : <span style="color: #e58500;"><?= esc($pending_count ?? 0) ?></span>
              </h6>
          </div>

          <div style="border-left: 4px solid #f59e0b; padding-left: 10px;">
              <h6 style="margin: 0; font-size: 13px; font-weight: 700; color: #1e4d7b;">
                  Total Registration : <span style="color: #f59e0b;"><?= esc($total_count ?? 0) ?></span>
              </h6>
          </div>
      </div>
    </div>

<!-- ============================================================ -->
<!-- SCRIPTS -->
<!-- ============================================================ -->
<script>
const baseUrl = "<?= rtrim(base_url(), '/') ?>/";

// ===== TOGGLE PASSWORD =====
function togglePass(id) {
  const input = document.getElementById(id);
  const icon = input.parentElement.querySelector('.toggle-password i');
  if (input.type === 'password') {
    input.type = 'text';
    icon.className = 'fas fa-eye-slash';
  } else {
    input.type = 'password';
    icon.className = 'fas fa-eye';
  }
}

// ===== TOGGLE SIDEBAR =====
function toggleSidebar() {
  const sidebar = document.getElementById('govSidebar');
  const icon = document.getElementById('toggleIcon');
  sidebar.classList.toggle('collapsed');
  if (sidebar.classList.contains('collapsed')) {
    icon.className = 'fas fa-chevron-right';
  } else {
    icon.className = 'fas fa-chevron-left';
  }
}

// ===== PROFILE DROPDOWN =====
function toggleDropdown() {
  const menu = document.getElementById('dropdownMenu');
  menu.classList.toggle('show');
}

document.addEventListener('click', function(e) {
  const container = document.getElementById('profileDropdown');
  if (container && !container.contains(e.target)) {
    document.getElementById('dropdownMenu')?.classList.remove('show');
  }
});

// ===== SHOW PAGE (SPA Navigation) =====
function showPage(pageId) {
  document.querySelectorAll('.page-content').forEach(page => {
    page.classList.remove('active');
  });
  const selectedPage = document.getElementById(pageId);
  if (selectedPage) {
    selectedPage.classList.add('active');
  }
  document.querySelectorAll('.gov-sidebar .nav-item').forEach(item => {
    item.classList.remove('active');
    const onclickAttr = item.getAttribute('onclick');
    if (onclickAttr && onclickAttr.includes(`'${pageId}'`)) {
      item.classList.add('active');
    }
  });
}

// ===== SHOW MESSAGE =====
function showMsg(msg, type) {
  const box = document.getElementById('passwordMessage');
  const text = document.getElementById('messageText');
  const icon = box.querySelector('i');
  box.className = 'gov-alert show gov-alert-' + type;
  text.textContent = msg;
  icon.className = type === 'success' ? 'fas fa-check-circle' : 'fas fa-exclamation-circle';
  if (type === 'success') {
    setTimeout(() => box.classList.remove('show'), 4000);
  }
}

// ===== PASSWORD STRENGTH =====
function checkStrength(pass) {
  let score = 0;
  const checks = {
    len: pass.length >= 8,
    upper: /[A-Z]/.test(pass),
    lower: /[a-z]/.test(pass),
    num: /[0-9]/.test(pass)
  };
  Object.values(checks).forEach(v => { if(v) score++; });

  ['reqLength', 'reqUpper', 'reqLower', 'reqNumber'].forEach(id => {
    const el = document.getElementById(id);
    const key = id.replace('req', '').toLowerCase();
    el.className = 'req-item ' + (checks[key] ? 'met' : 'unmet');
    el.querySelector('i').className = checks[key] ? 'fas fa-check-circle' : 'fas fa-circle';
  });

  const map = {
    0: { w: 0, t: 'Very Weak', c: '#dc2626' },
    1: { w: 20, t: 'Weak', c: '#f59e0b' },
    2: { w: 40, t: 'Fair', c: '#f59e0b' },
    3: { w: 60, t: 'Good', c: '#3b82f6' },
    4: { w: 80, t: 'Strong', c: '#10b981' },
    5: { w: 100, t: 'Very Strong', c: '#10b981' }
  };
  const r = map[score] || map[0];
  document.getElementById('strengthBar').style.width = r.w + '%';
  document.getElementById('strengthBar').style.background = r.c;
  document.getElementById('strengthText').textContent = r.t;
  document.getElementById('strengthText').style.color = r.c;
}

// ===== CONFIRM MATCH =====
function checkMatch() {
  const newP = document.getElementById('new_password').value;
  const conf = document.getElementById('confirm_password').value;
  const el = document.getElementById('matchText');
  if (!conf) { 
    el.textContent = 'Passwords must match'; 
    el.style.color = '#94a3b8'; 
    document.getElementById('confirm_password').className = 'gov-form-control';
    return; 
  }
  if (newP === conf) {
    el.textContent = '✓ Passwords match';
    el.style.color = '#10b981';
    document.getElementById('confirm_password').className = 'gov-form-control is-valid';
  } else {
    el.textContent = '✗ Passwords do not match';
    el.style.color = '#dc2626';
    document.getElementById('confirm_password').className = 'gov-form-control is-invalid';
  }
}

// ===== EVENTS =====
document.getElementById('new_password').addEventListener('input', function() {
  checkStrength(this.value);
  if (document.getElementById('confirm_password').value) checkMatch();
});

document.getElementById('confirm_password').addEventListener('input', checkMatch);

// Clear alert on input
document.querySelectorAll('input').forEach(input => {
  input.addEventListener('input', function() {
    document.getElementById('passwordMessage').classList.remove('show');
  });
});

// ===== FORM SUBMIT =====
document.getElementById('changePasswordForm').addEventListener('submit', async function(e) {
  e.preventDefault();

  const current = document.getElementById('current_password').value;
  const newP = document.getElementById('new_password').value;
  const confirm = document.getElementById('confirm_password').value;

  if (!current || !newP || !confirm) {
    showMsg('All fields are required.', 'danger');
    return;
  }
  if (newP.length < 8) {
    showMsg('Password must be at least 8 characters.', 'danger');
    return;
  }
  if (newP !== confirm) {
    showMsg('Passwords do not match.', 'danger');
    return;
  }
  if (current === newP) {
    showMsg('New password must be different from current.', 'danger');
    return;
  }

  const btn = document.getElementById('changeBtn');
  btn.disabled = true;
  btn.innerHTML = '<span class="spinner"></span> Changing...';

  const formData = new FormData(this);

  try {
    const res = await fetch(baseUrl + 'change-password/update', {
      method: 'POST',
      body: formData,
      headers: { 'X-Requested-With': 'XMLHttpRequest' }
    });
    const data = await res.json();

    if (data.csrfHash) {
      const csrf = document.querySelector('input[name="<?= csrf_token() ?>"]');
      if (csrf) csrf.value = data.csrfHash;
    }

    if (data.success) {
      showMsg(data.message, 'success');
      setTimeout(() => window.location.replace(data.redirect || baseUrl + 'dashboard'), 1200);
    } else {
      showMsg(data.message || 'Failed to change password.', 'danger');
      btn.disabled = false;
      btn.innerHTML = '<i class="fas fa-save"></i> <span id="btnText">Change Password</span>';
    }
  } catch (err) {
    showMsg('Something went wrong. Please try again.', 'danger');
    btn.disabled = false;
    btn.innerHTML = '<i class="fas fa-save"></i> <span id="btnText">Change Password</span>';
  }
});

// ===== SET ACTIVE SIDEBAR ITEM =====
document.addEventListener('DOMContentLoaded', function() {
  document.querySelectorAll('.gov-sidebar .nav-item').forEach(el => {
    el.classList.remove('active');
  });
  // Highlight Settings since Change Password is under Settings
  document.querySelectorAll('.gov-sidebar .nav-item').forEach(el => {
    if (el.textContent.trim().includes('Settings')) {
      el.classList.add('active');
    }
  });
});


// Notification popup functions
  let notificationTimer = null;

  function hideNotification() {
      const popup = document.getElementById('complaintNotification');
      if (popup) {
          popup.style.transform = 'translateX(-400px)';
      }
  }

  function showNotification() {
      const popup = document.getElementById('complaintNotification');
      if (popup) {
          popup.style.transform = 'translateX(0)';
      }
  }

  document.addEventListener('DOMContentLoaded', () => {
      setTimeout(showNotification, 1000);
  });
</script>

</body>
</html>