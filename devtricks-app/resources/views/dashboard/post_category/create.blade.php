@extends('layouts.dashboard')
@section('end_head')
  <style>

    .form-submit{
      margin-top: 20px;
    }
  </style>
@endsection
@section('dashboard-content')
  <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
    <div class="page-header">
      <h2 class="pageheader-title">Thêm danh mục </h2>
    </div>
    <div class="card">
      <div class="card-body">
        <div class="tab-outline">
          <ul class="nav nav-tabs" id="myTab2" role="tablist">
            <li class="nav-item">
              <a class="nav-link active show" id="tab-outline-one" data-toggle="tab" href="#outline-one" role="tab" aria-controls="home" aria-selected="true">Danh mục</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="tab-outline-two" data-toggle="tab" href="#outline-two" role="tab" aria-controls="profile" aria-selected="false">seo</a>
            </li>
          </ul>
          <form action="{{route('cat_add')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="tab-content" id="myTabContent2">
              <div class="tab-pane fade active show" id="outline-one" role="tabpanel" aria-labelledby="tab-outline-one">
                <div class="form-group">
                  <label for="name" class="col-form-label">Tên danh mục</label>
                  <input id="name" name="name" type="text" class="form-control">
                  @error('name')
                  <div class="alert alert-danger">{{ $message }}</div>
                  @enderror
                </div>
                <div class="form-group">
                  <label for="parrent_id">Cấp danh mục</label>
                  <select class="form-control"  id="cat_parent" name="cat_parent">
                    <option value="0">Chọn danh mục</option>
                    @foreach($data as $categories)
                      <option value="{{ $categories->id }}">{{ $categories->name }}</option>
                    @endforeach
                  </select>
                </div>
                <div class="form-group">
                  <label for="cat_image" class="col-form-label">Ảnh đại dện</label>
                  <input id="cat_image" name="cat_image" type="file" class="form-control">
                  @error('cat_image')
                  <div class="alert alert-danger">{{ $message }}</div>
                  @enderror
                </div>
                <div class="form-group">
                  <label for="cat_ordering" class="col-form-label">Số thứ tự</label>
                  <input id="cat_ordering" name="cat_ordering" type="text" class="form-control">
                  @error('cat_ordering')
                  <div class="alert alert-danger">{{ $message }}</div>
                  @enderror
                </div>
                <div class="form-group">
                  <label class=" col-form-label m-r-4">Hoạt động</label>
                    <div class="switch-button switch-button-yesno">
                      <input type="checkbox" name="is_active" id="is_active"><span>
                        <label for="is_active"></label></span>
                    </div>
                </div>
              </div>
              <div class="tab-pane fade" id="outline-two" role="tabpanel" aria-labelledby="tab-outline-two">
                <div class="form-group">
                  <label for="cat_keyword" class="col-form-label">Từ khóa</label>
                  <input id="cat_keyword" name="cat_keyword" type="text" class="form-control">
                  @error('cat_keyword')
                  <div class="alert alert-danger">{{ $message }}</div>
                  @enderror
                </div>
                <div class="form-group">
                  <label for="cat_description">Mô tả</label>
                  <textarea class="form-control" name="cat_description" id="cat_description" rows="4"></textarea>
                  @error('cat_description')
                  <div class="alert alert-danger">{{ $message }}</div>
                  @enderror
                </div>
              </div>
            </div>
            <div class="form-group form-submit">
              <button class="btn btn-primary" type="submit">Lưu danh mục</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  @if (session('error'))
    <div class="alert alert-danger text-center">{{ session('error') }}</div>
  @endif
@endsection
@section('script')
  <script>


  </script>
@endsection
