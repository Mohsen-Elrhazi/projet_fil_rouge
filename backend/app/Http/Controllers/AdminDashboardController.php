<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    public function index(){
        return view('dashboard.admin.pages.dashboard');
    }

    public function manageUsers(){
        $users = User::paginate(8);
        return view('dashboard.admin.pages.users', compact('users'));
    }
}