<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Helpers\Globals;
use App\Afiliados;
use Illuminate\Support\Facades\Log;

class ImportController extends Controller
{
    protected $api;

    public function __construct()
	{
        $this->api = new Globals();
	}

    public function index(){

        Log::channel('afiliados')->notice('------- Prueba log -------');
        dd('end test');
        // $url = "https://afiliate.republicanosunidos.com.ar/datosapi/afiliados";
        // $header = [
		// 	'Authorization' => 'a64dddbc5d1018282ac98281e4a03278d6443a66aa2f9:90cf741494f0da46b632f4f5872545c5401'
		// ];

        // $result = $this->api->request($url, 'GET', $header, []);
        // $response = $this->api->processResponse($result);  

        // $i = 0;
        // if($response['body']['status'] === 'success'){
        //     foreach($response['body']['data'] as $value){
        //         $insert = Afiliados::firstOrCreate([
        //             'Matricula' =>  $value['Matricula']],
        //             [
        //                 'Apellidos' => $value['Apellidos'],
        //                 'Nombres' => $value['Nombres'],
        //                 'Profesion' => $value['Profesion'],
        //                 'FechaNacimiento' => $value['FechaNacimiento'],
        //                 'LugarNacimiento' => $value['LugarNacimiento'],
        //                 'Sexo' => $value['Sexo'],
        //                 'EstadoCivil' => $value['EstadoCivil'],
        //                 'Domicilio' => $value['Domicilio'],
        //                 'Provicia' => $value['Provicia'],
        //                 'Localidad' => $value['Localidad'],
        //                 'Departamento' => $value['Departamento'],
        //                 'Municipio' => $value['Municipio'],
        //                 'Telefono' => $value['Telefono'],
        //                 'Email' => $value['Email'],
        //                 'FechaSolicitud' => $value['FechaSolicitud'],
        //                 'EstadoAfiliacion' => $value['EstadoAfiliacion'],
        //             ]
        //         );
        //         $insert->wasRecentlyCreated ? $i++ : '';
        //     }
        //     dd('se insertaron '.$i.' registros');
        // }
    }
}
