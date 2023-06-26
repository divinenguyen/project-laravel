@extends('admin.layouts.Layout')
@section('meta')
    <meta name="csrf-token" content="{{ csrf_token() }}" />
@endsection
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
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#tabs-3" role="tab">Comment</a>
                        </li>
                    </ul><!-- Tab panes -->
                </div>
                <div class="card-body">
                    <form action="{{URL::asset("admin/news/update/$index->id")}}" method="post" enctype="multipart/form-data">
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
                                            <input type="text" name="title" value="{{$index->title}}" class="form-control">
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
                                            <textarea name="summary"  class="form-control">{{$index->summary}}</textarea>
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
                                            <textarea name="contents"  class="form-control">{{$index->content}}</textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Ảnh đại diện</label>
                                            <input type="file" name="image" value="{{old('image')}}" class="form-control">
                                        </div>
                                        <div style="width: 200px;height: 120px">
                                            <img style="width: 200px;height: 120px" src="public/upload/{{$index->images}}" >
                                        </div>
                                        @error('image')
                                        <b style="color: red">{{ $message }} </b>
                                        @enderror
                                    </div>
                                    <div class="col-md-5">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Hình ảnh dính kèm</label>
                                            <input type="file" name="images_list[]" multiple class="form-control">
                                        </div>
                                        <div>
                                            <ul class="row clearfix">
                                                @if(json_decode($index->images_list))
                                                @foreach(json_decode($index->images_list) as $images)
                                                <li class="col-sm-2"><img style="max-width: 100%" src="public/upload/gallery/{{$images}}" alt=""></li>
                                                @endforeach
                                                @endif
                                            </ul>
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
                                                    @if($item->id==$index->category_id)
                                                        <option value="{{$item->id}}" selected>{{$item->name}}</option>
                                                    @else
                                                        <option value="{{$item->id}}">{{$item->name}}</option>
                                                    @endif
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
                                                <input class="status" type="checkbox" @if($index->status==1) checked @endif name="checkbox" id="switch" />
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
                                                <textarea name="description" class="form-control">{{$index->descriptions}}</textarea>
                                            </div>
                                            @error('description')
                                            <b style="color: red">{{ $message }} </b>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="tabs-3" role="tabpanel">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div id="accordion">
                                                <div class="card">
                                                    <div class="card-header">
                                                        <a class="card-link" data-toggle="collapse" href="#collapseOne">
                                                             Danh sách các bình luận
                                                        </a>
                                                    </div>
                                                    <!-- Modal box -->
                                                    <div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" id="mi-modal">
                                                        <div class="modal-dialog modal-sm">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h4 class="modal-title" id="myModalLabel">bạn có muốn xóa không</h4>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button"  class="btn btn-default" id="modal-btn-si">Có</button>
                                                                    <button type="button" class="btn btn-primary" id="modal-btn-no">Không</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- End Modal box -->
                                                    <div id="collapseOne" class="collapse show" data-parent="#accordion">
                                                        <div class="card-body">
                                                            <div class="table-responsive">
                                                                    <table class="table table-striped table-bordered" style="width:100%">
                                                                        <thead class=" text-primary">
                                                                        <tr>
                                                                            <th>
                                                                                Status
                                                                            </th>
                                                                            <th>
                                                                                ID
                                                                            </th>
                                                                            <th>
                                                                                Bình luận
                                                                            </th>
                                                                            <th>
                                                                                người dùng
                                                                            </th>
                                                                            <th>
                                                                                Lượt thích
                                                                            </th>
                                                                            <th>
                                                                                ngày đăng
                                                                            </th>
                                                                            <th>
                                                                                Quản lý
                                                                            </th>
                                                                        </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                        @foreach($index->comments as $item)
                                                                            <tr>
                                                                                <td>
                                                                                    <label class="switch" for="checkbox{{$item->id}}">
                                                                                        <input data-post="{{$item->id}}" type="checkbox" id="checkbox{{$item->id}}" @if($item->status==1) checked @else unchecked @endif class="selectedId" />
                                                                                        <div class="slider round"></div>
                                                                                    </label>
                                                                                </td>
                                                                                <td>{{$item->id}}</td>
                                                                                <td>{{$item->content}}</td>
                                                                                <td>{{$item->users->fullname}}</td>
                                                                                <td>{{$item->like}}</td>
                                                                                @if($item->created_at!=null)
                                                                                    <td>{{$item->created_at->format('d/m/Y H:i:s')}}</td>
                                                                                 @else
                                                                                    <td></td>
                                                                                @endif
                                                                                <td class="text-primary">
                                                                                    <div class="manage">
                                                                                        <a  data-post="{{$item->id}}" class="drop-data">
                                                                                            <i class="fas fa-trash-alt"></i>
                                                                                        </a>
                                                                                    </div>
                                                                                </td>
                                                                            </tr>
                                                                        @endforeach
                                                                        </tbody>
                                                                    </table>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        </div>
                        <button type="submit" name="update" class="btn btn-primary pull-right">Cập nhật</button>
                        <div class="clearfix"></div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $('.selectedId').change(function() {
            var rowElement = $(this);
            var show_flag = rowElement.val();
            var post_id = rowElement.data('post');
            if (rowElement.is(':checked')) {
                show_flag = 1;
            }
            else{
                show_flag = 0;
            }
            $.ajax({
                url: "{{URL::asset('admin/comment/upstatus/')}}",
                type: 'POST',
                data: {
                    id: post_id,
                    status: show_flag,
                },success:function (data) {
                    console.log(data);
                }
            });
        });
        var rowElement =0;
        var post_id =0;
        $(document).ready(function () {
            var modalConfirm = function(callback){
                $(".drop-data").on("click", function(){
                    rowElement = $(this);
                    post_id = rowElement.data('post');
                    $("#mi-modal").modal('show');
                });

                $("#modal-btn-si").on("click", function(){
                    callback(true);
                    $("#mi-modal").modal('hide');
                });

                $("#modal-btn-no").on("click", function(){
                    callback(false);
                    $("#mi-modal").modal('hide');
                });
            };

            modalConfirm(function(confirm){
                if(confirm){
                    $.ajax({
                        url: "{{URL::asset('admin/comment/trash/')}}",
                        type: 'POST',
                        data: {
                            post_id:post_id,
                        },success:function (data) {
                            window.location.reload();
                            console.log(data);
                        }
                    });
                }else{
                    return false;
                }
            });
        });
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
