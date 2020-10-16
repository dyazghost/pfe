@extends('adminLayout')
@section('adminContent')
<div class="container">
    <div class="row justify-content-center mt-sm-5 mb-sm-5">
        <h3>Manage SubBranches: </h3>
    </div>
    @if(\Session::has('sub_branch_success'))
    <div class="row justify-content-center m-sm-2">
        <p class="text-success">Sub branch is created successfully!</p>
    </div>
    @endif
    @if(\Session::has('sub_branch_edit_success'))
    <div class="row justify-content-center m-sm-2">
        <p class="text-success">Sub branch is updated successfully!</p>
    </div>
    @endif
    @if(\Session::has('delete-success'))
    <div class="row justify-content-center m-sm-2">
        <p class="text-success">Subbranch is deleted successfully!</p>
    </div>
    @endif
    @if(\Session::has('delete-fail'))
    <div class="row justify-content-center m-sm-2">
        <p class="text-danger">Cannot delete subbranch because it still has courses or students assigned to it.</p>
    </div>
    @endif
    
    <div class="row justify-content-center m-2"><a href="{{ route('content-create-subbranch') }}"
            class="btn btn-outline-primary" role="button">Create SubBranch</a></div>
    <div class="row justify-content-center">
        <div class="col-sm-8 col-md-offset-2" style="margin-bottom:240px;">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead class="thead-dark">
                        <tr>
                            <th style="text-align: center; vertical-align: middle;" scope="col">Sub Branches</th>
                            <th style="text-align: center; vertical-align: middle;" scope="col">Actions</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach($sub_branches as $sub_branch)
                        @if($sub_branch->id!=97 && $sub_branch->id!=98 && $sub_branch->id!=99)
                        <tr>
                            <td style="text-align: center; vertical-align: middle;">{{ $sub_branch->sub_branchName}}
                            </td>
                            <td style="text-align: center; vertical-align: middle;">
                                <a href="{{ route('edit-subbranch',$sub_branch->id) }}" class="btn btn-outline-danger" role="button">Edit</a></td>
                        </tr>
                        @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection