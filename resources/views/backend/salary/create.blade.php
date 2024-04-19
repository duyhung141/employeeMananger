@extends('backend.layouts.app')

@section('content')
    <div class="card">
        <form action="{{ route('salary.store') }}" method="POST">
            @csrf
            <div class="card-header">
                <h1>Thêm mới hồ sơ lương</h1>
            </div><!--End card-header -->

            <div class="card-body row">
                <div class="col-md-4">
                    <label for="employee_id" class="form-label">Nhân viên</label>
                    <select class="form-control" id="employee_id" name="employee_id" required>
                        <option selected disabled value="">---Choose---</option>
                        @foreach($employees as $employee)
                            <option value="{{ $employee->id }}">{{ $employee->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-3">
                    <label for="effective_date" class="form-label">Ngày có hiệu lực</label>
                    <div class="input-group has-validation">
                        <input type="date" class="form-control" id="effective_date" name="effective_date" required>
                    </div>
                </div>
                <div class="col-md-3">
                    <label for="expired_date" class="form-label">Ngày hết hiệu lực</label>
                    <div class="input-group has-validation">
                        <input type="date" class="form-control" id="expired_date" name="expired_date" required>
                    </div>
                </div>

                <div class="col-md-3">
                    <label for="tax_schedule" class="form-label">Biểu thuế</label>
                    <div class="input-group has-validation">
                        <input type="number" class="form-control" id="tax_schedule" name="tax_schedule" required>
                    </div>
                </div>
                <div class="col-md-3">
                    <label for="basic_salary" class="form-label">Lương cơ bản</label>
                    <div class="input-group has-validation">
                        <input type="number" class="form-control" id="basic_salary" name="basic_salary" required>
                    </div>
                </div>
                <div class="col-md-3">
                    <label for="negotiable_salary" class="form-label">Lương thỏa thuận</label>
                    <div class="input-group has-validation">
                        <input type="number" class="form-control" id="negotiable_salary" name="negotiable_salary" required>
                    </div>
                </div>
                <div class="col-md-3">
                    <label for="coefficient_salary" class="form-label">Tỷ lệ hưởng lương</label>
                    <div class="input-group has-validation">
                        <input type="number" class="form-control" id="coefficient_salary" name="coefficient_salary" required>
                    </div>
                </div>
            </div><!--End card-body -->
            <div class="card-footer">
                <button class="btn btn-primary" type="submit">Submit form</button>
            </div>
        </form>

    </div><!--End card -->

@endsection
