<?php

namespace App\Http\Controllers;

use App\Cliente;
use ArrayObject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Stmt\TryCatch;
use stdClass;

class ClienteController extends Controller
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
        $clientes=DB::table('_cliente')->get();
        $tablaCliente=DB::table('cliente')->get();
        $filtros=DB::table('estatus')->where('tipo','Cliente')->get();

        return view('home',['clientes'=>$clientes,'tablaCliente'=>$tablaCliente,'filtros'=>$filtros,
        'notificacionesCliente'=>$notificacionesCliente,'now'=>$now,
        'notificacionesPoliza'=>$notificacionesPoliza]);
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
        $clientes=DB::table('_cliente')->get();
        $estatus=DB::table('estatus')->where('tipo','Cliente')->get();
        $usuario=DB::table('usuario')->get();
        $contacto=DB::table('contacto')->get();
        
        return view('Cliente.create',['clientes'=>$clientes,
        'estatus'=>$estatus,'usuario'=>$usuario,'contacto'=>$contacto
        ,'notificacionesCliente'=>$notificacionesCliente,'now'=>$now,'notificacionesPoliza'=>$notificacionesPoliza]);
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

        $campos = [
            'nombre' => 'required|string|max:50',
            'ap_paterno'=>'required|string|max:50',
            'ap_materno'=> 'required|string|max:50',
            'fecha_nacimiento'=>'required|date',
            'user'=>'required|string|max:45',
            'password'=>'required|string|max:45',

        ];

        $Mensaje=[
            "nombre.required"=>'Agregue el nombre del ciente',
            "ap_paterno.required"=>'Agregue el apellido paterno del cliente',
            "ap_materno.required"=>'Agregue el apellido materno del cliente',
            "fecha_nacimiento.required"=>'Agregue la fecha de nacimineto del cliente',
            "user.required"=>'Agregue el usuario del cliente',
            "password.required"=>'Agregue la contraseña del cliente'
        ];

        $this->validate($request, $campos, $Mensaje);
        
        $cliente=request();

        DB::table('usuario')->insert([
            'user'=>$cliente->user,
            'password'=>$cliente->password
        ]);
        $ultimoUser=DB::table('usuario')->select(DB::raw('MAX(id) as id'))->first();

        DB::table('cliente')->insert([
            'nombre'=>$cliente->nombre,
            'ap_paterno'=>$cliente->ap_paterno,
            'ap_materno'=>$cliente->ap_materno,
            'fecha_nacimiento'=>$cliente->fecha_nacimiento,
            'sexo'=>$cliente->sexo,
            'aniversario'=>$cliente->aniversario,
            'relacion'=>$cliente->relacion,
            'acronimo'=>$cliente->ap_paterno.' '.$cliente->nombre,
            'estatus'=>$cliente->estatus,
            'contacto'=>$cliente->contacto,
            'usuario'=>$ultimoUser->id
        ]);
        
        $ultimocliente=DB::table('cliente')->select(DB::raw('MAX(id) as id'))->first();
          
        for($i=0;$i<=count($cliente->tipo)-1; $i++){
            DB::table('telefono')->insert(
                ['tipo' => $cliente->tipo[$i],
                'numero' => $cliente->numero[$i]]
            );
            $ultimotelefono=DB::table('telefono')->select(DB::raw('MAX(id) as id'))->first();
            
            DB::table('tel_clie_emp')->insert([
                        'cliente'=>$ultimocliente->id,
                        'telefono'=>$ultimotelefono->id
                    ]);
        }
        for($i=0;$i<count($cliente->num_cuenta); $i++){
            DB::table('cuenta_bancaria')->insert(
                [
                'num_cuenta' => $cliente->num_cuenta[$i],
                'fecha_vigencia' => $cliente->mes[$i].'/'.$cliente->year[$i],
                'pin' => $cliente->cvv[$i]
                ]
            );
            $ultimaCuenta=DB::table('cuenta_bancaria')->select(DB::raw('MAX(id) as id'))->first();
            
            DB::table('cuenta_cliente')->insert([
                        'cliente'=>$ultimocliente->id,
                        'cuenta_bancaria'=>$ultimaCuenta->id
                    ]);
        }
        return redirect('/cliente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $notificacionesPoliza=DB::table('_cliente_poliza')->get();
        $now =  DB::select( "select date_format(curdate(),'%d-%m-%Y') as time" );
        $clientes=DB::table('_cliente')->get();
        $cliente=DB::table('_cliente')->where('id',$id)->get();
        $tablaCliente=DB::table('cliente')->where('id',$id)->get();
        $estatus=DB::table('estatus')->where('tipo','=','Cliente')->get();
        $contacto=DB::table('contacto')->get();
        $polizas=DB::table('_Cliente_poliza')->where('id_cliente',$id)->get();
        $ramo = DB::table('ramo')->get();
        $empresas = DB::table('empresa')->get();
        $metodo_cobro = DB::table('metodo_cobro')->get();
        $forma_pago = DB::table('forma_pago')->get();
        $condicion_cobro = DB::table('condicion_cobro')->get();
        $estatusPoliza = DB::table('estatus')->where('tipo','Poliza')->get();
        
        $telCliente=DB::table('_telefono_cliente')->where('cliente_id',$id)->get();
        $Cuentasbancarias=DB::table('_cuentab_cliente')->where('cliente_id',$id)->get();
         return view('home',[
            'clientes'=>$clientes,'cliente'=>$cliente,
            'tablaCliente'=>$tablaCliente,'estatus'=>$estatus,
            'contacto'=>$contacto,'telCliente'=>$telCliente,
            'Cuentasbancarias'=>$Cuentasbancarias,
            'polizas'=>$polizas,
            'ramo'=>$ramo,
            'empresas'=>$empresas,
            'metodo_cobro'=>$metodo_cobro,
            'forma_pago'=>$forma_pago,
            'condicion_cobro'=>$condicion_cobro,
            'estatusPoliza'=>$estatusPoliza,'now'=>$now,
            'notificacionesCliente'=>$clientes,
            'notificacionesPoliza'=>$notificacionesPoliza
            ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $cliente=request();
        $tablaCliente=DB::table('cliente')->where('id',$id)->first();

        DB::table('cliente')->where('id', $id)->update([
                'nombre'=>$cliente->nombre,
                'ap_paterno'=>$cliente->ap_paterno,
                'ap_materno'=>$cliente->ap_materno,
                'fecha_nacimiento'=>$cliente->fecha_nacimiento,
                'sexo'=>$cliente->sexo,
                'aniversario'=>$cliente->aniversario,
                'relacion'=>$cliente->relacion,
                'acronimo'=>$cliente->ap_paterno.' '.$cliente->nombre,
                'estatus'=>$cliente->estatus,
                'contacto'=>$cliente->contacto
            ]);
            
        DB::table('usuario')
        ->where('id', $tablaCliente->usuario)->update([
            'user'=>$cliente->usuario,
            'password'=>$cliente->password
        ]);
            #Insert NEW telfono
            for($i=0;$i<=count(($cliente->numero))-1; $i++){
                if(isset($cliente->numero[$i])){
                    DB::table('telefono')->insert(
                    ['tipo' => $cliente->tipo[$i],
                    'numero' => $cliente->numero[$i]]);
                    $ultimotelefono=DB::table('telefono')->select(DB::raw('MAX(id) as id'))->first();
                    DB::table('tel_clie_emp')->insert([
                        'cliente'=>$id,
                        'telefono'=>$ultimotelefono->id
                    ]);
                }
            }
            #Insert new cuenta
            for($i=0;$i<count($cliente->num_cuenta); $i++){
                if(isset($cliente->num_cuenta[$i])){
                    DB::table('cuenta_bancaria')->insert(
                        [
                        'num_cuenta' => $cliente->num_cuenta[$i],
                        'fecha_vigencia' => $cliente->mes[$i].'/'.$cliente->year[$i],
                        'pin' => $cliente->cvv[$i]
                        ]
                    );
                    $ultimaCuenta=DB::table('cuenta_bancaria')->select(DB::raw('MAX(id) as id'))->first();
                    
                    DB::table('cuenta_cliente')->insert([
                                'cliente'=>$id,
                                'cuenta_bancaria'=>$ultimaCuenta->id
                            ]);
                }
            }
            #Update Cuenta bancaria
            try {
                for ($i=0; $i<count($cliente->num_cuentaU); $i++) { 
                    if(isset($cliente->num_cuentaU[$i])){
                        DB::table('cuenta_bancaria')->where('id', $cliente->id_cuenta[$i])->update([
                            'num_cuenta' => $cliente->num_cuentaU[$i],
                            'fecha_vigencia' => $cliente->mesE[$i].'/'.$cliente->yearE[$i],
                            'pin' => $cliente->cvvU[$i]
                        ]);
                    }
                }
                for ($i=0; $i<count($cliente->numeroU); $i++) { 
                    if(isset($cliente->numeroU[$i])){
                        DB::table('telefono')->where('id', $cliente->id_tel[$i])->update([
                            'numero' => $cliente->numeroU[$i],
                            'tipo' => $cliente->tipoU[$i]
                        ]);
                    }
                }
            } catch (\Throwable $th) { 
                //throw $th;
            }
            #Update Estatus
            

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Cliente::destroy($id);
        return redirect()->back();
    }
    public function EliminarTelefono($id, $idTel)
    {
        DB::table('telefono')
        ->where('id',$idTel)->delete();
        return redirect()->back();
    }
    public function EliminarCuenta($id,$cliente)
    {
        DB::table('cuenta_bancaria')
        ->where('id',$id)->delete();
        return redirect()->back();
    }
    public function Filtro($filtro)
    {
        $notificacionesPoliza=DB::table('_cliente_poliza')->get();
        $now =  DB::select( "select date_format(curdate(),'%d-%m-%Y') as time" );
        $notificacionesCliente=DB::table('_cliente')->get();
        $clientes=DB::table('_cliente')->where('estatus',$filtro)->get();
        $tablaCliente=DB::table('cliente')->get();
        $filtros=DB::table('estatus')->where('tipo','Cliente')->get();
        
        return view('home',['clientes'=>$clientes,'tablaCliente'=>$tablaCliente,'filtros'=>$filtros,
        'notificacionesCliente'=>$notificacionesCliente,'now'=>$now,'notificacionesPoliza'=>$notificacionesPoliza]);
    }
}
