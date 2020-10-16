@extends('adminLayout')
@section('adminContent')
<div class="container p-4">
    @if(\Session::has('diploma_error'))
    <div class="row justify-content-center m-sm-3">
        <p class="text-danger">That name is used!</p>
    </div>
    @endif
    <div class="row justify-content-center" style="margin-bottom:200px;margin-top:230px;">
        <form method="POST" action={{ $path }}>
            @csrf
            @method('PUT')

            <div class="form-group row">
                <label for="branchName" class="col-sm-5 col-form-label">Diploma Name:</label>
                <div class="col-sm-7">
                    <input type="text" class="form-control" name="diploma" id="diploma_name"
                        value="{{ $diploma->diploma_name }}" required>
                    <input type="hidden" name="diploma_id" value="{{ $diploma->id }}">
                    @error('diploma')
                    <p class="text-danger">{{ $message}}</p>
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
        <a class="btn btn-outline-dark" href={{ route('list-diplomas') }} role="button">Back</a>
    </div>
</div>
@endsection