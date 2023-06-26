@extends('admin.layouts.Layout')
@section('content')
    <div class="row">
        <div class="col-md-11">
            <div class="page-header">
                <div class="page-breadcrumb">
                    <a href="admin/news/list" class="btn btn-success">Trở lại danh sách</a>
                </div>
            </div>
            <div class="card-header card-header-primary">
                <h4 class="card-title"></h4>
                <p class="card-news">Quản lý Tin tức</p>
            </div>
        </div>
    </div>
    <div class="row">
	<div class="col-md-11">
		<div class="card">
            <div class="card-header card-header-primary">
                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#tabs-1" role="tab">Tin tức</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#tabs-2" role="tab">Seo</a>
                    </li>
                </ul><!-- Tab panes -->
            </div>
			<div class="card-body">
				<form action="{{URL::asset("admin/news/add")}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="tab-content">
                        @if(session('message'))
                        <div class="alert alert-success" role="alert">
                            {{session('message')}}
                        </div>
                        @endif
                        <div class="tab-pane active" id="tabs-1" role="tabpanel">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Tiêu đề</label>
                                        <input type="text" name="title" value="{{old('title')}}" class="form-control">
                                    </div>
                                   @error('title')
                                    <b style="color: red">{{ $message }} </b>
                                   @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Tóm tắt</label>
                                        <textarea name="summary"  class="form-control">{{old('summary')}}</textarea>
                                    </div>
                                    @error('summary')
                                    <b style="color: red">{{ $message }} </b>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Nội dung</label>
                                        <textarea name="contents"  class="form-control">{{old('content')}}</textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Ảnh đại diện</label>
                                        <input type="file" name="image" value="{{old('image')}}" class="form-control">
                                    </div>
                                    @error('image')
                                    <b style="color: red">{{ $message }} </b>
                                    @enderror
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Hình ảnh dính kèm</label>
                                        <input type="file" name="images_list[]" multiple class="form-control">
                                    </div>
                                    @error('images_list')
                                    <b style="color: red">{{ $message }} </b>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Thể loại</label>
                                        <select name="category"  class="form-control">
                                            @foreach($category as $item)
                                                <option value="{{$item->id}}">{{$item->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <div class="cutsom-checkbox-row">
                                            <label class="bmd-label-floating">Trạng thái</label>
                                            <input class="status" type="checkbox" name="status" id="switch" />
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
                                        <input type="text" name="slug_name" value="{{old('slug_name')}}" class="form-control" />
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
                                        <textarea name="keyword" class="form-control">{{old('keyword')}}</textarea>
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
                                        <textarea name="description" class="form-control">{{old('description')}}</textarea>
                                    </div>
                                    @error('description')
                                    <b style="color: red">{{ $message }} </b>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
					<button type="submit" name="create" class="btn btn-primary pull-right">Thêm</button>
					<div class="clearfix"></div>
				</form>
			</div>
		</div>
	</div>
</div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function () {
            CKEDITOR.replace('contents', {
                filebrowserBrowseUrl: './backend/ckeditor/ckfinder',
                filebrowserImageBrowseUrl: './backend/ckeditor/ckfinder?type=Images',
                filebrowserFlashBrowseUrl: './backend/ckeditor/ckfinder?type=Flash',
                filebrowserUploadUrl: './backend/ckeditor/core/connector/php/connector.php?command=QuickUpload&type=Files',
                filebrowserImageUploadUrl: './backend/ckeditor/core/connector/php/connector.php?command=QuickUpload&type=Images',
                filebrowserFlashUploadUrl: './backend/ckeditor/core/connector/php/connector.php?command=QuickUpload&type=Flash'
            });
        });
    </script>
@endsection
