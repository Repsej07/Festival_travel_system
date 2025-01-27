<?php

namespace App\Http\Controllers;

use App\Models\ContactModel;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function store(Request $request){
       $request->validate([
           'name' => 'required|string',
           'email' => 'required|string|email',
           'message' => 'required|string',
       ]);

        ContactModel::create($request->all());
        return redirect()->route('contact')->with('success', 'Message sent successfully');
    }
}
