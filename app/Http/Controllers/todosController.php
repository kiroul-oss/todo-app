<?php

namespace App\Http\Controllers;

use App\Todo;
use Dotenv\Validator;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;

class todosController extends Controller
{
    public function index(){
        $todos=Todo::all();
        return view('todos.index')->with('todos',$todos);
    }

    public function show($todo_id){
        $todos=Todo::find($todo_id);
        if(!$todos){
            return redirect()->back();
        }
        return view('todos.show')->with('todo',$todos);
    }

    public function edit($todo_id){
        $todos=Todo::find($todo_id);
        if(!$todos){
            return redirect()->back();
        }
        return view('todos.edit')->with('todo',$todos);
    }

    public function create(){
        return view('todos.create');
    }

    public function store(Request $request){
        $rules=['todoTitle'=>'required|min:4','todoDescription'=>'required'];
        $validator=\Illuminate\Support\Facades\Validator::make($request->all(),$rules,[]);
//        $validator=Validator::make($request->all(),$rules,[]);
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput($request->all());
        }
        Todo::create([
            'title'=>$request->todoTitle,
            'description'=>$request->todoDescription,
        ]);
        return redirect('todos')->with(['success'=>'Successfully Added']);
    }

    public function get($todo_id){
        $todo=Todo::find($todo_id);
        if(!$todo){
            return redirect()->back();
        }
        return view('todos.get')->with('todo',$todo);
    }

    public function update(Request $request,$todo_id){
        $rules=['todoTitle'=>'required|min:4','todoDescription'=>'required'];
        $validator=\Illuminate\Support\Facades\Validator::make($request->all(),$rules,[]);
//        $validator=Validator::make($request->all(),$rules,[]);
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput($request->all());
        }
        $todo=Todo::find($todo_id);
        if(!$todo){
            return redirect()->back();
        }
        $todo->update(['title'=>$request->todoTitle,'description'=>$request->todoDescription]);
        return redirect('todos')->with(['success'=>'Seccessfully Updated']);
    }

    public function destroy($todo_id){
        $todo=Todo::find($todo_id);
        $todo->delete();
        return redirect('todos');
    }

    public function completed($todo_id){
        $todo=Todo::find($todo_id);
        $todo->update(['completed'=>true]);
//        return redirect('todos/show/'.$todo_id);
        return redirect()->back();
    }
}
