$(function(){
    jQuery.fn.exists = function() {
       return $(this).length;
    }
    
    $('#name').keypress(function(event) {
        if(event.keyCode==13){ 
        $('#surname').focus();
        event.preventDefault();
        }
   });
   $('#surname').keypress(function(event) {
        if(event.keyCode==13){ 
        $('#email').focus();
        event.preventDefault();
        }
   });
   
   
   if($('.form_check').exists()){
        var form = $(this), btn = form.find('.btnsubmit');
        form.find('.check_field').addClass('empty_field');
        btn.hide();
        
        checkInput();
        btnShow();
        
        function checkInput(){
            form.find('.check_field').each(function(){
                 if($(this).hasClass('namefield')){
                    var namefield = $(this);
                    var pattern = /^[a-zа-яё]{2,30}$/i; 
                    if(pattern.test(namefield.val())){
                        namefield.removeClass('empty_field');
                        namefield.next('.error_box').text('');
                    }else{
                        namefield.addClass('empty_field');
                        namefield.next('.error_box').text('Имя может содержать только русские и английские буквы, длинной не менее 2-х и не более 30-ти символов!');
                    }
                }else if($(this).hasClass('surnamefield')){
                    var surnamefield = $(this);
                    var pattern = /^[a-zа-яё]{2,30}$/i; 
                    if(pattern.test(surnamefield.val())){
                        surnamefield.removeClass('empty_field');
                        surnamefield.next('.error_box').text('');
                    }else{
                        surnamefield.addClass('empty_field');
                        surnamefield.next('.error_box').text('Фамилия может содержать только русские и английские буквы, длинной не менее 2-х и не более 30-ти символов!');
                    }
                 }else if($(this).hasClass('emailfield')){
                    var emailfield = $(this);
                    var pattern = /^[a-z0-9_\.-]+@[a-z0-9\._-]+\.([a-z]{2,4}\.)?[a-z]{2,4}$/i; 
                    if(pattern.test(emailfield.val())){
                        emailfield.removeClass('empty_field');
                        emailfield.next('.error_box').text('');
                    }else{
                        emailfield.addClass('empty_field');
                        emailfield.next('.error_box').text('Введите email!');
                    }
                }else if($(this).hasClass('messagefield')){
                    var msgfield = $(this);
                    if(msgfield.val().length > 2 && msgfield.val().length < 2000){
                         msgfield.removeClass('empty_field');
                         msgfield.next('.error_box').text('');
                    }else{
                        msgfield.addClass('empty_field');
                        msgfield.next('.error_box').text('Напишите сообщение длинной от 3-х до 2000 символов!');
                    }
                }
            });
        }
         function btnShow(){
            var sizeEmpty = form.find('.empty_field').length;
            if(sizeEmpty==0){
              btn.show();  
            } 
         }
        
        $('.check_field').change(function(){
            checkInput();
            btnShow();
        });
   }
 });

