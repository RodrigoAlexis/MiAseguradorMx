<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    //
    protected $table=('cliente');
    public $timestamps=false;

    public function estatus(){
        $this->belongsTo('App\Estatus','id');
    }

    public function contacto(){
        $this->belongsTo('App\Contacto','id');
    }

    public function usuario(){
        $this->belongsTo('App\Usuario','id');
    }
}
