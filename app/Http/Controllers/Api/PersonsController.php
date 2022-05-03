<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;

use App\Models\Persons;
use Illuminate\Http\Request;

class PersonsController extends Controller
{

    public function index(){
        $persons = Persons::with('profile')->get();
        return response()->json(['persons' => $persons], 200);
    }

    public function show($id){
        $person = Persons::with('profile')->find([$id]);
        if($person){
            return response()->json(['person' => $person], 200);
        } 

        return response()->json(['person' => 'No existe información'], 404);
    }
}
