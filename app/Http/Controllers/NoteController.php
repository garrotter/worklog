<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class NoteController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function getNotes($startDay, $endDay)
    {
        $notes = Note::whereBetween(DB::raw('DATE(date)'), array($startDay, $endDay))->get()->sortBy('date');

        return $notes;
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
        $startDate = $request->startDate;
        $endDate = $request->endDate;

        if ($uri == 'notes' && (!$startDate && !$endDate)) {
            $notes = $this->getNotes($today, '2999-12-31');
        } elseif ($uri == 'notes' && ($startDate || $endDate)){
            if (!$startDate) { $startDate = '1900-01-01';}
            if (!$endDate) { $endDate = $today;}

            $notes = $this->getNotes($startDate, $endDate);
        } else {
            $notes = Note::all()->sortBy('date');
        }

        return view('app.notes.notesList', compact('notes', 'startDate', 'endDate'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // return view('app.notes.newnote');
        return $this->edit(new Note());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return $this->update($request, new Note());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Note  $note
     * @return \Illuminate\Http\Response
     */
    public function show(Note $note)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Note  $note
     * @return \Illuminate\Http\Response
     */
    public function edit(Note $note)
    {
        return view('app.notes.formForNote', compact('note'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Note  $note
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
     * @param  \App\Models\Note  $note
     * @return \Illuminate\Http\Response
     */
    public function destroy(Note $note)
    {
        $note->delete();
        return redirect('notes');
    }
}
