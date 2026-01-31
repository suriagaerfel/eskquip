<?php if (str_contains($currentURL,'/workspace/')) { ?>
<div class="loading-section loading-section-for-workspace">
    <p class="incomplete-loading incomplete-loading-page">Loading is unsuccessful! Refresh this page. </p>
    <p class="offline-note offline-note-page-for-workspace">Please check your internet connection.</p>        
</div>
<?php } ?>



<?php if (!str_contains($currentURL,'/workspace/')) { ?>
<div class="loading-section loading-section-for-non-workspace">
    <p class="incomplete-loading incomplete-loading-page">Loading is unsuccessful! Refresh this page. </p>
    <p class="offline-note offline-note-page-for-non-workspace">Please check your internet connection.</p>
</div>
<?php } ?>