<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Tweet</title>
  {{-- <link rel="stylesheet" href="/css/app.css"> --}}
  <link href="{{ mix('/css/app.css') }}" rel="stylesheet">
  <script src="{{ mix('/js/app.js') }}"></script>

</head>
<body>
  <h1>Tweet-Test</h1>
  {{-- @authでloginしていない時は投稿formは非表示 --}}
  @auth
  <div>
    <p>投稿フォーム</p>
    @if (session('feedback.success'))
      <p style="color: green">{{ session('feedback.success') }}</p>
    @endif

    <form action="{{ route('tweet.create') }}" method="post">
      @csrf
      <label for="tweet-content">Tweetは</label>
      <span>140文字まで</span>
      <textarea name="tweet" id="tweet-content" type="text" placeholder=""入力"></textarea>
      {{-- validation errorを出す --}}
      @error('tweet')
          <p style="color: red;">{{ $message }}</p>
      @enderror
      {{--  --}}
      <button type="submit">>投稿</button>
    </form>
  </div>
  @endauth
  <div>
    @foreach($tweets as $tweet)
        <details>
            <summary>{{ $tweet->content }} by {{ $tweet->user->name }}</summary>
            @if (\Illuminate\Support\Facades\Auth::id() === $tweet->user_id)
            <div>
                <a href="{{ route('tweet.update.index', ['tweetId' => $tweet->id]) }}">編集</a>
                <form action="{{ route('tweet.delete', ['tweetId' => $tweet->id]) }}" method="post">
                @method('DELETE')
                @csrf
                <button type="submit">削除</button>
                </form>
            </div>
            @else
            編集できません
            {{-- <p style="color: red">編集できません</p> --}}
            @endif
        </details>
    @endforeach
    </div>
  
</body>
</html>
