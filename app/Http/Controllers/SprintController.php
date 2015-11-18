<?php

namespace App\Http\Controllers;

use App\Http\Requests\NewSprintRequest;
use App\Sprint;
use Redirect;
use DB;

class SprintController extends Controller
{

    public function show($project_id){
        return view("sprint.add", compact("project_id"));
    }

     public function display($idProject, $idSprint){
        $userstories= DB::table('userstory')->where('project_id','=', $idProject)->where('sprint_id' , '=', $idSprint)->get();

        return view("sprint.AddUsToSprint")->with('userstories',$userstories)->with('idSprint', $idSprint);
    }

    public function listSprint($idProject){

        $sprint = DB::table('sprint')->where('project_id', '=', $idProject)->get();
        return view("sprint.SprintList")->with('sprint', $sprint)->with('idProject',$idProject) ;
    }
    public function add(NewSprintRequest $r, $project_id){

        Sprint::create([
            "StartDate" => $r->input("StartDate"),
            "EndDate" => $r->input("EndDate"),
            "project_id" => $project_id
        ]);

        return Redirect::action("SprintController@listSprint", [$project_id]);
    }

    public function edit($project_id, $sprint_id){

        $sprint = DB::table('sprint')->where('id', '=', $sprint_id)->first();
        $StartDate = $sprint->StartDate;
        $EndDate = $sprint->EndDate;

        return view("sprint.edit", compact("project_id", "StartDate", "EndDate", "sprint_id"));
    }

    public function editConfirm(NewSprintRequest $r, $project_id, $sprint_id){

        $us = Sprint::where('id', $sprint_id)->first();

        $us->update([
            "StartDate" => $r->input("StartDate"),
            "EndDate" => $r->input("EndDate"),
        ]);

        return Redirect::action("SprintController@listSprint", [$project_id]);
    }
}