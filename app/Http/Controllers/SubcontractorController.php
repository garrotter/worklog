<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;

use App\Subcontractor;

class SubcontractorController extends Controller
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
    public function index()
    {
        $subcontractors = Subcontractor::all()->sortBy('name');
        return view('app.subcontractors.subcontractors', compact('subcontractors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('app.subcontractors.newsubcontractor');
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
            'name' => 'required',
            'phone' => 'required',
            'archived_at' => 'null'
        ]);

        $subcontractor = new Subcontractor;

        $subcontractor->name = request('name');
        $subcontractor->phone = request('phone');
        $subcontractor->email = request('email');
        $subcontractor->save();
        return redirect('subcontractors');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Subcontractor  $subcontractor
     * @return \Illuminate\Http\Response
     */
    public function show(Subcontractor $subcontractor)
    {
        return view('app.subcontractors.subcontractor', compact('subcontractor'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Subcontractor  $subcontractor
     * @return \Illuminate\Http\Response
     */
    public function edit(Subcontractor $subcontractor)
    {
        return view('app.subcontractors.editsubcontractor', compact('subcontractor'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Subcontractor  $subcontractor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Subcontractor $subcontractor)
    {
        $this->validate(request(), [
            'name' => 'required',
            'phone' => 'required',
            'archived_at' => 'null'
        ]);

        $subcontractor->name = request('name');
        $subcontractor->phone = request('phone');
        $subcontractor->email = request('email');
        $subcontractor->save();
        return redirect('subcontractor/'.$subcontractor->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Subcontractor  $subcontractor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Subcontractor $subcontractor)
    {
        $subcontractor->archived_at = Carbon::now();
        $subcontractor->phone = NULL;
        $subcontractor->email = NULL;
        $subcontractor->save();
        return redirect('subcontractors');
    }
}
