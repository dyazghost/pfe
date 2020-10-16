@extends('adminLayout')
@section('adminContent')
<div class="container p-4">
    <br><br>

    <div class="row justify-content-center" style="margin-bottom:190px; margin-top:210px;">
        <form method="POST" action={{ $path }}>
            @csrf
            @method('PUT')

            <div class="form-group row">
                <label for="branchName" class="col-sm-5 col-form-label">Branch Name:</label>
                <div class="col-sm-7">
                    <input type="text" class="form-control" name="branch" id="branch_name"
                        value="{{ $branch->branch_name }}" required>
                    <input type="hidden" name="branch_id" value="{{ $branch->id }}">
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
    <div class="row justify-content-center">
        <form method="POST" action={{ $path }}>
            @csrf
            @method('DELETE')

            <button type="submit" class="btn btn-danger">Delete</button>

        </form>
    </div>
    <br>
</div>
@endsection