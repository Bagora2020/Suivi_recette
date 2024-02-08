<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

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
    // protected $redirectTo = '/acceuil-general';

    protected function Authenticated()
    {
     // je recuperer la liste des annees
     // je l enregistre dans la session de l appli avec une cle

    if(Auth::user()->role_as == '1'){
        return redirect('/acceuil-general')->with('status', 'bienvenu(e)');
    }
    else{
        
        return redirect('/acceuil-general')->with('status', 'logged in sucessfully');
    }
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
