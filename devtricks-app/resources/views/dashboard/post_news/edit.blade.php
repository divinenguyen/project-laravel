@extends('layouts.dashboard')
@section('end_head')
  <style>
    .form-submit{
      margin-top: 20px;
    }
    #accordion .card-link {
      display: block;
    }
    .collapse .card-body{
      width: 100%;
      height: 200px;
    }
    .collapse .card-body .checkbox-dropdown-list {
      padding: 4px 4px 0 12px;
      list-style: none;
      border: solid 1px #ddd;
      overflow-y: scroll;
      height: 100%;
    }

   .collapse .card-body .checkbox-dropdown-list li input {
      margin-right: 8px;
    }

  </style>
@endsection
@section('dashboard-content')
  <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
    <div class="page-header">
      <h2 class="pageheader-title">Sửa bài viết</h2>
    </div>
    <div class="card">
      <div class="card-body">
        <div class="tab-outline">
          <ul class="nav nav-tabs" id="myTab2" role="tablist">
            <li class="nav-item">
              <a class="nav-link active show" id="tab-outline-one" data-toggle="tab" href="#outline-one" role="tab" aria-controls="home" aria-selected="true">Bài viết</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="tab-outline-two" data-toggle="tab" href="#outline-two" role="tab" aria-controls="profile" aria-selected="false">seo</a>
            </li>
          </ul>
          <form action="{{asset('dashboard/post-news/update/'.$index->id)}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="tab-content" id="myTabContent2">
              <div class="tab-pane fade active show" id="outline-one" role="tabpanel" aria-labelledby="tab-outline-one">
                <div class="row">
                  <div class="col-xl-8 col-lg-8 col-md-8 col-sm-8 col-8">
                    <div class="form-group">
                      <label for="name" class="col-form-label">Tiêu đề</label>
                      <input id="name" name="name" type="text" value="{{$index->name}}" class="form-control">
                      @error('name')
                      <div class="alert alert-danger">{{ $message }}</div>
                      @enderror
                    </div>
                    <div class="form-group">
                      <label for="slug" class="col-form-label">Slug</label>
                      <input id="slug" name="slug" type="text" value="{{$index->slug}}" class="form-control">
                      @error('slug')
                      <div class="alert alert-danger">{{ $message }}</div>
                      @enderror
                    </div>
                    <div class="form-group">
                      <label for="summary">Mô tả tóm tắt</label>
                      <textarea class="form-control" name="summary" id="summary" rows="4">{{$index->summary}}</textarea>
                      @error('summary')
                      <div class="alert alert-danger">{{ $message }}</div>
                      @enderror
                    </div>
                    <div class="form-group">
                      <label for="cat_image" class="col-form-label">Ảnh đại dện</label>
                      <input id="cat_image" name="post_image" type="file" class="form-control">
                      <p style="margin-top:15px"><img style="width:120px; height:80px;" src="{{asset('uploads/'.$index->image)}}" alt="{{$index->name}}"></p>
                      @error('cat_image')
                        <div class="alert alert-danger">{{ $message }}</div>
                      @enderror
                    </div>
                  </div>
                  <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
                    <div id="accordion">
                      <div class="card">
                        <div class="card-header">
                          <a class="collapsed card-link" data-toggle="collapse" href="#collapseThree">
                            Danh mục bài viết
                          </a>
                        </div>
                        <div id="collapseThree" class="collapse show" data-parent="#accordion">
                          <div class="card-body">
                            <div class="form-group category">
                              <label for="category_id">Tất cả danh mục</label>
                              <ul class="checkbox-dropdown-list">
                                @foreach( $category as $cate_item)
                                  <li>
                                      @if(in_array($cate_item->id,$cate_index)==true)
                                        <label><input type="checkbox" checked value="{{ $cate_item->id }}" name="category_id[]" />{{ $cate_item->name }}</label>
                                      @else
                                        <label><input type="checkbox" value="{{ $cate_item->id }}" name="category_id[]" />{{ $cate_item->name }}</label>
                                      @endif  
                                      @if(count($cate_item->children))
                                          @include('dashboard.post_news.category-edit',['childs' => $cate_item->children,'cate_index'=>$cate_index])
                                      @endif
                                  </li>
                                @endforeach
                              </ul>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="card">
                        <div class="card-header">
                          <a class="collapsed card-link" data-toggle="collapse" href="#collapseTwo">
                           Thẻ
                          </a>
                        </div>
                        <div id="collapseTwo" class="collapse" data-parent="#accordion">
                          <div class="card-body">
                            <ul class="checkbox-dropdown-list list-group">
                              @foreach($tags as $tag)
                                @if(in_array($tag->id,$tags_index)==true)
                                  <li>
                                    <label><input type="checkbox" checked value="{{$tag->id}}" name="tags[]" />{{$tag->name}}</label>
                                  </li>
                                @else
                                  <li>
                                      <label><input type="checkbox" value="{{$tag->id}}" name="tags[]" />{{$tag->name}}</label>
                                  </li>
                                @endif
                              @endforeach
                            </ul>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="form-group">
                      <label for="post_content">Nội dung</label>
                      <textarea class="form-control" name="post_content" id="post_content" rows="8">{{$index->content}}</textarea>
                      @error('post_content')
                      <div class="alert alert-danger">{{ $message }}</div>
                      @enderror
                    </div>
                    <div class="form-group">
                      <label class=" col-form-label m-r-4">Đặc điểm</label>
                        @if($index->is_featured ==1)
                        <div class="switch-button switch-button-yesno">
                          <input type="checkbox" checked name="is_featured" id="is_featured"><span>
                          <label for="is_featured"></label></span>
                        </div>
                        @else
                        <div class="switch-button switch-button-yesno">
                          <input type="checkbox" name="is_featured" id="is_featured"><span>
                          <label for="is_featured"></label></span>
                        </div>
                        @endif                  
                    </div>
                    <div class="form-group">
                      <label class=" col-form-label m-r-4">Hoạt động</label>
                      @if($index->is_active ==1)
                      <div class="switch-button switch-button-yesno">
                        <input type="checkbox" checked name="is_active" id="is_active"><span>
                        <label for="is_active"></label></span>
                      </div>
                      @else 
                      <div class="switch-button switch-button-yesno">
                        <input type="checkbox" name="is_active" id="is_active"><span>
                        <label for="is_active"></label></span>
                      </div>
                      @endif
                    </div>
                  </div>
                </div>  
              </div>
              <div class="tab-pane fade" id="outline-two" role="tabpanel" aria-labelledby="tab-outline-two">
                <div class="form-group">
                  <label for="post_keyword" class="col-form-label">Từ khóa</label>
                  <input id="post_keyword" name="post_keyword" type="text" value="{{$index->post_keyword}}" class="form-control">
                  @error('post_keyword')
                  <div class="alert alert-danger">{{ $message }}</div>
                  @enderror
                </div>
              </div>
            </div>
            <div class="form-group form-submit">
              <button class="btn btn-primary" type="submit">Lưu bài viết</button>
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
@section('scripts')
<script src="{{asset('/assets/ckeditor/ckeditor.js')}}"></script>
  <script>
CKEDITOR.replace( 'post_content', {
	fullPage: true,
	allowedContent: true
});

  </script>
@endsection
