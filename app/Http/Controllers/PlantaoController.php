<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PlantaoController extends Controller
{
    public function getById($id)
    {
        $plantao = DB::table('PLANTAO')->where('id', $id)->first();

        if ($plantao) {
            return response()->json($plantao);
        } else {
            return response()->json(['message' => 'Plantão não encontrado'], 404);
        }
    }
}
