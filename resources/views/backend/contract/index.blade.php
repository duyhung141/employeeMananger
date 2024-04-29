@extends('backend.layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">
            <h1>Quản lý hợp đồng</h1>
        </div><!--End card-header -->

        <div class="row">
            <div class="col-md-2">
                <label for="contract_code" class="form-label">Mã HD</label>
                <div class="input-group has-validation">
                    <input type="text" class="form-control" id="contract_code" name="contract_code">
                </div>
            </div>
            <div class="col-md-2">
                <label for="employee_code" class="form-label">Mã NV</label>
                <div class="input-group has-validation">
                    <input type="text" class="form-control" id="employee_code" name="employee_code">
                </div>
            </div>
            <div class="col-md-2">
                <label for="name" class="form-label">Họ tên</label>
                <div class="input-group has-validation">
                    <input type="text" class="form-control" id="name" name="name">
                </div>
            </div>
            <div class="col-md-2">
                <label for="type" class="form-label">Phòng ban</label>
                <select class="form-control" id="type" name="type">
                    <option selected disabled value="">---Choose---</option>
                    @foreach(config('department.departments') as $department)
                        <option value="{{ $department }}">{{ $department }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-2">
                <label for="type" class="form-label">Chức vụ</label>
                <select class="form-control" id="type" name="position">
                    <option selected disabled value="">---Choose---</option>
                    @foreach(config('position.positions') as $position)
                        <option value="{{ $position }}">{{ $position }}</option>
                    @endforeach
                </select>
            </div>

            <div class="col-md-3 d-flex align-items-end">
                <button class="btn btn-info">Tìm kiếm</button>
            </div>
        </div>

        <div class="my-2 d-flex justify-content-end">
            <a href="{{ route('contract.create') }}" class="btn btn-primary text-end">Thêm mới</a>
        </div>

        <div class="card-body table-responsive p-0">
            <table class="table table-hover text-nowrap">
                <thead>
                <tr class="table-primary">
                    <th scope="col">#</th>
                    <th scope="col">Mã hợp đồng</th>
                    <th scope="col">Nhân viên</th>
                    <th scope="col">Hồ sơ lương</th>
                    <th scope="col">Ngày bắt đầu</th>
                    <th scope="col">Ngày kết thúc</th>
                    <th scope="col">Loại</th>
                    <th scope="col">Trạng thái</th>
                    <th scope="col">Thao tác</th>
                </tr>
                </thead>
                <tbody>
                @if($contracts->count() == 0)
                    <tr><td colspan="9"><p class="font-weight-bold">Không có dữ liệu</p></td></tr>
                @else
                @foreach($contracts as $index=>$contract)
                    <tr>
                        <th scope="row">{{ $index +1 }}</th>
                        <td>
                            <a class="text-primary text-decoration-none" href="{{ route('contract.show', ['contract' => $contract]) }}">{{ $contract->code }}</a>
                        </td>
                        <td>{{ $contract->employee->name }}</td>
                        <td>{{ $contract->salary->code }}</td>
                        <td>{{ $contract->getColEffectiveDate() }}</td>
                        <td>{{ $contract->getColExpiredDate() }}</td>
                        <td>{{ $contract->getColType() }}</td>
                        <td>{{ $contract->getColStatus() }}</td>
                        <td>
                            <button class="btn text-center dropdown-toggle" role="button" data-toggle="dropdown">
                                <i class="bi bi-three-dots"></i>
                            </button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="{{ route('contract.show', ['contract' => $contract]) }}"><i class="bi bi-eye-fill"></i> Xem chi tiết</a></li>
                                <li><a class="dropdown-item" href="{{ route('contract.edit', ['contract' => $contract]) }}"><i class="bi bi-pencil"></i> Sửa thông tin</a></li>
                                <form action="{{ route('contract.destroy', ['contract' => $contract]) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <li><button class="dropdown-item" href="#"><i class="bi bi-trash"></i> Xóa bỏ</button></li>
                                </form>
                            </ul>
                        </td>
                    </tr>
                @endforeach
                @endif
                </tbody>
            </table>
        </div>

        <div class="card-footer">
            {{ $contracts->links('pagination::bootstrap-4') }}
        </div>
    </div><!--End card -->

@endsection
