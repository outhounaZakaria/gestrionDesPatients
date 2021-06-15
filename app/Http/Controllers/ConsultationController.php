<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Departement;
use App\Models\Service;
use App\Models\Medecin;
use App\Models\Patient;
use App\Models\Consultation;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session ;
use Illuminate\Routing\Redirector;

class ConsultationController extends Controller
{
    public function show(){
        $departements = Departement::all();
        return view('demanderConsultation')->with('departements' , $departements);
    }

     public function reserver(Request $request){
        if($request->activeDepartement == "1"){
            $services = Departement::find($request->departement)->services;
            $html1 = '<option value="-1">aucun</option>';
        foreach ($services as $service) {
            $html1 .= '<option value="'.$service->id_service.'">'.$service->nom.'</option>';
        }


        //  les medecins de departement 
        $medecinsDuDepartement = array();
             $services = Departement::find($request->departement)->services;   
               foreach($services as $service){
                    $medecinsDuServices = Service::find($service->id_service)->medecins;
                    foreach($medecinsDuServices as $medecinsDuService){
                    array_push($medecinsDuDepartement, $medecinsDuService);
                    }
               }

                $medecins=$medecinsDuDepartement;
             $html2 = '';
            foreach ($medecins as $medecin) {
            $html2 .= '<option value="'.$medecin->id_medecin.'">'.$medecin->nom.  ' ' . $medecin->prenom .'</option>';
                }


        return response()->json(['html' => $html1, 'html2'=>$html2]);
        }


         if($request->activeService == "1"){

            if($request->service >= 0){
            $medecins = Service::find($request->service)->medecins;
             }else{
             $medecinsDuDepartement = array();
             $services = Departement::find($request->departement)->services;   
               foreach($services as $service){
                    $medecinsDuServices = Service::find($service->id_service)->medecins;
                    foreach($medecinsDuServices as $medecinsDuService){
                    array_push($medecinsDuDepartement, $medecinsDuService);
                    }
               }

                $medecins=$medecinsDuDepartement;
            }
            $html = '';
            foreach ($medecins as $medecin) {
            $html .= '<option value="'.$medecin->id_medecin.'">'.$medecin->nom.  ' ' . $medecin->prenom .'</option>';
                }
           
        return response()->json(['html' => $html]);
        }

        if($request->activeDocteur == "1"){
              $todayDate = Carbon::now()->format('Y-m-d');
            $consultations = Consultation::where([
                ['id_medecin', '=' , $request->docteur],
                ['dateConsultation', '>=' , $todayDate ] ])
                ->orderBy('dateConsultation')
                ->get();
            ;

           $fullDates = array();
        if($consultations->count() > 0){
            $oldDate = $consultations->first()->dateConsultation;
            $datesLists = array();
            $nbConsultation = 0;
         foreach ($consultations as $consultation) {
           if($consultation->dateConsultation ==  $oldDate){
                 $nbConsultation += 1;
           }else{
                array_push($datesLists, [$oldDate, $nbConsultation]);
                $nbConsultation = 1;
                $oldDate = $consultation->dateConsultation;
           }
         }
          array_push($datesLists, [$oldDate, $nbConsultation]);
          foreach ($datesLists as  $datesList) {
            if($datesList[1] >= 8){
                 array_push($fullDates, $datesList[0]);
            }
          }
         }     

           return response()->json(['fullDates' => $fullDates]);
     

        }


           if($request->activeDate == "1"){
              $consultations = Consultation::where([
                ['id_medecin', '=' , $request->docteur],
                ['dateConsultation', '=' , $request->date ] ])
                ->orderBy('temp')
                ->get();
            ;
             $heurs=['08:00am', '09:00am', '10:00am', '11:00am', '12:00pm', '14:00pm', '14:00pm', '15:00pm', '16:00am'];
             $heursOcuupe= array();
             foreach ($consultations as  $consultation) {
                array_push($heursOcuupe, $consultation->temp);
             }

             $heursValables=array_diff($heurs,$heursOcuupe);
              $html = '';
              foreach ($heursValables as $heursValable) {
              $html .= '<option value="'.$heursValable.'">'.$heursValable.'</option>';
                }
           
                    return response()->json(['html' => $html]);
           }
       
         
    }


    public function test(){

            // $consultations = Consultation::where([
            //     ['id_medecin', '=' , 4],
            //     ['dateConsultation', '=' , '2021-06-20' ] ])
            //     ->orderBy('temp')
            //     ->get();
            // ;
            //  $heurs=['08:00am', '09:00am', '10:00am', '11:00am', '12:00pm', '14:00pm', '14:00pm', '15:00pm', '16:00am'];
            
            // $heursOcuupe= array();
            //  foreach ($consultations as  $consultation) {
            //     array_push($heursOcuupe, $consultation->temp);
            //  }
            //   $heursValable=array_diff($heurs,$heursOcuupe);
            //   dd( $heursValable);
    }

    public function confirmer(Request $request){
      if(!Session::has('user')){
        $data =  $request->all();
        $consultationData = array();
        $consultationData['docteur']=$request->docteurs ;
        $consultationData['date'] = $request->date;
        $consultationData['heur'] = $request->heur;
        Session::put('consultationData', $consultationData);
        return  redirect('/patient/signUp');
      }else{

        $user=Session('user');
        $patient=Patient::where([
          ['id_user', '=', $user->id]
          ])
          ->get()
          ->first()
          ;

        $consultation = new Consultation();
        $consultation->id_patient= $patient->id_patient;
        $consultation->id_medecin=$request->docteurs;
        $consultation->dateConsultation=$request->date;
        $consultation->temp=$request->heur;
        $consultation->save();
        $consultation->refresh();

        $message = "Votre consultation est bien enregistre, une piéce justificatif est envoyé sur votre boite email";
        Session::put('Success', $message);
         return back();
      }
    }

}
