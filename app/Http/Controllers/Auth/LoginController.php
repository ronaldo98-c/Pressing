<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Events\UserEvent;
use App\Models\User;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Hash;

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

    //use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    //protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            $user = \Auth::user();
            if($user->etat()->first()->nom == "actif")
            {
                $request->session()->regenerate();
                event(new UserEvent($user));
                if($user->role == "administrator")
                {
                    return redirect()->intended('/');
                }
                return redirect()->intended('/entree');
            }
        }
        return back()->withErrors([
            'all' => 'Informations de connexion erronées.',
        ]);
    }
    public function logout(Request $request)
    {
        \Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }
    public function reset(Request $request)
    {
        $request->validate([
            'email'=>'required',
            'password'=>'required|confirmed'
        ]);
        $password = Hash::make($request->password);
        $user = User::where('email',$request->email)->update(['password'=>$password]);
        return redirect('/login')
                ->with('success','Rénitialisation éffectuée.');
    }
}
