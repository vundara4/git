<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;

class GoogleAuthController extends Controller
{
    public function redirect(): RedirectResponse
    {
        if (! $this->isConfigured()) {
            return redirect()
                ->route('login')
                ->withErrors(['email' => 'Google sign-in is not configured yet.']);
        }

        return Socialite::driver('google')
            ->with(['prompt' => 'select_account'])
            ->redirect();
    }

    public function callback(Request $request): RedirectResponse
    {
        if (! $this->isConfigured()) {
            return redirect()
                ->route('login')
                ->withErrors(['email' => 'Google sign-in is not configured yet.']);
        }

        $googleUser = Socialite::driver('google')->user();
        $email = $googleUser->getEmail();

        if (
            ! is_string($email)
            || ! filter_var($email, FILTER_VALIDATE_EMAIL)
            || ($googleUser->getRaw()['email_verified'] ?? false) !== true
        ) {
            return redirect()
                ->route('login')
                ->withErrors(['email' => 'Google did not provide a verified email address.']);
        }

        $user = User::firstOrCreate(
            ['email' => $email],
            [
                'name' => $googleUser->getName() ?: Str::before($email, '@'),
                'password' => Str::random(64),
                'role' => 'user',
                'email_verified_at' => now(),
            ]
        );

        if ($user->email_verified_at === null) {
            $user->forceFill(['email_verified_at' => now()])->save();
        }

        Auth::login($user);
        $request->session()->regenerate();

        return redirect()->intended(
            $user->isAdmin() ? route('admin.dashboard') : route('dashboard')
        );
    }

    private function isConfigured(): bool
    {
        return filled(config('services.google.client_id'))
            && filled(config('services.google.client_secret'))
            && filled(config('services.google.redirect'));
    }
}
