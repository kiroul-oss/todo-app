@extends('layouts.app')
@section('title','Create Todo')

@section('content')

    <div class="container pt-5">
        <div class="row justify-content-center mt-5">
            <div class="card" style="width:50%">
                <div class="card-header">
                    <h1 class="row justify-content-center">Create New Todo</h1>
                </div>
                <div class="card-body">
                   <form action="{{url('todos/store')}}" method="POST">
                       @csrf
                        <div class="form-group">
                            <input type="text" name="todoTitle" class="form-control" placeholder="Enter Todo Title" required>
                            @error('todoTitle')
                                <small class="form-text text-danger">{{$message}}</small>
                            @enderror
                        </div>
                       <div class="form-group">
                           <textarea  class="form-control" name="todoDescription" rows="3" placeholder="Enter Description Of Your Todo" required></textarea>
                           @error('todoDescription')
                                <small class="form-text text-danger">{{$message}}</small>
                           @enderror
                       </div>
                       <div class="form-group text-center">
                           <button type="submit" class="btn btn-success" style="width:40%">Create</button>
                       </div>
                   </form>
                </div>
            </div>
        </div>
    </div>


@endsection

