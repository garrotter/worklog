<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

use App\Models\Work;
use \Models\Company;
use \Models\Employee;
use App\Models\Worker;
use App\Models\Truck;
use App\Models\Subcontractor;

class WorkController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    private function searchWorks($startDate, $endDate, $company)
    {
        if($company) {
            $works = Work::whereBetween(DB::raw('DATE(date)'), array($startDate, $endDate))
            ->where('customer_id', $company)->get()->sortBy('date')->sortBy('time');
        } else {
            $works = Work::whereBetween(DB::raw('DATE(date)'), array($startDate, $endDate))->get()->sortBy('date')->sortBy('time');
        }

        return $works;
    }

    private function worksArray($day)
    {
        $company = '';
        $works = $this->searchWorks($day, $day, $company);
        $arrayWorks = array();
        foreach ($works as $work) {
            array_push($arrayWorks, $work);
        }
        return $arrayWorks;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $day = $request->selected_date ?: Carbon::now()->format('Y-m-d');
        $dayObj = app('App\Http\Controllers\DayController')->setDay($day);
        $works = Work::all()->where('date','=', $day)->sortBy('time');
        $message = $works->isEmpty() ? 'Sajnos nincs munka!' : '';
        $notes = app('App\Http\Controllers\NoteController')->getNotes($day, $day);

        return view('app.works.works', compact('works', 'day', 'dayObj', 'notes', 'message'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $companies = Company::whereNull('archived_at')->get()->sortBy('name');
        $employees = Employee::whereNull('archived_at')->get()->sortBy('name');

        return view('app.works.newwork', compact('companies', 'employees'));
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
            'lead' => 'required'
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
     * @param  \App\Models\Work  $work
     * @return \Illuminate\Http\Response
     */
    public function show(Work $work)
    {
        return view('app.works.work', compact('work'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Work  $work
     * @return \Illuminate\Http\Response
     */
    public function edit(Work $work)
    {
        $companies = Company::whereNull('archived_at')->get()->sortBy('name');
        $employees = Employee::whereNull('archived_at')->get()->sortBy('name');
        $workers = Worker::whereNull('archived_at')->get()->sortBy('name');
        $subcontractors = Subcontractor::whereNull('archived_at')->get()->sortBy('name');
        $trucks = Truck::whereNull('archived_at')->get()->sortBy('plate');
        return view('app.works.editwork', compact('work', 'companies', 'employees', 'workers', 'subcontractors', 'trucks'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Work  $work
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
        $work->started_time = request('started_time');
        $work->ended_time = request('ended_time');
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
     * @param  \App\Models\Work  $work
     * @return \Illuminate\Http\Response
     */
    public function destroy(Work $work)
    {
        $work = Work::findOrFail($work->id);

        $work->workers()->detach();
        $work->trucks()->detach();
        $work->subcontractors()->detach();
        $work->contacts()->detach();

        $work->delete();

        return redirect('works');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Work  $work
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
     * @param  \App\Models\Work  $work
     * @return \Illuminate\Http\Response
     */
    public function showNotBilled()
    {
        $works = Work::whereNull('billed_at')
            ->where('date', '<', Carbon::now('Europe/Budapest')
                ->format('Y-m-d'))
            ->get()
            ->sortBy('date');

        $message = $works->isEmpty() ? 'Minden elvégzett munka ki van számlázva!' : 'Számlázandó munkák:';

        return view('app.works.works', compact('works', 'message'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Work  $work
     * @return \Illuminate\Http\Response
     */
    public function showDrafts()
    {
        $works = Work::whereNull('billed_at')
            ->whereNull('date')
            ->get();

        $message = $works->isEmpty() ? 'Nincs függőben munka!' : 'Függőben lévő munkák:';

        return view('app.works.works', compact('works', 'message'));
    }

    public function search(Request $request)
    {
        $companies = Company::whereNull('archived_at')->get()->sortBy('name');
        $startDate = $request->startDate ?: Carbon::now()->startOfMonth();
        $endDate = $request->endDate ?: Carbon::today()->toDateString();

        if(!$request->startDate && !$request->endDate && !$request->customer){
            return view('app.works.search', compact('companies', 'startDate', 'endDate'));
        } else {
            if ($request->customer) {
                $works = Work::whereBetween(DB::raw('DATE(date)'), array($startDate, $endDate))
                    ->where('customer_id', $request->customer)->get()->sortBy('time')->sortBy('date');
                $customerId = $request->customer;
            } else {
                $works = Work::whereBetween(DB::raw('DATE(date)'), array($startDate, $endDate))->get()->sortBy('time')->sortBy('date');
            }

        }

        return view('app.works.search', compact('companies', 'startDate', 'endDate', 'works'));
    }

    public function week(Request $request)
    {
        $mon = $request->start_date ? new Carbon($request->start_date) : Carbon::now()->startOfWeek();
        $tue = (new Carbon($mon))->addDay(1);
        $wed = (new Carbon($mon))->addDay(2);
        $thu =  (new Carbon($mon))->addDay(3);
        $fri =  (new Carbon($mon))->addDay(4);
        $sat =  (new Carbon($mon))->addDay(5);
        $sun =  (new Carbon($mon))->addDay(6);

        $worksMonday= $this->worksArray($mon);
        $worksTuesday= $this->worksArray($tue);
        $worksWednesday= $this->worksArray($wed);
        $worksThursday= $this->worksArray($thu);
        $worksFriday= $this->worksArray($fri);
        $worksSaturday= $this->worksArray($sat);
        $worksSunday= $this->worksArray($sun);

        $monday = app('App\Http\Controllers\DayController')->setDay($mon);
        $tuesday = app('App\Http\Controllers\DayController')->setDay($tue);
        $wednesday = app('App\Http\Controllers\DayController')->setDay($wed);
        $thursday = app('App\Http\Controllers\DayController')->setDay($thu);
        $friday = app('App\Http\Controllers\DayController')->setDay($fri);
        $saturday = app('App\Http\Controllers\DayController')->setDay($sat);
        $sunday = app('App\Http\Controllers\DayController')->setDay($sun);

        $notesMonday = app('App\Http\Controllers\NoteController')->getNotes($mon, $mon);
        $notesTuesday = app('App\Http\Controllers\NoteController')->getNotes($tue, $tue);
        $notesWednesday = app('App\Http\Controllers\NoteController')->getNotes($wed, $wed);
        $notesThursday = app('App\Http\Controllers\NoteController')->getNotes($thu, $thu);
        $notesFriday = app('App\Http\Controllers\NoteController')->getNotes($fri, $fri);
        $notesSaturday = app('App\Http\Controllers\NoteController')->getNotes($sat, $sat);
        $notesSunday = app('App\Http\Controllers\NoteController')->getNotes($sun, $sun);

        $maxWork = 0;

        if ($maxWork < count($worksMonday)) {
            $maxWork = count($worksMonday);
        }
        if ($maxWork < count($worksTuesday)) {
            $maxWork = count($worksTuesday);
        }
        if ($maxWork < count($worksWednesday)) {
            $maxWork = count($worksWednesday);
        }
        if ($maxWork < count($worksThursday)) {
            $maxWork = count($worksThursday);
        }
        if ($maxWork < count($worksFriday)) {
            $maxWork = count($worksFriday);
        }
        if ($maxWork < count($worksSaturday)) {
            $maxWork = count($worksSaturday);
        }
        if ($maxWork < count($worksSunday)) {
            $maxWork = count($worksSunday);
        }

        return view('app.works.weekly', compact('monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday', 'sunday', 'worksMonday', 'worksTuesday', 'worksWednesday', 'worksThursday', 'worksFriday', 'worksSaturday', 'worksSunday', 'maxWork', 'notesMonday', 'notesTuesday', 'notesWednesday', 'notesThursday', 'notesFriday', 'notesSaturday', 'notesSunday'));
    }
}
