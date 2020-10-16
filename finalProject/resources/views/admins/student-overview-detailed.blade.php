@extends('adminLayout')
@section('adminContent')

<div class="container mt-sm-4" id="bulletin">
    <center>
        <h2>Student Overview</h2>
    </center>
    <div class="row m-sm-2 justify-content-center">
        <form>
            <div class="form-group row">
                <label for="studentName" class="col-sm-2 col-form-label">Name:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="studentName" placeholder="{{ $student->fullname }}"
                        disabled>
                </div>
            </div>
            <div class="form-group row">
                <label for="StudentCode" class="col-sm-2 col-form-label">Code:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="studentCode" placeholder="{{ $student->student_code }}"
                        disabled>
                </div>
            </div>
            <div class="form-group row">
                <label for="Branch" class="col-sm-2 col-form-label">Branch:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="branch"
                        placeholder="@if($student->sub_branch->id==99 || $student->sub_branch->id==98 || $student->sub_branch->id==97){{ $student->branch->branch_name  }}@else{{ $student->sub_branch->sub_branchName }}@endif"
                        disabled>
                </div>
            </div>



        </form>
    </div>

    <div class="row justify-content-center">
        <div class="col-sm-12">
            <div class="table-responsive">
                <table class="table table-sm table-bordered">
                    <thead class="thead-dark">
                        <tr>
                            <th style="text-align: center; vertical-align: middle;" scope="col">Year/Semester</th>
                            <th style="text-align: center; vertical-align: middle;" scope="col">Semesters</th>
                            <th style="text-align: center; vertical-align: middle;" scope="col">Courses</th>
                            <th style="text-align: center; vertical-align: middle;" scope="col">Course Grades</th>
                            <th style="text-align: center; vertical-align: middle;" scope="col">Semester Grade</th>
                            <th style="text-align: center; vertical-align: middle;" scope="col">Year Grade</th>
                            <th style="text-align: center; vertical-align: middle;" scope="col">Diploma</th>
                            <th style="text-align: center; vertical-align: middle;" scope="col">Diploma Grade</th>
                            <th style="text-align: center; vertical-align: middle;" scope="col">Appreciation</th>

                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th style="text-align: center; vertical-align: middle;" scope="row" rowspan="8">Year 1</th>
                            <td style="text-align: center; vertical-align: middle;" rowspan="4"><strong>S1</strong></td>
                            <td style="text-align: center; vertical-align: middle;">
                                {{ $s1_courses->get(0)->course_name }}</td>
                            @if($s1_grades->get(0)->grade >= 10)
                            <td style="color:green; text-align: center; vertical-align: middle;">
                                {{ $s1_grades->get(0)->grade }}</td>
                            @else
                            <td style="color:red; text-align: center; vertical-align: middle;">
                                {{ $s1_grades->get(0)->grade }}</td>
                            @endif

                            @if(($s1_grades->get(0)->grade/4 + $s1_grades->get(1)->grade/4 + $s1_grades->get(2)->grade/4
                            +$s1_grades->get(3)->grade/4) >=10)
                            <td style="color:green; text-align: center; vertical-align: middle;" rowspan="4">
                                {{  round($s1_grades->get(0)->grade/4 + 
                                    $s1_grades->get(1)->grade/4 +
                                    $s1_grades->get(2)->grade/4 +
                                    $s1_grades->get(3)->grade/4, 2)}}</td>
                            @else
                            <td style="color:red; text-align: center; vertical-align: middle;" rowspan="4">
                                {{  $s1_grades->get(0)->grade/4 + 
                                    $s1_grades->get(1)->grade/4 +
                                    $s1_grades->get(2)->grade/4 +
                                    $s1_grades->get(3)->grade/4}}</td>
                            @endif

                            @if(($s1_grades->get(0)->grade/8 +
                            $s1_grades->get(1)->grade/8 +
                            $s1_grades->get(2)->grade/8 +
                            $s1_grades->get(3)->grade/8 +
                            $s2_grades->get(0)->grade/8 +
                            $s2_grades->get(1)->grade/8 +
                            $s2_grades->get(2)->grade/8 +
                            $s2_grades->get(3)->grade/8)>=10)
                            <td style="color:green; text-align: center; vertical-align: middle;" rowspan="8">{{
                                    round(($s1_grades->get(0)->grade/8 + 
                                    $s1_grades->get(1)->grade/8 +
                                    $s1_grades->get(2)->grade/8 +
                                    $s1_grades->get(3)->grade/8 +
                                    $s2_grades->get(0)->grade/8 +
                                    $s2_grades->get(1)->grade/8 +
                                    $s2_grades->get(2)->grade/8 + 
                                    $s2_grades->get(3)->grade/8), 2) }}</td>
                            @else
                            <td style="color:red; text-align: center; vertical-align: middle;" rowspan="8">{{
                                    round(($s1_grades->get(0)->grade/8 + 
                                    $s1_grades->get(1)->grade/8 +
                                    $s1_grades->get(2)->grade/8 +
                                    $s1_grades->get(3)->grade/8 +
                                    $s2_grades->get(0)->grade/8 +
                                    $s2_grades->get(1)->grade/8 +
                                    $s2_grades->get(2)->grade/8 + 
                                    $s2_grades->get(3)->grade/8), 2)}}</td>
                            @endif
                            <td style="text-align: center; vertical-align: middle;" rowspan="16">DEUG</td>
                            @if(($s1_grades->get(0)->grade/16 +
                            $s1_grades->get(1)->grade/16 +
                            $s1_grades->get(2)->grade/16 +
                            $s1_grades->get(3)->grade/16 +
                            $s2_grades->get(0)->grade/16 +
                            $s2_grades->get(1)->grade/16 +
                            $s2_grades->get(2)->grade/16 +
                            $s2_grades->get(3)->grade/16 +
                            $s3_grades->get(0)->grade/16 +
                            $s3_grades->get(1)->grade/16 +
                            $s3_grades->get(2)->grade/16 +
                            $s3_grades->get(3)->grade/16 +
                            $s4_grades->get(0)->grade/16 +
                            $s4_grades->get(1)->grade/16 +
                            $s4_grades->get(2)->grade/16 +
                            $s4_grades->get(3)->grade/16)>=10)
                            <td style="color:green; text-align: center; vertical-align: middle;" rowspan="16">{{
                                    round(($s1_grades->get(0)->grade/16 + 
                                    $s1_grades->get(1)->grade/16 +
                                    $s1_grades->get(2)->grade/16 +
                                    $s1_grades->get(3)->grade/16 +
                                    $s2_grades->get(0)->grade/16 +
                                    $s2_grades->get(1)->grade/16 +
                                    $s2_grades->get(2)->grade/16 + 
                                    $s2_grades->get(3)->grade/16 +
                                    $s3_grades->get(0)->grade/16 +
                                    $s3_grades->get(1)->grade/16 +
                                    $s3_grades->get(2)->grade/16 +
                                    $s3_grades->get(3)->grade/16 +
                                    $s4_grades->get(0)->grade/16 +
                                    $s4_grades->get(1)->grade/16 +
                                    $s4_grades->get(2)->grade/16 +
                                    $s4_grades->get(3)->grade/16), 2) }}</td>
                            @else
                            <td style="color:red; text-align: center; vertical-align: middle;" rowspan="16">{{
                                    round(($s1_grades->get(0)->grade/16 + 
                                    $s1_grades->get(1)->grade/16 +
                                    $s1_grades->get(2)->grade/16 +
                                    $s1_grades->get(3)->grade/16 +
                                    $s2_grades->get(0)->grade/16 +
                                    $s2_grades->get(1)->grade/16 +
                                    $s2_grades->get(2)->grade/16 + 
                                    $s2_grades->get(3)->grade/16 +
                                    $s3_grades->get(0)->grade/16 +
                                    $s3_grades->get(1)->grade/16 +
                                    $s3_grades->get(2)->grade/16 +
                                    $s3_grades->get(3)->grade/16 +
                                    $s4_grades->get(0)->grade/16 +
                                    $s4_grades->get(1)->grade/16 +
                                    $s4_grades->get(2)->grade/16 +
                                    $s4_grades->get(3)->grade/16), 2) }}</td>
                            @endif
                            @if( $s1_grades->get(0)->grade/16 +
                            $s1_grades->get(1)->grade/16 +
                            $s1_grades->get(2)->grade/16 +
                            $s1_grades->get(3)->grade/16 +
                            $s2_grades->get(0)->grade/16 +
                            $s2_grades->get(1)->grade/16 +
                            $s2_grades->get(2)->grade/16 +
                            $s2_grades->get(3)->grade/16 +
                            $s3_grades->get(0)->grade/16 +
                            $s3_grades->get(1)->grade/16 +
                            $s3_grades->get(2)->grade/16 +
                            $s3_grades->get(3)->grade/16 +
                            $s4_grades->get(0)->grade/16 +
                            $s4_grades->get(1)->grade/16 +
                            $s4_grades->get(2)->grade/16 +
                            $s4_grades->get(3)->grade/16 < 10) <td
                                style="text-align: center; vertical-align: middle; color:red;" rowspan="16">Below
                                average</td>
                                @elseif($s1_grades->get(0)->grade/16 +
                                $s1_grades->get(1)->grade/16 +
                                $s1_grades->get(2)->grade/16 +
                                $s1_grades->get(3)->grade/16 +
                                $s2_grades->get(0)->grade/16 +
                                $s2_grades->get(1)->grade/16 +
                                $s2_grades->get(2)->grade/16 +
                                $s2_grades->get(3)->grade/16 +
                                $s3_grades->get(0)->grade/16 +
                                $s3_grades->get(1)->grade/16 +
                                $s3_grades->get(2)->grade/16 +
                                $s3_grades->get(3)->grade/16 +
                                $s4_grades->get(0)->grade/16 +
                                $s4_grades->get(1)->grade/16 +
                                $s4_grades->get(2)->grade/16 +
                                $s4_grades->get(3)->grade/16 < 12 && $s1_grades->get(0)->grade/16 +
                                    $s1_grades->get(1)->grade/16 +
                                    $s1_grades->get(2)->grade/16 +
                                    $s1_grades->get(3)->grade/16 +
                                    $s2_grades->get(0)->grade/16 +
                                    $s2_grades->get(1)->grade/16 +
                                    $s2_grades->get(2)->grade/16 +
                                    $s2_grades->get(3)->grade/16 +
                                    $s3_grades->get(0)->grade/16 +
                                    $s3_grades->get(1)->grade/16 +
                                    $s3_grades->get(2)->grade/16 +
                                    $s3_grades->get(3)->grade/16 +
                                    $s4_grades->get(0)->grade/16 +
                                    $s4_grades->get(1)->grade/16 +
                                    $s4_grades->get(2)->grade/16 +
                                    $s4_grades->get(3)->grade/16 > 10)
                                    <td style="text-align: center; vertical-align: middle; color:green;" rowspan="16">
                                        Average</td>
                                    @elseif($s1_grades->get(0)->grade/16 +
                                    $s1_grades->get(1)->grade/16 +
                                    $s1_grades->get(2)->grade/16 +
                                    $s1_grades->get(3)->grade/16 +
                                    $s2_grades->get(0)->grade/16 +
                                    $s2_grades->get(1)->grade/16 +
                                    $s2_grades->get(2)->grade/16 +
                                    $s2_grades->get(3)->grade/16 +
                                    $s3_grades->get(0)->grade/16 +
                                    $s3_grades->get(1)->grade/16 +
                                    $s3_grades->get(2)->grade/16 +
                                    $s3_grades->get(3)->grade/16 +
                                    $s4_grades->get(0)->grade/16 +
                                    $s4_grades->get(1)->grade/16 +
                                    $s4_grades->get(2)->grade/16 +
                                    $s4_grades->get(3)->grade/16 < 14 && $s1_grades->get(0)->grade/16 +
                                        $s1_grades->get(1)->grade/16 +
                                        $s1_grades->get(2)->grade/16 +
                                        $s1_grades->get(3)->grade/16 +
                                        $s2_grades->get(0)->grade/16 +
                                        $s2_grades->get(1)->grade/16 +
                                        $s2_grades->get(2)->grade/16 +
                                        $s2_grades->get(3)->grade/16 +
                                        $s3_grades->get(0)->grade/16 +
                                        $s3_grades->get(1)->grade/16 +
                                        $s3_grades->get(2)->grade/16 +
                                        $s3_grades->get(3)->grade/16 +
                                        $s4_grades->get(0)->grade/16 +
                                        $s4_grades->get(1)->grade/16 +
                                        $s4_grades->get(2)->grade/16 +
                                        $s4_grades->get(3)->grade/16 >= 12)
                                        <td style="text-align: center; vertical-align: middle; color:green;"
                                            rowspan="16">Pretty good</td>
                                        @elseif($s1_grades->get(0)->grade/16 +
                                        $s1_grades->get(1)->grade/16 +
                                        $s1_grades->get(2)->grade/16 +
                                        $s1_grades->get(3)->grade/16 +
                                        $s2_grades->get(0)->grade/16 +
                                        $s2_grades->get(1)->grade/16 +
                                        $s2_grades->get(2)->grade/16 +
                                        $s2_grades->get(3)->grade/16 +
                                        $s3_grades->get(0)->grade/16 +
                                        $s3_grades->get(1)->grade/16 +
                                        $s3_grades->get(2)->grade/16 +
                                        $s3_grades->get(3)->grade/16 +
                                        $s4_grades->get(0)->grade/16 +
                                        $s4_grades->get(1)->grade/16 +
                                        $s4_grades->get(2)->grade/16 +
                                        $s4_grades->get(3)->grade/16 < 16 && $s1_grades->get(0)->grade/16 +
                                            $s1_grades->get(1)->grade/16 +
                                            $s1_grades->get(2)->grade/16 +
                                            $s1_grades->get(3)->grade/16 +
                                            $s2_grades->get(0)->grade/16 +
                                            $s2_grades->get(1)->grade/16 +
                                            $s2_grades->get(2)->grade/16 +
                                            $s2_grades->get(3)->grade/16 +
                                            $s3_grades->get(0)->grade/16 +
                                            $s3_grades->get(1)->grade/16 +
                                            $s3_grades->get(2)->grade/16 +
                                            $s3_grades->get(3)->grade/16 +
                                            $s4_grades->get(0)->grade/16 +
                                            $s4_grades->get(1)->grade/16 +
                                            $s4_grades->get(2)->grade/16 +
                                            $s4_grades->get(3)->grade/16 >= 14)
                                            <td style="text-align: center; vertical-align: middle; color:green;"
                                                rowspan="16">Good</td>
                                            @elseif($s1_grades->get(0)->grade/16 +
                                            $s1_grades->get(1)->grade/16 +
                                            $s1_grades->get(2)->grade/16 +
                                            $s1_grades->get(3)->grade/16 +
                                            $s2_grades->get(0)->grade/16 +
                                            $s2_grades->get(1)->grade/16 +
                                            $s2_grades->get(2)->grade/16 +
                                            $s2_grades->get(3)->grade/16 +
                                            $s3_grades->get(0)->grade/16 +
                                            $s3_grades->get(1)->grade/16 +
                                            $s3_grades->get(2)->grade/16 +
                                            $s3_grades->get(3)->grade/16 +
                                            $s4_grades->get(0)->grade/16 +
                                            $s4_grades->get(1)->grade/16 +
                                            $s4_grades->get(2)->grade/16 +
                                            $s4_grades->get(3)->grade/16 >= 16)
                                            <td style="text-align: center; vertical-align: middle; color:green;"
                                                rowspan="16">Excellent</td>
                                            @endif

                        </tr>
                        <tr>
                            <td style="text-align: center; vertical-align: middle;">
                                {{ $s1_courses->get(1)->course_name }}</td>
                            @if($s1_grades->get(1)->grade >=10)
                            <td style="color:green; text-align: center; vertical-align: middle;">
                                {{ $s1_grades->get(1)->grade }}</td>
                            @else
                            <td style="color:red; text-align: center; vertical-align: middle;">
                                {{ $s1_grades->get(1)->grade }}</td>
                            @endif

                        </tr>
                        <tr>
                            <td style="text-align: center; vertical-align: middle;">
                                {{ $s1_courses->get(2)->course_name }}</td>
                            @if($s1_grades->get(2)->grade >=10)
                            <td style="color:green; text-align: center; vertical-align: middle;">
                                {{ $s1_grades->get(2)->grade }}</td>
                            @else
                            <td style="color:red; text-align: center; vertical-align: middle;">
                                {{ $s1_grades->get(2)->grade }}</td>
                            @endif

                        </tr>
                        <tr>
                            <td style="text-align: center; vertical-align: middle;">
                                {{ $s1_courses->get(3)->course_name }}</td>
                            @if($s1_grades->get(3)->grade >=10)
                            <td style="color:green; text-align: center; vertical-align: middle;">
                                {{ $s1_grades->get(3)->grade }}</td>
                            @else
                            <td style="color:red; text-align: center; vertical-align: middle;">
                                {{ $s1_grades->get(3)->grade }}</td>
                            @endif
                        </tr>
                        <tr>
                            <td style="text-align: center; vertical-align: middle;" rowspan="4"><strong>S2</strong></td>
                            <td style="text-align: center; vertical-align: middle;">
                                {{ $s2_courses->get(0)->course_name }}</td>
                            @if($s2_grades->get(0)->grade >= 10)
                            <td style="color:green; text-align: center; vertical-align: middle;">
                                {{ $s2_grades->get(0)->grade }}</td>
                            @else
                            <td style="color:red; text-align: center; vertical-align: middle;">
                                {{ $s2_grades->get(0)->grade }}</td>
                            @endif

                            @if(($s2_grades->get(0)->grade/4 +
                            $s2_grades->get(1)->grade/4 +
                            $s2_grades->get(2)->grade/4 +
                            $s2_grades->get(3)->grade/4) >=10)
                            <td style="color:green; text-align: center; vertical-align: middle;" rowspan="4">{{ 
                                round(($s2_grades->get(0)->grade/4 +
                                $s2_grades->get(1)->grade/4 +
                                $s2_grades->get(2)->grade/4 + 
                                $s2_grades->get(3)->grade/4), 2)}}</td>
                            @else
                            <td style="color:red; text-align: center; vertical-align: middle;" rowspan="4">{{ 
                                round(($s2_grades->get(0)->grade/4 +
                                $s2_grades->get(1)->grade/4 +
                                $s2_grades->get(2)->grade/4 + 
                                $s2_grades->get(3)->grade/4), 2)}}</td>
                            @endif
                        </tr>
                        <tr>
                            <td style="text-align: center; vertical-align: middle;">
                                {{ $s2_courses->get(1)->course_name }}</td>
                            @if($s2_grades->get(1)->grade >=10)
                            <td style="color:green; text-align: center; vertical-align: middle;">
                                {{ $s2_grades->get(1)->grade }}</td>
                            @else
                            <td style="color:red; text-align: center; vertical-align: middle;">
                                {{ $s2_grades->get(1)->grade }}</td>
                            @endif
                        </tr>
                        <tr>
                            <td style="text-align: center; vertical-align: middle;">
                                {{ $s2_courses->get(2)->course_name }}</td>
                            @if($s2_grades->get(2)->grade >=10)
                            <td style="color:green; text-align: center; vertical-align: middle;">
                                {{ $s2_grades->get(2)->grade }}</td>
                            @else
                            <td style="color:red; text-align: center; vertical-align: middle;">
                                {{ $s2_grades->get(2)->grade }}</td>
                            @endif
                        </tr>
                        <tr>
                            <td style="text-align: center; vertical-align: middle;">
                                {{ $s2_courses->get(3)->course_name }}</td>
                            @if($s2_grades->get(3)->grade >=10)
                            <td style="color:green; text-align: center; vertical-align: middle;">
                                {{ $s2_grades->get(3)->grade }}</td>
                            @else
                            <td style="color:red; text-align: center; vertical-align: middle;">
                                {{ $s2_grades->get(3)->grade }}</td>
                            @endif
                        </tr>
                        <tr>
                            <th style="text-align: center; vertical-align: middle;" scope="row" rowspan="8">Year 2</th>
                            <td style="text-align: center; vertical-align: middle;" rowspan="4"><strong>S3</strong></td>
                            <td style="text-align: center; vertical-align: middle;">
                                {{ $s3_courses->get(0)->course_name }}</td>
                            @if($s3_grades->get(0)->grade >=10)
                            <td style="color:green; text-align: center; vertical-align: middle;">
                                {{ $s3_grades->get(0)->grade }}</td>
                            @else
                            <td style="color:red; text-align: center; vertical-align: middle;">
                                {{ $s3_grades->get(0)->grade }}</td>
                            @endif

                            @if(($s3_grades->get(0)->grade/4 +
                            $s3_grades->get(1)->grade/4 +
                            $s3_grades->get(2)->grade/4 +
                            $s3_grades->get(3)->grade/4) >=10)
                            <td style="color:green; text-align: center; vertical-align: middle;" rowspan="4">{{ 
                                round(($s3_grades->get(0)->grade/4 + 
                                $s3_grades->get(1)->grade/4 +
                                $s3_grades->get(2)->grade/4 +
                                $s3_grades->get(3)->grade/4), 2) }}</td>
                            @else
                            <td style="color:red; text-align: center; vertical-align: middle;" rowspan="4">{{ 
                                round(($s3_grades->get(0)->grade/4 + 
                                $s3_grades->get(1)->grade/4 +
                                $s3_grades->get(2)->grade/4 +
                                $s3_grades->get(3)->grade/4), 2)}}</td>
                            @endif

                            @if(($s3_grades->get(0)->grade/8 +
                            $s3_grades->get(1)->grade/8 +
                            $s3_grades->get(2)->grade/8 +
                            $s3_grades->get(3)->grade/8 +
                            $s4_grades->get(0)->grade/8 +
                            $s4_grades->get(1)->grade/8 +
                            $s4_grades->get(2)->grade/8 +
                            $s4_grades->get(3)->grade/8) >=10)
                            <td style="color:green; text-align: center; vertical-align: middle;" rowspan="8">{{ 
                                round(($s3_grades->get(0)->grade/8 +
                                $s3_grades->get(1)->grade/8 +
                                $s3_grades->get(2)->grade/8 +
                                $s3_grades->get(3)->grade/8 +
                                $s4_grades->get(0)->grade/8 +
                                $s4_grades->get(1)->grade/8 +
                                $s4_grades->get(2)->grade/8 +
                                $s4_grades->get(3)->grade/8), 2) }}</td>
                            @else
                            <td style="color:red; text-align: center; vertical-align: middle;" rowspan="8">{{ 
                                round(($s3_grades->get(0)->grade/8 +
                                $s3_grades->get(1)->grade/8 +
                                $s3_grades->get(2)->grade/8 +
                                $s3_grades->get(3)->grade/8 +
                                $s4_grades->get(0)->grade/8 +
                                $s4_grades->get(1)->grade/8 +
                                $s4_grades->get(2)->grade/8 +
                                $s4_grades->get(3)->grade/8), 2) }}</td>
                            @endif
                        </tr>
                        <tr>
                            <td style="text-align: center; vertical-align: middle;">
                                {{ $s3_courses->get(1)->course_name }}</td>
                            @if($s3_grades->get(1)->grade >=10)
                            <td style="color:green; text-align: center; vertical-align: middle;">
                                {{ $s3_grades->get(1)->grade }}</td>
                            @else
                            <td style="color:red; text-align: center; vertical-align: middle;">
                                {{ $s3_grades->get(1)->grade }}</td>
                            @endif
                        </tr>
                        <tr>
                            <td style="text-align: center; vertical-align: middle;">
                                {{ $s3_courses->get(2)->course_name }}</td>
                            @if($s3_grades->get(2)->grade >=10)
                            <td style="color:green; text-align: center; vertical-align: middle;">
                                {{ $s3_grades->get(2)->grade }}</td>
                            @else
                            <td style="color:red; text-align: center; vertical-align: middle;">
                                {{ $s3_grades->get(2)->grade }}</td>
                            @endif
                        </tr>
                        <tr>
                            <td style="text-align: center; vertical-align: middle;">
                                {{ $s3_courses->get(3)->course_name }}</td>
                            @if($s3_grades->get(3)->grade >=10)
                            <td style="color:green; text-align: center; vertical-align: middle;">
                                {{ $s3_grades->get(3)->grade }}</td>
                            @else
                            <td style="color:red; text-align: center; vertical-align: middle;">
                                {{ $s3_grades->get(3)->grade }}</td>
                            @endif
                        </tr>
                        <tr>
                            <td style="text-align: center; vertical-align: middle;" rowspan="4"><strong>S4</strong></td>
                            <td style="text-align: center; vertical-align: middle;">
                                {{ $s4_courses->get(0)->course_name }}</td>
                            @if($s4_grades->get(0)->grade >=10)
                            <td style="color:green; text-align: center; vertical-align: middle;">
                                {{ $s4_grades->get(0)->grade }}</td>
                            @else
                            <td style="color:red; text-align: center; vertical-align: middle;">
                                {{ $s4_grades->get(0)->grade }}</td>
                            @endif

                            @if(($s4_grades->get(0)->grade/4 +
                            $s4_grades->get(1)->grade/4 +
                            $s4_grades->get(2)->grade/4 +
                            $s4_grades->get(3)->grade/4) >=10)
                            <td style="color:green; text-align: center; vertical-align: middle;" rowspan="4">{{ 
                                round(($s4_grades->get(0)->grade/4 +
                                $s4_grades->get(1)->grade/4 +
                                $s4_grades->get(2)->grade/4 +
                                $s4_grades->get(3)->grade/4), 2) }}</td>
                            @else
                            <td style="color:red; text-align: center; vertical-align: middle;" rowspan="4">{{ 
                                round(($s4_grades->get(0)->grade/4 +
                                $s4_grades->get(1)->grade/4 +
                                $s4_grades->get(2)->grade/4 +
                                $s4_grades->get(3)->grade/4), 2) }}</td>
                            @endif
                        </tr>
                        <tr>
                            <td style="text-align: center; vertical-align: middle;">
                                {{ $s4_courses->get(1)->course_name }}</td>
                            @if($s4_grades->get(1)->grade >=10)
                            <td style="color:green; text-align: center; vertical-align: middle;">
                                {{ $s4_grades->get(1)->grade }}</td>
                            @else
                            <td style="color:red; text-align: center; vertical-align: middle;">
                                {{ $s4_grades->get(1)->grade }}</td>
                            @endif
                        </tr>
                        <tr>
                            <td style="text-align: center; vertical-align: middle;">
                                {{ $s4_courses->get(2)->course_name }}</td>
                            @if($s4_grades->get(2)->grade >=10)
                            <td style="color:green; text-align: center; vertical-align: middle;">
                                {{ $s4_grades->get(2)->grade }}</td>
                            @else
                            <td style="color:red; text-align: center; vertical-align: middle;">
                                {{ $s4_grades->get(2)->grade }}</td>
                            @endif
                        </tr>
                        <tr>
                            <td style="text-align: center; vertical-align: middle;">
                                {{ $s4_courses->get(3)->course_name }}</td>
                            @if($s4_grades->get(3)->grade >=10)
                            <td style="color:green; text-align: center; vertical-align: middle;">
                                {{ $s4_grades->get(3)->grade }}</td>
                            @else
                            <td style="color:red; text-align: center; vertical-align: middle;">
                                {{ $s4_grades->get(3)->grade }}</td>
                            @endif
                        </tr>
                        <tr>
                            <th style="text-align: center; vertical-align: middle;" scope="row" rowspan="8">Year 3</th>
                            <td style="text-align: center; vertical-align: middle;" rowspan="4"><strong>S5</strong></td>
                            <td style="text-align: center; vertical-align: middle;">
                                {{ $s5_courses->get(0)->course_name }}</td>
                            @if($s5_grades->get(0)->grade >=10)
                            <td style="color:green; text-align: center; vertical-align: middle;">
                                {{ $s5_grades->get(0)->grade }}</td>
                            @else
                            <td style="color:red; text-align: center; vertical-align: middle;">
                                {{ $s5_grades->get(0)->grade }}</td>
                            @endif

                            @if(($s5_grades->get(0)->grade/4 +
                            $s5_grades->get(1)->grade/4 +
                            $s5_grades->get(2)->grade/4 +
                            $s5_grades->get(3)->grade/4) >=10)
                            <td style="color:green; text-align: center; vertical-align: middle;" rowspan="4">{{ 
                                round(($s5_grades->get(0)->grade/4 +
                                $s5_grades->get(1)->grade/4 +
                                $s5_grades->get(2)->grade/4 +
                                $s5_grades->get(3)->grade/4) ,2) }}</td>
                            @else
                            <td style="color:red; text-align: center; vertical-align: middle;" rowspan="4">{{ 
                                round(($s5_grades->get(0)->grade/4 +
                                $s5_grades->get(1)->grade/4 +
                                $s5_grades->get(2)->grade/4 +
                                $s5_grades->get(3)->grade/4) ,2) }}</td>
                            @endif

                            @if(($s5_grades->get(0)->grade/8 +
                            $s5_grades->get(1)->grade/8 +
                            $s5_grades->get(2)->grade/8 +
                            $s5_grades->get(3)->grade/8 +
                            $s6_grades->get(0)->grade/8 +
                            $s6_grades->get(1)->grade/8 +
                            $s6_grades->get(2)->grade/8 +
                            $s6_grades->get(3)->grade/8) >=10)
                            <td style="color:green; text-align: center; vertical-align: middle;" rowspan="8">{{ 
                                round(($s5_grades->get(0)->grade/8 +
                                $s5_grades->get(1)->grade/8 +
                                $s5_grades->get(2)->grade/8 +
                                $s5_grades->get(3)->grade/8 +
                                $s6_grades->get(0)->grade/8 +
                                $s6_grades->get(1)->grade/8 +
                                $s6_grades->get(2)->grade/8 +
                                $s6_grades->get(3)->grade/8), 2)}}</td>
                            @else
                            <td style="color:red; text-align: center; vertical-align: middle;" rowspan="8">{{ 
                                round(($s5_grades->get(0)->grade/8 +
                                $s5_grades->get(1)->grade/8 +
                                $s5_grades->get(2)->grade/8 +
                                $s5_grades->get(3)->grade/8 +
                                $s6_grades->get(0)->grade/8 +
                                $s6_grades->get(1)->grade/8 +
                                $s6_grades->get(2)->grade/8 +
                                $s6_grades->get(3)->grade/8), 2)}}</td>
                            @endif
                            <td style="text-align: center; vertical-align: middle;" rowspan="8">BACHELOR</td>
                            @if(($s5_grades->get(0)->grade/8 +
                            $s5_grades->get(1)->grade/8 +
                            $s5_grades->get(2)->grade/8 +
                            $s5_grades->get(3)->grade/8 +
                            $s6_grades->get(0)->grade/8 +
                            $s6_grades->get(1)->grade/8 +
                            $s6_grades->get(2)->grade/8 +
                            $s6_grades->get(3)->grade/8) >=10)
                            <td style="color:green; text-align: center; vertical-align: middle;" rowspan="8">{{ 
                                round(($s5_grades->get(0)->grade/8 +
                                $s5_grades->get(1)->grade/8 +
                                $s5_grades->get(2)->grade/8 +
                                $s5_grades->get(3)->grade/8 +
                                $s6_grades->get(0)->grade/8 +
                                $s6_grades->get(1)->grade/8 +
                                $s6_grades->get(2)->grade/8 +
                                $s6_grades->get(3)->grade/8), 2)}}</td>
                            @else
                            <td style="color:red; text-align: center; vertical-align: middle;" rowspan="8">{{ 
                                round(($s5_grades->get(0)->grade/8 +
                                $s5_grades->get(1)->grade/8 +
                                $s5_grades->get(2)->grade/8 +
                                $s5_grades->get(3)->grade/8 +
                                $s6_grades->get(0)->grade/8 +
                                $s6_grades->get(1)->grade/8 +
                                $s6_grades->get(2)->grade/8 +
                                $s6_grades->get(3)->grade/8), 2)}}</td>
                            @endif
                            @if($s5_grades->get(0)->grade/8 +
                            $s5_grades->get(1)->grade/8 +
                            $s5_grades->get(2)->grade/8 +
                            $s5_grades->get(3)->grade/8 +
                            $s6_grades->get(0)->grade/8 +
                            $s6_grades->get(1)->grade/8 +
                            $s6_grades->get(2)->grade/8 +
                            $s6_grades->get(3)->grade/8 < 10) <td
                                style="text-align: center; vertical-align: middle; color:red;" rowspan="8">Below average
                                </td>
                                @elseif($s5_grades->get(0)->grade/8 +
                                $s5_grades->get(1)->grade/8 +
                                $s5_grades->get(2)->grade/8 +
                                $s5_grades->get(3)->grade/8 +
                                $s6_grades->get(0)->grade/8 +
                                $s6_grades->get(1)->grade/8 +
                                $s6_grades->get(2)->grade/8 +
                                $s6_grades->get(3)->grade/8 < 12 && $s5_grades->get(0)->grade/8 +
                                    $s5_grades->get(1)->grade/8 +
                                    $s5_grades->get(2)->grade/8 +
                                    $s5_grades->get(3)->grade/8 +
                                    $s6_grades->get(0)->grade/8 +
                                    $s6_grades->get(1)->grade/8 +
                                    $s6_grades->get(2)->grade/8 +
                                    $s6_grades->get(3)->grade/8 >= 10)
                                    <td style="text-align: center; vertical-align: middle; color:green;" rowspan="8">
                                        Average</td>
                                    @elseif($s5_grades->get(0)->grade/8 +
                                    $s5_grades->get(1)->grade/8 +
                                    $s5_grades->get(2)->grade/8 +
                                    $s5_grades->get(3)->grade/8 +
                                    $s6_grades->get(0)->grade/8 +
                                    $s6_grades->get(1)->grade/8 +
                                    $s6_grades->get(2)->grade/8 +
                                    $s6_grades->get(3)->grade/8 < 14 && $s5_grades->get(0)->grade/8 +
                                        $s5_grades->get(1)->grade/8 +
                                        $s5_grades->get(2)->grade/8 +
                                        $s5_grades->get(3)->grade/8 +
                                        $s6_grades->get(0)->grade/8 +
                                        $s6_grades->get(1)->grade/8 +
                                        $s6_grades->get(2)->grade/8 +
                                        $s6_grades->get(3)->grade/8 >= 12)
                                        <td style="text-align: center; vertical-align: middle; color:green;"
                                            rowspan="8">Pretty Good</td>
                                        @elseif($s5_grades->get(0)->grade/8 +
                                        $s5_grades->get(1)->grade/8 +
                                        $s5_grades->get(2)->grade/8 +
                                        $s5_grades->get(3)->grade/8 +
                                        $s6_grades->get(0)->grade/8 +
                                        $s6_grades->get(1)->grade/8 +
                                        $s6_grades->get(2)->grade/8 +
                                        $s6_grades->get(3)->grade/8 < 16 && $s5_grades->get(0)->grade/8 +
                                            $s5_grades->get(1)->grade/8 +
                                            $s5_grades->get(2)->grade/8 +
                                            $s5_grades->get(3)->grade/8 +
                                            $s6_grades->get(0)->grade/8 +
                                            $s6_grades->get(1)->grade/8 +
                                            $s6_grades->get(2)->grade/8 +
                                            $s6_grades->get(3)->grade/8 >= 14)
                                            <td style="text-align: center; vertical-align: middle; color:green;"
                                                rowspan="8">Good</td>
                                            @elseif($s5_grades->get(0)->grade/8 +
                                            $s5_grades->get(1)->grade/8 +
                                            $s5_grades->get(2)->grade/8 +
                                            $s5_grades->get(3)->grade/8 +
                                            $s6_grades->get(0)->grade/8 +
                                            $s6_grades->get(1)->grade/8 +
                                            $s6_grades->get(2)->grade/8 +
                                            $s6_grades->get(3)->grade/8 >= 16)
                                            <td style="text-align: center; vertical-align: middle; color:green;"
                                                rowspan="8">Excellent</td>
                                            @endif
                        </tr>
                        <tr>
                            <td style="text-align: center; vertical-align: middle;">
                                {{ $s5_courses->get(1)->course_name }}</td>
                            @if($s5_grades->get(1)->grade >=10)
                            <td style="color:green; text-align: center; vertical-align: middle;">
                                {{ $s5_grades->get(1)->grade }}</td>
                            @else
                            <td style="color:red; text-align: center; vertical-align: middle;">
                                {{ $s5_grades->get(1)->grade }}</td>
                            @endif
                        </tr>
                        <tr>
                            <td style="text-align: center; vertical-align: middle;">
                                {{ $s5_courses->get(2)->course_name }}</td>
                            @if($s5_grades->get(2)->grade >=10)
                            <td style="color:green; text-align: center; vertical-align: middle;">
                                {{ $s5_grades->get(2)->grade }}</td>
                            @else
                            <td style="color:red; text-align: center; vertical-align: middle;">
                                {{ $s5_grades->get(2)->grade }}</td>
                            @endif
                        </tr>
                        <tr>
                            <td style="text-align: center; vertical-align: middle;">
                                {{ $s5_courses->get(3)->course_name }}</td>
                            @if($s5_grades->get(3)->grade >=10)
                            <td style="color:green; text-align: center; vertical-align: middle;">
                                {{ $s5_grades->get(3)->grade }}</td>
                            @else
                            <td style="color:red; text-align: center; vertical-align: middle;">
                                {{ $s5_grades->get(3)->grade }}</td>
                            @endif
                        </tr>
                        <tr>
                            <td style="text-align: center; vertical-align: middle;" rowspan="4"><strong>S6</strong></td>
                            <td style="text-align: center; vertical-align: middle;">
                                {{ $s6_courses->get(0)->course_name }}</td>
                            @if($s6_grades->get(0)->grade >=10)
                            <td style="color:green; text-align: center; vertical-align: middle;">
                                {{ $s6_grades->get(0)->grade }}</td>
                            @else
                            <td style="color:red; text-align: center; vertical-align: middle;">
                                {{ $s6_grades->get(0)->grade }}</td>
                            @endif

                            @if(($s6_grades->get(0)->grade/4 +
                            $s6_grades->get(1)->grade/4 +
                            $s6_grades->get(2)->grade/4 +
                            $s6_grades->get(3)->grade/4) >=10)
                            <td style="color:green; text-align: center; vertical-align: middle;" rowspan="4">{{ 
                                round(($s6_grades->get(0)->grade/4 +
                                $s6_grades->get(1)->grade/4 +
                                $s6_grades->get(2)->grade/4 +
                                $s6_grades->get(3)->grade/4), 2) }}</td>
                            @else
                            <td style="color:red; text-align: center; vertical-align: middle;" rowspan="4">{{ 
                                round(($s6_grades->get(0)->grade/4 +
                                $s6_grades->get(1)->grade/4 +
                                $s6_grades->get(2)->grade/4 +
                                $s6_grades->get(3)->grade/4), 2) }}</td>
                            @endif
                        </tr>
                        <tr>
                            <td style="text-align: center; vertical-align: middle;">
                                {{ $s6_courses->get(1)->course_name }}</td>
                            @if($s6_grades->get(1)->grade >=10)
                            <td style="color:green; text-align: center; vertical-align: middle;">
                                {{ $s6_grades->get(1)->grade }}</td>
                            @else
                            <td style="color:red; text-align: center; vertical-align: middle;">
                                {{ $s6_grades->get(1)->grade }}</td>
                            @endif
                        </tr>
                        <tr>
                            <td style="text-align: center; vertical-align: middle;">
                                {{ $s6_courses->get(2)->course_name }}</td>
                            @if($s6_grades->get(2)->grade >=10)
                            <td style="color:green; text-align: center; vertical-align: middle;">
                                {{ $s6_grades->get(2)->grade }}</td>
                            @else
                            <td style="color:red; text-align: center; vertical-align: middle;">
                                {{ $s6_grades->get(2)->grade }}</td>
                            @endif
                        </tr>
                        <tr>
                            <td style="text-align: center; vertical-align: middle;">
                                {{ $s6_courses->get(3)->course_name }}</td>
                            @if($s6_grades->get(3)->grade >=10)
                            <td style="color:green; text-align: center; vertical-align: middle;">
                                {{ $s6_grades->get(3)->grade }}</td>
                            @else
                            <td style="color:red; text-align: center; vertical-align: middle;">
                                {{ $s6_grades->get(3)->grade }}</td>
                            @endif
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="row m-sm-2 justify-content-center">
        <form>
            <button type="button" onclick="window.print()" class="btn btn-primary">Print</button>
        </form>
    </div>
</div>

@endsection