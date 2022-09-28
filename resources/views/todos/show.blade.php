@extends('layouts.app')
@section('title','todo '.$todo->title)

@section('content')
    <div class="container">
        <h1 class="mt-5 text-center">{{$todo->title}}</h1>
        <div class="row pt-5 justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <span>Details</span>
                        <span class="badge badge-warning float-right">{{boolVal($todo->completed)?'Completed':'Non Completed'}}</span>
                    </div>
                    <div class="card-body">{{$todo->description}}</div>

                </div>
                <div class="form-group text-center mt-5">
                    <a href="/todos" class="btn btn-success" style="width:40%"><i class="fa fa-home mr-2"></i>Home</a>
                </div>
            </div>
        </div>
    </div>

@endsection
