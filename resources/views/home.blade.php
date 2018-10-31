@extends('layouts.app')

@section('content')

<!-- INICIA CARRUSEL -->
    <div class="class row">
        <div id="myCarousel" class="carousel slide" data-ride="carousel">
            <!-- Indicators -->
            <ol class="carousel-indicators">
                <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                <li data-target="#myCarousel" data-slide-to="1"></li>
                <li data-target="#myCarousel" data-slide-to="2"></li>
            </ol>
            <!-- Wrapper for slides -->
            <div class="carousel-inner">
            @if (Auth::check())
                <a class="btn btn-default btn-editar" href="#" style="top: 150px; left: 180px;"><i class="fas fa-pencil-alt"></i></a>
            @endif

            @foreach($fotos as $key=>$foto)

                <div class="item {{  $key === 0 ? 'active' : '' }}">
                {{-- <div class="item active"> --}}
                    <img src="{{ $foto->file }}" alt="" style="width:100%;">
                    <div class="row">
                         <div class="carousel-caption" id="{{ $foto->id }}">
                        </div>
                    </div>
                </div>
            @endforeach
            </div>
            <!-- Left and right controls -->
            <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left"></span>
                <span class="sr-only">Previo</span>
            </a>
            <a class="right carousel-control" href="#myCarousel" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right"></span>
                <span class="sr-only">Siguiente</span>
            </a>
        </div>
    </div>
    <!-- FIN CARRUSEL -->

    <!--PAQUETES DISPONIBLES-->
    <a name="paquete-ancla"></a>
    <div class="row cuatro">
        <div class="col-xs-12 ">
            @if (Auth::check())
                <a class="btn btn-default btn-editar edit-title" href="#" id="{{ substr($sections["packages"],0, strpos($sections["packages"], '-')) }}" data-toggle="modal" data-target="#myModalTitleSection" style="top: 10px; left: 840px;"><i class="fas fa-pencil-alt"></i></a>
            @endif
        </div>
        <h1 id="title-section{{ substr($sections["packages"],0, strpos($sections["packages"], '-')) }}">{{ substr($sections["packages"],strpos($sections["packages"], '-')+1, strlen($sections["packages"])) }}</h1>
        <div class="page_caption_desc" style="font-family: sans-serif !important;">Aprovecha nuestras promociones</div>
    </div>
    <div class="row">
    @foreach($paquetes as $paquete)
        <div class="col-xs-12 col-sm-4 col-md-4 col-md-lg-4" style="padding-left: 1px; padding-right: 1px;">
            @if (Auth::check())
                <a class="btn btn-default btn-editar edit-package" href="#" id="{{ $paquete->id }}" data-toggle="modal" data-target="#myModal" style="top: 150px; left: 180px;"><i class="fas fa-pencil-alt"></i></a>
            @endif
            <a href="{{ route('detalle_paquete', $paquete->id) }}">
                <div id="padre" style="margin-top:10px;">
                    <img src="{{ $paquete->file }}" class="img-responsive" alt="" id="file{{ $paquete->id }}">
                    <div id="uno">
                        <div class="titulo row" style="width: 100%;">
                            <div class="col-md-6">
                                <div class="lugar1" id="title{{ $paquete->id }}">
                                {{ $paquete->title }}
                                </div>
                            </div>
                            <div class="col-md-6">
                                 <div class="diast" id="price{{ $paquete->id }}">
                                 ${{ $paquete->price }}
                                </div>
                            </div>
                        </div>
                        <div class="titulo row" style="width: 100%;">
                            <div class="col-md-6">
                                <div class="ruta" id="dates{{ $paquete->id }}">
                                    Del {{ $paquete->date_initial }} al {{ $paquete->date_final }}
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="preciot" id="excerpt{{ $paquete->id }}">
                                {{ $paquete->excerpt }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        @endforeach

        <!-- Modal -->
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header color-red">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h3 class="modal-title text-center" id="myModalLabel">Actualizar - {{ $sections["packages"] }}</h3>
                    </div>
                    <div class="alert alert-warning hidden" role="alert" id="alert-rol" style="font-size: 18px">
                        <strong>Advertencia!</strong><span></span>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="form-group col-md-12 text-left">
                                <label for="title">Título</label>
                                <input type="text" class="form-control" name="title" id="title"/>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-4 text-left">
                                <label for="price">Precio</label>
                                <input type="text" class="form-control" name="price" id="price"/>
                            </div>
                            <div class="form-group col-md-8 text-left">
                                <label for="excerpt">Información</label>
                                <input type="text" class="form-control" name="excerpt" id="excerpt"/>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-3 text-left">
                                <label for="date_initial">Inicia</label>
                                <input type="date" name="date_initial" id="date_initial" value="{{ date('Y-m-d') }}">
                            </div>
                            <div class="form-group col-md-3 text-left">
                                <label for="date_final">Termina</label>
                                <input type="date" name="date_final" id="date_final" value="{{ date('Y-m-d') }}">
                            </div>
                            <div class="form-group col-md-6 text-left">
                                <label for="file">Imagen</label>
                                <img src="" alt="package" id="preview-package" class="img-responsive" style="width: 150px; height: 150px;">
                                <form method="post" id="upload-file" enctype="multipart/form-data">
                                    <input type="file" name="file" id="file" accept=".jpg, .jpeg, .png" alt="package">
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" id="save_package">Guardar</button>
                        <button type="button" class="btn btn-primary" data-dismiss="modal">Cancelar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--FIN PAQUETES DISPONIBLES-->

    <!--CONOCE DESTINOS-->
    <div class="row" style="padding-bottom: 38px;">
        <div class="col-xs-12 ">
            @if (Auth::check())
                <a class="btn btn-default btn-editar edit-title" href="#" id="{{ substr($sections["destinations"],0, strpos($sections["destinations"], '-')) }}" data-toggle="modal" data-target="#myModalTitleSection" style="top: 10px; left: 820px;"><i class="fas fa-pencil-alt"></i></a>
            @endif
            <h1 style="font-weight: 700; font-size: 30px; line-height: 30px; text-transform: uppercase; margin-bottom: 5px; letter-spacing: 0; margin-top: 3%;" id="title-section{{ substr($sections["destinations"],0, strpos($sections["destinations"], '-')) }}">{{ substr($sections["destinations"],strpos($sections["destinations"], '-')+1, strlen($sections["destinations"])) }}</h1>
        </div>
        <!-- Modal -->
        <div class="modal fade" id="myModalTitleSection" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header color-red">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h3 class="modal-title text-center" id="myModalLabel">Actualizar - Título</h3>
                    </div>
                    <div class="alert alert-warning hidden" role="alert" id="alert-rol" style="font-size: 18px">
                        <strong>Advertencia!</strong><span></span>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="form-group col-md-12 text-left">
                                <label for="title">Título</label>
                                <input type="text" class="form-control" name="title-section" id="title-section"/>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" id="save_title">Guardar</button>
                        <button type="button" class="btn btn-primary" data-dismiss="modal">Cancelar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row cuatro" style="width: 0%;">
        <div class="row imgfont" style="margin-left:0px; margin-right:0px;">
            @foreach($destinos as $destino)
                <div class="col-md-3">
                    @if (Auth::check())
                        <a class="btn btn-default btn-editar edit-destinations" href="#" id="{{ $destino->id }}" data-toggle="modal" data-target="#myModalDestinations" style="top: 120px; left: 150px;"><i class="fas fa-pencil-alt"></i></a>
                    @endif
                    <div id="padre" style="margin-top:10px;">
                        <img src="{{ $destino->file }}" alt class="thumbnail" style="width: 100%; padding:0px;" id="file-destination{{ $destino->id }}">
                        <div class="opcion-menu2 dos" style="font-family: sans-serif; font-size: 15px; max-width: 297px; width: 100%; background: rgba(0, 0,0,0.5);" id="title-destination{{ $destino->id }}">
                            {{ $destino->title }}
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Modal -->
        <div class="modal fade" id="myModalDestinations" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header color-red">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h3 class="modal-title text-center" id="myModalLabel">Actualizar - {{ $sections["destinations"] }}</h3>
                    </div>
                    <div class="alert alert-warning hidden" role="alert" id="alert-rol" style="font-size: 18px">
                        <strong>Advertencia!</strong><span></span>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="form-group col-md-12 text-left">
                                <label for="title">Título</label>
                                <input type="text" class="form-control" name="title-destination" id="title-destination"/>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-12 text-left">
                                <label for="file">Imagen</label>
                                <img src="" alt="imagen" id="preview-destination" class="img-responsive" style="width: 150px; height: 150px;">
                                <form method="post" id="upload-file-destination" enctype="multipart/form-data">
                                    <input type="file" name="file-destination" id="file-destination" accept=".jpg, .jpeg, .png" alt="destination">
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" id="save_destination">Guardar</button>
                        <button type="button" class="btn btn-primary" data-dismiss="modal">Cancelar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--FIN CONOCE DESTINOS-->

    {{-- TESTIMONIOS --}}
    <div class="row cuatro ">
        <div class="col-xs-12 ">
            @if (Auth::check())
                <a class="btn btn-default btn-editar edit-title" href="#" id="{{ substr($sections["testimonies"],0, strpos($sections["testimonies"], '-')) }}" data-toggle="modal" data-target="#myModalTitleSection" style="top: 10px; left: 820px;"><i class="fas fa-pencil-alt"></i></a>
            @endif
        </div>
        <h1 id="title-section{{ substr($sections["testimonies"],0, strpos($sections["testimonies"], '-')) }}">{{ substr($sections["testimonies"],strpos($sections["testimonies"], '-')+1, strlen($sections["testimonies"])) }}</h1>
        <div class="testimonial_slider_wrapper">
            <div class="flexslider" data-height="750">
                <ul class="slides">
                    <li style="width: 100%; float: left; margin-right: -100%; position: relative; opacity: 1; display: block; z-index: 2;"
                        class="flex-active-slide">
                        <div class="testimonial_slider_wrapper" style="font-family: sans-serif;text-align: justify;">Hola ya fui a Cancún y es precioso me encantó tal vez algún día pueda viajar otra vez pero me quedé impresionada con sus tonalidades turquesas del mar Caribe sin duda México me encanta  de verdad me siento totalmente orgullosa de ser mexicana.
                            <div class="testimonial_slider_meta">
                            <div class="page_caption_desc" style="font-family: sans-serif !important;">Carla Beatriz Durán</div>
                            <!--<h6>Carla Beatriz Durán</h6>-->
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
            <ol class="flex-control-nav flex-control-paging">
                <li><a class=""></a></li>
                <li><a class="flex-active"></a></li>
                <li><a class=""></a></li>
            </ol>
        </div>
    </div>
    {{-- FIN TESTIMONIOS --}}

    {{-- SERVICIOS --}}
    <a name="servicios-ancla"></a>
    <div class="row cuatro ">
        <div class="col-xs-12 ">
            @if (Auth::check())
                <a class="btn btn-default btn-editar edit-title" href="#" id="{{ substr($sections["services"],0, strpos($sections["services"], '-')) }}" data-toggle="modal" data-target="#myModalTitleSection" style="top: 10px; left: 820px;"><i class="fas fa-pencil-alt"></i></a>
            @endif
        </div>
        <h1 class="opcion-menu2" id="title-section{{ substr($sections["services"],0, strpos($sections["services"], '-')) }}">{{ substr($sections["services"],strpos($sections["services"], '-')+1, strlen($sections["services"])) }}</h1>
        <div class="page_caption_desc" style="font-family: sans-serif !important;">¡TE AYUDAMOS A PLANEAR!</div>
    </div>
    <div class="row">
        @foreach($services as $service)
            <div class="col-md-4 ">
                @if (Auth::check())
                    <a class="btn btn-default btn-editar edit-services" href="#" id="{{ $service->id }}" data-toggle="modal" data-target="#myModalServices" style="top: 150px; left: 180px;"><i class="fas fa-pencil-alt"></i></a>
                @endif
                <div id="padre" style="margin-top: 15px;">
                    <img src="{{ $service->file }}" class="img-responsive" alt="">
                    <div id="unos">
                        <div class="titulo" style="width: 100%;">
                               <h1 style="font-size: 20px;">{{ $service->title }}</h1>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <!-- Modal -->
    <div class="modal fade" id="myModalServices" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header color-red">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h3 class="modal-title text-center" id="myModalLabel">Actualizar - {{ $sections["services"] }}</h3>
                </div>
                <div class="alert alert-warning hidden" role="alert" id="alert-rol" style="font-size: 18px">
                    <strong>Advertencia!</strong><span></span>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="form-group col-md-12 text-left">
                            <label for="title">Título</label>
                            <input type="text" class="form-control" name="title-service" id="title-service"/>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-12 text-left">
                            <label for="file">Imagen</label>
                            <img src="" alt="imagen" id="preview-service" class="img-responsive" style="width: 150px; height: 150px;">
                            <form method="post" id="upload-file-service" enctype="multipart/form-data">
                                <input type="file" name="file-service" id="file-service" accept=".jpg, .jpeg, .png" alt="service">
                            </form>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" id="save_service">Guardar</button>
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Cancelar</button>
                </div>
            </div>
        </div>
    </div>
    {{-- FIN SERVICIOS --}}

    {{-- ELEGIRNOS --}}
    <a name="elegirnos-ancla"></a>
    <div class="row cuatro ">
        <div class="col-xs-12 ">
            @if (Auth::check())
                <a class="btn btn-default btn-editar edit-title" href="#" id="{{ substr($sections["we"],0, strpos($sections["we"], '-')) }}" data-toggle="modal" data-target="#myModalTitleSection" style="top: 10px; left: 820px;"><i class="fas fa-pencil-alt"></i></a>
            @endif
        </div>
        <h1 class="opcion-menu2" id="title-section{{ substr($sections["we"],0, strpos($sections["we"], '-')) }}">{{ substr($sections["we"],strpos($sections["we"], '-')+1, strlen($sections["we"])) }}</h1>
    </div>
    <div class="row">
        <div class="col-md-4 ">
            <div class="service_icon image">
                <img src="imagenes/icon-feelings.jpg" alt="">
            </div><br>
            <h3>CONFIABILIDAD</h3>
            <p style="text-align: justify;">Contamos con empresas afiliadas que reúnen los permisos y certificaciones necesarias para ofrecer cualquier servicio turístico con la calidad, confiabilidad y profesionalismo que necesitas para que tu próximo viaje sea la mejor experiencia.
            </p>
        </div>
        <div class="col-md-4 ">
            <div class="service_icon image">
                <img src="imagenes/icon-feelings.jpg" alt="">
            </div><br>
            <h3 class="opcion-menu3">COMPROMISO</h3>
            <p style="text-align: justify;">Mantenemos un cercano compromiso con el cliente para ofrecerle las mejores opciones para organizar su viaje, con experiencias únicas y especiales para cada cliente, personalizando la atención.
            </p>
        </div>
        <div class="col-md-4 ">
            <div class="service_icon image">
                <img src="imagenes/icon-feelings.jpg" alt="">
            </div><br>
            <h3 class="opcion-menu3" >PRECIO</h3>
            <p style="text-align: justify;">Nuestro propósito es dar a nuestros clientes la tranquilidad de invertir en sus vacaciones con la calidad de los servicios que merecen y disfrutar al máximo la experiencia del placer de viajar, con memorias inolvidables.
            </p>
        </div>
    </div>
    {{-- FIN ELEGIRNOS --}}

    <div class="row " id="tres"></div>

    <script type="text/javascript">
        var idPackage = 0;
            idDestination = 0;
            idSection = 0;
            idService = 0;

        $('.edit-package').click(function() {
            idPackage = 0;
            $('#file').val('');
            $.ajax({
                type: "GET",
                headers: {
                    'X-CSRF-Token': $('meta[name="csrf_token"]').attr('content')
                },
                url: 'get_package',
                data: {'idPackage':$(this).attr("id") },
                success: function(data)
                {
                    $('.modal-body #title').val(data.package.title);
                    $('.modal-body #price').val(data.package.price);
                    $('.modal-body #excerpt').val(data.package.excerpt);
                    $('.modal-body #date_initial').val(data.package.date_initial);
                    $('.modal-body #date_final').val(data.package.date_final);
                    $('.modal-body #preview-package').attr("src", data.package.file);
                    idPackage = data.package.id;
                },
                error: function (response) {
                    console.log("Se generó un error al obtener los detalles del paquete");
                }
            });
        });

        $('#save_package').click(function() {
            var
                title           = $('.modal-body #title').val();
                price           = $('.modal-body #price').val();
                excerpt         = $('.modal-body #excerpt').val();
                date_initial    = $('.modal-body #date_initial').val();
                date_final      = $('.modal-body #date_final').val();
            var formData = new FormData($("#upload-file")[0]);
                formData.append('idPackage', idPackage);
                formData.append('title', title);
                formData.append('price', price);
                formData.append('excerpt', excerpt);
                formData.append('date_initial', date_initial);
                formData.append('date_final', date_final);
            $.ajax({
                type: "POST",
                headers: {
                    'X-CSRF-Token': $('meta[name="csrf_token"]').attr('content')
                },
                url: 'update_package',
                data: formData,
                processData: false,
                contentType: false,
                success: function(data)
                {
                    $('#title'+idPackage).html(title);
                    $('#excerpt'+idPackage).html(excerpt);
                    $('#price'+idPackage).html(price);
                    $('#dates'+idPackage).html("Del " + date_initial + " al " + date_final);
                    $('#myModal').modal('hide');
                    idPackage = 0;
                },
                error: function (response) {
                    console.log("Se generó un error en proceso de actualización de paquete");
                }
            });
        });

        $("input[type='file']").on("change", function(e){
                var TmpPath = URL.createObjectURL(e.target.files[0]);
            $('.modal-body #preview'+"-"+$(this).attr("alt")).attr("src", TmpPath);
        });

        $('.edit-destinations').click(function() {
            idDestination = 0;
            $('#file-destination').val('');
            $.ajax({
                type: "GET",
                headers: {
                    'X-CSRF-Token': $('meta[name="csrf_token"]').attr('content')
                },
                url: 'get_destination',
                data: {'idDestination':$(this).attr("id") },
                success: function(data)
                {
                    $('.modal-body #title-destination').val(data.destination.title);
                    $('.modal-body #preview-destination').attr("src", data.destination.file);
                    idDestination = data.destination.id;
                },
                error: function (response) {
                    console.log("Se generó un error al obtener los detalles del destino");
                }
            });
        });

        $('#save_destination').click(function() {
            var
                title           = $('.modal-body #title-destination').val();
            var formData = new FormData($("#upload-file-destination")[0]);
                formData.append('idDestination', idDestination);
                formData.append('title', title);
            $.ajax({
                type: "POST",
                headers: {
                    'X-CSRF-Token': $('meta[name="csrf_token"]').attr('content')
                },
                url: 'update_destination',
                data: formData,
                processData: false,
                contentType: false,
                success: function(data)
                {
                    $('#title-destination'+idDestination).html(title);
                    $('#myModalDestinations').modal('hide');
                    idDestination = 0;
                },
                error: function (response) {
                    console.log("Se generó un error en proceso de actualización de destino");
                }
            });
        });

        $('.edit-services').click(function() {
            idService = 0;
            $('#file-service').val('');
            $.ajax({
                type: "GET",
                headers: {
                    'X-CSRF-Token': $('meta[name="csrf_token"]').attr('content')
                },
                url: 'get_service',
                data: {'idService':$(this).attr("id") },
                success: function(data)
                {
                    $('.modal-body #title-service').val(data.service.title);
                    $('.modal-body #preview-service').attr("src", data.service.file);
                    idService = data.service.id;
                },
                error: function (response) {
                    console.log("Se generó un error al obtener los detalles del servicio");
                }
            });
        });

        $('#save_service').click(function() {
            var
                title           = $('.modal-body #title-service').val();
            var formData = new FormData($("#upload-file-service")[0]);
                formData.append('idService', idService);
                formData.append('title', title);
            $.ajax({
                type: "POST",
                headers: {
                    'X-CSRF-Token': $('meta[name="csrf_token"]').attr('content')
                },
                url: 'update_service',
                data: formData,
                processData: false,
                contentType: false,
                success: function(data)
                {
                    $('#title-service'+idService).html(title);
                    $('#myModalServices').modal('hide');
                    idService = 0;
                },
                error: function (response) {
                    console.log("Se generó un error en proceso de actualización de servicio");
                }
            });
        });

        $('.edit-title').click(function() {
            idTitle = 0;
            $.ajax({
                type: "GET",
                headers: {
                    'X-CSRF-Token': $('meta[name="csrf_token"]').attr('content')
                },
                url: 'get_section',
                data: {'idTitle':$(this).attr("id") },
                success: function(data)
                {
                    $('.modal-body #title-section').val(data.section.title);
                    idSection = data.section.id;
                },
                error: function (response) {
                    console.log("Se generó un error al obtener el título");
                }
            });
        });

        $('#save_title').click(function() {
            var
                title           = $('.modal-body #title-section').val();
            $.ajax({
                type: "POST",
                headers: {
                    'X-CSRF-Token': $('meta[name="csrf_token"]').attr('content')
                },
                url: 'update_title_section',
                data: {'title': title, 'idTitle': idSection},
                success: function(data)
                {
                    $('#title-section'+idSection).html(title);
                    $('#myModalTitleSection').modal('hide');
                    idSection = 0;
                },
                error: function (response) {
                    console.log("Se generó un error en proceso de actualización del título de la sección");
                }
            });
        });

    </script>
@endsection
