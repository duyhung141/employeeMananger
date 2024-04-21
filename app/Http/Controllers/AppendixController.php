<?php

namespace App\Http\Controllers;

use App\Models\Appendix;
use App\Models\Contract;
use App\Models\Employee;
use Illuminate\Http\Request;

class AppendixController extends Controller
{
    public function index()
    {
        $appendixes = Appendix::paginate(10);
        $data = [
            'appendixes' => $appendixes,
        ];
        return view('backend.appendix.index', $data);
    }

    public function create()
    {
        $employees = Employee::all();
        $data = [
            'employees' => $employees,
        ];
        return view('backend.appendix.create', $data);
    }

    public function store(Request $request)
    {
        // Validate data
        $request->validate([
            'employee_id' => 'required',
            'contract_id' => 'required',
            'type' => 'required',
            'effective_date' => 'required',
            'expired_date' => 'required',
        ]);

        // Store data
        $appendix = Appendix::create($request->all());
        $model_id = $appendix->id;
        $code = 'PL' . str_pad($model_id, 4, '0', STR_PAD_LEFT);
        $appendix_number = $code . '/' . $appendix->contract->contract_number;
        $appendix->update([
            'code' => $code,
            'appendix_number' => $appendix_number
        ]);
        $contract = $appendix->contract;
        $contract->update(['status' => Contract::STATUS_APPLY]);

        return redirect()->route('appendix.index')->with('success', 'Thêm mới thành công');
    }

    public function edit(Appendix $appendix)
    {
        $employees = Employee::all();
        $contracts = Contract::where('employee_id', $appendix->employee_id)->get();
        $data = [
            'appendix' => $appendix,
            'employees' => $employees,
            'contracts' => $contracts,
        ];
        return view('backend.appendix.edit', $data);
    }

    public function update(Request $request, Appendix $appendix)
    {
        // Validate data
        $request->validate([
            'contract_id' => 'required',
            'type' => 'required',
            'effective_date' => 'required',
            'expired_date' => 'required',
        ]);
        // Update data
        $appendix->update($request->all());

        return redirect()->route('appendix.index')->with('success', 'Cập nhật thành công');
    }

    public function show(Appendix $appendix)
    {
        $employee = $appendix->employee;
        $contract = $appendix->contract;
        $data = [
            'appendix' => $appendix,
            'employee' => $employee,
            'contract' => $contract,
        ];
        return view('backend.appendix.show', $data);
    }

    public function destroy(Appendix $appendix)
    {
        $appendix->delete();
        return redirect()->route('appendix.index')->with('success', 'Xóa thành công');
    }

    public function getContract($employee_id)
    {
        $contracts = Contract::where('employee_id', $employee_id)->get();
        return response()->json(
            [
                'contracts' => $contracts
            ]
        );
    }
}
