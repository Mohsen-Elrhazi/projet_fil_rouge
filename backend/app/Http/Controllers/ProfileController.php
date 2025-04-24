<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileRequest;
use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
 
  
    /**
     * Store a newly created resource in storage.
     */
    public function update(Request $request)
    {
        $user = Auth::User();
        
        if ($user->profile) {
            $profile = $user->profile;
        } else {
            $profile = new Profile();
            $profile->user_id = $user->id;
        }
        
        $this->authorize('update',$profile);

        // Update user information
        if ($request->filled('name')) {
            $user->name = $request->name;
        }
  
        $user->save();

        // Update profile information
        $profile->phone = $request->phone; 
        $profile->address = $request->address; 
        $profile->birth_date = $request->birth_date; 
        $profile->bio= $request->bio;

        if ($request->hasFile('avatar')) {
            // Delete the old image if it exists
            if ($profile->avatar && Storage::exists($profile->avatar)) {
                Storage::delete($profile->avatar);
            }
            $avatar = $request->file('avatar');
            $avatarName = uniqid('avatar_') . '.' . $avatar->getClientOriginalExtension();
            // Store the new image
            $avatarPath = $avatar->storeAs('profiles', $avatarName, 'public');
            $profile->avatar = $avatarPath;
        }

        $profile->save();
        
        return redirect()->back()->with('success', 'Profile updated successfully.');
    }

    public function profile(){
        $user=Auth::User();
        if ($user->profile) {
            $profile = $user->profile;
        } else {
            $profile = new Profile();
            $profile->user_id = $user->id;
        }         
    return view('app.account.profile', compact('user'));
    }
    

}