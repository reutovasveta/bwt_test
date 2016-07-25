<?php include ROOT.'/views/layouts/header.php';?>
<div class="content">
<div class="container">
    <?php if($error):?>
        <h4><?=$error;?></h4>
    <?php else:?>
        <div class="container">
            <?=$weather;?>
        </div>
    <?php endif;?>
</div>
<?php include ROOT.'/views/layouts/footer.php';?>
