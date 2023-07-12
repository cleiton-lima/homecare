<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ConsultaController extends Controller
{
    public function getById($id)
    {
        $consulta = DB::table('CONSULTA')->where('id', $id)->first();

        if ($consulta) {
            return response()->json($consulta);
        } else {
            return response()->json(['message' => 'Consulta não encontrada'], 404);
        }
    }
}
