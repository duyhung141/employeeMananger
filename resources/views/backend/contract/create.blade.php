@extends('backend.layouts.app')
@push('after-scripts')
    <script>
        $(document).ready(function () {
            $('#employee_id').on('change', function () {
                var employeeId = $(this).val();
                if (employeeId) {
                    $.ajax({
                        url: (employeeId + '/salary'),
                        type: "GET",
                        success: function (data) {
                            var $salarySelect = $('#salary_id');
                            $salarySelect.empty(); // Xóa các options hiện tại
                            $salarySelect.append('<option selected disabled value="">---Choose---</option>');
                            $.each(data.salaries, function(i, salary) {
                                $salarySelect.append('<option value="' + salary.id + '">' + salary.code + '</option>');
                            });
                        },
                        error: function (jqXHR, textStatus, errorThrown) {
                            alert('Error: ' + textStatus + ' - ' + errorThrown);
                        }
                    });
                }
            });
        });
    </script>
@endpush

@section('content')
    <div class="card">
        <form action="{{ route('contract.store') }}" method="POST">
            @csrf
            <div class="card-header">
                <h1>Thêm mới hợp đồng</h1>
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
                    <label for="salary_id" class="form-label">Hồ sơ lương</label>
                    <select class="form-control" id="salary_id" name="salary_id" required>
                        <option selected disabled value="">Chọn nhân viên trước</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <label for="type" class="form-label">Loại</label>
                    <select class="form-control" id="type" name="type" required>
                        <option selected disabled value="">---Choose---</option>
                        @foreach(config('contract.contracts') as $key => $value)
                            <option value="{{ $key }}">{{ $value }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-3">
                    <label for="effective_date" class="form-label">Ngày bắt đầu</label>
                    <div class="input-group has-validation">
                        <input type="date" class="form-control" id="effective_date" name="effective_date" required>
                    </div>
                </div>

                <div class="col-md-3">
                    <label for="expired_date" class="form-label">Ngày hết hạn</label>
                    <div class="input-group has-validation">
                        <input type="date" class="form-control" id="expired_date" name="expired_date" required>
                    </div>
                </div>

            </div><!--End card-body -->
            <div class="card-footer">
                <button class="btn btn-primary" type="submit">Submit form</button>
            </div>
        </form>

    </div><!--End card -->

@endsection

