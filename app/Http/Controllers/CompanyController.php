<?php

namespace App\Http\Controllers;
use App\Models\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // get all the company
        $company_data = Company::orderBy('id','desc')->paginate(10);
        return view('company.index',compact('company_data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('company.create');
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
        $request->validate(['company_name'=>'required',
                             'company_email'=>'required|email|unique:companies,company_email',
                             'company_logo' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048|dimensions:min_width=100,min_height=100',
                             'company_website'=>'nullable|url'
                            ]);
        $input        = $request->all();
        if($request->file()) {
            $fileName = time().'_'.$request->file('company_logo')->getClientOriginalName();
            $filePath = $request->file('company_logo')->storeAs('uploads', $fileName, 'public');
            $input['company_logo'] = $fileName;

        }

        Company::create($input);
        return redirect()->route('company.index')
                        ->with('success','Company added successfully.');
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
        $company_data = Company::find($id);
        return view('company.show',compact('company_data'));
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
        $company_data = Company::find($id);
        return view('company.edit',compact('company_data'));
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
        $company         = Company::find($id);
        $request->validate(['company_name'=>'required',
                            'company_email'=>'required|email|unique:companies,company_email,'.$id,
                            'company_logo' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048|dimensions:min_width=100,min_height=100',
                            'company_website'=>'nullable|url'
                        ]);
        $input = $request->all();
        if($request->file()) {
        $fileName = time().'_'.$request->file('company_logo')->getClientOriginalName();
        $filePath = $request->file('company_logo')->storeAs('uploads', $fileName, 'public');
        $input['company_logo'] = $fileName;

        }

        $company->update($input);
        return redirect()->route('company.index')
        ->with('success','Company Updated successfully.');
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
        $company         = Company::find($id);
        $company->delete();

        return redirect()->route('company.index')
                        ->with('success','Data deleted successfully');
    }
}
