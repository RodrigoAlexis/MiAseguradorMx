<?php

namespace App\Http\Controllers;

use App\Pendiente;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class PendienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
    $this->middleware('auth');
    }
    public function index()
    {
        $notificacionesPoliza=DB::table('_cliente_poliza')->get();
        $now =  DB::select( "select date_format(curdate(),'%d-%m-%Y') as time" );
        $notificacionesCliente=DB::table('_cliente')->get();

        return view('Pendiente.index',['notificacionesCliente'=>$notificacionesCliente,
        'now'=>$now,'notificacionesPoliza'=>$notificacionesPoliza]);
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
        //
        $datosEvento=request()->except(['_token','_method']);
        Pendiente::insert($datosEvento);
        print_r($datosEvento);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Pendiente  $pendiente
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        
        $data['calendario']=Pendiente::all();
        return response()->json($data['calendario']);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Pendiente  $pendiente
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Pendiente  $pendiente
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        //
        $datosEvento=request()->except(['_token','_method']);
        $respuesta=Pendiente::where('id','=',$id)->update($datosEvento);
        return response()->json($respuesta);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pendiente  $pendiente
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $eventos=Pendiente::findOrFail($id);
        Pendiente::destroy($id);
        return response()->json($id);
    }
    public function Notifications(){ 
        
        $now =  DB::select( "select date_format(curdate(),'%d-%m-%Y') as time" );
        $clientes=DB::table('_cliente')->get();
        $tablaCliente=DB::table('cliente')->get();
        $filtros=DB::table('estatus')->where('tipo','Cliente')->get();
        return view('home',['clientes'=>$clientes,'tablaCliente'=>$tablaCliente,'filtros'=>$filtros,
        'now'=>$now]);

    }
}
