@extends('layouts.app')

@section('title')

@endsection



@section('content')

<div class="container">

    <div class="row">
        <div class="mx-auto col-11 text-center my-5">
            <h1>welcome to
            <i class="fas fa-book"></i>
            <strong>Bookers</strong>!!
            </h1>
            <p>In
            <i class="fas fa-book"></i>
            <strong>Bookers,</strong>
            </p>
            <p>you can share and exchange  your opinions , inpressions , and emotions</p>
            <p> about various books!</p>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="mx-auto text-center my-4">
            <a href="{{ route('review.create') }}" class="h4 col-6 text-primary text-decoration-none">レビューを書く</a>
            <a href="{{ route('review.index') }}" class="h4 col-6 text-success text-decoration-none">レビューを見る</a>
        </div>
    </div>

</div>

@endsection
