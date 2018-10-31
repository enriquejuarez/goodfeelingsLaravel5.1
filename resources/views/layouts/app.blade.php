<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>GoodFeelings</title>

    {{-- CSS --}}
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
    integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.2/css/all.css" integrity="sha384-/rXc/GQVaYpyDdyxK+ecHPVYJSN9bmVFBvjA/9eOB+pb3F2w2N6fc5qB9Ew5yIns" crossorigin="anonymous">

    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap-social.css') }}" rel="stylesheet">
    <link href="{{ asset('fonts/font-awesome.css') }}" rel="stylesheet">
    <link href="{{ asset('css/docs.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="shortcut icon" href="/imagenes/favicon.png" type="image/x-icon" />

    {{-- JS --}}
    <script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
    crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <script src="{{ asset('js/index.js') }}" defer></script>

</head>
<body>
    <div class="container-first visible-xs visible-md" style="width: 100%;">
        <!--MENU EXPERIMENTAL-->
        <form class="bs-example black" data-example-id="inverted-navbar">
            <nav class="navbar navbar-inverse container custom-menu black" style="border: 0px solid #000000;">
                <div class="container-fluid" style="background: #231f1f">
                    <div class="navbar-header">
                        <button type="button" class="collapsed navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-9" aria-expanded="true">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        </button>
                    </div>
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-9">
                        <ul class="nav navbar-nav" style="float: left;">
                            <li class="click-nav" style="text-align: left;"><a href="#menu-ancla">INICIO</a></li>
                            <li class="nosotros-menu click-nav" style="text-align: left;"><a href="#paquete-ancla">PAQUETES</a></li>
                            <li class="eventos-especiales-menu click-nav" style="text-align: left;"><a href="#destinos-ancla">DESTINOS</a></li>
                            <li class="regalos-menu click-nav" style="text-align: left;"><a href="#servicios-ancla">SERVICIOS</a></li>
                            <li class="informacion-menu opcion-menu contacto" style="text-align: left;"><a href="#menu-ancla">CONTACTO</a></li>
                            <li class="informacion-menu click-nav" style="text-align: justify;">
                                <div class="col-xs-12 col-sm-12 col-md-2 ">
                                    <a class="btn btn-block btn-social btn-facebook">
                                        <span class="fa fa-facebook"></span>Siguenos en Facebook
                                    </a>
                                    <a class="btn btn-block btn-social btn-instagram">
                                        <span class="fa fa-instagram"></span>Siguenos en Instagram
                                    </a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </form>
    </div>

    <div class="container-fluid">
        <!-- INICIA MENU-->
        <div class="row hidden-xs hidden-md">
            <nav>
                <div class="col-xs12 col-sm-2 col-md-3 ">
                    {{-- <img src="imagenes/Goodfeelings.png" alt width="190"> --}}
                </div>
                <div class="col-xs-12 col-sm-12 col-md-9 ">
                    <div class="row">
                        @if (Auth::guest())

                            <div class="col-xs-12 col-sm-12 col-md-2 ">
                               <a href="#menu-ancla"><span class="opcion-menu black">INICIO</span></a>
                            </div>
                        @endif
                        <div class="col-xs-12 col-sm-12 col-md-2 ">
                            <a href="#paquete-ancla"><span class="opcion-menu black">PAQUETES</span></a>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-2 ">
                            <a href="#destinos-ancla"><span class="opcion-menu black">DESTINOS</span></a>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-2 ">
                            <a href="#servicios-ancla"><span class="opcion-menu black">SERVICIOS</span></a>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-2 ">
                            <span class="opcion-menu contacto black">CONTACTO</span>
                        </div>
                        @if (Auth::check())
                            <div class="col-xs-12 col-sm-12 col-md-2 ">
                                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    <span class="opcion-menu black">SALIR</span>
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                        </div>
                        @endif
                        <div class="col-xs-12 col-sm-12 col-md-2 ">
                            <a class="btn btn-social-icon btn-facebook" href="https://www.facebook.com/aagenciaviaje/?modal=admin_todo_tour">
                                <span class="fa fa-facebook"></span>
                            </a>
                            <a class="btn btn-social-icon btn-instagram" href="https://www.instagram.com/travel.goodfeelings/">
                                <span class="fa fa-instagram"></span>
                            </a>
                        </div>
                    </div>
                </div>
            </nav>
        </div>
        <!-- TERMINA MENU -->
        <div class="container-contacto redondeo hidden-xs">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <span class="glyphicon glyphicon-remove salir-modal-contact"></span>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <strong>¿Quieres más información?</strong>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="title-contact"></div>
                    <div class="input-group">
                        <span class="input-group-addon glyphicon glyphicon-user " id="basic-addon1" style="background:#72689a;"></span>
                        <input class="form-control" placeholder="Nombre" aria-describedby="basic-addon1">
                    </div>
                    <div class="input-group" style="margin-top: 5px;">
                        <span class="input-group-addon glyphicon glyphicon-envelope" id="basic-addon1" style="background:#72689a;"></span>
                        <input class="form-control" placeholder="E-mail" aria-describedby="basic-addon1">
                    </div>
                    <div class="input-group" style="margin-top: 5px;">
                        <span class="input-group-addon glyphicon glyphicon-phone" style="background:#72689a;" id="basic-addon1"></span>
                        <input class="form-control" placeholder="Teléfono" aria-describedby="basic-addon1">
                    </div>
                    <button class="btn btn-primary enviar-reserva" style="float: left;margin-top: 4px;background: #72689a;">ENVIAR</button>
                </div>
            </div>
        </div>

        <div class="container-contacto redondeo visible-xs" style="margin-left: 9%;">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <span class="glyphicon glyphicon-remove salir-modal-contact"></span>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <strong>¿Quieres más información?</strong>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="title-contact"></div>
                    <div class="input-group">
                        <span class="input-group-addon glyphicon glyphicon-user" style="background:#72689a;" id="basic-addon1"></span>
                        <input class="form-control" placeholder="Nombre" aria-describedby="basic-addon1">
                    </div>
                    <div class="input-group" style="margin-top: 5px;">
                        <span class="input-group-addon glyphicon glyphicon-envelope" id="basic-addon1" style="background:#72689a;"></span>
                        <input class="form-control" placeholder="E-mail" aria-describedby="basic-addon1">
                    </div>
                    <div class="input-group" style="margin-top: 5px;">
                        <span class="input-group-addon glyphicon glyphicon-phone" style="background:#72689a;" id="basic-addon1"></span>
                        <input class="form-control" placeholder="Teléfono" aria-describedby="basic-addon1">
                    </div>
                    <button class="btn btn-primary enviar-reserva" style="float: left;margin-top: 4px;background: #72689a;">ENVIAR</button>
                </div>
            </div>
        </div>

        <main class="py-4">
                @yield('content')
        </main>

        <footer class="footer">
            <div class="container bottom_border">
                <div class="row">
                    <div class=" col-sm-5 col-md col-sm-5  col-12 col">
                        <h5 class="headin5_amrc col_white_amrc pt2">Información de contacto</h5>
                        <!--headin5_amrc-->
                        <p><i class="fa fa-location-arrow"></i> OFICINA ANIMAS XALAPA: (228) 688 5893</p>
                        <p><i class="fa fa-location-arrow"></i> PUEBLA: (222) 651 4313</p>
                        <p><i class="fa fa-location-arrow"></i> WHATSAPP: (228) 171 5930</p>
                        <p><i class="fa fa fa-envelope"></i> reservaciones@goodfeelings.com.mx</p>
                    </div>

                    <div class=" col-sm-4 col-md  col-6 col">
                        <h5 class="headin5_amrc col_white_amrc pt2">Recomendaciones</h5>
                        <!--headin5_amrc-->
                        <ul class="footer_ul_amrc">
                            <li><a href="http://kalarikendramdelhi.com">Cancún y sus atractivos</a></li>
                            <li><a href="http://kalarikendramdelhi.com">Lugares que debes conocer</a></li>
                        </ul>
                    <!--footer_ul_amrc ends here-->
                    </div>
                </div>
            </div>

            <div class="container">
                <!--foote_bottom_ul_amrc ends here-->
                <p class="text-center">Copyright @2018 | <a href="#">goodfeelings.com.mx</a></p>

                <!--<ul class="social_footer_ul">
                <li><a href="http://kalarikendramdelhi.com"><i class="fab fa-facebook-f"></i></a></li>
                <li><a href="http://kalarikendramdelhi.com"><i class="fab fa-twitter"></i></a></li>
                <li><a href="http://kalarikendramdelhi.com"><i class="fab fa-linkedin"></i></a></li>
                <li><a href="http://kalarikendramdelhi.com"><i class="fab fa-instagram"></i></a></li>
                </ul>-->
                <!--social_footer_ul ends here-->
            </div>
        </footer>
    </div>
</body>
</html>
