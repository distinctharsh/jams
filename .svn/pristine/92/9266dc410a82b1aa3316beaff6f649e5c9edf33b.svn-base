<?php echo view('header/header'); ?>

<style>
    /* =========================================================
       ROOT VARIABLES
    ========================================================= */

    :root {
        --gov-blue: #1e4d7b;
        --gov-blue-dark: #163a5c;
        --gov-blue-light: #f2f7fc;
        --text-dark: #243447;
        --text-muted: #667085;
        --border: #e1e7ee;
        --warning: #d89b00;
        --warning-bg: #fff8e5;
    }

    /* =========================================================
       MAIN PAGE
    ========================================================= */

    .authorization-invalid-page {
        width: 100%;
        min-height: calc(100vh - 130px);
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 250px 100px 100px;
        position: relative;
        overflow: hidden;
        background:
            radial-gradient(circle at 90% 10%, rgba(30, 77, 123, 0.07), transparent 28%),
            radial-gradient(circle at 5% 90%, rgba(30, 77, 123, 0.05), transparent 25%),
            #f5f8fb;
    }

    /* =========================================================
       BACKGROUND DECORATION
    ========================================================= */

    .authorization-invalid-page::before {
        content: "";
        position: absolute;
        width: 340px;
        height: 340px;
        top: -180px;
        right: -100px;
        border-radius: 50%;
        background: rgba(30, 77, 123, 0.035);
        pointer-events: none;
    }

    .authorization-invalid-page::after {
        content: "";
        position: absolute;
        width: 300px;
        height: 300px;
        bottom: -160px;
        left: -100px;
        border-radius: 50%;
        background: rgba(30, 77, 123, 0.035);
        pointer-events: none;
    }

    /* =========================================================
       WRAPPER
    ========================================================= */

    .invalid-wrapper {
        width: 100%;
        max-width: 590px;
        margin: 0 auto;
        position: relative;
        z-index: 2;
    }

    /* =========================================================
       CARD
    ========================================================= */

    .invalid-card {
        width: 100%;
        background: #ffffff;
        border: 1px solid rgba(30, 77, 123, 0.10);
        border-radius: 16px;
        overflow: hidden;
        box-shadow:
            0 20px 50px rgba(30, 77, 123, 0.11),
            0 4px 12px rgba(0, 0, 0, 0.04);
    }

    /* =========================================================
       GOVERNMENT HEADER
    ========================================================= */

    .invalid-header {
        position: relative;
        padding: 24px 30px 28px;
        text-align: center;
        background: linear-gradient(135deg, #1e4d7b 0%, #245d8f 100%);
    }

    /* =========================================================
       TRICOLOR STRIP
    ========================================================= */

    .invalid-header::after {
        content: "";
        position: absolute;
        left: 0;
        right: 0;
        bottom: 0;
        height: 4px;
        background: linear-gradient(
            to right,
            #ff9933 0%,
            #ff9933 33.33%,
            #ffffff 33.33%,
            #ffffff 66.66%,
            #138808 66.66%,
            #138808 100%
        );
    }

    .portal-label {
        margin-bottom: 5px;
        color: rgba(255, 255, 255, 0.84);
        font-size: 11px;
        font-weight: 600;
        letter-spacing: 1.5px;
        text-transform: uppercase;
    }

    .portal-title {
        margin: 0;
        color: #ffffff;
        font-size: 20px;
        font-weight: 700;
        letter-spacing: 0.2px;
    }

    /* =========================================================
       MAIN CONTENT
    ========================================================= */

    .invalid-content {
        padding: 38px 45px 35px;
        text-align: center;
    }

    /* =========================================================
       WARNING ICON
    ========================================================= */

    .invalid-icon-wrapper {
        width: 82px;
        height: 82px;
        margin: 0 auto 22px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 50%;
        background: var(--warning-bg);
        border: 1px solid #f1dfaa;
        box-shadow: 0 5px 18px rgba(216, 155, 0, 0.10);
    }

    .invalid-icon {
        width: 50px;
        height: 50px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 50%;
        background: #f0b900;
        color: #ffffff;
        font-size: 28px;
        font-weight: 800;
        line-height: 1;
        box-shadow: 0 4px 10px rgba(216, 155, 0, 0.22);
    }

    /* =========================================================
       HEADING
    ========================================================= */

    .invalid-heading {
        margin: 0 0 10px;
        color: var(--gov-blue);
        font-size: 25px;
        font-weight: 700;
        line-height: 1.3;
    }

    /* =========================================================
       MESSAGE
    ========================================================= */

    .invalid-message {
        max-width: 455px;
        margin: 0 auto 23px;
        color: var(--text-muted);
        font-size: 14.5px;
        line-height: 1.7;
    }

    /* =========================================================
       INFORMATION BOX
    ========================================================= */

    .information-box {
        width: 100%;
        max-width: 465px;
        margin: 0 auto 25px;
        padding: 14px 16px;
        display: flex;
        align-items: flex-start;
        gap: 12px;
        text-align: left;
        background: var(--gov-blue-light);
        border: 1px solid #dce8f2;
        border-radius: 9px;
    }

    .information-icon {
        width: 24px;
        height: 24px;
        min-width: 24px;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-top: 1px;
        border-radius: 50%;
        background: var(--gov-blue);
        color: #ffffff;
        font-size: 12px;
        font-weight: 700;
    }

    .information-box p {
        margin: 0;
        color: #536273;
        font-size: 12.8px;
        line-height: 1.6;
    }

    /* =========================================================
       LOGIN BUTTON
    ========================================================= */

    .btn-login {
        min-width: 175px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 9px;
        padding: 11px 23px;
        border: 1px solid var(--gov-blue);
        border-radius: 7px;
        background: var(--gov-blue);
        color: #ffffff;
        text-decoration: none;
        font-size: 14px;
        font-weight: 600;
        box-shadow: 0 4px 10px rgba(30, 77, 123, 0.15);
        transition:
            background 0.2s ease,
            border-color 0.2s ease,
            transform 0.2s ease,
            box-shadow 0.2s ease;
    }

    .btn-login:hover {
        background: var(--gov-blue-dark);
        border-color: var(--gov-blue-dark);
        color: #ffffff;
        transform: translateY(-1px);
        box-shadow: 0 7px 16px rgba(30, 77, 123, 0.22);
    }

    .login-arrow {
        font-size: 17px;
        line-height: 1;
        transition: transform 0.2s ease;
    }

    .btn-login:hover .login-arrow {
        transform: translateX(3px);
    }

    /* =========================================================
       FOOTER
    ========================================================= */

    .invalid-footer {
        padding: 16px 25px;
        text-align: center;
        background: #fafbfc;
        border-top: 1px solid var(--border);
    }

    .invalid-footer p {
        margin: 0;
        color: #7b8794;
        font-size: 11.5px;
        line-height: 1.6;
    }

    /* =========================================================
       TABLET
    ========================================================= */

    @media (max-width: 768px) {
        .authorization-invalid-page {
            min-height: calc(100vh - 110px);
            padding: 25px 18px;
        }

        .invalid-content {
            padding: 35px 30px 32px;
        }
    }

    /* =========================================================
       MOBILE
    ========================================================= */

    @media (max-width: 576px) {
        .authorization-invalid-page {
            min-height: calc(100vh - 100px);
            padding: 20px 14px;
        }

        .invalid-wrapper {
            max-width: 100%;
        }

        .invalid-card {
            border-radius: 13px;
        }

        .invalid-header {
            padding: 21px 18px 25px;
        }

        .portal-label {
            font-size: 10px;
            letter-spacing: 1.1px;
        }

        .portal-title {
            font-size: 18px;
        }

        .invalid-content {
            padding: 32px 20px 28px;
        }

        .invalid-icon-wrapper {
            width: 74px;
            height: 74px;
            margin-bottom: 19px;
        }

        .invalid-icon {
            width: 45px;
            height: 45px;
            font-size: 25px;
        }

        .invalid-heading {
            font-size: 22px;
            margin-bottom: 9px;
        }

        .invalid-message {
            font-size: 13.5px;
            line-height: 1.65;
        }

        .information-box {
            padding: 13px;
            gap: 10px;
        }

        .information-icon {
            width: 22px;
            height: 22px;
            min-width: 22px;
            font-size: 11px;
        }

        .information-box p {
            font-size: 12.3px;
            line-height: 1.55;
        }

        .btn-login {
            width: 100%;
            min-width: 0;
            padding: 12px 20px;
        }

        .invalid-footer {
            padding: 14px 18px;
        }

        .invalid-footer p {
            font-size: 11px;
        }
    }

    /* =========================================================
       VERY SMALL MOBILE
    ========================================================= */

    @media (max-width: 380px) {
        .authorization-invalid-page {
            padding: 15px 10px;
        }

        .invalid-content {
            padding: 28px 16px 24px;
        }

        .invalid-heading {
            font-size: 20px;
        }

        .invalid-message {
            font-size: 13px;
        }
    }
</style>

<!-- =========================================================
     AUTHORIZATION INVALID PAGE
========================================================== -->

<div class="authorization-invalid-page">
    <div class="invalid-wrapper">
        <div class="invalid-card">

            <!-- GOVERNMENT HEADER -->
            <div class="invalid-header">
                <div class="portal-label">
                    Government Authorization Portal
                </div>

                <h2 class="portal-title">
                    Authorization Verification
                </h2>
            </div>

            <!-- MAIN CONTENT -->
            <div class="invalid-content">

                <!-- WARNING ICON -->
                <div class="invalid-icon-wrapper">
                    <div class="invalid-icon">!</div>
                </div>

                <!-- HEADING -->
                <h1 class="invalid-heading">
                    Authorization Link Invalid
                </h1>

                <!-- DYNAMIC ERROR MESSAGE -->
                <p class="invalid-message">
                    <?= esc($message ?? 'Authorization link is invalid or expired.') ?>
                </p>

                <!-- INFORMATION BOX -->
                <div class="information-box">
                    <div class="information-icon">i</div>

                    <p>
                        Please use the latest authorization link
                        received on your registered official email.
                        If you have requested a new link, make sure
                        you are using the most recent email.
                    </p>
                </div>

                <!-- HOME BUTTON -->
                <a
                    href="<?= base_url('/') ?>"
                    class="btn-login"
                >
                    <span>Home</span>
                    <span class="login-arrow">→</span>
                </a>
            </div>

            <!-- SECURITY FOOTER -->
            <div class="invalid-footer">
                <p>
                    This is an official authorization portal.
                    Please do not share your authorization link
                    with anyone.
                </p>
            </div>

        </div>
    </div>
</div>

<?php echo view('footer/footer'); ?>