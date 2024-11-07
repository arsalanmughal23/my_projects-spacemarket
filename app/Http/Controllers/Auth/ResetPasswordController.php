<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Carbon\Carbon;
use Error;
use Illuminate\Foundation\Auth\ResetsPasswords;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

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
    protected $redirectTo = RouteServiceProvider::HOME;

    public function showResetForm($token)
    {
        return view('auth.passwords.reset')->with(['token' => $token, 'email' => request()->email]);
    }


    /**
     * Reset the given user's password.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function reset(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'token' => 'required',
            'email' => 'required|email|exists:users,email',
            'password' => 'required|min:8|confirmed',
        ]);

        if ($validator->fails())
            return redirect()->back()->withErrors($validator->errors());

        try{

            $passwordReset = DB::table('password_resets')->where('email', $request->email)->first();
            if (!$passwordReset)
                throw new Error('You don`t have any forgot request');

            if (Carbon::parse($passwordReset->created_at)->addMinutes(5)->isPast()) {
                DB::table('password_resets')->where('email', $passwordReset->email)->delete();
                throw new Error('Token is expired');
            }

            if (!Hash::check($request->token, $passwordReset->token))
                throw new Error('Invalid token');

            $user = User::where('email', $request->email)->first();
            $user->forceFill([
                'password' => Hash::make($request->password),
                'remember_token' => Str::random(60),
            ])->save();

            DB::table('password_resets')->where('email', $passwordReset->email)->delete();

            return redirect()->route('login')->with('status', 'Password is Reset Successfully');

        } catch (Error $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
}
