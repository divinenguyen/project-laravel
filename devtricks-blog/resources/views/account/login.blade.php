@extends('layouts.account')
@section('content')
    <div class="wrapper-signup">
        <form class="form-data" action="{{asset("account/login")}}" method="post">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        @if(session('message'))
            <div class="alert alert-danger" role="alert">
                {{session('message')}}
            </div>
        @endif
            @csrf
        </form>
    </div>
@endsection
