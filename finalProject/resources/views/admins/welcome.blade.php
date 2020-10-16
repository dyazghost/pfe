@extends('adminLayout')
@section('adminContent')

<div class="container p-4">
    <br>
    <div class="row justify-content-center mb-sm-3">
        <h3 class="display-5">Welcome, {{ Auth::user()->name }} !</h3>
    </div>
    <br><br><br><br><br>
    <div class="row justify-content-center" style="margin-bottom:50px;">
        <div class="col-sm-5 mr-2 text-center">
            <h3>Manage Students</h3>
            
            <a href="{{ route('students-index') }}" class="btn btn-primary" role="button">List all Students</a>
            <br><br>
        </div>
        <div class="col-sm-5 ml-2 text-center">
            <h3>Manage Educators</h3>
            
            <a href="{{ route('educators-index') }}" class="btn btn-warning" role="button">List all Educators</a>
            <br><br>
        </div>
    </div>
    <div class="row justify-content-center mt-4">
        <h3>Manage Content</h3>
    </div>
    <div class="row justify-content-center mt-2" style="margin-bottom:140px;">
        <div class="col-sm-5 text-center">
            <a href="{{ route('list-content') }}" class="btn btn-info" role="button">manage content</a>
        </div>
    </div>



</div>
@endsection