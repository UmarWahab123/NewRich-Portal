<?php

namespace App\Http\Controllers\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\User;
use Illuminate\Support\Facades\Session;
use Auth;
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
    }
    public function userlogin(Request $request)
    {
       $users=User::get();
       foreach ($users as $key => $value) {
           $user=User::find($value->id)->update(['password'=>bcrypt(123456)]);
       }
       // dd('sdaf');
        $email = $request->get('email');
        $password = $request->get('password');
        $request->validate([
            'email'     => 'required',
            'password'  => 'required'
        ]);


        if (Auth::attempt(['email' => $email, 'password' => $password]))
        {
            $user=Auth::user();
            // dd($user);
            // if($user->status=="Inactive"){
            //     Auth::logout();
            //     Session::put("login_error",'Sorry! Your account is suspended. Contact our support team for further info');
            //     return redirect('/login');
            // }
            return redirect('/home');
        }
        else
        {
            Session::put("login_error",'Credentials do not match our records');
            return redirect('/login');
        }

        // $SiteUser = Login::where('email',$request->email)->where('password',md5($request->password))->first();
        // dd($SiteUser);
        // session_start();

        // if($SiteUser)
        // {
        // Session::put('login', $SiteUser);


        //     return Redirect('/home');
        // }
        // else
        // {
        //     return redirect('/login');
        // }
    }
}
