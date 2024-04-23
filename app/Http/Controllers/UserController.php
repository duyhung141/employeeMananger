<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $employee = Employee::where('email', $user->email)->first();
        $data = [
            'user' => $user,
            'employee' => $employee
        ];
        return view('backend.index', $data);
    }

    public function account()
    {
        return view('backend.user.account');
    }

    public function changePassword(Request $request)
    {
        $current_password = $request->current_password;
        $new_password = $request->new_password;
        $confirm_password = $request->confirm_password;
        if ($new_password == '' || $confirm_password == '' || $current_password == '') {
            return redirect()->back()->with('error', 'Vui lòng nhập đầy đủ thông tin');
        }
        if ($new_password != $confirm_password) {
            return redirect()->back()->with('error', 'Mật khẩu mới không khớp');
        }

        $user = auth()->user();
        if (!\Hash::check($request->current_password, $user->password)) {
            return redirect()->back()->with('error', 'Mật khẩu cũ không đúng');
        }

        $user->password = bcrypt($new_password);
        $user->save();

        return redirect()->back()->with('success', 'Đổi mật khẩu thành công');
    }
}
