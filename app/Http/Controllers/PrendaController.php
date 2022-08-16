<?php

namespace App\Http\Controllers;

//SECCION DONDE IMPORTAMOS LAS CLASES QUE NECESITAMOS//PARA RECIBIR PARAMETROS
use Illuminate\Http\Request; //PARA RECIBIR PARAMETROS
//use Validator; //VALIDAR LO QUE MANDA LOS USUARIOS 
use App\Models\Prenda; // PARA USAR LA TABLA CLIENTES
use Illuminate\Support\Facades\View; // PARA USAR LAS VISTAS
use Illuminate\Support\Facades\DB;
use App\Models\Cliente;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\Eloquent\Collection;
use Symfony\Component\Console\Input\Input;

class PrendaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = trim($request->get('search'));
        $prenda1 = DB::table('Prendas')
            ->select(
                'id_cliente',
                'nombre_prenda',
                'id_prendas',
                'kilataje_prenda',
                'gramaje_prenda',
                'caracteristicas_prenda',
                'avaluo_prenda',
                'porcentaje_prestamo_sobre_avaluo',
                'prestamo_prenda'
            )
            ->where('id_prendas', 'LIKE', '%' . $search . '%')
            ->orWhere('nombre_prenda', 'LIKE', '%' . $search . '%')
            ->paginate(5);
        return view('admin.ListadoBoletaPagar', compact('prenda1'));
    }

    public function PrendaPagar(Request $request)
    {
        $search = trim($request->get('search'));
        $prendaPagarr = Prenda::orderBy('id_prendas', 'desc')
            ->select(
                'id_cliente',
                'nombre_prenda',
                'id_prendas',
                'kilataje_prenda',
                'gramaje_prenda',
                'caracteristicas_prenda',
                'avaluo_prenda',
                'porcentaje_prestamo_sobre_avaluo',
                'prestamo_prenda'
            )
            ->where('id_prendas', 'LIKE', '%' . $search . '%')
            ->orWhereHas('cliente', function ($query) use ($request) {
                $query->where('nombre_cliente', 'LIKE', "%{$request->search}%");
            })
            ->orWhereHas('cliente', function ($query) use ($request) {
                $query->where('apellido_cliente', 'LIKE', "%{$request->search}%");
            })
            ->orWhere('prestamo_prenda', 'LIKE', '%' . $search . '%')
            ->paginate(5);
        return view('admin.Pagar', compact('prendaPagarr'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        /* //select en pagar
        $buscar = Prenda::all();
        return view('admin.Pagar', compact('buscar')); */
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
            "nombre_prenda" => "bail|required|min:3",
            "descripcion_generica" => "bail|required",
            "cantidad_prenda" => 'bail|required',
            "kilataje_prenda" => "bail|required",
            "gramaje_prenda" => 'bail|required',
            "caracteristicas_prenda" => 'bail|required',
            "avaluo_prenda" => "bail|required",
            "porcentaje_prestamo_sobre_avaluo" => 'bail|required',
            "prestamo_prenda" => 'bail|required',
        ];

        $mensajes = [
            "nombre_prenda.required" => "No ingreso el nombre de la pieza a refrendar",
            "nombre_prenda.min" => "Los caracteres mínimos para la pieza a refrendar deben ser :min",
            "descripcion_generica.required" => "No ingreso la descripcion de la pieza a refrendar",
            "cantidad_prenda.required" => "No ingreso la cantidad de la pieza a refrendar",
            "kilataje_prenda.required" => "No ingreso el kilataje de la pieza a refrendar",
            "gramaje_prenda.required" => "No ingreso el gramaje de la pieza a refrendar",
            "caracteristicas_prenda.required" => "No ingreso las caracteristicas de la pieza a refrendar",
            "avaluo_prenda.required" => "No ha ingresado el avaluo",
            "porcentaje_prestamo_sobre_avaluo.required" => "No ha seleccionado el porfentaje del avaluo",
            "prestamo_prenda.required" => "No ha seleccionado el prestamo de preda. ",

        ];
        $validator = Validator::make(
            $request->all(),
            $reglas,
            $mensajes
        );

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }



        //dd($request->all());
        $prenda = Prenda::make($request->all());
        $prenda->save();


        return redirect()->route('listado_prenda');
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
        $prenda = Prenda::find($id);

        return View::make('admin.EditarPrenda')->with(
            [
                "dato_prenda" => $prenda

            ]
        );
    }

    public function editPago($id)
    {
        $prenda = Prenda::find($id);

        return View::make('admin.DesempeñoDato')->with(
            [
                "dato_prenda" => $prenda

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
        $prenda = Prenda::find($id);

        $reglas = [
            "nombre_prenda" => "bail|required|min:3",
            "descripcion_generica" => "bail|required",
            "kilataje_prenda" => "bail|required",
            "gramaje_prenda" => 'bail|required',
            "caracteristicas_prenda" => 'bail|required',
            "avaluo_prenda" => "bail|required",
            "porcentaje_prestamo_sobre_avaluo" => 'bail|required',
            "prestamo_prenda" => 'bail|required',
        ];

        $mensajes = [

            "nombre_prenda.required" => "No ingreso el nombre de la pieza a refrendar",
            "nombre_prenda.min" => "Los caracteres mínimos para la pieza a refrendar deben ser :min",
            "descripcion_generica.required" => "No ingreso la descripcion de la pieza a refrendar",
            "kilataje_prenda.required" => "No ingreso el kilataje de la pieza a refrendar",
            "gramaje_prenda.required" => "No ingreso el gramaje de la pieza a refrendar",
            "caracteristicas_prenda.required" => "No ingreso las caracteristicas de la pieza a refrendar",
            "avaluo_prenda.required" => "No ha ingresado el avaluo",
            "porcentaje_prestamo_sobre_avaluo.required" => "No ha seleccionado el porfentaje del avaluo",
            "prestamo_prenda.required" => "No ha seleccionado el prestamo de preda. ",

        ];
        $validator = Validator::make(
            $request->all(),
            $reglas,
            $mensajes
        );

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }


        $prenda->fill($request->all());
        $prenda->save();


        return redirect()->route('listado_prenda', []);
    }



    public function updatePago(Request $request, $id)
    {
        $prenda = Prenda::find($id);

        $reglas = [
            "cantidad_pago" => 'bail|required',
        ];

        $mensajes = [

            "cantidad_pago.required" => "NO SE INGRESO EL MONTO A PAGAR, FAVOR DE VERIFICAR LOS DATOS CORRECTAMENTE!!",


        ];
        $validator = Validator::make(
            $request->all(),
            $reglas,
            $mensajes
        );

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }


        $prenda->fill($request->all());
        $prenda->save();


        return redirect()->route('Pagar', []);
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

    public function buscarPrenda(Request $request)
    {
        

        $prendas = Prenda::where(  
            'nombre_prenda', 'LIKE', "%".$request->nombre_prenda."%"
        )
        ->get();


        return response()->json([
            'data' => $prendas
        ]);


    }

}
