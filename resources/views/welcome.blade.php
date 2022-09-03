<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>EcoCitizen</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">
        <!-- Styles -->

        <style>
            body {
                font-family: 'Cairo', sans-serif;
            }
        </style>
        <script type="text/javascript">window.$crisp=[];window.CRISP_WEBSITE_ID="c65799e1-e3f8-4b8d-965e-aada701b8da9";(function(){d=document;s=d.createElement("script");s.src="https://client.crisp.chat/l.js";s.async=1;d.getElementsByTagName("head")[0].appendChild(s);})();</script>

    </head>
    <body class="antialiased">
       <div id="app"></div>
       <script src="{{ mix('js/app.js') }}" defer></script>
    </body>
</html>
