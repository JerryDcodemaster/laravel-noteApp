<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AppUsers;

class NoteController extends Controller
{
    // Show Create Note Form
    public function create() {
        return view('notes.create');
    }

    // Store Users Data
    public function store(Request $request) {
        $formFields = $request->validate([
            'headtext' => ['required', 'string'],
            'description' => ['required', 'string'],
            'tag' => ['required', 'string'],
        ]);

        AppUsers::create($formFields);

        return redirect('/dashboard');
    }

    // Show user data
    public function viewUserNotes() {
        $notes = AppUsers::get();

        return view('dashboard', [
            'notes' => $notes
        ]);
    }

    // Edit Note
    public function editUserNotes($id) {
        $note = AppUsers::findOrFail($id);

        return view('notes.edit', compact('note'));
    }

    // Update Note
    public function updateUserNotes(Request $request, $id) {
        $updatedNote = AppUsers::find($id);
        $updatedNote->headtext = $request->input('headtext');
        $updatedNote->description = $request->input('description');
        $updatedNote->tag = $request->input('tag');
        
        $updatedNote->save();
        return redirect('/dashboard')->with('success', 'Note updated successfully');
    }

    public function deleteUserNotes($id) {
        $note = AppUsers::findOrFail($id);
        $note->delete();

        return redirect('/dashboard');
    }
}
