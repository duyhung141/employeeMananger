@extends('backend.layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">
            <h1>Quản lý phụ lục</h1>
        </div><!--End card-header -->

        <div class="row">
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
            <div class="col-md-2">
                <label for="type" class="form-label">Loại</label>
                <select class="form-control" id="type" name="position">
                    <option selected disabled value="">---Choose---</option>
                    @foreach(config('appendix.appendixes') as $appendix)
                        <option value="{{ $appendix }}">{{ $appendix }}</option>
                    @endforeach
                </select>
            </div>

            <div class="col-md-3 d-flex align-items-end">
                <button class="btn btn-info">Tìm kiếm</button>
            </div>
        </div>

        <div class="my-2 d-flex justify-content-end">
            <a href="{{ route('appendix.create') }}" class="btn btn-primary text-end">Thêm mới</a>
        </div>

        <div class="card-body table-responsive p-0">
            <table class="table table-hover text-nowrap">
                <thead>
                <tr class="table-primary">
                    <th scope="col">#</th>
                    <th scope="col">Mã phụ lục</th>
                    <th scope="col">Nhân viên</th>
                    <th scope="col">Hợp đồng</th>
                    <th scope="col">Ngày bắt đầu</th>
                    <th scope="col">Ngày kết thúc</th>
                    <th scope="col">Loại</th>
                    <th scope="col">Thao tác</th>
                </tr>
                </thead>
                <tbody>
                @if($appendixes->count() == 0)
                    <tr><td colspan="9"><p class="font-weight-bold">Không có dữ liệu</p></td></tr>

                @else
                @foreach($appendixes as $index => $appendix)
                    <tr>
                        <th scope="row">{{ $index +1 }}</th>
                        <td>
                            <a class="text-primary text-decoration-none" href="{{ route('appendix.show', ['appendix' => $appendix]) }}">{{ $appendix->code }}</a>
                        </td>
                        <td>{{ $appendix->employee->name }}</td>
                        <td>{{ $appendix->contract->code }}</td>
                        <td>{{ $appendix->getColEffectiveDate() }}</td>
                        <td>{{ $appendix->getColExpiredDate() }}</td>
                        <td>{{ $appendix->getColType() }}</td>
                        <td>
                            <button class="btn text-center dropdown-toggle" role="button" data-toggle="dropdown">
                                <i class="bi bi-three-dots"></i>
                            </button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="{{ route('appendix.show', ['appendix' => $appendix]) }}"><i class="bi bi-eye-fill"></i> Xem chi tiết</a></li>
                                <li><a class="dropdown-item" href="{{ route('appendix.edit', ['appendix' => $appendix]) }}"><i class="bi bi-pencil"></i> Sửa thông tin</a></li>
                                <form action="{{ route('appendix.destroy', ['appendix' => $appendix]) }}" method="POST">
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
            {{ $appendixes->links('pagination::bootstrap-4') }}
        </div>
    </div><!--End card -->

@endsection
