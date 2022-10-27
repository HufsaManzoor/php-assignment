@extends('layouts.core-layout')
@section('datatable-css')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.css">
  
@endsection
@section('main-content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4">
            <span class="">{{$title}}</span>

        </h4>

        <div class="row">

            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            @if (session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif
            <div class="table-responsive">
                <table id="list" class="table display table-bordered table-striped">
                    <thead>
                        <tr>
                            <th class="text-center">S. NO</th>

                            <th class="text-center">Task Name</th>
                            <th class="text-center">Task Details</th>
                            <th class="text-center">Task Completion Status</th>
                            <th class="text-center">Action</th>

                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($tasks as $task)
                            <tr>
                                <td class="text-center">{{ $loop->iteration }}</td>

                                <td class="text-center">{{ $task->task_name }}</td>
                                <td class="text-center">{{ $task->details }}</td>
                                <td class="text-center"> @if($task->isComplete == true)
                                <strong>Task Completed</strong>
                                @else 
                                <strong>Incomplete</strong>
                                <form action="/task/complete/{{ $task->id }}" method="post"
                                   >
                                    @csrf
                                    
                                    <button type="submit" name="button" class=" btn btn-success"
                                        data-toggle="tooltip" data-placement="top" title="Complete Task">Mark as Completed</button>
                                </form>
                                @endif
                                
                            </td>
                                
                                <td>
                                    <div class="row justify-content-center">
                                        <div class="col-6">


                                        <a href="/task/edit/{{$task->id}}" class=" btn btn-warning "
                                            data-toggle="tooltip" data-placement="top" title="Edit Task">Edit</a>

                                    <form action="/task/delete/{{ $task->id }}" method="post"
                                        onsubmit="return confirm('Do you really want to delete?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" name="button" class=" btn btn-danger mt-2"
                                            data-toggle="tooltip" data-placement="top" title="Delete Task">Delete</button>
                                    </form>
                               
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>

                </table>
            </div>
        </div>
    </div>
@endsection
@section('datatable-js')

<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js"></script>

<script>
$(document).ready(function () {
    $('#list').DataTable();
});
</script>

@endsection
