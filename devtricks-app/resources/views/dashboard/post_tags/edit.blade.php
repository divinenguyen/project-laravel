@extends('layouts.dashboard')
@section('end_head')
  <style>

    .form-submit{
      margin-top: 20px;
    }
  </style>
@endsection
@section('dashboard-content')
  <div class="col-xl-10 col-lg-10 col-md-10">
    <div class="page-header">
      <h2 class="pageheader-title">Sửa thẻ</h2>
    </div>
    <div class="card">
      <div class="card-body">
        <div class="tab-outline">
          <ul class="nav nav-tabs" id="myTab2" role="tablist">
            <li class="nav-item">
              <a class="nav-link active show" id="tab-outline-one" data-toggle="tab" href="#outline-one" role="tab" aria-controls="home" aria-selected="true">Thẻ</a>
            </li>
          </ul>
          <form action="{{asset('dashboard/post-tags/update/'.$index->id)}}" method="post">
            @csrf
            <div class="tab-content" id="myTabContent2">
              <div class="tab-pane fade active show" id="outline-one" role="tabpanel" aria-labelledby="tab-outline-one">
                <div class="form-group">
                  <label for="name" class="col-form-label">Tên thẻ</label>
                  <input id="name" name="name" type="text" value="{{$index->name}}" class="form-control">
                  @error('name')
                  <div class="alert alert-danger">{{ $message }}</div>
                  @enderror
                </div>
              </div>
              <div class="form-group form-submit">
                <button class="btn btn-primary" type="submit">Lưu thẻ</button>
              </div>
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
