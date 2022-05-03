<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;

use App\Models\Persons;
use Illuminate\Http\Request;

/**
* @OA\Info(title="API Usuarios", version="1.0")
*
* @OA\Server(url="http://localhost:8000")
*/

class PersonsController extends Controller
{
    /**
    * @OA\Get(
    *     path="/api/persons",
    *     summary="Todos los registros",
    * 
    *     @OA\Response(
    *         response=200,
    *         description="Mostrar todos los registros."
    *     ),
    *     @OA\Response(
    *         response="default",
    *         description="Ha ocurrido un error."
    *     )
    * )
    */

    public function index(){
        $persons = Persons::with('profile')->get();
        return response()->json(['persons' => $persons], 200);
    }

    /**
    * @OA\Get(
    *     path="/api/persons/{person}",
    *     summary="Buscar persona",
    *     @OA\Parameter(
    *       name="person",
    *       description="Person ID",
    *       in="path",
    *       required=true,
    *       @OA\Schema(
    *           type="integer"
    *       )  
    *     ),
    *     @OA\Response(
    *         response=200,
    *         description="Mostrar información de cliente"
    *     ),
    *     @OA\Response(
    *         response="default",
    *         description="Ha ocurrido un error."
    *     )
    * )
    */

    public function show($id){
        $person = Persons::with('profile')->find([$id]);
        if($person){
            return response()->json(['person' => $person], 200);
        } 

        return response()->json(['person' => 'No existe información'], 404);
    }
}
