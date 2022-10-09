<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Employee_detiles;
use App\Models\Salaries;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SalariesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employee = Employee::select('name', 'id', 'all_salary', 'job_id', 'due_date', 'const_salary', 'salary')
            ->where('get_his_salay', '0')
            ->with('employeejob')
            ->paginate(12);
        return view('salaries.index', compact('employee'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('salaries.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Salaries  $salaries
     * @return \Illuminate\Http\Response
     */
    public function show(Salaries $salaries)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Salaries  $salaries
     * @return \Illuminate\Http\Response
     */
    public function edit(Salaries $salaries)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Salaries  $salaries
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
        //################### save get his salary or not #####################

        $emp = Employee::find($id);
        $emp->get_his_salay = 1;
        $emp->save();

        //#########################   save  to user details #############################

        $details = new Employee_detiles();
        $details->employee_id =    $emp->id;
        $details->due_date = date('Y - M - D');
        $details->company_id = $emp->company_id;
        $details->category_id = $emp->category_id;
        $details->active = $emp->active;
        $details->const_salary = $emp->const_salary;
        $details->salary = $emp->categories_salary;
        $details->all_salary = $emp->all_salary;
        $details->notes = '  دفع راتب';
        $details->save();


        // ############################ save to salary  #################

        $salaries = new Salaries();
        $salaries->employee_id = $emp->id;
        $salaries->salary = $emp->all_salary;
        $salaries->due_date = date('Y-M-D');
        $salaries->month = date('M');
        $salaries->save();
        return redirect()->route('salary.index')->with(['success' => 'done']);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Salaries  $salaries
     * @return \Illuminate\Http\Response
     */
    public function destroy(Salaries $salaries)
    {
        //
    }

    public function search(Request $request)
    {
        $search = $request->search;
        $employee = Employee::where('get_his_salay', '0')
            ->where('name', 'like', '%_' . $request->search . '_%')
            ->with('employeejob')
            ->paginate(12);

        return view('salaries.index', compact('employee', 'search'));
    }

    public function printSalary($id)
    {
        $employee = Employee::find($id);
        return view('salaries.print', compact('employee'));
    }

    public function pay(Request $request)
    {
        return view('salaries.print');
    }
}