<?php

namespace App\Http\Controllers;

use App\Note;
use Illuminate\Http\Request;
use Carbon\Carbon;

class NoteController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $uri =  $request->path();
        $today = Carbon::today()->toDateString();

        if ($uri == 'allnotes') {
            $notes = Note::all()->sortBy('date');
        } elseif ($uri == 'notes') {
            $notes = Note::all()->where('date', '>=', Carbon::today()->toDateString())->sortBy('date');
        }
        return view('app.notes.notes', compact('notes', 'uri', 'today'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('app.notes.newnote');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate(request(), [
            'date' => 'required',
            'note' => 'required'
        ]); 
        
        $note = new Note;

        $note->date = request('date');
        $note->note = request('note');
        $note->save();
        return redirect('notes');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Note  $note
     * @return \Illuminate\Http\Response
     */
    public function show(Note $note)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Note  $note
     * @return \Illuminate\Http\Response
     */
    public function edit(Note $note)
    {
        return view('app.notes.editnote', compact('note'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Note  $note
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Note $note)
    {
        $this->validate(request(), [
            'date' => 'required',
            'note' => 'required'
        ]);

        $note->date = request('date');
        $note->note = request('note');
        $note->save();
        return redirect('notes');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Note  $note
     * @return \Illuminate\Http\Response
     */
    public function destroy(Note $note)
    {
        $note->delete();
        return redirect('notes');
    }
}
