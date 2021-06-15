<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Patient;
use App\Models\Departement;
use App\Models\Consultation;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session ;

class SecurityController extends Controller
{
    public function signUp(){
         return view('register');
    }

    public function register(Request $request){
        
        $request->validate([
        'nom' => 'required|max:50',
        'prenom' => 'required|max:50',
        'cin' => 'required|max:10',
        'telephon' => 'required|digits_between:10,15',
        'email' => 'required|unique:users,email',
        'password' => 'required|confirmed|min:8',
        'password_confirmation' =>'required|min:8'
         ],
        [
            'nom.max' => 'Vous pouvez pas depasser 50 caractéres pour le nom',
            'prenom.max' => 'Vous pouvez pas depasser 50 caractéres pour le nom',
            'cin.max' => 'Vous pouvez pas depasser 50 caractéres pour le nom',
            'telephon.digits_between' => 'le nombre de chiffres pour le num de telephon est entre 10 et 15',
             'password.min' => 'le mot de passe doit avoir au minimum 10 caractéres',
              'password.confirmed' => 'la confirmation de votre mot de passe est incorecte',
             'password_confirmation.min' => 'le mot de passe de confirmation doit avoir au minimum 8 caractéres'
              ]);
     
    //Ajouter l'utilisateur
       $user = new User();
       $user->email=$request->email;
        $password=Hash::make($request->password);
        $user->password = $password;
        $user->status = 'patient';   
        $user->save();
        $user->refresh();

        // ajouter le patient
        $patient = new Patient;
        $patient->id_user=$user->id;
        $patient->nom = $request->nom;
        $patient->prenom = $request->prenom;
        $patient->cin=$request->cin;
        $patient->telephon=$request->telephon;
        $patient->adresse='';
        $patient->save();
        Session::put('user', $user);
        
        if(Session::has('consultationData')){
              $consultationData= Session('consultationData');
              Session::forget('consultationData');
              $patient=Patient::where([
              ['id_user', '=', $user->id]
              ])
              ->get()
              ->first()
              ;
               $consultation = new Consultation();
               $consultation->id_patient= $patient->id_patient;
               $consultation->id_medecin= $consultationData['docteur'];
               $consultation->dateConsultation= $consultationData['date'];
               $consultation->temp= $consultationData['heur'];
               $consultation->save();
               $consultation->refresh();
   
                $message = "Votre consultation est bien enregistre, une piéce justificatif est envoyé sur votre boite email";
                Session::put('Success', $message);
                 $departements = Departement::all();
               return view('demanderConsultation')->with('departements' , $departements);
              }
              else{
              return redirect()->back();
         }

    }

    public function signIn(){
         return view('seConnecter');
    }

    public function logout(){
            Session::forget('user');
            return redirect()->back();
    }

    public function seConnecter(Request $request){

     $email = $request->email ;
     $user = User::where([
          ['email' , '=', $email]
     ])
     ->get()
     ->first();
     if($user == null){
        $message = "Votre adresse email n'existe pas, essayer de s'enregistrer";
        Session::put('error', $message);
        return redirect()->back();
     }
      $password=Hash::make($request->password);
      if($password != $user->password){
        $message = "Votre mot de passe est incorrect";
        Session::put('error', $message);
        return redirect()->back();
      }else{
             if(Session::has('consultationData')){
              $consultationData= Session('consultationData');
              Session::forget('consultationData');
              $patient=Patient::where([
              ['id_user', '=', $user->id]
              ])
              ->get()
              ->first()
              ;
               $consultation = new Consultation();
               $consultation->id_patient= $patient->id_patient;
                $consultation->id_medecin= $consultationData['docteur'];
               $consultation->dateConsultation= $consultationData['date'];
               $consultation->temp= $consultationData['heur'];
               $consultation->save();
               $consultation->refresh();
   
                $message = "Votre consultation est bien enregistre, une piéce justificatif est envoyé sur votre boite email";
                Session::put('Success', $message);
                $departements = Departement::all();
               return view('demanderConsultation')->with('departements' , $departements);
              }else{
              return redirect()->back();
         }
      }
    }
}


