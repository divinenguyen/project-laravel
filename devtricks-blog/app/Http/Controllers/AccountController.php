<?php
namespace App\Http\Controllers;
use App\models\Experience;
use App\models\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use phpDocumentor\Reflection\DocBlock\Tags\Uses;

class AccountController extends Controller
{
    //
    function login(){
        return  view('account.login');
    }
    function postlogin (Request $request){
        $this->validate($request,[
            'username'=>'required',
            'password'=>'required',
        ],
        [
            'username.required'=> 'Tên tài khoản là bắt buộc',
            'password.required'=> 'Mật khẩu là bắt buộc',
        ]);
        if (Auth::attempt(['email'=>$request->username,'password'=>$request->password])){
            $user = Auth::user();
            if ($user->permission_id==1){
                return redirect()->intended('admin/category');
            }
            elseif ($user->permission_id<>1){
                return redirect()->intended('home');
            }
        }
        else{
            return redirect('account/login')->with('message','Tài khoản hoặc mật khẩu không đúng');
        }
    }
    function logout(){
        Auth::logout();
        return redirect('account/login');
    }
    function signup(){
        return  view('account.signup');
    }
    function register(Request $request){
        $this->validate($request,[
            'fullname'=>'max:64',
            'email'=>'required|max:64|email|unique:users',
            'phonenumber'=>'numeric',
            'address'=>'max:64',
            'password'=>'required|min:8|max:64',
            'confim_password'=>'same:password',
        ],[
            'fullname.max'=> 'Họ và tên không quá 64 ký tự',
            'email.max'=> 'Email không quá 64 ký tự',
            'email.email'=> 'Địa chỉ email không hợp lệ',
            'email.required'=> 'Email là bắt buộc',
            'email.unique'=> 'Email đã tồn tại',
            'phonenumber.numeric'=> 'số điện thoại phải là số',
            'address.max'=> 'Địa chi không quá 120 ký tự',
            'password.min'=> 'Mật khẩu tối thiểu 8 ký tự',
            'password.max'=> 'Mật khẩu không quá 64 ký tự',
            'password.required'=> 'Bạn chưa nhập mật khẩu',
            'confim_password.same'=> 'Mật khẩu không khớp',
        ]);
        $user = new Users();
        $user->email = $request->email;
        $user->fullname = $request->fullname;
        $user->birthday = $request->birthday;
        $user->password = bcrypt($request->password);
        $user->phonenumber = $request->phonenumber;
        $user->address = $request->address;
        $user->level = '';
        $user->permission_id = 4;
        $user->status = true;
        $user->count_post =1;
        $user->views_count =1;
        $user->save();
        //return redirect('profile')->with('message','Đăng ký tài khoản thành công');
    }
}
