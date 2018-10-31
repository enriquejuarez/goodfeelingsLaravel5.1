@extends('auth.contenido')

@section('login')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card-group">
                <div class="card p-4">
                    <form class="form-horizontal was-validated" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}
                        <div class="card-body">
                            <h1>Acceso</h1>
                            <p class="text-muted">Control de acceso</p>
                            <div class="form-group mb-3 {{ $errors->has('usuario' ? 'is-invalid' : '') }}">
                                <div class="input-group-prepend">
                                    <span class="input-group-addon">
                                        <i class="fas fa-envelope"></i>
                                    </span>
                                </div>
                                <input type="email" value="{{ old('email') }}" name="email" id="email" class="form-control" placeholder="Email">
                                {!! $errors->first('email', '<span class="invalid-feedback">:message</span>') !!}<br>
                            </div>
                            <div class="form-group mb-4 {{ $errors->has('password' ? 'is-invalid' : '') }}">
                                    <span class="input-group-addon">
                                        <i class="fas fa-lock"></i>
                                    </span>
                                <input type="password" name="password" id="password" class="form-control" placeholder="Password">
                                {!! $errors->first('password', '<span class="invalid-feedback">:message</span>') !!}
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <button type="submit" class="btn azul px-4 text-white">Acceder</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="card text-white azul py-5 d-md-down-none" style="width:44%">
                    <div class="card-body text-center">
                        <div>
                            <h2>Sistema GoodFeelings.</h2>
                            <p>Edición de contenido del sitio web - GoodFeelings.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
