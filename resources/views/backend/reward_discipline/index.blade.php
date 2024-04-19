@extends('backend.layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">
            <h1>Quản lý khen thưởng/kỉ luật</h1>
        </div><!--End card-header -->
        <div class="row">
            <div class="col-md-2">
                <label for="employee_code" class="form-label">Mã NV</label>
                <div class="input-group has-validation">
                    <input type="text" class="form-control" id="employee_code" name="employee_code">
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
                <label for="type" class="form-label">Loại</label>
                <select class="form-control" id="type" name="type">
                    <option selected disabled value="">---Choose---</option>
                    <option value="REWARD">Khen thưởng</option>
                    <option value="DISCIPLINE">Kỉ luật</option>
                </select>
            </div>

            <div class="col-md-3 d-flex align-items-end">
                <button class="btn btn-info">Tìm kiếm</button>
            </div>
        </div>
        <div class="my-2  d-flex justify-content-end">
            <a href="{{ route('reward_discipline.create') }}" class="btn btn-primary float-end">Thêm mới</a>
        </div>

        <div class="card-body table-responsive p-0">
            <table class="table table-hover text-nowrap">
                <thead class="table-primary">
                <tr class="">
                    <th scope="col">#</th>
                    <th scope="col">Mã khen thưởng/kỉ luật</th>
                    <th scope="col">Nhân viên</th>
                    <th scope="col">Ngày</th>
                    <th scope="col">Loại</th>
                    <th scope="col">Lý do</th>
                    <th scope="col">Số tiền</th>
                    <th scope="col">Thao tác</th>
                </tr>
                </thead>
                <tbody>
                @if($reward_disciplines->count() == 0)
                    <tr>
                        <td colspan="9"><p class="font-weight-bold">Không có dữ liệu</p></td>
                    </tr>
                @else
                    @foreach($reward_disciplines as $index => $reward_discipline)
                        <tr>
                            <th scope="row">{{ $index + 1 }}</th>
                            <td>{{ $reward_discipline->code }}</td>
                            <td>{{ $reward_discipline->employee->name }}</td>
                            <td>{{ $reward_discipline->getColEffectiveDate() }}</td>
                            <td>{{ $reward_discipline->getColType() }}</td>
                            <td>{{ $reward_discipline->reason }}</td>
                            <td>{{ $reward_discipline->getColAmount() }}</td>
                            <td>
                                <button class="btn text-center dropdown-toggle" data-toggle="dropdown"
                                        aria-expanded="false">
                                    <i class="bi bi-three-dots"></i>
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="#"><i class="bi bi-eye-fill"></i> Xem chi
                                            tiết</a></li>
                                    <li><a class="dropdown-item"
                                           href="{{ route('reward_discipline.edit', ['reward_discipline' => $reward_discipline]) }}"><i
                                                class="bi bi-pencil"></i> Sửa thông tin</a></li>
                                    <form
                                        action="{{ route('reward_discipline.destroy', ['reward_discipline' => $reward_discipline]) }}"
                                        method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <li>
                                            <button class="dropdown-item" href="#"><i class="bi bi-trash"></i> Xóa bỏ
                                            </button>
                                        </li>
                                    </form>
                                </ul>
                            </td>
                        </tr>
                    @endforeach
                @endif
                </tbody>
            </table>
        </div><!--End card-body -->
        <div class="card-footer">
            {{ $reward_disciplines->links('pagination::bootstrap-4') }}
        </div>
    </div><!--End card -->

@endsection
