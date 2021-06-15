<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Medecin;

class MedcinsController extends Controller
{
    public function show(){
         $medcins = Medecin::paginate(8);
      return view('team')->with('medcins', $medcins);
    }
}
