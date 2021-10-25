<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Empresa;
use Illuminate\Http\Request;


class EmpresaController extends Controller
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
        $datos = DB::table('empresa')->get();
        
        return view('Empresa.index', ['datos' => $datos,
        'notificacionesCliente'=>$notificacionesCliente,
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
        return view ('Empresa.create',['notificacionesCliente'=>$notificacionesCliente,
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
            'siglas' => 'required|string|max:10',
        ];

        $Mensaje=[
            "nombre.required"=>'Agrega el nombre de la empresa',
            "siglas.required"=>'Agrega las siglas de la empresa'
        ];
        $this->validate($request, $campos, $Mensaje);

        $datos=request();

        DB::table('empresa')->insert(
            ['nombre' => $datos->nombre, 
            'siglas' => $datos->siglas]
        );
         
        for($i=0;$i<count($datos->tipo); $i++){
            if(isset($datos->numero[$i])){
                DB::table('telefono')->insert(
                ['tipo' => $datos->tipo[$i],
                'numero' => $datos->numero[$i]]);
                
                $ultimatelefono=DB::table('telefono')->select(DB::raw('MAX(id) as id'))->first();
                $ultimocliente=DB::table('empresa')->select(DB::raw('MAX(id) as id'))->first();
  
                DB::table('tel_clie_emp')->insert([
                    'empresa'=>$ultimocliente->id,
                    'telefono'=>$ultimatelefono->id
                ]);
            }
        }
        return redirect('/empresa');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Empresa  $empresa
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $datos = DB::table('empresa')->get();
        $empresa = DB::table('empresa')->where('id',$id)->get();
        $telEmpresa=DB::table('_telefono_empresa')->where('empresa_id',$id)->get();
        $id_empresa=$id;

        $notificacionesPoliza=DB::table('_cliente_poliza')->get();
        $now =  DB::select( "select date_format(curdate(),'%d-%m-%Y') as time" );
        $notificacionesCliente=DB::table('_cliente')->get();

        return view('Empresa.index',['datos'=>$datos,
        'empresa'=>$empresa,'telEmpresa'=>$telEmpresa,'id_empresa'=>$id_empresa
        ,'notificacionesCliente'=>$notificacionesCliente,'now'=>$now,'notificacionesPoliza'=>$notificacionesPoliza]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Empresa  $empresa
     * @return \Illuminate\Http\Response
     */
    public function edit($idempresa)
    {
        $data = DB::table('empresa')->where('id', $idempresa)->first();
        $notificacionesPoliza=DB::table('_cliente_poliza')->get();
        $now =  DB::select( "select date_format(curdate(),'%d-%m-%Y') as time" );
        $notificacionesCliente=DB::table('_cliente')->get();

        return view ('Empresa.edit',[
            'notificacionesCliente'=>$notificacionesCliente,
            'now'=>$now,
            'notificacionesPoliza'=>$notificacionesPoliza
        ]
        )->with('data',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Empresa  $empresa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {

        $campos = [
            'nombre' => 'required|string|max:50',
            'siglas' => 'required|string|max:10',
        ];

        $Mensaje=[
            "nombre.required"=>'El campo nombre no puede quedar vacío',
            "siglas.required"=>'El campo siglas no puede quedar vacío'
        ];
        $this->validate($request, $campos, $Mensaje);

        $empresa=request();
         DB::table('empresa')
              ->where('id', $id)
              ->update(['nombre' => $empresa->nombre,
              'siglas'=> $empresa->siglas]);
              
        return redirect('/empresa');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Empresa  $empresa
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Empresa::destroy($id);
        return redirect('/empresa');
    }

    public function insertTelU(Request $request,$id)
    {
        $empresa=request();
        for($i=0;$i<count($empresa->tipo); $i++){
            if(isset($empresa->numero[$i])){
                DB::table('telefono')->insert(
                ['tipo' => $empresa->tipo[$i],
                'numero' => $empresa->numero[$i]]);
                
                $ultimatelefono=DB::table('telefono')->select(DB::raw('MAX(id) as id'))->first();
                DB::table('tel_clie_emp')->insert([
                    'empresa'=>$id,
                    'telefono'=>$ultimatelefono->id
                ]);
            }else{
                for($i=0;$i<count($empresa->telefonoU);$i++){
                    DB::table('telefono')
                    ->where('id',$empresa->idTel[$i])
                    ->update(['tipo' => $empresa->tipoU[$i],
                    'numero'=> $empresa->telefonoU[$i]]); 
                }
            }
        }
        return redirect('/empresa/'.$id);
    }

    public function destroyTel($id, $idTel)
    {
      DB::table('telefono')
        ->where('id',$idTel)->delete();
        $notificacionesPoliza=DB::table('_cliente_poliza')->get();
        $now =  DB::select( "select date_format(curdate(),'%d-%m-%Y') as time" );
        $notificacionesCliente=DB::table('_cliente')->get();
        return redirect('/empresa/'.$id,['notificacionesCliente'=>$notificacionesCliente,
        'now'=>$now,'notificacionesPoliza'=>$notificacionesPoliza]);
    }
}
