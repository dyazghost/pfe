@extends('adminLayout')
@section('adminContent')
<div class="container p-4">
    <br><br>

    <div class="row justify-content-center" style="margin-bottom:150px;margin-top:130px;">
        <form method="POST" action={{ $path }}>
            @csrf
            @method('PUT')
            <div class="form-group row">
                <label for="subbranches" class="col-sm-12 col-form-label">Sub_branch name:</label>
                <input type="text" class="form-control" name="subbranch" id="branch_name"
                    value="{{ $sub_branch->sub_branchName }}" required>
                    <input type="hidden" id="subbranch_id" name="subbranch_id" value="{{ $sub_branch->id }}">
            </div>
            <div class="form-group row">
                <label for="branches" class="col-sm-12 col-form-label"> Select branch:</label>
                <select class="form-control" id="branch" name="branch">
                    @foreach($branches as $branch)
                    
                    <option value="{{$branch->id}}" 
                        @if($branch->id == $sub_branch->branch_id)
                            selected  
                        @endif
                     >
                     {{$branch->branch_name}}
                     </option>
                    @endforeach

                </select>
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