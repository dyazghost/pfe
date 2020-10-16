@extends('adminLayout')
@section('adminContent')
<div class="container p-4">
    @if(\Session::has('course_edited'))
    <div class="row justify-content-center m-sm-2">
        <p class="text-success">Course is edited successfully!</p>
    </div>
    @endif
    @if(\Session::has('course_unchanged'))
    <div class="row justify-content-center m-sm-2">
        <p class="text-primary">Course is unchanged!</p>
    </div>
    @endif
    <div class="row justify-content-center" style="margin-bottom:180px;margin-top:182px;">
        <form method="POST" action={{$path}}>
            @csrf
            @method('PUT')

            <div class="form-group row">
                <label for="coursename" class="col-sm-4 col-form-label">Course Name:</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" name="course" value="{{ $course->course_name }}" required>
                    <input type="hidden" name="course_id" value="{{$course->id}}">
                </div>
            </div>
            <div class="form-group row">
                <label for="branchName" class="col-sm-4 col-form-label">Select Instructor:</label>
                <div class="col-sm-8">
                    <select class="form-control" name="instructor">
                        @foreach($instructors as $instructor)
                        @if($course->branch_id == $instructor->branch_id)
                        <option value="{{$instructor->id}}" @if($course->instructor_id == $instructor->id) selected
                            @endif>{{$instructor->full_name}}</option>
                        @endif
                        @endforeach

                    </select>
                </div>
            </div>
            <br>
            <center>
                <button type="submit" class="btn btn-primary">Submit</button>
            </center>
        </form>
    </div>
    <br>
</div>
@endsection