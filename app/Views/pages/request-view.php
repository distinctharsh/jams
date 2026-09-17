<?php
ob_start();

// Get application data from controller
$appData = $data['application_data'] ?? [];
$statusId = $appData['status_id'] ?? 1;
$csrfTokenName = $data['csrf_token_name'] ?? csrf_token();
$csrfHash = $data['csrf_hash'] ?? csrf_hash();
?>
<style>
/* ----- ACTIONS CARD (exactly from the first file) ----- */
.actions-card {
    border-radius: 0.75rem;
    border: 1px solid #e2e8f0;
    background: #ffffff;
    box-shadow: 0 2px 6px rgba(0, 0, 0, 0.02), 0 1px 2px rgba(0, 0, 0, 0.03);
    margin-top: 0.5rem;
    margin-bottom: 2rem;
    display: flex;
    justify-content: center;
}

.actions-header {
    padding: 1.25rem 1.5rem 0.1rem 1.5rem;
}

.actions-header h3 {
    font-size: 0.95rem;
    font-weight: 600;
    letter-spacing: -0.01em;
    color: #0f172a;
    margin-left: 2%;
    margin-bottom: 5px;
}

.actions-body {
    padding: 0rem 1.5rem 1.5rem 1.5rem;
    display: flex;
    gap: 0.5rem;
    justify-content: space-between;
}

.actions-body .btn{
    padding: 20px 120px;
}

/* button base – matches the original classes */
.btn {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 0.5rem;
    white-space: nowrap;
    border-radius: 0.5rem;
    font-size: 0.85rem;
    font-weight: 500;
    padding: 0.5rem 1rem;
    height: 2.5rem;
    cursor: pointer;
    transition: background 0.15s, border-color 0.15s, box-shadow 0.15s, color 0.15s;
    border: 1px solid transparent;
    background: transparent;
    color: inherit;
    text-decoration: none;
    line-height: 1;
    font-family: 'Inter', sans-serif;
}

.btn:focus-visible {
    outline: 2px solid #94a3b8;
    outline-offset: 1px;
}

.btn:disabled {
    opacity: 0.5;
    pointer-events: none;
    cursor: not-allowed;
}

.btn svg {
    width: 1rem;
    height: 1rem;
    pointer-events: none;
    flex-shrink: 0;
}

/* variants */
.btn-outline {
    background: #ffffff;
    border-color: #d1d9e6;
    color: #1e293b;
    box-shadow: 0 1px 2px rgba(0, 0, 0, 0.02);
}

.btn-outline:hover {
    background: #f1f5f9;
    border-color: #b9c4d4;
}

.btn-primary {
    background: #1e4d7b;
    color: #ffffff;
    border-color: #1e4d7b;
    box-shadow: 0 1px 2px rgba(0, 0, 0, 0.04);
}

.btn-primary:hover {
    background: #163a5d;
    border-color: #163a5d;
}

.btn-destructive {
    background: #b91c1c;
    color: #ffffff;
    border-color: #b91c1c;
    box-shadow: 0 1px 2px rgba(0, 0, 0, 0.04);
}

.btn-destructive:hover {
    background: #991b1b;
    border-color: #991b1b;
}

.btn-success {
    background: #0b7e3d;
    color: #ffffff;
    border-color: #0b7e3d;
}

.btn-success:hover {
    background: #08662f;
    border-color: #08662f;
}

/* subtle icon inside button */
.btn i {
    font-size: 0.9rem;
    line-height: 1;
}

/* make lucide-like icons via font awesome */
.btn .fa-eye, 
.btn .fa-check-circle, 
.btn .fa-undo-alt,
.btn .fa-file-alt,
.btn .fa-pen,
.btn .fa-times-circle {
    font-size: 0.9rem;
}

.btn .fa-undo-alt {
    transform: scaleX(-1);
}

/* demo extra spacing */
.demo-note {
    background: #f8fafc;
    border-radius: 0.75rem;
    padding: 1rem 1.25rem;
    border: 1px solid #eef2f6;
    color: #334155;
    font-size: 0.9rem;
    margin-top: 1.5rem;
    display: flex;
    align-items: center;
    gap: 0.75rem;
    flex-wrap: wrap;
}

.demo-note i {
    color: #1e4d7b;
    font-size: 1.1rem;
}

.demo-note code {
    background: #eef2f6;
    padding: 0.2rem 0.6rem;
    border-radius: 20px;
    font-size: 0.75rem;
    color: #1e293b;
}

/* responsive */
@media (max-width: 640px) {
    .card-header {
        flex-direction: column;
        align-items: flex-start;
    }
    .actions-body {
        gap: 0.4rem;
    }
    .btn {
        font-size: 0.8rem;
        padding: 0.4rem 0.8rem;
        height: 2.25rem;
    }
    .actions-header {
        padding: 1rem 1rem 0.25rem 1rem;
    }
    .actions-body {
        padding: 0.25rem 1rem 1rem 1rem;
    }
}

@media (max-width: 480px) {
    .app-card {
        padding: 1rem;
    }
    .btn {
        flex: 1 0 auto;
        justify-content: center;
    }
}
</style>
<style>
/* =========================================================
   JAMS - GOVERNMENT / NIC STYLE
   CUSTOM MODAL + TIMELINE
   HTML / PHP CHANGE NOT REQUIRED
   ========================================================= */


/* =========================================================
   CUSTOM MODAL
   ========================================================= */

.custom-modal {
    position: fixed;
    inset: 0;
    z-index: 99999;
    display: none;
    align-items: center;
    justify-content: center;
}

.custom-modal.show {
    display: flex;
}

.custom-modal-overlay {
    position: absolute;
    inset: 0;
    background: rgba(15, 35, 55, 0.62);
    backdrop-filter: blur(3px);
    -webkit-backdrop-filter: blur(3px);
}

.custom-modal-box {
    position: relative;
    width: 100%;
    max-width: 520px;
    margin: 20px;

    background: #ffffff;

    border: 1px solid #d6dee7;
    border-radius: 8px;

    box-shadow:
        0 20px 50px rgba(15, 35, 55, 0.22),
        0 5px 15px rgba(15, 35, 55, 0.08);

    overflow: hidden;
    z-index: 2;

    animation: customModalShow 0.22s ease-out;
}


/* Tricolour Government Accent */

.custom-modal-box::before {
    content: "";
    position: absolute;

    top: 0;
    left: 0;
    right: 0;

    height: 4px;

    background: linear-gradient(
        to right,
        #174a78 0%,
        #174a78 70%,
        #ff9933 70%,
        #ff9933 85%,
        #138808 85%,
        #138808 100%
    );

    z-index: 5;
}


@keyframes customModalShow {

    from {
        opacity: 0;
        transform: translateY(-12px) scale(0.985);
    }

    to {
        opacity: 1;
        transform: translateY(0) scale(1);
    }

}


/* =========================================================
   MODAL HEADER
   ========================================================= */

.custom-modal-header {
    display: flex;
    align-items: center;
    justify-content: space-between;

    gap: 15px;

    padding: 20px 22px 15px;

    background: #fbfcfd;

    border-bottom: 1px solid #e3e8ee;
}

.custom-modal-header h5 {
    margin: 0;

    color: #17324d;

    font-size: 17px;
    font-weight: 700;

    line-height: 1.4;
}

.custom-modal-header h5 i {
    margin-right: 9px;

    color: #174a78;

    font-size: 15px;
}

.custom-modal-header h5 .reject-icon {
    color: #b42318;
}


/* =========================================================
   MODAL CLOSE
   ========================================================= */

.custom-modal-close {
    width: 31px;
    height: 31px;

    padding: 0;

    border: 1px solid transparent;
    border-radius: 5px;

    background: transparent;

    color: #64748b;

    font-size: 24px;
    line-height: 1;

    cursor: pointer;

    display: flex;
    align-items: center;
    justify-content: center;

    transition: all 0.18s ease;
}

.custom-modal-close:hover {
    background: #edf2f7;

    border-color: #d8e0e8;

    color: #17324d;
}


/* =========================================================
   MODAL BODY
   ========================================================= */

.custom-modal-body {
    padding: 20px 22px 18px;

    background: #ffffff;
}

.custom-form-group {
    margin-bottom: 17px;
}

.custom-form-group:last-child {
    margin-bottom: 0;
}

.custom-form-group label {
    display: block;

    margin-bottom: 7px;

    color: #334155;

    font-size: 13px;
    font-weight: 650;

    line-height: 1.4;
}

.custom-form-group label span {
    color: #c62828;
    margin-left: 2px;
}


/* =========================================================
   MODAL INPUTS
   ========================================================= */

.custom-form-group select,
.custom-form-group input,
.custom-form-group textarea {
    width: 100%;

    box-sizing: border-box;

    border: 1px solid #cbd5df;
    border-radius: 5px;

    padding: 10px 12px;

    background: #ffffff;

    color: #334155;

    font-size: 13px;
    font-weight: 400;

    outline: none;

    transition:
        border-color 0.18s ease,
        box-shadow 0.18s ease,
        background 0.18s ease;
}

.custom-form-group select {
    height: 42px;

    cursor: pointer;
}

.custom-form-group input {
    height: 42px;
}

.custom-form-group textarea {
    min-height: 90px;

    resize: vertical;

    line-height: 1.5;
}

.custom-form-group input::placeholder,
.custom-form-group textarea::placeholder {
    color: #94a3b8;
}

.custom-form-group select:focus,
.custom-form-group input:focus,
.custom-form-group textarea:focus {
    border-color: #174a78;

    background: #fcfdff;

    box-shadow:
        0 0 0 3px rgba(23, 74, 120, 0.09);
}


/* =========================================================
   CHECKBOX
   ========================================================= */

.custom-checkbox {
    display: flex;
    align-items: flex-start;

    gap: 9px;

    margin-top: 6px;

    padding: 10px 11px;

    background: #f8fafc;

    border: 1px solid #e2e8f0;

    border-radius: 5px;
}

.custom-checkbox input {
    width: 16px;
    height: 16px;

    min-width: 16px;

    margin-top: 2px;

    cursor: pointer;

    accent-color: #174a78;
}

.custom-checkbox label {
    margin: 0;

    color: #64748b;

    font-size: 12px;

    line-height: 1.5;

    cursor: pointer;
}


/* =========================================================
   MODAL FOOTER
   ========================================================= */

.custom-modal-footer {
    display: flex;
    align-items: center;
    justify-content: flex-end;

    gap: 9px;

    padding: 14px 22px 18px;

    background: #fbfcfd;

    border-top: 1px solid #e3e8ee;
}


/* =========================================================
   BUTTONS
   ========================================================= */

.custom-btn {
    min-height: 38px;

    padding: 8px 17px;

    border: 1px solid transparent;
    border-radius: 5px;

    font-size: 13px;
    font-weight: 600;

    cursor: pointer;

    display: inline-flex;
    align-items: center;
    justify-content: center;

    gap: 7px;

    transition:
        background 0.18s ease,
        border-color 0.18s ease,
        box-shadow 0.18s ease,
        transform 0.12s ease;
}

.custom-btn:active {
    transform: translateY(1px);
}


/* Secondary */

.custom-btn-secondary {
    background: #64748b;

    border-color: #64748b;

    color: #ffffff;
}

.custom-btn-secondary:hover {
    background: #475569;

    border-color: #475569;

    box-shadow:
        0 3px 8px rgba(71, 85, 105, 0.18);
}


/* Primary */

.custom-btn-primary {
    background: #174a78;

    border-color: #174a78;

    color: #ffffff;
}

.custom-btn-primary:hover {
    background: #123b60;

    border-color: #123b60;

    box-shadow:
        0 3px 9px rgba(23, 74, 120, 0.22);
}


/* Danger */

.custom-btn-danger {
    background: #b42318;

    border-color: #b42318;

    color: #ffffff;
}

.custom-btn-danger:hover {
    background: #912018;

    border-color: #912018;

    box-shadow:
        0 3px 9px rgba(180, 35, 24, 0.18);
}


/* =========================================================
   PERMISSION BUTTON
   ========================================================= */

.permission-btn {
    margin-top: 20px;
    margin-bottom: 20px;
}


/* =========================================================
   TIMELINE CARD
   ========================================================= */




/* =========================================================
   TIMELINE HEADER
   ========================================================= */

.timeline-header {
    display: flex;
    align-items: flex-start;
    justify-content: space-between;

    gap: 18px;

    padding: 19px 22px 15px;

    background: #fbfcfd;

    border-bottom: 1px solid #e3e8ee;
}

.timeline-header h3 {
    margin: 0;

    color: #17324d;

    font-size: 16px;

    font-weight: 700;

    line-height: 1.4;
}

.timeline-header h3::before {
    content: "";

    display: inline-block;

    width: 3px;
    height: 16px;

    margin-right: 9px;

    vertical-align: -2px;

    background: #174a78;

    border-radius: 1px;
}

.timeline-header p {
    margin: 5px 0 0 12px;

    color: #718096;

    font-size: 11px;

    line-height: 1.5;
}


/* =========================================================
   CURRENT STATUS
   ========================================================= */

.timeline-current-status {
    display: inline-flex;
    align-items: center;
    justify-content: center;

    padding: 6px 10px;

    background: #edf4fa;

    border: 1px solid #c9dceb;

    border-radius: 4px;

    color: #174a78;

    font-size: 10px;

    font-weight: 700;

    white-space: nowrap;

    text-transform: uppercase;

    letter-spacing: 0.2px;
}


/* =========================================================
   CURRENT STATUS - COLOUR STATES
   ========================================================= */

.timeline-current-status.status-approved {
    background: #ecfdf3;
    border-color: #bbf7d0;
    color: #166534;
}

.timeline-current-status.status-rejected {
    background: #fef2f2;
    border-color: #fecaca;
    color: #b91c1c;
}

.timeline-current-status.status-returned {
    background: #fff7ed;
    border-color: #fed7aa;
    color: #c2410c;
}

.timeline-current-status.status-processing {
    background: #edf4fa;
    border-color: #c9dceb;
    color: #174a78;
}


/* =========================================================
   TIMELINE BODY
   ========================================================= */

.timeline-body {
    padding: 17px 22px 8px;
}

.timeline-list {
    position: relative;
}


/* =========================================================
   TIMELINE ITEM
   ========================================================= */

.timeline-item {
    position: relative;

    display: flex;

    gap: 14px;

    min-height: 78px;
}


/* =========================================================
   DEFAULT DOT
   ========================================================= */

.timeline-dot {
    position: relative;

    z-index: 3;

    width: 18px;
    height: 18px;

    min-width: 18px;

    margin-top: 3px;

    border-radius: 50%;

    display: flex;
    align-items: center;
    justify-content: center;

    background: #ffffff;

    border: 2px solid #94a3b8;

    color: #64748b;

    font-size: 8px;

    box-shadow: 0 0 0 2px #ffffff;

    transition: all 0.2s ease;
}


/* =========================================================
   TIMELINE LINE
   ========================================================= */

.timeline-line {
    position: absolute;

    left: 8px;

    top: 20px;

    bottom: -2px;

    width: 1px;

    background: #d2dae3;
}

.timeline-item:last-child .timeline-line {
    display: none;
}


/* =========================================================
   CONTENT
   ========================================================= */

.timeline-content {
    flex: 1;

    min-width: 0;

    padding-bottom: 20px;
}

.timeline-title-row {
    display: flex;
    align-items: center;

    gap: 8px;

    flex-wrap: wrap;
}

.timeline-title {
    color: #1e293b;

    font-size: 13px;

    font-weight: 700;

    line-height: 1.35;
}


/* =========================================================
   ACTIVE BADGE
   ========================================================= */

.timeline-active-badge {
    display: inline-flex;
    align-items: center;

    padding: 3px 7px;

    background: #edf4fa;

    border: 1px solid #c9dceb;

    border-radius: 4px;

    color: #174a78;

    font-size: 9px;

    font-weight: 700;

    text-transform: uppercase;

    letter-spacing: 0.2px;
}


/* =========================================================
   META
   ========================================================= */

.timeline-meta {
    margin-top: 4px;

    display: flex;

    flex-wrap: wrap;

    align-items: center;

    gap: 5px;

    color: #64748b;

    font-size: 10px;

    line-height: 1.5;
}

.timeline-separator {
    color: #a7b2bf;
}


/* =========================================================
   ASSIGNMENT
   ========================================================= */

.timeline-assignment {
    display: inline-flex;
    align-items: center;

    gap: 6px;

    margin-top: 7px;

    padding: 5px 9px;

    background: #f7f9fb;

    border: 1px solid #e0e6ec;

    border-radius: 4px;

    color: #475569;

    font-size: 10px;

    line-height: 1.3;
}

.timeline-assignment i {
    color: #174a78;

    font-size: 9px;
}


/* =========================================================
   REMARKS
   ========================================================= */

.timeline-remarks {
    display: flex;
    align-items: flex-start;

    gap: 7px;

    margin-top: 7px;

    padding: 6px 8px;

    border-radius: 4px;

    color: #64748b;

    font-size: 10px;

    line-height: 1.55;
}

.timeline-remarks i {
    margin-top: 3px;

    color: #8493a3;

    font-size: 9px;
}


/* =========================================================
   COMPLETED - GREEN
   Existing class:
   .timeline-item-completed
   ========================================================= */

.timeline-item-completed .timeline-dot {
    background: #ffffff;

    border-color: #15803d;

    color: #15803d;

    box-shadow:
        0 0 0 3px #ecfdf3;
}

.timeline-item-completed .timeline-title {
    color: #166534;
}

.timeline-item-completed .timeline-line {
    background: #86efac;
}

.timeline-item-completed .timeline-assignment {
    background: #f0fdf4;

    border-color: #bbf7d0;

    color: #166534;
}

.timeline-item-completed .timeline-assignment i {
    color: #15803d;
}

.timeline-item-completed .timeline-remarks {
    background: #f6fff8;

    border-left: 3px solid #22c55e;

    color: #166534;
}

.timeline-item-completed .timeline-remarks i {
    color: #15803d;
}


/* =========================================================
   CURRENT / ACTIVE - BLUE
   Existing class:
   .timeline-item-current
   ========================================================= */

.timeline-item-current .timeline-dot {
    width: 19px;
    height: 19px;

    background: #174a78;

    border-color: #174a78;

    color: #ffffff;

    box-shadow:
        0 0 0 4px #e8f1f8,
        0 2px 6px rgba(23, 74, 120, 0.20);
}

.timeline-item-current .timeline-title {
    color: #174a78;
}

.timeline-item-current .timeline-active-badge {
    background: #edf4fa;

    border-color: #c9dceb;

    color: #174a78;
}

.timeline-item-current .timeline-remarks {
    background: #f5f9fc;

    border-left: 3px solid #174a78;

    color: #475569;
}


/* =========================================================
   REJECTED - RED
   Works with:
   .timeline-item-rejected
   ========================================================= */

.timeline-item-rejected .timeline-dot {
    background: #ffffff;

    border-color: #dc2626;

    color: #dc2626;

    box-shadow:
        0 0 0 3px #fef2f2;
}

