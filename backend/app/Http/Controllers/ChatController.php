<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ChatController extends Controller
{
   
    
    public function index()
    {
        // return view(view: 'dashboard.admin.pages.chat.discussions');
        echo "oij";
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