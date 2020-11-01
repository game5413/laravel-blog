@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <p class="h3">{{ $post->title }}</p>
        <div class="card w-100">
            <div class="card-body">
                {{ $post->body }}
                <p class="mb-0 pt-5 text-muted h6">At {{ $post->updated_at }} by <span>{{ $post->user->name }}</span>
                </p>
            </div>
        </div>
    </div>
</div>
<div class="container px-0 pt-5">
    <div class='pb-3'>
        <p class="h4 text-left">{{ count($post->comments) }} Comments:</p>
        @if(count($post->comments))
            @foreach($post->comments as $comment)
                    <div class="media pb-3">
                        <img src="{{ asset('img/no-account.jpeg') }}" width="64" height="64" class="mr-3" alt="user_profile_picture">
                        <div class="media-body">
                            <h5 class="mt-0">
                            {{
                                ($comment->is_anonymous AND $comment->user_id != $post->user_id)
                                ? "Anonymous"
                                : $comment->user->name.($comment->user_id == $post->user_id ? " (author)" : "")
                            }}
                            </h5>
                            {{ $comment->body }}
                        </div>
                    </div>
            @endforeach
        @endif
    </div>
    @auth
        <div class="card" style="width: 35%">
            <form method="POST" action="{{ route('comments.store') }}">
                <div class="card-body">
                    {{ csrf_field() }}
                    <input type="hidden" name="post_id" value="{{ $post->id }}">
                    <textarea name="body" class="form-control"></textarea>
                    @if(auth()->user()->id != $post->user_id)
                        <div class="form-group form-check">
                            <input type="checkbox" class="form-check-input" name="is_anonymous" id="exampleCheck1">
                            <label class="form-check-label" for="exampleCheck1">Comment as Anonymous</label>
                        </div>
                    @endif
                </div>
                <div class="card-footer">
                    <button class="btn btn-primary">Publish</button>
                </div>
            </form>
        </div>    
    @endauth
</div>
@endsection
