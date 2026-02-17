<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NotepadController extends Controller
{
    public function index(Request $request)
    {
      
         if (auth()->check()) {
        $user = auth()->user();
    } else {
        $user = null;
    }
        $notes= '';
        $notes = $request->session()->get('notes', []);
        return view('welcome', compact('notes'));
    }

    public function userAuth(){
        if (auth()->check()) {
    $user = auth()->user();
}

        return view('log.homeAuth');
    }
   /*  public function store(Request $request)
    {

        $notes = $request->session()->get('notes', []);
        $notes[] = $request->note;
        $request->session()->put('notes', $notes);

        return redirect()->back();

    } */

    
    
}
