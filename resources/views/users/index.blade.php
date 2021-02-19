@extends('layouts.app')
   
@section('content')

<a href="{{ route('tasks.create') }}"><button type="button" class="btn btn-primary">Add New Task</button></a>
<table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>UserName</th>
                <th>Email</th>
                <th>Task</th>
                <th>Hours</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($userdata as $key=> $user)
                <tr>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                <td>{{$user->task}}</td>
                <td>{{$user->hours}}</td>
                </tr>          
            @endforeach
        </tbody>

    </table>
@endsection