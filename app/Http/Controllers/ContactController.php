<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ContactController extends Controller
{
    public function index(Request $request)
    {
        if($request->searchContact){
            $contacts= User::search($request->searchContact)->get();
           
        }else{
            $contacts = User::with('profile')
                ->where('id', '!=', Auth::id())
                ->orderBy('name')
                ->get();
        }
    
        return view('contacts.index', compact('contacts'));
    }
}