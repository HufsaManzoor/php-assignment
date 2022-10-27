@extends('layouts.core-layout')
@section('main-content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4">
            <span class="text-muted fw-light">Find the longest palindrome/</span>

        </h4>

        <div class="row">
            <form method="POST" action="/check-palindrome">
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
                        <h5 class="card-header">Palindrome Finder</h5>
                        <div class="card-body">

                            <div class="mb-3">
                                <label for="task_name" class="form-label">Enter any String</label>
                                <input type="text" class="form-control" id="task_name"
                                    placeholder="Task Name" name="palindrome_string" value="{{old('name')}}" />
                                @error('name')
                                    <div class="error">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="palindrome" class="form-label">The longest palindrome is: </label>
                                <input type="text" class="form-control" id="palindrome" readonly
                                    placeholder="Please enter the string." value="{{$palindrome}}" />
                                @error('name')
                                    <div class="error">{{ $message }}</div>
                                @enderror
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
