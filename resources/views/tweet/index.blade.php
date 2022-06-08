<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Tweet</title>
</head>
<body>
  <h1>Tweet-Test</h1>
  <div>
    <p>投稿フォーム</p>
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
  <div>
    @foreach($tweets as $tweet)
        <details>
            <summary>{{ $tweet->content }}</summary>
            <div>
                <a href="{{ route('tweet.update.index', ['tweetId' => $tweet->id]) }}">編集</a>
            </div>
        </details>
    @endforeach
    </div>
</body>
</html>