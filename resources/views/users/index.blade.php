@extends('layouts.app')
   
@section('content')

<a href="{{ route('tasks.create') }}"><button type="button" class="btn btn-primary">Add New Task</button></a>
<table id="example" class="table table-striped table-bordered" style="width:100%">
{{ (float)$total = 0 }}
{{ $name = null }}
        <thead>
            <tr>
                <th>UserName</th>
                <th>Task</th>
                <th>Hours</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($userdata as $key=> $user)
                <tr>
                <td>{{$key}}</td>
                <td>
                @foreach ($user as $data)
                    {{$data['task'] .","}}
                @endforeach                
                </td>
                <td>
                @foreach ($user as $data)
                    @php
                        $total = $total+(float)$data['hours'];
                    @endphp
                @endforeach 
                {{$total}}            
                </td>
                </tr>          
            @endforeach
        </tbody>

    </table>
@endsection