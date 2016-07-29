@extends('layout')

@section('content')
    <div id="admin"></div>
@stop

@section('scripts')
    <script>
        window.User = {!! auth()->user()->load('terms.term') !!};
    </script>
    <script src="{{ elixir('js/admin.js') }}"></script>
@stop