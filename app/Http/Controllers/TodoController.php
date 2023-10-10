<?php

namespace App\Http\Controllers;

use App\Models\Note;
use App\Models\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    // Read
    public function index ()
    {
        $data = Note::all();
        return view('note', compact('data'));
    }

    // Create
    public function create(Request $request, $id)
    {
        $data = Note::find($id);

        // Message
        $message=[
            'required'      => 'Please input :attribute',
            'min'           => 'Field :attribute minimum: :min character',
            'max'           => 'Field :attribute maximum: :max character',
        ];

        // Validation
        $validatedData = $request->validate([
            'todo_name'          => 'required|min:2|max:75',
            'todo_description'   => 'required|max:255',
            'todo_deadline'      => 'required'
        ], $message);

        $validatedData['note_id'] = $request->note_id;

        Todo::create($validatedData);

        return redirect()->route('note')->with('success', 'Data Created Successfully');
    }

    // Store Edit
    public function edit(Request $request, string $id)
    {
        $data = Todo::find($id);

        // Message
        $message=[
            'required'      => 'Please input :attribute',
            'min'           => 'Field :attribute minimum: :min character',
            'max'           => 'Field :attribute maximum: :max character',
        ];

        // Validation
        $validatedData = $request->validate([
            'todo_name'          => 'required|min:2|max:75',
            'todo_description'   => 'required|max:255',
            'todo_deadline'      => 'required'
        ], $message);

        $data->update($validatedData);

        return redirect()->route('note')->with('success', 'Data Edited Successfully');
    }

    // Delete
    public function destroy(string $id)
    {
        $data = Todo::find($id);
        $data->delete();

        return redirect()->route('note')->with('success', 'Data Deleted Successfully');
    }
}
