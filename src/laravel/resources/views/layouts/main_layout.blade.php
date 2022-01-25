<!DOCTYPE html>
<html lang="en">
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

</head>
<body>
    <header>
        <div class="header-img">
            <a href="{{ asset('/') }}"><img  src="{{ asset('images/icon.jpg') }}" alt=""></a>
        </div>
        @if (Route::has('login'))
                <div class="header-a hidden fixed top-0 right-0 px-6 py-4 sm:block">
                    <ul class="nav">
                        <form name="logout" action="{{ url('/logout') }}" method="post">@csrf</form>
                        @auth
                        {{-- <li><a href="{{ url('/dashboard') }}" class="letter text-sm text-gray-700 dark:text-gray-500 underline">Dashboard</a></li> --}}
                        <li><a href="{{ url('/mypage/top') }}" class="letter text-sm text-gray-700 dark:text-gray-500 underline">
                            <?php $user = Auth::user(); ?>{{ $user->name }}のマイページ</a></li>
                        <li><a id="logout-form" href="javascript:logout.submit()" class="letter text-sm text-gray-700 dark:text-gray-500 underline">ログアウト</a></li>
                        @else
                        <li><a href="{{ route('login') }}" class="letter text-sm text-gray-700 dark:text-gray-500 underline">ログイン</a></li>

                            @if (Route::has('register'))
                            <li><a href="{{ route('register') }}" class="letter ml-4 text-sm text-gray-700 dark:text-gray-500 underline">ユーザー登録</a></li>
                            @endif
                        @endauth
                        <li><a href="{{ asset('/contact') }}" class="letter underline">お問い合せ</a></li>
                        <li><a href="https://www.google.com" class="letter underline">つくりえとは？</a></li>
                    </ul>
                </div>
            @endif
    </header>
    <div class="content">
        <section class="top">
            <div class="top-image">
                <img id="top-image-pc" class="top-image-pc" src="{{ asset('images/top_img.jpg') }}" alt="">
            </div>
            <div class="top-p">
                <p class="head letter">クリエイターの<br>つくえを共有しよう<p>
            </div>
        </section>

        {{-- 検索ボックス --}}
        @yield('search_box')

        <div class="show-cards-wrapper">
            {{-- ページ名 --}}
            <h2 class="letter">@isset($user_name){{ $user_name }}@endisset @yield('page_name')</h2>
            {{-- メインコンテンツ --}}
            @yield('main_contents')
        </div>
    </div>
    <footer>
        <a class="letter" href="{{ asset('/') }}">トップページ</a>
        <a class="letter" href="{{ asset('/contact') }}">お問合せ</a>
        <a class="letter" href="{{ asset('about.html') }}">つくりえとは？</a>
        <p class="letter">copyright(c) kotobuki All Rights Reserved.</p>
    </footer>
    @yield('add_script')

    <script src="https://unpkg.com/scrollreveal"></script>
    <script src="{{ asset('js/common.js') }}"></script>
</body>
</html>
