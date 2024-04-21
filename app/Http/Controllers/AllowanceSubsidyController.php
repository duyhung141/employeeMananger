<?php

namespace App\Http\Controllers;

use App\Models\AllowanceSubsidy;
use App\Models\Employee;
use Illuminate\Http\Request;

class AllowanceSubsidyController extends Controller
{
    public function index()
    {
//        $allowance_subsidies = AllowanceSubsidy::filter(request()->only('code', 'type', 'effective_date', 'amount', 'note', 'employee_id'))->paginate(10);
        $allowance_subsidies = AllowanceSubsidy::paginate(10);
        $data = [
            'allowance_subsidies' => $allowance_subsidies,
        ];
        return view('backend.allowance_subsidy.index', $data);
    }

    public function create()
    {
        $employees = Employee::all();
        $data = [
            'employees' => $employees,
        ];
        return view('backend.allowance_subsidy.create', $data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'type' => 'required',
            'effective_date' => 'required',
            'amount' => 'required',
            'note' => 'required',
            'employee_id' => 'required',
        ]);
        $allowance_subsidy = AllowanceSubsidy::create($request->all());
        $model_id = $allowance_subsidy->id;
        $code = 'PCTP' . str_pad($model_id, 4, '0', STR_PAD_LEFT);
        $allowance_subsidy->update(['code' => $code]);
        return redirect()->route('allowance_subsidy.index')->with('success', 'Thêm mới thành công');
    }

    public function edit(AllowanceSubsidy $allowance_subsidy)
    {
        $employees = Employee::all();
        $data = [
            'allowance_subsidy' => $allowance_subsidy,
            'employees' => $employees,
        ];
        return view('backend.allowance_subsidy.edit', $data);
    }

    public function update(Request $request, AllowanceSubsidy $allowance_subsidy)
    {
        $request->validate([
            'type' => 'required',
            'effective_date' => 'required',
            'amount' => 'required',
            'note' => 'required',
        ]);
        $allowance_subsidy->update($request->all());
        return redirect()->route('allowance_subsidy.index')->with('success', 'Cập nhật thành công');
    }

    public function show(AllowanceSubsidy $allowance_subsidy)
    {
        $employee = $allowance_subsidy->employee;
        $data = [
            'allowance_subsidy' => $allowance_subsidy,
            'employee' => $employee,
        ];
        return view('backend.allowance_subsidy.show', $data);
    }

    public function destroy(AllowanceSubsidy $allowance_subsidy)
    {
        $allowance_subsidy->delete();
        return redirect()->route('allowance_subsidy.index')->with('success', 'Xóa thành công');
    }
}
