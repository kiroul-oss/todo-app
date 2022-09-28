@extends('layouts.app')
@section('title','Todo')
@section('content')
{{--    @if(Session::has('success'))--}}
{{--        <div class="alert alert-success">--}}
{{--            {{Session::get('success')}}--}}
{{--        </div>--}}

{{--    @endif--}}


    <div class="container pt-5">
        <div class="row justify-content-center mt-5">
            <div class="card" style="width:50%">
                <div class="card-header">
                    <h1 class="row justify-content-center">Edit Todo</h1>
                </div>
                <div class="card-body">

                    <form action="{{url('todos/update/'.$todo->id)}}" method="POST">
                        @csrf
                        <div class="form-group">
                            <input type="text" name="todoTitle" class="form-control" value="{{$todo->title}}" required>
                            @error('todoTitle')
                            <small class="form-text text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <textarea rows="3"  class="form-control" name="todoDescription" required>{{$todo->description}}</textarea>
                            @error('todoDescription')
                            <small class="form-text text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="form-group text-center">
                            <button type="submit" class="btn btn-success" style="width:40%">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
{{--    @endforeach--}}
@endsection
