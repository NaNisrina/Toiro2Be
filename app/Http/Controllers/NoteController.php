<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Http\Request;

class NoteController extends Controller
{
    // Index
    public function index ()
    {
        $note = Note::all();
        return view('note', compact('note'));
    }
}
