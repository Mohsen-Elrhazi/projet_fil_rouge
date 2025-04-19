<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index(){
        return view('app.contacts.index');
    }

    public function search(Request $request){
        $search = $request->input('query');
        $contacts = [];
        if ($search) {
          $contacts = User::search($search)->get();
        }
        
        return view('app.contacts.index', compact('contacts'));}
}