<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\CompanyCategories;
use App\Models\Employee;
use App\Models\Employee_detiles;
use App\Models\Jobs;
use Illuminate\Http\Request;

class EmployeeDetilesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return $request;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Employee_detiles  $employee_detiles
     * @return \Illuminate\Http\Response
     */
    public function show(Employee_detiles $employee_detiles)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Employee_detiles  $employee_detiles
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data_work = true;
        $employee = Employee::with('categroy')->find($id);
        $jobs = Jobs::select('name', 'id')->get();
        $companies = Company::select('name', 'id')->get();
        return view('Detials.edit', compact('data_work', 'jobs', 'companies', 'employee'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Employee_detiles  $employee_detiles
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {


        $employee = Employee::find($id);
        $employee->company_id = $request->company_id;
        $employee->category_id = $request->category_id;
        $employee->active = $request->active;
        $employee->const_salary = $request->const_salary;
        $employee->salary = $request->categories_salary;
        $employee->all_salary = $request->all_salary;
        $employee->active = $request->active;
        $employee->save();


        $details = new  Employee_detiles();
        $details->employee_id =    $employee->id;
        $details->due_date = date('Y - M - D');
        $details->company_id = $request->company_id;
        $details->category_id = $request->category_id;
        $details->active = $request->active;
        $details->const_salary = $request->const_salary;
        $details->salary = $request->categories_salary;
        $details->all_salary = $request->all_salary;
        $details->notes = '  تعديل بيانات الموظف';
        $details->active = $request->active;
        $details->save();

        return redirect()->route('employee.show', $id)->with(['success' => 'dnoe']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Employee_detiles  $employee_detiles
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $detiles = Employee_detiles::find($id);
        $detiles->delete();
        return redirect()->route('employee.show', $detiles->employee_id)->with(['sucess' => 'done']);
    }
}
