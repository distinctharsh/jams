<?php echo view('header/header'); ?>
<style>
.contact-section {
    padding: 105px 0 75px;
    background: #f4f7fa;
}
.contact-heading {
    max-width: 1100px;
    margin: 0 auto 32px;
}

.contact-heading-top {
    display: flex;
    align-items: center;
    gap: 14px;
    margin-bottom: 10px;
}

.contact-heading-mark {
    width: 5px;
    height: 38px;
    border-radius: 3px;
    background: #174a78;
}

.contact-heading h1 {
    margin: 0;
    color: #173f63;
    font-size: 31px;
    font-weight: 800;
    letter-spacing: -.4px;
}

.contact-heading p {
    margin: 0 0 0 19px;
    color: #687585;
    font-size: 14px;
    line-height: 1.7;
}

/* =========================================================
   GOVERNMENT ACCENT
   ========================================================= */

.gov-accent {
    height: 3px;
    width: 100%;
    margin-top: 22px;
    background: linear-gradient(
        90deg,
        #ff9933 0%,
        #ff9933 33%,
        #ffffff 33%,
        #ffffff 66%,
        #138808 66%,
        #138808 100%
    );
    border: 1px solid #e5e5e5;
}

/* =========================================================
   MAIN DIRECTORY
   ========================================================= */

.contact-directory {
    max-width: 1100px;
    margin: 0 auto;
    background: #ffffff;
    border: 1px solid #dce3e9;
    box-shadow: 0 10px 30px rgba(23, 63, 99, .06);
}

/* =========================================================
   DIRECTORY HEADER
   ========================================================= */

.directory-header {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 22px 30px;
    background: #173f63;
    color: #ffffff;
}

.directory-header-left {
    display: flex;
    align-items: center;
    gap: 13px;
}

.directory-header-icon {
    width: 42px;
    height: 42px;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 6px;
    background: rgba(255,255,255,.12);
    border: 1px solid rgba(255,255,255,.2);
    font-size: 17px;
}

.directory-header h2 {
    margin: 0;
    color: #ffffff;
    font-size: 18px;
    font-weight: 750;
}

.directory-header p {
    margin: 3px 0 0;
    color: rgba(255,255,255,.72);
    font-size: 12px;
}

.directory-code {
    color: rgba(255,255,255,.65);
    font-size: 11px;
    font-weight: 600;
    letter-spacing: .6px;
}

/* =========================================================
   OFFICER PROFILE
   ========================================================= */

.officer-profile {
    display: grid;
    grid-template-columns: 250px 1fr;
    min-height: 250px;
}

/* LEFT PROFILE */

.officer-side {
    padding: 30px;
    background: #f7f9fb;
    border-right: 1px solid #e0e6eb;
}

.officer-symbol {
    width: 76px;
    height: 76px;
    display: flex;
    align-items: center;
    justify-content: center;
    margin-bottom: 18px;
    border-radius: 50%;
    background: #ffffff;
    border: 1px solid #d5dfe7;
    color: #174a78;
    font-size: 30px;
    box-shadow: 0 4px 12px rgba(23,63,99,.06);
}

.officer-side-label {
    margin-bottom: 5px;
    color: #8995a1;
    font-size: 10px;
    font-weight: 800;
    letter-spacing: .8px;
    text-transform: uppercase;
}

.officer-side h3 {
    margin: 0 0 5px;
    color: #173f63;
    font-size: 19px;
    font-weight: 800;
}

.officer-side p {
    margin: 0;
    color: #687585;
    font-size: 13px;
    line-height: 1.6;
}

/* RIGHT PROFILE */

.officer-details {
    padding: 30px 35px;
}

.details-title {
    margin-bottom: 18px;
    padding-bottom: 12px;
    border-bottom: 1px solid #e5e9ed;
}

.details-title h3 {
    margin: 0;
    color: #173f63;
    font-size: 17px;
    font-weight: 750;
}

