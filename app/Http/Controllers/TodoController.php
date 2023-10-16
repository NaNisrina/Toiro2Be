<?php

namespace App\Http\Controllers;

use App\Models\Note;
use App\Models\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    // Read
    // public function index ()
    // {
    //     $note = Note::all('id','name', 'description');
    //     return view('note', compact('note'));
    // }

    // Show
    // public function show(string $id)
    // {
    //     $data = Note::find($id)->todo()->get();
    //     return view('showtodo', compact('data'));
    // }

    // Detail
    public function detail()
    {
        return view('detailtodo');
    }

    // Create
    public function create($id)
    {
        $data = Note::find($id);
        return view('createtodo', compact('data'));
    }

    // Store Create
    public function store(Request $request)
    {
        // dd($request);

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
            'todo_deadline'      => 'required',
            'todo_status'        => 'required'
        ], $message);

        $validatedData['note_id'] = $request->note_id;

        Todo::create($validatedData);

        return redirect()->route('note')->with('success', 'Data Created Successfully');
    }

    // Show
    // public function show(string $id)
    // {
    //     $data = Note::find($id)->todo()->get();
    //     return view('showtodo', compact('data'));
    // }

    // Edit
    public function edit($id)
    {
        $data = Todo::find($id);
        return view('edittodo', compact('data'));
    }

    // Store Edit
    public function update(Request $request, $id)
    {
        $data = Todo::find($id);

        // dd($request);

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
            'todo_deadline'      => 'required',
            'todo_status'        => 'required'
        ], $message);

        // $validatedData['note_id'] = $request->note_id;

        // dd($validatedData);

        // Todo::where('id', $request->id)->update($validatedData);

        $data->update($validatedData);

        return redirect()->route('note')->with('success', 'Data Edited Successfully');
    }

    // Delete
    public function destroy($id)
    {
        $data = Todo::find($id);
        $data->delete();

        return redirect()->route('note')->with('success', 'Data Deleted Successfully');
    }
}