.timeline-item-rejected .timeline-title {
    color: #b91c1c;
}

.timeline-item-rejected .timeline-line {
    background: #fca5a5;
}

.timeline-item-rejected .timeline-assignment {
    background: #fef2f2;

    border-color: #fecaca;

    color: #991b1b;
}

.timeline-item-rejected .timeline-assignment i {
    color: #dc2626;
}

.timeline-item-rejected .timeline-remarks {
    background: #fff7f7;

    border-left: 3px solid #dc2626;

    color: #991b1b;
}

.timeline-item-rejected .timeline-remarks i {
    color: #dc2626;
}


/* =========================================================
   RETURNED - ORANGE
   ========================================================= */

.timeline-item-returned .timeline-dot {
    background: #ffffff;

    border-color: #ea580c;

    color: #ea580c;

    box-shadow:
        0 0 0 3px #fff7ed;
}

.timeline-item-returned .timeline-title {
    color: #c2410c;
}

.timeline-item-returned .timeline-line {
    background: #fdba74;
}

.timeline-item-returned .timeline-assignment {
    background: #fff7ed;

    border-color: #fed7aa;

    color: #9a3412;
}

.timeline-item-returned .timeline-assignment i {
    color: #ea580c;
}

.timeline-item-returned .timeline-remarks {
    background: #fffaf5;

    border-left: 3px solid #ea580c;

    color: #9a3412;
}

.timeline-item-returned .timeline-remarks i {
    color: #ea580c;
}


/* =========================================================
   PENDING - GREY
   ========================================================= */

.timeline-item-pending .timeline-dot {
    background: #ffffff;

    border-color: #94a3b8;

    color: #64748b;

    box-shadow:
        0 0 0 3px #f1f5f9;
}

.timeline-item-pending .timeline-title {
    color: #475569;
}

.timeline-item-pending .timeline-assignment {
    background: #f8fafc;

    border-color: #e2e8f0;
}


/* =========================================================
   DOCUMENT / PDF - BLUE
   ========================================================= */

.timeline-item-document .timeline-dot {
    background: #eff6ff;

    border-color: #2563eb;

    color: #2563eb;

    box-shadow:
        0 0 0 3px #eff6ff;
}

.timeline-item-document .timeline-title {
    color: #1d4ed8;
}

.timeline-item-document .timeline-assignment {
    background: #eff6ff;

    border-color: #bfdbfe;

    color: #1e40af;
}

.timeline-item-document .timeline-assignment i {
    color: #2563eb;
}


/* =========================================================
   APPROVED / FINAL GREEN
   ========================================================= */

.timeline-item-final .timeline-dot {
    width: 21px;
    height: 21px;

    background: #15803d;

    border-color: #15803d;

    color: #ffffff;

    box-shadow:
        0 0 0 4px #dcfce7,
        0 2px 7px rgba(21, 128, 61, 0.20);
}

.timeline-item-final .timeline-title {
    color: #166534;

    font-size: 14px;
}

.timeline-item-final .timeline-active-badge {
    background: #dcfce7;

    border-color: #bbf7d0;

    color: #166534;
}


/* =========================================================
   FINAL REJECTED - RED
   ========================================================= */

.timeline-item-final-rejected .timeline-dot {
    width: 21px;
    height: 21px;

    background: #dc2626;

    border-color: #dc2626;

    color: #ffffff;

    box-shadow:
        0 0 0 4px #fee2e2,
        0 2px 7px rgba(220, 38, 38, 0.20);
}

.timeline-item-final-rejected .timeline-title {
    color: #b91c1c;

    font-size: 14px;
}


/* =========================================================
   STATUS BADGES
   ========================================================= */

.timeline-status-badge {
    display: inline-flex;
    align-items: center;

    gap: 5px;

    padding: 3px 8px;

    border-radius: 4px;

    font-size: 9px;

    font-weight: 700;

    line-height: 1.2;

    text-transform: uppercase;

    letter-spacing: 0.25px;
}


/* Approved */

.timeline-status-badge.status-approved,
.timeline-status-badge.status-completed {
    background: #ecfdf3;

    border: 1px solid #bbf7d0;

    color: #166534;
}


/* Processing */

.timeline-status-badge.status-processing,
.timeline-status-badge.status-current {
    background: #edf4fa;

    border: 1px solid #c9dceb;

    color: #174a78;
}


/* Rejected */

.timeline-status-badge.status-rejected {
    background: #fef2f2;

    border: 1px solid #fecaca;

    color: #b91c1c;
}


/* Returned */

.timeline-status-badge.status-returned {
    background: #fff7ed;

    border: 1px solid #fed7aa;

    color: #c2410c;
}


/* Pending */

.timeline-status-badge.status-pending {
    background: #f1f5f9;

    border: 1px solid #dbe3ec;

    color: #475569;
}

.timeline-status-badge i {
    font-size: 8px;
}


/* =========================================================
   DOCUMENT / FILE BOX
   ========================================================= */

.timeline-document {
    display: flex;
    align-items: center;

    gap: 9px;

    margin-top: 8px;

    padding: 8px 10px;

    background: #f8fafc;

    border: 1px solid #dce5ed;

    border-radius: 5px;
}

.timeline-document-icon {
    width: 31px;
    height: 31px;

    min-width: 31px;

    display: flex;
    align-items: center;
    justify-content: center;

    border-radius: 4px;

    background: #edf4fa;

    color: #174a78;

    font-size: 15px;
}

.timeline-document-info {
    min-width: 0;

    flex: 1;
}

.timeline-document-title {
    color: #334155;

    font-size: 11px;

    font-weight: 700;
}

.timeline-document-meta {
    margin-top: 2px;

    color: #94a3b8;

    font-size: 9px;
}


/* Approved file */

.timeline-document.document-approved {
    background: #f5fff7;

    border-color: #bbf7d0;
}

.timeline-document.document-approved .timeline-document-icon {
    background: #dcfce7;

    color: #15803d;
}


/* Rejected file */

.timeline-document.document-rejected {
    background: #fff7f7;

    border-color: #fecaca;
}

.timeline-document.document-rejected .timeline-document-icon {
    background: #fee2e2;

    color: #dc2626;
}


/* =========================================================
   TIMELINE FOOTER
   ========================================================= */

.timeline-footer {
    margin: 0 22px;

    padding: 12px 0 15px;

    border-top: 1px solid #e0e6ec;

    color: #64748b;

    font-size: 10px;

    line-height: 1.5;
}

.timeline-footer strong {
    margin-left: 3px;

    color: #17324d;

    font-weight: 700;
}


/* =========================================================
   EMPTY STATE
   ========================================================= */

.timeline-empty {
    min-height: 130px;

    display: flex;
    align-items: center;
    justify-content: center;

    gap: 12px;

    color: #64748b;
}

.timeline-empty-icon {
    width: 40px;
    height: 40px;

    border-radius: 5px;

    background: #f1f5f8;

    border: 1px solid #dce4eb;

    display: flex;
    align-items: center;
    justify-content: center;

    color: #64748b;
}

.timeline-empty strong {
    display: block;

    color: #334155;

    font-size: 13px;

    font-weight: 700;
}

.timeline-empty p {
    margin: 3px 0 0;

    color: #7b8794;

    font-size: 11px;
}


/* =========================================================
   RESPONSIVE - TABLET
   ========================================================= */

@media (max-width: 768px) {

    .custom-modal-box {
        max-width: calc(100% - 30px);

        margin: 15px;
    }

    .timeline-header {
        gap: 12px;
    }

    .timeline-current-status {
        font-size: 9px;

        padding: 5px 8px;
    }
}


/* =========================================================
   RESPONSIVE - MOBILE
   ========================================================= */

@media (max-width: 640px) {

    .custom-modal-box {
        max-width: calc(100% - 24px);

        margin: 12px;

        border-radius: 7px;
    }

    .custom-modal-header {
        padding: 18px 17px 14px;
    }

    .custom-modal-header h5 {
        font-size: 15px;
    }

    .custom-modal-body {
        padding: 17px;
    }

    .custom-modal-footer {
        padding: 13px 17px 16px;
    }

    .custom-btn {
        padding: 8px 14px;

        font-size: 12px;
    }


    /* Timeline */

    .timeline-header {
        flex-direction: column;

        gap: 10px;

        padding: 17px 16px 14px;
    }

    .timeline-header h3 {
        font-size: 15px;
    }

    .timeline-header p {
        margin-left: 12px;
    }

    .timeline-current-status {
        align-self: flex-start;
    }

    .timeline-body {
        padding: 15px 16px 7px;
    }

    .timeline-footer {
        margin: 0 16px;
    }
}
/* =========================================================
   VERY SMALL MOBILE
   ========================================================= */
@media (max-width: 430px) {

    .custom-modal-footer {
        flex-direction: column-reverse;
    }

    .custom-btn {
        width: 100%;
    }

    .timeline-title {
        font-size: 12px;
    }

    .timeline-meta {
        font-size: 9px;
    }

    .timeline-assignment,
    .timeline-remarks {
        font-size: 9px;
    }

    .timeline-document {
        padding: 7px 8px;
    }

    .timeline-document-icon {
        width: 28px;
        height: 28px;

        min-width: 28px;

        font-size: 13px;
    }
}
</style>
<style>#toast-container {
    position: fixed !important;
    top: 20px !important;
    right: 20px !important;

    /* Modal se bahut upar */
    z-index: 2147483647 !important;

    display: flex !important;
    flex-direction: column !important;
    gap: 10px !important;

    pointer-events: none !important;
}

/* Toast ke andar jo actual message hai */
#toast-container > *,
#toast-container .toast {
    position: relative !important;
    z-index: 2147483647 !important;
    pointer-events: auto !important;
}</style>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Application Details</title>
</head>
<body>

<!-- Add CSRF token meta tag for AJAX requests -->
<meta name="csrf-token-name" content="<?= $csrfTokenName ?>">
<meta name="csrf-token-hash" content="<?= $csrfHash ?>">

