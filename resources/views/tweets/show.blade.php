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
        <div class="mb-4 text-right">
            <a class="btn btn-primary" href="{{ route('tweets.edit', ['tweet' => $tweet]) }}">
                編集
            </a>
            <form
                style="display: inline-block;"
                method="POST"
                action="{{ route('tweets.destroy', ['tweet' => $tweet]) }}"
            >
                @csrf
                @method('DELETE')
                <button class="btn btn-danger">削除</button>
            </form>
        </div>
        <form class="mb-4" method="POST" action="{{ route('comments.store') }}">
            @csrf
            <input
                name="tweet_id"
                type="hidden"
                value="{{ $tweet->id }}"
            >
            <div class="form-group">
                <label for="body">
                    このツイートへのコメント
                </label>
                <textarea
                    id="body"
                    name="body"
                    class="form-control {{ $errors->has('body') ? 'is-invalid' : '' }}"
                    rows="4"
                >{{ old('body') }}</textarea>
                @if ($errors->has('body'))
                    <div class="invalid-feedback">
                        {{ $errors->first('body') }}
                    </div>
                @endif
            </div>
            <div class="mt-4">
                <button type="submit" class="btn btn-primary">
                    コメントする
                </button>
            </div>
        </form>
        <section>
            <h2 class="h5 mb-4">
                コメント一覧
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
