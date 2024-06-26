@extends('backend.layouts.app')
@push('after-scripts')
@endpush

@section('content')
    <div class="card">
        <form action="{{ route('contract.update', $contract) }}" method="POST">
            @csrf
            <div class="card-header">
                <h1>Cập nhật hợp đồng</h1>
            </div><!--End card-header -->

            <div class="card-body row">
                <div class="col-md-3">
                    <label for="employee_id" class="form-label">Nhân viên</label>
                    <select class="form-control" id="employee_id" name="employee_id" required>
                        <option disabled value="">---Choose---</option>
                        @foreach($employees as $employee)
                            <option {{ $employee->id == $contract->employee_id ? 'selected' : '' }}
                                    value="{{ $employee->id }}">{{ $employee->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-3">
                    <label for="salary_id" class="form-label">Hồ sơ lương</label>
                    <select class="form-control" id="salary_id" name="salary_id" required>
                        <option disabled value="">---Choose---</option>
                        @foreach($salaries as $salary)
                            <option {{ $salary->id == $contract->salary_id ? 'selected' : '' }}
                                    value="{{ $salary->id }}">{{ $salary->code }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-3">
                    <label for="type" class="form-label">Loại</label>
                    <select class="form-control" id="type" name="type" required>
                        <option selected disabled value="">---Choose---</option>
                        @foreach(config('contract.contracts') as $key => $value)
                            <option {{ $key== $contract->type ? 'selected' : '' }}
                                value="{{ $key }}">{{ $value }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-3">
                    <label for="effective_date" class="form-label">Ngày bắt đầu</label>
                    <div class="input-group has-validation">
                        <input type="date" value="{{ $contract->effective_date }}" class="form-control" id="effective_date" name="effective_date" required>
                    </div>
                </div>

                <div class="col-md-3">
                    <label for="expired_date" class="form-label">Ngày hết hạn</label>
                    <div class="input-group has-validation">
                        <input type="date" value="{{ $contract->expired_date }}" class="form-control" id="expired_date" name="expired_date" required>
                    </div>
                </div>

            </div><!--End card-body -->
            <div class="card-footer">
                <button class="btn btn-primary" type="submit">Submit form</button>
            </div>
        </form>

    </div><!--End card -->

@endsection

