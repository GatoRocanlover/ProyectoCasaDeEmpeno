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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.33.1/sweetalert2.css">
    <!-- Styles -->
    <link href="{{asset('dist/css/bootstrap.css')}}" rel="stylesheet">
    <link href="{{asset('dist/css/estilos.css')}}" rel="stylesheet">
    <style>
        /*! normalize.css v8.0.1 | MIT License | github.com/necolas/normalize.css */
    </style>

</head>

<body class="antialiased ">
    <div class="relative sinborde items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">

        <!-- encabezado -->
        <div class="size">
            <div class="navbar1 flex size">
                <div class="max-w-6xl mx-auto mr-2">
                    <a href="{{ route('inicio_admin') }}"><img class="icono" src="{{ asset('img/logo.png') }}"></a>
                </div>
                <div class="mx-auto ml-2 titulo  texto-grande size"> CASA DE EMPEÑOS <br> ASOCIADOS NUEVA MUTUA DE UMÁN S.A. DE C.V.</a>
                </div>

            </div>
            <!-- MENU -->
            @include('layout.nav')

            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            <br>
            <br>
            @can('crear-cotizacion')
            <div class="row g-3 mx-auto items-center justify-center needs-validation size100">
                <label for="validationCustom03" class="form-label  text-center h3 fw-bold">COTIZACIÓN PRENDA</label>
            </div>

            <div class="mt-8  max-w-6xl mx-auto items-center justify-center flex negritas  texto size50 fondoformulario">

                <form action="{{Route('cotizacionprenda.store')}}" method="POST" onsubmit="return enviar()" name="registroCotizacion" class="row g-3 needs-validation size100 items-center justify-center" novalidate>

                    @csrf
                    <label for="validationCustom03" class="form-label text-center mt-8">DATOS DE LA PRENDA: </label>

                    <div class="col-md-8">
                        <label for="nombre_prenda" class="form-label">NOMBRE DE PRENDA:</label>
                            <input type="text" name="nombre_prenda" class="form-control" id="nombre_prenda" value="" placeholder="Nombre de la prenda que desea regristrar" required>
                            <div class="valid-feedback">
                                Requiere un nombre como minimo!
                            </div>
                    </div>
                    <div class="col-md-8">
                        <label for="caracteristicas_prenda" class="form-label">CARACTERISTICAS:</label>
                        <textarea name="caracteristicas_prenda" class="form-control " id="caracteristicas_prenda" value="" placeholder="Ingrese las caracteristicas de la prenda" requiredrows="3" required></textarea>
                        <div class="valid-feedback">
                            Se requiere registrar una caracteristica!
                        </div>
                    </div>
                    <div class="col-md-8">
                        <label for="validationCustomUsername" class="form-label">DESCRIPCIÓN GENERICA:</label>
                        <select class="form-select" aria-label="Default select example" name="descripcion_generica" id="descripcion_generica" required>
                            <option selected disabled value="">SELECCIONE LA DESCRIPCIÓN GENERICA DE LA PRENDA</option>
                            <option value="ORO">ORO</option>
                            <option value="PLATA" disabled>PLATA</option>
                        </select>
                        <div class="valid-feedback">
                            Seleccione la descripción generica de la prenda!
                        </div>
                    </div>
                    <div class="col-md-8">
                        <label for="cantidad_prenda" class="form-label">CANTIDAD DE PRENDAS:</label>
                        <input type="text" name="cantidad_prenda" class="form-control" id="cantidad_prenda" value="" placeholder="Ingrese las unidades cotizadas" required>
                        <div class="valid-feedback">
                            Ingrese la cantidad de prendas recibidas!
                        </div>
                    </div>
                    <div class="col-md-8 mt-7">
                        <label for="cantidad_prenda" class="form-label">DATOS DE LA MAQUINA:</label>
                        <input type="text" oninput="cal()" name="dato_1" class="monto form-control" id="dato_1" value="" placeholder="Ingrese el dato #1" required>
                        <input type="text" oninput="cal()" name="dato_2" class="monto form-control" id="dato_2" value="" placeholder="Ingrese el dato #2" required>
                        <input type="text" oninput="cal()" name="dato_3" class="monto form-control" id="dato_3" value="" placeholder="Ingrese el dato #3" required>
                        <input type="text" oninput="cal()" name="dato_4" class=" monto form-control" id="dato_4" value="" placeholder="Ingrese el dato #4" required>

                    </div>
                    <div class="col-md-8">
                        <label for="kilataje_prenda" class="form-label">PROMEDIO:</label>
                        <div class="input-group has-validation">
                            <input type="text" name="promedio_prenda" class="form-control" id="promedio_prenda" value="" placeholder="Kilataje de la prenda" readonly>
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <label for="kilataje_prenda" class="form-label">KILATAJE:</label>
                        <div class="input-group has-validation">
                            <input type="text" name="kilataje_prenda" class="form-control" id="kilataje_prenda" value="" placeholder="Kilataje de la prenda" readonly>
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <label for="cantidad_prenda" class="form-label">VALOR GENERICO:</label>
                        <input type="text" name="valor_oro_plata" onkeyUp="calcular1();" class="form-control" id="valor_oro_plata" value="" placeholder="Valor del Oro / Plata" required>
                        <div class="valid-feedback">
                        Ingrese el precio del Oro o Plata!
                        </div>
                    </div>
                    <div class="col-md-8">
                        <label for="gramaje_prenda" class="form-label">GRAMAJE (PESO):</label>
                        <div class="input-group has-validation">
                            <input type="text" name="gramaje_prenda" onkeyUp="calcular1();" class="form-control" id="gramaje_prenda" value="" placeholder="Peso de la prenda" required>
                            <div class="valid-feedback">
                                Ingrese el peso de la prenda!
                            </div>
                        </div>
                    </div>

                    <div class="col-md-8">
                        <label for="avaluo_prenda" class="form-label">PRECIO DE AVALUO:</label>
                        <input type="text" name="avaluo_prenda" onkeyUp="calcular();" class="form-control" id="avaluo_prenda" value="" readonly>
                        <div class="valid-feedback">
                            Looks good!
                        </div>
                    </div>
                    <div class="col-md-8">PORCENTAJE DE PRESTAMO SOBRE AVALUO:</label>
                        <select name="porcentaje_prestamo_sobre_avaluo" class="form-select" onchange="calcular();" aria-label="Default select example" id="porcentaje_prestamo_sobre_avaluo" required>
                            <option selected disabled value="">SELECCIONE EL PORCENTAJE DE AVALUO</option>
                            <option value="45">45 %</option>
                            <option value="50">50 %</option>
                            <option value="55">55 %</option>
                            <option value="60">60 %</option>
                            <option value="65">65 %</option>
                            <option value="70">70 %</option>
                            <option value="75">75 %</option>
                            <option value="80">80 %</option>
                            <option value="85">85 %</option>
                            <option value="90">90 %</option>
                            <option value="95">95 %</option>
                            <option value="100">100 %</option>
                        </select>
                        <div class="valid-feedback">
                            Seleccione el porcentaje sobre el avaluo!
                        </div>
                    </div>
                    <div class="col-md-8">
                        <label for="prestamo_prenda" class="form-label">PRESTAMO:</label>
                        <input type="text" name="prestamo_prenda" class="form-control" id="prestamo_prenda" value="" readonly>
                        <div class="valid-feedback">
                            Looks good!
                        </div>
                    </div>

                    <div class=" mb-8 max-w-6xl mx-auto flex items-center justify-center mt-4">
                        <button class="size50 bordes btn btn-primary navbar1 fw-bold">DAR DE ALTA</button>
                    </div>

                </form>
            </div>
        </div>
        @else
    <div class="h3 text-center fw-bold mt-8">No tienes los permisos para ver este modulo <br> Comunicate con tu superior...</div> 
@endcan
</body>

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>
<script src="{{asset('dist/js/bootstrap.js')}}"></script>
<script src="{{asset('dist/js/jquery.min.js')}}"></script>
<script src="{{asset('dist/js/CotizacionPrenda.js')}}"></script>

</html>