<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Input;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class CodingController extends Controller
{
    private $servicio;
    private $servicio_id;
    private $conductor;
    private $conductor_id;

public   function post_confirm(){
    //valido que exixtan los datos resividos
    $this->servicio_id    = (!empty(Input::get('service_id')))?Input::get('service_id'):0;
    $this->conductor_id  = (!empty(Input::get('driver_id')))?Input::get('service_id'):0;
    //confirmo que los datos resividos sean correctos
    if ($this->servicio_id != 0 && $this->conductor_id !=0) {
        //relizo una busqueda con los datos recibiros de conductor y servicio
        $this->servicio   = Service::find($this->servicio_id);
        $this->conductor = Driver::find($this->conductor_id);
        //confirmo de que el sercicio exista
        if ($this->Validar($this->servicio)) {
            //confirmo de que el conductor esiste y el estado del sercio es 1
            if (empty($this->servicio->driver_id) && $this->servicio->status_id=="1") {
                //realiso la actualizacion del servicio y valido la respuesta
                if ($this->update('Service')) {
                     //realiso la actualizacion del conductor y valido la respuesta
                    if ($this->update('Driver')) {
                        //conturuyo el mensaje de validacion
                        $mensaje = "tu servicio ha sido confirmado!";
                        $push = Push::make();
                        //valido que el servicio exixte
                        if ($this->validar($this->servicio->uuid)) {
                            //valido que tipo de  servicio fue resivido
                            if ($this->servicio->user->type=="1") {
                                //guardo el mensaje en el servicio resivido
                                $result = $push->ios($this->servicio->uuid,$mensaje,1,'honk.wav','Open',array('serviceId'=>$this->servicio->id));
                            }else{
                                $result = $push->android2($this->servicio->uuid,$mensaje,1,'default','Open',array('serviceId'=>$this->servicio->id));

                            }
                            //si todo para bn retorno error = false
                            return Response::json(array("error"=>false));
                        }
                    }
                }
            }
        }

    }
    //si curre un error retorno error =tue
return Response::json(array("error"=>true));
}
/*
funcion encagada de validad si una variable o arreso existe y que no este vacio
 */
private function validar($value='')
{
    if (isset($value) && !empty($value)) {
        return true;
    }else{
        return false;
    }
}

/*
funcion encargada de realizar las actualizaciones de servicio y conductor
 */
private function update($tabla)
{
    switch ($tabla) {
        case 'Service':
            $service = Service::update($service_id,array(
                    'driver_id' =>$driver_id ,
                    'status_id' =>"2" ,
                    'car_id' =>$driver_tmp->car_id));
            $this->servicio   = Service::find($this->servicio_id);
            $this->validar($service);
            break;
        case 'Driver':
            $driver = Driver::update($this->driver_id,array("available"=>"0"));
            $this->conductor = Driver::find($this->conductor_id);
            $this->validar($driver);
            break;
    }
}
}
