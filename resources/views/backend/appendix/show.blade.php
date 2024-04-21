@extends('backend.layouts.app')

@section('content')
    <div class="container py-3">
        <h1>Chi tiết phụ lục</h1>

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
                                <p class="mb-0">{{ $appendix->getColEffectiveDate() }}</p>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                                <p class="mb-0">Ngày hết hiệu lực</p>
                                <p class="mb-0">{{ $appendix->getColExpiredDate() }}</p>

                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                                <p class="mb-0">Trạng thái</p>
                                <p class="mb-0 {{ $appendix->checkStatusExpired()?'text-danger': 'text-success' }}">{{ $appendix->getStatus() }}</p>
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
                                <p class="mb-0">Mã PL</p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-muted mb-0">{{ $appendix->code }}</p>
                            </div>
                        </div><!--End row-->
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0">Loại PL</p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-muted mb-0">{{ $appendix->getColType() }}</p>
                            </div>
                        </div><!--End row-->
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0">Số phụ lục</p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-muted mb-0">{{ $appendix->appendix_number }}</p>
                            </div>
                        </div><!--End row-->
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0">Số quyết định HSL</p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-muted mb-0">{{ $contract->salary->decision_code }}</p>
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
                                <p class="mb-0">Lương cơ bản</p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-muted mb-0">{{ $contract->salary->getColBacsicSalary() }}</p>
                            </div>
                        </div><!--End row-->
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0">Lương thỏa thuận</p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-muted mb-0">{{ $contract->salary->getColNegotiableSalary() }}</p>
                            </div>
                        </div><!--End row-->
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
