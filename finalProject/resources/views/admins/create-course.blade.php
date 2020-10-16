@extends('adminLayout')
@section('adminContent')
<div class="container p-sm-4">

    @if (\Session::has('course_create'))
    <div class="row justify-content-center">
        <p class="text-success text-center">
            Course is created successfully !.
        </p>
    </div>
    @endif
    @if (\Session::has('create_error'))
    <div class="row justify-content-center">
        <p class="text-danger text-center">
            It seems like there is a course with the same data !.
        </p>
    </div>
    @endif


    <div class="row justify-content-center" style="margin-bottom:213px;margin-top:150px;">
        <form method="POST" action={{ $path }}>
            @csrf
            <div class="form-group row">
                <label for="course" class="col-sm-4 col-form-label">Course:</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" name="course" required>
                    @error('course')
                    <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label for="diploma" class="col-sm-4 col-form-label"> Diploma:</label>
                <div class="col-sm-8">
                    <select id="list4" class="form-control" name="diploma">
                        @foreach($diplomas as $diploma)
                        <option value="{{$diploma->id}}" data-tag="{{$diploma->id}}">{{$diploma->diploma_name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="form-group row">
                <label for="branch" class="col-sm-4 col-form-label">Branch:</label>
                <div class="col-sm-8">
                    <select id="list1" class="form-control" name="branch">
                        <option value="0" selected>--select branch--</option>
                        @foreach($branches as $branch)
                        <option value="{{$branch->id}}">{{$branch->branch_name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="sub_branch" class="col-sm-4 col-form-label">Subbranch:</label>
                <div class="col-sm-8">
                    <select id="list2" class="form-control" name="sub_branch">
                        <option value="0" data-tag="0" selected>--select subbranch--</option>
                        @foreach($sub_branches as $sub_branch)
                        <option value="{{$sub_branch->id}}" data-tag="{{$sub_branch->branch_id}}">
                            {{$sub_branch->sub_branchName}}
                        </option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="semester" class="col-sm-4 col-form-label">Semester:</label>
                <div class="col-sm-8">
                    <select id="list5" class="form-control" name="semester">
                        @foreach($semesters as $semester)
                        <option value="{{$semester->id}}" data-tag="{{$semester->diploma_id}}">{{$semester->semester_name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="instructor" class="col-sm-4 col-form-label"> Instructor:</label>
                <div class="col-sm-8">
                    <select id="list3" class="form-control" name="instructor">
                    <option value="0" data-tag="0" selected>--select instructor--</option>
                        @foreach($instructors as $instructor)
                        <option value="{{$instructor->id}}" data-tag="{{$instructor->branch_id}}">{{$instructor->full_name}}</option>
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
            $('#list1').on('change', function() {
                var selected = $(this).val();
                $("#list3 option").each(function(item) {
                    console.log(selected);
                    var element = $(this);
                    console.log(element.data("tag"));
                    if (element.data("tag") != selected) {
                        element.hide();
                    } else {
                        element.show();
                    }
                });

                $("#list3").val($("#list3 option:visible:first").val());

            });
            $('#list4').on('change', function() {
                var selected = $(this).val();
                $("#list5 option").each(function(item) {
                    console.log(selected);
                    var element = $(this);
                    console.log(element.data("tag"));
                    if (element.data("tag") != selected) {
                        element.hide();
                    } else {
                        element.show();
                    }
                });

                $("#list5").val($("#list5 option:visible:first").val());

            });
            </script>
            <br>
            <center>
                <button type="submit" class="btn btn-primary">Submit</button>
            </center>
        </form>
    </div>
    <br>
</div>
@endsection