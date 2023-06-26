@extends('admin.layouts.Layout')
@section('content')
    <div class="row">
        <div class="col-md-11">
            <div class="page-header">
                <div class="page-breadcrumb">
                    <a href="admin/menu/list" class="btn btn-success">Trở lại danh sách</a>
                </div>
            </div>
            <div class="card-header card-header-primary">
                <h4 class="card-title"></h4>
                <p class="card-category">Quản lý menu</p>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-11">
            <div class="card">
                <div class="card-body">
                    <form action="{{URL::asset("admin/menu/update/".$index->id)}}" method="post" enctype="multipart/form-data">
                        @csrf
                        @if(session('message'))
                            <div class="alert alert-success" role="alert">
                                {{session('message')}}
                            </div>
                        @endif
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="bmd-label-floating">Tên menu</label>
                                    <input type="text" name="name" value="{{$index->name}}" class="form-control">
                                </div>
                                @error('name')
                                <b style="color: red">{{ $message }} </b>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="bmd-label-floating">Đường dẫn</label>
                                    <input type="text" name="url" value="{{$index->url}}" class="form-control" />
                                </div>
                                @error('url')
                                <b style="color: red">{{ $message }} </b>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="bmd-label-floating">Parent</label>
                                    <select name="parent" class="form-control">
                                        <option value="0">Danh mục cấp 1</option>
                                        {{menu_multilevel($data,$index->parent)}}
                                    </select>
                                </div>
                                @error('parent')
                                <b style="color: red">{{ $message }} </b>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="bmd-label-floating">Thứ tự</label>
                                    <input type="text" name="order" value="{{$index->order}}" class="form-control">
                                </div>
                                @error('order')
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
