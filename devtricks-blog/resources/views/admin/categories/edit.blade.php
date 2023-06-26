@extends('admin.layouts.Layout')
@section('content')
    <div class="row">
        <div class="col-md-11">
            <div class="page-header">
                <div class="page-breadcrumb">
                    <a href="admin/category/list" class="btn btn-success">Trở lại danh sách</a>
                </div>
            </div>
            <div class="card-header card-header-primary">
                <h4 class="card-title"></h4>
                <p class="card-category">Quản lý thể loại</p>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-11">
            <div class="card">
                <div class="card-header card-header-primary">
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#tabs-1" role="tab">Thể loại</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#tabs-2" role="tab">Seo</a>
                        </li>
                    </ul><!-- Tab panes -->
                </div>
                <div class="card-body">
                    <form action="{{URL::asset("admin/category/update/$index->id")}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="tab-content">

                            <div class="tab-pane active" id="tabs-1" role="tabpanel">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Tên thể loại</label>
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
                                            <label class="bmd-label-floating">Parent Id</label>
                                            <input type="text" name="parent" value="{{$index->parent_id}}" class="form-control">
                                        </div>
                                        @error('parent')
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
                            </div>
                            <div class="tab-pane" id="tabs-2" role="tabpanel">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Slug name</label>
                                            <input type="text" name="slug_name" value="{{$index->slug}}" class="form-control" />
                                        </div>
                                        @error('slug_name')
                                        <b style="color: red">{{ $message }} </b>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Meta keyword</label>
                                            <textarea name="keyword" class="form-control">{{$index->keyword}}</textarea>
                                        </div>
                                        @error('keyword')
                                        <b style="color: red">{{ $message }} </b>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Meta description</label>
                                            <textarea name="description" class="form-control">{{$index->description}}</textarea>
                                        </div>
                                        @error('description')
                                        <b style="color: red">{{ $message }} </b>
                                        @enderror
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
