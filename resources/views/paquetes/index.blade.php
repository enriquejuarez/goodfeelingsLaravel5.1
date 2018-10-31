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

                <div class="item active">
                    <img src="../imagenes/Extra1.jpg" alt="" style="width:100%;">
                    <div class="row">
                         <div class="carousel-caption">
                          CELEBRA TUS XV AÑOS VIAJANDO
                            <!--<p>LA is always so much fun!</p>-->
                        </div>
                    </div>
                </div>

                <div class="item">
                    <img src="../imagenes/Extra2.jpg" alt="" style="width:100%;">
                    <div class="row carousel-caption">
                        CELEBRA TUS XV AÑOS VIAJANDO
                        <!--<p>LA is always so much fun!</p>-->
                    </div>
                </div>
                <div class="item">
                    <img src="../imagenes/Extra3.jpg" alt="" style="width:100%;">
                    <div class="row carousel-caption">
                        CELEBRA TUS XV AÑOS VIAJANDO
                        <!--<p>LA is always so much fun!</p>-->
                    </div>
                </div>
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
    <div class="row">
        <div class="col-xs-12 col-sm-8 col-md-8">
            <div class="row">
                <div class="col-xs-12">
                    <div class="">
                        <a name="info"></a>
                        <h1 style="font-family: sans-serif;font-size: 1.6em;">PROGRAMA DE VIAJE</h1>
                        <div style="color:#b63327;font-size: 0.8em;"></div>
                    </div>
                </div>
                @foreach($packages_details as $package_detail)
                    <div class="col-xs-12 info-paquete" style="margin-top:20px;">
                        <div>
                        @if (Auth::check())
                            <a class="btn btn-default btn-editar edit-package-detail" href="#" id="{{ $package_detail->id }}" data-toggle="modal" data-target="#myModalPackageDetail" style="top: 10px; left: 80px;"><i class="fas fa-pencil-alt"></i></a>
                        @endif
                            <div style="color: #b63327;width: 60%;margin: auto;text-align: left;" id="package_detail_title{{ $package_detail->id }}">{{ $package_detail->title }}</div>
                        </div>
                        <div>
                            <div style="color: #383534;width: 60%;margin: auto;text-align: left;font-weight: bold;font-family: sans-serif;" id="package_detail_subtitle{{ $package_detail->id }}">{{ $package_detail->subtitle }} </div>
                        </div>
                        <div>
                            <div class="center-text-paquete" id="package_detail_description{{ $package_detail->id }}">{{ $package_detail->description }}</div>
                        </div>
                    </div>
                @endforeach
                <div class="col-xs-12"><br>
                    <div class="center-text-paquete">
                        <a href="{{ asset('pdfs/GF Travel - Términos y Condiciones.pdf') }}" download="contrato">DESCARGAR CONTRATO</a>
                        <br>
                        <a href="{{ asset('pdfs/GF Travel - Carta Consentimiento.pdf') }}" download="Términos y condiciones">DESCARGAR FORMATO DE PERMISO/AUTORIZACIÓN</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xs-12 col-sm-4 col-md-4">
            <div class="">
                <h1 style="font-family: sans-serif;font-size: 1.6em;">PAQUETES DISPONIBLES</h1>
                <div style="color:#b63327;font-size: 0.8em;">EXPERIENCIA DE 8 DÍAS</div>
            </div>
            <div class="row">
                @foreach($packages as $package)
                    <div class="col-xs-12">
                        <div id="padre" style="display: table; margin-top:10px;">
                            <img src="{{ $package->file }}" class="" alt="">
                            <div id="uno-paquetes">
                                <div class="titulo-paquetes row" style="width: 100%;">
                                    <div class="col-md-6">
                                        <div class="lugar1" >
                                            {{ $package->title }}
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="diast" >
                                            ${{ $package->price }}
                                        </div>
                                    </div>
                                </div>
                                <div class="titulo-paquetes row" style="width: 100%;">
                                    <div class="col-md-6">
                                        <div class="ruta" >
                                            Del {{ $package->date_initial }} al {{ $package->date_final }}
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="preciot" >
                                            {{ $package->excerpt }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- Modal -->
        <div class="modal fade" id="myModalPackageDetail" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header color-red">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h3 class="modal-title text-center" id="myModalLabel">Actualizar Información</h3>
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
                            <div class="form-group col-md-12 text-left">
                                <label for="subtitle">Subtítulo</label>
                                <input type="text" class="form-control" name="subtitle" id="subtitle"/>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-12 text-left">
                                <label for="description">Descripción</label>
                                <textarea name="description" id="description" cols="30" rows="10" class="form-control"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" id="save_package_detail">Guardar</button>
                        <button type="button" class="btn btn-primary" data-dismiss="modal">Cancelar</button>
                    </div>
                </div>
            </div>
        </div>

    <script type="text/javascript">
        var idPackage = 0;
            idDestination = 0;
            idSection = 0;
            idService = 0;

        $('.edit-package-detail').click(function() {
            idPackageDetail = 0;
            console.log("Entra")
            $.ajax({
                type: "GET",
                dataType: 'json',
                headers: {
                    'X-CSRF-Token': $('meta[name="csrf_token"]').attr('content')
                },
                // url: 'get_package_detail',
                url: 'get_package',
                data: {'idPackageDetail': $(this).attr("id")},
                success: function(data)
                {
                    console.log(data.package_detail);
                    $('.modal-body #title').val(data.package_detail.title);
                    $('.modal-body #subtitle').val(data.package_detail.subtitle);
                    $('.modal-body #description').val(data.package_detail.description);
                    idPackageDetail = data.package_detail.id;
                    console.log("Hola");
                },
                error: function (response) {
                    console.log("Se generó un error al obtener los detalles del paquete");
                }
            });
        });

        $('#save_package_detail').click(function() {
            var
                title               = $('.modal-body #title').val();
                subtitle            = $('.modal-body #subtitle').val();
                description         = $('.modal-body #description').val();
            $.ajax({
                type: "POST",
                headers: {
                    'X-CSRF-Token': $('meta[name="csrf_token"]').attr('content')
                },
                url: 'update_package_detail',
                data: {'idPackageDetail': idPackageDetail, 'title': title, 'subtitle': subtitle, 'description': description},
                success: function(data)
                {
                    $('#package_detail_title'+idPackageDetail).html(title);
                    $('#package_detail_subtitle'+idPackageDetail).html(subtitle);
                    $('#package_detail_description'+idPackageDetail).html(description);

                    $('#myModalPackageDetail').modal('hide');
                    idPackageDetail = 0;
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

    </script>
@endsection
