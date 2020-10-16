@extends('adminLayout')
@section('adminContent')
<div class="container p-4">
    <br><br>
    @if (\Session::has('select'))
    <div class="row justify-content-center m-sm-2">
        <div class="alert alert-danger text-center" style="width:30%" role="alert">
            <p class="text-danger">Please select the correct informations!</p>
        </div>
    </div>
    @endif
    @if (\Session::has('select2'))
    <div class="row justify-content-center m-sm-2">
        <div class="alert alert-danger text-center" style="width:30%" role="alert">
            <p class="text-danger">Please select the correct informations!</p>
        </div>
    </div>
    @endif

    <div class="row justify-content-center" style="margin-bottom:125px;margin-top:145px;">
        <form method="POST" action="/admin/content/courses/list">
            @csrf

            <div class="form-group row">
                <label for="branchName" class="col-sm-5 col-form-label">Select Branch:</label>
                <div class="col-sm-7">
                    <select id="list1" class="form-control" name="branch">
                        <option value="0" selected>--select branch--</option>
                        @foreach($branches as $branch)
                        <option value="{{$branch->id}}">{{$branch->branch_name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="subbranches" class="col-sm-5 col-form-label"> Select Subbranch:</label>
                <div class="col-sm-7">
                <select id="list2" class="form-control" name="sub_branch">
                        <option value="0" data-tag="0" selected>--select subbranch--</option>
                        @foreach($sub_branches as $sub_branch)
                        <option value="{{$sub_branch->id}}" data-tag="{{$sub_branch->branch_id}}">{{$sub_branch->sub_branchName}}</option>
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
            <div class="form-group row">
                <label for="semesters" class="col-sm-5 col-form-label"> Select Semester:</label>
                <div class="col-sm-7">
                    <select class="form-control" name="semester">
                        @foreach($semesters as $semester)
                        <option value="{{$semester->id}}">{{$semester->semester_name}}</option>
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