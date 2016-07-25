<?php include ROOT.'/views/layouts/header.php';?>
<div class="content">
<div class="container">
    <div class="row">
	<div class="col-sm-8 col-sm-offset-2">
	<?php if($result):?>
		<h4>Ваше сообщение отправлено</h4>
	<?else:?>
            <h4>Отправить сообщение</h4>
                
                <?php if(is_array($errors)):?>
                    <ul>
                        <?php foreach($errors as $error):?>
                                <li>- <?=$error?></li>
                        <?php endforeach;?>
                    </ul>
                <?php endif;?>
                    <form  action="#" method="post" class="form_check feedback_form">
                    <div class="form-group">
                           <label for="name">*Имя:</label>
                           <input type="text" class="form-control check_field namefield" name="name" id="name" placeholder="Введите имя" value="<?=$name?>" required autofocus>
                           <div class="error_box"></div>
                    </div>
                     <div class="form-group">
                           <label for="email">*Адрес email:</label>
                           <input type="email" class="form-control check_field emailfield" name="email" id="email" placeholder="Введите email" value="<?=$email?>" required>
                           <div class="error_box"></div>
                     </div>
                    <div class="form-group">
                           <label for="message">*Сообщение:</label>
                           <textarea class="form-control check_field messagefield" name="message" id="message" placeholder="Введите сообщение"  required><?=$message?></textarea>
                           <div class="error_box"></div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                           <div class="col-xs-4"><button type="submit" name="captcha" class="btn btn-default btn-sm">Выбрать другой код</button></div>
                           <div class="col-xs-4"><label for="captcha">*Введите код:</label></div>
                        </div>
                        <div class="row">
                           <div class="col-xs-4"><img src="/components/Captcha.php"></div>
                           <div class="col-xs-4"><input type="text" class="form-control" name="captcha" id="captcha" ></div>
                        </div>
                     </div>
                    <div class="info">* Поля обязательные для заполнения.</div>
                   <button type="submit" class="btn btn-info btnsubmit" name="submit">Отправить сообщение</button>
                </form>
 
	<?php endif;?>
        </div>
    </div>
</div>
</div>
<?php include ROOT.'/views/layouts/footer.php';?>

