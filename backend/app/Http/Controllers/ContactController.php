<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\User;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index(){
        $users = User::all();
        return view('app.contacts.index', compact('users'));
    }

    public function search(Request $request){
        $search = $request->input('query');
        $users = [];
        if ($search) {
          $users = User::search($search)->get();
        }
        
        return view('app.contacts.partials.search-results', compact('users'));
    }

    public function sendRequest(Request $request){
        $request->validate([
            'recipient_id' => 'required|exists:users,id',
        ]);
        
        $contact = new Contact();
        $contact->sender_id = auth()->user()->id;
        $contact->recipient_id = $request->recipient_id;
        $contact->status = 'pending';
        $contact->save();   
        return back()->with('success', 'Friend request sent successfully!');
    }

    public function cancelRequest(Request $request){
        $request->validate([
            'request_id' => 'required|exists:contacts,id',
        ]);
        
        $contact = Contact::findOrFail($request->request_id);
        if ($contact) {
            $contact->delete();
            return back()->with('success', 'Friend request canceled successfully!');
        }
        return back()->with('error', 'Friend request not found!');
    }
        
                        
}