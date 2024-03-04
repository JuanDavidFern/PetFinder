<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\User;
use Illuminate\Database\QueryException;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;
use Illuminate\Support\Str;

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
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'Profile updated!');
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

        if ($user->photo != "storage/user_imgs/defaultPhoto.png") {
            Storage::delete("public/user_imgs/" . Str::replaceFirst("storage/user_imgs/", "", $user->photo));
        }
        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }

    public function updatePhoto(Request $request)
    {
        $user = Auth::user();
        echo $request->photo;
        if (isset($request->photo)) {
            try {
                if ($user->photo != "storage/user_imgs/defaultPhoto.png") {
                    Storage::delete("public/user_imgs/" . Str::replaceFirst("storage/user_imgs/", "", $user->photo));
                }
                $userPhoto = time() . "-" . $request->file("photo")->getClientOriginalName();
                $user->photo = "storage/user_imgs/" . $userPhoto;
                $request->file("photo")->storeAs("public/user_imgs", $userPhoto);
                $user->save();
                $msg = "Photo updated";
            } catch (QueryException $th) {
                $msg = "Photo could not be updated";
            }
        } else {
            $msg = "Photo updated";
        }

        return Redirect::route('profile.edit')->with('status', $msg);
    }

    public function profile(Request $request)
    {
        $user = User::findOrFail($request->id);
        return view('user.otherUserProfile', compact('user'));
    }

    public function adminView()
    {
        $users = User::all();
        return view('user.admin', compact('users'));
    }

    public function deleteOtherUser(Request $request)
    {
        try {
            User::findOrFail($request->user)->delete();
            $msg = "User deleted successfully";
        } catch (QueryException $th) {
            $msg = "User could not be deleted";
        }
        return to_route('user.admin')->with("message", $msg);
    }

    public function promoteToAdmin(Request $request)
    {
        try {
            $user = User::findOrFail($request->user);
            $user->admin = 1;
            $user->save();
            $msg = "User promoted successfully";
        } catch (QueryException $th) {
            $msg = "User could not be promoted";
        }
        return to_route('user.admin')->with("message", $msg);
    }

    public function myAnimalsSponsorsRequests()
    {
        return view('user.sponsors-requests');
    }
}
