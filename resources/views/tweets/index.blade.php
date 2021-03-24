@extends('layout')

@section('content')
    <div class="container mt-4">
        @foreach ($tweets as $tweet)
            <div class="card mb-4">
                <div class="card-header">
                    {{ $tweet->user->user_name }}
                </div>
                <div class="card-body">
                    <p class="card-text">
                        {!! nl2br(e(Str::limit($tweet->body, 145))) !!}
                    </p>
                </div>
                <div class="card-footer">
                    <span class="mr-2">
                        投稿日時 {{ $tweet->created_at->format('Y.m.d') }}
                    </span>
                    @if ($tweet->comments->count())
                        <span class="badge badge-primary">
                            コメント {{ $tweet->comments->count() }}件
                        </span>
                    @endif
                </div>
            </div>
        @endforeach
    </div>
@endsection
