@extends('adminLayout')
@section('adminContent')
<div class="container p-sm-4">
    <br><br>
    <div class="row justify-content-center">
        @if (\Session::has('exists'))
        <p class="text-danger text-center">
            That name is taken!.
        </p>
        @endif
    </div>

    <div class="row justify-content-center" style="margin-bottom:213px;margin-top:182px;">
        <form method="POST" action={{$path}}>
            @csrf
            <div class="form-group row">

                <label for="branchName" class="col-sm-5 col-form-label">Branch Name:</label>
                <div class="col-sm-7">
                    <input type="text" class="form-control" name="branch" id="branch_name" required>
                    @error('branch')
                    <p class="text-danger">Name must be between 2 and 5 characters</p>
                    @enderror
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