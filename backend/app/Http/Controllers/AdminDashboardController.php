<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminDashboardController extends Controller
{
    public function index(){
        return view('dashboard.admin.pages.dashboard');
    }

    public function manageUsers(){
        $users = User::paginate(8);
        return view('dashboard.admin.pages.users', compact('users'));
    }

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

    public function profile(){
        $user=Auth::User();
        
        // if($user->profile){
        // $profile= $user->profile;
        //  }
         
    return view('dashboard.admin.pages.profile', compact('user'));
    }

    public function account(Request $request){
        $user= Auth::User();
        
        return view('dashboard.admin.pages.account-settings',compact('user'));
    }
    
}