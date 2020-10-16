@extends('adminLayout')
@section('adminContent')
<div class="container">
    <div class="row justify-content-center" style="margin-bottom:120px; margin-top:80px;">
        <form method="POST" action="/admin/student">
            @csrf

            <center>
                @if (\Session::has('error'))
                <div class="alert alert-danger" style="width:100%" role="alert">
                    Student already exists! Try again.
                </div>
                @endif
                @if (\Session::has('branches'))
                <div class="alert alert-danger" style="width:100%" role="alert">
                    Please choose a branch and a subbranch!
                </div>
                @endif
            </center>

            <div class="form-group row">
                <label for="studentName" class="col-sm-5 col-form-label">Student name:</label>
                <div class="col-sm-7">
                    <input type="text" class="form-control" name="student_name" id="studentName"
                        placeholder="Student Name" value="{{old('student_name')}}" required>
                    @error('student_name')
                    <p class="text-danger">Invalid Name!</p>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label for="StudentCode" class="col-sm-5 col-form-label">Code:</label>
                <div class="col-sm-7">
                    <input type="text" class="form-control" name="student_code" id="studentCode"
                        placeholder="Student Code" value="{{old('student_code')}}" required>
                    @error('student_code')
                    <p class="text-danger">Invalid Code!</p>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label for="StudentCIN" class="col-sm-5 col-form-label">Student CIN:</label>
                <div class="col-sm-7">
                    <input type="text" class="form-control" name="student_CIN" id="studentCode"
                        placeholder="Student CIN" value="{{old('student_CIN')}}" required>
                    @error('student_CIN')
                    <p class="text-danger">Invalid CIN!</p>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label for="StudentCNE" class="col-sm-5 col-form-label">Student CNE:</label>
                <div class="col-sm-7">
                    <input type="text" class="form-control" name="student_CNE" id="studentCode"
                        placeholder="Student CNE" value="{{old('student_CNE')}}" required>
                    @error('student_CNE')
                    <p class="text-danger">Invalid CNE!</p>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label for="branch" class="col-sm-5 col-form-label">Branch:</label>
                <div class="col-sm-7">
                    <select id="list1" class="form-control" name="branch">
                        <option value="0" selected>--select branch--</option>
                        @foreach($branches as $branch)
                        <option value="{{$branch->id}}">{{$branch->branch_name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <br>
            <div class="form-group row">
                <label for="sub_branch" class="col-sm-5 col-form-label">Subbranch:</label>
                <div class="col-sm-7">
                    <select id="list2" class="form-control" name="sub_branch">
                        <option value="0" data-tag="0" selected>--select subbranch--</option>
                        @foreach($sub_branches as $sub_branch)
                        @if($sub_branch->id >= 97)
                        <option value="{{$sub_branch->id}}" data-tag="{{$sub_branch->branch_id}}">
                            {{$sub_branch->sub_branchName}}
                        </option>
                        @endif
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
            <div class="form-group row justify-content-center">
                <button type="submit" class="btn btn-primary mr-2">Submit</button>
            </div>
        </form>
    </div>
    <div class="form-group row justify-content-center">
        <a class="btn btn-outline-dark" href={{ route('students-index') }} role="button">Back</a>
    </div>
    <br>
</div>
@endsection