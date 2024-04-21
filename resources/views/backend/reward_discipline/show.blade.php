@extends('backend.layouts.app')

@section('content')
    <div class="container py-3">
        <h1>Chi tiết khen thưởng/kỉ luật</h1>

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
                                <p class="mb-0">{{ $reward_discipline->getColEffectiveDate() }}</p>
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
                                <p class="mb-0">Mã PCTP</p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-muted mb-0">{{ $reward_discipline->code }}</p>
                            </div>
                        </div><!--End row-->
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0">Số quyết định KTKL</p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-muted mb-0">{{ $reward_discipline->reward_discipline_number }}</p>
                            </div>
                        </div><!--End row-->
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0">Loại PCTP</p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-muted mb-0">{{ $reward_discipline->type }}</p>
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
                                <p class="mb-0">Số tiền</p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-muted mb-0">{{ $reward_discipline->amount }}</p>
                            </div>
                        </div><!--End row-->
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0">Ghi chú</p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-muted mb-0">{{ $reward_discipline->reason }}</p>
                            </div>
                        </div><!--End row-->
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0">Nội dung</p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-muted mb-0">{{ $reward_discipline->content }}</p>
                            </div>
                        </div><!--End row-->

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
