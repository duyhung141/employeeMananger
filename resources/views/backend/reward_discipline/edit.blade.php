@extends('backend.layouts.app')

@section('content')
    <div class="card">
        <form action="{{ route('reward_discipline.update', $reward_discipline) }}" method="POST">
            @csrf
            <div class="card-header">
                <h1>Cập nhật khen thưởng/kỉ luật</h1>
            </div><!--End card-header -->

            <div class="card-body row">
                <div class="col-md-3">
                    <label for="employee_id" class="form-label">Nhân viên</label>
                    <select class="form-control" id="employee_id" name="employee_id" disabled>
                        @foreach($employees as $employee)
                            <option {{ $employee->id == $reward_discipline->employee_id? 'selected' : '' }}  value="{{ $employee->id }}">{{ $employee->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-3">
                    <label for="type" class="form-label">Loại</label>
                    <select class="form-control" id="type" name="type" required>
                        <option selected disabled value="">---Choose---</option>
                        <option {{ $reward_discipline->type == "REWARD"? 'selected' : '' }} value="REWARD">Khen thưởng</option>
                        <option {{ $reward_discipline->type == "DISCIPLINE"? 'selected' : '' }} value="DISCIPLINE">Kỉ luật</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <label for="amount" class="form-label">Số tiền</label>
                    <div class="input-group has-validation">
                        <input value="{{ $reward_discipline->amount }}" type="number" class="form-control" id="amount" name="amount" required>
                    </div>
                </div>
                <div class="col-md-3">
                    <label for="effective_date" class="form-label">Ngày có hiệu lực</label>
                    <div class="input-group has-validation">
                        <input value="{{ $reward_discipline->effective_date }}" type="date" class="form-control" id="effective_date" name="effective_date" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <label for="reason" class="form-label">Lý do</label>
                    <div class="input-group has-validation">
                        <input value="{{ $reward_discipline->reason }}" type="text" class="form-control" id="reason" name="reason" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <label for="content" class="form-label">Nội dung</label>
                    <div class="input-group has-validation">
                        <textarea type="text" class="form-control" id="content" name="content" required>{{ $reward_discipline->content }}</textarea>
                    </div>
                </div>
            </div><!--End card-body -->
            <div class="card-footer">
                <button class="btn btn-primary" type="submit">Submit form</button>
            </div>
        </form>

    </div><!--End card -->

@endsection
