@extends('adminLayout')
@section('adminContent')
<div class="container p-4">
    <br><br>
    <div class="row justify-content-center">
        @if (\Session::has('sub_branch_exists'))
        <p class="text-danger text-center">
            A sub branch with that name already exists!.
        </p>
        @endif
    </div>

    <div class="row justify-content-center" style="margin-bottom:213px;margin-top:182px;">
        <form method="POST" action={{ $path }}>
            @csrf
            <div class="form-group row">
                <label for="branchName" class="col-sm-5 col-form-label">SubBranch Name:</label>
                <div class="col-sm-7">
                    <input type="text" class="form-control" name="sub_branch" required>
                    @error('sub_branch')
                    <p class="text-danger">Name must be between 2 and 5 characters</p>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label for="branches" class="col-sm-5 col-form-label"> Select branch:</label>
                <div class="col-sm-7">
                    <select class="form-control" name="branch">
                        @foreach($branches as $branch)
                        <option value="{{$branch->id}}">{{$branch->branch_name}}</option>
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