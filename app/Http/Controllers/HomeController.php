<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    public function home(){
        $task_list = Task::orderBy('priority','asc')->get();
        $project_list = Project::all();
        return view('home',["tasks"=>$task_list,'project_list'=>$project_list]);
    }

    public function add(){
        $project_list = Project::all();
        return view('add',['project_list'=>$project_list]);
    }

    public function store(Request $request){
        $request->validate(['name'=>'required','priority'=>'required','project_id'=>'required'],$request->all());
        $data = $request->all();
        Task::create($data);
        session::flash('flash','Task added successfully');
        return redirect()->back();        
    }

    public function reorderList(Request $request){
        $task_list  = (array)json_decode($request->data);
        $chunk = ceil(count($task_list)/3);
        $priority_wise_list = array_chunk($task_list,$chunk);
        //dd($priority_wise_list);
        foreach($priority_wise_list as $key => $value){
            foreach($value as $k => $v){
                //dd($v);
                Task::where('id',$v)->update(['priority'=>$key+1]);
            }
        }
        $html=$this->getHtmlElement();
        return $html;
    }

    public function edit(Task $id){
        $project_list = Project::all();
        return view('edit',["task" => $id,'project_list'=>$project_list]);  
    }

    public function update(Request $request,Task $id){
        $request->validate(['name'=>'required','priority'=>'required','project_id'=>'required'],$request->all());
        $data = $request->all();        
        $id->update($data);
        session::flash('flash','Task updated successfully');
        return redirect()->back();        
    }

    public function delete(Request $request,Task $id){
        $id->delete();
        $html=$this->getHtmlElement();
        return $html;       
    }

    protected function getHtmlElement($project_id = null){
        if($project_id == null)
        $records = Task::orderBy('priority','asc')->get();
        else
        $records = Task::where('project_id',$project_id)->orderBy('priority','asc')->get();
        $html="";
        foreach($records as $k => $task){
            $html .='                        <tr draggable="true">
            <td><span class="glyphicon glyphicon-move"></span>'.$task->id.'</td>
            <td>'.$task->name.'</td>
            <td>'.$task->priority.'</td> <td>
            <a class="btn btn-secondary" href='.route('edit',$task->id).'>Edit</a>
            <a class="btn btn-secondary" onclick="deleteTask('.$task->id.')">Delete</a>
        </td>
        </tr>';
        }        
        return $html;
    }

    public function addProject(){
        return view("add-project");
    }

    public function storeProject(Request $request){
        $request->validate(['name'=>'required'],$request->all());
        $data = $request->all();
        Project::create(['name'=>$data["name"]]);
        session::flash('flash','Project added successfully');
        return redirect()->back();        
    }   
    public function ProjectWiseList(Request $request){
        $html=$this->getHtmlElement($request->project_id);
        return $html;   
    } 
}
