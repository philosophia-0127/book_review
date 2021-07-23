@extends('layouts.app')

@section('title')
    | 一覧
@endsection



@section('content')
<div class="container">

    <div class="row justify-content-center">
        @foreach($reviews as $review)
            <div class="col-md-4">
                <div class="card mb-3">
                    <div class="card-body">
                        @if(!empty($review->image))
                            <div class='image-wrapper'>
                                <img class='book-image' src="{{ asset('storage/images/'.$review->image) }}">
                            </div>
                        @else
                            <div class='image-wrapper'>
                                <img class='book-image' src="{{ asset('images/no_image.jpg') }}">
                            </div>
                        @endif

                        <h3 class='h3 book-title'>{{ $review->title }}</h3>

                        <p class='description'>
                            {{ $review->body }}
                        </p>
                        <a href="{{ route('review.show', ['id' => $review->id]) }}" class='btn btn-secondary detail-btn'>詳細を読む</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <div class="row justify-content-center">
        <div class="mx-auto col-md-2">
            {{ $reviews->links() }}
        </div>
    </div>



</div>
@endsection
