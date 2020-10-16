@extends('studentLayout')
@section('studentContent')
<div class="container">
    
    <div class="row justify-content-center" style="margin-top:100px; margin-bottom:100px;">
        <h3>Welcome, {{ Auth::user()->name }} !</h3>
    </div>
    @if (\Session::has('error'))
    <div class="row justify-content-center">
        <p class="text-danger">
            Sorry! we couldn't find a student with that code
        </p>
    </div>
    @endif
    <div class="row justify-content-center" style="margin-bottom:204px;">

        <form class="form-inline p-5 mb-5 mt-3" method="POST" action="/student">
            @csrf
            <div class="form-group mx-sm-3 mb-2">
                <input name="student_code" type="text" class="form-control" id="inputPassword2" placeholder="Your code">
            </div>
            <button type="submit" class="btn btn-outline-primary mb-2">Search</button>
        </form>

    </div>
</div>
@endsection