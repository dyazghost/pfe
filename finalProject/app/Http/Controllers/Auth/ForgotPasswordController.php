<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use DB;
use Carbon\Carbon;
use Mail;

class ForgotPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */

    use SendsPasswordResetEmails;

    public function getStudentEmail(){
        return view('students.forgot-password');
    }

    public function postStudentEmail(Request $request){
        //You can add validation login here
        $user = DB::table('users')->where('email', $request->email)
        ->first();
        //Check if the user exists
        if (is_null($user)) {
            return redirect()->back()->withErrors(['email' => trans('User does not exist')]);
        }           

        //Create Password Reset Token
        DB::table('password_resets')->insert([
                'email' => $request->email,
                'token' => Str::random(60),
                'created_at' => Carbon::now()
            ]);
        //Get the token just created above
        $tokenData = DB::table('password_resets')
                        ->where('email', $request->email)->first();

        if ($this->sendResetLinkEmail($request)) {
            return redirect()->back()->with('status', trans('A reset link has been sent to your email address.'));
        } else {
        return redirect()->back()->withErrors(['error' => trans('A Network Error occurred. Please try again.')]);
        }
    }

    public function getInstructorEmail(){
        return view('instructors.forgot-password');
    }

    public function postInstructorEmail(Request $request){
        //You can add validation login here
        $teacher = DB::table('teachers')->where('email', $request->email)
        ->first();
        //Check if the user exists
        if (is_null($teacher)) {
            return redirect()->back()->withErrors(['email' => trans('User does not exist')]);
        }           

        //Create Password Reset Token
        DB::table('password_resets')->insert([
                'email' => $request->email,
                'token' => Str::random(60),
                'created_at' => Carbon::now()
            ]);
        //Get the token just created above
        $tokenData = DB::table('password_resets')
                        ->where('email', $request->email)->first();

        if ($this->sendResetLinkEmail($request)) {
            return redirect()->back()->with('status', trans('A reset link has been sent to your email address.'));
        } else {
        return redirect()->back()->withErrors(['error' => trans('A Network Error occurred. Please try again.')]);
        }
        
    }

    public function getAdminEmail(){
        return view('admins.forgot-password');
    }

    public function postAdminEmail(Request $request){
        //You can add validation login here
        $admin = DB::table('admins')->where('email', $request->email)
        ->first();
        //Check if the user exists
        if (is_null($admin)) {
            return redirect()->back()->withErrors(['email' => trans('User does not exist')]);
        }           

        //Create Password Reset Token
        DB::table('password_resets')->insert([
                'email' => $request->email,
                'token' => Str::random(60),
                'created_at' => Carbon::now()
            ]);
        //Get the token just created above
        $tokenData = DB::table('password_resets')
                        ->where('email', $request->email)->first();

        if ($this->sendResetLinkEmail($request)) {
            return redirect()->back()->with('status', trans('A reset link has been sent to your email address.'));
        } else {
        return redirect()->back()->withErrors(['error' => trans('A Network Error occurred. Please try again.')]);
        }
    }
    
}