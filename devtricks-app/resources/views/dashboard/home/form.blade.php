@extends('layouts.dashboard')
@section('dashboard-content')
  <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
    <div class="page-header">
      <h2 class="pageheader-title">form basic </h2>
    </div>
    <div class="card">
      <div class="card-body">
        <div class="tab-outline">
          <ul class="nav nav-tabs" id="myTab2" role="tablist">
            <li class="nav-item">
              <a class="nav-link active show" id="tab-outline-one" data-toggle="tab" href="#outline-one" role="tab" aria-controls="home" aria-selected="true">Tab#1</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="tab-outline-two" data-toggle="tab" href="#outline-two" role="tab" aria-controls="profile" aria-selected="false">Tab#2</a>
            </li>
          </ul>
          <form action="http://" method="post" enctype="multipart/form-data">
            <div class="tab-content" id="myTabContent2">
              <div class="tab-pane fade active show" id="outline-one" role="tabpanel" aria-labelledby="tab-outline-one">
                <div class="form-group">
                  <label for="inputText3" class="col-form-label">Input Text</label>
                  <input id="inputText3" type="text" class="form-control">
                </div>
                <div class="form-group">
                  <label for="exampleFormControlTextarea1">Example textarea</label>
                  <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                </div>
                <div class="form-group">
                  <label class=" col-form-label m-r-4">Yes/No Labels</label>
                    <div class="switch-button switch-button-yesno">
                      <input type="checkbox" checked="" name="switch19" id="switch19"><span>
                                                              <label for="switch19"></label></span>
                    </div>
                </div>
              </div>
              <div class="tab-pane fade" id="outline-two" role="tabpanel" aria-labelledby="tab-outline-two">

              </div>
            </div>
            <div class="form-group">
              <button class="btn btn-primary" type="submit">Submit form</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection
