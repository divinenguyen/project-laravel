<div class="dashboard-header">
    <nav class="navbar navbar-expand-lg bg-white fixed-top">
        <a class="navbar-brand" href="">DIVINE</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse " id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto navbar-right-top">
                <li class="nav-item wrapper-profile">
                    <div class="profile-admin">
                        <div class="avatar-admin">
                            <img src="public/backend/images/images.jpg" alt="">
                        </div>
                        <div class="info-admin">
                            @if(Auth::check())
                               <h5>{{Auth::user()->fullname}}</h5>
                             @endif
                        </div>
                    </div>
                </li>
                <li class="nav-item logout">
                    <a href="{{URL::asset('account/logout')}}"><i class="fas fa-sign-out-alt"></i></a>
                </li>
            </ul>
        </div>
    </nav>
</div>
