<?php

namespace App\Http\Controllers;

use App\Http\Requests\AccountSettingsRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AccountSettingsController extends Controller
{
    public function update(AccountSettingsRequest $request)
    {
        $user = auth()->user();

        if (Hash::check($request->current_password, $user->password)) {
            if ($request->filled('email')  && $request->email !== $user->email) {
                $user->email = $request->email;
            }

            if ($request->filled('new_password') && $request->filled('confirm_password')) {
                if($request->new_password===$request->confirm_password){
                    $user->password = Hash::make($request->new_password);
                }
            }

            $user->save();

            return redirect()->back()->with('success', 'Account settings updated successfully.');
        }

        return redirect()->back()->with('error','Current password is incorrect.');
    }
}