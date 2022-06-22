@component('mail::message')

    # 昨日は{{ $count }}件のTweetが追加されました。


    {{ $toUser->name }}さんこんにちは！

    昨日は{{ $count }}件のTweetが追加されました！最新のTweetを見に行きましょう。

    @component('mail::button',['url' => route('tweet.index')])
        Tweetを見に行く

    @endcomponent

@endcomponent
