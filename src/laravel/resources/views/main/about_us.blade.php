@extends('layouts.main_layout')

@section('title', 'つくりえとは？')

@section('add_css')
<link rel="stylesheet" href="{{ asset('css/about_us.css') }}">
@endsection

{{-- ページ名 --}}
@section('page_name')
<h2 class="letter-title ">つくりえとは？</h2>
@endsection


{{-- メインコンテンツ --}}
@section('main_contents')
<div class="about-us-container">
    <h2>クリエイターの作業環境を検索・共有できます</h2>
    <div class="about-us-col">
        <p>活動中のクリエイターは自身の作業机を撮影し、共有することができます。<br>
            また、共有された他のクリエイターの作業環境を見て、参考にすることができます。<br>
            実際に使用されている機材、ソフトも見ることができます。
        </p>
        <img class="about-us-image" src="{{ asset('images/about_us/desktop.png') }}" >
    </div>

    <h2>これから趣味でクリエイター活動を始めたい人へ</h2>
    <h3>どんな機材、ソフトがいいのか分からない！</h3>
    <div class="about-us-col">
        <p>クリエイター活動を始めるには、多くの機材が必要となります。<br>
            多くの製品の中で、どれを購入すれば良いのか分からず挫折してしまいそうになることがあるでしょう。
        </p>
    </div>

    <h3>プロクリエイターの作業環境が高額で参考にならない！</h3>
    <div class="about-us-col">
    <p>他のクリエイターがどんな機材を使用しているのかwebで検索したり、雑誌で作業環境写真を探したりすることがあると思います。<br>
        しかし、見つかるものの多くはプロとして活動しているクリエイターが、数十、数百万円かけた作業環境です。<br>
        趣味で始める新人クリエイターの参考にはならないことも多いでしょう。
    </p>
        <img class="about-us-image" src="{{ asset('images/about_us/worry.png') }}" >
    </div>

    <h2>そんな時は・・・</h2>
    <div class="about-us-col">
        <p>そんな時は、つくりえです。つくりえでは趣味・アマチュアとして活動しているクリエイターの作業環境が多く共有されています。<br>
            共有された作業環境を参考にしてください。きっと助けになれると思います。
        </p>
        <img class="about-us-image" src="{{ asset('images/about_us/iphone.png') }}" >
    </div>

    <h2>既に活動を続けている人へ</h2>
    <div class="about-us-col">
        <p>皆さんの作業環境を共有し、これからクリエイターとして活動しようとする人に参考にしてもらいましょう。<br>
            そして新たなクリエイターの挫折を防ぎ、クリエイター人口を増やし業界を盛り上げましょう！
        </p>
        <img class="about-us-image" src="{{ asset('images/about_us/audience.png') }}" >
    </div>

    <h2>今後追加予定の機能</h2>
    <div class="about-us-col">
        <p>
            少しずつ以下のような機能を追加していく予定です。<br>
            ・いいね機能・・・参考になった！と思ったクリエイターの作業環境にいいねできます。<br>
            ・機材ランキング・・・クリエイターの登録機材を集計し、カテゴリごとに使用数ランキングを表示します。<br>
            ・その他・・・こんな機能が欲しい！ということがあれば、ページ右上（スマホでは下部）の「お問い合せ」からご意見を受付中です！
        </p>
    </div>

</div>



<div class="posted-back-to-top">
    <a class="letter-title" href="{{ asset('/') }}">トップへ戻る</a>
</div>
@endsection

