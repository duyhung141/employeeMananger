<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Salary;
use Illuminate\Http\Request;

class SalaryController extends Controller
{
    public function index()
    {
        $salaries = Salary::paginate(10);
        $data = [
            'salaries' => $salaries
        ];
        return view('backend.salary.index', $data);
    }

    public function create()
    {
        $employees = Employee::all();
        $data = [
            'employees' => $employees
        ];
        return view('backend.salary.create', $data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'employee_id' => 'required',
//            'department' => 'required', Cần thêm lại
            'effective_date' => 'required',
            'expired_date' => 'required',
            'tax_schedule' => 'required',
            'basic_salary' => 'required',
            'negotiable_salary' => 'required',
            'coefficient_salary' => 'required',
        ]);
        $salary = Salary::create($request->all());
        $model_id = $salary->id;
        $code = 'HSL' . str_pad($model_id, 4, '0', STR_PAD_LEFT);
        $employee = $salary->employee;
        $decision_code = $code . '/' . $employee->code;
        $salary->update(['code' => $code, 'decision_code' => $decision_code]);
        return redirect()->route('salary.index');
    }

    public function edit(Salary $salary)
    {
        if($salary->getColExpiredDate() > date('d-m-Y')){
            return redirect()->route('salary.index');
        }
        $employees = Employee::all();
        $data = [
            'salary' => $salary,
            'employees' => $employees
        ];
        return view('backend.salary.edit', $data);
    }

    public function update(Request $request, Salary $salary)
    {
        $request->validate([
            'employee_id' => 'required',
            'effective_date' => 'required',
            'expired_date' => 'required',
            'tax_schedule' => 'required',
            'basic_salary' => 'required',
            'negotiable_salary' => 'required',
            'coefficient_salary' => 'required',
        ]);
        $salary->update($request->all());
        return redirect()->route('salary.index');
    }

    public function show(Salary $salary)
    {
        $employee = $salary->employee;
        $data = [
            'salary' => $salary,
            'employee' => $employee
        ];
        return view('backend.salary.show', $data);
    }

    public function destroy(Salary $salary)
    {
        $salary->delete();
        return redirect()->route('salary.index');
    }
}
