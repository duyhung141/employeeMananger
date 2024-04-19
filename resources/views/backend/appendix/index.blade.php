@extends('backend.layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">
            <h1>Quản lý phụ lục</h1>
        </div><!--End card-header -->
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
                            <a class="text-primary text-decoration-none" href="{{ route('appendix.show', 1) }}">{{ $appendix->code }}</a>
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
                                <li><a class="dropdown-item" href="#"><i class="bi bi-eye-fill"></i> Xem chi tiết</a></li>
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
