<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $employees=Employee::all();
        return view('home.employee.index', compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('home.employee.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|unique:employees,email',
            'phone' => 'required|string|max:11',
            'address' => 'nullable|string|max:255',
            'salary' => 'required|numeric',
            'dob' => 'required|date',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

                
        $employee = new Employee;
        $employee->id = $request->employee;
        $employee->first_name = $request->first_name;
        $employee->last_name = $request->last_name;
        $employee->email = $request->email;
        $employee->phone = $request->phone;
        $employee->address = $request->address;
        $employee->salary = $request->salary;
        $employee->dob = $request->dob;

        if ($request->hasFile('image')) {
            $employee->image = $request->file('image')->store('employee');
        }

        $employee->save();
        return redirect()->back()->with('message', 'Employee created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $employee=employee::find($id);
        return view('home.employee.show', compact('employee'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Employee $employee)
    {
        return view('home.employee.edit', compact('employee'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Employee $employee)
    {
        
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|unique:employees,email,' . $employee->id,
            'phone' => 'nullable|string|max:20',
            'address' => 'nullable|string|max:255',
            'salary' => 'required|numeric',
            'dob' => 'required|date',
            
        ]);

        $employee->first_name = $request->first_name;
        $employee->last_name = $request->last_name;
        $employee->email = $request->email;
        $employee->phone = $request->phone;
        $employee->address = $request->address;
        $employee->salary = $request->salary;
        $employee->dob = $request->dob;

      
        if ($request->hasFile('image')) {
            $employee->image = $request->file('image')->store('employee');
        }

        $employee->save();
        return redirect()->back()->with('message', 'Employee updated successfully');
    }


    public function change_status(Employee $employee)
    {
        //
        if($employee->status==1)
        {
            $employee->update(['status'=>0]);
        }
        else
        {
            $employee->update(['status'=>1]);
        }

        return redirect()->back()->with('message','Employee status updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Employee $employee)
    {
        $delete = $employee->delete();

        if($delete)
            return redirect()->back()->with('message','Employee deleted successfully');
    }
}
