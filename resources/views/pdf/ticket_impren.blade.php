
<DOCTYPE html>

  <html>

  <head>
    <meta charset="utf-8">

    <title>Casa de Empeño Asociados Nueva Mutua-tickes.</title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300|Sonsie+One" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="{{asset('dist/css/estilosBoleta2.css')}}">
    <script type="text/javascript" src="/JavaScript.js"></script>
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Yeseva+One&display=swap" rel="stylesheet">
    <!--Boostrap-->
    <link href="{{asset('dist/fontawesome/css/all.css')}}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous"></script>

  </head>
  <style>
    .textderecha {
      text-align: right;
    }

    .textaling {
      text-align: center;
    }
    .bordeup{
      border-top: 1px solid black;
    }
    .numeros{
      font-size: 14px;
    }
    .numeros2{
      font-size: 14px;
    }
  </style>

  <body>
  @can('imprimir-ticket-desempeño')
    <table>
      <tr>
        <th class="text-center" colspan="4">
          <strong>Asociados Nueva Mutua de Umán S.A de C.V.</strong><br>
          RFC: ANM-180517PD6 <br>
          MATRIZ: CALLE 23 NO. 100-B x 19 Y 20 <br>
          Col. Centro Umán, Yucatán, <br>
          México. C.P.97390

        </th>
      </tr>
      <tr>
        <th colspan="4" class="text-center fw-bold">-------------------------------------------------------------------------</th>
      </tr>
      <tr>
        <th colspan="4" class="text-center fw-bold">COMPROBANTE DE PAGO</th>
      </tr>
      <tr>
        <td class="textderecha fw-bold borde">FECHA:&nbsp;&nbsp;</td>
        <td class="text-center borde">{{$dato_desempeño->created_at->format('d-m-Y')}}</td>
        <td class="textderecha fw-bold borde">HORA:&nbsp;&nbsp;</td>
        <td class="text-center borde">{{$dato_desempeño->created_at->format('H:m:s A')}}</td>
      </tr>
      <tr>
        <td class="textderecha fw-bold borde">CLIENTE:&nbsp;&nbsp;</td>
        <td colspan="3" class="text-center borde">{{$dato_desempeño->nombre_cliente}}</td>
      </tr>
      <tr>
        <td class="textderecha fw-bold borde">BOLETA:&nbsp;&nbsp;</td>
        <td class="text-center borde">{{$dato_desempeño->id_prendas}}</td>
        <td class="textderecha fw-bold borde">FOLIO:&nbsp;&nbsp;</td>
        <td class="text-center borde">{{$dato_desempeño->id_folio}}</td>
      </tr>
      <tr>
        <td class="textderecha fw-bold borde">PRENDA:&nbsp;&nbsp;</td>
        <td class="text-center borde" colspan="3">CANTIDAD DE PRENDAS: {{$dato_desempeño->cantidad_prenda}}, <br> {{ $dato_desempeño->caracteristicas_prenda1}}</td>
      </tr>
      <tr>
        <td class="textderecha fw-bold borde">TIPO DE&nbsp;&nbsp; MOVIMIENTO:&nbsp;&nbsp;</td>
        <td colspan="3" class="borde">&nbsp;&nbsp;DESEMPEÑO</td>
      </tr>
      <tr>
        <td class="textderecha fw-bold borde">TIPO DE&nbsp;&nbsp; INTERES:&nbsp;&nbsp;</td>
        <td colspan="3" class="borde">&nbsp;&nbsp;ACUMULATIVO</td>
      </tr>
      <tr>
        <td colspan="4">&nbsp;</td>
      </tr>
      <tr>
        <td colspan="3" class="fw-bold textderecha">PRESTAMO:&nbsp;&nbsp;</td>

        <td class="text-center numeros" >{{toMoney($dato_desempeño->prestamo_prenda_ticket)}}</td>
      </tr>
      <tr>
        <td colspan="3" class="fw-bold textderecha">INTERES COBRADO:&nbsp;&nbsp;</td>
        <td class="text-center numeros" >{{toMoney($dato_desempeño->interes_ticket)}}</td>
      </tr>
      <tr>
        <td colspan="3" class="fw-bold textderecha">COMISIÓN ALMACENAJE:&nbsp;&nbsp;</td>
        <td class="text-center numeros " >{{toMoney($dato_desempeño->almacenaje_ticket)}}</td>
      </tr>
      <tr>
        <td colspan="3" class="fw-bold textderecha">SUB TOTAL:&nbsp;&nbsp;</td>
        <td class="text-center bordeup numeros" >{{toMoney($dato_desempeño->subtotal_ticket)}}</td>
      </tr>
      <tr>
        <td colspan="3" class="fw-bold textderecha">I.V.A. 16% :&nbsp;&nbsp;</td>
        <td class="text-center numeros" >{{toMoney($dato_desempeño->iva_ticket)}}</td>
      </tr>
      <tr>
        <td colspan="3" class="fw-bold textderecha">RECARGOS:&nbsp;&nbsp;</td>
        <td class="text-center numeros" >{{toMoney($dato_desempeño->recargo_des_ticket)}}</td>
      </tr>
      <tr>
        <td colspan="3" class="fw-bold textderecha">TOTAL:&nbsp;&nbsp;</td>
        <td class="text-center bordeup numeros" >{{toMoney($dato_desempeño->total_ticket)}}</td>
      </tr>
      <tr>
        <td colspan="4">&nbsp;</td>
      </tr>
      <tr>
        <td colspan="4" class="text-center fw-bold numeros2">{{num2letras($dato_desempeño->total_ticket)}}</td>
      </tr>
      <tr>
        <td colspan="4">&nbsp;</td>
      </tr>
      <tr>
        <td colspan="3" class="fw-bold textderecha">PAGO RECIBIDO:&nbsp;&nbsp;</td>
        <td class="text-center numeros" >{{toMoney($dato_desempeño->cantidad_pago)}}</td>
      </tr>
      <tr>
        <td colspan="3" class="fw-bold textderecha">CAMBIO ENTREGADO:&nbsp;&nbsp;</td>
        <td class="text-center numeros" >{{toMoney($dato_desempeño->cambio_boleta)}}</td>
      </tr>
      <tr>
        <td colspan="4" class="text-center">-------------------------------------------------------------------------</td>
      </tr>
      <tr>
        <td colspan="4" class="fw-bold text-center">FORMAS DE PAGO</td>
      </tr>
      <tr>
        <td colspan="1" class="fw-bold text-center">EFECTIVO</td>
        <td colspan="3"></td>
      </tr>
      <tr>
        <td colspan="4" class="">&nbsp;&nbsp;&nbsp;&nbsp;**VALIDO SOLO COMO  COMPROBANTE DE PAGO.</td>
      </tr>
      <tr>
        <td colspan="4" class="">&nbsp;&nbsp;&nbsp;&nbsp;**ESTE NO ES UN COMPROBANTE FISCAL.</td>
      </tr>
      <tr>
        <td colspan="4" class="">&nbsp;&nbsp;&nbsp;&nbsp;**NOTA DE VENTA INCLUIDA EN LA FACTURA GLOBAL DEL DIA.</td>
      </tr>
      <tr>
        <td colspan="4">&nbsp;</td>
      </tr>
      <tr>
        <td colspan="4">&nbsp;</td>
      </tr>
      <tr>
        <td colspan="4">&nbsp;</td>
      </tr>
      <tr>
        <td colspan="4" class="text-center">__________________________________________</td>
      </tr>
      <tr>
        <td colspan="4" class="text-center">FIRMA TITULAR</td>
      </tr>
      <tr>
        <td colspan="4">&nbsp;</td>
      </tr>
      <tr>
        <td colspan="4">&nbsp;</td>
      </tr>
      <tr>
        <td colspan="4" class="text-end">
          User: {{ Auth::user()->email }}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        </td>
      </tr>
      <tr>
        <td colspan="4">&nbsp;</td>
      </tr>
    </table> 
    @else
        <div class="h3 text-center fw-bold mt-8">No tienes los permisos para ver este modulo <br> Comunicate con tu superior...</div> 
    @endcan
  </body>

  </html>
