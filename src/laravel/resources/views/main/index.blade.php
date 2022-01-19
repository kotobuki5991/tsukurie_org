<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>つくりえ</title>
    <link rel="stylesheet" href="css/layout.css">
</head>
<body>
    <header>
        <div class="header-img">
            <img src="images/icon.jpg" alt="">
        </div>
        {{-- <div class="header-a">
            <a class="letter">ログイン</a>
            <p> | </p>
            <a class="letter">ユーザー登録</a>
            <p> | </p>
            <a class="letter">お問い合わせ</a>
        </div> --}}
        @if (Route::has('login'))
                <div class="header-a hidden fixed top-0 right-0 px-6 py-4 sm:block">
                    <ul class="nav">
                        @auth
                        <li><a href="{{ url('/dashboard') }}" class="letter text-sm text-gray-700 dark:text-gray-500 underline">Dashboard</a></li>
                        @else
                        <li><a href="{{ route('login') }}" class="letter text-sm text-gray-700 dark:text-gray-500 underline">ログイン</a></li>

                            @if (Route::has('register'))
                            <li><a href="{{ route('register') }}" class="letter ml-4 text-sm text-gray-700 dark:text-gray-500 underline">ユーザー登録</a></li>
                            @endif
                        @endauth
                        <li><a href="https://www.google.com" class="letter underline">お問合せ</a></li>
                        <li><a href="https://www.google.com" class="letter underline">つくりえとは？</a></li>
                    </ul>

                    <div id="hamburger">
                        <span></span>
                    </div>
                </div>
            @endif
    </header>
    <div class="content">
        <section class="top">
            <div class="top-image">
                <img class="top-image-pc" src="images/top_img.jpg" alt="">
            </div>
            <div class="top-p">
                <p class="head letter">クリエイターの<br>つくえを共有しよう<p>
            </div>
        </section>
        <div class="search-box-bg">
            <div class="search-box">
                <form>
                    @csrf
                    <input class="search-text-box" type="text">
                    <select class="search-select-box" name="example">
                        <option hidden>カテゴリ</option>
                        <option value="music">音楽</option>
                        <option value="movie">動画</option>
                        <option value="illustration">イラスト</option>
                        </select>
                    <input class="search-select-submit" type="submit" value="検索">
                </form>
            </div>
        </div>

        <div class="show-cards-wrapper">
            <h1 class="letter">検索結果</h1>

            <div class="show-cards-area">
                <div class="dask-card">
                    <div></div>
                </div>
                <div class="dask-card">
                    <div></div>
                </div>
                <div class="dask-card">
                    <div></div>
                </div>
                <div class="dask-card">
                    <div></div>
                </div>
            </div>
        </div>
    </div>






</body>
</html>