.details-title span {
    display: block;
    margin-top: 3px;
    color: #8a96a2;
    font-size: 11px;
}

/* =========================================================
   DETAIL TABLE
   ========================================================= */

.detail-table {
    width: 100%;
    border-collapse: collapse;
}

.detail-table tr {
    border-bottom: 1px solid #edf0f3;
}

.detail-table tr:last-child {
    border-bottom: none;
}

.detail-table th {
    width: 155px;
    padding: 15px 15px 15px 0;
    color: #7b8794;
    font-size: 11px;
    font-weight: 800;
    letter-spacing: .5px;
    text-align: left;
    text-transform: uppercase;
    vertical-align: top;
}

.detail-table td {
    padding: 15px 0;
    color: #26384a;
    font-size: 14px;
    font-weight: 650;
    line-height: 1.6;
    vertical-align: top;
}

/* =========================================================
   ICONS IN TABLE
   ========================================================= */

.table-label {
    display: flex;
    align-items: center;
    gap: 8px;
}

.table-label i {
    color: #174a78;
    font-size: 14px;
}

/* =========================================================
   OFFICIAL DIRECTORY LINK
   ========================================================= */

.directory-footer {
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 20px;
    padding: 20px 30px;
    background: #f7f9fb;
    border-top: 1px solid #e0e6eb;
}

.directory-footer-content {
    display: flex;
    align-items: center;
    gap: 13px;
}

.directory-footer-icon {
    width: 40px;
    height: 40px;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 6px;
    background: #ffffff;
    border: 1px solid #dbe3e9;
    color: #174a78;
    font-size: 16px;
}

.directory-footer h4 {
    margin: 0 0 3px;
    color: #173f63;
    font-size: 14px;
    font-weight: 750;
}

.directory-footer p {
    margin: 0;
    color: #7b8794;
    font-size: 11px;
}

.directory-action {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    padding: 10px 17px;
    border-radius: 5px;
    background: #174a78;
    color: #ffffff !important;
    text-decoration: none;
    font-size: 12px;
    font-weight: 700;
    transition: all .2s ease;
}

.directory-action:hover {
    background: #123b61;
    color: #ffffff !important;
    transform: translateY(-1px);
}

/* =========================================================
   RESPONSIVE
   ========================================================= */

@media (max-width: 991px) {
    .contact-section {
        padding: 95px 20px 60px;
    }
    .officer-profile {
        grid-template-columns: 210px 1fr;
    }
    .officer-side {
        padding: 25px;
    }
    .officer-details {
        padding: 25px;
    }
}

@media (max-width: 767px) {
    .contact-section {
        padding: 90px 15px 50px;
    }
    .contact-heading h1 {
        font-size: 29px;
    }
    .contact-heading p {
        margin-left: 19px;
    }
    .directory-header {
        padding: 18px 20px;
    }
    .directory-code {
        display: none;
    }
    .officer-profile {
        grid-template-columns: 1fr;
    }
    .officer-side {
        padding: 25px 20px;
        border-right: none;
        border-bottom: 1px solid #e0e6eb;
    }
    .officer-symbol {
        width: 62px;
        height: 62px;
        font-size: 25px;
    }
    .officer-details {
        padding: 25px 20px;
    }
    .detail-table th {
        width: 125px;
    }
    .directory-footer {
        flex-direction: column;
        align-items: flex-start;
        padding: 20px;
    }
    .directory-action {
        width: 100%;
        justify-content: center;
    }
}

@media (max-width: 480px) {
    .contact-heading-top {
        gap: 10px;
    }
    .contact-heading-mark {
        height: 32px;
    }
    .contact-heading h1 {
        font-size: 26px;
    }
    .detail-table th {
        width: 105px;
        font-size: 10px;
    }
    .detail-table td {
        font-size: 13px;
    }
}

/* =========================================================
   CONTACT PAGE - HEADER OVERLAP FIX
   ========================================================= */

