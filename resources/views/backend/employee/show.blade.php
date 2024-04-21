@extends('backend.layouts.app')

@section('content')
    <div class="container py-3">
        <h1>Chi tiết nhân viên</h1>

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
            </div>
            <div class="col-lg-8">
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0">Mã số thuế</p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-muted mb-0">{{ $employee->tax_code }}</p>
                            </div>
                        </div><!--End row-->
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0">CMND/CCCD</p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-muted mb-0">{{ $employee->identity_card }}</p>
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
                                <p class="mb-0">Loại nhân viên</p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-muted mb-0">{{ $employee->getColType() }}</p>
                            </div>
                        </div><!--End row-->
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0">Email</p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-muted mb-0">{{ $employee->email }}</p>
                            </div>
                        </div><!--End row-->
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0">Số điện thoại</p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-muted mb-0">{{ $employee->phone }}</p>
                            </div>
                        </div><!--End row-->
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0">Địa chỉ</p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-muted mb-0">{{ $employee->address }}</p>
                            </div>
                        </div><!--End row-->
                    </div><!--End card-body-->
                </div><!--End card-->
            </div>
        </div><!--End row-->
    </div>
@endsection
