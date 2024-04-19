@extends('backend.layouts.app')

@section('content')
    <div class="card">
        <form action="{{ route('allowance_subsidy.store') }}" method="POST">
            @csrf
            <div class="card-header">
                <h1>Thêm mới phụ cấp/trợ cấp</h1>
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
                        @foreach(config('allowance_subsidy.types') as $type)
                            <option value="{{ $type }}">{{ $type }}</option>
                        @endforeach
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
                    <label for="note" class="form-label">Ghi chú</label>
                    <div class="input-group has-validation">
                        <textarea type="text" class="form-control" id="note" name="note" required></textarea>
                    </div>
                </div>
            </div><!--End card-body -->
            <div class="card-footer">
                <button class="btn btn-primary" type="submit">Submit form</button>
            </div>
        </form>

    </div><!--End card -->

@endsection
