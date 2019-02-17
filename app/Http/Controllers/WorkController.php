<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;

use App\Work;
use App\Company;
use App\Employee;
use App\Worker;
use App\Truck;
use App\Subcontractor;

class WorkController extends Controller
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
        if (!request('selected_date')) {
            $day = Carbon::now()->format('Y-m-d');
        } else {
            $day = request('selected_date');
        }
        $works = Work::all()->where('date','=', $day)->sortBy('time');
        return view('app.works.works', compact('works', 'day'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $companies = Company::all()->sortBy('name');
        $employees = Employee::all()->sortBy('name');
        $workers = Worker::all()->sortBy('name');
        $subcontractors = Subcontractor::all()->sortBy('name');
        $trucks = Truck::all()->sortBy('plate');
        return view('app.works.newwork', compact('companies', 'employees', 'workers', 'subcontractors', 'trucks'));
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
            'customer' => 'required',
            'description' => 'required',
            'lead' => 'required',
            'managed' => '0',
            'started_time' => 'null',
            'ended_time' => 'null',
            'billed_at' => 'null'
        ]);

        $work = new Work;

        $work->customer_id = request('customer');
        $work->need = request('need');
        $work->address = request('address');
        $work->description = request('description');
        $work->comment = request('comment');
        $work->order_number = request('order_number');
        $work->date = request('date');
        $work->time = request('time');
        $work->lead = request('lead');
        $work->save();

        $work->contacts()->sync(request('contacts'), false);

        if (request('date') != null) {
            return redirect('works/?selected_date='.request('date'));
        } else {
            return redirect('works/drafts');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Work  $work
     * @return \Illuminate\Http\Response
     */
    public function show(Work $work)
    {
        return view('app.works.work', compact('work'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Work  $work
     * @return \Illuminate\Http\Response
     */
    public function edit(Work $work)
    {
        $companies = Company::all()->sortBy('name');
        $employees = Employee::all()->sortBy('name');
        $workers = Worker::all()->sortBy('name');
        $subcontractors = Subcontractor::all()->sortBy('name');
        $trucks = Truck::all()->sortBy('plate');
        return view('app.works.editwork', compact('work', 'companies', 'employees', 'workers', 'subcontractors', 'trucks'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Work  $work
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Work $work)
    {
        $this->validate(request(), [
            'customer' => 'required',
            'description' => 'required',
            'lead' => 'required',
        ]);

        $work->customer_id = request('customer');
        $work->need = request('need');
        $work->address = request('address');
        $work->description = request('description');
        $work->comment = request('comment');
        $work->order_number = request('order_number');
        $work->date = request('date');
        $work->time = request('time');
        $work->lead = request('lead');
        $work->save();

        $work->contacts()->sync(request('contacts'), true);
        $work->workers()->sync(request('workers'), true);
        $work->trucks()->sync(request('trucks'), true);
        $work->subcontractors()->sync(request('subcontractors'), true);

        if (request('date') != null) {
            return redirect('works/?selected_date='.request('date'));
        } else {
            return redirect('works/drafts');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Work  $work
     * @return \Illuminate\Http\Response
     */
    public function destroy(Work $work)
    {
        $work->delete();
        return redirect('works');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Work  $work
     * @return \Illuminate\Http\Response
     */
    public function billing(Work $work)
    {
        $work->billed_at = Carbon::now();
        $work->save();
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Work  $work
     * @return \Illuminate\Http\Response
     */
    public function showNotBilled()
    {
        $works = Work::whereNull('billed_at')
            ->where('date', '<', Carbon::now('Europe/Budapest')
                ->format('Y-m-d'))
            ->get()
            ->sortBy('date');

        return view('app.works.works', compact('works', 'notes'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Work  $work
     * @return \Illuminate\Http\Response
     */
    public function showDrafts()
    {
        $works = Work::whereNull('billed_at')
            ->whereNull('date')
            ->get();

        return view('app.works.works', compact('works', 'notes'));
    }
}
