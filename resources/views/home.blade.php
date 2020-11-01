@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        @if(!count($posts))
            <h4>Empty...</h4>
        @else
            @foreach($posts as $post)
                <a href="{!! route('posts.show', ['slug' => $post->slug]) !!}" class="col-md-8 mb-5">
                    <div class="card">
                        <div class="card-body">
                            <div class="h5 card-title d-flex">
                                <p style="word-break: break-all">{{ $post->title }}</p>
                            </div>
                            <div class="card-subtitle  mb-2">
                                <h6 class="text-muted">Category: {{ $post->category ? $post->category->name : "Uncategorized"}}</h6>
                            </div>
                            <p class="mb-0 text-muted text-right">{{ $post->updated_at }}</p>
                        </div>
                    </div>
                </a>
            @endforeach
        @endif
    </div>
</div>
@endsection
