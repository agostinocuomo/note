<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NotepadController extends Controller
{
    public function index(Request $request)
    {
        session(['user_id' => 123, 'username' => 'john_doe']);
        $notes= '';
        $notes = $request->session()->get('notes', []);
        return view('welcome', compact('notes'));
    }

   /*  public function store(Request $request)
    {

        $notes = $request->session()->get('notes', []);
        $notes[] = $request->note;
        $request->session()->put('notes', $notes);

        return redirect()->back();

    } */

    
    
}
