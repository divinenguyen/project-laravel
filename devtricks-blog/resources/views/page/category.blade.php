@extends('layouts.default')

@section('meta')
 <title>Divine Nguyen - {{$data[0]->categories->name}}</title>
 <meta name="description" content="{{$data[0]->categories->description}}">
 <meta name="keywords" content="{{$data[0]->categories->keyword}}">
 <meta name="author" content="{{$data[0]->users->fullname}}">
@endsection
@section('content')
    <section class="content category-page">
        <section class="first-news-category">
            <section class="container">
                <div class="heading">
                    <h2>  <span>  {{$data[0]->categories->name}} </span></h2>
                </div>
                <section id="content" class="category-cards">
                    @foreach($data as $item)
                    <section class="cards row">
                        <section class="card-header col-lg-5 col-md-5 col-sm-6 col-12">
                            <a href="{{asset('detail/'.$item->id.'/'.$item->slug)}}.html" title="{{$item->title}}">
                                <img class="card-img-top" src="{{asset('public/upload/'.$item->images)}}" alt="{{$item->title}}">
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
                <section class="paginations">
                   {{$data->links()}}
                </section>
            </section>
        </section>
    </section>
@endsection
