<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

use App\Contacto;


class ContactoController extends Controller
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
        $contactos=DB::table('contacto')->get();
        return view('Contacto.index',['contactos'=>$contactos,
        'notificacionesCliente'=>$notificacionesCliente,
        'now'=>$now,'notificacionesPoliza'=>$notificacionesPoliza]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $notificacionesPoliza=DB::table('_cliente_poliza')->get();
        $now =  DB::select( "select date_format(curdate(),'%d-%m-%Y') as time" );
        $notificacionesCliente=DB::table('_cliente')->get();
        return view('contacto.create',['notificacionesCliente'=>$notificacionesCliente,'now'=>$now,'notificacionesPoliza'=>$notificacionesPoliza]);
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
            "nombre.required"=>'Agrega el nombre del origen'
        ];

        $this->validate($request, $campos, $Mensaje);
        $datos=request();
        DB::table('contacto')->insert([
            'nombre' => $datos->nombre,
            'descripcion' => $datos->descripcion
            ]);
        return redirect('/contacto');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Contacto  $contacto
     * @return \Illuminate\Http\Response
     */
    public function show(Contacto $contacto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Contacto  $contacto
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $notificacionesPoliza=DB::table('_cliente_poliza')->get();
        $now =  DB::select( "select date_format(curdate(),'%d-%m-%Y') as time" );
        $notificacionesCliente=DB::table('_cliente')->get();
        $contacto=DB::table('contacto')->where('id',$id)->first();

        return view('Contacto.edit',['notificacionesCliente'=>$notificacionesCliente,
        'now'=>$now,'notificacionesPoliza'=>$notificacionesPoliza])->with('contacto',$contacto);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Contacto  $contacto
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

        $contacto=request();
        $affected=DB::table('contacto')
        ->where('id',$id)
        ->update(['nombre'=>$contacto->nombre,'descripcion'=>$contacto->descripcion]);

        return redirect('/contacto');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Contacto  $contacto
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Contacto::destroy($id);
        return redirect('/contacto');
    }
}
