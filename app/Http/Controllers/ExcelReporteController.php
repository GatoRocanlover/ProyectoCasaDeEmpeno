<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente; // PARA USAR LA TABLA CLIENTES
use App\Models\desempeños;// PARA USAR LA TABLA DESEMPEÑOS
use App\Models\TicketsDesempeño;
use App\Models\Prenda;




class ExcelReporteController extends Controller
{
    public function export(){
        

      
       //Nombre del archivo que generaremos
       $fileName = 'ReporteClientes.csv';
       //Arreglo que contendrá las filas de datos
       $arrayDetalle = Array();

       //Estos son los datos que recibimos del modelo que queremos leer, aquí ustedes cámbienlo por el modelo que necesiten
       $items=Cliente::all();

       //El encabezado que le dice al explorador el tipo de archivo que estamos generando
       $headers = array(
                   "Content-type"        => "text/csv",
                   "Content-Disposition" => "attachment; filename=$fileName",
                   "Pragma"              => "no-cache",
                   "Cache-Control"       => "must-revalidate, post-check=0, pre-check=0",
                   "Expires"             => "0"

                   );

       $columns = array(
            'No.',
            'Nombre',
            'Direccion',
            'Telefono',
            'Es socio',
            'NumSocio');

       foreach ($items as $item){

        $Tipo_socio = $item->socio;
        $esSocio = "SI";
        if ($Tipo_socio == "0.20") {
            $esSocio = "SI";
        } elseif ($Tipo_socio == ".25") {
            $esSocio ="NO";
        } 



           $arrayDetalle[] = array(
                            'No.' => $item->id_cliente,
                            'Nombre' => $item->nombre_cliente ." " . $item->apellido_cliente,
                            'Direccion' => " C: " .$item->calle_cliente." N. " . $item->numero_cliente." X " . $item->cruzamientos_cliente." " . $item->colonia_cliente,
                            'Telefono' => $item->telefono_cliente,
                            'Es socio'  => $esSocio,                                       
                            'NumSocio'  => $item->numero_socio
                               );
       }

       $callback = function() use($arrayDetalle, $columns) {
           $file = fopen('php://output', 'w');
           //si no quieren que el csv muestre el titulo de columnas omitan la siguiente línea.
           fputcsv($file, $columns);
                 foreach ($arrayDetalle as $item) {
                     fputcsv($file, $item);
                 }
                 fclose($file);
             };
     
       //Esto hace que Laravel exponga el archivo como descarga
       return response()->stream($callback, 200, $headers);
    }

    
    public function exportDesempeños()
    {

        //Nombre del archivo que generaremos
        $fileName = 'ReporteDesempeños.csv';
        //Arreglo que contendrá las filas de datos
        $arrayDetalle = Array();
 
        //Estos son los datos que recibimos del modelo que queremos leer, aquí ustedes cámbienlo por el modelo que necesiten
        $items=TicketsDesempeño::all();
 
        //El encabezado que le dice al explorador el tipo de archivo que estamos generando
        $headers = array(
                    "Content-type"        => "text/csv",
                    "Content-Disposition" => "attachment; filename=$fileName",
                    "Pragma"              => "no-cache",
                    "Cache-Control"       => "must-revalidate, post-check=0, pre-check=0",
                    "Expires"             => "0"
 
                    );
 
        $columns = array(
             'Fecha',
             'Folio',
             'id_prendas',
             'prestamo_prenda',
             'interes',
             'almacenaje',
             'subtotal',
             'iva',
             'total',
             'totalinteres');

 
        foreach ($items as $item){

            for (int x = 0; x < matriz[$arrayDetalle].length; x++) {
                int suma = 0;
                for (int y = 0; y < matriz.length; y++) {
                    suma += matriz[y][x];
                }
                System.out.printf("%d ", suma);
            }
            

            $arrayDetalle[] = array(
                             'created_at' => $item->created_at->format('d-m-Y'),
                             'Folio' => $item->id_folio,
                             'id_prendas' => $item->id_prendas,
                             'prestamo_prenda' =>toMoney($item->prestamo_prenda_ticket),
                             'interes'=>toMoney($item->interes_ticket),
                             'almacenaje' => toMoney($item->almacenaje_ticket),
                             'subtotal'  => toMoney($item->subtotal_ticket),
                             'iva'  => toMoney($item->iva_ticket),                                       
                             'total'  =>toMoney($item->total_ticket),
                             'totalinteres'=>toMoney($total_intereses)
                                );
                                
        }

    
        $callback = function() use($arrayDetalle, $columns) {
            $file = fopen('php://output', 'w');
            //si no quieren que el csv muestre el titulo de columnas omitan la siguiente línea.
            fputcsv($file, $columns);
                  foreach ($arrayDetalle as $item) {
                      fputcsv($file, $item);
                  }
                  fclose($file);
              };
      
        //Esto hace que Laravel exponga el archivo como descarga
        return response()->stream($callback, 200, $headers);
     }

     public function exportRefrendos()
    {

        //Nombre del archivo que generaremos
        $fileName = 'ReporteRefrendos.csv';
        //Arreglo que contendrá las filas de datos
        $arrayDetalle = Array();
 
        //Estos son los datos que recibimos del modelo que queremos leer, aquí ustedes cámbienlo por el modelo que necesiten
        $items=PrendaController::all();
 
        //El encabezado que le dice al explorador el tipo de archivo que estamos generando
        $headers = array(
                    "Content-type"        => "text/csv",
                    "Content-Disposition" => "attachment; filename=$fileName",
                    "Pragma"              => "no-cache",
                    "Cache-Control"       => "must-revalidate, post-check=0, pre-check=0",
                    "Expires"             => "0"
 
                    );
 
        $columns = array(
             'Fecha',
             'Folio',
             'id_prendas',
             'prestamo_prenda',
             'interes',
             'almacenaje',
             'subtotal',
             'iva',
             'total',
             'totalinteres');

 
        foreach ($items as $item){

            for (int x = 0; x < matriz[$arrayDetalle].length; x++) {

                int suma = 0;
                for (int y = 0; y < matriz.length; y++) {
                    suma += matriz[y][x];
                }
                System.out.printf("%d ", suma);
            }
            

            $arrayDetalle[] = array(
                             'created_at' => $item->created_at->format('d-m-Y'),
                             'Folio' => $item->id_folio,
                             'id_prendas' => $item->id_prendas,
                             'prestamo_prenda' =>toMoney($item->prestamo_prenda_ticket),
                             'interes'=>toMoney($item->interes_ticket),
                             'almacenaje' => toMoney($item->almacenaje_ticket),
                             'subtotal'  => toMoney($item->subtotal_ticket),
                             'iva'  => toMoney($item->iva_ticket),                                       
                             'total'  =>toMoney($item->total_ticket),
                             'totalinteres'=>toMoney($total_intereses)
                                );
                                
        }

    
        $callback = function() use($arrayDetalle, $columns) {
            $file = fopen('php://output', 'w');
            //si no quieren que el csv muestre el titulo de columnas omitan la siguiente línea.
            fputcsv($file, $columns);
                  foreach ($arrayDetalle as $item) {
                      fputcsv($file, $item);
                  }
                  fclose($file);
              };
      
        //Esto hace que Laravel exponga el archivo como descarga
        return response()->stream($callback, 200, $headers);
     }
}
