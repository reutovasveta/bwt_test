<?php include ROOT.'/views/layouts/header.php';?>

<div class="container">
    <?php if($error):?>
        <h4><?=$error;?></h4>
    <?php else:?>
        <?php foreach($messages as $message):?> 
            <div class="row message">
                <div class="col-sm-2 col-sm-offset-1">
                   <p><?=$message['date']?></p>
                </div>
                <div class="col-sm-1">
                    <p><?=$message['name']?></p>
                </div>
                <div class="col-sm-7">
                    <p><?=$message['message']?></p> 
                </div>
            </div>
        <?php endforeach;?>
    <?php endif;?>
</div>

<?php include ROOT.'/views/layouts/footer.php';?>
