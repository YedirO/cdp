<?php
/**
 * User: oumaziz
 * Date: 12/11/15
 * Time: 11:32
 */

namespace App\Http\Controllers;

use App\Project;
use App\Tache;
use Illuminate\Support\Facades\Auth;
use App\Visitor;
use jyggen\Curl\Exception\CurlErrorException;
use jyggen\Curl\HeaderBag;
use jyggen\Curl\Request;

use GrahamCampbell\GitHub\Facades\GitHub;

class CommitsController extends Controller
{
    private $commits = array();
    private $position = 0;

    public function show($project_id, $task_id, $key = null)
    {
        if ($key != null) {
            if (Visitor::where("key", $key)->where("project_id", $project_id)->get() != null) {
                return $this->showCommits($task_id, $project_id);
            }else{
                return Redirect()->action('Auth\AuthController@getLogin');
            }
        }else{
            if (Auth::user()->id) return $this->showCommits($task_id, $project_id);
            else return Redirect()->action('Auth\AuthController@getLogin');
        }
    }

    private function showCommits($task_id, $project_id){

        $project = Project::where("id", $project_id)->get()->first();
        $taskCode = Tache::where("id", $task_id)->get()->first()->code;
        $repo = explode('/', $project->repo);
        $sha = $project->branch;

        try {

            $oldReturn = null;
            $return =  $this->parseData($taskCode,
                GitHub::repo()->commits()->all($repo[0], $repo[1],
                    array('sha' => $sha, 'per_page' => 100)));

            while(($return != null) && ($oldReturn != $return)){

                $oldReturn = $return;
                $return =  $this->parseData($taskCode,
                    GitHub::repo()->commits()->all($repo[0], $repo[1],
                        array('sha' => $return, 'per_page' => 100)));

            }

            //dd($this->commits);

            return view("commits.index")->with('commits',$this->commits);

        }catch(CurlErrorException $e){ return "Oups. Une erreur réseau est survenue :("; }


        //return GitHub::repo()->commits()->all('hardwork2015', 'cdp', array('sha' => 'dev'));
    }

    private function parseData($taskCode, $data){

        $commits = $data;

        for($i = 0; $i < count($commits); $i++){
            if(strstr($commits[$i]["commit"]["message"], $taskCode)){
                $this->commits[$this->position]["message"] = $commits[$i]["commit"]["message"];
                $this->commits[$this->position]["url"] = $commits[$i]["html_url"];
                $this->commits[$this->position]["user"] = $commits[$i]["commit"]["author"]["name"];
                $this->commits[$this->position]["date"] = $commits[$i]["commit"]["author"]["date"];
                //$this->commits[$this->position]["user_url"] = $commits[$i]->author->html_url;

                $this->position++;
            }
        }

        return $commits[count($commits) - 1]["sha"];
    }
}