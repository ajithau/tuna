@extends('layouts.app')
   
@section('content')

<a href="{{ route('tasks.create') }}"><button type="button" class="btn btn-primary">Add New Task</button></a>
<table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>Task</th>
                <th>User</th>
                <th>Hours</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($taskData as $task)
            <tr>
                <td>{{$task->task}}</td>
                <td>{{$task->user->name}}</td>
                <td>{{$task->hours}}</td>
                <td>
                    <a href="{{ route('tasks.edit',$task->id) }}">
                        <i class="far fa-edit"></i>
                    </a>                          
                    <form action="{{ route('tasks.destroy',$task->id) }}" method="POST">
                        {{-- @csrf
                        @method('DELETE') --}} 
                        
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
                </tr>
            @endforeach
        </tbody>

    </table>
@endsection