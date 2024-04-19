<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\RewardDiscipline;
use Illuminate\Http\Request;

class RewardDisciplineController extends Controller
{
    public function index(Request $request)
    {
        $reward_disciplines = RewardDiscipline::paginate(10);
        $data = [
            'reward_disciplines' => $reward_disciplines,
        ];
        return view('backend.reward_discipline.index', $data);
    }

    public function create()
    {
        $employees = Employee::all();
        $data = [
            'employees' => $employees,
        ];
        return view('backend.reward_discipline.create', $data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'type' => 'required',
            'effective_date' => 'required',
            'reason' => 'required',
            'content' => 'required',
            'amount' => 'required',
            'employee_id' => 'required',
        ]);
        $reward_discipline = RewardDiscipline::create($request->all());
        $model_id = $reward_discipline->id;
        $code = 'KTKL' . str_pad($model_id, 4, '0', STR_PAD_LEFT);
        $reward_discipline_number = $code . '/' . $reward_discipline->employee->code;
        $reward_discipline->update([
            'code' => $code,
            'reward_discipline_number' => $reward_discipline_number,
        ]);
        return redirect()->route('reward_discipline.index')->with('success', 'Thêm mới thành công');
    }

    public function edit(RewardDiscipline $reward_discipline)
    {
        $employees = Employee::all();
        $data = [
            'reward_discipline' => $reward_discipline,
            'employees' => $employees,
        ];
        return view('backend.reward_discipline.edit', $data);
    }

    public function update(Request $request, RewardDiscipline $reward_discipline)
    {
        $request->validate([
            'type' => 'required',
            'effective_date' => 'required',
            'reason' => 'required',
            'content' => 'required',
            'amount' => 'required',
        ]);
        $reward_discipline->update($request->all());
        return redirect()->route('reward_discipline.index');
    }

    public function show(RewardDiscipline $reward_discipline)
    {
        return view('backend.reward_discipline.show');
    }

    public function destroy(RewardDiscipline $reward_discipline)
    {
        $reward_discipline->delete();
        return redirect()->route('reward_discipline.index');
    }
}
