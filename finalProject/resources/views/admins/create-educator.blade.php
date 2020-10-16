@extends('adminLayout')
@section('adminContent')
<div class="container">
    <br><br><br>
    @if (\Session::has('fail2'))
    <div class="row justify-content-center mt-sm-2">
        <div class="alert alert-danger text-center" style="width:30%" role="alert">
            Instructor already exists!
            </p>
        </div>
    </div>
    @endif
    @if (\Session::has('select'))
    <div class="row justify-content-center mt-sm-2">
        <div class="alert alert-danger text-center" style="width:40%" role="alert">
            <p class="text-danger">
                Please select the right informations!
            </p>
        </div>
    </div>
    @endif
    <div class="row justify-content-center" style="margin-top:150px; margin-bottom:141px">
        <form method="POST" action="/admin/educator">
            @csrf
            <div class="form-group row">
                <label for="studentName" class="col-sm-5 col-form-label">Instructor name:</label>
                <div class="col-sm-7">
                    <input type="text" class="form-control" name="full_name" id="full_name" placeholder="Name" required>
                    @error('full_name')
                    <p class="text-danger">{{ $message}}</p>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label for="Branch" class="col-sm-5 col-form-label">Branch:</label>
                <div class="col-sm-7">
                    <select id="list1" class="form-control" name="branch_id">
                        <option value="0" selected>--select branch--</option>
                        @foreach($branches as $branch)
                        <option value="{{$branch->id}}">{{$branch->branch_name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <br>
            <div class="form-group row mb-sm-4">
                <label for="sub_branches" class="col-sm-5 col-form-label"> Sub Branch:</label>
                <div class="col-sm-7">
                    <select id="list2" class="form-control" name="sub_branch_id">
                        <option value="0" data-tag="0" selected>--select subbranch--</option>
                        @foreach($sub_branches as $sub_branch)
                        @if($sub_branch->id < 97) <option value="{{$sub_branch->id}}"
                            data-tag="{{$sub_branch->branch_id}}">
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
            <div class="text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
    <div class="text-center" stye="margin-top:80px;">
        <a class="btn btn-outline-dark" href={{ route('educators-index') }} role="button">Back</a>
    </div>

</div>
@endsection