<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
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
        $this->middleware('guest')->except('logout');
        $this->middleware('guest:student')->except('logout');
        $this->middleware('guest:teacher')->except('logout');
        $this->middleware('guest:admin')->except('logout');

    }

    /* 
    These next Three methods returns
    all different login forms
     for diferrent users
     */
    public function showStudentLoginForm()
    {
        $url = 'student';
        return view('students.student-login', compact('url'));
    }

    public function showInstructorLoginForm()
    {
        $url = 'instructor';
        return view('instructors.instructor-login', compact('url'));
    }

    public function showAdminLoginForm()
    {
        $url = 'admin';
        return view('admins.admin-login', compact('url'));
    }


    //This method is for checking email and password right format
    protected function validator(Request $request)
    {
        return $this->validate($request, [
            'email'   => 'required|email',
            'password' => 'required|min:6'
        ]);
    }
    

    protected function guardLogin(Request $request, $guard)
    {
        $this->validator($request);

        return Auth::guard($guard)->attempt(
            [
                'email' => $request->email,
                'password' => $request->password
            ],
            request('remember')
        );
    }

    
    

    public function studentLogin(Request $request)
    {
        if ($this->guardLogin($request, 'student')) {

            return redirect()->route('logged-student');
        }
        return redirect()->back()->withInput(request()->only('email', 'remember'))->with('login-error', 'invalid email or password');
    }

    public function instructorLogin(Request $request)
    {
        if ($this->guardLogin($request, 'teacher')) {

            return redirect()->route('logged-instructor');
        }
        return redirect()->back()->withInput(request()->only('email', 'remember'))->with('login-error', 'invalid email or password');
    }

    public function adminLogin(Request $request)
    {
        if ($this->guardLogin($request, 'admin')) {

            return redirect()->route('logged-admin');
        }
        return redirect()->back()->withInput(request()->only('email', 'remember'))->with('login-error', 'invalid email or password');
    }


    

    
}