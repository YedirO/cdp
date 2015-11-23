<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\AddUsToSprintRequest;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Userstory;
use Redirect;
use Session;
use DB; 


class UsSprintController extends Controller
{
   public function show($idProject){
        $userstories= DB::table('userstory')->Where('sprint_id','=', 0)->where('project_id', '=', $idProject)->get();
        return view("sprint.AddUsToSprint")->with('userstories',$userstories);
    }

    public function showSprint ($idSprint){
        $userstories= DB::table('userstory')->Where('sprint_id','=', $idSprint)->get();
        return view("sprint.DeleteUsFromSprint")->with('userstories', $userstories);
    }

	public function add (Request $request, $idProject, $idUs, $idSprint){

        $userstory = DB::table('userstory')->where('id', '=', $idUs)->update(["sprint_id" => $idSprint]); 
		//Session::flash("success", "Votre us a bien été ajoutée.");           
        return Redirect::action("UsSprintController@showSprint")->with('idSprint', $idSprint);
    }

    public function delete (Request $request, $idProject, $idUs){

        $userstory = DB::table('userstory')->where('id', '=', $idUs)->update(["sprint_id" => 'NULL']); 

        Session::flash("success", "Votre us a bien supprimée.");
        
        return Redirect::action("UsSprintController@show")->with('idProject', $idProject);
    }
    
}
