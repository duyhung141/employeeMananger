@extends('backend.layouts.app')

@section('content')
    <div class="card">
        <form action="{{ route('salary.update', ['salary' => $salary]) }}" method="POST">
            @csrf
            <div class="card-header">
                <h1>Cập nhật hồ sơ lương</h1>
            </div><!--End card-header -->

            <div class="card-body row">
                <div class="col-md-4">
                    <label for="employee_id" class="form-label">Nhân viên</label>
                    <select class="form-select" id="employee_id" name="employee_id" required>
                        <option selected disabled value="">---Choose---</option>
                        @foreach($employees as $employee)
                            <option {{ $employee->id == $salary->employee_id? 'selected' : '' }} value="{{ $employee->id }}">{{ $employee->name }}</option>
                        @endforeach
                    </select>
                </div>
                {{--                <div class="col-md-4">--}}
                {{--                    <label for="department_id" class="form-label">Phòng ban</label>--}}
                {{--                    <select class="form-select" id="department_id" name="department_id" required>--}}
                {{--                        <option selected disabled value="">---Choose---</option>--}}
                {{--                        <option>Phòng ban 1</option>--}}
                {{--                        <option>Phòng ban 2</option>--}}
                {{--                        <option>Phòng ban 3</option>--}}
                {{--                    </select>--}}
                {{--                </div>--}}
                <div class="col-md-3">
                    <label for="effective_date" class="form-label">Ngày có hiệu lực</label>
                    <div class="input-group has-validation">
                        <input type="date" class="form-control" id="effective_date" name="effective_date" value="{{ $salary->effective_date }}" required>
                    </div>
                </div>
                <div class="col-md-3">
                    <label for="expired_date" class="form-label">Ngày hết hiệu lực</label>
                    <div class="input-group has-validation">
                        <input type="date" class="form-control" id="expired_date" name="expired_date" value="{{ $salary->expired_date }}" required>
                    </div>
                </div>

                <div class="col-md-3">
                    <label for="tax_schedule" class="form-label">Biểu thuế</label>
                    <div class="input-group has-validation">
                        <input type="number" class="form-control" id="tax_schedule" name="tax_schedule" value="{{ $salary->tax_schedule }}"  required>
                    </div>
                </div>
                <div class="col-md-3">
                    <label for="basic_salary" class="form-label">Lương cơ bản</label>
                    <div class="input-group has-validation">
                        <input type="number" class="form-control" id="basic_salary" name="basic_salary" value="{{ $salary->basic_salary }}" required>
                    </div>
                </div>
                <div class="col-md-3">
                    <label for="negotiable_salary" class="form-label">Lương thỏa thuận</label>
                    <div class="input-group has-validation">
                        <input type="number" class="form-control" id="negotiable_salary" name="negotiable_salary" value="{{ $salary->negotiable_salary }}" required>
                    </div>
                </div>
                <div class="col-md-3">
                    <label for="coefficient_salary" class="form-label">Tỷ lệ hưởng lương</label>
                    <div class="input-group has-validation">
                        <input type="number" class="form-control" id="coefficient_salary" name="coefficient_salary" value="{{ $salary->coefficient_salary }}" required>
                    </div>
                </div>
            </div><!--End card-body -->
            <div class="card-footer text-center">
                <button class="btn btn-primary" type="submit">Cập nhật</button>
            </div>
        </form>

    </div><!--End card -->

@endsection
