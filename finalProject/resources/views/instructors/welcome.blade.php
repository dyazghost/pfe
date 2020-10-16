@extends('instructorLayout')
@section('instructorContent')
<br><br><br>
<br><br><br>
<div class="container">
    
    <div class="row justify-content-center">
        <h3>Welcome, {{ Auth::user()->name }} !</h3>
    </div>
    <br><br>
    @if (\Session::has('error'))
    <div class="row justify-content-center">
        <p class="text-danger">
            Sorry! we couldn't find a student with that code
        </p>
    </div>
    @endif
    <div class="row justify-content-center">
        <form class="form-inline p-4 m-4" method="POST" action="/instructor">
            @csrf
            <div class="form-group mx-sm-3 mb-2">
                <input name="student_code" type="text" class="form-control" id="inputPassword2" placeholder="Your code" required>
            </div>
            <button type="submit" class="btn btn-outline-primary mb-2">Search</button>
        </form>
    </div>
    <div class="row justify-content-center">
        <strong>or</strong>
    </div>

    <div class="row p-4 m-4 justify-content-center">
        <a href="{{ route('instructor-index') }}" class="btn btn-info" role="button">List all students</a>
    </div>

</div>
<br><br><br><br>

@endsection