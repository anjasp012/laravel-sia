<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Profil;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Http\Request;

class ResetPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;

    /**
     * Where to redirect users after resetting their password.
     *
     * @var string
     */
    protected $redirectTo = '/admin/dashboard';

    public function showResetForm(Request $request)
    {
        $token = $request->route()->parameter('token');
        $data_lembaga = Profil::first();
        return view('auth.passwords.reset')->with(
            ['token' => $token, 'email' => $request->email, 'data_lembaga' => $data_lembaga]
        );
    }

    protected function resetPassword($user, $password)
    {
        $this->setUserPassword($user, $password);


        $user->save();

        event(new PasswordReset($user));

        $this->guard()->login($user);
    }
}
