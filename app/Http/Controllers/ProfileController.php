<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    /**
     * Show profile
     */
    public function index()
    {
        $user = Auth::user();

        return view('profile.show', compact('user'));
    }


    /**
     * Show edit profile
     */
    public function edit()
    {
        $user = Auth::user();

        return view('profile.edit-standalone', compact('user'));
    }


    /**
     * Update profile
     */
    public function update(Request $request)
    {
        $user = Auth::user();

        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],

            'email' => [
                'required',
                'email',
                'max:255',
                'unique:users,email,' . $user->id,
            ],

            'phone' => [
                'nullable',
                'string',
                'max:30',
            ],

            'birth_date' => [
                'nullable',
                'date',
            ],

            'gender' => [
                'nullable',
                'in:male,female,other',
            ],

            'address' => [
                'nullable',
                'string',
                'max:500',
            ],

            'profile_photo' => [
                'nullable',
                'image',
                'mimes:jpg,jpeg,png,webp',
                'max:2048',
            ],
        ]);


        /*
        |--------------------------------------------------------------------------
        | Profile Photo
        |--------------------------------------------------------------------------
        */

        if ($request->hasFile('profile_photo')) {

            if (
                $user->profile_photo &&
                Storage::disk('public')->exists($user->profile_photo)
            ) {
                Storage::disk('public')->delete(
                    $user->profile_photo
                );
            }

            $validated['profile_photo'] =
                $request->file('profile_photo')
                    ->store('profiles', 'public');
        }


        $user->update($validated);

        return redirect()
            ->route('profile.index')
            ->with('success', 'Profile updated successfully.');
    }


    /**
     * Show change password
     */
    public function password()
    {
        return view('profile.change-password');
    }


    /**
     * Update password
     */
    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => [
                'required',
                'current_password',
            ],

            'password' => [
                'required',
                'confirmed',
                'min:8',
            ],
        ]);


        Auth::user()->update([
            'password' => Hash::make(
                $request->password
            ),
        ]);


        return redirect()
            ->route('profile.index')
            ->with(
                'success',
                'Password changed successfully.'
            );
    }


    /**
     * Logout
     */
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()
            ->route('home')
            ->with(
                'success',
                'You have been logged out.'
            );
    }
}