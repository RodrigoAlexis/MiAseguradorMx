<?php

namespace App\Http\Controllers;

use App\Forma_pago;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FormaPagoController extends Controller
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
        $forma_pago=DB::table('forma_pago')->get();
        return view('FormaPago.index',['forma_pago'=>$forma_pago,'notificacionesCliente'=>$notificacionesCliente,'now'=>$now,'notificacionesPoliza'=>$notificacionesPoliza]);
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
        return view('FormaPago.create',['notificacionesCliente'=>$notificacionesCliente,
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
            'nombre' => 'required|string|max:50',
            'tiempo' => 'required|int|max:2',
        ];

        $Mensaje=[
            "nombre.required"=>'Agrega el nombre de la forma de pago',
            "tiempo.required"=>'Agrega el tiempo de la forma de pago'
        ];

        $this->validate($request, $campos, $Mensaje);

        $forma_pago=request();
        DB::table('forma_pago')->insert([
            'nombre'=>$forma_pago->nombre,
            'tiempo'=>$forma_pago->tiempo
        ]);
        return redirect('/forma_pago');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Forma_pago  $forma_pago
     * @return \Illuminate\Http\Response
     */
    public function show(Forma_pago $forma_pago)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Forma_pago  $forma_pago
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $notificacionesPoliza=DB::table('_cliente_poliza')->get();
        $now =  DB::select( "select date_format(curdate(),'%d-%m-%Y') as time" );
        $notificacionesCliente=DB::table('_cliente')->get();

        $forma_pago=DB::table('forma_pago')->where('id',$id)->first();
        return view('FormaPago.edit',['notificacionesCliente'=>$notificacionesCliente,
        'now'=>$now,'notificacionesPoliza'=>$notificacionesPoliza])->with('forma_pago',$forma_pago);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Forma_pago  $forma_pago
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $campos = [
            'nombre' => 'required|string|max:50',
            'tiempo' => 'required|int|max:2',
        ];

        $Mensaje=[
            "nombre.required"=>'El campo nombre no puede quedar vacio',
            "tiempo.required"=>'El campo tiempo no puede quedar vacio'
        ];

        $this->validate($request, $campos, $Mensaje);


        $forma_pago=request();
        $affected=DB::table('forma_pago')
        ->where('id',$id)
        ->update(['nombre'=>$forma_pago->nombre,'tiempo'=>$forma_pago->tiempo]);

        return redirect('/forma_pago');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Forma_pago  $forma_pago
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Forma_pago::destroy($id);
        return redirect('/forma_pago');
    }
}
