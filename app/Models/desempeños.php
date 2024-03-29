<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class desempeños extends Model
{
    use HasFactory;
    protected $table ='desempeños';
    protected $primaryKey ='id_prendas';
    protected $fillable =[
        'id_cliente',
        'folio_cotizacion',
        'nombre_prenda',
        'cantidad_prenda',
        'descripcion_generica',
        'kilataje_prenda',
        'gramaje_prenda',
        'caracteristicas_prenda',
        'avaluo_prenda',
        'porcentaje_prestamo_sobre_avaluo',
        'prestamo_inicial',
        'prestamo_prenda',
        'fecha_prestamo',
        'fecha_comercializacion',
        'mes1',
        'interes',
        'almacenaje',
        'iva',
        'refrendo',
        'desempeño',
        'subtotal',
        'mes2',
        'interes2',
        'almacenaje2',
        'iva2',
        'refrendo2',
        'desempeño2',
        'subtotal2',
        'mes3',
        'interes3',
        'almacenaje3',
        'iva3',
        'refrendo3',
        'desempeño3',
        'subtotal3',
        'mes4',
        'interes4',
        'almacenaje4',
        'iva4',
        'refrendo4',
        'desempeño4',
        'subtotal4',
        'mes5',
        'interes5',
        'almacenaje5',
        'iva5',
        'refrendo5',
        'desempeño5',
        'subtotal5',
        'importe_anterior',
        'interes_anterior',
        'almacenaje_anterior',
        'iva_anterior',
        'refrendo_anterior',
        'importe_actual',
        'numeros_refrendos',
        'folio_refrendo',
        'abono_capital',
        'cantidad_pago1',
        'cambio_boleta1',
        'sub_refrendo',
        'recargo_des',
        'total',
        'hora_refrendo', 
        'fecha_refrendo', 
        'mes2_refrendo', 
        'folio_capi',
        'abono_capital_capi',
        'interes_anterior_capi',
        'almacenaje_anterior_capi',
        'sub_capital',
        'iva_anterior_capi',
        'total_capi',
        'cantidad_pago_capi',
        'cambio_boleta_capi',
        'importe_anterior_capi',
        'importe_actual_capi',  
        'recargo_des_capi',
        'numeros_capital', 
        'hora_capital',
        'fecha_capital',
        'status',    
    ];



     public function cliente(){
        return $this->belongsTo(cliente::class, 'id_cliente', 'id_cliente');
     }
}
