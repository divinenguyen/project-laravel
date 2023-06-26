@extends('layouts.default')
<title>Divine Nguyen - {{$index->title}}</title>
<meta name="description" content="{{$index->descriptions}}">
<meta name="keywords" content="{{$index->keyword}}">
<meta name="author" content="{{$index->users->fullname}}">
@section('content')
    <section class="content detail-page">
        <section class="wrapper-detail">
            <section class="container">
                <section class="detail-cards">
                    <section class="wrapper-detail row">
                        <section class="panel-default col-md-9 col-sm-8 col-12">
                            <section class="card post-card post-2">
                                <section class="card-header">
                                    <h1 class="card-title">{{$index->title}}</h1>
                                <section class="card-footer-left">
                                    <span class="card-author">Tác giả: {{$index->users->fullname}}</span>
                                    <span class="card-date"><i class="far fa-clock"></i> {{\Carbon\Carbon::parse($index->created_at)->format('d/m/Y')}}</span>
                                </section>
                                </section>
                                <section class="card-body card-content">
                                    <div class="content">
                                       <?php echo $index->content ?>
                                    </div>
                                </section>
                                <section class="card-footer">
                                    @if (Auth::guest())
                                        <div class="fb-comments" data-href="https://developers.facebook.com/docs/plugins/comments#configurator" data-width="100%" data-numposts="5"></div>
                                    @else
                                        <div class="comments">
                                            <ul>
                                                <li>
                                                   <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab accusamus animi, architecto aut consectetur corporis deleniti dolorum eaque hic ipsa modi mollitia optio praesentium quidem, quis quisquam reiciendis sed soluta.</p>
                                                </li>
                                            </ul>

                                        </div>
                                    @endif
                                </section>
                            </section>
                        </section>
                        <aside id="widget-wrapp" class="panel-default col-md-3 col-sm-4 col-12">

                        </aside>
                    </div>
                </section>
            </section>
        </section>
    </section>
@endsection
