@extends('layouts.core-layout')
@section('main-content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4">
      <span class="text-muted fw-dark">Dashboard/</span>
      
    </h4>

    <div class="row">
<div class="col-12">
    <div class="card mb-4">
      <h5 class="card-header"> Task Actions</h5>
      <div class="card-body">
        <small class="text-light fw-semibold">CRUD for Tasks</small>
        <div class="demo-inline-spacing">
          <a href="/add-task" type="button" class="btn btn-primary">Add a new Task</a>
          <a href="/list-tasks" type="button" class="btn btn-warning">View/Edit/Delete Tasks</a>
          <a href="/completed-tasks" type="button" class="btn btn-success">View Completed Tasks</a>
          <a href="/pending-tasks" type="button" class="btn btn-info">View Pending Tasks</a>
      
        </div>
      </div>
    </div>
  </div>


  <div class="col-12">
    <div class="card mb-4">
      <h5 class="card-header"> Palindrome Actions</h5>
      <div class="card-body">
        <small class="text-light fw-semibold">Palindrome Checker</small>
        <div class="demo-inline-spacing">
          <a href="/check-palindrome" type="button" class="btn btn-primary">Check Palindrome</a>
        
      
        </div>
      </div>
    </div>
  </div>




</div>
</div>
@endsection