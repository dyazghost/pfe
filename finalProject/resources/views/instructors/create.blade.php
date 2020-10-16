@extends('instructorLayout')
@section('instructorContent')

<div class="container">
    <br><br>
    @if($count == 24)
    <div class="row justify-content-center m-sm-3">
        <p class="text-success">
            <strong>All grades are added for this student!</strong>
        </p>
    </div>
    @endif
    @if (\Session::has('information_collection_error'))
    <div class="row justify-content-center m-sm-3">
        <p class="text-danger">Please choose the right information for the grade!</p>
    </div>
    @endif
    @if (\Session::has('error'))
    <div class="row justify-content-center m-sm-3">
        <p class="text-danger">Grade already exists! Try again.</p>
    </div>
    @endif
    @if (\Session::has('success'))
    <div class="row justify-content-center m-sm-3">
        <p class="text-success">Grade added successfully!</p>
    </div>
    @endif
    <div class="row justify-content-center">

        <form method="POST" action={{ $path }}>
            @csrf

            <div class="form-group row">
                <label for="studentName" class="col-sm-2 col-form-label">Name:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="student_name" id="studentName"
                        placeholder="{{ $students->fullname }}" readonly>
                </div>
            </div>

            <div class="form-group row">
                <label for="StudentCode" class="col-sm-2 col-form-label">Code:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="student_code" id="studentCode"
                        placeholder="{{ $students->student_code }}" readonly>
                    <input type="hidden" id="student_id" name="student_id" value="{{ $students->id }}">
                </div>
            </div>
            <div class="form-group row">
                <label for="Branch" class="col-sm-2 col-form-label">Branch:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="branch" id="branch"
                        placeholder="{{ $students->branch->branch_name  }}" readonly>
                </div>
            </div>
            <br>
            <div class="form-group mb-2 row">
                <label for="cars" class="col-sm-12 col-form-label"> Select semester:</label>
                <select class="form-control form-control-sm" name="semester_id" id="list1">
                <option value="0" selected>--select course--</option>
                    @foreach($semesters as $semester)
                    @if($count == 24)
                    <option value="{{ $semester->id}}" disabled>{{$semester->semester_name}}</option>
                    @else
                    <option value="{{ $semester->id}}">{{$semester->semester_name}}</option>
                    @endif
                    @endforeach
                </select>


                <label for="Courses" class="col-sm-12 col-form-label"> Select course:</label>
                <select class="form-control form-control-sm" name="course_id" id="list2" name="courses ">
                    <option value="0" data-tag="0" selected>--select course--</option>
                    @foreach($courses as $course)
                    @if($count == 24)
                    <option value="{{ $course->id}}" disabled>{{$course->course_name}}</option>
                    @else
                    <option value="{{ $course->id}}" data-tag="{{$course->semester_id}}">{{$course->course_name}}
                    </option>
                    @endif
                    @endforeach
                </select>
            </div>
            <script>
            $('#list1').on('change', function() {
                var selected = $(this).val();
                $("#list2 option").each(function(item) {
                    console.log(selected);
                    var element = $(this);
                    console.log(element.data("tag"));
                    if (element.data("tag") != selected) {
                        element.hide();
                    } else {
                        element.show();
                    }
                });

                $("#list2").val($("#list2 option:visible:first").val());

            });
            </script>
            <div class="form-group row">
                <label for="Name" class="col-sm-6 col-form-label">Course grade:</label>
                @if($count == 24)
                <input type="text" class="form-control" name="grade" id="grade" placeholder="{{ old('grade') }}"
                    disabled>
                @else
                <input type="text" class="form-control" name="grade" id="grade" placeholder="{{ old('grade') }}"
                    required>
                @endif
                @error('grade')
                <p class="text-danger">{{ $message }}</p>
                @enderror

            </div>
            <div class="row justify-content-center">
                @if($count == 24)
                <button type="submit" class="btn btn-primary" disabled>Submit</button>
                @else
                <button type="submit" class="btn btn-primary">Submit</button>
                @endif
            </div>
        </form>

    </div>
    <br><br><br><br><br>
</div>
@endsection