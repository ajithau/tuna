@extends('layouts.app')

@section('content')
<main>

    <form action="{{ route('tasks.store') }}" method="POST"> 
            {{ csrf_field() }}
        
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Task:</strong>
                        <input type="text" name="task" class="form-control" placeholder="Task">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>User:</strong>
                        <select  name="userid" >
                        @foreach($users as $user)
                            <option  value="{{$user->id}}">{{$user->name}}</option>
                        @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Hours:</strong>
                        <input type="time" id="inputMDEx1" class="form-control" name='hours'>
                        <label for="inputMDEx1">Choose your time</label>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                        <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
        
        </form>

</main

@endsection