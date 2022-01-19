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
            <a href="https://www.google.com"><img src="images/icon.jpg" alt=""></a>
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
                        <li><a href="https://www.google.com" class="letter underline">お問い合せ</a></li>
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
                    <div class="category-tag"><a href="https://www.google.com"><h4>音楽</h4></a></div>
                    <div><a href="https://www.google.com"><img class="dask-card-image" src="uploaded_images/1.jpg" alt=""></a></div>
                    <div><a href="https://www.google.com"><img class="dask-card-icon" src="user_icon/1.png" alt=""></a></div>
                    <div>
                        <div class="user-name"><h4>kotobuki</h4></div>
                        <div class="user-message letter"><h5>aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaabbbbb</h5></div>
                    </div>
                </div>
                <div class="dask-card">
                    <div class="category-tag"><a href="https://www.google.com"><h4>音楽</h4></a></div>
                    <div><a href="https://www.google.com"><img class="dask-card-image" src="uploaded_images/2.jpg" alt=""></a></div>
                    <div><a href="https://www.google.com"><img class="dask-card-icon" src="user_icon/1.png" alt=""></a></div>
                    <div>
                        <div class="user-name"><h4>kotobuki</h4></div>
                        <div class="user-message letter"><h5>aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaabbbbb</h5></div>
                    </div>
                </div>
                <div class="dask-card">
                    <div class="category-tag"><a href="https://www.google.com"><h4>音楽</h4></a></div>
                    <div><a href="https://www.google.com"><img class="dask-card-image" src="uploaded_images/1.jpg" alt=""></a></div>
                    <div><a href="https://www.google.com"><img class="dask-card-icon" src="user_icon/1.png" alt=""></a></div>
                    <div>
                        <div class="user-name"><h4>kotobuki</h4></div>
                        <div class="user-message letter"><h5>aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaabbbbb</h5></div>
                    </div>
                </div>
                <div class="dask-card">
                    <div class="category-tag"><a href="https://www.google.com"><h4>音楽</h4></a></div>
                    <div><a href="https://www.google.com"><img class="dask-card-image" src="uploaded_images/2.jpg" alt=""></a></div>
                    <div><a href="https://www.google.com"><img class="dask-card-icon" src="user_icon/1.png" alt=""></a></div>
                    <div>
                        <div class="user-name"><h4>kotobuki</h4></div>
                        <div class="user-message letter"><h5>aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaabbbbb</h5></div>
                    </div>
                </div>
                <div class="dask-card">
                    <div class="category-tag"><a href="https://www.google.com"><h4>音楽</h4></a></div>
                    <div><a href="https://www.google.com"><img class="dask-card-image" src="uploaded_images/3.png" alt=""></a></div>
                    <div><a href="https://www.google.com"><img class="dask-card-icon" src="user_icon/1.png" alt=""></a></div>
                    <div>
                        <div class="user-name"><h4>kotobuki</h4></div>
                        <div class="user-message letter"><h5>aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaabbbbb</h5></div>
                    </div>
                </div>
                <div class="dask-card">
                    <div class="category-tag"><a href="https://www.google.com"><h4>音楽</h4></a></div>
                    <div><a href="https://www.google.com"><img class="dask-card-image" src="uploaded_images/1.jpg" alt=""></a></div>
                    <div><a href="https://www.google.com"><img class="dask-card-icon" src="user_icon/1.png" alt=""></a></div>
                    <div>
                        <div class="user-name"><h4>kotobuki</h4></div>
                        <div class="user-message letter"><h5>aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaabbbbb</h5></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <footer>
        <a class="letter" href="index.html">トップページ</a>
        <a class="letter" href="profile.html">お問合せ</a>
        <a class="letter" href="about.html">つくりえとは？</a>
        <p class="letter">copyright(c) kotobuki All Rights Reserved.</p>
    </footer>
</body>
</html>
