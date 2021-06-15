<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Departement;

class DepartementsController extends Controller
{
    
  public function show(){
      $departments = Departement::paginate(3);
      return view('department')->with('departments', $departments);
  }

  

}
