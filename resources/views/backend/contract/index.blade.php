@extends('backend.layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">
            <h1>Quản lý hợp đồng</h1>
        </div><!--End card-header -->
        <div class="my-2 d-flex justify-content-end">
            <a href="{{ route('contract.create') }}" class="btn btn-primary text-end">Thêm mới</a>
        </div>

        <div class="card-body table-responsive p-0">
            <table class="table table-hover text-nowrap">
                <thead>
                <tr class="table-primary">
                    <th scope="col">#</th>
                    <th scope="col">Số hợp đồng</th>
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
                            <a class="text-primary text-decoration-none" href="{{ route('contract.show', 1) }}">{{ $contract->contract_number }}</a>
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
                                <li><a class="dropdown-item" href="#"><i class="bi bi-eye-fill"></i> Xem chi tiết</a></li>
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
