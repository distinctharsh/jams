<?php echo view('header/header'); ?>
<style>
/* =========================================================
   LOGIN / SIGN UP BUTTON
   ========================================================= */

.btn-login {
    background: #FF9933;
    color: #fff;
    border: 2px solid #FF9933;
    font-weight: 600;
    padding: 12px 28px;
    border-radius: 8px;
    transition: .3s;
}

.btn-login:hover {
    background: #e68600;
    border-color: #e68600;
    color: #fff;
}


/* Sign Up Button */

.btn-signup {
    background: #1e4d7b;
    color: #fff;
    border: 2px solid #1e4d7b;
    font-weight: 600;
    padding: 12px 28px;
    border-radius: 8px;
    transition: .3s;
}

.btn-signup:hover {
    background: #163a5b;
    border-color: #163a5b;
    color: #fff;
}


/* =========================================================
   HERO SECTION
   ========================================================= */

.hero-description {
    text-align: justify;
    line-height: 1.8;
    color: #555;
}

.hero-content h1 {
    line-height: 1.2;
}

.hero-content h5 {
    font-size: 24px;
    letter-spacing: .5px;
}


/* =========================================================
   SECTION HEADING
   ========================================================= */

.section-heading {
    font-size: 42px;
    font-weight: 700;
    color: #222;
}

.lead-text {
    color: #1e4d7b;
    font-size: 18px;
    font-weight: 500;
}


/* =========================================================
   STATS
   ========================================================= */

.stats-grid {
    display: flex;
    gap: 15px;
    margin-top: 20px;
}

.stats-grid .stat-item {
    flex: 1;
    padding: 15px 12px;
    border-radius: 10px;
    text-align: center;
    background: #fff;
    box-shadow: 0 3px 10px rgba(0, 0, 0, .08);
}

.stats-grid .stat-number {
    font-size: 28px;
    font-weight: 700;
    color: #1e4d7b;
    line-height: 1;
}

.stats-grid .stat-label {
    font-size: 13px;
    margin-top: 6px;
    color: #666;
    font-weight: 600;
}


/* =========================================================
   ABOUT VISUAL
   ========================================================= */

.about-visual img {
    border-radius: 18px;
    border: 8px solid #fff;
}


/* =========================================================
   TOAST CONTAINER
   ========================================================= */

#toastContainer {
    width: 350px;
    max-width: 95%;
    z-index: 99999;
    top: 20px !important;
    right: 20px !important;
}


/* Toast Box */

.toast {
    width: 100%;
    min-height: 55px;
    border-radius: 8px;
    font-size: 14px;
}


/* Toast Body */

.toast-body {
    padding: 12px 15px;
    font-size: 15px;
}


/* Close Button */

.toast .btn-close {
    margin-right: 8px;
}


/* =========================================================
   DASHBOARD CARD BUTTON
   ========================================================= */

