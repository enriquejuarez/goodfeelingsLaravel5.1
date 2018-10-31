<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
        <meta name="description" content="Autenticacion goodfeelings">
        <meta name="author" content="GoodFeelings">
        <meta name="keyword" content="GoodFeelings">
        <title>GoodFeelings - Acceso</title>
        <link href='img/favicon.ico' rel='icon' type='image/x-icon'/>
        <link href="{{ asset('fonts/font-awesome.css') }}" rel="stylesheet">
        <link href="css/all.css" rel="stylesheet">
        <link rel="shortcut icon" href="/imagenes/favicon.png" type="image/x-icon" />
        <style type="text/css">
            .azul{
                background-color: #2F70D7 !important;
            }
        </style>
    </head>
    <body class="app flex-row align-items-center">

        <div class="container">
            @yield('login')
        </div>

    </body>
</html>
