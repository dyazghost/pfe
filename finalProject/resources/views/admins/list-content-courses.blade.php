@extends('adminLayout')
@section('adminContent')
<div class="container">
    <div class="row justify-content-center mt-sm-5 mb-sm-5">
        <h3>Courses list: </h3>
    </div>
    <div class="row justify-content-center">
        <div class="col-sm-8 col-md-offset-2" style="margin-bottom:240px;">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead class="thead-dark">
                        <tr>
                        <th style="text-align: center; vertical-align: middle;" scope="col">Courses</th>
                        <th style="text-align: center; vertical-align: middle;" scope="col">Branch</th>
                        <th style="text-align: center; vertical-align: middle;" scope="col">Sub branch</th>
                        <th style="text-align: center; vertical-align: middle;" scope="col">Semester</th>
                        <th style="text-align: center; vertical-align: middle;" scope="col">Actions</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach($courses as $course)
                        <tr>
                        <td style="text-align: center; vertical-align: middle;">{{ $course->course_name}}</td>
                        <td style="text-align: center; vertical-align: middle;">{{ $course->Branch->branch_name}}</td>
                        <td style="text-align: center; vertical-align: middle;">{{ $course->SubBranch->sub_branchName}}</td>
                        <td style="text-align: center; vertical-align: middle;">{{ $course->Semester->semester_name}}</td>
                            <td style="text-align: center; vertical-align: middle;">
                                <a href="{{ route('edit-course', $course->id) }}" class="btn btn-outline-danger"
                                    role="button">Edit</a></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection