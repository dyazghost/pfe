@extends('adminLayout')
@section('adminContent')
<div class="container">
    <div class="row justify-content-center mt-sm-5 mb-sm-5">
        <h3>Manage branches: </h3>
    </div>
    @if(\Session::has('branch_success'))
    <div class="row justify-content-center m-sm-2">
        <p class="text-success">Branch is edited successfully!</p>
    </div>
    @endif
    @if(\Session::has('branch_success2'))
    <div class="row justify-content-center m-sm-2">
        <p class="text-success">Branch is deleted successfully!</p>
    </div>
    @endif
    @if(\Session::has('branch_create_success'))
    <div class="row justify-content-center m-sm-2">
        <p class="text-success">Branch is created successfully!</p>
    </div>
    @endif
    @if(\Session::has('branch_fail'))
    <div class="row justify-content-center m-sm-2">
        <p class="text-danger">Sorry, we cant delete this branch beacause it still has child sub branches or students assigned to it.</p>
    </div>
    @endif
    <div class="row justify-content-center m-2"><a href="{{ route('content-create-branch') }}"
            class="btn btn-outline-primary" role="button">Create branch</a></div>
    <div class="row justify-content-center">
        <div class="col-sm-8 col-md-offset-2" style="margin-bottom:240px;">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead class="thead-dark">
                        <tr>
                            <th style="text-align: center; vertical-align: middle;" scope="col">Branches</th>
                            <th style="text-align: center; vertical-align: middle;" scope="col">Actions</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach($branches as $branch)
                        <tr>
                            <td style="text-align: center; vertical-align: middle;">{{ $branch->branch_name}}</td>
                            <td style="text-align: center; vertical-align: middle;">
                                <a href="{{ route('edit-branch', $branch->id) }}" class="btn btn-outline-danger"
                                    role="button">Edit</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection