@extends('backend.layouts.app')

@section('content')
    <div class="card">
        <form action="{{ route('reward_discipline.store') }}" method="POST">
            @csrf
            <div class="card-header">
                <h1>Thêm mới khen thưởng/kỉ luật</h1>
            </div><!--End card-header -->

            <div class="card-body row">
                <div class="col-md-3">
                    <label for="employee_id" class="form-label">Nhân viên</label>
                    <select class="form-control" id="employee_id" name="employee_id" required>
                        <option selected disabled value="">---Choose---</option>
                        @foreach($employees as $employee)
                            <option value="{{ $employee->id }}">{{ $employee->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-3">
                    <label for="type" class="form-label">Loại</label>
                    <select class="form-control" id="type" name="type" required>
                        <option selected disabled value="">---Choose---</option>
                        <option value="REWARD">Khen thưởng</option>
                        <option value="DISCIPLINE">Kỉ luật</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <label for="amount" class="form-label">Số tiền</label>
                    <div class="input-group has-validation">
                        <input type="number" class="form-control" id="amount" name="amount" required>
                    </div>
                </div>
                <div class="col-md-3">
                    <label for="effective_date" class="form-label">Ngày có hiệu lực</label>
                    <div class="input-group has-validation">
                        <input type="date" class="form-control" id="effective_date" name="effective_date" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <label for="reason" class="form-label">Lý do</label>
                    <div class="input-group has-validation">
                        <input type="text" class="form-control" id="reason" name="reason" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <label for="content" class="form-label">Nội dung</label>
                    <div class="input-group has-validation">
                        <textarea type="text" class="form-control" id="content" name="content" required></textarea>
                    </div>
                </div>
            </div><!--End card-body -->
            <div class="card-footer">
                <button class="btn btn-primary" type="submit">Submit form</button>
            </div>
        </form>

    </div><!--End card -->

@endsection