.dashboard-card-btn {
    display: inline-flex;
    align-items: center;
    gap: 12px;
    padding: 10px 18px;
    border-radius: 12px;
    text-decoration: none;
    background: linear-gradient(135deg, #0b3d91, #1565c0);
    color: #fff !important;
    box-shadow: 0 8px 20px rgba(0, 0, 0, .18);
    transition: .3s ease;
    min-width: 260px;
}

.dashboard-card-btn:hover {
    color: #fff !important;
    transform: translateY(-2px);
    box-shadow: 0 12px 28px rgba(0, 0, 0, .25);
}


/* Dashboard Icon */

.dashboard-icon {
    width: 42px;
    height: 42px;
    border-radius: 50%;
    background: rgba(255, 255, 255, .15);
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 18px;
    color: #fff;
}


/* Dashboard Info */

.dashboard-info {
    flex: 1;
    line-height: 1.2;
}

.dashboard-info small {
    display: block;
    font-size: 11px;
    color: rgba(255, 255, 255, .85);
    text-transform: uppercase;
    letter-spacing: .5px;
}

.dashboard-info h6 {
    margin: 2px 0 0;
    font-size: 15px;
    font-weight: 600;
    color: #fff;
}


/* Dashboard Arrow */

.dashboard-arrow {
    font-size: 18px;
    color: #fff;
}


</style>
 <main class="main" id="mainContent">
    <div id="toast-container"
         style="position:fixed;top:20px;right:20px;z-index:99999;display:flex;flex-direction:column;gap:10px;pointer-events:none;">
    </div>
    <!-- Hero Section -->
    <section id="hero" class="hero section">
      <div class="container" data-aos="fade-up" data-aos-delay="100">
        <div class="row align-items-center">

        <div class="col-lg-6">
            <div class="hero-content">
                <h1 class="mb-2 fw-bold" style="color:#FF9933;" data-aos="fade-right" data-aos-delay="200">
                    मंत्रिमंडल सचिवालय
                </h1>
                <h4 data-aos="fade-right" data-aos-delay="300">
                    <span style="color:#1e4d7b;">Cabinet Secretariat</span>
                    <br>
                    <small class="fw-semibold" style="font-size:28px; color:#555;">
                        Government of India
                    </small>
                </h4>
                <p class="hero-description text-justify" data-aos="fade-right" data-aos-delay="400">
                    The <strong>Cabinet Secretariat</strong> is responsible for the administration of the
                    <strong>Government of India (Transaction of Business) Rules, 1961</strong> and the
                    <strong>Government of India (Approval of Business) Rules, 1961</strong>. It facilitates
                    the smooth transaction of business among Ministries and Departments of the Government
                    of India.
                </p>
                <div class="hero-stats mb-4" data-aos="fade-right" data-aos-delay="500">
                    <div class="stat-item">
                        <h3>1961</h3>
                        <p>Business Rules</p>
                    </div>
                    <div class="stat-item">
                        <h3>50+</h3>
                        <p>Ministries Coordinated</p>
                    </div>
                    <div class="stat-item">
                        <h3>24×7</h3>
                        <p>National Coordination</p>
                    </div>
                </div>
                <div class="hero-actions" data-aos="fade-right" data-aos-delay="600">
                <?php if (session()->has('username')) : ?>
                    <a href="<?= base_url('dashboard') ?>" class="dashboard-card-btn">
                        <div class="dashboard-icon">
                            <i class="bi bi-speedometer2"></i>
                        </div>

                        <div class="dashboard-info">
                            <small>Welcome Back</small>
                            <h6><?= esc(session()->get('full_name')) ?></h6>
                        </div>

                        <div class="dashboard-arrow">
                            <i class="bi bi-arrow-right-circle-fill"></i>
                        </div>
                    </a>
                <?php else : ?>
                    <button class="btn btn-login" data-bs-toggle="modal" data-bs-target="#loginModal">
                        <i class="bi bi-box-arrow-in-right me-2"></i>Login
                    </button>
                   <!--  <button class="btn btn-signup" data-bs-toggle="modal" data-bs-target="#signupModal">
                        <i class="bi bi-person-plus me-2"></i>Sign Up
                    </button> -->
                    <a href="<?= base_url('signup') ?>" class="btn btn-signup">
                        <i class="bi bi-person-plus me-2"></i>Sign Up
                    </a>
                <?php endif; ?>
                </div>
            </div>
        </div>
          <div class="col-lg-6">
            <div class="hero-visual" data-aos="fade-left" data-aos-delay="400">
              <div class="main-image">
                <img src="assets/image/health/staff-10.png" alt="Modern Healthcare Facility" class="img-fluid">
              </div>
              <div class="background-elements">
                <div class="element element-1"></div>
                <div class="element element-2"></div>
                <div class="element element-3"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- /Hero Section -->
<!-- Featured Departments Section -->
<section id="featured-departments" class="featured-departments section">
    <!-- Section Title -->
    <div class="container section-title" data-aos="fade-up">
        <h2>JAMS Core Modules</h2>
        <p>
            Jammers Approval Management System provides a secure, transparent and
            centralized platform for efficient Approval, monitoring and management
            of official files and departmental workflows within the Cabinet Secretariat.
        </p>
    </div>
    <div class="container" data-aos="fade-up" data-aos-delay="100">
        <div class="row g-4">
            <!-- Module 1 -->
            <div class="col-lg-4" data-aos="fade-up" data-aos-delay="100">
                <div class="department-highlight">
                    <div class="highlight-icon">
                        <i class="bi bi-folder2-open"></i>
                    </div>
                    <h4>File Approval Management</h4>
                    <p>
                        Digitally allocate official files to departments and officers
                        with complete transparency and accountability.
                    </p>
                    <ul class="highlight-list">
                        <li>Digital File Approval</li>
                        <li>Officer Assignment</li>
                        <li>Priority Management</li>
                    </ul>
                    <a href="#" class="highlight-cta">
                        View Module
                    </a>
                </div>
            </div>
            <!-- Module 2 -->
            <div class="col-lg-4" data-aos="fade-up" data-aos-delay="200">
                <div class="department-highlight">
                    <div class="highlight-icon">
                        <i class="bi bi-arrow-repeat"></i>
                    </div>
                    <h4>Workflow Monitoring</h4>
                    <p>
                        Monitor file movement, pending cases and processing status
                        across all departments in real time.
                    </p>
                    <ul class="highlight-list">
                        <li>Real-Time Tracking</li>
                        <li>Pending File Monitoring</li>
                        <li>Status Updates</li>
                    </ul>
                    <a href="#" class="highlight-cta">
                        View Module
                    </a>
                </div>
            </div>
            <!-- Module 3 -->
            <div class="col-lg-4" data-aos="fade-up" data-aos-delay="300">
                <div class="department-highlight">
                    <div class="highlight-icon">
                        <i class="bi bi-bar-chart-line"></i>
                    </div>
                    <h4>Reports & Analytics</h4>
                    <p>
                        Generate comprehensive reports, dashboards and performance
                        analytics for informed administrative decisions.
                    </p>
                    <ul class="highlight-list">
                        <li>Department Reports</li>
                        <li>Performance Dashboard</li>
                        <li>Data Analytics</li>
                    </ul>
                    <a href="#" class="highlight-cta">
                        View Module
                    </a>
                </div>
            </div>
        </div>
        <!-- Bottom Banner -->
        <div class="emergency-banner mt-5"
             data-aos="fade-up"
             data-aos-delay="400"
             style="background:#1e4d7b;">
            <div class="row align-items-center">
                <div class="col-lg-8">
                    <div class="emergency-content">
                        <h3 class="text-white">
                            Secure Digital Governance Platform
                        </h3>
                        <p class="text-white mb-0">
                            JAMS enables secure file Approval, centralized monitoring,
                            workflow automation and transparent administration across the
                            Cabinet Secretariat, Government of India.
                        </p>
                    </div>
                </div>
                <?php if (session()->has('username')) : ?>
                    
                <div class="col-lg-4 text-lg-end">
                    <a href="<?= base_url('dashboard') ?>" class="dashboard-card-btn">
                        <div class="dashboard-icon">
                            <i class="bi bi-speedometer2"></i>
                        </div>

                        <div class="dashboard-info">
                            <small>Welcome Back</small>
                            <h6><?= esc(session()->get('full_name')) ?></h6>
                        </div>

                        <div class="dashboard-arrow">
                            <i class="bi bi-arrow-right-circle-fill"></i>
                        </div>
                    </a>
                </div>
                <?php else : ?>
                   <div class="col-lg-4 text-lg-end">
                    <a href="<?= base_url('login') ?>"
                       class="btn btn-warning px-4 py-3 fw-bold" data-bs-toggle="modal"
                       data-bs-target="#loginModal">
                        <i class="bi bi-box-arrow-in-right me-2"></i>
                        Login to JAMS
                    </a>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>
<!-- /Featured Departments Section -->
</main>
<!-- Include Modals -->
<?php echo view('footer/footer'); ?>


