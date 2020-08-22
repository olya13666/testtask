/**
 * Регистрация
 */
$(document).ready(function() {		
	$('.js-try-registration').on('click', function(){
        form = $(this).parent('form');
        data = form.serializeArray();
        action = '/registration/addUser';
        $.ajax({
            type: 'POST',
            url: action,
            dataType: 'json',
            data: data,
            success: function(r) 
            {
                if (r.status == 'error') {
                    alert(r.message);
                    $.each(r.fields, function(i, e) {
                        $('#field_'+e).addClass('is-error');
                    });
                }
                if (r.status == 'ok') {
                    alert(r.message);
                    location.href = '/';
                }
            }
        })
        return false;
    })
})

/**
 * Авторизация
 */
$(document).ready(function() {		
	$('.js-try-login').on('click', function(){
        form = $(this).parent('form');
        data = form.serializeArray();
        action = '/main/tryLogin';
        $.ajax({
            type: 'POST',
            url: action,
            dataType: 'json',
            data: data,
            success: function(r) 
            {
                if (r.status == 'error') {
                    alert(r.message);
                    $.each(r.fields, function(i, e) {
                        $('#field_'+e).addClass('is-error');
                    });
                }
                if (r.status == 'ok') {
                    location.href = '/';
                }
            }
        })
        return false;
    })
})

/**
 * Редактирование профиля
 */
$(document).ready(function() {
	$('.js-edit-profile').on('click', function(){
        $this = $(this);
        form = $(this).parent('form');
        data = form.serializeArray();
        console.log(data)
        action = '/profile/edit';
        $.ajax({
            type: 'POST',
            url: action,
            dataType: 'json',
            data: data,
            success: function(r) 
            {
                console.log(r)
                if (r.status == 'error') {
                    alert(r.message);
                    $.each(r.fields, function(i, e) {
                        $('#field_'+e).addClass('is-error');
                    });
                }
                if (r.status == 'errorAuth') {
                    location.href = '/';
                }
                if (r.status == 'ok') {
                    alert('Данные сохранены!');
                }
            }
        })
        return false;
    })
})