<?php include ROOT.'/views/layouts/header.php';?>

<div class="container">
    <div class="row">
        <div class="col-sm-10 col-sm-offset-1">
            <div class="error"></div>
            <?php if($result): ?>
                <h2>Вы зарегистрированы</h2>
            <?php else: ?>
            <h2>Регистрация на сайте</h2>
            <div class="signup_form">
            <?php if(is_array($errors)):?>
                <ul>
                    <?php foreach($errors as $error):?>
                        <li>- <?=$error?></li>
                    <?php endforeach;?>
                </ul>
            <?php endif;?>
                
            <form  action="#" method="post" class="form_check form_style" id="signup">
                <div class="form-group">
                    <label for="name">*Имя:</label>
                    <input type="text" class="form-control check_field namefield" name="name" id="name" placeholder="Введите имя" value="<?=$name?>" autofocus>
                    <div class="error_box"></div>
                </div>
                <div class="form-group">
                        <label for="surname">*Фамилия:</label>
                        <input type="text" class="form-control check_field surnamefield" name="surname" id="surname" placeholder="Введите фамилию" value="<?=$surname?>">
                        <div class="error_box"></div>
                </div>
                 <div class="form-group">
                        <label for="email">*Адрес email:</label>
                        <input type="email" class="form-control check_field emailfield" name="email" id="email" placeholder="Введите email" value="<?=$email?>">
                        <div class="error_box"></div>
                 </div>
                <div class="form-group">
                        <label for="date">Укажите дату рождения:</label>
                        <input type="date" class="form-control" name="date" id="date" placeholder="ГГГГ-ММ-ДД" >
                        <div class="error_box"></div>
                  </div>
                  <div class="form-group">
                        <label for="pol">Укажите Ваш пол:</label>
                        <input type="radio" class="form-control pol" name="pol" value="мужской" id="pol" <?php if($pol=='мужской') echo 'checked="checked"';?> >Мужской
                        <input type="radio" class="form-control pol" name="pol" value="женский" <?php if($pol=='женский') echo 'checked="checked"';?>>Женский
                  </div>
                 <div class="info">* Поля обязательные для заполнения.</div>
                <button type="submit" class="btn btn-info btnsubmit" name="submit" id="submit">Регистрация</button>
            </form>
                
            </div>
            <?php endif;?>
        </div>
    </div>
</div>

<?php include ROOT.'/views/layouts/footer.php';?>

