<?php
ob_start();
?>
<!-- Audit Log Page Content -->
<div class="gov-card p-6">
    <div class="flex items-center gap-3 mb-6">
        <i class="fas fa-shield-halved text-[#e58500] text-2xl"></i>
        <h2 class="text-xl font-bold text-[#1e4d7b]">Audit Trail</h2>
    </div>
    
    <div class="text-center py-12">
        <i class="fas fa-history text-slate-300 text-6xl mb-4"></i>
        <p class="text-slate-500">Audit trail entries will appear here</p>
    </div>
</div>
<?php
$page_content = ob_get_clean();
include dirname(__DIR__) . '/dashboard.php';
?>