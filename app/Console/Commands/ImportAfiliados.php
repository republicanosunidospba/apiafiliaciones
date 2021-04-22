<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;
use App\Helpers\Globals;
use App\Afiliados;

class ImportAfiliados extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'import:afiliados';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Importar Afiliados';

    protected $api;

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $this->api = new Globals();

        $url = "https://afiliate.republicanosunidos.com.ar/datosapi/afiliados";
        $header = [
			'Authorization' => 'a64dddbc5d1018282ac98281e4a03278d6443a66aa2f9:90cf741494f0da46b632f4f5872545c5401'
		];

        $result = $this->api->request($url, 'GET', $header, []);
        $response = $this->api->processResponse($result);  

        $insert = $this->insert($response);

        return $insert;

    }

    private function insert($response){
        $i = 0;
        Log::channel('afiliados')->notice('Inicia Proceso de Importación');
        if($response['body']['status'] === 'success'){
            foreach($response['body']['data'] as $value){
                $insert = Afiliados::firstOrCreate([
                    'Matricula' =>  $value['Matricula']],
                    [
                        'Apellidos' => $value['Apellidos'],
                        'Nombres' => $value['Nombres'],
                        'Profesion' => $value['Profesion'],
                        'FechaNacimiento' => $value['FechaNacimiento'],
                        'LugarNacimiento' => $value['LugarNacimiento'],
                        'Sexo' => $value['Sexo'],
                        'EstadoCivil' => $value['EstadoCivil'],
                        'Domicilio' => $value['Domicilio'],
                        'Provicia' => $value['Provicia'],
                        'Localidad' => $value['Localidad'],
                        'Departamento' => $value['Departamento'],
                        'Municipio' => $value['Municipio'],
                        'Telefono' => $value['Telefono'],
                        'Email' => $value['Email'],
                        'FechaSolicitud' => $value['FechaSolicitud'],
                        'EstadoAfiliacion' => $value['EstadoAfiliacion'],
                    ]
                );
                $insert->wasRecentlyCreated ? $i++ : '';
            }
            $result = 'se insertaron '.$i.' registros';
        }else{
            $result = 'Fallo la conexión a la API';
        }
        
        Log::channel('afiliados')->notice($result);
        return $result;
    }
}