#mainContent {
    position: relative;
    z-index: 1;
}

.contact-section {
    position: relative;
    margin-top: 0 !important;
    padding-top: 13px !important;
    padding-bottom: 75px;
}

/* =========================================================
   HEADER MUST STAY ABOVE CONTENT
   ========================================================= */

header,
.header,
#header {
    position: relative;
    z-index: 9999;
}

/* =========================================================
   TABLET
   ========================================================= */

@media (max-width: 991px) {
    .contact-section {
        padding-top: 105px !important;
    }
}

/* =========================================================
   MOBILE
   ========================================================= */

@media (max-width: 767px) {
    .contact-section {
        padding-top: 115px !important;
    }
}

/* =========================================================
   SMALL MOBILE
   ========================================================= */

@media (max-width: 480px) {
    .contact-section {
        padding-top: 105px !important;
    }
}
</style>

<!-- =========================================================
     MAIN CONTENT
     ========================================================= -->

<main class="main" id="mainContent">
    <section class="contact-section">
        <div class="container">
            <!-- =================================================
                 PAGE HEADING
                 ================================================= -->
            <div class="contact-heading">
                <div class="contact-heading-top">
                    <div class="contact-heading-mark"></div>
                    <h1>Contact Us</h1>
                </div>
                <p>
                    Official contact information and correspondence
                    details of the Cabinet Secretariat.
                </p>
                <div class="gov-accent"></div>
            </div>

            <!-- =================================================
                 CONTACT DIRECTORY
                 ================================================= -->
            <div class="contact-directory">
                <!-- DIRECTORY HEADER -->
                <div class="directory-header">
                    <div class="directory-header-left">
                        <div class="directory-header-icon">
                            <i class="bi bi-building"></i>
                        </div>
                        <div>
                            <h2>Cabinet Secretariat</h2>
                            <p>Government of India</p>
                        </div>
                    </div>
                    <div class="directory-code">
                        OFFICIAL CONTACT DIRECTORY
                    </div>
                </div>

                <!-- =================================================
                     OFFICER PROFILE
                     ================================================= -->
                <div class="officer-profile">
                    <!-- LEFT -->
                    <div class="officer-side">
                        <div class="officer-symbol">
                            <i class="bi bi-person-vcard-fill"></i>
                        </div>
                        <div class="officer-side-label">
                            Contact Officer
                        </div>
                        <h3>Mr. Inshul Chawla</h3>
                        <p>Under Secretary</p>
                    </div>

                    <!-- RIGHT -->
                    <div class="officer-details">
                        <div class="details-title">
                            <h3>Official Contact Details</h3>
                            <span>
                                Please use the information below
                                for official correspondence.
                            </span>
                        </div>

                        <table class="detail-table">
                            <tbody>
                                <!-- DESIGNATION -->
                                <tr>
                                    <th>
                                        <div class="table-label">
                                            <i class="bi bi-award-fill"></i>
                                            Designation
                                        </div>
                                    </th>
                                    <td>Under Secretary</td>
                                </tr>

                                <!-- ADDRESS -->
                                <tr>
                                    <th>
                                        <div class="table-label">
                                            <i class="bi bi-geo-alt-fill"></i>
                                            Address
                                        </div>
                                    </th>
                                    <td>
                                        Seva Teerth,<br>
                                        New Delhi - 110 011
                                    </td>
                                </tr>

                                <!-- PHONE -->
                                <tr>
                                    <th>
                                        <div class="table-label">
                                            <i class="bi bi-telephone-fill"></i>
                                            Phone No.
                                        </div>
                                    </th>
                                    <td>011-23093763</td>
                                </tr>

                                <!-- EMAIL -->
                                <tr>
                                    <th>
                                        <div class="table-label">
                                            <i class="bi bi-envelope-fill"></i>
                                            Email
                                        </div>
                                    </th>
                                    <td>abc@abc.gov.in</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

<?php echo view('footer/footer'); ?>