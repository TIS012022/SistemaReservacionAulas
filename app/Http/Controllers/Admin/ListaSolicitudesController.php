<?php

namespace App\Http\Controllers\Admin;

use App\Models\ListaSolicitud;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ListaSolicitudesController extends Controller
{
    public function index()
    {
        $solicitudes = array(
            array("Docente" => "Montaño Victor",  "Aula" => "691A", "Horario" => "14:15", "Fecha" => "12/4/2022"), // solicitud1
            //["Docente" => "Salazar Carla",  "Aula" => "691C", "Horario" => "15:45", "Fecha" => "12/4/2022"], // solicitud2
            //["Docente" => "Villarroel Henry",  "Aula" => "623", "Horario" => "17:15", "Fecha" => "12/4/2022"],
            //["Docente" => "Jaldin Rolando",  "Aula" => "692A", "Horario" => "20:15", "Fecha" => "14/4/2022"]
            
        );
        return view('admin.listaSolicitudes.tablaSol');
    }

}
