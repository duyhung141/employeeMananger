<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Salary;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index()
    {
        $employees = Employee::paginate(10);
        $data = [
            'employees' => $employees,
        ];
        return view('backend.employee.index', $data);
    }

    public function create()
    {
        return view('backend.employee.create');
    }

    public function store(Request $request)
    {
//         Validate data
        $request->validate([
            'name' => 'required',
            'department' => 'required',
            'position' => 'required',
            'type' => 'required',
            'gender' => 'required',
            'birthday' => 'required',
            'address' => 'required',
            'nationality' => 'required',
            'identity_card' => 'required',
            'phone' => 'required',
            'email' => 'required'
        ]);
        $employee = Employee::create($request->all());

        $model_id = $employee->id;
        $code = 'NV' . str_pad($model_id, 4, '0', STR_PAD_LEFT);
        $employee->update(['code' => $code]);
        return redirect()->route('employee.index')->with('success', 'Thêm mới thành công');
    }

    public function edit(Request $request, Employee $employee)
    {
        $data = [
            'employee' => $employee,
        ];
        return view('backend.employee.edit', $data);
    }

    public function update(Request $request, Employee $employee)
    {
        //         Validate data
        $request->validate([
            'name' => 'required',
            'department' => 'required',
            'position' => 'required',
            'type' => 'required',
            'gender' => 'required',
            'birthday' => 'required',
            'address' => 'required',
            'nationality' => 'required',
            'identity_card' => 'required',
            'phone' => 'required',
            'email' => 'required'
        ]);
        $employee->update($request->all());
        return redirect()->route('employee.index');
    }

    public function destroy(Employee $employee)
    {
        $employee->delete();
        return redirect()->route('employee.index')->with('success', 'Xóa thành công');;
    }
}
