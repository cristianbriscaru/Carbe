<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contact;
class ContactController extends Controller
{
    public function create(){
        return view('contact.create');
    }

    public function store(Request $request){
        $validated=$request->validate([
            'email'=>'required|email',
            'telephone'=>'numeric',
            'message'=>'required|string',
            //'name'=>'string'
        ]);
        Contact::create($validated);
        
        $alert=['variant' => 'success' , 'title' => 'Your Message Was Sent' , 'message' => 'We received your message and we wil get back to you in no time'];
        return redirect()->route('home')->with('alert',$alert);
    }
}
