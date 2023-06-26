@extends('admin.layouts.Layout')
@section('meta')
    <meta name="csrf-token" content="{{ csrf_token() }}" />
@endsection
@section('content')
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
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="page-header">
                <h2 class="pageheader-title">
                    Danh sách thể loại
                </h2>
            </div>
            <div class="page-header">
                @if(session('message'))
                    <div class="alert alert-success" role="alert">
                        <h2 class="pageheader-title text-success">
                            {{session('message')}}
                        </h2>
                    </div>
                @endif
                <div class="page-breadcrumb">
                    <a href="admin/menu/add" class="btn btn-success">Thêm menu</a>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <!-- ============================================================== -->
        <!-- data table multiselects  -->
        <!-- ============================================================== -->
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0"></h5>
                    <p></p>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <form method="post">
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
                                        Tên
                                    </th>
                                    <th>
                                        Đường dẫn
                                    </th>
                                    <th>
                                        Thứ tự
                                    </th>
                                    <th>
                                        Quản lý
                                    </th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($data as $item)
                                    <tr>
                                        <td>
                                            <label class="switch" for="checkbox{{$item->id}}">
                                                <input data-post="{{$item->id}}" type="checkbox" name="status" id="checkbox{{$item->id}}" @if($item->status==1) checked @else unchecked @endif class="selectedId" />
                                                <div class="slider round"></div>
                                            </label>
                                        </td>
                                        <td>{{$item->id}}</td>
                                        <td>{{$item->name}}</td>
                                        <td>{{$item->url}}</td>
                                        <td>{{$item->order}}</td>
                                        <td class="text-primary">
                                            <div class="manage">
                                                <a href="{{URL::asset('/admin/menu/update/'.$item->id)}}"><i class="fa fa-wrench" aria-hidden="true"></i></a>
                                                <a  data-post="{{$item->id}}" class="drop-data">
                                                    <i class="fas fa-trash-alt"></i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </form>
                        <div class="pagination">
                            {{$data->links()}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- end data table multiselects  -->
        <!-- ============================================================== -->
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
                url: "{{URL::asset('admin/menu/upstatus/')}}",
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
                        url: "{{URL::asset('admin/menu/trash/')}}",
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
