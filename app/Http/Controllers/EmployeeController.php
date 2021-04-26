<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;

use App\Models\Company;
use App\Models\Employee;

class EmployeeController extends Controller
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
        $employees = Employee::all()->sortBy('name');
        $companies = Company::all();
        return view('app.employees.employees', compact('employees', 'companies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $companies = Company::all()->sortBy('name');
        return view('app.employees.newemployee', compact('companies'));
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
            'company' => 'required',
            'archived_at' => 'null'
        ]);

        $employee = new Employee;

        $employee->name = request('name');
        $employee->phone = request('phone');
        $employee->email = request('email');
        $employee->company_id = request('company');
        $employee->save();
        return redirect('employees');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $employee)
    {
        $company = Company::all()->where('id', $employee->company_id);
        return view('app.employees.employee', compact('company', 'employee'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit(Employee $employee)
    {
        $companies = Company::all()->sortBy('name');
        return view('app.employees.editemployee', compact('employee', 'companies'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Employee $employee)
    {
        $this->validate(request(), [
            'name' => 'required',
            'phone' => 'required',
            'company' => 'required'
        ]);

        $employee->name = request('name');
        $employee->phone = request('phone');
        $employee->email = request('email');
        $employee->company_id = request('company');

        $employee->save();
        return redirect('employee/'.$employee->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employee $employee)
    {
        $employee->archived_at = Carbon::now();
        $employee->phone = NULL;
        $employee->email = NULL;
        $employee->save();
        return redirect('employees');
    }
}
