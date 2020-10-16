@extends('adminLayout')
@section('adminContent')
<div class="container">
    <br><br><br>

    @if (\Session::has('fail2'))
    <div class="row justify-content-center mt-sm-2">
        <div class="alert alert-danger text-center" style="width:30%" role="alert">
            <p class="text-danger">Instructor already exists! Try again.</p>
        </div>
    </div>
    @endif
    @if (\Session::has('edu_delete_error'))
    <div class="row justify-content-center mt-sm-2">
        <div class="alert alert-danger text-center" style="width:30%" role="alert">
            <p class="text-danger">Some courses are still assigned to this instructor!</p>
        </div>
    </div>
    @endif
    @if (\Session::has('select'))
    <div class="row justify-content-center mt-sm-2">
        <div class="alert alert-danger text-center" style="width:30%" role="alert">
            <p class="text-danger">Please choose the right informations!</p>
        </div>
    </div>
    @endif
    <div class="row justify-content-center" style="margin-top:120px; margin-bottom:20px;">
        <form method="POST" action={{ $path }}>
            @csrf
            @method('PUT')

            <div class="form-group row">
                <label for="educatorName" class="col-sm-5 col-form-label">Instructor Name:</label>
                <div class="col-sm-7">
                    <input type="text" class="form-control" name="full_name" id="educatorName"
                        value="{{ $instructor->full_name }}" required>
                    @error('full_name')
                    <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label for="Branch" class="col-sm-5 col-form-label">Branch:</label>
                <div class="col-sm-7">
                    <select class="form-control" id="list1" name="branch">
                        <option value="0" selected>--select branch--</option>
                        @foreach($branches as $branch)
                        <option value="{{$branch->id}}" @if($branch->id==$instructor->branch_id) selected @endif>{{$branch->branch_name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="Branch" class="col-sm-5 col-form-label">Sub Branch:</label>
                <div class="col-sm-7">
                    <select class="form-control" id="list2" name="sub_branch">
                        <option value="0" data-tag="0" selected>--select subbranch--</option>
                        @foreach($sub_branches as $sub_branch)
                        @if($sub_branch->id < 97) <option value="{{$sub_branch->id}}"
                            data-tag="{{$sub_branch->branch_id}}" @if($sub_branch->id==$instructor->sub_branch_id) selected @endif>{{$sub_branch->sub_branchName}}</option>
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
            <br>
            <div class="text-center"><button type="submit" class="btn btn-primary">Submit</button></div>
        </form>

    </div>
    <div class="text-center" style="margin-bottom:119px;">
        <form method="post" action={{ $path }}>
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Delete</button>
        </form>
    </div>
    <div class="row justify-content-center mt-sm-2">
        <a class="btn btn-outline-dark" href={{ route('educators-index') }} role="button">Back</a>
    </div>
</div>
@endsection