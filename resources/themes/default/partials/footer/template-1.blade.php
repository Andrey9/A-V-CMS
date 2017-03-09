@if(route_is('home'))
    @if($dashboard->feedback)
        <div id="contacts" class="contacts">
            <div class="container">
                <div class="heading yellow">
                    <h1>@lang('front_labels.contacts')</h1>
                </div>
                {!! Form::open(['role' => 'form', 'route' => 'feedback.store', 'class' => 'contacts_form']) !!}
                <div class="small_fields">
                    {!! Form::text('fio',null,['id' => 'fio','placeholder' => 'Name','required' => true]) !!}
                    {!! Form::text('email',null,['id' => 'email','placeholder' => 'EMail','required' => true]) !!}
                </div>
                <div class="message">
                    {!! Form::textarea('message', null,['placeholder' => 'Your message','required' => true])!!}
                </div>
                {!! Form::submit(trans('labels.send'), ['class' => 'show_more']) !!}
                {!! Form::close() !!}
                <div class="contact_info">
                    <p>@lang('front_texts.contacts_p')</p>
                </div>
            </div>
        </div>
        <script>
            $('.contacts_form').on ('submit', function(event){
                event.preventDefault();
                if (isEmail($(this).find('input[name=email]').val())){
                    var formData = $(this).serialize();
                    var formMethod = $(this).attr('method');
                    var formUrl = $(this).attr('action');
                    var fio = $(this).find('input[name=fio]');
                    var email = $(this).find('input[name=email]');
                    var mess = $(this).find('textarea[name=message]');
                    $.ajax({
                        type: formMethod,
                        url: formUrl,
                        data: formData
                    }).done(function(response){
                        fio.val ('');
                        email.val ('');
                        mess.val ('');
                        message.show (response['message'], response['status']);
                    })

                }

                else{
                    message.show( $('.message-container').data('email-error'), 'error')
                }

            })

        </script>
    @endif
@endif

<footer>
    <div class="container">
        {!! html_entity_decode($dashboard->footer) !!}
    </div>
</footer>
<div data-email-error="@lang('messages.enter correct email')" class="message-container"></div>
<div class="languageSet">
    <a href="#" class="toggler">
        <img class="closed" src="{!! asset('assets/themes/default/img/lang.png') !!}" alt="language">
        <img class="opened" src="{!! asset('assets/themes/default/img/close.png') !!}" alt="language">
    </a>
    <div class="links">
        <?php $url = LaravelLocalization::getNonLocalizedURL(\Request::path()); ?>
        <a href="{!! LaravelLocalization::getLocalizedURL('ua', $url) !!}">
            <img src="{!! asset('assets/themes/default/img/ua.png') !!}" alt="ua">
        </a>
        <a href="{!! LaravelLocalization::getLocalizedURL('en', $url) !!}">
            <img src="{!! asset('assets/themes/default/img/en.png') !!}" alt="en">
        </a>
        <a href="{!! LaravelLocalization::getLocalizedURL('ru', $url) !!}">
            <img src="{!! asset('assets/themes/default/img/ru.png') !!}" alt="ru">
        </a>
    </div>
</div>
<script>
    $('.languageSet .toggler').on('click', function(e){
        e.preventDefault();
        langMenu = $('.languageSet');
        if (!langMenu.hasClass('opened')){
            langMenu.css ('right', '0');
            langMenu.addClass ('opened');
            $(this).find('img.opened').show();
            $(this).find('img.closed').hide();
        }
        else{
            langMenu.css ('right', '-200px');
            langMenu.removeClass ('opened');
            $(this).find('img.opened').hide();
            $(this).find('img.closed').show();
        }

    });
</script>
@if(!route_is('home'))
<style>
    body{
        background: #daffff;
    }
    #body{
        margin-bottom: 50px;
    }
    footer{
        height:50px;
        padding: 0;
        position: fixed;
        bottom: 0;
        width:100%;
    }
    footer h5{
        font-size: 10px;
    }
</style>
@endif