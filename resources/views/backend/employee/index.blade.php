@extends('backend.layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">
            <h1>Quản lý nhân viên</h1>
        </div><!--End card-header -->
        <div class="mt-2">
            <a href="{{ route('employee.create') }}" class="btn btn-primary float-end">Thêm mới</a>
        </div>

        <div class="card-body px-0">
            <table class="table table-striped">
                <thead class="table-primary">
                <tr class="">
                    <th scope="col">#</th>
                    <th scope="col">Nhân viên</th>
                    <th scope="col">Mã số thuế</th>
                    <th scope="col">Phòng ban</th>
                    <th scope="col">Chức vụ</th>
                    <th scope="col">Ngày sinh</th>
                    <th scope="col">Điện thoại</th>
                    <th scope="col">Email</th>
                    <th scope="col">Thao tác</th>
                </tr>
                </thead>
                <tbody>
                @foreach($employees as $employee)
                    <tr>
                        <th scope="row">1</th>
                        <td>
                            <a class="text-primary text-decoration-none" href="{{ route('employee.show', 1) }}">{{ $employee->code }}</a>
                            <p class="mb-0">{{ $employee->name }}</p>
                        </td>
                        <td>{{ $employee->tax_code }}</td>
                        <td>{{ $employee->department }}</td>
                        <td>{{ $employee->position }}</td>
                        <td>{{ $employee->getColBirthday() }}</td>
                        <td>{{ $employee->phone }}</td>
                        <td>{{ $employee->email }}</td>
                        <td>
                            <button class="btn text-center" data-bs-toggle="dropdown">
                                <i class="bi bi-three-dots"></i>
                            </button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#"><i class="bi bi-eye-fill"></i> Xem chi tiết</a></li>
                                <li><a class="dropdown-item" href="{{ route('employee.edit', ['employee' => $employee]) }}"><i class="bi bi-pencil"></i> Sửa thông tin</a></li>
                                <form action="{{ route('employee.destroy', ['employee' => $employee]) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <li><button class="dropdown-item" href="#"><i class="bi bi-trash"></i> Xóa bỏ</button></li>
                                </form>
                            </ul>
                        </td>
                    </tr>
                @endforeach

                </tbody>
            </table>
        </div><!--End card-body -->
        <div class="card-footer">
            <nav>
                <ul class="pagination">
                    <li class="page-item"><a class="page-link" href="#">Trước</a></li>
                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link active" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item"><a class="page-link" href="#">Tiếp</a></li>
                </ul>
            </nav>
        </div>
    </div><!--End card -->

@endsection
