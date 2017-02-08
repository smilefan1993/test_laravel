@extends('layouts.app')

@section('content')
    @include('partials.error')

    <div class="col-lg-5 col-lg-offset-3">
        <h1>Test name: {{$test->name}}</h1>



    </div>

@endsection