<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>CASA DE EMPEÑOS</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Yeseva+One&display=swap" rel="stylesheet">
    <!-- Styles -->
    <link href="{{ asset('dist/css/bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('dist/css/estilos.css') }}" rel="stylesheet">
    <style>
        /*! normalize.css v8.0.1 | MIT License | github.com/necolas/normalize.css
            
            */
    </style>

    <style>
        body {
            font-family: 'Nunito', sans-serif;
        }
    </style>

</head>

<body class="antialiased ">
    <div
        class="relative sinborde items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">

        <!-- encabezado -->
        <div class="size">
            <div class="navbar1 flex size">
                <div class="max-w-6xl mx-auto mr-2">
                    <img class="icono" src="{{ asset('img/logo.png') }}" width="450px" height="450px">
                </div>
                <div class="mx-auto ml-2 titulo  texto-grande size"> CASA DE EMPEÑOS <br> ASOCIACION NUEVA MUTUA UMAN
                    S.A. DE C.V.</a></div>

            </div>
            <!-- MENU -->
            @include('layout.nav')

            <section class="section">
                <div class="section-header">
                    <h3 class="page__heading">Usuarios</h3>
                </div>
                <div class="section-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-body">
                                    <a class="btn btn-warning" href="{{ route('usuarios.create') }}">Nuevo</a>

                                    <table class="table table-sm table-striped mt-2">
                                        <thead style="background-color:#6777ef">
                                            <th style="display: none;">ID</th>
                                            <th style="color:#fff;">Nombre</th>
                                            <th style="color:#fff;">E-mail</th>
                                            <th style="color:#fff;">Rol</th>
                                            <th style="color:#fff;">Acciones</th>
                                        </thead>
                                        <tbody>
                                            @foreach ($usuarios as $usuario)
                                                <tr>
                                                    <td style="display: none;">{{ $usuario->id }}</td>
                                                    <td>{{ $usuario->name }}</td>
                                                    <td>{{ $usuario->email }}</td>
                                                    <td>
                                                        @if (!empty($usuario->getRoleNames()))
                                                            @foreach ($usuario->getRoleNames() as $rolNombre)
                                                                <h5><span
                                                                        class="badge badge-dark">{{ $rolNombre }}</span>
                                                                </h5>
                                                            @endforeach
                                                        @endif
                                                    </td>

                                                    <td>
                                                        <a class="btn btn-info"
                                                            href="{{ route('usuarios.edit', $usuario->id) }}">Editar</a>


                                                        <form style="display:inline" method='POST'
                                                            action="{{ route('usuarios.destroy', $usuario->id) }}">
                                                            {{ csrf_field() }}
                                                            {{ method_field('DELETE') }}
                                                            <button type="submit"
                                                                class="btn btn-danger">Borrar</button>
                                                        </form>
                                                        {{--   {!! Form::open(['method' => 'DELETE','route' => ['usuarios.destroy', $usuario->id],'style'=>'display:inline']) !!}
                                                            {!! Form::submit('Borrar', ['class' => 'btn btn-danger']) !!}
                                                        {!! Form::close() !!} --}}
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>

                                    <div class="pagination justify-content-end">
                                        {!! $usuarios->links() !!}
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
</body>

<script src="{{ asset('dist/js/bootstrap.js') }}"></script>


</html>
