<?php

namespace App\Http\Controllers;
use App\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Employees = Employee::all();
        return view('Employee.index',compact('Employees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Employee.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'first_name'=>'required',
            'last_name'=>'required',
            'email'=>'required',
            'salary'=>'required',
            'role'=>'required',
        ]);
        $Employee = new Employee([
            'first_name'=>$request->get('first_name'),
            'last_name'=>$request->get('last_name'),
            'email'=>$request->get('email'),
            'salary'=>$request->get('salary'),
            'role'=>$request->get('role')
        ]);
        $Employee->save();
        return redirect('/Employee')->with('success','Stored');
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
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $Employees = Employee::find($id);
        return view('Employee.edit',compact('Employees'));
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
        $request->validate([
            'first_name'=>'required',
            'last_name'=>'required',
            'email'=>'required',
            'salary'=>'required',
            'role'=>'required'
        ]);

        $Employee = Employee::find($id);
        $Employee->first_name=$request->get('first_name');
        $Employee->last_name=$request->get('last_name');
        $Employee->email=$request->get('email');
        $Employee->salary=$request->get('salary');
        $Employee->role=$request->get('role');
        $Employee->save();
        return redirect('/Employee')->with('success','Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Employee = Employee::find($id);
        $Employee->delete();
    }
}
