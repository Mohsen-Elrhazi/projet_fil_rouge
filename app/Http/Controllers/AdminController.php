<?php

namespace App\Http\Controllers;

use App\Models\Conversation;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
            $userCount = User::count();
        
            $activeUserCount = User::where('status', 'active')->count();
            
            $inactiveUserCount = User::where('status', 'inactive')->count();
            
            $conversationsCount = Conversation::count();
            
            return view('admin.pages.dashboard', compact(
                'userCount', 
                'activeUserCount', 
                'inactiveUserCount', 
                'conversationsCount'
            ));
    }
}