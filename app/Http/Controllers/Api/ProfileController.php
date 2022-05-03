<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;

use App\Models\ProfilePersons;
use Illuminate\Http\Request;


class ProfileController extends Controller
{
    /**
    * @OA\Get(
    *     path="/api/personDetail",
    *     summary="Todos los registros",
    * 
    *     @OA\Response(
    *         response=200,
    *         description="Mostrar Perfiles"
    *     ),
    *     @OA\Response(
    *         response="default",
    *         description="Ha ocurrido un error."
    *     )
    * )
    */

    public function index(){
        $profile = ProfilePersons::all();
        return response()->json(['profile' => $profile], 200);
    }

    /**
    * @OA\Get(
    *     path="/api/personDetail/{person}",
    *     summary="Buscar detalle por usuario ",
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
    *         description="Mostrar perfiles por usuario"
    *     ),
    *     @OA\Response(
    *         response="default",
    *         description="Ha ocurrido un error."
    *     )
    * )
    */

    public function show($id){
        $profile = ProfilePersons::where('person_id', $id)->with('person')->first();
        if($profile){
            return response()->json(['profile' => $profile], 200);
        }

        return response()->json(['profile' => 'No existe información'], 404);
    }

}
