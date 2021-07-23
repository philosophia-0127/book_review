@extends('layouts.app')

@section('title')
    | 詳細
@endsection



@section('content')
    <div class="container mx-auto text-center">
        <h2 class='pagetitle mb-5'>レビュー詳細ページ</h2>
        <div class="card col-7 mx-auto">
            <div class="card-body d-flex">

                <section class='review-main'>
                    <h2 class='h2'>本のタイトル</h2>
                    <p class='h2 mb-5'>{{ $review->title }}</p>
                    <h2 class='h2'>レビュー本文</h2>
                    <p>{{ $review->body }}</p>
                </section>

                <aside class='review-image'>
                    @if(!empty($review->image))
                        <img class='book-image' src="{{ asset('storage/images/'.$review->image) }}">
                    @else
                        <img class='book-image' src="{{ asset('images/no_image.jpg') }}">
                    @endif
                </aside>

            </div>
            <a href="{{ route('review.index') }}" class='btn btn-info mb-4'>一覧へ戻る</a>
        </div>
    </div>
@endsection
