<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- タイトル --}}
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('css/main_layout.css') }}">
    @yield('add_css')

    <script>
        window.onload = function(){
            const hover_item = document.getElementById('top-image-pc');
            var topimg_style = hover_item.style;
            topimg_style.opacity = 1;
        };
    </script>

    @yield('add_script_head')

</head>
<body>
    <header>
        <div class="header-img">
            <a href="{{ asset('/') }}"><img  src="{{ asset('images/tsukurie_logo.png') }}" alt=""></a>
        </div>
        @if(!$isMobile)
            @if (Route::has('login'))
                <div class="header-a hidden fixed top-0 right-0 px-6 py-4 sm:block pc-tablet-header-nav">
                    <ul class="nav">
                        <form name="logout" action="{{ url('/logout') }}" method="post">@csrf</form>
                        @auth
                        {{-- <li><a href="{{ url('/dashboard') }}" class="letter text-sm text-gray-700 dark:text-gray-500 underline">Dashboard</a></li> --}}
                        <li><a href="{{ url('/mypage/top') }}" class="letter-title  text-sm text-gray-700 dark:text-gray-500 underline">
                            <?php $user = Auth::user(); ?>{{ $user->name }}のマイページ</a></li>
                        <li><a id="logout-form" href="javascript:logout.submit()" class="letter-title  text-sm text-gray-700 dark:text-gray-500 underline">ログアウト</a></li>
                        @else
                        <li><a href="{{ route('login') }}" class="letter-title  text-sm text-gray-700 dark:text-gray-500 underline">ログイン</a></li>

                            @if (Route::has('register'))
                            <li><a href="{{ route('register') }}" class="letter-title  ml-4 text-sm text-gray-700 dark:text-gray-500 underline">ユーザー登録</a></li>
                            @endif
                        @endauth
                        <li><a href="{{ asset('/contact') }}" class="letter-title  underline">お問い合せ</a></li>
                        <li><a href="https://www.google.com" class="letter-title  underline">つくりえとは？</a></li>
                    </ul>
                </div>
            @endif
        @endif
    </header>
    <div class="for-main-background-col">
        <div class="content">
            <section class="top">
                <div class="top-image">
                    @if(!$isMobile)
                    <img id="top-image-pc" class="top-image-pc" src="{{ asset('images/top_img.jpg') }}" alt="">
                    @endif
                    @if($isMobile)
                    <img id="top-image-pc" class="top-image-pc" src="{{ asset('images/background.jpg') }}" alt="">
                    @endif
                </div>
                <div class="top-p">
                    <p class="head letter">クリエイターの<br>つくえを共有しよう<p>
                </div>
            </section>

            {{-- 検索ボックス --}}
            @yield('search_box')

            <div class="show-cards-wrapper">
                {{-- ページ名 --}}
                @yield('page_name')
                {{-- メインコンテンツ --}}
                @yield('main_contents')
            </div>
        </div>
        <div class="footer" >
            <footer>
                <a class="letter-title" href="{{ asset('/') }}">トップページ</a>
                <a class="letter-title" href="{{ asset('/contact') }}">お問合せ</a>
                <a class="letter-title" href="{{ asset('about.html') }}">つくりえとは？</a>
                <h4 class="letter-title">Copyright(c) Tsukurie All Rights Reserved.</h4>
            </footer>
        </div>
        @if($isMobile)
            @auth
            <div class="footer-account-menu">
                <ul>
                    <li><a href="{{ asset('/mypage/top') }}" class="letter-title">マイページトップ</a></li>
                    <li><a href="{{ route('update.password') }}" class="letter-title">パスワード変更</a></li>
                    <li><a href="{{ asset('/mypage/edit') }}" class="letter-title">プロフィール編集</a></li>
                    <li><a href="{{ asset('/mypage/delete_account') }}" class="letter-title">アカウント削除</a></li>
                </ul>
                <div class="close-footer-account-menu letter-title">閉じる</div>
            </div>
            @endauth
            @if (Route::has('login'))
                <div class="header-a hidden fixed top-0 right-0 px-6 py-4 sm:block smartphone-footer-nav">
                    <ul class="nav">
                        <form class="footer-nav-form" name="logout" action="{{ url('/logout') }}" method="post">@csrf</form>
                        @auth
                        <li>
                            <div class="footer-nav-icon account-menu" onclick="void(0)">
                                {{-- <a href="{{ url('/mypage/top') }}" class="letter-title text-sm text-gray-700 dark:text-gray-500 underline">アカウント</a> --}}
                                <h5 class="letter-title text-sm text-gray-700 dark:text-gray-500 underline">アカウント</h5>
                            </div>
                        </li>
                        <li>
                            <div class="footer-nav-icon">
                                <a id="logout-form" href="javascript:logout.submit()" class="letter-title text-sm text-gray-700 dark:text-gray-500 underline">ログアウト</a>
                            </div>
                        </li>
                        @else
                        <li>
                            <div class="footer-nav-icon">
                                <a href="{{ route('login') }}" class="letter-title text-sm text-gray-700 dark:text-gray-500 underline">ログイン</a>
                            </div>
                        </li>
                            @if (Route::has('register'))
                            <li>
                                <div class="footer-nav-icon">
                                    <a href="{{ route('register') }}" class="letter-title ml-4 text-sm text-gray-700 dark:text-gray-500 underline">ユーザー登録</a>
                                </div>
                            </li>
                            @endif
                        @endauth
                        <li>
                            <div class="footer-nav-icon">
                                <a href="{{ asset('/contact') }}" class="letter-title underline">お問い合せ</a>
                            </div>
                        </li>
                        <li>
                            <div class="footer-nav-icon">
                                <a href="https://www.google.com" class="letter-title underline">つくりえとは？</a>
                            </div>
                        </li>
                    </ul>
                </div>
            @endif
        @endif
    </div>
    @yield('add_script')
    <script src="https://unpkg.com/scrollreveal"></script>
    <script src="{{ asset('js/common.js') }}"></script>
</body>
</html>
