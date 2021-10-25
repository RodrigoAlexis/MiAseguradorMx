<?php

namespace App\Http\Controllers;
 
use App\Condicion_cobro;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CondicionCobroController extends Controller
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
        $datos = DB::table('condicion_cobro')->get();
        
        return view('Condicion_cobro.index', ['datos' => $datos,'notificacionesCliente'=>$notificacionesCliente,
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
        return view ('Condicion_cobro.create',['notificacionesCliente'=>$notificacionesCliente,'now'=>$now,'notificacionesPoliza'=>$notificacionesPoliza]);
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
            'nombre' => 'required|string|max:50',
            'acronimo' => 'required|string|max:15',
        ];

        $Mensaje=[
            "nombre.required"=>'Agrega el nombre de la condición de cobro',
            "acronimo.required"=>'Agrega el acrónimo de la condición de cobro'
        ];

        $this->validate($request, $campos, $Mensaje);

        $datos=request();

        DB::table('condicion_cobro')->insert(
            ['nombre' => $datos->nombre, 
            'acronimo' => $datos->acronimo]
        );
        return redirect('/condicion_cobro');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Condicion_cobro  $condicion_cobro
     * @return \Illuminate\Http\Response
     */
    public function show(Condicion_cobro $condicion_cobro)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Condicion_cobro  $condicion_cobro
     * @return \Illuminate\Http\Response
     */
    public function edit($idcondicion)
    {
        $data = DB::table('condicion_cobro')->where('id', $idcondicion)->first();
        return view ('Condicion_cobro.edit')->with('data',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Condicion_cobro  $condicion_cobro
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $campos = [
            'nombre' => 'required|string|max:50',
            'acronimo' => 'required|string|max:15',
        ];

        $Mensaje=[
            "nombre.required"=>'El campo nombre no puede quedar vacio',
            "acronimo.required"=>'El campo acronimo no puede quedar vacio'
        ];

        $this->validate($request, $campos, $Mensaje);

        $condicion_cobro=request();
        $affected = DB::table('condicion_cobro')
              ->where('id', $id)
              ->update(['nombre' => $condicion_cobro->nombre,
              'acronimo'=> $condicion_cobro->acronimo]);
        return redirect('/condicion_cobro');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Condicion_cobro  $condicion_cobro
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Condicion_cobro::destroy($id);
        return redirect('/condicion_cobro');
    }
}
