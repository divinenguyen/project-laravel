@extends('admin.layouts.Layout')
@section('content')
    <div class="row">
        <div class="col-md-11">
            <div class="page-header">
                <div class="page-breadcrumb">
                    <a href="admin/users/list" class="btn btn-success">Trở lại danh sách</a>
                </div>
            </div>
            <div class="card-header card-header-primary">
                <h4 class="card-title"></h4>
                <p class="card-category">Quản lý người dùng</p>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-11">
            <div class="card">
                <div class="card-body">
                    <form action="{{URL::asset("admin/users/update/".$index->id)}}" method="post" enctype="multipart/form-data">
                        @csrf
                        @if(session('message'))
                            <div class="alert alert-success" role="alert">
                                {{session('message')}}
                            </div>
                        @endif
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="bmd-label-floating">Tài khoản</label>
                                    <input type="text" name="username" value="{{$index->username}}" class="form-control">
                                </div>
                                @error('username')
                                <b style="color: red">{{ $message }} </b>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="bmd-label-floating">Họ và tên</label>
                                    <input type="text" name="fullname" value="{{$index->fullname}}" class="form-control" />
                                </div>
                                @error('fullname')
                                <b style="color: red">{{ $message }} </b>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="bmd-label-floating">Email</label>
                                    <input type="text" name="email" value="{{$index->email}}" class="form-control" />
                                </div>
                                @error('email')
                                <b style="color: red">{{ $message }} </b>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="bmd-label-floating">Mật khẩu mới</label>
                                    <input type="password" name="password" value="{{old('password')}}" class="form-control" />
                                </div>
                                @error('password')
                                <b style="color: red">{{$message}} </b>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="bmd-label-floating">Mật khẩu xác nhận</label>
                                    <input type="password" name="password_confirmation" value="" class="form-control" />
                                </div>
                                @error('password_confirmation')
                                <b style="color: red">{{$message}}</b>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="bmd-label-floating">Phân quyền</label>
                                    <select name="role" class="form-control">
                                        <option value="0">Người dùng</option>
                                    </select>
                                </div>
                                @error('role')
                                <b style="color: red">{{ $message }} </b>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-2">
                                <div class="form-group">
                                    <div class="cutsom-checkbox-row">
                                        <label class="bmd-label-floating">Trạng thái</label>
                                        <input class="status" type="checkbox" @if($index->status==1) checked @endif name="status" id="switch" />
                                        <label class="statuslabel" for="switch">Toggle</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button type="submit" name="create" class="btn btn-primary pull-right">Cập nhật</button>
                        <div class="clearfix"></div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
