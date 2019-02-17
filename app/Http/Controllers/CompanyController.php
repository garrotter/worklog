<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;

use App\Company;
use App\Employee;

class CompanyController extends Controller
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
        $companies = Company::all()->sortBy('name');
        return view('app.companies.companies', compact('companies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('app.companies.newcompany');
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
            'archived_at' =>'null'
        ]);

        $company = new Company;

        $company->name = request('name');
        $company->tax = request('tax');
        $company->bill_zip = request('bill_zip');
        $company->bill_country = request('bill_country');
        $company->bill_city = request('bill_city');
        $company->bill_address = request('bill_address');
        $company->post_zip = request('post_zip');
        $company->post_country = request('post_country');
        $company->post_city = request('post_city');
        $company->post_address = request('post_address');
        $company->save();
        return redirect('companies');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function show(Company $company)
    {
        $employees = Employee::all()->where('company_id', $company->id)->sortBy('name');
        return view('app.companies.company', compact('company', 'employees'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function edit(Company $company)
    {
        return view('app.companies.editcompany', compact('company'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Company $company)
    {
        $this->validate(request(), [
            'name' => 'required',
            'archived_at' =>'null'
        ]);

        $company->name = request('name');
        $company->tax = request('tax');
        $company->bill_zip = request('bill_zip');
        $company->bill_country = request('bill_country');
        $company->bill_city = request('bill_city');
        $company->bill_address = request('bill_address');
        $company->post_zip = request('post_zip');
        $company->post_country = request('post_country');
        $company->post_city = request('post_city');
        $company->post_address = request('post_address');
        $company->save();
        return redirect('company/'.$company->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy(Company $company)
    {
        $company->archived_at = Carbon::now();
        $company->save();
        return redirect('companies');
    }
}
