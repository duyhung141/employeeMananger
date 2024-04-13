@extends('backend.layouts.app')

@section('content')
    <div class="card">
        <form action="{{ route('employee.update', ['employee' => $employee]) }}" method="POST">
            @csrf
            <div class="card-header">
                <h1>Cập nhật nhân viên</h1>
            </div><!--End card-header -->

            <div class="card-body row">
                <div class="col-md-3">
                    <label for="name" class="form-label">Họ và tên</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ $employee->name }}"
                           required>
                </div>
                <div class="col-md-3">
                    <label for="department" class="form-label">Phòng ban</label>
                    <select class="form-select" id="department" name="department" required>
                        <option selected disabled value="">---Choose---</option>
                        @foreach(config('department.departments') as $department)
                            <option {{ $employee->department == $department? 'selected' : '' }} value="{{ $department }}">{{ $department }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-3">
                    <label for="position" class="form-label">Chức vụ</label>
                    <select class="form-select" id="position" name="position" required>
                        <option selected disabled value="">---Choose---</option>
                        @foreach(config('position.positions') as $position)
                            <option {{ $employee->position == $position? 'selected' : '' }} value="{{ $position }}">{{ $position }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-3">
                    <label for="email" class="form-label">Email</label>
                    <div class="input-group has-validation">
                        <span class="input-group-text" id="email">@</span>
                        <input type="email" class="form-control" id="email" name="email" value="{{ $employee->email }}"
                               required>
                    </div>
                </div>
                <div class="col-md-3">
                    <label for="phone" class="form-label">Điện thoại</label>
                    <div class="input-group has-validation">
                        <input type="text" class="form-control" id="phone" name="phone" value="{{ $employee->phone }}"
                               required>
                    </div>
                </div>
                <div class="col-md-3">
                    <label for="tax_code" class="form-label">Mã số thuế</label>
                    <div class="input-group has-validation">
                        <input type="text" class="form-control" id="tax_code" name="tax_code"
                               value="{{ $employee->tax_code }}" required>
                    </div>
                </div>
                <div class="col-md-3">
                    <label for="identity_card" class="form-label">CMND/CCCD</label>
                    <div class="input-group has-validation">
                        <input type="text" class="form-control" id="identity_card" name="identity_card"
                               value="{{ $employee->identity_card }}" required>
                    </div>
                </div>
                <div class="col-md-3">
                    <label for="gender" class="form-label">Giới tính</label>
                    <select class="form-select" id="gender" name="gender" required>
                        <option selected disabled value="">---Choose---</option>
                        <option {{ $employee->gender == 'MALE'? 'selected' : '' }} value="MALE">Nam</option>
                        <option {{ $employee->gender == 'FEMALE'? 'selected' : '' }} value="FEMALE">Nữ</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <label for="birthday" class="form-label">Ngày sinh</label>
                    <div class="input-group has-validation">
                        <input type="date" class="form-control" id="birthday" name="birthday"
                               value="{{ $employee->birthday }}" required>
                    </div>
                </div>

                <div class="col-md-3">
                    <label for="nationality" class="form-label">Quốc tịch</label>
                    <select class="form-select" id="nationality" name="nationality" required>
                        <option selected disabled value="">---Choose---</option>
                        <option {{ $employee->nationality == 'VIETNAM'? 'selected' : '' }} value="VIETNAM">Việt Nam</option>
                        <option {{ $employee->nationality == 'KOREA'? 'selected' : '' }} value="KOREA">Hàn Quốc</option>
                        <option {{ $employee->nationality == 'JAPAN'? 'selected' : '' }} value="JAPAN">Nhật Bản</option>
                        <option {{ $employee->nationality == 'CHINESE'? 'selected' : '' }} value="CHINESE">Trung Quốc
                        </option>
                    </select>
                </div>
                <div class="col-md-3">
                    <label for="type" class="form-label">Loại nhân viên</label>
                    <select class="form-select" id="type" name="type" required>
                        <option selected disabled value="">---Choose---</option>
                        <option {{ $employee->type == 'PROBATION'? 'selected' : '' }} value="PROBATION">Thử việc
                        </option>
                        <option {{ $employee->type == 'OFFICIAL'? 'selected' : '' }} value="OFFICIAL">Chính thức
                        </option>
                        <option {{ $employee->type == 'INTERN'? 'selected' : '' }} value="INTERN">Thực tập sinh
                        </option>
                    </select>
                </div>
                <div class="col-md-6">
                    <label for="address" class="form-label">Địa chỉ</label>
                    <div class="input-group has-validation">
                        <input type="text" class="form-control" id="address" name="address"
                               value="{{ $employee->address }}" required>
                    </div>
                </div>
                <div class="col-12">
                </div>
            </div><!--End card-body -->
            <div class="card-footer">
                <button class="btn btn-primary" type="submit">Submit form</button>
            </div>
        </form>

    </div><!--End card -->

@endsection
