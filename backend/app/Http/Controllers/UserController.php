<?php

namespace App\Http\Controllers;

use App\Http\Requests\AccountSettingsRequest;
use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    public function activerOrDesactiver(string $id)
    {

        $user = User::find($id);

        if ($user->status === 'active') {
            $user->status = 'inactive';
            $user->save();

        } elseif ($user->status === 'inactive') {
            $user->status = 'active';
            $user->save();
        }
        return redirect()->route('admin.users')->with('success', 'User status updated successfully.');
    }
   
    public function updateAccountSettings(AccountSettingsRequest $request)
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