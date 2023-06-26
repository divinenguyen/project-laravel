<?php

namespace App\Http\Controllers;
use App\models\Users;
use Illuminate\Http\Request;

class UserController extends Controller
{
    function list(){
        $list = Users::paginate(5);
        return view('admin.users.list',['data'=>$list]);
    }
    function add(){
        $list = Users::all()->toArray();
        return view('admin.users.add',['data'=>$list]);
    }
    function postadd(Request $request){
        $this->validate($request,[
            'username'=>'required|min:6|max:32|unique:users',
            'fullname'=>'max:64',
            'email'=>'required|max:32|email|unique:users',
            'password'=>'required|min:8|max:32',
            'password_confirmation'=>'required|same:password',
        ],
        [
            'username.required'=> 'Tên tài khoản là bắt buộc',
            'username.min'=> 'Tên tài khoản tối thiểu là 8 ký tự',
            'username.max'=> 'Tên  tài khoản không quá 32 ký tự',
            'username.unique'=> 'Tên tài khoản đã tồn tại',
            'fullname.max'=> 'Họ và tên không quá 64 ký tự',
            'email.max'=> 'Email không quá 32 ký tự',
            'email.email'=> 'Địa chỉ email không hợp lệ',
            'email.required'=> 'Emaillà bắt buộc',
            'email.unique'=> 'Email đã tồn tại',
            'password.min'=> 'Mật khẩu tối thiểu 8 ký tự',
            'password.max'=> 'Mật khẩu không quá 32 ký tự',
            'password.required'=> 'Mật khẩu là bắt buộc',
            'password_confirmation.required'=> 'Mật khẩu xác nhận là bắt buộc',
            'password_confirmation.same'=> 'Mật khẩu không khớp',
        ]);
        $status = isset($request->status) ? 1 : 0;
        $user = new Users;
        $user->username = $request->username;
        $user->fullname = $request->fullname;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->role = $request->role;
        $user->status = $status;
        $user->save();
        return redirect('admin/users/add')->with('message','thêm dữ liệu thành công');
    }
    function update($id){
        $index = Users::find($id);
        return view('admin.users.edit',['index'=>$index]);
    }
    function postupdate(Request $request,$id){

        $this->validate($request,[
            'username'=>'required|min:6|max:32|unique:users',
            'fullname'=>'max:64',
            'email'=>'required|max:32|email|unique:users',
            'password'=>'required|min:8|max:32',
            'password_confirmation'=>'required|same:password',
        ],
         [
                'username.required'=> 'Tên tài khoản là bắt buộc',
                'username.min'=> 'Tên tài khoản tối thiểu là 8 ký tự',
                'username.max'=> 'Tên  tài khoản không quá 32 ký tự',
                'username.unique'=> 'Tên tài khoản đã tồn tại',
                'fullname.max'=> 'Họ và tên không quá 64 ký tự',
                'email.max'=> 'Email không quá 32 ký tự',
                'email.email'=> 'Địa chỉ email không hợp lệ',
                'email.required'=> 'Email là bắt buộc',
                'email.unique'=> 'Email đã tồn tại',
                'password.min'=> 'Mật khẩu tối thiểu 8 ký tự',
                'password.max'=> 'Mật khẩu không quá 32 ký tự',
                'password.required'=> 'Mật khẩu là bắt buộc',
                'password_confirmation.required'=> 'Mật khẩu xác nhận là bắt buộc',
                'password_confirmation.same'=> 'Mật khẩu không khớp',
            ]);
        $status = isset($request->status) ? 1 : 0;
        $user = Users::find($id);
        $user->username = $request->username;
        $user->fullname = $request->fullname;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->role = $request->role;
        $user->status = $status;
        $user->save();
        return redirect('admin/users/list')->with('message','cập nhật dữ liệu thành công');
    }
    function upstatus(Request $request) {
        $id = $request->id;
        $users = Users::find($id);
        $users->status = $request->status;
        $users->save();
        return 'update thành công';
    }
    function trash(Request $request){
        $id = $request->post_id;
        $users = Users::find($id);
        $users->delete();
        return 'xóa thành công';
    }
}
