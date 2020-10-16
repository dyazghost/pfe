<?php

namespace App\Http\Controllers;

use App\Admin;
use App\Instructor;
use App\Student;
use App\Branch;
use App\SubBranch;
use App\Grade;
use App\Semester;
use App\Course;
use App\Diploma;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    

     public function __construct(){
         $this->middleware('auth:admin');
     }

     
    public function welcome()
    {
        return view('admins.welcome');
    }

    /*--------------------------------------------------------------MANAGE CONTENT---------------------------------------------------------------*/

    public function listContent(){
        return view('admins.list-content');
    }

            /*-----------------------------------------------Manage content: Branches-------------------------------------------------*/
    public function listContentBranches(){
        $branches = Branch::get();
        return view('admins.content-list-branches', compact('branches'));
    }

    public function createBranch(){
        $path = "/admin/content/branches/create";
        return view('admins.create-branch', compact('path'));
    }

    public function Editbranch(int $branchID){
        $branch = Branch::where('id', $branchID)->firstorfail();
        $path = "/admin/content/branches/".$branch->id;
        return view('admins.edit-branch', compact('branch', 'path'));
    }

    public function storeBranch(Request $request){
        $validatedData = request()->validate([
            'branch' => ['required', 'string', 'min:2', 'max:5'],
                    ]);
        if(!Branch::where('branch_name', request('branch'))->exists()){
            $branch = new Branch();
            $branch->branch_name = request('branch');
            $branch->save();
            return redirect()->route('content-list-branches')->with('branch_create_success', 'Branch is created successfully!');
        }
            return redirect()->back()->with('exists', 'Sorry');
    }

    public function updateBranch(int $branchID){
        $validatedData = request()->validate([
            'branch' => ['required', 'string', 'min:2', 'max:5'],
                    ]);
       $branch = Branch::where('id', request('branch_id'))->firstorfail();

       $branch->branch_name = request('branch');
       $branch->save();
       return redirect()->route('content-list-branches')->with('branch_success', 'Branch is edited successfully');
    }

    public function destroyBranch(int $branchID){
       $branch = Branch::where('id', $branchID)->firstorfail();
       $sub_branch = SubBranch::where('branch_id', $branchID)->get();
       $students = Student::where('branch_id', $branchID)->get();

        if(count($sub_branch) == 0 && count($students) ==0){
            $branch->delete();
            return redirect()->route('content-list-branches')->with('branch_success2', 'Branch is deleted successfully');
        }  
        return redirect()->route('content-list-branches')->with("branch_fail", "Sorry, we cant delete this branch beacause it still has students or sub branches" );      
    }

            /*--------------------------------------------End manage content: Branches---------------------------------------------*/

            /*-----------------------------------------------Manage content: Sub branches-----------------------------------------*/


    public function listContentSubBranches(){
        $sub_branches = SubBranch::get();
        return view('admins.content-list-subbranches', compact('sub_branches'));
    }

    public function createSubBranch(){
        $path = "/admin/content/subbranches/create";
        $branches = Branch::get();
        return view ('admins.create-subbranch', compact('path', 'branches'));
    }

    public function storeSubBranch(){
        $validatedData = request()->validate([
            'sub_branch' => ['required', 'string', 'min:2', 'max:5'],
                    ]);
        if(count( SubBranch::where('sub_branchName', request('sub_branch'))->get())==0){
            $sub_branch = new SubBranch();
            $sub_branch->sub_branchName = request('sub_branch');
            $sub_branch->branch_id = request('branch');
            $sub_branch->save();

            return redirect()->route('content-list-subbranches')->with("sub_branch_success", "horaaay!" );
        }

        return redirect()->back()->with('sub_branch_exists','shoot');
    }

    public function EditSubBranch(int $subbranchID){
        $path = "/admin/content/subbranches/".$subbranchID;
        $sub_branch = SubBranch::where('id', $subbranchID)->firstorfail();
        $branches = Branch::get();
        return view('admins.edit-subbranch', compact('sub_branch', 'branches', 'path'));
    }

    public function updateSubBranch(int $subbranchID){

        $validatedData = request()->validate([
            'subbranch' => ['required', 'string', 'min:2', 'max:5'],
                    ]);
        
            $branchvar = Branch::where('id', request('branch'))->firstOrfail();       
            $sub_branch = SubBranch::where('id', $subbranchID)->firstorfail();
            $sub_branch->sub_branchName = request('subbranch');
            $sub_branch->branch_id = $branchvar->id;
            $sub_branch->save();
            return redirect()->route('content-list-subbranches')->with('sub_branch_edit_success', 'sub Branch is edited successfully!');
        
    }

    public function destroySubBranch(int $subbranchID){
        $sub_branch = SubBranch::where('id', $subbranchID)->firstorfail();

        $students = Student::where('sub_branch_id', $subbranchID)->get();
        $courses = Course::where('sub_branch_id', $subbranchID)->get();
        $instructors = Instructor::where('sub_branch_id', $subbranchID)->get();

        if((count($students)==0) && (count($courses)==0) && (count($instructors)==0)){
            $sub_branch->delete();
            return redirect()->route('content-list-subbranches')->with('delete-success', ' deleted successfully');
        }

        return redirect()->route('content-list-subbranches')->with('delete-fail', ' deleted failed');

    }


            /*--------------------------------------------End manage content: Sub branches---------------------------------------*/

            /*-------------------------------------------------Manage content: Courses-------------------------------------------*/

    public function createCourse(){
        $path = '/admin/content/courses/create';
        $branches = Branch::get();
        $sub_branches = SubBranch::get();
        $instructors = Instructor::get();
        $semesters = Semester::get();
        $diplomas = Diploma::get();
        return view('admins.create-course', compact('path', 'branches', 'sub_branches', 'semesters', 'instructors', 'diplomas'));
    }

    public function storeCourse(Request $request){
        $validatedData = request()->validate([
            'course' => ['required', 'string', 'min:10', 'max:60'],
                    ]);
        if(count(Course::where('course_name', request('course'))
                        ->where('branch_id', request('branch'))
                        ->where('sub_branch_id', request('sub_branch'))
                        ->where('semester_id', request('semester'))
                        ->where('instructor_id', request('instructor'))
                        ->get()) == 0){
                            $course = new Course();
                            $course->course_name = request('course');
                            $course->branch_id = request('branch');
                            $course->sub_branch_id = request('sub_branch');
                            $course->semester_id = request('semester');
                            $course->instructor_id = request('instructor');
                            $course->diploma_id = request('diploma');
                            $course->save();

                            return redirect()->back()->with("course_create", "done");
                        }
        return redirect()->back()->with('create_error', "failed");
    }

    public function searchCourses(){
        $branches = Branch::get();
        $sub_branches = SubBranch::get();
        $semesters = Semester::get();
        return view('admins.search-courses', compact('branches', 'sub_branches', 'semesters'));
    }

    public function listCourses(Request $request){
    
        if(request('branch')==0 || request('sub_branch')==0)
            return redirect()->back()->with('select', 'please select');

        $courses = Course::where('branch_id', request('branch'))
                        ->where('sub_branch_id', request('sub_branch'))
                        ->where('semester_id', request('semester'))
                        ->get();
        if(count($courses)==0)
            return  redirect()->back()->with('select', 'please select');
            
        return view('admins.list-content-courses', compact('courses'));
    }

    public function editCourse(int $courseID){
        $path = '/admin/content/courses/'.$courseID;
        $course = Course::where('id', $courseID)->firstOrFail();
        $instructors = Instructor::get();                                
        
        return view('admins.edit-course', compact('path', 'course', 'instructors'));                        
    }

    public function updateCourse(int $courseID){
        $validatedData = request()->validate([
            'course' => ['required', 'string', 'min:10', 'max:40'],
                    ]);
        
        if(! Course::where('course_name', request('course'))
                    ->where('instructor_id', request('instructor'))
                    ->exists()){
            $course = Course::where('id', $courseID)->firstorfail();
            $course->course_name = request('course');
            $course->instructor_id = request('instructor');
            $course->save();

            return redirect()->back()->with('course_edited', "hello");
        }

        return redirect()->back()->with('course_unchanged', "hello there");

        
    }

    public function destroyCourse(int $id){

        $course = Course::where('id', $id)->firstorfail();
        $grades = Grade::where('course_id', $id)->first();
        if($course!=null && $grades==null){
            $course->delete();
            return redirect()->route('content-search-courses')->with('course_delete_success', 'hoooooray');
        }
        return redirect()->back()->with('delete_fail', 'oh shoot');
    }

            /*-----------------------------------------------End manage content: Courses-------------------------------------------*/

            /*-------------------------------------------------Manage content: Diplomas-------------------------------------------*/

    public function listDiplomas(){
        $diplomas = Diploma::get();
        
        return view('admins.list-content-diplomas', compact('diplomas'));
    }

    public function editDiploma(int $id){
        $diploma = Diploma::where('id', $id)->firstOrFail();
        $path = '/admin/content/diplomas/'.$id;

        return view('admins.edit-diploma', compact('diploma', 'path'));
    }

    public function updateDiploma(){
        $validatedData = request()->validate([
            'diploma' => ['required', 'string', 'min:3', 'max:20'],
                    ]);
        if(! Diploma::where('diploma_name', request('diploma'))->exists()){
            $diploma = Diploma::where('id', request("diploma_id"))->firstOrFail();
            $diploma->diploma_name = request('diploma');
            $diploma->save();
            return redirect()->route('list-diplomas')->with('diploma_success', 'hooray');
        }
        return redirect()->back()->with('diploma_error', 'fail');
    }
    
    public function destroyDiploma(){
        $courses = Course::where('diploma_id', request('diploma_id'))->get();
        if(count($courses) == 0){
            $diploma = Diploma::where('id', request('diploma_id'))->firstorfail();
            $diploma->delete();
            return redirect()->route('list-diplomas')->with('delete_success', 'horaay!');
        }

        return redirect()->back()->with('delete-fail');
    }

            /*------------------------------------------------End manage content: Diplomas-----------------------------------------*/

    /*-------------------------------------------------------------END MANAGE CONTENT-------------------------------------------------------------*/



    /*-------------------------------------------------------Manage students and grades----------------------------------------------------------*/
    public function indexOfStudent()
    {
        $students = Student::get();
        return view('admins.index-of-students', compact('students'));
    }
    
    public function createStudent()
    {
        $branches = Branch::get();
        $sub_branches = SubBranch::get();
        return view('admins.create-student',compact('branches', 'sub_branches'));
    }

    public function storeStudent(Request $request)
    {
        $validatedData = $request->validate([
            'student_name' => ['required','string','min:8','max:20'],
            'student_code' => ['required', 'numeric', 'digits_between:3,7'],
            'student_CIN' => ['required', 'string', 'min:7','max:9' ],
            'student_CNE' => ['required', 'string', 'min:8', 'max:12']
                    ]);

        $branches = Branch::get();
        $sub_branches = SubBranch::get();

        $student = new Student();
        $student->fullname = request('student_name');
        $student->branch_id = request('branch');
        $student->sub_branch_id = request('sub_branch');
        $student->student_code = request('student_code');
        $student->student_CIN = request('student_CIN');
        $student->student_CNE = request('student_CNE');

        if(request('branch')==0 || request('sub_branch')==0){
            return redirect()->back()->with('branches','Incorrect branch and subbranch');
        }
        if( !((Student::where('student_code', $student->student_code)->exists())
            || (Student::where('student_CIN', $student->student_CIN)->exists()) || (Student::where('student_CIN', $student->student_CNE)->exists())) )
        {
            $student->save();
            return redirect('admin/student/index')->with('added','Student added successfully!');
        }else{
            return redirect()->back()->with('error','Student already exists! Try again.');
        }

    }

    public function showStudent(int $studentCode)
    {

        $student = Student::with('branch', 'sub_branch', 'grades')->where('student_code', $studentCode)->firstOrFail();

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

        //this for calculating s6 total
        $s6_grades = Grade::where('student_id', $student->id)
                    ->where('semester_id', 6)
                    ->get();
        $s6_total = 0;
        foreach($s6_grades as $grade6){
            $s6_total+=$grade6->grade/4;
        }

       return view('admins.student-overview', compact('student','s1_total','s2_total','s3_total','s4_total','s5_total','s6_total'));
    }

    public function showDetailedStudent(int $code){
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

        return view('admins.student-overview-detailed', compact('student', 's1_courses', 's2_courses', 's3_courses', 's4_courses', 's5_courses', 's6_courses'
                                                                            , 's1_grades', 's2_grades', 's3_grades', 's4_grades', 's5_grades', 's6_grades'));
    }

    public function editStudent(int $studentCode)
    {
        $student = Student::where('student_code', $studentCode)->firstOrFail();
        $branches = Branch::get();
        $sub_branches = SubBranch::get();
        $path = "/admin/student/".$studentCode;
        return view('admins.edit-student', compact('path', 'student', 'branches', 'sub_branches'));
    }

    public function updateStudent(int $studentCode)
    {
        $validatedData = request()->validate([
            'student_name' => ['required','string','min:8','max:20'],
            'student_code' => ['required', 'numeric', 'digits_between:3,7'],
            'student_CIN' => ['required', 'string', 'min:7','max:9' ],
            'student_CNE' => ['required', 'string', 'min:8', 'max:12'],
                    ]);
                    
        $student = Student::where('student_code', $studentCode)->firstOrFail();

        if(request('branch')==0 || request('sub_branch')==0){
            return redirect()->back()->with('branches','Incorrect branch and subbranch');
        }
        $student->fullname = request('student_name');
        $student->branch_id = request('branch');
        $student->sub_branch_id = request('sub_branch');
        $student->student_code = request('student_code');
        $student->student_CIN = request('student_CIN');
        $student->student_CNE = request('student_CNE');

        
            $student->save();
            return redirect()->route('students-index')->with('success2','Student is edited successfully!');
    }

    public function destroyStudent(int $studentCode){
        $student = Student::where('student_code', $studentCode)->firstOrFail();
        $grades = Grade::where('student_id', $student->id)->get();

        if(count($grades) == 0){
            $student->delete();
            return redirect()->route('students-index')->with('deleted_student', 'student deleted successfully!');
        }else{
            return redirect()->back()->with('student_grades_fail', 'couldnt');
        }
    }


    public function addGrade(int $studentCode){
        $students = Student::with('branch', 'sub_branch')->where('student_code', $studentCode)->firstorfail();
        $grades = Grade::where('student_id', $students->id)->get();
        $count = count($grades);
        if(($students->sub_branch_id == 97) || ($students->sub_branch_id == 98) || ($students->sub_branch_id == 99)){
            $semesters = Semester::where('id', '<=', '2')->get();
        }else{
            $semesters = Semester::where('id', '>', 2)->get();
        }
        $courses = Course::where('branch_id', $students->branch_id)->where('sub_branch_id', $students->sub_branch_id)->get();
        $path = "/admin/student/".$students->student_code."/add-grade";
        return view('admins.add-grade', compact('students', 'semesters','courses','path', 'count'));
    }


    public function storeGrade(Request $request){

        $validatedData = $request->validate([
            'grade' => ['required','numeric','min:0','max:20']
        ]);
        $student = Student::where('id', request('student_id'))->firstOrFail();
        $path = "admin/student/".$student->student_code;
        $grade = new Grade();
        $grade->semester_id = request('semester_id');
        $grade->student_id = request('student_id');
        $grade->course_id = request('course_id');
        $grade->grade = $request->input('grade');

        $course = Course::where('id', request('course_id'))
                        ->where('semester_id', request('semester_id'))
                        ->get();
        if(count($course) ==0){

            return redirect()->back()->with('information_collection_error', 'choose right info');

        }elseif(!($exists = Grade::where('semester_id',$grade->semester_id)
                        ->where('student_id',$grade->student_id)
                        ->where('course_id', $grade->course_id)
                        ->exists()))
                        {
                            $grade->save();
                            return redirect()->route('admin-add-grade', $student->student_code)->with('success1','success messages');

                        }
        else{
           return redirect()->route('admin-add-grade', $student->student_code)->with('fail1','fail message');
                        }


    }

    public function deleteGrades(int $code){
        $student = Student::where('student_code', $code)->firstOrFail();
        $student->Grades()->destroy();

        return redirect()->route('students-index')->with('grades_deleted');
    }

    /*-----------------------------------------------------------End manage students-----------------------------------------------------------*/
    




    /*------------------------------------------------------------Manage instructors------------------------------------------------------------*/
    public function indexOfEducator()
    {
        $educators = Instructor::get();
        return view('admins.index-of-educators', compact('educators'));
    }
    
    public function createEducator()
    {
        $branches = Branch::get();
        $sub_branches = SubBranch::get();
        return \view('admins.create-educator', compact('branches', 'sub_branches'));
    }

    public function storeEducator(Request $request)
    {
        $validatedData = request()->validate([
            'full_name' => ['required','string','min:8','max:20']
                    ]);

        $branches = Branch::get();
        $sub_branches = SubBranch::get();

        $instructor = new Instructor();
        $instructor->full_name = request('full_name');
        $instructor->branch_id = request('branch_id');
        $instructor->sub_branch_id = request('sub_branch_id');

        if(request('branch_id') ==0 || request('sub_branch_id') ==0)
            return redirect()->back()->with('select','Please select.');
        if( !(Instructor::where('full_name', request('full_name'))->exists()) )
                        {
                            $instructor->save();
                            return redirect('admin/educator/index')->with('success3','Instructor added successfully!');

                        }else{
                            return redirect()->back()->with('fail2','Instructor already exists! Try again.');
                        }

    }

    public function editEducator(int $id)
    {
        $instructor = Instructor::where('id', $id)->firstOrFail();
        $path = "/admin/educator/".$id;
        $delete_path = "/admin/educator/".$id."edit";
        $branches = Branch::get();
        $sub_branches = SubBranch::get();
        return view('admins.edit-instructor', compact('path', 'delete_path', 'instructor','branches', 'sub_branches'));
    }

    public function updateEducator(int $id)
    {
        $validatedData = request()->validate([
            'full_name' => ['required','string','min:8','max:20']
                    ]);
        if(SubBranch::where('id', request('sub_branch'))
                    ->where('branch_id', 'branch')
                    ->get() == null || request('branch')== 0 || request('sub_branch')== 0){
            return redirect()->back()->with('select', 'select error');
        }

        $instructor = Instructor::where('id', $id)->firstorfail();
        $instructor->full_name = request('full_name');
        $instructor->branch_id = request('branch');
        $instructor->sub_branch_id = request('sub_branch');

        $instructor->save();
        return redirect()->route('educators-index')->with('success4','Instructor is edited successfully!');

    }

    public function destroyEducator(int $id)
    {
        $courses = Course::where('instructor_id', $id)->get();

        if(count($courses)==0){
            $instructor = Instructor::where('id', $id)->firstorfail();
            $instructor->delete();
            return redirect()->route('educators-index')->with('deleted', 'deleted successfully');
        }

        return redirect()->back()->with('edu_delete_error', 'fail');

        


    }

    /*-----------------------------------------------------------End manage instructors---------------------------------------------------------*/
    
}