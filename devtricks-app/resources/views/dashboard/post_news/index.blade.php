@extends('layouts.dashboard')
@section('end_head')
  <style>
    .manage {
      text-align: center;
      font-size: 20px;
    }
    .manage a {
      color: #C792EA;
      padding: 0 4px;
      cursor: pointer;
    }
    .manage a:hover {
      color: #5969;
    }
    .pagination {
      margin-top: 15px;
      justify-content: right;
    }
  </style>
@endsection
@section('dashboard-content')
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
  <div class="page-header">
  
    <h2 class="pageheader-title">Danh sách bài viết</h2>
    <div class="page-breadcrumb">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
        </ol>
      </nav>
      <div class="form-group form-submit">
        <a class="btn btn-success" href="{{asset('/dashboard/post-news/create')}}">Thêm bài viết</a>
      </div>
    </div>
  </div>
  <div class="card">
    <div class="card-body">
      <div class="table-responsive">
        <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper dt-bootstrap4">
          <div class="row"><div class="col-sm-12 col-md-6">
            </div>
            <div class="col-sm-12 col-md-6">
            </div>
          </div>
          <div class="row">
            <div class="col-sm-12">
              <table class="table table-striped table-bordered first dataTable" id="DataTables_Table_0" role="grid" aria-describedby="DataTables_Table_0_info">
                <thead>
                  <tr role="row">
                    <th class="sorting_asc" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 148.578px;">Tiêu đề</th>
                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 252.453px;">Ảnh đại diện</th>
                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending" style="width: 49.0781px;">Đặc điểm</th>
                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Start date: activate to sort column ascending" style="width: 100.391px;">Kích hoạt</th>
                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Start date: activate to sort column ascending" style="width: 100.391px;">Lượt xem</th>
                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Salary: activate to sort column ascending" style="width: 82.4531px;">Quản lý</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($data as $item)
                  <tr role="row" class="odd">
                    <td class="sorting_1"><a href="{{asset('dashboard/post-news/show/'.$item->id)}}">{{$item->name}}</a></td>
                    <td><p><img style="width: 120px;height: 80px; " src="{{asset('/uploads/'.$item->image)}}" alt=""></p></td>
                    <td>
                      @if($item->is_featured>0)
                        <div class="switch-button switch-button-lg is-featured">
                          <input type="checkbox" checked name="featured" id="featured-{{$item->id}}" data-featured="{{$item->id}}">
                          <span><label for="featured-{{$item->id}}"></label></span>
                        </div>
                      @else
                        <div class="switch-button switch-button-lg is-featured">
                          <input type="checkbox" name="featured" id="featured-{{$item->id}}" data-featured="{{$item->id}}"><span>
                            <label for="featured-{{$item->id}}"></label></span>
                        </div>
                      @endif
                    </td>
                    <td>
                      @if($item->is_active>0)
                        <div class="switch-button switch-button-lg is-active">
                          <input type="checkbox" checked name="switch" id="switch-{{$item->id}}" data-post="{{$item->id}}">
                          <span><label for="switch-{{$item->id}}"></label></span>
                        </div>
                      @else
                        <div class="switch-button switch-button-lg is-active">
                          <input type="checkbox" name="switch" id="switch-{{$item->id}}" data-post="{{$item->id}}"><span>
                            <label for="switch-{{$item->id}}"></label></span>
                        </div>
                      @endif
                    </td>
                    <td>{{number_format($item->view_count,0)}}</td>
                    <td><div class="manage">
                        <a href="{{asset('dashboard/post-news/edit/'.$item->id)}}"><i class="fas fa-edit"></i></a>
                        <a data-post="{{$item->id}}" class="drop-data"><i class="fas fa-trash"></i></a>
                      </div></td>
                  </tr>
                @endforeach
                </tbody>
              </table>
            </div>
          </div>
          <div class="row"><div class="col-sm-12 col-md-5">
            </div><div class="col-sm-12 col-md-7">
              <div class="dataTables_paginate paging_simple_numbers" id="DataTables_Table_0_paginate">
                <div class="pagination">
                  {{$data->links()}}
                </div>
              </div>
            </div>
          </div>
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
    $('.is-active input').change(function() {
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
        url: "{{asset('/dashboard/post-category/status/')}}",
        type: 'POST',
        data: {
          id: post_id,
          status: show_flag,
        },success:function (data) {
          console.log(data);
        }
      });
    });
    $('.is-featured input').change(function() {
      var element = $(this);
      var is_featured = element.val();
      var post_id = element.data('featured');
      if (element.is(':checked')) {
        is_featured = 1;
      }
      else{
        is_featured = 0;
      }
      $.ajax({
        url: "{{asset('/dashboard/post-news/featured/')}}",
        type: 'POST',
        data: {
          id: post_id,
          is_featured: is_featured,
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
            url: "{{asset('/dashboard/post-news/delete/')}}",
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
  </script>
@endsection
