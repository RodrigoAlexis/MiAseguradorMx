<?php
 
namespace App\Http\Controllers;

use App\Ramo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RamoController extends Controller
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
        $datos = DB::table('ramo')->get();

        return view('Ramo.index', ['datos' => $datos,'notificacionesCliente'=>$notificacionesCliente,
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

        return view ('Ramo.create',['notificacionesCliente'=>$notificacionesCliente,
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
            'tipo_poliza' => 'required|string|max:50'
        ];

        $Mensaje=[
            "tipo_poliza.required"=>'Agrega el nombre del tipo de póliza'
        ];
        $this->validate($request, $campos, $Mensaje);
        $datos=request();

        DB::table('ramo')->insert(
            ['tipo_poliza' => $datos->tipo_poliza, 
            'descripcion' => $datos->descripcion]
        );
        return redirect('/ramo');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Ramo  $ramo
     * @return \Illuminate\Http\Response
     */
    public function show(Ramo $ramo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Ramo  $ramo
     * @return \Illuminate\Http\Response
     */
    public function edit($idramo)
    {
        $notificacionesPoliza=DB::table('_cliente_poliza')->get();
        $now =  DB::select( "select date_format(curdate(),'%d-%m-%Y') as time" );
        $notificacionesCliente=DB::table('_cliente')->get();

        $data = DB::table('ramo')->where('id', $idramo)->first();
        return view ('Ramo.edit',['notificacionesCliente'=>$notificacionesCliente,
        'now'=>$now,'notificacionesPoliza'=>$notificacionesPoliza])->with('data',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Ramo  $ramo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $campos = [
            'tipo_poliza' => 'required|string|max:50'
        ];

        $Mensaje=[
            "tipo_poliza.required"=>'El campo nombre no puede quedar vacío',
            "tipo_poliza.max"=>'El nombre no puede tener mas de 50 caracteres'
        ];

        $this->validate($request, $campos, $Mensaje);

        $ramo=request();
        DB::table('ramo')
              ->where('id', $id)
              ->update(['tipo_poliza' => $ramo->tipo_poliza,
              'descripcion'=> $ramo->descripcion]);
        return redirect('/ramo');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Ramo  $ramo
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Ramo::destroy($id);
        return redirect('/ramo');
    }
}
