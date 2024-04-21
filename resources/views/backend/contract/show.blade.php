@extends('backend.layouts.app')

@section('content')
    <div class="container py-3">
        <h1>Chi tiết hợp đồng</h1>

        <div class="row">
            <div class="col-lg-4">
                <div class="card mb-4">
                    <div class="card-body text-center">
                        <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava3.webp"
                             alt="avatar"
                             class="rounded-circle img-fluid" style="width: 150px;">
                        <h5 class="my-3">{{ $employee->name }}</h5>
                        <p class="text-muted mb-1">{{ $employee->getColBirthday() }}
                            | {{ $employee->getColGender() }}</p>
                        <p class="text-muted mb-1">{{ $employee->code }}</p>
                        <p class="text-muted mb-4">{{ $employee->nationality }}</p>
                    </div><!--End card-body-->
                </div><!--End card-->
                <div class="card mb-4 mb-lg-0">
                    <div class="card-body p-0">
                        <ul class="list-group list-group-flush rounded-3">
                            <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                                <p class="mb-0">Ngày hiệu lực</p>
                                <p class="mb-0">{{ $contract->getColEffectiveDate() }}</p>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                                <p class="mb-0">Ngày hết hiệu lực</p>
                                <p class="mb-0">{{ $contract->getColExpiredDate() }}</p>

                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                                <p class="mb-0">Trạng thái</p>
                                <p class="mb-0 {{ $contract->checkStatusExpired()?'text-danger': 'text-success' }}">{{ $contract->getColStatus() }}</p>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0">Mã HĐ</p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-muted mb-0">{{ $contract->code }}</p>
                            </div>
                        </div><!--End row-->
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0">Số quyết định</p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-muted mb-0">{{ $contract->contract_number }}</p>
                            </div>
                        </div><!--End row-->
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0">Loại HĐ</p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-muted mb-0">{{ $contract->getColType() }}</p>
                            </div>
                        </div><!--End row-->
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0">Phòng ban</p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-muted mb-0">{{ $employee->department }}</p>
                            </div>
                        </div><!--End row-->
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0">Chức vụ</p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-muted mb-0">{{ $employee->position }}</p>
                            </div>
                        </div><!--End row-->
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0">Hồ sơ lương</p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-muted mb-0">{{ $salary->decision_code }}</p>
                            </div>
                        </div><!--End row-->
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0">Lương cơ bản</p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-muted mb-0">{{ $salary->getColBacsicSalary() }}</p>
                            </div>
                        </div><!--End row-->
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0">Lương thỏa thuận</p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-muted mb-0">{{ $salary->getColNegotiableSalary() }}</p>
                            </div>
                        </div><!--End row-->
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
