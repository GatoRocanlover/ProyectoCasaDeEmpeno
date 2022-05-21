<?php

namespace App\Http\Controllers;

//SECCION DONDE IMPORTAMOS LAS CLASES QUE NECESITAMOS
use Illuminate\Http\Request; //PARA RECIBIR PARAMETROS
use Validator; //VALIDAR LO QUE MANDA LOS USUARIOS
use App\Models\Cliente; // PARA USAR LA TABLA CLIENTES
use Illuminate\Support\Facades\View; // PARA USAR LAS VISTAS

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      
        $reglas = [
            "nombre_cliente"=>"bail|required|min:3",
            "apellido_cliente" => "bail|required",
            "tipo_de_identificacion" => 'bail|required',
            "numero_de_identificacion" => "bail|required",
            "correo_electronico_cliente" => 'bail|nullable',
            "telefono_cliente" => 'bail|nullable',
            "socio" => "bail|required",
            "numero_socio" => "bail|required_if:socio,1",
            "calle_cliente" => 'bail|required',
            "numero_cliente" => 'bail|nullable',
            "cruzamientos_cliente" => 'bail|nullable',
            "colonia_cliente" => "bail|required",
            "ciudad_cliente" => "bail|required",
            "codigo_postal_cliente" => "bail|required",
            "nombre_cotitular" => 'bail|nullable',
            "apellido_cotitular" => 'bail|nullable',
            "telefono_cotitular" => 'bail|nullable',
            "calle_cotitular" => 'bail|nullable',
            "numero_cotitular" => 'bail|nullable',
            "cruzamientos_cotitular" => 'bail|nullable',
            "colonia_cotitular" => 'bail|nullable',
            "ciudad_cotitular" => 'bail|nullable',
            "codigo_postal_cotitular" => 'bail|nullable',
            "nombre_beneficiario" => 'bail|nullable',
            "apellido_beneficiario" => 'bail|nullable',
            ];
 
         $mensajes = [
            "nombre_cliente.required" => "No ingreso el nombre del cliente",
            "nombre_cliente.min" => "Los caracteres mínimos para el cliente deben ser :min",
            "tipo_de_identificacion" => "No ha seleccionado el tipo de identificacion", 
            "numero_de_identificacion" => "No ingreso el número de identificación.", 
            "socio.required" => "No ha seleccionado si es socio", 
            "numero_socio.required" => "No ingreso el número de socio",
            "calle_cliente.required" => "No ingreso el número de calle del cliente",                  
            "colonia_cliente.required" => "No ha ingresado la colonia del cliente", 
            "ciudad_cliente.required" => "No ha ingresado la ciudad del cliente",
            "codigo_postal_cliente.required" => "No ha ingresado el codigo postal del cliente. ",                  
            
            
         ];
         $validator = Validator::make($request->all(), 
         $reglas, $mensajes 
         
        );
 
     if ($validator->fails()) {
         return redirect()->back()
                     ->withErrors($validator)
                 ->withInput();
     }
 
 
     $nombre_cliente = Cliente::make($request->all());
     $nombre_cliente->save();
 
 
     return redirect()->route('listado_cliente', []);
 
 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cliente = Cliente::find($id);

        return View::make('admin.EditarCliente')->with(
            [
                "dato_cliente" => $cliente
            
            ]
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
