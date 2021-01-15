<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employee;

class EmployeeController extends Controller
{
   
    public function index()
    {
        $employees = Employee::all();

        return view('employee.index', ['employee' => $employees]);
       
    }

    
    public function create()
    {
        return view('employee.create');
    }

    
    public function store()
    {
        Employee::create($this->validateEmployee());
        return redirect(route('employee.index'));
    }

    
    public function show()
    {
        return view('employee.show', ['employee' => $employee ]);
    }

    
    public function edit(Employee $employee)
    {
        
        return view('employee.edit', compact('employee'));   
    }

    
    public function update(Employee $employee)
    {
        
   

        $employee->update($this->validateEmployee());

        return redirect($employee->path());


    }

    
    public function destroy($id)
    {
        
        $employee = employee::find($id);
        $employee->delete();

        return redirect('/employees')->with('success', 'employee deleted!');


    }


    protected function validateEmployee()
    {
        return request()->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required'

        ]);
    }
    
}
