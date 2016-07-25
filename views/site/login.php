<?php include ROOT.'/views/layouts/header.php';?>

<div class="container">
	<div class="row">
	<div class="col-sm-6 col-sm-offset-3">
                <?php if($user):?>
                <h3>Здравствуйте, <?=$user['name']?>!</h3>
                <h5>Вы получили разрешение на просмотр информации, <br><br> доступной только зарегистрированным пользователям!</h5>
                <?php else:?>
                
		<h2>Вход на сайт</h2>
			<div class="login_form">
			<?php if(is_array($errors)):?>
				<ul>
					<?php foreach($errors as $error):?>
						<li>- <?=$error?></li>
					<?php endforeach;?>
				</ul>
			<?php endif;?>
				<form  action="#" method="post">
                                        <div class="form-group">
						<label for="name">Имя:</label>
						<input type="name" class="form-control" name="name" id="name" placeholder="Введите имя" value="<?=$name?>">
					  </div>
					 <div class="form-group">
						<label for="email">Адрес email:</label>
						<input type="email" class="form-control" name="email" id="email" placeholder="Введите email" value="<?=$email?>">
					 </div>
					  
					 <!-- <div class="checkbox">
						<label>
						  <input type="checkbox"> Запомнить
						</label>
					  </div>-->
					<button type="submit" class="btn btn-info" name="submit">Вход</button>
				</form>
			</div>
                <?php endif;?>
	</div>
</div>
</div>
<?php include ROOT.'/views/layouts/footer.php';?> 

