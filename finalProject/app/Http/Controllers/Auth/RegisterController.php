<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use App\Teacher;
use App\Admin;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
        $this->middleware('guest:student');
        $this->middleware('guest:teacher');
    }

    public function showStudentRegisterForm()
    {
        $url = 'student';
        return view('students.student-register', compact('url'));
    }

    public function showInstructorRegisterForm()
    {
        $url = 'instructor';
        return view('instructors.instructor-register', compact('url'));
    }

    public function showAdminRegisterForm()
    {
        $url = 'admin';
        return view('admins.admin-register', compact('url'));
    }
    


    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */

    protected function createStudent(Request $request)
    {
        validator(request()->all())->validate();
        $student = User::create([
            'name' => request('name'),
            'email' => request('email'),
            'password' => Hash::make(request('password')),
        ]);
        return redirect()->intended('login/student');
    }

    protected function createInstructor(Request $request)
    {
        validator(request()->all())->validate();
        $instructor = Teacher::create([
            'name' => request('name'),
            'email' => request('email'),
            'password' => Hash::make(request('password')),
        ]);
        return redirect()->route('instructor-login');
    }

    protected function createAdmin(Request $request)
    {
        validator(request()->all())->validate();
        $admin = Admin::create([
            'name' => request('name'),
            'email' => request('email'),
            'password' => Hash::make(request('password')),
        ]);
        return redirect()->route('admin-login');
    }
    
}
