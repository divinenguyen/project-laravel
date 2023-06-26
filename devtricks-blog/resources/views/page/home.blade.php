@extends('layouts.default')
@section('content')
<section class="content home-page">
    <!--- First section -->
    <section class="first-news-home">
        <section class="container">
            <div class="heading">
                <h2> <span> Tin mới </span></h2>
            </div>
            <section class="panel home-cards">
                @foreach($top_new as $item)
                    <section class="cards row">
                        <section class="card-header col-lg-5 col-md-5 col-sm-6 col-12">
                            <a href="{{asset('detail/'.$item->id.'/'.$item->slug)}}.html" title="{{$item->title}}">
                                <img class="card-img-top" src="{{asset('upload/'.$item->images)}}" alt="{{$item->title}}">
                            </a>
                        </section>
                        <section class="card-body  col-lg-7 col-md-7 col-sm-6 col-12">
                            <a href="{{asset('detail/'.$item->id.'/'.$item->slug)}}.html" title="{{$item->title}}">
                                <h4 class="card-title">  {{$item->title}} </h4>
                            </a>
                            <p class="card-text">{{$item->summary}}</p>
                            <a href="{{asset('detail/'.$item->id.'/'.$item->slug)}}.html" class="card-link">Xem thêm</a>
                            <section class="card-footer card-footer-home">
                                <section class="card-footer-left">
                                    <span class="card-author">Tác giả: {{$item->users->fullname}}</span>
                                    <span class="card-date"><i class="far fa-clock"></i> {{ \Carbon\Carbon::parse($item->created_at)->format('d/m/Y')}}</span>
                                </section>
                                <section class="card-footer-right">
                                    <span class="card-view"><i class="far fa-eye"></i> {{$item->views}}</span>
                                </section>
                            </section>
                        </section>
                    </section>
                @endforeach
            </section>
        </section>
    </section>
    <!--- End first section -->
    <!--- Second section -->
    <section class="second-news-home">
        <section class="container">
            <div class="heading">
                <h2>  <span> {{$data[0]->categories->name}} </span></h2>
            </div>
            <section class="row">
                @foreach($data as $item)
                    <section class="col-md-4 col-sm-6 col-12 padding-first">
                        <section class="card card-secound">
                            <section class="card-header">
                                <img class="card-img-top" src="{{asset('upload/'.$item->images)}}" alt="{{$item->title}}">
                            </section>
                            <section class="card-body">
                                <a href="{{asset('detail/'.$item->id.'/'.$item->slug)}}">
                                    <h4 class="card-title">
                                        {{$item->title}}
                                    </h4>
                                </a>
                                <p class="card-text">{{$item->summary}}</p>
                                <a href="{{asset('detail/'.$item->id.'/'.$item->slug)}}.html" class="card-link">Xem thêm</a>
                                <a href="{{asset('category/'.$item->category_id.'/'.$item->categories->slug)}}.html" class="card-link btn btn-brand-link">{{$item->categories->name}}</a>
                            </section>
                            <section class="card-footer card-footer-home">
                                <section class="card-footer-left">
                                    <span class="card-author">Tác giả: {{$item->users->fullname}}</span>
                                    <span class="card-date"><i class="far fa-clock"></i> {{ \Carbon\Carbon::parse($item->created_at)->format('d/m/Y')}}</span>
                                </section>
                                <section class="card-footer-right">
                                    <span class="card-view"><i class="far fa-eye"></i> {{$item->views}}</span>
                                </section>
                            </section>
                        </section>
                    </section>
                @endforeach
            </section>
        </section>
    </section>
    <!--- End second section -->
    <!--- Third section -->
    <section class="third-news-home">
        <section class="container">

            <div class="heading">
                <h2>  <span>  Tin khác </span></h2>
            </div>
            <section class="row">
                @foreach($category as $item)
                    <section class="col-md-4 col-sm-6 col-12 padding-first">
                        <section class="card card-secound">
                            <section class="card-header">
                                <img class="card-img-top" src="{{asset('upload/'.$item->images)}}" alt="{{$item->title}}">
                            </section>
                            <section class="card-body">
                                <a href="{{asset('detail/'.$item->id.'/'.$item->slug)}}.html">
                                    <h4 class="card-title">
                                        {{$item->title}}
                                    </h4>
                                </a>
                                <p class="card-text">{{$item->summary}}</p>
                                <a href="{{asset('detail/'.$item->id.'/'.$item->slug)}}.html" class="card-link">Xem thêm</a>
                                <a href="{{asset('category/'.$item->category_id.'/'.$item->categories->slug)}}.html" class="card-link btn btn-brand-link">{{$item->categories->name}}</a>
                            </section>
                            <section class="card-footer card-footer-home">
                                <section class="card-footer-left">
                                    <span class="card-author">Tác giả: {{$item->users->fullname}}</span>
                                    <span class="card-date"><i class="far fa-clock"></i> {{ \Carbon\Carbon::parse($item->created_at)->format('d/m/Y')}}</span>
                                </section>
                                <section class="card-footer-right">
                                    <span class="card-view"><i class="far fa-eye"></i> {{$item->views}}</span>
                                </section>
                            </section>
                        </section>
                    </section>
                @endforeach
            </section>
            <section class="paginations">
                {{$category->links()}}
            </section>
        </section>
    </section>

    <!--- End third section -->
</section>
@endsection
