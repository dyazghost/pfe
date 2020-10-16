@extends('instructorLayout')
@section('instructorContent')

<div class="container">
    <br><br>
    <div class="row justify-content-md-center">
        <h3>List of students</h3>
    </div>
    <div class="row justify-content-md-center" style="margin-top:70px; margin-bottom:270px;">
        <div class="col-sm-8 text-center">
            <br><br>
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
                            <a class="btn btn-outline-primary" href={{ route('target-student', $student->student_code)}}
                                role="button">show</a>
                            <a class="btn btn-outline-secondary" href={{ route('add-grade', $student->student_code) }}
                                role="button">add grade</a>
                        </td>
                    </tr>
                    @endforeach
                </thead>

            </table>

        </div>
    </div>

</div>
@endsection