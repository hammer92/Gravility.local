<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Controllers\View;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Response;
/**
*
*/
class HomeController extends Controller
{	//variable para asignar el incion de la prueba
	public $inicio = 1;
	//variable para asignar el final de la prueba
	public $final = 0;
	//arrego para almacenar los resultados
	public $datos = array();
	/*
	funcion Principar recibe los datos y evalua.
	 */
	public function matrix(Request $request)
	{
		//comvierto el strun en arreglo segun los daltos de linea
		$data = explode("\n", $request['datos']);
		//envio el funcion el arrego
		$this->numeropruebas($data);
		//elimino los datos de la base de datos
		DB::table('matrix')->delete();
		//envio respuestas a la vista asignada
		return view('gravility.matrix', ['matrix' => $this->datos,'datos'=>$request['datos']]);

	}
	/*
	revibe un arreglo con los parameros de la prueba y los evalua
	 */
	private function numeropruebas($data=array())
	{
		//recorro las sistintas prievas
		for ($i=1; $i <=trim($data[0]) ; $i++) {
			//adiciono al arreglo respuesta en que prueba me encientro
			array_push($this->datos , "Prueba ".$i);
			//separo casa uno de los arregos de consulta segun el espacio
			$op = explode(" ",trim($data[$this->inicio]));
			//calculo la pocion final de la prueba
			$this->final = $op[1]+$this->inicio+1;
			//envio datos de las consultas
			$this->consultas($data,$i);
			//actualizo la pocicion donde termina la prueba y enpieza la sigiente
			$this->inicio = $this->final;
		}
	}
	/*
	recibe un arreglo con las consultas
	 */
	private function consultas($data=array(),$prueba)
	{
		//recorro casa una de las consulas de la prueba
		for ($j=$this->inicio; $j < $this->final; $j++) {
				//separo la consulta en arreglo sgin los espacion
				$reg =explode(" ",$data[$j]);
				//envio la consulta para ser evaluada
				$this->queryUpdate($reg,$prueba);

			}
	}
	/*
	evalua que tipo de consulta es y evalua si guarda o imprime
	 */
	private function queryUpdate($value=array(),$prueba)
	{
		//evaluacion del tipo de consulta
		switch ($value[0]) {
			//si es de tipo UPDATE
			case 'UPDATE':
				//concadeno las posiciones del vector
				$xyz = (int)$value[1].$value[2].$value[3];
				//guardo en la base de datos la prueba, posicion y el valor
				DB::insert('insert into matrix (n_prueba,xyz, value) values (?, ?,?)', [$prueba, $xyz,$value[4]]);
				break;
			//si es de tipo QUERY
			case 'QUERY':
				//agrupo la pociocion inicial de busqueda
				$in = (int)$value[1].$value[2].$value[3];
				//agrupo la pociocion final de busqueda
				$fi = (int)$value[4].$value[5].$value[6];
				//consulto el base de datos con la funcion suma en el rango estipulado
				$value =  DB::select('select sum(value) AS valor from matrix where  xyz between :in and :fi and n_prueba=:n', ['in' => trim($in),'fi' => trim($fi),'n' => $prueba]);
				//si la consulta retorna null le asigno el valor cero
				if ($value[0]->valor==null) {
					$value[0]->valor = 0;
				}
				//adiciono al arrego de respuesta los resultados obtenidos
				array_push($this->datos , $value[0]->valor);
				break;
		}
	}
}

 ?>