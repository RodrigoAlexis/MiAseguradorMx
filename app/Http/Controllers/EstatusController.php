<?php

namespace App\Http\Controllers;

use App\Estatus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EstatusController extends Controller
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
        $estatus=DB::table('estatus')->get();

        return view('Estatus.index',['estatus'=>$estatus,'notificacionesCliente'=>$notificacionesCliente,
        'now'=>$now,'notificacionesPoliza'=>$notificacionesPoliza]);
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
        return view('Estatus.create',['notificacionesCliente'=>$notificacionesCliente,
        'now'=>$now,'notificacionesPoliza'=>$notificacionesPoliza]);
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
            "nombre.required"=>'Agrega el nombre del estatus'
        ];

        $this->validate($request, $campos, $Mensaje);

        $estatus=request();
        DB::table('estatus')->insert([
            'nombre'=>$estatus->nombre,
            'tipo'=>$estatus->tipo,
            'descripcion'=>$estatus->descripcion
        ]);
        return redirect('/estatus');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Estatus  $estatus
     * @return \Illuminate\Http\Response
     */
    public function show(Estatus $estatus)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Estatus  $estatus
     * @return \Illuminate\Http\Response
     */
    public function edit( $id)
    {
        $notificacionesPoliza=DB::table('_cliente_poliza')->get();
        $now =  DB::select( "select date_format(curdate(),'%d-%m-%Y') as time" );
        $notificacionesCliente=DB::table('_cliente')->get();
        $estatus=DB::table('estatus')->where('id',$id)->first();
        return view('Estatus.edit',['notificacionesCliente'=>$notificacionesCliente,
        'now'=>$now,'notificacionesPoliza'=>$notificacionesPoliza])->with('estatus',$estatus);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Estatus  $estatus
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $campos = [
            'nombre' => 'required|string|max:50'
        ];

        $Mensaje=[
            "nombre.required"=>'El campo nombre no puede quedar vacio'
        ];

        $this->validate($request, $campos, $Mensaje);

        $estatus=request();
        $affected=DB::table('estatus')
        ->where('id',$id)
        ->update(['nombre'=>$estatus->nombre,
        'tipo'=>$estatus->tipo,
        'descripcion'=>$estatus->descripcion]);

        return redirect('/estatus');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Estatus  $estatus
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        Estatus::destroy($id);
        return redirect('/estatus');
    }
}
