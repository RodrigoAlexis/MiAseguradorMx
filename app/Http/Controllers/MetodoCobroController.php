<?php

namespace App\Http\Controllers;

use App\Metodo_cobro;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MetodoCobroController extends Controller
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
        $datos = DB::table('metodo_cobro')->get();

        return view('Metodo_cobro.index', ['datos' => $datos,'notificacionesCliente'=>$notificacionesCliente,'now'=>$now,'notificacionesPoliza'=>$notificacionesPoliza]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $notificacionesPoliza=DB::table('_cliente_poliza')->get();
        $now =  DB::select( "select date_format(curdate(),'%d-%m-%Y') as time" );
        $notificacionesCliente=DB::table('_cliente')->get();
        return view ('Metodo_cobro.create',['notificacionesCliente'=>$notificacionesCliente,'now'=>$now,'notificacionesPoliza'=>$notificacionesPoliza]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $campos = [
            'nombre' => 'required|string|max:50'
        ];

        $Mensaje=[
            "nombre.required"=>'Agrega el nombre del método de cobro'
        ];

        $this->validate($request, $campos, $Mensaje);

        $datos=request();

        DB::table('metodo_cobro')->insert(
            ['nombre' => $datos->nombre]
        );
        return redirect('/metodo_cobro');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Metodo_cobro  $metodo_cobro
     * @return \Illuminate\Http\Response
     */
    public function show(Metodo_cobro $metodo_cobro)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Metodo_cobro  $metodo_cobro
     * @return \Illuminate\Http\Response
     */
    public function edit($idMcobro)
    {
        $notificacionesPoliza=DB::table('_cliente_poliza')->get();
        $now =  DB::select( "select date_format(curdate(),'%d-%m-%Y') as time" );
        $notificacionesCliente=DB::table('_cliente')->get();

        $data = DB::table('metodo_cobro')->where('id', $idMcobro)->first();
        return view ('Metodo_cobro.edit',['notificacionesCliente'=>$notificacionesCliente,
        'now'=>$now,'notificacionesPoliza'=>$notificacionesPoliza])->with('data',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Metodo_cobro  $metodo_cobro
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $campos = [
            'nombre' => 'required|string|max:50'
        ];

        $Mensaje=[
            "nombre.required"=>'Agrega el nombre del método de cobro'
        ];

        $this->validate($request, $campos, $Mensaje);

        $metodo_cobro=request();
        $affected = DB::table('metodo_cobro')
              ->where('id', $id)
              ->update(['nombre' => $metodo_cobro->nombre]);
        return redirect('/metodo_cobro');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Metodo_cobro  $metodo_cobro
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Metodo_cobro::destroy($id);
        return redirect('/metodo_cobro');
    }
}
