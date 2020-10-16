@extends('adminLayout')
@section('adminContent')

<div class="container">
    
    <div class="row justify-content-center" style="margin-top:18px;">
        <form>
            <div class="form-group row">
                <label for="studentName" class="col-sm-4 col-form-label">Name:</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="studentName" placeholder="{{ $student->fullname }}"
                        disabled>
                </div>
            </div>
            <div class="form-group row">
                <label for="StudentCode" class="col-sm-4 col-form-label">Code:</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="studentCode" placeholder="{{ $student->student_code }}"
                        disabled>
                </div>
            </div>
            <div class="form-group row">
                <label for="Branch" class="col-sm-4 col-form-label">Branch:</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="branch"
                        placeholder="{{ $student->branch->branch_name  }}" disabled>
                </div>
            </div>
            <div class="form-group row">
                <label for="Branch" class="col-sm-4 col-form-label">Sub Branch:</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="sub_branch"
                        placeholder="{{ $student->sub_branch->sub_branchName }}" disabled>
                </div>
            </div>
        </form>
    </div>



    <div class="row justify-content-center">
        <div class="col-sm-10 col-md-offset-1">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead class="thead-dark">
                        <tr>
                            <th style="text-align: center; vertical-align: middle;" scope="col">Year/Semester</th>
                            <th style="text-align: center; vertical-align: middle;" scope="col">Semesters</th>
                            <th style="text-align: center; vertical-align: middle;" scope="col">Semester Grade</th>
                            <th style="text-align: center; vertical-align: middle;" scope="col">Year Grade</th>
                            <th style="text-align: center; vertical-align: middle;" scope="col">Diploma</th>
                            <th style="text-align: center; vertical-align: middle;" scope="col">Diploma Grade</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th style="text-align: center; vertical-align: middle;" scope="row" rowspan="2">Year 1</th>
                            <td style="text-align: center; vertical-align: middle;">S1</td>
                            @if($s1_total >=10)
                            <td style="color:green; text-align: center; vertical-align: middle;">{{$s1_total}}</td>
                            @else
                            <td style="color:red; text-align: center; vertical-align: middle;">{{$s1_total}}</td>
                            @endif
                            @if(($s1_total/2 + $s2_total/2) >=10)
                            <td rowspan="2" style="color:green; text-align: center; vertical-align: middle;">
                                {{$s1_total/2 + $s2_total/2}}</td>
                            @else
                            <td rowspan="2" style="color:red; text-align: center; vertical-align: middle;">
                                {{$s1_total/2 + $s2_total/2}}</td>
                            @endif
                            <td rowspan="4" style="text-align: center; vertical-align: middle;">DEUG</td>
                            @if(($s1_total/4 + $s2_total/4 + $s3_total/4 + $s4_total/4) >=10)
                            <td rowspan="4" style="color:green; text-align: center; vertical-align: middle;">
                                {{$s1_total/4 + $s2_total/4 + $s3_total/4 + $s4_total/4}}</td>
                            @else
                            <td rowspan="4" style="color:red; text-align: center; vertical-align: middle;">
                                {{$s1_total/4 + $s2_total/4 + $s3_total/4 + $s4_total/4}}</td>
                            @endif


                        </tr>
                        <tr>

                            <td style="text-align: center; vertical-align: middle;">S2</td>
                            @if($s2_total >=10)
                            <td style="color:green; text-align: center; vertical-align: middle;">{{$s2_total}}</td>
                            @else
                            <td style="color:red; text-align: center; vertical-align: middle;">{{$s2_total}}</td>
                            @endif
                        </tr>
                        <tr>
                            <th style="text-align: center; vertical-align: middle;" scope="row" rowspan="2">Year 2</th>
                            <td style="text-align: center; vertical-align: middle;">S3</td>
                            @if($s3_total >=10)
                            <td style="color:green; text-align: center; vertical-align: middle;">{{$s3_total}}</td>
                            @else
                            <td style="color:red; text-align: center; vertical-align: middle;">{{$s3_total}}</td>
                            @endif
                            @if(($s3_total/2 + $s4_total/2) >=10)
                            <td style="color:green; text-align: center; vertical-align: middle;" rowspan="2">
                                {{$s3_total/2 + $s4_total/2}}</td>
                            @else
                            <td style="color:red; text-align: center; vertical-align: middle;" rowspan="2">
                                {{$s3_total/2 + $s4_total/2}}</td>
                            @endif
                        <tr>
                            <td style="text-align: center; vertical-align: middle;">S4</td>
                            @if($s4_total >=10)
                            <td style="color:green; text-align: center; vertical-align: middle;">{{$s4_total}}</td>
                            @else
                            <td style="color:red; text-align: center; vertical-align: middle;">{{$s4_total}}</td>
                            @endif
                        <tr>
                            <th style="text-align: center; vertical-align: middle;" scope="row" rowspan="2">Year 3</th>
                            <td style="text-align: center; vertical-align: middle;">S5</td>
                            @if($s5_total >=10)
                            <td style="color:green; text-align: center; vertical-align: middle;">{{$s5_total}}</td>
                            @else
                            <td style="color:red; text-align: center; vertical-align: middle;">{{$s5_total}}</td>
                            @endif
                            @if(($s5_total/2 + $s6_total/2) >=10)
                            <td style="color:green; text-align: center; vertical-align: middle;" rowspan="2">
                                {{$s5_total/2 + $s6_total/2}}</td>
                            @else
                            <td style="color:red; text-align: center; vertical-align: middle;" rowspan="2">
                                {{$s5_total/2 + $s6_total/2}}</td>
                            @endif
                            <td style="text-align: center; vertical-align: middle;" rowspan="2">Bachelor</td>
                            @if(($s5_total/2 + $s6_total/2) >=10)
                            <td style="color:green; text-align: center; vertical-align: middle;" rowspan="2">
                                {{$s5_total/2 + $s6_total/2}}
                            </td>
                            @else
                            <td style="color:red; text-align: center; vertical-align: middle;" rowspan="2">
                                {{$s5_total/2 + $s6_total/2}}
                            </td>
                            @endif
                        <tr>
                            <td style="text-align: center; vertical-align: middle;">S6</td>
                            @if($s6_total >=10)
                            <td style="color:green; text-align: center; vertical-align: middle;">{{$s6_total}}</td>
                            @else
                            <td style="color:red; text-align: center; vertical-align: middle;">{{$s6_total}}</td>
                            @endif
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="row justify-content-center">
        <a class="btn btn-outline-dark" href={{ route('students-index') }} role="button">Back</a>
        <a href="{{ route('admin-student-overview-detailed',$student->student_code) }} " class="btn btn-secondary ml-sm-2" role="button">Detailed version</a>
    </div>
</div>

@endsection