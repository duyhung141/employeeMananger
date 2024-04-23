@extends('backend.layouts.app')

@section('content')
    <section class="vh-100" style="background-color: #f4f5f7;">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-start h-100">
                <div class="card mb-3 w-100" style="border-radius: .5rem;">
                    <div class="row g-0">
                        <div class="col-md-4 gradient-custom text-center"
                             style="border-top-left-radius: .5rem; border-bottom-left-radius: .5rem;">
                            <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava1-bg.webp"
                                 alt="Avatar" class="img-fluid my-5" style="width: 80px;"/>
                            <h5>{{ $employee->name }}</h5>
                            <p class="mb-0 fw-semibold">{{ $employee->code }}</p>
                            <p class="mb-0">Phòng {{ $employee->department }}</p>
                            <p class="mb-0">Vị trí {{ $employee->position }}</p>
                            <i class="far fa-edit mb-5"></i>
                        </div>
                        <div class="col-md-8">
                            <div class="card-body p-4">
                                <h6>Thông tin cơ bản</h6>
                                <hr class="mt-0 mb-4">
                                <div class="row pt-1">
                                    <div class="col-4 mb-3">
                                        <h6>Email</h6>
                                        <p class="text-muted">{{ $employee->email }}</p>
                                    </div>
                                    <div class="col-4 mb-3">
                                        <h6>Điện thoại</h6>
                                        <p class="text-muted">{{ $employee->phone }}</p>
                                    </div>
                                    <div class="col-4 mb-3">
                                        <h6>Ngày sinh</h6>
                                        <p class="text-muted">{{ $employee->getColBirthday() }}</p>
                                    </div>
                                    <div class="col-4 mb-3">
                                        <h6>Giới tính</h6>
                                        <p class="text-muted">{{ $employee->getColGender() }}</p>
                                    </div>
                                    <div class="col-4 mb-3">
                                        <h6>Địa chỉ</h6>
                                        <p class="text-muted">{{ $employee->address }}</p>
                                    </div>
                                    <div class="col-4 mb-3">
                                        <h6>Quốc tịch</h6>
                                        <p class="text-muted">{{ $employee->nationality }}</p>
                                    </div>
                                    <div class="col-4 mb-3">
                                        <h6>CMND/CCCD</h6>
                                        <p class="text-muted">{{ $employee->identity_card }}</p>
                                    </div>
                                    <div class="col-4 mb-3">
                                        <h6>Mã số thuế</h6>
                                        <p class="text-muted">{{ $employee->tax_code }}</p>
                                    </div>
                                    <div class="col-4 mb-3">
                                        <h6>Loại nhân viên</h6>
                                        <p class="text-muted">{{ $employee->getColType() }}</p>
                                    </div>
                                </div>
{{--                                <h6>Projects</h6>--}}
{{--                                <hr class="mt-0 mb-4">--}}
{{--                                <div class="row pt-1">--}}
{{--                                    <div class="col-6 mb-3">--}}
{{--                                        <h6>Recent</h6>--}}
{{--                                        <p class="text-muted">Lorem ipsum</p>--}}
{{--                                    </div>--}}
{{--                                    <div class="col-6 mb-3">--}}
{{--                                        <h6>Most Viewed</h6>--}}
{{--                                        <p class="text-muted">Dolor sit amet</p>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
