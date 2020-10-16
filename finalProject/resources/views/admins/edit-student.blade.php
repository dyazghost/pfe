@extends('adminLayout')
@section('adminContent')
<div class="container p-2">
    @if (\Session::has('fail1'))
    <div class="row justify-content-center m-sm-2">
        <div class="alert alert-danger text-center" style="width:30%" role="alert">
            <p class="text-danger">Student already exists! Try again.</p>
        </div>
    </div>
    @endif
    @if (\Session::has('student_grades_fail'))
    <div class="row justify-content-center m-sm-2">
        <div class="alert alert-danger text-center" style="width:30%" role="alert">
            <p class="text-danger">This student still has some grades left!.</p>
        </div>
    </div>
    @endif
    @if (\Session::has('branches'))
    <div class="row justify-content-center mt-sm-2">
        <div class="alert alert-danger text-center" style="width:30%" role="alert">
            <p class="text-danger">Please select the right informations!</p>
        </div>
    </div>
    @endif

    <div class="row justify-content-center m-sm-4">
        <form method="POST" action={{ $path }}>
            @csrf
            @method('PUT')

            <div class="form-group row">
                <label for="studentName" class="col-sm-5 col-form-label">Student Name:</label>
                <div class="col-sm-7">
                    <input type="text" class="form-control" name="student_name" id="studentName"
                        value="{{ $student->fullname }}" required>
                    <p class="text-danger">{{ $errors->first('student_name') }}</p>
                </div>
            </div>

            <div class="form-group row">
                <label for="StudentCode" class="col-sm-5 col-form-label">Code:</label>
                <div class="col-sm-7">
                    <input type="text" class="form-control" name="student_code" id="student_code"
                        value="{{ $student->student_code }}">
                    <p class="text-danger">{{ $errors->first('student_code') }}
                        <input type="hidden" id="student_id" name="student_id" value="{{ $student->id }}" required>
                </div>
            </div>
            <div class="form-group row">
                <label for="StudentCode" class="col-sm-5 col-form-label">Student CIN:</label>
                <div class="col-sm-7">
                    <input type="text" class="form-control" name="student_CIN" id="student_CIN"
                        value="{{ $student->student_CIN }}" required>
                    <p class="text-danger">{{ $errors->first('student_CIN') }}
                </div>
            </div>
            <div class="form-group row">
                <label for="StudentCode" class="col-sm-5 col-form-label">Student CNE:</label>
                <div class="col-sm-7">
                    <input type="text" class="form-control" name="student_CNE" id="studentCode"
                        value="{{ $student->student_CNE }}" required>
                    <p class="text-danger">{{ $errors->first('student_CNE') }}
                </div>
            </div>
            <div class="form-group row">
                <label for="Branch" class="col-sm-5 col-form-label">Branch:</label>
                <div class="col-sm-7">
                    <select id="list1" class="form-control" name="branch">
                        <option value="0" selected>--select branch--</option>
                        @foreach($branches as $branch)
                        <option value="{{$branch->id}}" @if($branch->id==$student->branch_id) selected @endif>{{$branch->branch_name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="Branch" class="col-sm-5 col-form-label">Sub Branch:</label>
                <div class="col-sm-7">
                    <select id="list2" class="form-control" name="sub_branch">
                        <option value="0" data-tag="0" selected>--select subbranch--</option>
                        @foreach($sub_branches as $sub_branch)
                        <option value="{{$sub_branch->id}}" data-tag="{{$sub_branch->branch_id}}" @if($sub_branch->id==$student->sub_branch_id) selected @endif>
                            {{$sub_branch->sub_branchName}}
                        </option>
                        @endforeach
                    </select>
                </div>
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
            <br>
            <div class="text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
    <div class="text-center mt-sm-3">
        <form method="post" action={{$path}}>
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger" data-toggle="tooltip"
                title="Be Aware! All this student grades will be deleted!">Delete Student</button>
            <script>
            $(document).ready(function() {
                $('[data-toggle="tooltip"]').tooltip();
            });
            </script>
        </form>
    </div>
    <br>
    <div class="row justify-content-center mt-sm-4">
        <a class="btn btn-outline-dark" href={{ route('students-index') }} role="button">Back</a>
    </div>
</div>
@endsection