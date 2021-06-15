<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Departement;
use App\Models\Service;

class ServiceController extends Controller
{
    public function show($id){

        $services = Departement::find($id)->services;
        $depName = Departement::find($id)->nom ;
         return view('services')->with('services' , $services)->with('departement_name', $depName );

    }

    public function services(){
        
        $services = array();
        $departements = Departement::all();
        foreach ($departements as $departement ) {
            $depServices = Departement::find($departement->id_departement)->services;
           foreach($depServices as $depService){
               array_push($services, $depService);
           }
        }
         return view('services')->with('services' , $services)->with('departement_name', "");

    }
}
