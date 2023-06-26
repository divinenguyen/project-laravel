<header class="site-header">
    <section class="container">
        <section class="row">
            <section class="col-md-8">
                <nav id='cssmenu'>
                    <section class="logo"><a href="{{asset('')}}">  <span class="line2" data-splitting>Divine Nguyen</span></a></section>
                    <section id="head-mobile"></section>
                    <div class="button"></div>
                    <ul>
                        @foreach($menus as $menu)
                            <li><a href="{{asset(''.$menu->url)}}">{{ $menu->name }}</a>
                                @if($menu->sub_menu->count() > 0)
                                    <ul>
                                        @foreach($menu->sub_menu as $sub)
                                            <li><a href="{{asset(''.$sub->url)}}">{{$sub->name }}</a></li>
                                        @endforeach
                                    </ul>
                                @endif
                            </li>
                        @endforeach
                    </ul>
                </nav>
            </section>
            <section class="col-md-4">
                <section class="search">
                <form method="GET" action="{{asset('search')}}" class="form-inline d-flex justify-content-center">
                        <input class="form-control" name="txtresult" type="text" placeholder="Search"
                               aria-label="Search">
                        <button type="submit" class="btn btn-search">
                            <i class="fas fa-search" aria-hidden="true"></i>
                        </button>
                    </form>
                </section>
            </section>
        </section>
    </section>
</header>
