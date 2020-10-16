<?php

namespace App\Http\Controllers;

use App\Instructor;
use App\Student;
use App\Branch;
use App\Grade;
use App\Course;
use App\Semester;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class StudentController extends Controller
{

    public function __construct(){
        $this->middleware('auth:student');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('students.welcome');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $student = Student::with('branch', 'sub_branch', 'grades')->where('student_code', request('student_code'))->first();

        if(is_null($student)){
            return redirect()->back()->with('error', 'not found');
        }else{
        //this for calculating s1 total
        $s1_grades = Grade::where('student_id', $student->id)
                    ->where('semester_id', 1)
                    ->get();
        $s1_total = 0;
        foreach($s1_grades as $grade1){
            $s1_total+=$grade1->grade/4;
        }

        //this for calculating s2 total
        $s2_grades = Grade::where('student_id', $student->id)
                    ->where('semester_id', 2)
                    ->get();
        $s2_total = 0;
        foreach($s2_grades as $grade2){
            $s2_total+=$grade2->grade/4;
        }

        //this for calculating s3 total
        $s3_grades = Grade::where('student_id', $student->id)
                    ->where('semester_id', 3)
                    ->get();
        $s3_total = 0;
        foreach($s3_grades as $grade3){
            $s3_total+=$grade3->grade/4;
        }

        //this for calculating s4 total
        $s4_grades = Grade::where('student_id', $student->id)
                    ->where('semester_id', 4)
                    ->get();
        $s4_total = 0;
        foreach($s4_grades as $grade4){
            $s4_total+=$grade4->grade/4;
        }

        //this for calculating s5 total
        $s5_grades = Grade::where('student_id', $student->id)
                    ->where('semester_id', 5)
                    ->get();
        $s5_total = 0;
        foreach($s5_grades as $grade5){
            $s5_total+=$grade5->grade/4;
        }

        //this for calculating s3 total
        $s6_grades = Grade::where('student_id', $student->id)
                    ->where('semester_id', 6)
                    ->get();
        $s6_total = 0;
        foreach($s6_grades as $grade6){
            $s6_total+=$grade6->grade/4;
        }

        

       return view('students.student-overview', compact('student','s1_total','s2_total','s3_total','s4_total','s5_total','s6_total'));
    }

        }

    public function showDetailed(int $code){
        $student = Student::with('branch', 'sub_branch', 'grades')->where('student_code', $code)->firstorFail();

        //this for calculating s1 courses and grades and total
        $s1_courses = Course::where('branch_id', $student->branch_id)
                            ->where('semester_id', 1)
                            ->get();
        
        $s1_courses =$s1_courses->values();

        $s1_grades = Grade::where('student_id', $student->id)
                            ->where('semester_id', 1)
                            ->get();
        $s1_grades = $s1_grades->values();
        if($s1_grades->get(0) == null){
            $grade = new Grade();
            $grade->grade = 0;
            $grade->semester_id = 1;
            $grade->student_id = $student->id;
            $grade->course_id = $s1_courses->get(0)->id;
            $s1_grades[0] = $grade;
        }
        if($s1_grades->get(1) == null){
            $grade = new Grade();
            $grade->grade = 0;
            $grade->semester_id = 1;
            $grade->student_id = $student->id;
            $grade->course_id = $s1_courses->get(1)->id;
            $s1_grades[1] = $grade;
        }
            
        if($s1_grades->get(2) == null){
            $grade = new Grade();
            $grade->grade = 0;
            $grade->semester_id = 1;
            $grade->student_id = $student->id;
            $grade->course_id = $s1_courses->get(2)->id;
            $s1_grades[2] = $grade;
        }
        
        if($s1_grades->get(3) == null){
            $grade = new Grade();
            $grade->grade = 0;
            $grade->semester_id = 1;
            $grade->student_id = $student->id;
            $grade->course_id = $s1_courses->get(3)->id;
            $s1_grades[3] = $grade;
        }
        

        $s2_courses = Course::where('branch_id', $student->branch_id)
                            ->where('semester_id', 2)
                            ->get();
        
        $s2_courses =$s2_courses->values();

        $s2_grades = Grade::where('student_id', $student->id)
                            ->where('semester_id', 2)
                            ->get();
        $s2_grades = $s2_grades->values();

        if($s2_grades->get(0) == null){
            $grade = new Grade();
            $grade->grade = 0;
            $grade->semester_id = 2;
            $grade->student_id = $student->id;
            $grade->course_id = $s2_courses->get(0)->id;
            $s2_grades[0] = $grade;
        }
        if($s2_grades->get(1) == null){
            $grade = new Grade();
            $grade->grade = 0;
            $grade->semester_id = 2;
            $grade->student_id = $student->id;
            $grade->course_id = $s2_courses->get(1)->id;
            $s2_grades[1] = $grade;
        }
            
        if($s2_grades->get(2) == null){
            $grade = new Grade();
            $grade->grade = 0;
            $grade->semester_id = 2;
            $grade->student_id = $student->id;
            $grade->course_id = $s2_courses->get(2)->id;
            $s2_grades[2] = $grade;
        }
        
        if($s2_grades->get(3) == null){
            $grade = new Grade();
            $grade->grade = 0;
            $grade->semester_id = 2;
            $grade->student_id = $student->id;
            $grade->course_id = $s2_courses->get(3)->id;
            $s2_grades[3] = $grade;
        }


        $s3_courses = Course::where('branch_id', $student->branch_id)
                            ->where('semester_id', 3)
                            ->get();
        
        $s3_courses =$s3_courses->values();

        $s3_grades = Grade::where('student_id', $student->id)
                            ->where('semester_id', 3)
                            ->get();
        $s3_grades = $s3_grades->values();

        if($s3_grades->get(0) == null){
            $grade = new Grade();
            $grade->grade = 0;
            $grade->semester_id = 3;
            $grade->student_id = $student->id;
            $grade->course_id = $s3_courses->get(0)->id;
            $s3_grades[0] = $grade;
        }
        if($s3_grades->get(1) == null){
            $grade = new Grade();
            $grade->grade = 0;
            $grade->semester_id = 3;
            $grade->student_id = $student->id;
            $grade->course_id = $s3_courses->get(1)->id;
            $s3_grades[1] = $grade;
        }
            
        if($s3_grades->get(2) == null){
            $grade = new Grade();
            $grade->grade = 0;
            $grade->semester_id = 3;
            $grade->student_id = $student->id;
            $grade->course_id = $s3_courses->get(2)->id;
            $s3_grades[2] = $grade;
        }
        
        if($s3_grades->get(3) == null){
            $grade = new Grade();
            $grade->grade = 0;
            $grade->semester_id = 3;
            $grade->student_id = $student->id;
            $grade->course_id = $s3_courses->get(3)->id;
            $s3_grades[3] = $grade;
        }


        $s4_courses = Course::where('branch_id', $student->branch_id)
                            ->where('semester_id', 4)
                            ->get();
        
        $s4_courses =$s4_courses->values();

        $s4_grades = Grade::where('student_id', $student->id)
                            ->where('semester_id', 4)
                            ->get();
        $s4_grades = $s4_grades->values();

        if($s4_grades->get(0) == null){
            $grade = new Grade();
            $grade->grade = 0;
            $grade->semester_id = 4;
            $grade->student_id = $student->id;
            $grade->course_id = $s4_courses->get(0)->id;
            $s4_grades[0] = $grade;
        }
        if($s4_grades->get(1) == null){
            $grade = new Grade();
            $grade->grade = 0;
            $grade->semester_id = 4;
            $grade->student_id = $student->id;
            $grade->course_id = $s4_courses->get(1)->id;
            $s4_grades[1] = $grade;
        }
            
        if($s4_grades->get(2) == null){
            $grade = new Grade();
            $grade->grade = 0;
            $grade->semester_id = 4;
            $grade->student_id = $student->id;
            $grade->course_id = $s4_courses->get(2)->id;
            $s4_grades[2] = $grade;
        }
        
        if($s4_grades->get(3) == null){
            $grade = new Grade();
            $grade->grade = 0;
            $grade->semester_id = 4;
            $grade->student_id = $student->id;
            $grade->course_id = $s4_courses->get(3)->id;
            $s4_grades[3] = $grade;
        }


        $s5_courses = Course::where('branch_id', $student->branch_id)
                            ->where('semester_id', 5)
                            ->get();
        
        $s5_courses =$s5_courses->values();

        $s5_grades = Grade::where('student_id', $student->id)
                            ->where('semester_id', 5)
                            ->get();
        $s5_grades = $s5_grades->values();

        if($s5_grades->get(0) == null){
            $grade = new Grade();
            $grade->grade = 0;
            $grade->semester_id = 5;
            $grade->student_id = $student->id;
            $grade->course_id = $s5_courses->get(0)->id;
            $s5_grades[0] = $grade;
        }
        if($s5_grades->get(1) == null){
            $grade = new Grade();
            $grade->grade = 0;
            $grade->semester_id = 5;
            $grade->student_id = $student->id;
            $grade->course_id = $s5_courses->get(1)->id;
            $s5_grades[1] = $grade;
        }
            
        if($s5_grades->get(2) == null){
            $grade = new Grade();
            $grade->grade = 0;
            $grade->semester_id = 5;
            $grade->student_id = $student->id;
            $grade->course_id = $s5_courses->get(2)->id;
            $s5_grades[2] = $grade;
        }
        
        if($s5_grades->get(3) == null){
            $grade = new Grade();
            $grade->grade = 0;
            $grade->semester_id = 5;
            $grade->student_id = $student->id;
            $grade->course_id = $s5_courses->get(3)->id;
            $s5_grades[3] = $grade;
        }


        $s6_courses = Course::where('branch_id', $student->branch_id)
                            ->where('semester_id', 6)
                            ->get();
        
        $s6_courses =$s6_courses->values();

        $s6_grades = Grade::where('student_id', $student->id)
                            ->where('semester_id', 6)
                            ->get();
        $s6_grades = $s6_grades->values();

        if($s6_grades->get(0) == null){
            $grade = new Grade();
            $grade->grade = 0;
            $grade->semester_id = 6;
            $grade->student_id = $student->id;
            $grade->course_id = $s6_courses->get(0)->id;
            $s6_grades[0] = $grade;
        }
        if($s6_grades->get(1) == null){
            $grade = new Grade();
            $grade->grade = 0;
            $grade->semester_id = 6;
            $grade->student_id = $student->id;
            $grade->course_id = $s6_courses->get(1)->id;
            $s6_grades[1] = $grade;
        }
            
        if($s6_grades->get(2) == null){
            $grade = new Grade();
            $grade->grade = 0;
            $grade->semester_id = 6;
            $grade->student_id = $student->id;
            $grade->course_id = $s6_courses->get(2)->id;
            $s6_grades[2] = $grade;
        }
        
        if($s6_grades->get(3) == null){
            $grade = new Grade();
            $grade->grade = 0;
            $grade->semester_id = 6;
            $grade->student_id = $student->id;
            $grade->course_id = $s6_courses->get(3)->id;
            $s6_grades[3] = $grade;
        }




        /*$s1_grades = Grade::where('student_id', $student->id)
                    ->where('semester_id', 1)
                    ->get();
        $s1_total = 0;
        foreach($s1_grades as $grade1){
            $s1_total+=$grade1->grade/4;
        }

        //this for calculating s2 total
        $s2_grades = Grade::where('student_id', $student->id)
                    ->where('semester_id', 2)
                    ->get();
        $s2_total = 0;
        foreach($s2_grades as $grade2){
            $s2_total+=$grade2->grade/4;
        }

        //this for calculating s3 total
        $s3_grades = Grade::where('student_id', $student->id)
                    ->where('semester_id', 3)
                    ->get();
        $s3_total = 0;
        foreach($s3_grades as $grade3){
            $s3_total+=$grade3->grade/4;
        }

        //this for calculating s4 total
        $s4_grades = Grade::where('student_id', $student->id)
                    ->where('semester_id', 4)
                    ->get();
        $s4_total = 0;
        foreach($s4_grades as $grade4){
            $s4_total+=$grade4->grade/4;
        }

        //this for calculating s5 total
        $s5_grades = Grade::where('student_id', $student->id)
                    ->where('semester_id', 5)
                    ->get();
        $s5_total = 0;
        foreach($s5_grades as $grade5){
            $s5_total+=$grade5->grade/4;
        }

        //this for calculating s3 total
        $s6_grades = Grade::where('student_id', $student->id)
                    ->where('semester_id', 6)
                    ->get();
        $s6_total = 0;
        foreach($s6_grades as $grade6){
            $s6_total+=$grade6->grade/4;
        }

        */
        return view('students.student-overview-detailed', compact('student', 's1_courses', 's2_courses', 's3_courses', 's4_courses', 's5_courses', 's6_courses'
                                                                            , 's1_grades', 's2_grades', 's3_grades', 's4_grades', 's5_grades', 's6_grades'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Student $student)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        //
    }
}
