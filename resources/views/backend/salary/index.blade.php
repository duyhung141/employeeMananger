@extends('backend.layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">
            <h1>Quản lý nhân viên</h1>
        </div><!--End card-header -->
        <div class="my-2 d-flex justify-content-end">
            <a href="{{ route('salary.create') }}" class="btn btn-primary float-end">Thêm mới</a>
        </div>

        <div class="card-body table-responsive p-0">
            <table class="table table-hover text-nowrap">
                <thead class="table-primary">
                <tr class="">
                    <th scope="col">#</th>
                    <th scope="col">Mã HSL</th>
                    <th scope="col">Số quyết định</th>
                    <th scope="col">Nhân viên</th>
                    <th scope="col">Hiệu lực</th>
                    <th scope="col">Biểu thuế</th>
                    <th scope="col">Lương cơ bản</th>
                    <th scope="col">Lương thỏa thuận</th>
                    <th scope="col">Tỷ lệ hưởng lương</th>
                    <th scope="col">Thao tác</th>
                </tr>
                </thead>
                <tbody>
                @if($salaries->count() > 0)
                @foreach($salaries as $index => $salary)
                    <tr>
                        <th scope="row">{{ $index + 1 }}</th>
                        <td>{{ $salary->code }}</td>
                        <td>{{ $salary->decision_code }}</td>
                        <td>
                            <p>{{ $salary->employee->name }}</p>
                            <p class="mb-0">Phòng ban: {{ $salary->employee->department }}</p>
                        </td>
                        <td>
                            <p class="mb-0">Ngày hiệu lực: {{ $salary->getColEffectiveDate() }}</p>
                            <p class="mb-0">Ngày hết hạn: {{ $salary->getColExpiredDate() }}</p>
                            <p class="mb-0">Trạng thái: {{ $salary->getColStatus() }}</p>
                        </td>
                        <td>{{ $salary->getColTaxSchedule() }}</td>
                        <td>{{ $salary->getColBacsicSalary() }}</td>
                        <td>{{ $salary->getColNegotiableSalary() }}</td>
                        <td>{{ $salary->getColCoefficientSalary() }}</td>
                        <td>
                            <button class="btn text-center dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                <i class="bi bi-three-dots"></i>
                            </button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#"><i class="bi bi-eye-fill"></i> Xem chi tiết</a></li>
                                <li><a class="dropdown-item" href="{{ route('salary.edit', ['salary' => $salary]) }}"><i class="bi bi-pencil"></i> Sửa thông tin</a></li>
                                <form action="{{ route('salary.destroy', ['salary' => $salary]) }}" method="POST">
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
        </div><!--End card-body -->
        <div class="card-footer">
            {{ $salaries->links('pagination::bootstrap-4') }}
        </div>
    </div><!--End card -->

@endsection
