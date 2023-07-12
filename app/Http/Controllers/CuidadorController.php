<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CuidadorController extends Controller
{
    public function getPlantaoByCpf($cpf)
    {
        $plantao = DB::table('PLANTAO')
            ->join('CUIDADOR', 'PLANTAO.CUIDADOR_cpf', '=', 'CUIDADOR.cpf')
            ->where('CUIDADOR.cpf', $cpf)
            ->get();

        return response()->json($plantao);
    }

    public function getAll()
    {
        $cuidadores = DB::table('CUIDADOR')->get();

        return response()->json($cuidadores);
    }

    public function getByCpf($cpf)
    {
        $cuidador = DB::table('CUIDADOR')->where('cpf', $cpf)->first();

        if ($cuidador) {
            return response()->json($cuidador);
        } else {
            return response()->json(['message' => 'Cuidador não encontrado'], 404);
        }
    }

    public function insert(Request $request)
    {
        // Valide e obtenha os dados do cuidador a ser inserido a partir do $request

        $cpf = $request->input('cpf');
        $usuarioId = $request->input('usuario_id');
        $coren = $request->input('coren');

        DB::table('CUIDADOR')->insert([
            'cpf' => $cpf,
            'USUARIO_id' => $usuarioId,
            'COREN' => $coren
        ]);

        return response()->json(['message' => 'Cuidador inserido com sucesso']);
    }
}
