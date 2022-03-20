<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\Company;
use Illuminate\Support\Facades\DB;
class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $emp_data = Employee::select("*", DB::raw("CONCAT(emp_first_name, ' ', emp_last_name) as full_name"))
        ->orderBy('id','desc')->paginate(10);
        return view('employee.index',compact('emp_data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $company_data = Company::orderBy('id','desc')->get();
        return view('employee.create',compact('company_data'));
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
        $request->validate(['emp_first_name'=>'required',
                            'emp_last_name'=>'required',
                            'company_id'=>'required',
                            'emp_email'=>'required|email|unique:employees,emp_email',
                            'emp_phone'=>'required|digits:10',
                            ]);
        $input = $request->all();
        Employee::create($input);
            return redirect()->route('employee.index')
                        ->with('success','Employee added successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $emp_data =Employee::find($id);
        return view('employee.show',compact('emp_data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $company_data = Company::orderBy('id','desc')->get();
        $emp_data     = Employee::find($id);
        return view('employee.edit',compact('company_data','emp_data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $emp         = Employee::find($id);
        $request->validate(['emp_first_name'=>'required',
                            'emp_last_name'=>'required',
                            'company_id'=>'required',
                            'emp_email'=>'required|email',
                            'emp_phone'=>'required',
                            ]);
        $input = $request->all();
        $emp->update($input);
        return redirect()->route('employee.index')
        ->with('success','Employee Updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $emp         = Employee::find($id);
        $emp->delete();
        return redirect()->route('employee.index')
                        ->with('success','Data deleted successfully');
    }
}
