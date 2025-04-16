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
    public function storeOrUpdate(ProfileRequest $request)
    {
        $user = Auth::user();

        if ($user->profile) {
            $profile = $user->profile;
        } else {
            $profile = new Profile();
            $profile->user_id = $user->id;
        }

        // Update user information
        if ($request->has('name')) {
            $user->name = $request->name;
        }
        if ($request->has('email')) {
            $user->email = $request->email;
        }
        // if ($request->has('password')) {
        //     $user->password = Hash::make($request->password);
        // }

        $user->save();

        // Update profile information
        $profile->phone = $request->phone; 
        $profile->address = $request->address; 
        $profile->birth_date = $request->birth_date; 

        if ($request->hasFile('image')) {
            // Delete the old image if it exists
            if ($profile->image && Storage::exists($profile->image)) {
                Storage::delete($profile->image);
            }
            $image = $request->file('image');
            $path = $image->store('public/profiles');
            $profile->image = $path;
        }

        $profile->save();
        return redirect()->route('admin.profile')->with('success', 'Profile updated successfully.');
    }


    /**
     * Display the specified resource.
     */
    public function show(Profile $profile)
    {
        //
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Profile $profile)
    {
        //
    }



}