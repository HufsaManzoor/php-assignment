@extends('layouts.core-layout')
@section('main-content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4">
            <span class="text-muted fw-light">Editing Task {{$task->task_name}}/</span>

        </h4>

        <div class="row">
            <form method="POST" action="/task/edit/{{$task->id}}" ">
                @csrf
                <div class="col-md-12">
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
                    <div class="card mb-4">
                        <h5 class="card-header">{{$task->task_name}} Details</h5>
                        <div class="card-body">

                            <div class="mb-3">
                                <label for="task_name" class="form-label">Task Name</label>
                                <input type="text" class="form-control" id="task_name"
                                    placeholder="Task Name" name="name" value="{{$task->task_name}}" />
                                @error('name')
                                    <div class="error">{{ $message }}</div>
                                @enderror
                            </div>




                            <div class="mb-3">
                                <label for="task_detail" class="form-label">Task Details</label>
                                <textarea class="form-control" id="task_detail"
                                    placeholder="Task Details" name="details"  > {{$task->details}}</textarea>
                                @error('details')
                                    <div class="error">{{ $message }}</div>
                                @enderror
                            </div>


                            <div class="mb-3">
                                <label for="iscomplete" class="form-label">Is Completed? </label>
                                <input type="checkbox" id="iscomplete"
                                 name="isComplete" value="completed" {{$task->isComplete == true ? "checked" : ""}}> </input>
                               
                            </div>


                            

                            <div class="demo-inline-spacing">
                                <input type="submit" value="Submit" class="btn btn-success" />

                            </div>




                        </div>
                    </div>
            </form>
        </div>
    </div>
@endsection
