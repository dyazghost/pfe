@extends('adminLayout')
@section('adminContent')
<div class="container">
    @if (\Session::has('success2'))
    <div class="row justify-content-center m-sm-2" style="margin-bottom:10px;">
        <p class="text-success">
            Student is edited successfully!
        </p>
    </div>
    @endif
    @if (\Session::has('added'))
    <div class="row justify-content-center m-sm-2" style="margin-bottom:10px;">
        <p class="text-success">
            Student is added successfully!
        </p>
    </div>
    @endif
    @if (\Session::has('deleted_student'))
    <div class="row justify-content-center m-sm-2" style="margin-bottom:10px;">
        <p class="text-success">
            Student is deleted successfully!
        </p>
    </div>
    @endif

    <div class="row justify-content-md-center mt-sm-2" >
        <div class="col-sm-10 text-center" style="margin-top:50px;margin-bottom:340px;">
            <h3>List of students</h3>
            <a class="btn btn-outline-info m-sm-4" href={{ route('create-student' ) }} role="button">Add a new student</a>
            <br>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Branch</th>
                        <th>Code</th>
                        <th>Actions</th>
                    </tr>
                    @foreach($students as $student)
                    <tr>
                        <td>
                            {{ $student->fullname }}
                        </td>
                        <td>
                            {{ $student->branch->branch_name }}
                        </td>
                        <td>
                            {{ $student->student_code }}
                        </td>
                        <td>
                            <a class="btn btn-outline-success"
                                href={{ route('admin-student-overview',$student->student_code) }} role="button">Show</a>
                            <a class="btn btn-outline-primary"
                                href={{ route('admin-add-grade',$student->student_code)}} role="button">Add grade</a>
                            <a class="btn btn-outline-danger" href={{ route('admin-edit-student', $student->student_code) }}
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