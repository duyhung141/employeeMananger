<?php

namespace App\Http\Controllers;

use App\Models\Contract;
use App\Models\Employee;
use App\Models\Salary;
use Illuminate\Http\Request;

class ContractController extends Controller
{
    public function index()
    {
        $contracts = Contract::paginate(10);
        $data = [
            'contracts' => $contracts,
        ];
        return view('backend.contract.index', $data);
    }

    public function create()
    {
        $employees = Employee::all();
        $data = [
            'employees' => $employees,
        ];
        return view('backend.contract.create', $data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'employee_id' => 'required',
            'salary_id' => 'required',
            'type' => 'required',
            'effective_date' => 'required',
            'expired_date' => 'required',
        ]);
        $contract = Contract::create($request->all());
        $model_id = $contract->id;
        $code = "HD" . str_pad($model_id, 4, '0', STR_PAD_LEFT);
        $employee_code = $contract->employee->code;
        $contract_number = $code . '/' . $employee_code;
        $contract->update([
            'code' => $code,
            'contract_number' => $contract_number
        ]);
        $salary = $contract->salary;
        $salary->update(['status' => Salary::STATUS_APPLY]);

        return redirect()->route('contract.index')->with('success', 'Thêm mới thành công');
    }

    public function edit(Request $request, Contract $contract)
    {
        $employees = Employee::all();
        $salaries = Salary::where('employee_id', $contract->employee_id)->get();
        $data = [
            'contract' => $contract,
            'employees' => $employees,
            'salaries' => $salaries,
        ];
        return view('backend.contract.edit', $data);
    }

    public function update(Request $request, Contract $contract)
    {
        $request->validate([
            'employee_id' => 'required',
            'salary_id' => 'required',
            'type' => 'required',
            'effective_date' => 'required',
            'expired_date' => 'required',
        ]);
        $contract->update($request->all());
        return redirect()->route('contract.index')->with('success', 'Cập nhật thành công');
    }

    public function show(Request $request, Contract $contract)
    {
        return view('backend.contract.show');
    }

    public function destroy(Request $request, Contract $contract)
    {
        $contract->delete();
        return redirect()->route('contract.index')->with('success', 'Xóa thành công');
    }

    public function getSalary($employee_id)
    {
        $salaries = Salary::where('employee_id', $employee_id)->get();
        return response()->json(
            [
                'salaries' => $salaries
            ]
        );
    }

}
