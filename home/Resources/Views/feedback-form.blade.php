{!! Form::model(\Auth::user(), ['route' => 'core.mailer.feedback']) !!}
{!! Form::hidden('locale', \App::getLocale()) !!}
{!! Form::hidden('_captcha_', 0) !!}
<div>
    {!! Form::label(trans('home_lang::feedback.name')) !!}<br>
    {!! Form::text('name') !!}
</div>
<div>
    {!! Form::label(trans('home_lang::feedback.email')) !!}<br>
    {!! Form::email('email') !!}
</div>
<div>
    {!! Form::label(trans('home_lang::feedback.phone')) !!}<br>
    {!! Form::text('phone') !!}
</div>
<div>
    {!! Form::label(trans('home_lang::feedback.message')) !!}<br>
    {!! Form::textarea('message') !!}
</div>
{!! Form::button(trans('home_lang::feedback.submit'), ['type' => 'submit', 'autocomplete' => 'off']) !!}
{!! Form::close() !!}