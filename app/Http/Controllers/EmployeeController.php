<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\CompanyCategories;
use App\Models\Employee;
use App\Models\Employee_Atatchment;
use App\Models\Employee_detiles;
use App\Models\Jobs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // dd('hello');
        $emps =  Employee::with(
            'employeejob',
        )->paginate('10');
        return view('employee.index', compact('emps'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $jobs = Jobs::select('name', 'id')->get();
        $companies = Company::select('name', 'id')->get();
        return view('employee.create', compact('companies', 'jobs'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        //################save post to the to invoice manger #########
        $employee = new Employee();
        $employee->name = $request->name;
        $employee->email = $request->email;
        $employee->phone = $request->phone;
        $employee->age = $request->age;
        $employee->job_id = $request->job_id;
        $employee->company_id = $request->company_id;
        $employee->category_id = $request->category_id;
        $employee->active = $request->active;
        $employee->const_salary = $request->const_salary;
        $employee->salary = $request->categories_salary;
        $employee->all_salary = $request->all_salary;
        $employee->note = $request->note;
        $employee->add_by = Auth::user()->id;
        $employee->due_date = date('Y - M - D');
        $employee->save();

        // ################# save to invoive detials ##################

        $details = new  Employee_detiles();
        $details->employee_id =    $employee->id;
        $details->due_date = date('Y - M - D');
        $details->company_id = $request->company_id;
        $details->category_id = $request->category_id;
        $details->active = $request->active;
        $details->const_salary = $request->const_salary;
        $details->salary = $request->categories_salary;
        $details->all_salary = $request->all_salary;
        $details->notes = ' موظف جديد';
        $details->active = $request->active;
        $details->save();

        ///############### save post to attach ment if this have attachemnt
        if ($request->has('pic') && $request->pic == null) {

            $name = date('ymdhis') . $request->pic->getClientOriginalName();
            $request->pic->move(public_path('Attachment/' . $employee->id . '/'), $name);
            $attachemnt = new Employee_Atatchment();
            $attachemnt->employee_id =    $employee->id;
            $attachemnt->file_name = $name;
        }

        return redirect()->route('employee.index')->with(['success' => 'done']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $employee = Employee::with('employeejob', 'Detilas', 'Attachment')->find($id);
        return view('employee.show', compact('employee'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit(Employee $employee)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employee $employee)
    {
        //
    }
}
