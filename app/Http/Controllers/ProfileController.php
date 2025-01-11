<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(Request $request): RedirectResponse
    {
        // Validate the incoming request
        $request->validate([
            'username' => ['required', 'string', 'max:255', 'unique:users,username,' . Auth::id()],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,' . Auth::id()],
            'image' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
        ]);

        // Get the authenticated user
        $user = $request->user();

        // Update the username and email fields
        $user->username = $request->username;
        $user->email = $request->email;

        // Check if an image was uploaded
        if ($request->hasFile('image')) {
            // Delete the old profile picture from storage (if exists)
            if ($user->profile_picture && Storage::exists($user->profile_picture)) {
                Storage::delete($user->profile_picture);
            }

            // Store the new image
            $imagePath = $request->file('image')->storeAs(
                'profile_pictures',
                $request->username . '_' . time() . '.' . $request->file('image')->getClientOriginalExtension(),
                'public'
            );

            // Save the new profile picture path to the user model
            $user->profile_picture = $imagePath;
        }

        // Save the updated user information
        $user->save();

        // Redirect back to the profile edit page with a success message
        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        // Optionally, delete the profile picture when the account is deleted
        if ($user->profile_picture && Storage::exists($user->profile_picture)) {
            Storage::delete($user->profile_picture);
        }

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
