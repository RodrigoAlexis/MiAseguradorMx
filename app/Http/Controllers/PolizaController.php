<?php

namespace App\Http\Controllers;

use App\File;
use App\Poliza;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Stmt\Foreach_;
use Illuminate\Support\Facades\Storage;

class PolizaController extends Controller
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
        //
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
        $clientes = DB::table('_cliente')->get();
        $ramo = DB::table('ramo')->get();
        $empresas = DB::table('empresa')->get();
        $metodo_cobro = DB::table('metodo_cobro')->get();
        $forma_pago = DB::table('forma_pago')->get();
        $condicion_cobro = DB::table('condicion_cobro')->get();
        $estatus = DB::table('estatus')->where('tipo','poliza')->get();
        

        return view('Poliza.create', 
        ['clientes' => $clientes,
        'ramo'=>$ramo,
        'empresas'=>$empresas,
        'metodo_cobro'=>$metodo_cobro,
        'forma_pago'=>$forma_pago,
        'condicion_cobro'=>$condicion_cobro,
        'estatus'=>$estatus,
        'notificacionesCliente'=>$notificacionesCliente,
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
            'folio' => 'required|string|max:49',
            'inicio_vigencia' => 'required|date',
            'prima_neta' => 'required|int'
        ];

        $Mensaje=[
            "folio.required"=>'Agrega el folio de la póliza',
            "inicio_vigencia.required"=>'Agrega la fecha de vigencia de la póliza',
            "prima_neta.required"=>'Agrega la prima neta de la póliza'
        ];

        $this->validate($request, $campos, $Mensaje);

        $poliza=request();
        
        DB::table('poliza')->insert(
                ['ramo' => $poliza->ramo, 
                'folio' => $poliza->folio,
                'tipo' => $poliza->tipo,
                'inicio_vigencia' => $poliza->inicio_vigencia,
                'prima_neta' => $poliza->prima_neta,       
                'empresa' => $poliza->empresa,
                'metodo_cobro' => $poliza->metodo_cobro,
                'forma_pago' => $poliza->forma_pago,
                'condicion_cobro' => $poliza->condicion_cobro]
                );  
            

        $ultima=DB::table('poliza')->select(DB::raw('MAX(id) as id'))->first();
        //->select(DB::raw('MAX(id) as id'))

        //select de la poliza 
        DB::table('cliente_poliza')->insert(
            ['cliente' => $poliza->cliente, 
            'poliza' => $ultima->id
            ]
        );
        try {
            for($i=0;$i<count($poliza->estatus); $i++){
                if(isset($poliza->estatus[$i])){
                    DB::table('estatus_poliza')->insert(
                        ['estatus' => $poliza->estatus[$i], 
                        'poliza' => $ultima->id
                        ]
                    );
                }
            }
        } catch (\Throwable $th) {
            //throw $th;
        }
        try {
            app('App\Http\Controllers\FileController')->store($poliza,$poliza->cliente,$ultima->id);

        } catch (\Throwable $th) {
            //throw $th;
        }
        
        return redirect('/home');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Poliza  $poliza
     * @return \Illuminate\Http\Response
     */
    public function show(Poliza $poliza)
    {
        //
    }
 
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Poliza  $poliza
     * @return \Illuminate\Http\Response
     */
    public function edit(Poliza $poliza)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Poliza  $poliza
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $poliza=request();
        
        DB::table('poliza')->where('id', $id)->update([
            'folio'=>$poliza->folio,
            'ramo'=>$poliza->ramo,
            'folio'=>$poliza->folio,
            'tipo'=>$poliza->tipo,
            'inicio_vigencia'=>$poliza->inicio_vigencia,
            'prima_neta'=>$poliza->prima_neta,
            'empresa'=>$poliza->empresa,
            'metodo_cobro'=>$poliza->metodo_cobro,
            'forma_pago'=>$poliza->forma_pago,
            'condicion_cobro'=>$poliza->condicion_cobro
        ]);

       
        for($i=0;$i<count($poliza->estatus); $i++){
            if(isset($poliza->estatus[$i])){
                DB::table('estatus_poliza')->insert(
                    ['estatus' => $poliza->estatus[$i], 
                    'poliza' => $id]);
            }
        }
        if(isset($poliza->estatusU)){
            for($i=0;$i<count($poliza->estatusU);$i++){
                if(isset($poliza->estatusU[$i])){
                    DB::table('estatus_poliza')
                        ->where('id',$poliza->idEstPol[$i])
                        ->update(['estatus' => $poliza->estatusU[$i]]); 
                    }
            }
        }
        try {
            app('App\Http\Controllers\FileController')->store($poliza,$poliza->id_cliente,$id);
        
        } catch (\Throwable $th) {
            //throw $th;
        }
        
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Poliza  $poliza
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('poliza')
        ->where('id',$id)->delete();
        return back();
    }

    public function EstatusPoliza($idPoliza){
       return  $estatusPoliza = DB::table('_estatus_poliza')->where('id_poliza',$idPoliza)->get();
    }

    public function destroyEstatusP($id){
        DB::table('estatus_poliza')
        ->where('id',$id)->delete();
        return redirect()->back();
    }
}
