@extends('adminLayout')
@section('adminContent')
<div class="container">
    <br><br>
    @if (\Session::has('success3'))
    <div class="row justify-content-center">
        <p class="text-success">
            Instructor is added successfully!
        </p>
    </div>
    @endif
    @if (\Session::has('success4'))
    <div class="row justify-content-center">
        <p class="text-success">
            Instructor is edited successfully!
        </p>
    </div>
    @endif
    @if (\Session::has('deleted'))
    <div class="row justify-content-center">
        <p class="text-success">
            Instructor is deleted successfully!
        </p>
    </div>
    @endif
    @if (\Session::has('edu_delete_error'))
    <div class="row justify-content-center">
        <p class="text-danger">
            We couldn't delete this instructor because he/she still has some courses!
        </p>
    </div>
    @endif
    <div class="row justify-content-md-center">
        <div class="col-sm-8 text-center">
            <h3>List of Educators</h3>
            <br><br>
            <a href="{{ route('create-educator') }}" class="btn btn-outline-primary" role="button">Add an educator</a>
            <br><br>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Branch</th>
                        <th>Sub branch</th>
                        <th>Actions</th>
                    </tr>
                    @foreach($educators as $educator)
                    <tr>
                        <td>
                            {{ $educator->full_name }}
                        </td>
                        <td>
                            {{ $educator->branch->branch_name }}
                        </td>
                        <td>
                            {{ $educator->subbranch->sub_branchName }}
                        </td>
                        <td>
                            <a class="btn btn-outline-danger" href={{ route('admin-edit-educator', $educator->id) }}
                                role="button">Edit and Delete</a>
                        </td>
                    </tr>
                    @endforeach
                </thead>

            </table>

        </div>
    </div>


</div>
@endsection