<div class="modal fade" id="exampleModal{{$dato_prenda->id_prendas}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header" style="background-color: black !important;">
        <h6 class="modal-title" style="color: #fff; text-align: center;">
          CONFIRMAR DATOS DE PAGO:
        </h6>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <form method="POST" action="{{Route('Tickets.store')}}" onsubmit="return enviar()" name="formulario_pago">
        @csrf

        <div class="modal-body caja2" id="cont_modal">

          <div class="d-flex  justify-content-around">
            <div class="col-md-4">
              <label for="nombre_prenda" class="form-label"> <strong>FOLIO:&nbsp;</strong>{{$dato_prenda->id_prendas}} </label>
              <input type="hidden" name="id_prendas" class="form-control text-center" id="id_prenda" value="{{$dato_prenda->id_prendas}}" readonly>
            </div>
            <div class="col-md-4">
              <div class="d-flex">
                <label for="" class="sub "><strong>SOCIO: </strong>@if($dato_prenda->cliente->socio == 0.020)
                  SI
                  @else
                  @endif
                  @if($dato_prenda->cliente->socio == 0.025)
                  NO
                  @else
                  @endif</label>
                <input type="hidden" name="promedio_socio" class="form-control text-center" id="promedio_socio" value="{{$dato_prenda->cliente->socio}}" readonly>
              </div>
            </div>

          </div>
        </div>
        <div class=" caja">
          <div class="col-md-12 ">
            <label for="nombre_cliente" class="form-label"> <strong>CLIENTE: &nbsp;</strong> {{$dato_prenda->cliente->nombre_cliente.' '.$dato_prenda->cliente->apellido_cliente}} </label>
            <input type="hidden" name="nombre_cliente" class="form-control letranom" id="nombre_cliente" value="{{$dato_prenda->cliente->nombre_cliente.' '.$dato_prenda->cliente->apellido_cliente}}" readonly>
          </div>
          <div class="">
            <label for="nombre_prenda" class="form-label"> <strong>NOMBRE DE LA PRENDA: &nbsp;</strong> {{$dato_prenda->nombre_prenda}} </label>
            <input type="hidden" name="nombre_prenda" class="form-control" id="nombre_prenda" value="{{$dato_prenda->nombre_prenda}}" readonly>
          </div>
          <div class="">
            <label for="cantidad_prenda" class="form-label"><strong>CANTIDAD DE PRENDAS: &nbsp;</strong>{{$dato_prenda->cantidad_prenda}}</label>
            <input type="hidden" name="cantidad_prenda" class="form-control text-center" id="cantidad_prenda" value="{{$dato_prenda->cantidad_prenda}}" readonly>
          </div>
          <div class="">
            <label for="" class="sub "><strong>DESCRIPCION GENERICA: </strong>@if($dato_prenda->descripcion_generica == 1)
              ORO
              @else
              @endif
              @if($dato_prenda->descripcion_generica == 2)
              PLATA
              @else
              @endif</label>
            <input type="hidden" name="descripcion_generica" class="form-control text-center" id="descripcion_generica" value="{{$dato_prenda->descripcion_generica}}" readonly>
          </div>
          <div class="mt-1">
            <label for="caracteristicas_prenda" class="form-label"><strong>CARACTERISTICAS: &nbsp;</strong>{{$dato_prenda->caracteristicas_prenda.'.'.' '.'DETALLES ESPECIFICOS:'.' KILATAJE:'.''.' '.$dato_prenda->kilataje_prenda.'k'.','.' '.'GRAMAJE:'.''.' '.$dato_prenda->gramaje_prenda.'gr'}}</label>
            <input type="hidden" name="caracteristicas_prenda" class="form-control text-center" id="caracteristicas_prenda" value="{{$dato_prenda->caracteristicas_prenda.'.'.' '.'DETALLES ESPECIFICOS:'.' KILATAJE:'.''.' '.$dato_prenda->kilataje_prenda.'k'.','.' '.'GRAMAJE:'.''.' '.$dato_prenda->gramaje_prenda.'gr'}}" readonly>
          </div>
          <div class="">
            <label for="avaluo_prenda" class="form-label"><strong>AVALUO: &nbsp;</strong>{{$dato_prenda->avaluo_prenda}}</label>
            <input type="hidden" name="avaluo_prenda" class="form-control text-center" id="avaluo_prenda" value="{{$dato_prenda->avaluo_prenda}}" readonly>
          </div>
          <div class=" mt-3">
            <label for="prestamo_prenda" class="form-label negritas">PRESTAMO:</label>
            <input type="text" class="form-control text-center tamañoletra negritas" name="prestamo_prenda" id="prestamo_prenda" value="{{$dato_prenda->prestamo_prenda}}" readonly>
          </div>
          <div class=" mt-3">
            <label for="" class="negritas">CANTIDAD PAGADA:</label>
            <input type="number" id="cantidad_pago" name="cantidad_pago" class="form-control input_style text-center tamañoletra" readonly>
          </div>
          <div class=" mt-3">
            <label for="" class="negritas">CAMBIO:</label>
            <input type="text" id="cambio_boleta" name="cambio_boleta" class="form-control input_style text-center letracambio" readonly>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
          <button type="submit" class="btn btn-primary btnpago">PAGAR</button>
        </div>
      </form>

    </div>
  </div>
</div>