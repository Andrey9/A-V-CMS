/**
 * Created by andrey on 11.06.17.
 */
function initMap() {
    var coordinates = {lat: 49.433398, lng: 27.004652};
    var map = new google.maps.Map(document.getElementById('gmap'), {
        zoom: 14,
        center: coordinates
    });
    var marker = new google.maps.Marker({
        position: coordinates,
        map: map
    });
}
$('#show_map').on('click', function(e){
    e.preventDefault();
    var map = $('#gmap');

    if(map.is(':hidden')){
        map.slideDown('slow');
        $(this).html(hide_map);
    }else{
        map.slideUp('slow');
        $(this).html(look_on_map);
    }
    setTimeout(function(){
        initMap();
        $.scrollTo(840);
    }, 400);

})

$('#contact_name').on('focus',function(){
    resetField($(this));
});

$('#contact_name').on('focusout', function(){
    validateField($(this));
});

$('#contact_email').on('focus',function(){
    resetField($(this));
});

$('#contact_email').on('focusout', function(){
    validateField($(this));
});

$('#contact_message').on('focus',function(){
    resetField($(this));
});

$('#contact_message').on('focusout', function(){
    validateField($(this));
});

$('#contact-submit').on('click', function(e){
    e.preventDefault();
    var form = $('#contact-form');
    var name = $('#contact_name');
    var email = $('#contact_email');
    var message = $('#contact_message');
    var error = validateForm(name, email, message);
    var token = form.find('input[name=_token]').val();
    var button = $(this);
    if(error == true){
        return false;
    }else{
        name.attr('disabled', true);
        email.attr('disabled', true);
        message.attr('disabled', true);
        button.attr('disabled', true);
        $.ajax({
            url: form.attr('action'),
            type: "POST",
            data: {
                _token: token,
                fio: name.val(),
                email: email.val(),
                message: message.val()
            }
        }).done(function(response){
            console.log(response);

            var type = 'alert alert-' + response.status + ' fade-in';
            $('#alert').find('.content').html(response.message);
            $('#alert').addClass(type).show();
            name.attr('disabled',false).val('');
            email.attr('disabled', false).val('');
            message.attr('disabled', false).val('');
            button.attr('disabled', false);
            setInterval(function(){
                $('#alert').hide();
                $('#alert').removeAttr('class');
            }, 10000);
        })
    }
})

function validateForm(name, email, message){
    var error = false;
    if(name.val() == ''){
        name.css({'border-color': 'red'});
        error = true;
    }
    if(email.val() == ''){
        email.css({'border-color': 'red'});
        error = true;
    }
    if(message.val() == ''){
        message.css({'border-color': 'red'});
        error = true;
    }

    return error;
}

function resetField(field) {
    field.css({'border-color': '#ffffff'})
}

function validateField(field){
    if(field.val() == ''){
        field.css({'border-color': 'red'})
    }
}