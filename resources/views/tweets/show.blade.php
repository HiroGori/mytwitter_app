@extends('layout')

@section('content')
    <div class="container mt-4">
        <div class="card mb-4">
            <div class="card-header">
                {{ $tweet->user->user_name }}
            </div>
            <div class="card-body">
                <p class="card-text">
                    {!! nl2br(e($tweet->body)) !!}
                </p>
            </div>
            <div class="card-footer">
                <span class="mr-2">
                    投稿日時 {{ $tweet->created_at->format('Y.m.d') }}
                </span>
            </div>
        </div>
        <section>
            <h2 class="h5 mb-4">
                コメント
            </h2>
            @forelse($tweet->comments as $comment)
                <div class="border-top p-4">
                    <time class="text-secondary">
                        {{ $comment->created_at->format('Y.m.d H:i') }}
                    </time>
                    <p class="mt-2">
                            {!! nl2br(e($comment->body)) !!}
                    </p>
                </div>
                @empty
                    <p>コメントはまだありません。</p>
            @endforelse
        </section>
    </div>
@endsection
