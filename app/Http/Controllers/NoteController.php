<?php

namespace App\Http\Controllers;

use App\Models\Note;
use App\Models\Todo;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NoteController extends Controller
{
    // Read
    public function index ()
    {
        $note = Note::with('todo')->where('user_id', '=', Auth::user()->id)->get();
        // ->where(user_id, '=' , Auth::user()->id)
        return view('note', compact('note'));
    }

    // Create
    public function create () {
        return view('createnote');
    }

    // Store Create
    public function store (Request $request)
    {
        // Message
        $message=[
            'required'      => 'Please input :attribute',
            'min'           => 'Field :attribute minimum: :min character',
            'max'           => 'Field :attribute maximum: :max character',
        ];

        // Validation
        $validatedData = $request->validate([
            'name'          => 'required|min:2|max:75',
            'description'   => 'required|max:255',
            'status'        => 'required',
            'category'      => '',
            'user_id'       => '',
        ], $message);

        Note::create($validatedData);

        return redirect()->route('note')->with('success', 'Data Created Successfully');
    }

    // Edit
    public function edit($id) {
        $note = Note::find($id);
        return view('editnote', compact('note'));
    }

    // Store Edit
    public function update(Request $request, $id)
    {
        // Message
        $message=[
            'required'      => 'Please input :attribute',
            'min'           => 'Field :attribute minimum: :min character',
            'max'           => 'Field :attribute maximum: :max character',
        ];

        // Validation
        $validatedData = $request->validate([
            'name'          => 'required|min:2|max:75',
            'description'   => 'required|max:255',
            'status'        => 'required',
            'category'      => '',
            'user_id'       => '',
        ], $message);

        Note::where('id', $request->id)->update($validatedData);

        return redirect()->route('note')->with('success', 'Data Edited Successfully');
    }

    // Delete
    public function destroy ($id)
    {
        $note = Note::find($id);
        $note->delete();

        return redirect()->route('note')->with('success', 'Data Deleted Successfully');
    }

}
