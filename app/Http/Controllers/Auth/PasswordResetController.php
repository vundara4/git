<?php

namespace App\Http\Controllers\Auth;

use App\Mail\PasswordResetCodeMail;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;

class PasswordResetController extends Controller
{
    /**
     * Show Forgot Password page
     */
    public function showForgotPasswordForm()
    {
        return view('auth.forgot-password');
    }


    /**
     * Send password reset link to user's email
     */
    public function sendResetLinkEmail(Request $request)
    {
        $request->validate([
            'email' => [
                'required',
                'email',
            ],
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return back()
                ->withInput()
                ->withErrors(['email' => 'We could not find an account with that email address.']);
        }

        $user->forceFill([
            'reset_code' => (string) random_int(100000, 999999),
            'reset_code_expires_at' => now()->addMinutes(10),
        ])->save();

        Mail::to($user->email)->send(new PasswordResetCodeMail($user->reset_code));

        return redirect()
            ->route('password.verify.form', ['email' => $user->email])
            ->with('status', 'We have emailed a six-digit verification code to you.');
    }

    /**
     * Show the reset-code verification form.
     */
    public function showVerifyForm(Request $request)
    {
        return view('auth.forgot-password', [
            'verificationEmail' => $request->query('email', old('email')),
        ]);
    }

    /**
     * Verify the code sent to the user's email address.
     */
    public function verifyResetCode(Request $request)
    {
        $code = is_array($request->code)
            ? implode('', $request->code)
            : $request->code;

        $request->merge(['code' => $code]);

        $request->validate([
            'email' => ['required', 'email'],
            'code' => ['required', 'digits:6'],
        ]);

        $user = User::where('email', $request->email)
            ->where('reset_code', $code)
            ->where('reset_code_expires_at', '>', now())
            ->first();

        if (!$user) {
            return back()
                ->withInput()
                ->withErrors(['code' => 'That code is invalid or has expired.']);
        }

        $resetToken = Password::createToken($user);

        $user->forceFill([
            'reset_code' => null,
            'reset_code_expires_at' => null,
        ])->save();

        return redirect()->route('password.reset', [
            'token' => $resetToken,
            'email' => $user->email,
        ]);
    }


    /**
     * Show Reset Password form
     */
    public function showResetForm(
        string $token,
        Request $request
    ) {
        return view('auth.reset-password', [
            'token' => $token,
            'email' => $request->email,
        ]);
    }


    /**
     * Reset user password
     */
    public function reset(Request $request)
    {
        // Validate
        $request->validate([
            'token' => [
                'required',
            ],

            'email' => [
                'required',
                'email',
            ],

            'password' => [
                'required',
                'confirmed',
                'min:8',
            ],
        ]);


        // Reset password
        $status = Password::reset(
            $request->only(
                'email',
                'password',
                'password_confirmation',
                'token'
            ),

            function ($user, $password) {

                // Save new password
                $user->forceFill([
                    'password' => Hash::make($password),

                    // Generate new remember token
                    'remember_token' => Str::random(60),

                ])->save();
            }
        );


        // Password reset successfully
        if ($status === Password::PASSWORD_RESET) {

            return redirect()
                ->route('login')
                ->with(
                    'status',
                    'Your password has been reset successfully. You can now login.'
                );
        }


        // Reset failed
        return back()
            ->withInput(
                $request->only('email')
            )
            ->withErrors([
                'email' => __($status),
            ]);
    }
}