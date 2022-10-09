<?php

namespace App\Http\Controllers;

use App\Models\EmpAtatchment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EmpAtatchmentController extends Controller
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
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $file_name = date('ymdhis') . '.' . $request->pic->getClientOriginalExtension();
        $request->pic->move(public_path('Attachment/' . $request->emp_id), $file_name);
        $attachment = new EmpAtatchment();
        $attachment->file_name = $file_name;
        $attachment->employee_id = $request->emp_id;
        $attachment->save();
        return redirect()->route('employee.show', $request->emp_id)->with(['success' => 'done']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\EmpAtatchment  $empAtatchment
     * @return \Illuminate\Http\Response
     */
    public function show(EmpAtatchment $empAtatchment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\EmpAtatchment  $empAtatchment
     * @return \Illuminate\Http\Response
     */
    public function edit(EmpAtatchment $empAtatchment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\EmpAtatchment  $empAtatchment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, EmpAtatchment $empAtatchment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\EmpAtatchment  $empAtatchment
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $attach = EmpAtatchment::find($id);
        Storage::delete(' $pathToFile ');
        $pathToFile = Storage::disk('Attachment')->getAdapter()->applyPathPrefix($attach->employee_id . '\\' . $attach->file_name);
        $attach->delete();
        return redirect()->route('employee.show', $attach->employee_id)->with(['success' => 'done']);
    }


    public  function file($emp_id, $file_name)
    {
        $pathToFile = Storage::disk('Attachment')->getAdapter()->applyPathPrefix($emp_id . '\\' . $file_name);

        return response()->file($pathToFile);
    }

    public  function download($emp_id, $file_name)
    {
        $pathToFile = Storage::disk('Attachment')->getAdapter()->applyPathPrefix($emp_id . '\\' . $file_name);

        return response()->download($pathToFile);
    }
}