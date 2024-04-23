@extends('backend.layouts.app')

@section('content')
    <div class="container light-style flex-grow-1 container-p-y">

        <h4 class="font-weight-bold py-3 mb-4">
            Tài khoản
        </h4>

        <div class="card overflow-hidden">
            <div class="row no-gutters row-bordered row-border-light">
                <div class="col-md-3 pt-0">
                    <div class="list-group list-group-flush account-settings-links">
                        <a class="list-group-item list-group-item-action active" data-toggle="list"
                           href="#account-change-password">Đổi mật khẩu</a>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="tab-content">
                        <div class="tab-pane fade active show" id="account-change-password">
                            <form class="card-body pb-2" action="{{ route('account.change-password') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label class="form-label">Mật khẩu hiện tại</label>
                                    <input type="password" name="current_password" class="form-control">
                                </div>

                                <div class="form-group">
                                    <label class="form-label">Mật khẩu mới</label>
                                    <input type="password" name="new_password" class="form-control">
                                </div>

                                <div class="form-group">
                                    <label class="form-label">Nhập lại mật khẩu</label>
                                    <input type="password" name="confirm_password" class="form-control">
                                </div>
                                <div class="text-right mt-3">
                                    <button type="submit" class="btn btn-primary">Save changes</button>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
