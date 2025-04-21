<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ChatController extends Controller
{
   
    
    public function index()
    {
        $users=User::all();
        return view( 'app.chat.discussions.index', compact('users'));
    }

    public function show($id)
    {
        // return view(view: 'dashboard.admin.pages.chat.discussions.show');
    }

    public function destroy($id)
    {
        // return view(view: 'dashboard.admin.pages.chat.discussions.destroy');
    }

    
    
}