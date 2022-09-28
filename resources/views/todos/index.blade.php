@extends('layouts.app')
@section('title','all-todos')

@section('content')
    @if(\Illuminate\Support\Facades\Session::has('success'))
        <div class="alert alert-success" role="alert">
            {{Session::get('success')}}
        </div>
    @endif
    <div class="container">
        <div class="row pt-3 justify-content-center">
            <div class="card" style="width:50%">
            <div class="card-header text-center">
                <h1>All Todos</h1>
            </div>

                <div class="card-body">
                <ul class="list-group">
                    @forelse($todos as $todo)
                        <li class="list-group-item text-muted">
                            {{$todo->title}}
                            <span class="float-right"><a href="todos/delete/{{$todo->id}}"  style="color:#e52828"><i class="fa fa-trash-o"></i></a></span>
                            <span class="float-right mr-2"><a href="{{url('todos/get/'.$todo->id)}}" style="color:#4caf50"><i class="fa fa-pencil-square-o"></i></a></span>
                            <span class="float-right mr-2"><a href="todos/show/{{$todo->id}}" style="color:#00bcd4"><i class="fa fa-eye"></i></a></span>
                            @if(boolVal($todo->completed)==0)
                                <span class="float-right mr-2"><a href="todos/complete/{{$todo->id}}" style="color:#ceae07"><i class="fa fa-check-square"></i></a></span>
                            @endif
                        </li>
                    @empty
                        <p class="text-center"> No Todos </p>
                    @endforelse
                </ul>
            </div>
                <div class="form-group text-center">
                    <a href="todos/create" type="submit" class="btn btn-success" style="width:40%">Add NEW Todo</a>
                </div>
            </div>
        </div>
    </div>


@endsection
