<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminDashboardController extends Controller
{
    public function index(){
        return view('dashboard.admin.pages.dashboard');
    }

    public function users(){
        $users = User::paginate(8);
        return view('dashboard.admin.pages.users', compact('users'));
    }


    public function profile(){
        $user=Auth::User();
        if ($user->profile) {
            $profile = $user->profile;
        } else {
            $profile = new Profile();
            $profile->user_id = $user->id;
        }         
    return view('dashboard.admin.pages.profile', compact('user'));
    }

    public function accountSettings(Request $request){
        $user= Auth::User();
        
        return view('dashboard.admin.pages.account-settings',compact('user'));
    }
    
}