<?php 
require  $_SERVER['DOCUMENT_ROOT'] . '/app/views/inc/header.php'; 
?>
    <div class="row">
        <div class="col-md-12 text-center">
            <h2>Categories Tree</h2>
        </div>
        <div class="col-md-8">
            <?php echo $data ?>
        </div>
    </div>
    <?php require $_SERVER['DOCUMENT_ROOT']  . '/app/views/inc/footer.php'; ?>
