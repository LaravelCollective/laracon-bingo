@extends('layout')

@section('content')
    <div class="container text-xs-center">

        <h1>Dude!</h1>
        <h2>It's Laracon Bingo!</h2>

        <div>
            <a href="/auth/redirect?provider=github" class="btn btn-secondary">
                <i class="fa fa-github"></i>
                Login with Github
            </a>
            <a href="/auth/redirect?provider=facebook" class="btn btn-primary">
                <i class="fa fa-facebook"></i>
                Login with Facebook
            </a>
        </div>

    </div>
@stop
