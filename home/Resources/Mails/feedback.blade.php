<!DOCTYPE html>
<html lang="" class="no-js">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title></title>
    <meta name="description" content="">
</head>
<body>
<p>
    @lang('mails_lang::feedback.name'): {{ $data['name'] }}<br>
    @lang('mails_lang::feedback.email'): {{ $data['email'] }}<br>
    @lang('mails_lang::feedback.phone'): {{ $data['phone'] }}<br>
    @lang('mails_lang::feedback.message'):
</p>
<p>
    {{ $data['message'] }}
</p>
</body>
</html>