<div class="grid gap-6">
    <div id="toast-container"
         style="
            position:fixed;
            top:20px;
            right:20px;
            z-index:99999;
            display:flex;
            flex-direction:column;
            gap:10px;
            pointer-events:none;
         ">
    </div>
    <div class="space-y-6 max-w-[1500px] mx-auto w-full">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 items-start">
            <!-- LEFT COLUMN -->
            <div class="lg:col-span-2 space-y-6">
                <!-- REQUEST DETAILS CARD -->
                <div class="gov-card p-5 mt-5">
                    <!-- HEADER -->
                    <div class="flex items-center justify-between mb-6 gap-4">
                        <div class="flex items-center gap-3 min-w-0">
                            <div class="w-11 h-11 rounded-xl bg-orange-50 flex items-center justify-center shrink-0">
                                <i class="fas fa-file-alt text-[#e58500] text-xl"></i>
                            </div>
                            <div>
                                <h2 class="text-xl font-bold text-[#1e4d7b]">Request Details</h2>
                                <?php if (isset($status)): ?>
                                <div class="flex items-center gap-2 mt-1">
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-[10px] font-bold
                                        <?php 
                                        $statusId = $status->id ?? 1;
                                        if ($statusId == 3): ?>
                                            bg-green-100 text-green-700
                                        <?php elseif ($statusId == 9 || $statusId == 10 || $statusId == 11 || $statusId == 12): ?>
                                            bg-emerald-100 text-emerald-700
                                        <?php elseif ($statusId >= 13): ?>
                                            bg-red-100 text-red-700
                                        <?php else: ?>
                                            bg-blue-100 text-[#1e4d7b]
                                        <?php endif; ?>
                                    ">
                                        <?= esc($status->name ?? 'SUBMITTED') ?>
                                    </span>
                                </div>
                                <?php endif; ?>
                            </div>
                        </div>
                        <p class="text-xs text-slate-500 mt-0.5">Request ID: <?= esc($application->app_no ?? '#0045') ?></p>
                    </div>

                    <!-- TAB HEADER -->
                    <div class="flex border-b border-slate-200 mb-6 gap-6">
                        <button type="button" id="tab-btn-details" onclick="switchTab('details')" class="pb-3 text-sm font-bold text-[#1e4d7b] border-b-2 border-[#1e4d7b] flex items-center gap-2 transition">
                            <i class="fas fa-info-circle"></i>Details
                        </button>
                        <button type="button" id="tab-btn-documents" onclick="switchTab('documents')" class="pb-3 text-sm font-medium text-slate-500 border-b-2 border-transparent hover:text-slate-700 flex items-center gap-2 transition">
                            <i class="fas fa-folder-open"></i>
                            Documents
                        </button>
                    </div>

                    <!-- DETAILS TAB -->
                    <div id="tab-content-details" class="space-y-4">
                        <!-- APPLICATION DETAILS -->
                        <div>
                            <div class="flex items-center gap-2 mb-4">
                                <div class="w-8 h-8 rounded-lg bg-orange-50 flex items-center justify-center">
                                    <i class="fas fa-file-alt text-[#e58500] text-sm"></i>
                                </div>
                                <div>
                                    <h3 class="text-base font-bold text-[#1e4d7b]">Application Details</h3>
                                    <p class="text-[11px] text-slate-400">Basic application and reference information</p>
                                </div>
                            </div>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-3">
                                <div class="bg-slate-50/70 border border-slate-200 rounded-lg px-4 py-3">
                                    <label class="block text-[11px] font-medium text-slate-500 mb-1">Application Number</label>
                                    <p class="text-sm font-semibold text-slate-800"><?= esc($application->app_no ?? 'JPMS/2026/001057') ?></p>
                                </div>
                                <div class="bg-slate-50/70 border border-slate-200 rounded-lg px-4 py-3">
                                    <label class="block text-[11px] font-medium text-slate-500 mb-1">Authorised Contact</label>
                                    <p class="text-sm font-semibold text-slate-800"><?= esc($application->contact_person ?? 'Ananya Rao') ?></p>
                                </div>
                                <div class="bg-slate-50/70 border border-slate-200 rounded-lg px-4 py-3">
                                    <label class="block text-[11px] font-medium text-slate-500 mb-1">Status</label>
                                    <p class="text-sm font-semibold text-slate-800">
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-[11px] font-bold
                                            <?php 
                                            $statusId = $status->id ?? 1;
                                            if ($statusId == 3): ?>
                                                bg-green-100 text-green-700
                                            <?php elseif ($statusId >= 9 && $statusId <= 12): ?>
                                                bg-emerald-100 text-emerald-700
                                            <?php elseif ($statusId >= 13): ?>
                                                bg-red-100 text-red-700
                                            <?php else: ?>
                                                bg-blue-100 text-[#1e4d7b]
                                            <?php endif; ?>
                                        ">
                                            <?= esc($status->name ?? 'SUBMITTED') ?>
                                        </span>
                                    </p>
                                </div>
                                <div class="bg-slate-50/70 border border-slate-200 rounded-lg px-4 py-3">
                                    <label class="block text-[11px] font-medium text-slate-500 mb-1">Submitted Date</label>
                                    <p class="text-sm font-semibold text-slate-800"><?= date('d-m-Y H:i:s', strtotime($application->created_at ?? date('Y-m-d H:i:s'))) ?></p>
                                </div>
                            </div>
                        </div>

                        <hr class="my-6 border-slate-200">

                        <!-- ORGANISATION DETAILS -->
                        <div>
                            <div class="flex items-center gap-2 mb-4">
                                <div class="w-8 h-8 rounded-lg bg-orange-50 flex items-center justify-center">
                                    <i class="fas fa-building text-[#e58500] text-sm"></i>
                                </div>
                                <div>
                                    <h3 class="text-base font-bold text-[#1e4d7b]">Organisation Details</h3>
                                    <p class="text-[11px] text-slate-400">Registered organisation information</p>
                                </div>
                            </div>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-3">
                                <div class="bg-slate-50/70 border border-slate-200 rounded-lg px-4 py-3">
                                    <label class="block text-[11px] font-medium text-slate-500 mb-1">Organisation Name</label>
                                    <p class="text-sm font-semibold text-slate-800"><?= esc($application->organisation ?? 'Global Education Services Pvt Ltd') ?></p>
                                </div>
                                <div class="bg-slate-50/70 border border-slate-200 rounded-lg px-4 py-3">
                                    <label class="block text-[11px] font-medium text-slate-500 mb-1">Organisation Type</label>
                                    <p class="text-sm font-semibold text-slate-800"><?= esc($application->organisation_type ?? 'Private Limited') ?></p>
                                </div>
                            </div>
                        </div>

                        <hr class="my-6 border-slate-200">

                        <!-- EXAMINATION DETAILS -->
                        <div>
                            <div class="flex items-center gap-2 mb-4">
                                <div class="w-8 h-8 rounded-lg bg-orange-50 flex items-center justify-center">
                                    <i class="fas fa-graduation-cap text-[#e58500] text-sm"></i>
                                </div>
                                <div>
                                    <h3 class="text-base font-bold text-[#1e4d7b]">Examination Details</h3>
                                    <p class="text-[11px] text-slate-400">Examination schedule and centre information</p>
                                </div>
                            </div>

                            <!-- CENTRE INFORMATION NOT AVAILABLE - Shows when centre_list_ready = 0 -->
                            <?php if (isset($application->centre_list_ready) && $application->centre_list_ready == 0): ?>
                            <div class="mt-4 p-4 border border-amber-200 bg-amber-50 rounded-lg">
                                <div class="flex items-start gap-3">
                                    <div class="w-8 h-8 rounded-full bg-amber-100 flex items-center justify-center shrink-0 mt-0.5">
                                        <i class="fas fa-exclamation-triangle text-amber-600 text-sm"></i>
                                    </div>
                                    <div>
                                        <h4 class="text-sm font-bold text-amber-800">Centre Information Not Available</h4>
                                        <p class="text-sm text-amber-700 mt-1 leading-relaxed">
                                            Currently Centre Name, State, City, and Centre Address are not available right now. 
                                        </p>
                                        <div class="mt-2 flex items-center gap-2">
                                            <div class="w-4 h-4 rounded border-2 border-amber-500 bg-amber-500 flex items-center justify-center">
                                                <i class="fas fa-check text-white text-[8px]"></i>
                                            </div>
                                            <span class="text-xs text-amber-700">Declaration acknowledged</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php endif; ?>
                            <br>
                            <?php if (!empty($exam_details)): ?>
                                <div class="overflow-x-auto border border-slate-200 rounded-lg">
                                    <table class="w-full text-sm">
                                        <thead>
                                            <tr class="bg-slate-50 border-b border-slate-200">
                                                <th class="px-4 py-3 text-left text-[11px] font-bold text-slate-600">S. No.</th>
                                                <th class="px-4 py-3 text-left text-[11px] font-bold text-slate-600">Exam Name</th>
                                                <th class="px-4 py-3 text-left text-[11px] font-bold text-slate-600">Exam Date</th>
                                                <th class="px-4 py-3 text-left text-[11px] font-bold text-slate-600">Centre Name</th>
                                                <th class="px-4 py-3 text-left text-[11px] font-bold text-slate-600">State/UT</th>
                                                <th class="px-4 py-3 text-left text-[11px] font-bold text-slate-600">City/District</th>
                                                <th class="px-4 py-3 text-left text-[11px] font-bold text-slate-600">Centre Address</th>
                                            </tr>
                                        </thead>
                                        <tbody class="divide-y divide-slate-100">
                                            <?php $i = 1; foreach ($exam_details as $exam): ?>
                                            <tr class="hover:bg-slate-50 transition">
                                                <td class="px-4 py-3 align-top text-slate-700 font-medium"><?= $i++ ?></td>
                                                <td class="px-4 py-3 align-top text-slate-800 font-semibold"><?= esc($exam['exam_name'] ?? '—') ?></td>
                                                <td class="px-4 py-3 align-top text-slate-700 whitespace-nowrap"><?= !empty($exam['exam_date']) ? date('d M Y', strtotime($exam['exam_date'])) : '—' ?></td>
                                                <td class="px-4 py-3 align-top text-slate-700"><?= esc($exam['centre_name'] ?? '—') ?></td>
                                                <td class="px-4 py-3 align-top text-slate-700">
                                                    <?= esc(getMasterValue('state', $exam['state_name'] ?? '', 'state_name') ?: '-') ?>
                                                </td>
                                                <td class="px-4 py-3 align-top text-slate-700">
                                                    <?= esc(getMasterValue('city', $exam['district_name'] ?? '', 'city_name') ?: '-') ?>
                                                </td>
                                                <td class="px-4 py-3 align-top text-slate-700 leading-relaxed"><?= esc($exam['centre_address'] ?? '—') ?></td>
                                            </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                            <?php else: ?>
                                <div class="text-center text-slate-500 py-4 border border-slate-200 rounded-lg">No examination details found</div>
                            <?php endif; ?>
                        </div>

                        <hr class="my-6 border-slate-200">

                        <!-- VENDOR DETAILS -->
                        <div>
                            <div class="flex items-center gap-2 mb-4">
                                <div class="w-8 h-8 rounded-lg bg-orange-50 flex items-center justify-center">
                                    <i class="fas fa-microchip text-[#e58500] text-sm"></i>
                                </div>
                                <div>
                                    <h3 class="text-base font-bold text-[#1e4d7b]">Vendor Details</h3>
                                    <p class="text-[11px] text-slate-400">Vendors associated with this application</p>
                                </div>
                            </div>
                            <div class="overflow-x-auto border border-slate-200 rounded-lg">
                                <table class="w-full min-w-[500px] text-sm">
                                    <thead>
                                        <tr class="bg-slate-50 border-b border-slate-200">
                                            <th class="px-4 py-3 text-left text-[11px] font-bold text-slate-600">S. No.</th>
                                            <th class="px-4 py-3 text-left text-[11px] font-bold text-slate-600">Vendor Name</th>
                                            <th class="px-4 py-3 text-left text-[11px] font-bold text-slate-600">Jammer Model</th>
                                        </tr>
                                    </thead>
                                    <tbody class="divide-y divide-slate-100">
                                        <?php if (!empty($vendors)): ?>
                                            <?php $i = 1; foreach ($vendors as $vendor): ?>
                                            <tr class="hover:bg-slate-50 transition">
                                                <td class="px-4 py-3 text-slate-700 font-medium"><?= $i++ ?></td>
                                                <td class="px-4 py-3 text-slate-800 font-semibold"><?= esc($vendor['vendor_name'] ?? 'Vendor ' . $i) ?></td>
                                                <td class="px-4 py-3 text-slate-700"><?= esc($vendor['jammer_model_name'] ?? '—') ?></td>
                                            </tr>
                                            <?php endforeach; ?>
                                        <?php else: ?>
                                            <tr>
                                                <td colspan="3" class="px-4 py-3 text-center text-slate-500">No vendor details found</td>
                                            </tr>
                                        <?php endif; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <hr class="my-6 border-slate-200">

                        <!-- CONTACT DETAILS -->
                        <div>
                            <div class="flex items-center gap-2 mb-4">
                                <div class="w-8 h-8 rounded-lg bg-orange-50 flex items-center justify-center">
                                    <i class="fas fa-user-tie text-[#e58500] text-sm"></i>
                                </div>
                                <div>
                                    <h3 class="text-base font-bold text-[#1e4d7b]">Contact Details</h3>
                                    <p class="text-[11px] text-slate-400">Authorised contact information</p>
                                </div>
                            </div>
                            <div class="grid grid-cols-1 md:grid-cols-3 gap-3">
                                <div class="bg-slate-50/70 border border-slate-200 rounded-lg px-4 py-3">
                                    <label class="block text-[11px] font-medium text-slate-500 mb-2">Contact Person</label>
                                    <div class="flex items-center gap-2">
                                        <div class="w-7 h-7 rounded-full bg-blue-50 flex items-center justify-center">
                                            <i class="fas fa-user text-[#1e4d7b] text-[10px]"></i>
                                        </div>
                                        <p class="text-sm font-semibold text-slate-800"><?= esc($application->contact_person ?? 'Ananya Rao') ?></p>
                                    </div>
                                </div>
                                <div class="bg-slate-50/70 border border-slate-200 rounded-lg px-4 py-3">
                                    <label class="block text-[11px] font-medium text-slate-500 mb-2">Email Address</label>
                                    <div class="flex items-center gap-2 min-w-0">
                                        <div class="w-7 h-7 rounded-full bg-blue-50 flex items-center justify-center shrink-0">
                                            <i class="fas fa-envelope text-[#1e4d7b] text-[10px]"></i>
                                        </div>
                                        <p class="text-sm font-semibold text-slate-800 truncate"><?= esc($application->email ?? 'ananya.rao@globaledu.in') ?></p>
                                    </div>
                                </div>
                                <div class="bg-slate-50/70 border border-slate-200 rounded-lg px-4 py-3">
                                    <label class="block text-[11px] font-medium text-slate-500 mb-2">Phone Number</label>
                                    <div class="flex items-center gap-2">
                                        <div class="w-7 h-7 rounded-full bg-blue-50 flex items-center justify-center">
                                            <i class="fas fa-phone text-[#1e4d7b] text-[10px]"></i>
                                        </div>
                                        <p class="text-sm font-semibold text-slate-800"><?= esc($application->phone ?? '+91 98765 43210') ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- DOCUMENTS TAB -->
                    <div id="tab-content-documents" class="hidden space-y-4">
                        <div class="flex items-center gap-2 mb-4">
                            <div class="w-8 h-8 rounded-lg bg-orange-50 flex items-center justify-center">
                                <i class="fas fa-folder-open text-[#e58500] text-sm"></i>
                            </div>
                            <div>
                                <h3 class="text-base font-bold text-[#1e4d7b]">Application Documents</h3>
                                <p class="text-[11px] text-slate-400">Documents submitted with this application</p>
                            </div>
                        </div>
                        <div class="space-y-3">
                            <?php if (!empty($documents)): ?>
                                <?php foreach ($documents as $doc): ?>
                                <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3 p-4 bg-slate-50/70 border border-slate-200 rounded-lg">
                                    <div class="flex items-center gap-3 min-w-0">
                                        <div class="w-10 h-10 rounded-lg <?= $doc['document_type'] == 1 ? 'bg-emerald-50' : ($doc['document_type'] == 2 ? 'bg-red-50' : 'bg-amber-50') ?> flex items-center justify-center shrink-0">
                                            <i class="fas <?= $doc['document_type'] == 1 ? 'fa-file-excel text-emerald-600' : ($doc['document_type'] == 2 ? 'fa-file-pdf text-red-500' : 'fa-file-signature text-amber-600') ?> text-lg"></i>
                                        </div>
                                        <div class="min-w-0">
                                            <h4 class="text-sm font-semibold text-slate-800 truncate"><?= esc($doc['document_name'] ?? 'Document') ?></h4>
                                            <p class="text-xs text-slate-500 mt-0.5">
                                                <?= $doc['document_type'] == 1 ? 'Excel Schedule Attachment' : ($doc['document_type'] == 2 ? 'Technical Specification' : 'Letter') ?>
                                            </p>
                                        </div>
                                    </div>
                                <?php if (session()->get('user_id')): ?>
                                    <?php
                                        $docName = $doc['document_name'] ?? '';
                                        $extension = strtolower(pathinfo($docName, PATHINFO_EXTENSION));

                                        $isPdf = ($extension === 'pdf');
                                    ?>
                                    <div class="flex gap-2 shrink-0">
                                        <?php if ($isPdf): ?>
                                            <!-- Preview - PDF only -->
                                            <a href="<?= base_url('view-document/' . $doc['id']) ?>"
                                               target="_blank"
                                               class="px-3 py-1.5 bg-green-50 text-green-700 rounded-lg font-medium text-xs hover:bg-green-100 transition flex items-center gap-1">
                                                <i class="fas fa-eye"></i>
                                                Preview
                                            </a>
                                        <?php endif; ?>
                                        <!-- Download - PDF / Excel / Other allowed files -->
                                        <a href="<?= base_url('download-document/' . $doc['id']) ?>"
                                           class="w-8 h-8 bg-blue-50 text-[#1e4d7b] rounded-lg hover:bg-blue-100 transition flex items-center justify-center"
                                           title="Download">
                                            <i class="fas fa-download"></i>
                                        </a>
                                    </div>
                                <?php endif; ?>
                                </div>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <div class="text-center text-slate-500 py-4">No documents uploaded yet</div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>

                <!-- RIGHT COLUMN -->
            <div class="space-y-4 lg:sticky lg:top-6">
                <?php
                $db = db_connect();

                $appId = (int) ($application->id ?? $appId ?? 0);
                $currentStatus = (int) ($application->current_status ?? 0);

                $statusMap = [
                    1  => 'Application Submitted',
                    2  => 'Application PDF Generated',
                    3  => 'Signed PDF Uploaded',
                    4  => 'Dealing Hand',
                    5  => 'Section Officer',
                    6  => 'Under Secretary',
                    7  => 'Joint Secretary',
                    8  => 'Secretary',
                    9  => 'Application Approved',
                    10 => 'Permission Letter Generated',
                    11 => 'Permission Letter Signed',
                    12 => 'Completed',
                    13 => 'Application Returned',
                    14 => 'Application Rejected',
                    15 => 'Saved As Draft',
                ];

                $stageMap = [
                    1  => 'Application Submitted',
                    2  => 'PDF Generation',
                    3  => 'Signed PDF',
                    4  => 'Dealing Hand',
                    5  => 'Section Officer',
                    6  => 'Under Secretary',
                    7  => 'Joint Secretary',
                    8  => 'Secretary',
                    9  => 'Approval',
                    10 => 'Permission Letter',
                    11 => 'Permission Letter Signing',
                    12 => 'Completed',
                    13 => 'Returned',
                    14 => 'Rejected',
                    15 => 'Draft',
                ];

                $nextStageMap = [
                    1  => 'PDF Generation',
                    2  => 'Signed PDF Upload',
                    3  => 'Dealing Hand',
                    4  => 'Section Officer',
                    5  => 'Under Secretary',
                    6  => 'Joint Secretary',
                    7  => 'Secretary',
                    8  => 'Approval',
                    9  => 'Permission Letter Generation',
                    10 => 'Permission Letter Signing',
                    11 => 'Completion',
                    12 => 'Completed',
                    13 => 'Review / Resubmission',
                    14 => 'Closed',
                    15 => 'PDF Generation',
                ];

                $sessionRoleIds = (string) (session()->get('role_ids') ?? '');

                $userRoleIds = array_filter(
                    array_map(
                        'intval',
                        explode(',', $sessionRoleIds)
                    )
                );

                $isOnlyOrganizationUser = (
                    count($userRoleIds) === 1 &&
                    in_array(1, $userRoleIds, true)
                );

                $allowedOrgUserStatuses = [
                    1,
                    2,
                    3,
                    11,
                    13,
                    14
                ];

                $history = $db->table('application_history ah')
                    ->select('
                        ah.id,
                        ah.app_id,
                        ah.status,
                        ah.performed_by,
                        ah.assigned_to,
                        ah.remarks,
                        ah.created_at,

                        performer.name AS performer_name,
                        performer.email AS performer_email,

                        assignee.name AS assignee_name,
                        assignee.email AS assignee_email
                    ')
                    ->join(
                        'user performer',
                        'performer.id = ah.performed_by',
                        'left'
                    )
                    ->join(
                        'user assignee',
                        'assignee.id = ah.assigned_to',
                        'left'
                    )
                    ->where('ah.app_id', $appId)
                    ->orderBy('ah.created_at', 'ASC')
                    ->orderBy('ah.id', 'ASC')
                    ->get()
                    ->getResult();

                if ($isOnlyOrganizationUser) {
                    $history = array_values(
                        array_filter(
                            $history,
                            function ($row) use ($allowedOrgUserStatuses) {
                                $rowStatus = (int) ($row->status ?? 0);
                                return in_array(
                                    $rowStatus,
                                    $allowedOrgUserStatuses,
                                    true
                                );
                            }
                        )
                    );
                }

                $currentAssignedTo = 0;

                $latestAssignment = $db->table('application_history')
                    ->select('assigned_to')
                    ->where('app_id', $appId)
                    ->where('assigned_to >', 0)
                    ->orderBy('created_at', 'DESC')
                    ->orderBy('id', 'DESC')
                    ->get()
                    ->getRow();

                if ($latestAssignment) {
                    $currentAssignedTo = (int) (
                        $latestAssignment->assigned_to ?? 0
                    );
                }

                $currentStatusLabel =
                    $statusMap[$currentStatus]
                    ?? 'Unknown Status';

                $nextStage =
                    $nextStageMap[$currentStatus]
                    ?? '—';

                if (
                    $isOnlyOrganizationUser &&
                    !in_array(
                        $currentStatus,
                        $allowedOrgUserStatuses,
                        true
                    )
                ) {
                    $nextStage = 'Under Process';
                }

                $formatTimelineDate = function ($date) {
                    if (empty($date)) {
                        return '';
                    }
                    $timestamp = strtotime($date);
                    if (!$timestamp) {
                        return '';
                    }
                    return date(
                        'd M Y, H:i',
                        $timestamp
                    );
                };
                ?>

                <div class="timeline-card gov-card">

                    <div class="timeline-header">
                        <div>
                            <h3>
                                Submission progress
                            </h3>
                            <p>
                                Application activity and workflow history
                            </p>
                        </div>
                    </div>

                    <div class="timeline-body">

                        <?php if (!empty($history)): ?>

                            <div class="timeline-list">

                                <?php
                                $historyCount = count($history);
                                ?>

                                <?php foreach ($history as $index => $row): ?>

                                    <?php
                                    $status = (int) (
                                        $row->status ?? 0
                                    );

                                    $performedBy = (int) (
                                        $row->performed_by ?? 0
                                    );

                                    $assignedTo = (int) (
                                        $row->assigned_to ?? 0
                                    );

                                    $remarks = trim(
                                        (string) (
                                            $row->remarks ?? ''
                                        )
                                    );

                                    $date = $formatTimelineDate(
                                        $row->created_at ?? null
                                    );

                                    $performerName = trim(
                                        (string) (
                                            $row->performer_name ?? ''
                                        )
                                    );

                                    if ($performerName === '') {
                                        $performerName = 'System';
                                    }

                                    $assigneeName = trim(
                                        (string) (
                                            $row->assignee_name ?? ''
                                        )
                                    );

                                    $isCurrent = false;

                                    if (
                                        $currentAssignedTo > 0 &&
                                        $assignedTo > 0
                                    ) {
                                        $isCurrent = (
                                            $assignedTo ===
                                            $currentAssignedTo
                                        );
                                    }

                                    if ($currentAssignedTo <= 0) {
                                        $isCurrent = (
                                            $status ===
                                            $currentStatus
                                        );
                                    }

                                    if (
                                        $isOnlyOrganizationUser &&
                                        !in_array(
                                            $currentStatus,
                                            $allowedOrgUserStatuses,
                                            true
                                        )
                                    ) {
                                        $isCurrent = false;
                                    }

                                    if (
                                        $assignedTo > 0 &&
                                        $assigneeName !== ''
                                    ) {
                                        $title =
                                            'Assigned to ' .
                                            $assigneeName;
                                    } else {
                                        $title =
                                            $statusMap[$status]
                                            ?? 'Application Updated';
                                    }

                                    $stage =
                                        $stageMap[$status]
                                        ?? 'Application';

                                    switch ($status) {
                                        case 1:
                                            $icon = 'fa-plus';
                                            break;
                                        case 2:
                                            $icon = 'fa-file-pdf';
                                            break;
                                        case 3:
                                            $icon = 'fa-file-signature';
                                            break;
                                        case 4:
                                        case 5:
                                        case 6:
                                        case 7:
                                        case 8:
                                            $icon = 'fa-user-check';
                                            break;
                                        case 9:
                                            $icon = 'fa-check';
                                            break;
                                        case 10:
                                            $icon = 'fa-file-alt';
                                            break;
                                        case 11:
                                            $icon = 'fa-signature';
                                            break;
                                        case 12:
                                            $icon = 'fa-check-double';
                                            break;
                                        case 13:
                                            $icon = 'fa-undo';
                                            break;
                                        case 14:
                                            $icon = 'fa-times';
                                            break;
                                        case 15:
                                            $icon = 'fa-save';
                                            break;
                                        default:
                                            $icon = 'fa-circle';
                                            break;
                                    }

                                    $itemClass = $isCurrent
                                        ? 'timeline-item-current'
                                        : 'timeline-item-completed';

                                    $isLastItem = (
                                        $index ===
                                        ($historyCount - 1)
                                    );
                                    ?>

                                    <div class="timeline-item <?= esc($itemClass) ?>">

                                        <?php if (!$isLastItem): ?>
                                            <div class="timeline-line"></div>
                                        <?php endif; ?>

                                        <div class="timeline-dot">
                                            <?php if (!$isCurrent): ?>
                                                <i class="fas fa-check"></i>
                                            <?php else: ?>
                                                <i class="fas <?= esc($icon) ?>"></i>
                                            <?php endif; ?>
                                        </div>

                                        <div class="timeline-content">

                                            <div class="timeline-title-row">
                                                <div class="timeline-title">
                                                    <?= esc($title) ?>
                                                </div>
                                                <?php if ($isCurrent): ?>
                                                    <span class="timeline-active-badge">
                                                        Current
                                                    </span>
                                                <?php endif; ?>
                                            </div>

                                            <div class="timeline-meta">
                                                <span>
                                                    <?= esc($performerName) ?>
                                                </span>
                                                <span class="timeline-separator">
                                                    •
                                                </span>
                                                <span>
                                                    <?= esc($stage) ?>
                                                </span>
                                                <?php if ($date !== ''): ?>
                                                    <span class="timeline-separator">
                                                        •
                                                    </span>
                                                    <span>
                                                        <?= esc($date) ?>
                                                    </span>
                                                <?php endif; ?>
                                            </div>

                                             <?php if ($remarks !== ''): ?>
                                                <div class="timeline-remarks">
                                                    <i class="fas fa-comment-alt"></i>
                                                    <span>
                                                        <?= esc($remarks) ?>
                                                    </span>
                                                </div>
                                            <?php endif; ?>

                                            <?php
                                            if (
                                                !$isOnlyOrganizationUser &&
                                                $assignedTo > 0 &&
                                                $assigneeName !== ''
                                            ):
                                            ?>
                                                <div class="timeline-assignment">
                                                    <i class="fas fa-user-check"></i>
                                                    <span>
                                                        Assigned to
                                                        <strong>
                                                            <?= esc($assigneeName) ?>
                                                        </strong>
                                                    </span>
                                                </div>
                                            <?php endif; ?>

                                        </div>

                                    </div>

                                <?php endforeach; ?>
                            </div>
                        <?php else: ?>
                            <div class="timeline-empty">
                                <div class="timeline-empty-icon">
                                    <i class="fas fa-history"></i>
                                </div>
                                <div>
                                    <strong>
                                        No timeline activity
                                    </strong>
                                    <p>
                                        No workflow history is available
                                        for this application.
                                    </p>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                    <div class="timeline-footer">
                        <span>
                            Next stage:
                        </span>
                        <strong>
                            <?= esc($nextStage) ?>
                        </strong>
                    </div>
                </div>


                <!-- GENERATED APPLICATION PDF - Show only when status >= 2 -->
              
            <?php if ($statusId >= 2): ?>
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-5">
                <!-- CARD 1: GENERATED APPLICATION PDF -->
                <div class="gov-card mb-5 p-5">
                    <h3 class="text-base font-bold text-slate-800 mb-4 flex items-center gap-2">
                        <i class="far fa-file-alt text-[#1e4d7b]"></i>
                        Generated Application PDF
                    </h3>

                    <!-- Application Information -->
                    <div class="border border-slate-200 bg-slate-50 rounded-lg p-3 mb-3">
                        <p id="applicationNumber" class="text-xs font-bold text-slate-800">
                            <?= esc($application->app_no ?? 'JPMS/2026/001057') ?>
                        </p>
                        <p id="applicationOrganisation" class="text-xs text-slate-500 mt-1">
                            <?= esc($application->organisation ?? '—') ?>
                        </p>
                        <div class="mt-2">
                            <span id="applicationStatus" class="inline-flex items-center px-2.5 py-1 rounded-md <?= ($statusId >= 3) ? 'bg-green-50 text-green-700' : 'bg-blue-50 text-[#1e4d7b]' ?> text-[10px] font-bold">
                                <?= ($statusId >= 3) ? 'Signed PDF Uploaded' : 'PDF Generated' ?>
                            </span>
                        </div>
                    </div>

                    <!-- Actions -->
                    <?php if ($statusId < 3): ?>
                        <button type="button" onclick="downloadApplicationPreview(<?= (int) $application->id ?>)" class="w-full px-4 py-2.5 bg-[#1e4d7b] hover:bg-[#163a5d] text-white rounded-lg text-sm font-semibold transition flex items-center justify-center gap-2">
                            <i class="fas fa-download"></i>
                            Download PDF
                        </button>

                        <button type="button" onclick="document.getElementById('signedPdfInput').click()" class="w-full mt-2 px-4 py-2.5 bg-green-600 hover:bg-green-700 text-white rounded-lg text-sm font-semibold transition flex items-center justify-center gap-2">
                            <i class="fas fa-pen"></i>
                            Upload Signed PDF
                        </button>

                        <div id="signedPdfPreview" class="<?= ($signed_pdf) ? '' : 'hidden' ?> mt-3">
                            <div class="flex items-center gap-2 p-3 bg-green-50 border border-green-200 rounded-lg">
                                <div class="w-8 h-8 rounded-lg bg-white flex items-center justify-center shrink-0">
                                    <i class="fas fa-file-pdf text-red-500"></i>
                                </div>
                                <div class="flex-1 min-w-0">
                                    <p id="signedPdfFileName" class="text-xs font-semibold text-slate-700 truncate">
                                        <?= $signed_pdf ? esc($signed_pdf->document_name) : '' ?>
                                    </p>
                                    <p id="signedPdfFileSize" class="text-[10px] text-slate-500"></p>
                                </div>
                                <button type="button" onclick="removeSignedPdf(event)" class="w-7 h-7 rounded-lg bg-red-50 text-red-600 hover:bg-red-100 flex items-center justify-center transition">
                                    <i class="fas fa-times text-xs"></i>
                                </button>
                            </div>
                        </div>
                    <?php else: ?>
                        <button type="button" onclick="document.getElementById('signedPdfInput').click()" class="w-full mt-2 px-4 py-2.5 bg-amber-600 hover:bg-amber-700 text-white rounded-lg text-sm font-semibold transition flex items-center justify-center gap-2">
                            <i class="fas fa-upload"></i>
                            Re-Upload Signed PDF
                        </button>
                    <?php endif; ?>

                    <input type="file" id="signedPdfInput" name="signed_pdf" accept=".pdf,application/pdf" class="hidden" onchange="handleSignedPdf(this, <?= (int) $application->id ?>)">
                </div>

                <!-- CARD 2: PERMISSION LETTER -->
                <?php if (in_array((int) $application->current_status, [9, 10, 11, 12])): ?>
                    <div class="gov-card p-5">
                        <h3 class="text-base font-bold text-slate-800 mb-3 flex items-center gap-2">
                            <i class="far fa-file-pdf text-red-600"></i>
                            Permission Letter
                        </h3>
                        <?php if ((int) $application->current_status === 12): ?>
                            <!-- Status 12: Completed -->
                            <div class="flex items-center justify-between px-4 py-3 bg-green-50 border border-green-200 rounded-xl">
                                <div class="flex items-center gap-3">
                                    <div class="w-10 h-10 rounded-lg bg-white flex items-center justify-center shrink-0">
                                        <i class="fas fa-file-pdf text-red-600 text-xl"></i>
                                    </div>
                                    <div>
                                        <p class="text-sm font-bold text-slate-700">
                                            PERMISSION LETTER
                                        </p>
                                        <p class="text-[10px] text-slate-500">
                                            Signed Permission Letter
                                        </p>
                                    </div>
                                </div>
                                <div class="flex items-center gap-2">
                                    <a href="<?= base_url('view-document/' . $doc['id']) ?>"
                                       target="_blank"
                                       title="Preview PDF"
                                       class="w-9 h-9 flex items-center justify-center bg-[#1e4d7b] hover:bg-[#163a5d] text-white rounded-lg shadow-sm transition">
                                        <i class="fas fa-eye text-xs"></i>
                                    </a>
                                    <a href="<?= base_url('download-document/' . $doc['id']) ?>"
                                       title="Download PDF"
                                       class="w-9 h-9 flex items-center justify-center bg-green-600 hover:bg-green-700 text-white rounded-lg shadow-sm transition">
                                        <i class="fas fa-download text-xs"></i>
                                    </a>
                                </div>
                            </div>
                        <?php else: ?>
                            <!-- Status 9, 10, 11 -->
                            <div class="border border-slate-200 bg-slate-50 rounded-lg p-3">
                                <div class="flex items-center justify-between gap-3">
                                    <div class="flex items-center gap-2">
                                        <div class="w-9 h-9 rounded-lg bg-red-50 flex items-center justify-center">
                                            <i class="fas fa-file-pdf text-red-600"></i>
                                        </div>
                                        <div>
                                            <p class="text-xs font-bold text-slate-700">
                                                Permission Letter
                                            </p>
                                            <p class="text-[10px] text-slate-500">
                                                Upload signed PDF
                                            </p>
                                        </div>
                                    </div>
                                    <button type="button"
                                            onclick="document.getElementById('permissionLetterInput').click()"
                                            class="px-3 py-2 bg-green-600 hover:bg-green-700 text-white rounded-lg text-xs font-semibold transition flex items-center gap-2">
                                        <i class="fas fa-file-signature"></i>
                                        <?= ((int) $application->current_status === 9)
                                            ? 'UPLOAD'
                                            : 'RE-UPLOAD' ?>
                                    </button>
                                </div>
                                <input type="file"
                                       id="permissionLetterInput"
                                       name="permission_letter"
                                       accept=".pdf,application/pdf"
                                       class="hidden"
                                       onchange="handlePermissionLetter(this, <?= (int) $application->id ?>)">
                            </div>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>

            </div>
            <?php endif; ?>

            </div>

            <?php
            $roleIds   = session()->get('role_ids');
            $roleNames = '';
            $hasRole1  = false;   // <-- naya flag

            if (! empty($roleIds)) {
                $db  = db_connect();
                $ids = array_filter(array_map('intval', explode(',', (string) $roleIds)));

                if (! empty($ids)) {
                    // check karo role id 1 hai ya nahi
                    $hasRole1 = in_array(1, $ids, true);

                    $rows = $db->table('mas_role')
                        ->select('name')
                        ->whereIn('id', $ids)
                        ->get()
                        ->getResultArray();

                    $roleNames = strtolower(implode(',', array_column($rows, 'name')));
                }
            }

            $currentStatus = (int) $application->current_status;
            ?>

            <?php if (! $hasRole1): ?>   <!-- <-- yahan hide ho jayega -->
                <div class="actions-card lg:col-span-2 space-y-3">
                    <?php if ($currentStatus === 12): ?>
                        <div></div>
                    <?php elseif (in_array($currentStatus, [9, 10, 11])): ?>
                        <!-- Permission Letter Button -->
                        <button type="button"
                                id="permission_downloadBtn"
                                class="btn btn-sm btn-success d-block mx-auto permission-btn"
                                data-app-id="<?= $appId ?? '' ?>"
                                onclick="permission_downloadApplicationPreview(this.dataset.appId)">
                            <i class="fas fa-download"></i>
                            PERMISSION LETTER GENERATED
                        </button> 
                    <?php else: ?>
                        <div class="actions-header">
                            <h3>
                                <i class="fas fa-bolt" style="margin-right: 0.5rem; color: #64748b; font-size: 0.85rem;"></i>
                                Actions
                            </h3>
                            <div class="actions-body">
                                <button type="button"
                                        class="btn btn-sm btn-primary"
                                        data-app-id="<?= (int) $application->id ?>"
                                        data-role-ids="<?= esc($roleIds ?? '', 'attr') ?>"
                                        data-role-names="<?= esc($roleNames, 'attr') ?>"
                                        onclick="openForwardModal(this)">
                                    <i class="fas fa-share"></i>
                                    Forward
                                </button>
                                <button type="button" class="btn btn-outline">
                                    <i class="fas fa-undo-alt"></i>
                                    Return
                                </button>
                                <button type="button" class="btn btn-destructive" onclick="openRejectModal()">
                                    <i class="fas fa-times-circle"></i>
                                    Reject
                                </button>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            <?php endif; ?>
          

        </div>
    </div>
</div>
<!-- =========================================================
     FORWARD MODAL
     ========================================================= -->
<div class="custom-modal" id="forwardModal" aria-hidden="true">
    <div class="custom-modal-overlay" onclick="closeForwardModal()"></div>
    <div class="custom-modal-box">
        <div class="custom-modal-header">
            <h5>
                <i class="fas fa-share"></i>
                <span id="forwardModalTitle">Forward to Officer</span>
            </h5>
            <button type="button"
                    class="custom-modal-close"
                    onclick="closeForwardModal()">
                &times;
            </button>
        </div>
        <div class="custom-modal-body">
            <form id="forwardForm">
                <input
                    type="hidden"
                    id="forwardCsrfToken"
                    name="<?= esc($csrfTokenName) ?>"
                    value="<?= esc($csrfHash) ?>"
                >
                <div class="custom-form-group">
                    <label>Officer Name <span>*</span></label>
                    <select id="officerSelect" required>
                        <option value="">Select Officer</option>

                        <?php if (! empty($officers)): ?>
                            <?php foreach ($officers as $officer): ?>
                                <option
                                    value="<?= esc($officer['user_id'], 'attr') ?>"
                                    data-role-ids="<?= esc($officer['role_ids'] ?? '', 'attr') ?>"
                                    data-role-names="<?= esc($officer['role_names'] ?? '', 'attr') ?>"
                                    data-role-codes="<?= esc($officer['role_codes'] ?? '', 'attr') ?>"
                                    data-designation="<?= esc($officer['designation'] ?? '', 'attr') ?>"
                                    data-email="<?= esc($officer['email'] ?? '', 'attr') ?>"
                                    <?= ! empty($officer['is_default']) ? 'selected' : '' ?>
                                >
                                    <?= esc($officer['officer_name']) ?>
                                    (<?= esc($officer['role_names']) ?>)
                                </option>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <option value="" disabled>No officer available</option>
                        <?php endif; ?>
                    </select>
                </div>
                <div class="custom-form-group">
                    <label>Remarks</label>
                    <textarea id="remarksTextarea"
                              rows="3"
                              placeholder="Enter remarks for forwarding"></textarea>
                </div>
            </form>
        </div>
        <div class="custom-modal-footer">
            <button type="button"
                    class="custom-btn custom-btn-secondary"
                    onclick="closeForwardModal()">
                Cancel
            </button>
            <button type="button"
                    class="custom-btn custom-btn-primary"
                    id="forwardSubmitBtn"
                    onclick="submitForward()">
                <i class="fas fa-check"></i>
                <span id="forwardSubmitBtnText">Forward</span>
            </button>
        </div>
    </div>
</div>

<!-- =========================================================
     REJECT MODAL
========================================================= -->
<div class="custom-modal" id="rejectModal" aria-hidden="true">
    <div class="custom-modal-overlay" onclick="closeRejectModal()"></div>
    <div class="custom-modal-box">
        <div class="custom-modal-header">
            <h5>
                <i class="fas fa-times-circle reject-icon"></i>
                Reject Application
            </h5>
            <button type="button"
                    class="custom-modal-close"
                    onclick="closeRejectModal()">
                &times;
            </button>
        </div>
        <div class="custom-modal-body">
            <form id="rejectForm">
                <!-- Remarks -->
                <div class="custom-form-group">
                    <label>Remarks</label>

                    <textarea id="rejectRemarksTextarea"
                              rows="3"
                              placeholder="Enter detailed reasons for rejection"></textarea>
                </div>
                <!-- Confirmation -->
                <div class="custom-checkbox">
                    <input type="checkbox"
                           id="rejectConfirmCheck">
                    <label for="rejectConfirmCheck">
                        I confirm that this application is being rejected
                        with valid reasons
                    </label>
                </div>
            </form>
        </div>
        <div class="custom-modal-footer">
            <button type="button"
                    class="custom-btn custom-btn-secondary"
                    onclick="closeRejectModal()">
                Cancel
            </button>
            <button type="button"
                    class="custom-btn custom-btn-danger"
                    onclick="rejectRequest()">
                <i class="fas fa-check"></i>
                Reject
            </button>
        </div>
    </div>
</div>


<!-- APPLICATION PDF PREVIEW MODAL -->
<div id="applicationPdfModal" class="fixed inset-0 z-[99999] hidden">
    <!-- BACKDROP -->
    <div class="absolute inset-0 bg-slate-900/75 backdrop-blur-sm" onclick="closeApplicationPdfPreview()"></div>

    <!-- MODAL -->
    <div class="relative z-10 w-[96%] max-w-6xl h-[94vh] mx-auto mt-[3vh] bg-slate-100 rounded-xl shadow-2xl overflow-hidden flex flex-col">

        <!-- DOCUMENT PREVIEW AREA -->
        <div id="applicationPreviewContent" class="flex-1 overflow-y-auto bg-slate-200 p-6">
            <!-- PDF content will be loaded here via JavaScript -->
            <div id="pdfContentLoader" class="flex items-center justify-center h-full">
                <div class="text-center">
                    <i class="fas fa-spinner fa-spin text-4xl text-[#1e4d7b]"></i>
                    <p class="mt-4 text-slate-600">Loading PDF preview...</p>
                </div>
            </div>
        </div>

        <!-- ACTION FOOTER -->
        <div class="flex items-center justify-end gap-2 px-5 py-3 bg-white border-t border-slate-200 shrink-0">
            <button type="button" onclick="closeApplicationPdfPreview()" class="px-4 py-2 bg-white border border-slate-300 hover:bg-slate-100 text-slate-700 rounded-lg text-xs font-semibold flex items-center gap-2 transition">
                <i class="fas fa-times"></i> Close
            </button>
            <button type="button" onclick="printApplicationPreview()" class="px-4 py-2 bg-slate-700 hover:bg-slate-800 text-white rounded-lg text-xs font-semibold flex items-center gap-2 transition">
                <i class="fas fa-print"></i> Print
            </button>
            <button type="button" onclick="downloadApplicationPreview(<?= $application->id ?>)" class="px-4 py-2 bg-[#1e4d7b] hover:bg-[#163a5d] text-white rounded-lg text-xs font-semibold flex items-center gap-2 transition">
                <i class="fas fa-download"></i> Download
            </button>
        </div>
    </div>
</div>

<!-- Modal Structure -->



<script src="<?= base_url('assets/js/tost.js') ?>"></script>
<!-- Hidden data for JavaScript -->
<script>
    var baseUrl = "<?= base_url() ?>";
    var appData = <?= json_encode($appData) ?>;
    var appId = <?= $application->id ?? 0 ?>;
    var csrfTokenName = "<?= $csrfTokenName ?>";
    var csrfHash = "<?= $csrfHash ?>";
</script>

<script>
    const permission_baseUrl = '<?= base_url() ?>/';
</script>

<script>
/* =========================================================
   GENERATE DECLARATION ACKNOWLEDGED PAGE HTML
   ========================================================= */
function generateDeclarationPageHTML(app) {
    const createdDate = app.created_at ? new Date(app.created_at) : new Date();
    const formattedDate = createdDate.toLocaleDateString('en-GB', {
        day: '2-digit',
        month: 'short',
        year: 'numeric'
    });

    let html = `
<style>
    * { box-sizing: border-box; margin: 0; padding: 0; }
    body { 
        font-family: 'Times New Roman', Arial, Helvetica, sans-serif;
        background: #ffffff;
        color: #0f172a;
        padding: 20px;
    }
    @page { 
        size: A4; 
        margin: 10mm;
        @bottom-center {
            content: "Page " counter(page);
            font-size: 9px;
            color: #94a3b8;
        }
    }
    @media print { body { padding: 0; } }
    
    .document {
        width: 100%;
        max-width: 210mm;
        margin: 0 auto;
        background: #ffffff;
    }
    
    .tricolor {
        height: 5px;
        width: 100%;
        background: linear-gradient(to right, #FF9933 0%, #FF9933 33.33%, #ffffff 33.33%, #ffffff 66.66%, #138808 66.66%, #138808 100%);
        -webkit-print-color-adjust: exact;
        print-color-adjust: exact;
    }
    
    .header { padding: 15px 28px 10px; }
    .gov-header { text-align: center; }
    .emblem {
        width: 70px;
        height: 70px;
        object-fit: contain;
        display: block;
        margin: 0 auto 5px;
    }
    .gov-text {
        font-size: 11px;
        letter-spacing: 4px;
        font-weight: 700;
        color: #000000;
        text-transform: uppercase;
    }
    .divider-main { margin-top: 12px; border-top: 2.5px solid #1e4d7b; }
    .divider-sub { margin-top: 3px; border-top: 1px solid #cbd5e1; }
    
    .meta-wrapper { padding: 0 28px; }
    .meta {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 10px;
        font-size: 11px;
        font-weight: 500;
        margin-bottom: 15px;
    }
    .meta-right { text-align: right; }
    .meta strong { font-weight: 700; }
    
    .document-title { padding: 0 28px; }
    .title-box { text-align: center; margin-bottom: 18px; }
    .title {
        display: inline-block;
        font-family: 'Times New Roman', Georgia, serif;
        font-size: 18px;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 1px;
        border-bottom: 2.5px solid #1e293b;
        padding-bottom: 5px;
        color: #1e293b;
    }
    
    .content { padding: 0 28px; }
    
    .declaration-content {
        font-size: 13px;
        line-height: 2.2;
        text-align: justify;
        color: #1e293b;
        padding: 20px 10px;
    }
    
    .declaration-content .salutation {
        font-size: 14px;
        font-weight: 700;
        margin-bottom: 20px;
    }
    
    .declaration-content .body-text {
        margin: 15px 0;
        padding-left: 20px;
    }
    
    .signature-area {
        margin-top: 50px;
        padding: 0 10px;
    }
    
    .signature-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 40px;
        margin-top: 30px;
    }
    
    .place-label {
        font-size: 11px;
        font-weight: 700;
        color: #475569;
        margin-bottom: 8px;
    }
    .place-line {
        margin-top: 35px;
        width: 160px;
        border-top: 1px solid #cbd5e1;
    }
    .signature { text-align: right; }
    .signature-space { height: 45px; }
    .signature-line {
        display: inline-block;
        min-width: 200px;
        border-top: 1.5px solid #94a3b8;
        padding-top: 8px;
    }
    .signatory {
        font-size: 11px;
        font-weight: 700;
        color: #1e293b;
    }
    .designation {
        font-size: 9.5px;
        color: #64748b;
        margin-top: 4px;
    }
    .signature-date {
        font-size: 10px;
        color: #475569;
        margin-top: 8px;
    }
    
    .page-footer {
        text-align: center;
        font-size: 9px;
        color: #94a3b8;
        margin-top: 20px;
        padding-top: 10px;
        border-top: 1px solid #e2e8f0;
    }
    
    .acknowledgement-badge {
        display: inline-block;
        background: #fef3c7;
        border: 2px solid #f59e0b;
        color: #92400e;
        padding: 8px 20px;
        border-radius: 4px;
        font-size: 14px;
        font-weight: 700;
        margin: 10px 0 20px;
        -webkit-print-color-adjust: exact;
        print-color-adjust: exact;
    }
    
    @media print {
        .document { max-width: 100%; }
        .tricolor {
            -webkit-print-color-adjust: exact;
            print-color-adjust: exact;
        }
        .acknowledgement-badge {
            -webkit-print-color-adjust: exact;
            print-color-adjust: exact;
        }
    }
</style>

<div class="document">
    <!-- TRICOLOR LINE -->
    <div class="tricolor"></div>

    <!-- HEADER -->
    <div class="header">
        <div class="gov-header">
            <img 
                src="${baseUrl}assets/image/Emblem_of_India.svg.webp"
                class="emblem"
                alt="Government of India Emblem"
                onerror="this.style.display='none'"
            >
            <div class="gov-text">Government of India</div>
        </div>
        <div class="divider-main"></div>
        <div class="divider-sub"></div>
    </div>

    <!-- META -->
    <div class="meta-wrapper">
        <div class="meta">
            <div>
                <strong>F.No.:</strong> ${escapeHtml(app.app_no || '11/37/2026-JAM')}
            </div>
            <div class="meta-right">
                <strong>Dated:</strong> ${escapeHtml(formattedDate)}
            </div>
        </div>
    </div>

    <!-- TITLE -->
    <div class="document-title">
        <div class="title-box">
            <div class="title">Declaration Acknowledged</div>
        </div>
    </div>

    <!-- CONTENT -->
    <div class="content">
        <div class="declaration-content">
            <div style="text-align:center;margin-bottom:15px;">
                <span class="acknowledgement-badge">
                    <i>⚠️ Centre Details Pending</i>
                </span>
            </div>
            
            <p class="salutation">Dear Sir,</p>
            
            <p class="body-text" style="margin-top:10px;">
                I hereby acknowledge that the Centre details are currently pending and shall be provided separately once they are finalized and available.
            </p>
            
            <p class="body-text" style="margin-top:15px;">
                I further confirm that the pending Centre details will be submitted at the earliest for necessary processing.
            </p>
        </div>

        <!-- SIGNATURE SECTION -->
        <div class="signature-area">
            <div class="signature-grid">
                <div>
                    <div class="place-label">Place:</div>
                    <div class="place-line" style="margin-top:35px;"></div>
                    <div style="margin-top:8px;font-size:10px;color:#64748b;">
                        <span style="font-weight:600;color:#1e293b;">_________________</span>
                    </div>
                    <div style="margin-top:15px;">
                        <div class="place-label" style="font-size:10px;">Date:</div>
                        <div style="margin-top:5px;width:120px;border-bottom:1px solid #cbd5e1;padding-bottom:3px;font-size:10px;color:#1e293b;">
                            ${escapeHtml(formattedDate)}
                        </div>
                    </div>
                </div>
                <div class="signature">
                    <div class="signature-space"></div>
                    <div class="signature-line">
                        <div class="signatory">Authorised Signatory</div>
                        <div class="designation" style="margin-top:3px;">Name: _________________</div>
                        <div class="designation">Designation: _________________</div>
                        <div class="designation">(Seal / Stamp of Organisation)</div>
                    </div>
                </div>
            </div>
            
            <div style="margin-top:20px;text-align:center;font-size:9.5px;color:#94a3b8;border-top:1px solid #e2e8f0;padding-top:12px;">
                <span>This declaration is generated through the online portal. Verifiable with the application number.</span>
            </div>
        </div>
        
        <div class="page-footer">Page 3</div>
    </div>
</div>
    `;

    return html;
}

/* =========================================================
   GENERATE APPLICATION PDF HTML - COMPLETE WITH FULL CSS
   ========================================================= */
function generateApplicationPdfHTML(data) {
    const app = data.application || {};
    const examDetails = data.exam_details || [];
    const vendors = data.vendors || [];
    const centreListReady = app.centre_list_ready || 0;


    
    // Format date
    const createdDate = app.created_at ? new Date(app.created_at) : new Date();
    const formattedDate = createdDate.toLocaleDateString('en-GB', {
        day: '2-digit',
        month: 'short',
        year: 'numeric'
    });

    // Generate exam rows with centre details
    let examRows = '';
    if (examDetails.length > 0) {
        examDetails.forEach((exam, index) => {
            // Check if centre details are available
            const hasCentreDetails = (exam.centre_name && exam.centre_name !== '—' && exam.centre_name !== '') || 
                                    (exam.centre_address && exam.centre_address !== '—' && exam.centre_address !== '');
            
            if (centreListReady == 1 && hasCentreDetails) {
                // Full details with centre information
                examRows += `
                    <tr>
                        <td class="center" style="width:5%;">${index + 1}</td>
                        <td class="left" style="width:18%;font-weight:600;">${escapeHtml(exam.exam_name || '—')}</td>
                        <td class="center" style="width:12%;">${escapeHtml(exam.exam_date || '—')}</td>
                        <td class="left" style="width:30%;">${escapeHtml(exam.centre_address || '—')}</td>
                        <td class="center" style="width:15%;">${escapeHtml(exam.centre_name || '—')}</td>
                        <td class="center" style="width:10%;">${escapeHtml(exam.state_name || '—')}</td>
                        <td class="center" style="width:10%;">${escapeHtml(exam.district_name || '—')}</td>
                    </tr>
                `;
            } else {
                // Minimal details without centre info
                examRows += `
                    <tr>
                        <td class="center" style="width:7%;">${index + 1}</td>
                        <td class="left" style="width:25%;font-weight:600;">${escapeHtml(exam.exam_name || '—')}</td>
                        <td class="center" style="width:18%;">${escapeHtml(exam.exam_date || '—')}</td>
                        <td class="center" style="width:50%;" colspan="4">
                            <span style="color:#b45309;font-weight:600;">
                                <i>Centre details not available at the time of submission</i>
                            </span>
                        </td>
                    </tr>
                `;
            }
        });
    } else {
        examRows = `
            <tr>
                <td colspan="7" class="center" style="color:#94a3b8;padding:15px;">No examination details found</td>
            </tr>
        `;
    }

    // Generate vendor rows
    let vendorRows = '';
    if (vendors.length > 0) {
        vendors.forEach((vendor, index) => {
            vendorRows += `
                <tr>
                    <td class="center" style="width:8%;">${index + 1}</td>
                    <td style="width:42%;font-weight:600;">${escapeHtml(vendor.vendor_name || '—')}</td>
                    <td style="width:50%;">${escapeHtml(vendor.jammer_model_name || '—')}</td>
                </tr>
            `;
        });
    } else {
        vendorRows = `
            <tr>
                <td colspan="3" class="center" style="color:#94a3b8;padding:15px;">No vendor details found</td>
            </tr>
        `;
    }

    // Generate exam header columns based on centre availability
    let examHeaders = '';
    if (centreListReady == 1) {
        examHeaders = `
            <th class="center" style="width:5%;">S.No.</th>
            <th class="left" style="width:18%;">Examination Name</th>
            <th class="center" style="width:12%;">Examination Date</th>
            <th class="left" style="width:30%;">Examination Address</th>
            <th class="center" style="width:15%;">Centre Name</th>
            <th class="center" style="width:10%;">State</th>
            <th class="center" style="width:10%;">City/District</th>
        `;
    } else {
        examHeaders = `
            <th class="center" style="width:7%;">S.No.</th>
            <th class="left" style="width:25%;">Examination Name</th>
            <th class="center" style="width:18%;">Examination Date</th>
            <th class="center" style="width:50%;" colspan="4">Centre Details</th>
        `;
    }

    // Build the complete PDF HTML - Main content
    let html = `
<style>
    * { box-sizing: border-box; margin: 0; padding: 0; }
    body { 
        font-family: 'Times New Roman', Arial, Helvetica, sans-serif;
        background: #ffffff;
        color: #0f172a;
        padding: 20px;
    }
    @page { 
        size: A4; 
        margin: 10mm;
        @bottom-center {
            content: "Page " counter(page);
            font-size: 9px;
            color: #94a3b8;
        }
    }
    @media print { body { padding: 0; } }
    
    .document {
        width: 100%;
        max-width: 210mm;
        margin: 0 auto;
        background: #ffffff;
    }
    
    .tricolor {
        height: 5px;
        width: 100%;
        background: linear-gradient(to right, #FF9933 0%, #FF9933 33.33%, #ffffff 33.33%, #ffffff 66.66%, #138808 66.66%, #138808 100%);
        -webkit-print-color-adjust: exact;
        print-color-adjust: exact;
    }
    
    .header { padding: 15px 28px 10px; }
    .gov-header { text-align: center; }
    .emblem {
        width: 70px;
        height: 70px;
        object-fit: contain;
        display: block;
        margin: 0 auto 5px;
    }
    .gov-text {
        font-size: 11px;
        letter-spacing: 4px;
        font-weight: 700;
        color: #000000;
        text-transform: uppercase;
    }
    .divider-main { margin-top: 12px; border-top: 2.5px solid #1e4d7b; }
    .divider-sub { margin-top: 3px; border-top: 1px solid #cbd5e1; }
    
    .meta-wrapper { padding: 0 28px; }
    .meta {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 10px;
        font-size: 11px;
        font-weight: 500;
        margin-bottom: 15px;
    }
    .meta-right { text-align: right; }
    .meta strong { font-weight: 700; }
    
    .document-title { padding: 0 28px; }
    .title-box { text-align: center; margin-bottom: 18px; }
    .title {
        display: inline-block;
        font-family: 'Times New Roman', Georgia, serif;
        font-size: 18px;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 1px;
        border-bottom: 2.5px solid #1e293b;
        padding-bottom: 5px;
        color: #1e293b;
    }
    
    .content { padding: 0 28px; }
    .intro {
        font-size: 12px;
        line-height: 1.8;
        text-align: justify;
        margin: 0 0 18px;
        color: #1e293b;
    }
    
    .section {
        margin-bottom: 22px;
        page-break-inside: avoid;
    }
    .section-heading {
        display: flex;
        align-items: center;
        gap: 10px;
        border-bottom: 2px solid #1e4d7b;
        padding-bottom: 6px;
        margin-bottom: 12px;
        page-break-after: avoid;
    }
    .section-number {
        width: 26px;
        height: 26px;
        min-width: 26px;
        border-radius: 4px;
        background: #1e4d7b;
        color: #ffffff;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 12px;
        font-weight: 700;
        -webkit-print-color-adjust: exact;
        print-color-adjust: exact;
    }
    .section-title {
        font-size: 13px;
        font-weight: 700;
        color: #1e4d7b;
        text-transform: uppercase;
        margin: 0;
        letter-spacing: 0.5px;
    }
    
    table {
        width: 100%;
        border-collapse: collapse;
        font-size: 10.5px;
        table-layout: fixed;
    }
    thead { display: table-header-group; }
    th {
        background: #1e4d7b;
        color: #ffffff;
        border: 1px solid #163a5d;
        padding: 7px 6px;
        font-weight: 700;
        vertical-align: middle;
        font-size: 10px;
        -webkit-print-color-adjust: exact;
        print-color-adjust: exact;
    }
    td {
        border: 1px solid #cbd5e1;
        padding: 7px 8px;
        vertical-align: top;
        word-wrap: break-word;
        overflow-wrap: anywhere;
        font-size: 10.5px;
    }
    .label-cell {
        width: 30%;
        background: #f8fafc;
        color: #475569;
        font-weight: 700;
        -webkit-print-color-adjust: exact;
        print-color-adjust: exact;
    }
    .value-cell {
        color: #111827;
        font-weight: 600;
    }
    .center { text-align: center; }
    .left { text-align: left; }
    
    .declaration {
        font-size: 11px;
        line-height: 1.8;
        text-align: justify;
        margin: 0;
        color: #1e293b;
    }
    .declaration + .declaration { margin-top: 8px; }
    
    .declaration-signature-area {
        margin-top: 30px;
        padding-top: 10px;
        border-top: 1px dashed #94a3b8;
    }
    
    .signature-area { padding: 0 28px 25px; }
    .signature-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 40px;
        margin-top: 30px;
    }
    .place-label {
        font-size: 11px;
        font-weight: 700;
        color: #475569;
        margin-bottom: 8px;
    }
    .place-line {
        margin-top: 35px;
        width: 160px;
        border-top: 1px solid #cbd5e1;
    }
    .signature { text-align: right; }
    .signature-space { height: 45px; }
    .signature-line {
        display: inline-block;
        min-width: 200px;
        border-top: 1.5px solid #94a3b8;
        padding-top: 8px;
    }
    .signatory {
        font-size: 11px;
        font-weight: 700;
        color: #1e293b;
    }
    .designation {
        font-size: 9.5px;
        color: #64748b;
        margin-top: 4px;
    }
    .signature-date {
        font-size: 10px;
        color: #475569;
        margin-top: 8px;
    }
    
    .page-footer {
        text-align: center;
        font-size: 9px;
        color: #94a3b8;
        margin-top: 20px;
        padding-top: 10px;
        border-top: 1px solid #e2e8f0;
    }
    
    /* Centre not available notice */
    .centre-notice {
        background: #fef3c7;
        border: 1px solid #f59e0b;
        border-left: 4px solid #f59e0b;
        padding: 12px 16px;
        margin: 10px 0;
        border-radius: 4px;
        -webkit-print-color-adjust: exact;
        print-color-adjust: exact;
    }
    .centre-notice strong {
        color: #92400e;
        font-weight: 700;
    }
    .centre-notice .acknowledge {
        display: inline-block;
        margin-top: 6px;
        font-size: 10.5px;
        color: #78350f;
        font-weight: 600;
    }
    
    @media print {
        .document { max-width: 100%; }
        .section { page-break-inside: avoid; }
        .section-heading { page-break-after: avoid; }
        table { page-break-inside: auto; }
        tr { page-break-inside: avoid; page-break-after: auto; }
        .tricolor, th, .section-number {
            -webkit-print-color-adjust: exact;
            print-color-adjust: exact;
        }
        .centre-notice {
            -webkit-print-color-adjust: exact;
            print-color-adjust: exact;
        }
    }
</style>

<div class="document">
    <!-- TRICOLOR LINE -->
    <div class="tricolor"></div>

    <!-- HEADER -->
    <div class="header">
        <div class="gov-header">
            <img 
                src="${baseUrl}assets/image/Emblem_of_India.svg.webp"
                class="emblem"
                alt="Government of India Emblem"
                onerror="this.style.display='none'"
            >
            <div class="gov-text">Government of India</div>
        </div>
        <div class="divider-main"></div>
        <div class="divider-sub"></div>
    </div>

    <!-- META -->
    <div class="meta-wrapper">
        <div class="meta">
            <div>
                <strong>F.No.:</strong> ${escapeHtml(app.app_no || '11/37/2026-JAM')}
            </div>
            <div class="meta-right">
                <strong>Dated:</strong> ${escapeHtml(formattedDate)}
            </div>
        </div>
    </div>

    <!-- TITLE -->
    <div class="document-title">
        <div class="title-box">
            <div class="title">Application for Jammer Deployment Permission</div>
        </div>
    </div>

    <!-- CONTENT - PAGE 1 -->
    <div class="content">
        <!-- INTRO -->
        <p class="intro">
            This application is submitted by the following organisation for seeking permission 
            for deployment of jammers during the examination(s) mentioned below.
        </p>

        <!-- SECTION 1: APPLICANT / ORGANISATION DETAILS -->
        <div class="section">
            <div class="section-heading">
                <div class="section-number">1</div>
                <div class="section-title">Applicant / Organisation Details</div>
            </div>

            <table>
                <tbody>
                    <tr>
                        <td class="label-cell">Application Number</td>
                        <td class="value-cell">${escapeHtml(app.app_no || 'JPMS/2026/001057')}</td>
                    </tr>
                    <tr>
                        <td class="label-cell">Name of Organisation</td>
                        <td class="value-cell">${escapeHtml(app.organisation || '—')}</td>
                    </tr>
                    <tr>
                        <td class="label-cell">Type of Organisation</td>
                        <td class="value-cell">${escapeHtml(app.organisation_type || '—')}</td>
                    </tr>
                    <tr>
                        <td class="label-cell">Contact Person</td>
                        <td class="value-cell">${escapeHtml(app.contact_person || '—')}</td>
                    </tr>
                    <tr>
                        <td class="label-cell">Email</td>
                        <td class="value-cell">${escapeHtml(app.email || '—')}</td>
                    </tr>
                    <tr>
                        <td class="label-cell">Phone</td>
                        <td class="value-cell">${escapeHtml(app.phone || '—')}</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- SECTION 2: EXAMINATION DETAILS -->
        <div class="section">
            <div class="section-heading">
                <div class="section-number">2</div>
                <div class="section-title">Examination Details</div>
            </div>
            <table>
                <thead>
                    <tr>
                        ${examHeaders}
                    </tr>
                </thead>
                <tbody>
                    ${examRows}
                </tbody>
            </table>
        </div>

        <!-- SECTION 3: VENDOR DETAILS -->
        <div class="section">
            <div class="section-heading">
                <div class="section-number">3</div>
                <div class="section-title">Vendor Details</div>
            </div>

            <table>
                <thead>
                    <tr>
                        <th class="center" style="width:8%;">S.No.</th>
                        <th class="left" style="width:42%;">Vendor Name</th>
                        <th class="left" style="width:50%;">Jammer Model</th>
                    </tr>
                </thead>
                <tbody>
                    ${vendorRows}
                </tbody>
            </table>
        </div>
    </div>

    <!-- PAGE 2: DECLARATION WITH SIGNATURE -->
    <div style="page-break-before:always;padding:0 28px;padding-top:20px;">
        
        <!-- SECTION 4: DECLARATION -->
        <div class="section" style="margin-top:10px;">
            <div class="section-heading">
                <div class="section-number">4</div>
                <div class="section-title">Declaration &amp; Undertaking</div>
            </div>

            <p class="declaration">
                <strong>I/We hereby declare and undertake that:</strong>
            </p>
            
            <p class="declaration" style="padding-left:20px;margin-top:6px;">
                1. The information furnished in this application is true, complete and correct to the best of our knowledge and belief.
            </p>
            <p class="declaration" style="padding-left:20px;margin-top:3px;">
                2. The organisation shall comply with all applicable laws, rules, regulations, instructions, guidelines and conditions relating to the deployment, operation and safe custody of jammers during the examination(s).
            </p>
            <p class="declaration" style="padding-left:20px;margin-top:3px;">
                3. The equipment shall be deployed strictly for the approved purpose and only at the approved examination centre(s) mentioned in this application.
            </p>
            <p class="declaration" style="padding-left:20px;margin-top:3px;">
                4. The authorised representative shall ensure that the jammers are operated only during the examination hours and are promptly deactivated after the examination.
            </p>
            <p class="declaration" style="padding-left:20px;margin-top:3px;">
                5. The organisation shall maintain a proper log of deployment and shall make it available for inspection by the competent authority whenever required.
            </p>
            <p class="declaration" style="padding-left:20px;margin-top:3px;">
                6. The organisation shall indemnify and hold harmless the Government of India against any loss, damage, claim or liability arising out of the deployment and use of the jammers.
            </p>

            <p class="declaration" style="margin-top:10px;">
                <strong>We understand that any false statement or suppression of material fact may render this application liable for rejection and may attract penal action under the relevant laws.</strong>
            </p>
        </div>

        <!-- SIGNATURE SECTION -->
        <div class="declaration-signature-area">
            <div class="signature-grid">
                <div>
                    <div class="place-label">Place:</div>
                    <div class="place-line" style="margin-top:35px;"></div>
                    <div style="margin-top:8px;font-size:10px;color:#64748b;">
                        <span id="pdf-place-value" style="font-weight:600;color:#1e293b;">_________________</span>
                    </div>
                    <div style="margin-top:15px;">
                        <div class="place-label" style="font-size:10px;">Date:</div>
                        <div style="margin-top:5px;width:120px;border-bottom:1px solid #cbd5e1;padding-bottom:3px;font-size:10px;color:#1e293b;">
                            ${escapeHtml(formattedDate)}
                        </div>
                    </div>
                </div>
                <div class="signature">
                    <div class="signature-space"></div>
                    <div class="signature-line">
                        <div class="signatory">Authorised Signatory</div>
                        <div class="designation" style="margin-top:3px;">Name: _________________</div>
                        <div class="designation">Designation: _________________</div>
                        <div class="designation">(Seal / Stamp of Organisation)</div>
                    </div>
                </div>
            </div>
            
            <div style="margin-top:20px;text-align:center;font-size:9.5px;color:#94a3b8;border-top:1px solid #e2e8f0;padding-top:12px;">
                <span>This application is generated through the online portal. Verifiable with the application number.</span>
            </div>
        </div>
        
        <div class="page-footer">Page 2</div>
    </div>
</div>
    `;

    // If centre_list_ready == 0, add the Declaration Acknowledged page
    if (centreListReady === 0) {

        html += `
    <!-- PAGE 3: DECLARATION ACKNOWLEDGED -->
    <div style="page-break-before:always;">
        ${generateDeclarationPageHTML(app)}
    </div>
        `;
    }

    return html;
}

/* =========================================================
   PREVIEW APPLICATION PDF
   ========================================================= */
function previewApplicationPdf(appId) {
    const modal = document.getElementById('applicationPdfModal');

    if (!modal) {
        console.error('Application PDF modal not found.');
        return;
    }

    document.getElementById('pdfContentLoader').innerHTML = `
        <div class="text-center py-20">
            <i class="fas fa-spinner fa-spin text-4xl text-[#1e4d7b]"></i>
            <p class="mt-4 text-slate-600">Loading PDF preview...</p>
        </div>
    `;

    modal.classList.remove('hidden');
    document.body.classList.add('overflow-hidden');

    $.ajax({
        url: baseUrl + '/preview-application-pdf/' + appId,
        type: 'GET',
        dataType: 'json',
        success: function(response) {
            const pdfHTML = generateApplicationPdfHTML(response);
            document.getElementById('pdfContentLoader').innerHTML = pdfHTML;
        },
        error: function(xhr) {
            let errorMsg = 'Failed to load PDF preview';
            if (xhr.responseJSON && xhr.responseJSON.error) {
                errorMsg = xhr.responseJSON.error;
            }
            document.getElementById('pdfContentLoader').innerHTML = `
                <div class="text-center text-red-500 py-20">
                    <i class="fas fa-exclamation-circle text-4xl"></i>
                    <p class="mt-4">${escapeHtml(errorMsg)}</p>
                </div>
            `;
        }
    });
}

/* =========================================================
   DOWNLOAD APPLICATION AS PDF
   ========================================================= */
function downloadApplicationPreview(appId) {
    $.ajax({
        url: baseUrl + '/preview-application-pdf/' + appId,
        type: 'GET',
        dataType: 'json',
        success: function(response) {
            const pdfHTML = generateApplicationPdfHTML(response);
            
            const printWindow = window.open('', '_blank', 'width=1000,height=800');
            if (!printWindow) {
                alert('Please allow pop-ups to download the PDF.');
                return;
            }

            printWindow.document.write('<!DOCTYPE html>\n<html>\n<head>\n<meta charset="UTF-8">\n<title>Application PDF</title>\n</head>\n<body>\n' + pdfHTML + '\n</body>\n</html>');
            printWindow.document.close();

            setTimeout(function() {
                printWindow.focus();
                printWindow.print();
                setTimeout(function() { printWindow.close(); }, 1000);
            }, 500);
        },
        error: function(xhr) {
            let errorMsg = 'Failed to load application data';
            if (xhr.responseJSON && xhr.responseJSON.error) {
                errorMsg = xhr.responseJSON.error;
            }
            alert('Error: ' + errorMsg);
        }
    });
}

/* =========================================================
   PRINT APPLICATION PREVIEW
   ========================================================= */
function printApplicationPreview() {
    const content = document.getElementById('pdfContentLoader');
    if (!content) {
        console.error('Application preview content not found.');
        return;
    }

    const docElement = content.querySelector('.document');
    if (!docElement) {
        alert('PDF content not found. Please try again.');
        return;
    }

    const printWindow = window.open('', '_blank', 'width=1000,height=800');
    if (!printWindow) {
        alert('Please allow pop-ups to print the application.');
        return;
    }

    const htmlContent = docElement.outerHTML;
    
    printWindow.document.write('<!DOCTYPE html>\n<html>\n<head>\n<meta charset="UTF-8">\n<title>Application Preview</title>\n</head>\n<body>\n' + htmlContent + '\n</body>\n</html>');
    printWindow.document.close();

    setTimeout(function() {
        printWindow.focus();
        printWindow.print();
        setTimeout(function() { printWindow.close(); }, 500);
    }, 700);
}

/* =========================================================
   ESCAPE HTML
   ========================================================= */
function escapeHtml(value) {
    if (value === null || value === undefined) return '';
    return String(value)
        .replace(/&/g, '&amp;')
        .replace(/</g, '&lt;')
        .replace(/>/g, '&gt;')
        .replace(/"/g, '&quot;')
        .replace(/'/g, '&#039;');
}

/* =========================================================
   CLOSE APPLICATION PREVIEW MODAL
   ========================================================= */
function closeApplicationPdfPreview() {
    const modal = document.getElementById('applicationPdfModal');
    if (modal) {
        modal.classList.add('hidden');
        document.body.classList.remove('overflow-hidden');
    }
}
</script>
<script>
/* =========================================================
   SWITCH TAB
   ========================================================= */
function switchTab(tab) {
    const detailsContent = document.getElementById('tab-content-details');
    const documentsContent = document.getElementById('tab-content-documents');
    const detailsButton = document.getElementById('tab-btn-details');
    const documentsButton = document.getElementById('tab-btn-documents');

    if (tab === 'details') {
        detailsContent.classList.remove('hidden');
        documentsContent.classList.add('hidden');
        detailsButton.classList.remove('font-medium', 'text-slate-500', 'border-transparent');
        detailsButton.classList.add('font-bold', 'text-[#1e4d7b]', 'border-[#1e4d7b]');
        documentsButton.classList.remove('font-bold', 'text-[#1e4d7b]', 'border-[#1e4d7b]');
        documentsButton.classList.add('font-medium', 'text-slate-500', 'border-transparent');
    } else if (tab === 'documents') {
        detailsContent.classList.add('hidden');
        documentsContent.classList.remove('hidden');
        documentsButton.classList.remove('font-medium', 'text-slate-500', 'border-transparent');
        documentsButton.classList.add('font-bold', 'text-[#1e4d7b]', 'border-[#1e4d7b]');
        detailsButton.classList.remove('font-bold', 'text-[#1e4d7b]', 'border-[#1e4d7b]');
        detailsButton.classList.add('font-medium', 'text-slate-500', 'border-transparent');
    }
}

/* =========================================================
   SIGNED PDF HANDLING - WITH CSRF PROTECTION
   ========================================================= */
function handleSignedPdf(input, appId) {
    const file = input.files[0];

    if (!file) {
        return;
    }

    const isPdf = file.type === 'application/pdf' || file.name.toLowerCase().endsWith('.pdf');
    if (!isPdf) {
        alert('Please select a PDF file only.');
        input.value = '';
        return;
    }

    const maxSize = 10 * 1024 * 1024;
    if (file.size > maxSize) {
        alert('PDF size must not exceed 10 MB.');
        input.value = '';
        return;
    }

    const formData = new FormData();
    formData.append('signed_pdf', file);
    formData.append('app_id', appId);
    // Include CSRF token
    formData.append(csrfTokenName, csrfHash);

    const preview = document.getElementById('signedPdfPreview');
    const fileName = document.getElementById('signedPdfFileName');
    const fileSize = document.getElementById('signedPdfFileSize');

    if (fileName) fileName.textContent = 'Uploading...';
    if (fileSize) fileSize.textContent = 'Please wait';
    if (preview) preview.classList.remove('hidden');

    $.ajax({
        url: baseUrl + '/upload-signed-pdf',
        type: 'POST',
        data: formData,
        contentType: false,
        processData: false,
        cache: false,
        headers: {
            'X-CSRF-TOKEN': csrfHash
        },
        success: function(response) {
            if (response.success) {
                if (fileName) fileName.textContent = file.name;
                if (fileSize) fileSize.textContent = formatFileSize(file.size);
                if (preview) preview.classList.remove('hidden');
                location.reload();
            } else {
                alert(response.message || 'Upload failed. Please try again.');
                if (preview) preview.classList.add('hidden');
            }
        },
        error: function(xhr) {
            if (xhr.status === 403) {
                alert('Session expired or CSRF token invalid. Please refresh the page and try again.');
                location.reload();
            } else {
                alert('Upload failed. Please try again.');
            }
            if (preview) preview.classList.add('hidden');
        }
    });
}

/* =========================================================
   PERMISSION LETTER PDF HANDLING - WITH CSRF PROTECTION
   ========================================================= */
function handlePermissionLetter(input, appId) {
    const file = input.files[0];
    if (!file) {
        return;
    }
    const isPdf =
        file.type === 'application/pdf' ||
        file.name.toLowerCase().endsWith('.pdf');
    if (!isPdf) {
        alert('Please select a PDF file only.');
        input.value = '';
        return;
    }
    const maxSize = 10 * 1024 * 1024;
    if (file.size > maxSize) {
        alert('Permission Letter PDF size must not exceed 10 MB.');
        input.value = '';
        return;
    }
    const formData = new FormData();
    formData.append('permission_letter', file);
    formData.append('app_id', appId);
    formData.append(csrfTokenName, csrfHash);
    const preview = document.getElementById('permissionLetterPreview');
    const fileName = document.getElementById('permissionLetterFileName');
    const fileSize = document.getElementById('permissionLetterFileSize');
    if (fileName) {
        fileName.textContent = 'Uploading Permission Letter...';
    }
    if (fileSize) {
        fileSize.textContent = 'Please wait...';
    }
    if (preview) {
        preview.classList.remove('hidden');
    }
    $.ajax({
        url: baseUrl + '/upload-permission-letter',
        type: 'POST',
        data: formData,
        contentType: false,
        processData: false,
        cache: false,
        headers: {
            'X-CSRF-TOKEN': csrfHash
        },
        success: function(response) {
            if (response.csrf_hash) {
                csrfHash = response.csrf_hash;
            }
            if (response.success) {
                if (fileName) {
                    fileName.textContent = file.name;
                }
                if (fileSize) {
                    fileSize.textContent = formatFileSize(file.size);
                }
                if (preview) {
                    preview.classList.remove('hidden');
                }
                alert(
                    response.message ||
                    'Permission Letter uploaded successfully.'
                );
                location.reload();
            } else {
                alert(
                    response.message ||
                    'Permission Letter upload failed. Please try again.'
                );
                if (preview) {
                    preview.classList.add('hidden');
                }
                input.value = '';
            }
        },
        error: function(xhr) {
            if (xhr.status === 403) {
                alert(
                    'Session expired or CSRF token invalid. Please refresh the page and try again.'
                );
                location.reload();
            } else {
                let message =
                    'Permission Letter upload failed. Please try again.';
                if (
                    xhr.responseJSON &&
                    xhr.responseJSON.message
                ) {
                    message = xhr.responseJSON.message;
                }
                alert(message);
            }
            if (preview) {
                preview.classList.add('hidden');
            }
            input.value = '';
        }
    });
}

function formatFileSize(bytes) {
    if (!bytes) return '0 Bytes';
    const units = ['Bytes', 'KB', 'MB', 'GB'];
    const index = Math.floor(Math.log(bytes) / Math.log(1024));
    return parseFloat((bytes / Math.pow(1024, index)).toFixed(2)) + ' ' + units[index];
}

function removeSignedPdf(event) {
    if (event) {
        event.preventDefault();
        event.stopPropagation();
    }

    const input = document.getElementById('signedPdfInput');
    const preview = document.getElementById('signedPdfPreview');
    const fileName = document.getElementById('signedPdfFileName');
    const fileSize = document.getElementById('signedPdfFileSize');

    if (input) input.value = '';
    if (preview) preview.classList.add('hidden');
    if (fileName) fileName.textContent = '';
    if (fileSize) fileSize.textContent = '';
}

document.addEventListener('keydown', function(event) {
    if (event.key === 'Escape') {
        const modal = document.getElementById('applicationPdfModal');
        if (modal && !modal.classList.contains('hidden')) {
            closeApplicationPdfPreview();
        }
    }
});
</script>

<script>
/* =========================================================
   OPEN Forward MODAL
   ========================================================= */

let CURRENT_APP_ID = null;
let CURRENT_USER_ROLE = '';
let CURRENT_ROLE_IDS = '';

/* =========================================================
   ROLE ID -> NAME MAP
   ========================================================= */

const ROLE_ID_MAP = {
    1: 'organization user',
    2: 'dealing hand',
    3: 'section officer',
    4: 'under secretary',
    5: 'joint secretary',
    6: 'secretary',
    7: 'administrator',
    8: 'report view only',
    9: 'system admin'
};

/* =========================================================
   OPEN FORWARD MODAL
   ========================================================= */

function openForwardModal(btnOrAppId, roleIds) {
    if (typeof btnOrAppId === 'object' && btnOrAppId !== null) {
        const btn = btnOrAppId;
        CURRENT_APP_ID = btn.dataset.appId || '';
        CURRENT_ROLE_IDS = btn.dataset.roleIds || '';
        CURRENT_USER_ROLE = resolvePrimaryRole(
            btn.dataset.roleIds || '',
            btn.dataset.roleNames || ''
        );
    } else {
        CURRENT_APP_ID = btnOrAppId || '';
        CURRENT_ROLE_IDS = roleIds || '';
        CURRENT_USER_ROLE = resolvePrimaryRole(roleIds || '');
    }

    const modal = document.getElementById('forwardModal');
    const title = document.getElementById('forwardModalTitle');
    const btnText = document.getElementById('forwardSubmitBtnText');
    const form = document.getElementById('forwardForm');

    if (!modal || !form) {
        showToast('error', 'Forward modal/form not found.');
        return;
    }

    const csrfInput = document.getElementById('forwardCsrfToken');
    let currentCsrfToken = '';

    if (csrfInput) {
        currentCsrfToken = csrfInput.value;
    }

    form.reset();

    if (csrfInput && currentCsrfToken) {
        csrfInput.value = currentCsrfToken;
    }

    const remarksTextarea = document.getElementById('remarksTextarea');

    if (remarksTextarea) {
        remarksTextarea.value = '';
    }

    if (CURRENT_USER_ROLE === 'secretary') {
        if (title) title.textContent = 'Approve Application';
        if (btnText) btnText.textContent = 'Approve';
    } else {
        if (title) title.textContent = 'Forward to Officer';
        if (btnText) btnText.textContent = 'Forward';
    }

    modal.classList.add('show');
    modal.setAttribute('aria-hidden', 'false');
    document.body.style.overflow = 'hidden';
}

/* =========================================================
   RESOLVE PRIMARY ROLE
   ========================================================= */

function resolvePrimaryRole(roleIds, roleNames) {
    if (roleNames) {
        const names = String(roleNames)
            .toLowerCase()
            .split(',')
            .map(function (name) { return name.trim(); })
            .filter(Boolean);

        if (names.includes('secretary')) return 'secretary';
        return names[0] || '';
    }

    if (!roleIds) return '';

    const ids = String(roleIds)
        .split(',')
        .map(function (id) { return parseInt(id.trim(), 10); })
        .filter(Boolean);

    const names = ids
        .map(function (id) { return ROLE_ID_MAP[id] || ''; })
        .filter(Boolean);

    if (names.includes('secretary')) return 'secretary';
    return names[0] || '';
}

/* =========================================================
   CLOSE FORWARD MODAL
   ========================================================= */

function closeForwardModal() {
    const modal = document.getElementById('forwardModal');

    if (!modal) return;

    modal.classList.remove('show');
    modal.setAttribute('aria-hidden', 'true');
    document.body.style.overflow = '';
}

/* =========================================================
   SUBMIT FORWARD / APPROVE
   ========================================================= */

function submitForward() {
    const officerSelect = document.getElementById('officerSelect');
    const remarksTextarea = document.getElementById('remarksTextarea');
    const btn = document.getElementById('forwardSubmitBtn');

    if (!officerSelect) {
        showToast('error', 'Officer dropdown not found.');
        return;
    }

    if (!btn) {
        showToast('error', 'Submit button not found.');
        return;
    }

    const assignedTo = officerSelect.value;
    const remarks = remarksTextarea ? remarksTextarea.value.trim() : '';

    if (!assignedTo) {
        showToast('warning', 'Please select an officer.');
        officerSelect.focus();
        return;
    }

    if (!CURRENT_APP_ID) {
        showToast('error', 'Application ID missing.');
        return;
    }

    const csrfInput = document.getElementById('forwardCsrfToken');

    if (!csrfInput) {
        showToast('error', 'CSRF token field not found. Please refresh the page.');
        console.error('Element #forwardCsrfToken not found.');
        return;
    }

    const csrfTokenName = csrfInput.name;
    const csrfHash = csrfInput.value;

    if (!csrfTokenName) {
        showToast('error', 'CSRF token name missing. Please refresh the page.');
        return;
    }

    if (!csrfHash) {
        showToast('error', 'CSRF token value missing. Please refresh the page.');
        return;
    }

    const payload = {
        app_id: parseInt(CURRENT_APP_ID, 10),
        assigned_to: parseInt(assignedTo, 10),
        remarks: remarks
    };

    const originalHtml = btn.innerHTML;
    btn.disabled = true;
    btn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Processing...';

    fetch('<?= base_url("forward") ?>', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-Requested-With': 'XMLHttpRequest',
            'X-CSRF-TOKEN': csrfHash
        },
        body: JSON.stringify(payload)
    })
    .then(async function (response) {
        let data = null;

        try {
            data = await response.json();
        } catch (error) {
            throw new Error('Invalid server response.');
        }

        if (data && data.csrf_hash) {
            csrfInput.value = data.csrf_hash;
        } else if (data && data.csrfHash) {
            csrfInput.value = data.csrfHash;
        }

        if (response.status === 403) {
            throw new Error(
                data && data.message
                    ? data.message
                    : 'CSRF validation failed. Please refresh the page.'
            );
        }

        if (response.status === 401) {
            throw new Error(
                data && data.message
                    ? data.message
                    : 'Your session has expired. Please login again.'
            );
        }

        if (!response.ok) {
            throw new Error(
                data && data.message
                    ? data.message
                    : 'Server error. Please try again.'
            );
        }

        return data;
    })
    .then(function (data) {
        btn.disabled = false;
        btn.innerHTML = originalHtml;

        if (data && data.csrf_hash) {
            csrfInput.value = data.csrf_hash;
        } else if (data && data.csrfHash) {
            csrfInput.value = data.csrfHash;
        }

        if (data && data.success) {
            closeForwardModal();

            if (typeof showToast === 'function') {
                showToast(
                    'success',
                    CURRENT_USER_ROLE === 'secretary'
                        ? 'Application approved successfully.'
                        : 'Application forwarded successfully.'
                );
            }

            // Reload the page on success (small delay so toast is visible)
            setTimeout(function () {
                window.location.reload();
            }, 1000);

            return;
        }

        showToast(
            'error',
            data && data.message ? data.message : 'Operation failed.'
        );
    })
    .catch(function (error) {
        btn.disabled = false;
        btn.innerHTML = originalHtml;

        console.error('Forward error:', error);
        showToast(
            'error',
            error.message || 'Server error. Please try again.'
        );
    });
}

/* =========================================================
   ESC KEY
   ========================================================= */

document.addEventListener('keydown', function (event) {
    if (event.key === 'Escape') {
        closeForwardModal();
    }
});
</script>

<script>
(function () {
    'use strict';

    const rejectAppId = <?= (int) ($application->id ?? $appId ?? 0) ?>;

    window.openRejectModal = function () {
        const modal = document.getElementById('rejectModal');

        if (!modal) {
            console.error('Reject modal not found.');
            return;
        }

        modal.classList.add('show');
        modal.setAttribute('aria-hidden', 'false');

        document.body.style.overflow = 'hidden';

        const remarks = document.getElementById('rejectRemarksTextarea');
        const confirm = document.getElementById('rejectConfirmCheck');

        if (remarks) {
            remarks.value = '';
        }

        if (confirm) {
            confirm.checked = false;
        }

        console.log('Reject Modal Opened');
        console.log('Application ID:', rejectAppId);
    };

    window.closeRejectModal = function () {
        const modal = document.getElementById('rejectModal');

        if (!modal) {
            return;
        }

        modal.classList.remove('show');
        modal.setAttribute('aria-hidden', 'true');

        document.body.style.overflow = '';
    };

    window.rejectRequest = function () {
        const remarksElement = document.getElementById('rejectRemarksTextarea');
        const confirmElement = document.getElementById('rejectConfirmCheck');

        const remarks = remarksElement ? remarksElement.value.trim() : '';
        const confirmed = confirmElement ? confirmElement.checked : false;

        if (remarks === '') {
            if (typeof window.showToast === 'function') {
                window.showToast('warning', 'Please enter the reason for rejection.');
            } else {
                alert('Please enter the reason for rejection.');
            }

            if (remarksElement) {
                remarksElement.focus();
            }

            return;
        }

        if (!confirmed) {
            if (typeof window.showToast === 'function') {
                window.showToast('warning', 'Please confirm that the application is being rejected with valid reasons.');
            } else {
                alert('Please confirm that the application is being rejected with valid reasons.');
            }

            if (confirmElement) {
                confirmElement.focus();
            }

            return;
        }

        const appId = Number(rejectAppId);

        console.log('Reject Application ID:', appId);

        if (!appId || appId <= 0) {
            if (typeof window.showToast === 'function') {
                window.showToast('warning', 'Application ID is missing.');
            } else {
                alert('Application ID is missing.');
            }

            return;
        }

        const csrfName = '<?= csrf_token() ?>';
        let csrfHash = '<?= csrf_hash() ?>';

        const rejectButton = document.querySelector('#rejectModal .custom-btn-danger');
        const originalButtonHtml = rejectButton ? rejectButton.innerHTML : '';

        if (rejectButton) {
            rejectButton.disabled = true;
            rejectButton.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Rejecting...';
        }

        const formData = new FormData();

        formData.append('app_id', String(appId));
        formData.append('remarks', remarks);
        formData.append(csrfName, csrfHash);

        fetch('<?= base_url('reject') ?>', {
            method: 'POST',
            body: formData,
            headers: {
                'X-Requested-With': 'XMLHttpRequest'
            }
        })
        .then(async function (response) {
            const text = await response.text();

            console.log('Reject HTTP Status:', response.status);
            console.log('Reject Response:', text);

            let data;

            try {
                data = JSON.parse(text);
            } catch (error) {
                console.error('Invalid JSON response:', text);
                throw new Error('Invalid server response.');
            }

            return data;
        })
        .then(function (data) {
            console.log('Reject Parsed Response:', data);

            if (data.csrf_hash) {
                csrfHash = data.csrf_hash;
            }

            if (data.success === true || data.status === true) {
                window.closeRejectModal();

                if (typeof window.showToast === 'function') {
                    window.showToast('success', data.message || 'Application rejected successfully.');
                } else {
                    alert(data.message || 'Application rejected successfully.');
                }

                setTimeout(function () {
                    window.location.reload();
                }, 700);

                return;
            }

            if (typeof window.showToast === 'function') {
                window.showToast('error', data.message || 'Unable to reject the application.');
            } else {
                alert(data.message || 'Unable to reject the application.');
            }

            if (rejectButton) {
                rejectButton.disabled = false;
                rejectButton.innerHTML = originalButtonHtml;
            }
        })
        .catch(function (error) {
            console.error('Reject Error:', error);

            if (typeof window.showToast === 'function') {
                window.showToast('error', error.message || 'Something went wrong while rejecting the application.');
            } else {
                alert(error.message || 'Something went wrong while rejecting the application.');
            }

            if (rejectButton) {
                rejectButton.disabled = false;
                rejectButton.innerHTML = originalButtonHtml;
            }
        });
    };

    document.addEventListener('keydown', function (event) {
        if (event.key !== 'Escape') {
            return;
        }

        if (typeof window.closeForwardModal === 'function') {
            window.closeForwardModal();
        }

        window.closeRejectModal();
    });
})();
</script>
<script>
/* =========================================================
   GENERATE PERMISSION LETTER HTML
   ========================================================= */
function permission_generateApplicationPdfHTML(response) {
    const application = response.application || {};
    const examDetails = response.exam_details || [];
    const vendors = response.vendors || [];

    // ---- Determine single vs multiple exam ----
    const isSingleExam = application.is_single_exam !== undefined ? application.is_single_exam : 1;
    const isSingle = isSingleExam == 1;

    // ---- Extract dynamic values ----
    const orgName = application.organisation || '—';
    const orgType = application.organisation_type || '';
    const contactPerson = application.contact_person || '—';
    const email = application.email || '—';
    const phone = application.phone || '—';
    const appNo = application.app_no || 'JPMS/2026/001057';
    const referenceNo = application.reference_no || '11/37/2026-JAM';
    const createdAt = application.created_at || new Date().toISOString().slice(0, 19).replace('T', ' ');

    // ---- Vendor Names ----
    let vendorNames = 'M/s BEL or M/s ECIL';
    if (vendors && vendors.length > 0) {
        const names = vendors
            .map(v => v.vendor_name || ('Vendor #' + v.vendor_id))
            .filter((v, i, self) => self.indexOf(v) === i);
        if (names.length) vendorNames = names.join(' and ');
    }

    // ---- Build exam location/date text ----
    let examLocationDate = '';
    let periodText = '';

    if (isSingle) {
        if (examDetails.length > 0) {
            const first = examDetails[0];
            const centreAddress = first.centre_address || first.centre_name || '—';
            const examDate = first.exam_date || '—';
            examLocationDate = `in ${centreAddress} on ${examDate}`;
        } else {
            examLocationDate = 'in [Address of examination centre] on [Date(s) of examination]';
        }
    } else {
        const year = new Date(createdAt).getFullYear() || 2026;
        periodText = `during ${year}`;
    }

    const emblemPath = permission_baseUrl + 'assets/image/Emblem_of_India.svg.webp';

    // ---- Select Template ----
    if (isSingle) {
        return permission_generateSingleExamLetter({
            emblemPath, appNo, createdAt, contactPerson, orgName, orgType, email, phone,
            referenceNo, vendorNames, examLocationDate
        });
    } else {
        return permission_generateMultipleExamLetter({
            emblemPath, appNo, createdAt, contactPerson, orgName, orgType, email, phone,
            referenceNo, vendorNames, periodText
        });
    }
}

/* =========================================================
   PERMISSION LETTER - COMMON HELPERS
   ========================================================= */

/* =========================================================
   PERMISSION LETTER - COMMON HELPERS
   ========================================================= */

function permission_escapeHtml(value) {
    if (value === null || value === undefined) {
        return '';
    }

    return String(value)
        .replace(/&/g, '&amp;')
        .replace(/</g, '&lt;')
        .replace(/>/g, '&gt;')
        .replace(/"/g, '&quot;')
        .replace(/'/g, '&#039;');
}


/* =========================================================
   DATE FORMAT
   ========================================================= */

function permission_formatDate(dateValue) {

    const date = dateValue
        ? new Date(dateValue)
        : new Date();

    if (isNaN(date.getTime())) {
        return '';
    }

    return date.toLocaleDateString('en-GB', {
        day: '2-digit',
        month: 'short',
        year: 'numeric'
    });
}

/* =========================================================
   PERMISSION LETTER - COMMON HELPERS
   ========================================================= */
function permission_escapeHtml(value) {
    if (value === null || value === undefined) {
        return '';
    }

    return String(value)
        .replace(/&/g, '&amp;')
        .replace(/</g, '&lt;')
        .replace(/>/g, '&gt;')
        .replace(/"/g, '&quot;')
        .replace(/'/g, '&#039;');
}

function permission_formatDate(dateValue) {
    const date = dateValue ? new Date(dateValue) : new Date();

    if (isNaN(date.getTime())) {
        return '';
    }

    return date.toLocaleDateString('en-GB', {
        day: '2-digit',
        month: 'short',
        year: 'numeric'
    });
}

function permission_commonStyles() {
    return `
    <style>
    * {
        box-sizing: border-box;
    }

    html,
    body {
        margin: 0;
        padding: 0;
        background: #ffffff;
    }

    body {
        font-family: "Times New Roman", Times, serif;
        color: #000000;
        font-size: 16px;
        line-height: 1.55;
    }

    @page {
        size: A4;
        margin: 15mm 18mm 15mm 18mm;
    }

    .permission-document {
        width: 100%;
        max-width: 174mm;
        margin: 0 auto;
        background: #ffffff;
    }

    @media print {
        html,
        body {
            width: 210mm;
            min-height: 297mm;
            margin: 0;
            padding: 0;
            background: #ffffff;
        }

        .permission-document {
            width: 100%;
            max-width: none;
            margin: 0;
            padding: 0;
        }

        .dynamic-fill {
            background: transparent !important;
            padding: 0 !important;
            border-radius: 0 !important;
        }

        .page-break-before {
            page-break-before: always !important;
            break-before: page !important;
        }

        .copy-section,
        .noo-section {
            page-break-inside: avoid;
            break-inside: avoid;
        }

        .copy-title,
        .noo-title {
            page-break-after: avoid;
            break-after: avoid;
        }
    }

    .official-header {
        width: 100%;
        text-align: center;
        margin: 0;
        padding: 0;
    }

    .official-emblem {
        display: block;
        width: auto;
        height: 58px;
        margin: 0 auto 7px auto;
        object-fit: contain;
    }

    .govt-title {
        font-size: 17px;
        font-weight: bold;
        line-height: 1.25;
        margin: 0;
    }

    .cabinet-title {
        font-size: 16px;
        font-weight: bold;
        line-height: 1.3;
        margin-top: 2px;
    }

    .office-title {
        font-size: 16px;
        font-weight: bold;
        line-height: 1.3;
        margin-top: 2px;
    }

    .office-address {
        font-size: 17px;
        line-height: 1.4;
        margin-top: 4px;
        font-weight: normal;
    }

    .reference-row {
        width: 100%;
        margin-top: 18px;
        font-size: 15px;
        line-height: 1.45;
    }

    .reference-row table {
        width: 100%;
        border-collapse: collapse;
    }

    .reference-row td {
        padding: 0;
        vertical-align: top;
    }

    .reference-file {
        width: 55%;
        text-align: left;
    }

    .reference-date {
        width: 45%;
        text-align: right;
    }

    .to-section {
        margin-top: 22px;
        margin-bottom: 20px;
        font-family: "Times New Roman", Times, serif;
        font-size: 16px;
        line-height: 1.5;
    }

    .to-title {
        font-weight: bold;
        margin-bottom: 8px;
    }

    .to-address {
        margin-left: 28px;
        font-weight: normal;
    }

    .to-address div {
        margin: 0;
        padding: 0;
        line-height: 1.5;
    }

    .subject-section {
        margin-top: 14px;
        margin-bottom: 14px;
        font-size: 17px;
        font-weight: bold;
        line-height: 1.5;
        text-align: justify;
    }

    .subject-label {
        font-size: 17px;
        font-weight: bold;
    }

    .salutation {
        margin-top: 12px;
        margin-bottom: 8px;
        font-size: 17px;
        font-weight: normal;
        line-height: 1.5;
    }

    .letter-body {
        margin-top: 4px;
        font-size: 16px;
        line-height: 1.55;
        text-align: justify;
    }

    .letter-body p {
        margin: 0 0 12px 0;
        padding: 0;
        text-align: justify;
    }

    .conditions {
        margin-top: 3px;
        margin-bottom: 12px;
        padding-left: 30px;
        font-size: 16px;
        line-height: 1.55;
    }

    .conditions li {
        padding-left: 6px;
        margin-bottom: 8px;
        text-align: justify;
    }

    .signature-section {
        margin-top: 28px;
        width: 100%;
        font-size: 17px;
        line-height: 1.5;
        text-align: right;
        padding-right: 5px;
    }

    .signature-text {
        margin: 0;
        padding: 0;
        font-size: 17px;
        line-height: 1.5;
    }

    .page-break-before {
        page-break-before: always;
        break-before: page;
    }

    .copy-section {
        margin-top: 5px;
        font-size: 16px;
        line-height: 1.55;
        text-align: justify;
    }

    .copy-title {
        font-weight: bold;
        margin-bottom: 9px;
        font-size: 17px;
    }

    .copy-section p {
        margin: 0 0 12px 0;
        padding: 0;
        text-align: justify;
    }

    .noo-section {
        margin-top: 20px;
        font-size: 16px;
        line-height: 1.5;
    }

    .noo-title {
        font-weight: bold;
        margin-bottom: 9px;
        font-size: 17px;
    }

    .noo-item {
        margin: 0 0 5px 0;
        padding: 0;
    }

    .noo-final {
        margin-top: 14px;
        text-align: left;
    }

    .dynamic-fill {
        background: #f0f7ff;
        padding: 0 2px;
        border-radius: 2px;
    }

    @media print {
        body {
            font-size: 16px;
            line-height: 1.55;
        }

        .official-emblem {
            height: 58px;
        }

        .office-address {
            font-size: 17px;
            line-height: 1.4;
        }

        .subject-section,
        .subject-label {
            font-size: 17px;
            line-height: 1.5;
        }

        .salutation {
            font-size: 17px;
            line-height: 1.5;
        }

        .letter-body {
            font-size: 16px;
            line-height: 1.55;
        }

        .conditions {
            font-size: 16px;
            line-height: 1.55;
        }

        .signature-section,
        .signature-text {
            font-size: 17px;
            line-height: 1.5;
        }

        .copy-section {
            font-size: 16px;
            line-height: 1.55;
        }

        .noo-section {
            font-size: 16px;
            line-height: 1.5;
        }
    }
    </style>
    `;
}

function permission_generateSingleExamLetter(data) {
    const formattedDate = permission_formatDate(data.createdAt);
    const appNo = permission_escapeHtml(data.appNo || '');
    const contactPerson = permission_escapeHtml(data.contactPerson || '');
    const orgName = permission_escapeHtml(data.orgName || '');
    const orgType = permission_escapeHtml(data.orgType || 'Examination Conducting Body');
    const email = permission_escapeHtml(data.email || '');
    const phone = permission_escapeHtml(data.phone || '');
    const vendorNames = permission_escapeHtml(data.vendorNames || '');
    const referenceNo = permission_escapeHtml(data.referenceNo || data.appNo || '');
    const examLocationDate = data.examLocationDate ? data.examLocationDate : '';

    return `
        ${permission_commonStyles()}

        <div class="permission-document">
            <div class="official-header">
                <div class="govt-title">
                    File No. ${appNo}
                </div>
                <div class="govt-title">
                    Govt. of India
                </div>
                <div class="cabinet-title">
                    Cabinet Secretariat
                </div>
                <div class="office-title">
                    Office of the Secretary (Security)
                </div>
                <div class="office-address">
                    Room No. 218, Seva Teerth,<br>
                    Motilal Nehru Marg, New Delhi
                </div>
            </div>

            <div class="reference-row">
                <table>
                    <tr>
                        <td class="reference-file">
                        </td>
                        <td class="reference-date">
                            Dated:
                            ${permission_escapeHtml(formattedDate)}
                        </td>
                    </tr>
                </table>
            </div>

            <div class="to-section">
                <div class="to-title">
                    To
                </div>
                <div class="to-address">
                    <div>
                        ${contactPerson}
                    </div>
                    <div>
                        ${orgName}
                    </div>
                    <div>
                        ${orgType}
                    </div>
                    ${
                        email || phone
                            ? `
                                <div>
                                    ${email}
                                    ${email && phone ? ' | ' : ''}
                                    ${phone}
                                </div>
                              `
                            : ''
                    }
                </div>
            </div>

            <div class="subject-section">
                <span class="subject-label">
                    Subject:
                </span>
                Permission for deployment of low powered
                jammers in examination halls for the examination
                to be conducted by ${orgName}.
            </div>

            <div class="salutation">
                Sir/Madam,
            </div>

            <div class="letter-body">
                <p>
                    I am directed to refer to your
                    <span class="dynamic-fill">
                        Letter Number: ${appNo}
                    </span>,
                    <span class="dynamic-fill">
                        Dated:
                        ${permission_escapeHtml(formattedDate)}
                    </span>,
                    on the subject mentioned above.
                </p>

                <p>
                    2. Approval of the Secretary (Security),
                    Cabinet Secretariat, is hereby conveyed for
                    deployment of low powered jammers, through
                    <span class="dynamic-fill">
                        ${vendorNames}
                    </span>,
                    in the examination to be conducted by
                    <span class="dynamic-fill">
                        ${orgName}
                    </span>
                    ${examLocationDate},
                    as per the details furnished in the letter
                    under reference, subject to the following:
                </p>

                <ol class="conditions" type="i">
                    <li>
                        The jammer models deployed will be as per
                        approved model of
                        <span class="dynamic-fill">
                            ${vendorNames}
                        </span>
                        (details uploaded at
                        www.cabsec.gov.in/circulars/policyofjammer).
                    </li>
                    <li>
                        Adequate arrangements should be made for
                        safe custody of the jammers during its
                        deployment in examination centers. Each
                        jammer deployed at the examination centers,
                        as indicated in Annexures of the letter under
                        reference, will be accounted for and any
                        discrepancy in this regard will be reported
                        immediately to the appropriate law
                        enforcement agency and to the Office of
                        Secretary (Security).
                    </li>
                    <li>
                        While deploying the jammers it will be
                        ensured by
                        <span class="dynamic-fill">
                            ${orgName}
                        </span>
                        that the jammers do not interfere with
                        existing mobile communication network
                        outside examination center.
                    </li>
                </ol>

                <p>
                    3. An effective coordination mechanism with
                    <span class="dynamic-fill">
                        ${vendorNames}
                    </span>
                    may be established well in advance for
                    finalizing various details relating to the
                    deployment of jammers.
                </p>

                <p>
                    4. Performance of all jammers at each
                    examination center may be verified before
                    commencement of examination as effectiveness
                    of the jammers depends on various factors like
                    its power output, signal strength of BTS,
                    traffic load on BTS at a given point of time,
                    distance of jammer from the BTS, sensitivity
                    of receiver, terrain, topography, line of sight
                    etc.
                </p>

                <p>
                    5. It may kindly be ensured that all WiFi and
                    Bluetooth devices within the vicinity of
                    examination halls are switched off during
                    operation of the jammers.
                </p>
            </div>

            <div class="signature-section">
                <p class="signature-text">
                    Yours faithfully,
                </p>
                <br>
                <p class="signature-text">
                    <div class="designation" style="margin-top:3px;">Name: _________________</div>
                </p>
                <p class="signature-text">
                    Under Security (Security)
                </p>
                <p class="signature-text">
                    Tel. No. 23093763
                </p>
            </div>

            <div class="page-break-before">
                <div class="copy-section">
                    <div class="copy-title">
                        Copy to:
                    </div>
                    <p>
                        CMD,
                        <span class="dynamic-fill">
                            ${vendorNames}
                        </span>
                    </p>
                    <p>
                        It is requested that all provisions of jammer
                        policy of GoI may be strictly followed while
                        deploying the jammers. Copy of letter from
                        <span class="dynamic-fill">
                            ${orgName}
                        </span>,
                        referred at Para-1, enclosed. It should be
                        ensured that in areas where 5G roll out is
                        complete, only jammers upgraded to handle
                        upto 5G should be deployed.
                    </p>
                </div>

                <div class="noo-section">
                    <div class="noo-title">
                        N.O.O
                    </div>
                    <div class="noo-item">
                        1. <div class="designation" style="margin-top:3px;">Name: _________________</div> Director, SPG.
                    </div>
                    <div class="noo-item">
                        2. <div class="designation" style="margin-top:3px;">Name: _________________</div> [Special/Additional] Director, IB
                    </div>
                    <div class="noo-item">
                        alongwith a copy of the letter as mentioned
                        in Para-1 above.
                    </div>
                    <div class="noo-final">
                        <div>
                            <div class="designation" style="margin-top:3px;">Name: _________________</div>
                        </div>
                        <div>
                            Under Security (Security)
                        </div>
                        <div>
                            Tel. No. 23093763
                        </div>
                    </div>
                </div>
            </div>
        </div>
    `;
}

function permission_generateMultipleExamLetter(data) {
    const formattedDate = permission_formatDate(data.createdAt);
    const appNo = permission_escapeHtml(data.appNo || '');
    const contactPerson = permission_escapeHtml(data.contactPerson || '');
    const orgName = permission_escapeHtml(data.orgName || '');
    const orgType = permission_escapeHtml(data.orgType || 'Examination Conducting Body');
    const email = permission_escapeHtml(data.email || '');
    const phone = permission_escapeHtml(data.phone || '');
    const vendorNames = permission_escapeHtml(data.vendorNames || '');
    const referenceNo = permission_escapeHtml(data.referenceNo || data.appNo || '');
    const periodText = permission_escapeHtml(data.periodText || 'during [period of time/year]');

    return `
        ${permission_commonStyles()}

        <div class="permission-document">
            <div class="official-header">
                <div class="govt-title">
                    File No. ${appNo}
                </div>
                <div class="govt-title">
                    Govt. of India
                </div>
                <div class="cabinet-title">
                    Cabinet Secretariat
                </div>
                <div class="office-title">
                    Office of the Secretary (Security)
                </div>
                <div class="office-address">
                    Room No. 218, Seva Teerth,<br>
                    Motilal Nehru Marg, New Delhi
                </div>
            </div>

            <div class="reference-row">
                <table>
                    <tr>
                        <td class="reference-file">
                        </td>
                        <td class="reference-date">
                            Dated:
                            ${permission_escapeHtml(formattedDate)}
                        </td>
                    </tr>
                </table>
            </div>

            <div class="to-section">
                <div class="to-title">
                    To
                </div>
                <div class="to-address">
                    <div>
                        ${contactPerson}
                    </div>
                    <div>
                        ${orgName}
                    </div>
                    <div>
                        ${orgType}
                    </div>
                    ${
                        email || phone
                            ? `
                                <div>
                                    ${email}
                                    ${email && phone ? ' | ' : ''}
                                    ${phone}
                                </div>
                              `
                            : ''
                    }
                </div>
            </div>

            <div class="subject-section">
                <span class="subject-label">
                    Subject:
                </span>
                Permission for deployment of low powered
                jammers in the examinations to be conducted by
                ${orgName}, ${periodText}.
            </div>

            <div class="salutation">
                Sir/Madam,
            </div>

            <div class="letter-body">
                <p>
                    I am directed to refer to your
                    <span class="dynamic-fill">
                        Letter Number: ${appNo}
                    </span>,
                    <span class="dynamic-fill">
                        [Dated:
                        ${permission_escapeHtml(formattedDate)}]
                    </span>,
                    on the subject mentioned above.
                </p>

                <p>
                    2. Approval of the Secretary (Security),
                    Cabinet Secretariat, is hereby conveyed for
                    deployment of low powered jammers, through
                    <span class="dynamic-fill">
                        ${vendorNames}
                    </span>,
                    for various examinations/recruitment tests to
                    be conducted by
                    <span class="dynamic-fill">
                        ${orgName}
                    </span>
                    ${periodText},
                    as per the details furnished in the letter under
                    reference, subject to the following:-
                </p>

                <ol class="conditions" type="i">
                    <li>
                        The jammer models deployed will be as per
                        approved model of
                        <span class="dynamic-fill">
                            ${vendorNames}
                        </span>
                        (details uploaded at
                        www.cabsec.gov.in/circulars/policyofjammer).
                    </li>
                    <li>
                        Adequate arrangements should be made for
                        safe custody of the jammers during its
                        deployment in examination centers. Each
                        jammer deployed at the examination centers,
                        as indicated in Annexures of the letter under
                        reference, will be accounted for and any
                        discrepancy in this regard will be reported
                        immediately to the appropriate law
                        enforcement agency and to the Office of
                        Secretary (Security).
                    </li>
                    <li>
                        While deploying the jammers it will be
                        ensured by
                        <span class="dynamic-fill">
                            ${orgName}
                        </span>
                        that the jammers do not interfere with
                        existing mobile communication network
                        outside examination center.
                    </li>
                </ol>

                <p>
                    3. The approval is also subject to the condition
                    that list of examination centers, along with
                    their full address, and the number of jammers
                    to be installed in each center, will be provided
                    to this office by
                    <span class="dynamic-fill">
                        ${orgName}
                    </span>,
                    before the actual date of examination/deployment
                    of jammers.
                </p>

                <p>
                    4. An effective coordination mechanism with
                    <span class="dynamic-fill">
                        ${vendorNames}
                    </span>
                    may be established well in advance for
                    finalizing various details relating to the
                    deployment of jammers.
                </p>

                <p>
                    5. Performance of all jammers at each
                    examination center may be verified before
                    commencement of examination as effectiveness
                    of the jammers depends on various factors like
                    its power output, signal strength of BTS,
                    traffic load on BTS at a given point of time,
                    distance of jammer from the BTS, sensitivity
                    of receiver, terrain, topography, line of sight
                    etc.
                </p>

                <p>
                    6. It may kindly be ensured that all WiFi and
                    Bluetooth devices within the vicinity of
                    examination halls are switched off during
                    operation of the jammers.
                </p>
            </div>

            <div class="signature-section">
                <p class="signature-text">
                    Yours faithfully,
                </p>
                <br>
                <p class="signature-text">
                    <div class="designation" style="margin-top:3px;">Name: _________________</div>
                </p>
                <p class="signature-text">
                    Under Security (Security)
                </p>
                <p class="signature-text">
                    Tel. No. 23093763
                </p>
            </div>

            <div class="page-break-before">
                <div class="copy-section">
                    <div class="copy-title">
                        Copy to:
                    </div>
                    <p>
                        CMD,
                        <span class="dynamic-fill">
                            ${vendorNames}
                        </span>
                    </p>
                    <p>
                        It is requested that all provisions of jammer
                        policy of GoI may be strictly followed while
                        deploying the jammers. Copy of letter from
                        <span class="dynamic-fill">
                            ${orgName}
                        </span>,
                        referred at Para-1, enclosed. It should be
                        ensured that in areas where 5G roll out is
                        complete, only jammers upgraded to handle
                        upto 5G should be deployed. Also, compliance by
                        <span class="dynamic-fill">
                            ${orgName}
                        </span>
                        with the condition at para 3 above may be
                        verified before deployment of jammers.
                    </p>
                </div>

                <div class="noo-section">
                    <div class="noo-title">
                        N.O.O
                    </div>
                    <div class="noo-item">
                        1.<div class="designation" style="margin-top:3px;">Name: _________________</div> Director, SPG.
                    </div>
                    <div class="noo-item">
                        2. <div class="designation" style="margin-top:3px;">Name: _________________</div> [Special/Additional] Director, IB
                    </div>
                    <div class="noo-item">
                        alongwith a copy of the letter as mentioned
                        in Para-1 above.
                    </div>
                    <div class="noo-final">
                        <div>
                            <div class="designation" style="margin-top:3px;">Name: _________________</div>
                        </div>
                        <div>
                            Under Security (Security)
                        </div>
                        <div>
                            Tel. No. 23093763
                        </div>
                    </div>
                </div>
            </div>
        </div>
    `;
}
/* =========================================================
   PREVIEW APPLICATION PDF
   ========================================================= */
function permission_previewApplicationPdf(appId) {
    const modal = document.getElementById('permission_applicationPdfModal');

    if (!modal) {
        console.error('Application PDF modal not found.');
        return;
    }

    if (!appId) {
        console.error('App ID is required.');
        return;
    }

    // Show loading state
    document.getElementById('permission_pdfContentLoader').innerHTML = `
        <div style="text-align:center;padding:5rem 0;">
            <i class="fas fa-spinner fa-spin" style="font-size:2.25rem;color:#1e4d7b;"></i>
            <p style="margin-top:1rem;color:#475569;">Loading PDF preview...</p>
        </div>
    `;

    modal.classList.remove('hidden');
    document.body.classList.add('overflow-hidden');

    // AJAX Request
    $.ajax({
        url: permission_baseUrl + 'preview-application-pdf/' + appId,
        type: 'GET',
        dataType: 'json',
        success: function(response) {
            const pdfHTML = permission_generateApplicationPdfHTML(response);
            document.getElementById('permission_pdfContentLoader').innerHTML = pdfHTML;
        },
        error: function(xhr) {
            let errorMsg = 'Failed to load PDF preview';
            if (xhr.responseJSON && xhr.responseJSON.error) {
                errorMsg = xhr.responseJSON.error;
            }
            document.getElementById('permission_pdfContentLoader').innerHTML = `
                <div style="text-align:center;color:#b91c1c;padding:5rem 0;">
                    <i class="fas fa-exclamation-circle" style="font-size:2.25rem;"></i>
                    <p style="margin-top:1rem;">${permission_escapeHtml(errorMsg)}</p>
                </div>
            `;
        }
    });
}

/* =========================================================
   DOWNLOAD APPLICATION AS PDF (Print Dialog based)
   ========================================================= */
function permission_downloadApplicationPreview(appId) {
    if (!appId) {
        // Try to get from active button
        const btn = document.querySelector('.permission-btn');
        appId = btn ? btn.dataset.appId : null;
    }

    if (!appId) {
        alert('Application ID not found.');
        return;
    }

    // Change button state
    const btn = document.getElementById('permission_downloadBtn');
    const originalHTML = btn ? btn.innerHTML : '';
    if (btn) {
        btn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Generating...';
        btn.disabled = true;
    }

    $.ajax({
        url: baseUrl + 'preview-application-pdf/' + appId,
        type: 'GET',
        dataType: 'json',
        success: function(response) {
            const pdfHTML = permission_generateApplicationPdfHTML(response);
            
            const printWindow = window.open('', '_blank', 'width=1000,height=800');
            if (!printWindow) {
                alert('Please allow pop-ups to download the PDF.');
                if (btn) { btn.innerHTML = originalHTML; btn.disabled = false; }
                return;
            }

            printWindow.document.write('<!DOCTYPE html>\n<html>\n<head>\n<meta charset="UTF-8">\n<title>Permission Letter</title>\n</head>\n<body>\n' + pdfHTML + '\n</body>\n</html>');
            printWindow.document.close();

            setTimeout(function() {
                printWindow.focus();
                printWindow.print();
                setTimeout(function() { printWindow.close(); }, 1000);
                
                if (btn) { btn.innerHTML = originalHTML; btn.disabled = false; }
            }, 500);
        },
        error: function(xhr) {
            let errorMsg = 'Failed to load application data';
            if (xhr.responseJSON && xhr.responseJSON.error) {
                errorMsg = xhr.responseJSON.error;
            }
            alert('Error: ' + errorMsg);
            if (btn) { btn.innerHTML = originalHTML; btn.disabled = false; }
        }
    });
}

/* =========================================================
   PRINT APPLICATION PREVIEW
   ========================================================= */
function permission_printApplicationPreview() {
    const content = document.getElementById('permission_pdfContentLoader');
    if (!content) {
        console.error('Application preview content not found.');
        return;
    }

    const docElement = content.querySelector('.document');
    if (!docElement) {
        alert('PDF content not found. Please try again.');
        return;
    }

    const printWindow = window.open('', '_blank', 'width=1000,height=800');
    if (!printWindow) {
        alert('Please allow pop-ups to print the application.');
        return;
    }

    const htmlContent = docElement.outerHTML;
    
    printWindow.document.write('<!DOCTYPE html>\n<html>\n<head>\n<meta charset="UTF-8">\n<title>Permission Letter</title>\n</head>\n<body>\n' + htmlContent + '\n</body>\n</html>');
    printWindow.document.close();

    setTimeout(function() {
        printWindow.focus();
        printWindow.print();
        setTimeout(function() { printWindow.close(); }, 500);
    }, 700);
}

/* =========================================================
   ESCAPE HTML
   ========================================================= */
function permission_escapeHtml(value) {
    if (value === null || value === undefined) return '';
    return String(value)
        .replace(/&/g, '&amp;')
        .replace(/</g, '&lt;')
        .replace(/>/g, '&gt;')
        .replace(/"/g, '&quot;')
        .replace(/'/g, '&#039;');
}

/* =========================================================
   CLOSE APPLICATION PREVIEW MODAL
   ========================================================= */
function permission_closeApplicationPdfPreview() {
    const modal = document.getElementById('permission_applicationPdfModal');
    if (modal) {
        modal.classList.add('hidden');
        document.body.classList.remove('overflow-hidden');
    }
}

/* =========================================================
   EVENT LISTENERS
   ========================================================= */
document.addEventListener('DOMContentLoaded', function() {
    const modal = document.getElementById('permission_applicationPdfModal');
    
    // Close modal on outside click
    if (modal) {
        modal.addEventListener('click', function(e) {
            if (e.target === modal) {
                permission_closeApplicationPdfPreview();
            }
        });
    }

    // Close with Escape key
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape' && modal && !modal.classList.contains('hidden')) {
            permission_closeApplicationPdfPreview();
        }
    });
});
</script>
<?php
$page_content = ob_get_clean();
include dirname(__DIR__) . '/dashboard.php';
?>
</body>
</html>