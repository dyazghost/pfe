@extends('adminLayout')
@section('adminContent')

<div class="container">
    <br>

    <div class="row justify-content-center">
        <form >
            <div class="form-group row">
                <label for="educatorName" class="col-sm-5 col-form-label">Instructor Name:</label>
                <div class="col-sm-7">
                    <input type="text" class="form-control" name="full_name" id="educatorName"
                        value="{{ $instructor->full_name }}" required>
                    <p class="text-danger">{{ $errors->first('educator_name') }}</p>
                </div>
            </div>
            <div class="form-group row">
                <label for="Branch" class="col-sm-5 col-form-label">Branch:</label>
                <div class="col-sm-7">
                    <input type="text" class="form-control" name="branch" id="branch"
                        placeholder="{{ $instructor->branch->branch_name }}" required>
                    <p class="text-danger">{{ $errors->first('branch') }}
                </div>
            </div>
            <div class="form-group row">
                <label for="Branch" class="col-sm-5 col-form-label">Sub Branch:</label>
                <div class="col-sm-7">
                    <input type="text" class="form-control" name="sub_branch" id="sub_branch"
                        placeholder="{{ $instructor->subBranch->sub_branchName }}" required>
                    <p class="text-danger">{{ $errors->first('sub_branch') }}
                </div>
            </div>
            <br>
            <center>
                <button type="submit" class="btn btn-primary">Submit</button>
                <form method="post" action={{ "admin/educator/".$instructor->id }}>
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </center>
        </form>

    </div>
    <div class="row justify-content-center">
        <a class="btn btn-outline-dark" href={{ url()->previous() }} role="button">Back</a>
    </div>

</div>

@endsection