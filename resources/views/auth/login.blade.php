@extends('layout')

@section('content')
    <div class="container text-xs-center">
        <br>
        <div class="jumbotron">
            <h1 class="display-3">Laracon Bingo</h1>
            <p class="lead">Brought to you by</p>
            <a href="https://laravelcollective.org" target="_blank">
                <img src="/img/full-logo.png" alt="Laravel Collective" class="img-fluid" style="max-height: 75px; margin: 0 auto;">
            </a>

            <br>

            <p>and community contributors <a href="https://github.com/elliottlawson" target="_blank">elliottlawson</a> and <a href="https://github.com/mattdfloyd" target="_blank">mattdfloyd</a>. Thanks for your help!</p>

            <hr class="m-y-2">

            <a href="/auth/redirect?provider=github" class="btn btn-secondary">
                <i class="fa fa-github"></i>
                Get Started with Github
            </a>
            <a href="/auth/redirect?provider=facebook" class="btn btn-primary">
                <i class="fa fa-facebook"></i>
                Get Started with Facebook
            </a>
        </div>

        <p class="text-muted">Proudly sponsored by</p>

        <div class="row">
            <div class="col-xs">&nbsp;</div>
            <div class="col-xs">
                <a href="https://laracasts.com" target="_blank">
                    <img src="/img/laracasts.png" alt="Laracasts">
                </a>
            </div>
            <div class="col-xs">
                <a href="https://spark.laravel.com" target="_blank">
                    <img src="/img/spark.png" alt="Laravel Spark">
                </a>
            </div>
            <div class="col-xs">&nbsp;</div>
        </div>

        <br><br><br><br><br>
        <p class="text-muted">P.S. Don't hate my lack of design skills... Next year I'll get <a href="http://jackmcdade.com/" target="_blank">Jack McDade</a> to help. :P</p>
        <p class="text-muted">I mean seriously... If I had a dollar for every <code>&lt;br&gt;</code> on this page, I'd have a whopping $7. That's like $6 too many.</p>

    </div>
@stop
