<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\CompanyCategories;
use App\Models\User;
use Illuminate\Http\Request;

class CompanyCategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $companyCategories = CompanyCategories::get();
        return view('companyCategores.index', compact('companyCategories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $companies = Company::select('name', 'id')->get();
        return view('companyCategores.create', compact('companies'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        CompanyCategories::create($request->except('_token'));
        return redirect()->route('categories.index')->with(['success' => 'dome']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CompanyCategories  $companyCategories
     * @return \Illuminate\Http\Response
     */
    public function show(CompanyCategories $companyCategories)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CompanyCategories  $companyCategories
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $category = CompanyCategories::find($id);
        $companies = Company::select('name', 'id')->get();
        return view('companyCategores.edit', compact('category', 'companies'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CompanyCategories  $companyCategories
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
        $categories = CompanyCategories::find($id);
        $categories->name = $request->name;
        $categories->note = $request->note;
        $categories->const_salary = $request->const_salary;
        $categories->company_id = $request->company_id;
        $categories->status = $request->status;
        $categories->save();
        return redirect()->route('categories.index')->with(['success' => 'done']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CompanyCategories  $companyCategories
     * @return \Illuminate\Http\Response
     */
    public function destroy(CompanyCategories $companyCategories)
    {
        //
    }

    public function getSalary($id)
    {
        $job = CompanyCategories::find($id);
        return response()->json($job);
    }
}