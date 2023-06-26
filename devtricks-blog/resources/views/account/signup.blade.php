@extends('layouts.account')
@section('meta')
    <meta name="google-signin-scope" content="profile email">
    <script src="https://apis.google.com/js/platform.js" async defer></script>
    <title>Divine Nguyên - Đăng ký</title>
@endsection
@section('content')
    <div id="app-signup">
        <form action="{{asset("account/register")}}" method="post">
            @csrf
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-3">
                        <div class="welcom">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="app-platform">
                            <h1 class="title">Đăng ký tài khoản</h1>
                            <div class="form-group">
                                <label for="">Họ Tên: (*)</label>
                                <input type="text" class="form-control" name="fullname" value="{{old('fullname')}}" placeholder="Họ và Tên">
                                @error('fullname')
                                <b style="color: red">{{$message}}</b>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Email: (*)</label>
                                <input type="email" class="form-control" name="email" value="{{old('email')}}"  placeholder="địa chỉ của bạn">
                                @error('email')
                                <b style="color: red">{{$message}}</b>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Số điện thoại</label>
                                <input type="text" class="form-control" name="phonenumber" value="{{old('phonenumber')}}"
                                       placeholder="Số điện thoại của bạn">
                                @error('phonenumber')
                                <b style="color: red">{{$message}}</b>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Địa chỉ</label>
                                <input type="text" class="form-control" name="address" value="{{old('address')}}"
                                       placeholder="Địa chỉ của bạn">
                                @error('address')
                                <b style="color: red">{{$message}}</b>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Ngày sinh</label>
                                <input type="date" min="1969-01-01" max="2020-12-31" name="birthday" value="{{old('birthday')}}"  class="form-control" placeholder="Ngày sinh của bạn">
                            </div>
                            <div class="form-group">
                                <label>Mật khẩu: (*)</label>
                                <input type="password" class="form-control" name="password" value="{{old('password')}}"
                                       placeholder="Mật khẩu của bạn">
                                @error('password')
                                <b style="color: red">{{$message}}</b>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Mật khẩu xác nhận</label>
                                <input type="password" class="form-control" name="confim_password"
                                       placeholder="Mật khẩu xác nhận">
                                @error('confim_password')
                                <b style="color: red">{{$message}}</b>
                                @enderror
                            </div>
                            <div class="form-group btn-group">
                                <button class="btn btn-block btn-gradients" type="submit">Đăng ký</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
@section('scripts')
    <script>
    </script>
@endsection
