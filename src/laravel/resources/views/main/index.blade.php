@extends('layouts.main_layout')

@section('title', 'つくりえ -トップページ-')

{{-- ページ名 --}}
@section('page_name')
<h2 class="letter">検索結果</h2>
@endsection

{{-- 検索ボックス --}}
@section('search_box')
<div class="search-box-bg">
    <div class="search-box">
        {{-- <form action="/search" method="post"> --}}
        <form action="{{ route('/search') }}" method="post">
            @csrf
            <input class="search-text-box" type="text" name="search_word" placeholder="クリエイター名で検索">
            <select class="search-select-box" name="creator_type">
                <option value="">カテゴリ</option>
                <option value="1">音楽</option>
                <option value="2">イラスト</option>
                <option value="3">動画</option>
                </select>
            <input class="search-select-submit sink-button" type="submit" value="検索">
        </form>
    </div>
</div>
@endsection

{{-- メインコンテンツ --}}
@section('main_contents')
<div class="show-cards-area">

    @foreach ($profile_ary as $profile)
    <div class="desk-card float">
        @switch($profile["creator_type"])
            @case('音楽')
            <div class="category-tag-music mouse-hover-transparent"><a href="{{ route('/search', ['creator_type' => 1]) }}"><h4>{{ $profile["creator_type"] }}</h4></a></div>
                @break
            @case('イラスト')
            <div class="category-tag-illust mouse-hover-transparent"><a href="{{ route('/search', ['creator_type' => 2]) }}"><h4>{{ $profile["creator_type"] }}</h4></a></div>
                @break
            @case('動画')
            <div class="category-tag-movie mouse-hover-transparent"><a href="{{ route('/search', ['creator_type' => 3]) }}"><h4>{{ $profile["creator_type"] }}</h4></a></div>
                @break
            @default
            {{-- タスク 未選択タグを準備 --}}
        @endswitch
        {{-- <div class="category-tag-music mouse-hover-transparent"><a href="https://www.google.com"><h4>{{ $profile["creator_type"] }}</h4></a></div> --}}
        <div class="desk-card-image-area">
            <a href="{{ route('/show_post', ['user_id' => $profile['user_id']]) }}">
                <img class="desk-card-image mouse-hover-expansion" src="{{ $profile["top_image"] ?: asset('/uploaded_images/1.jpg')  }}" alt="">
            </a>
        </div>
        {{-- 後で遷移先変える --}}
        <div>
            <a href="https://www.google.com">
                <img class="desk-card-user-icon" src="{{ $profile["profile_icon"] ?: asset('/images/default_user_icon.jpeg') }}" alt="">
            </a>
        </div>
        <div>
            <div class="user-name"><h3>{{ $profile["profile_name"] }}</h3></div>
            <div class="user-message letter"><h5>{!! nl2br(e($profile["message"])) !!}</h5></div>
        </div>
    </div>
    @endforeach
{{--
    <div class="desk-card float">
        <div class="category-tag-music mouse-hover-transparent"><a href="https://www.google.com"><h4>音楽</h4></a></div>
        <div class="desk-card-image-area"><a href="/show_post"><img class="desk-card-image mouse-hover-expansion" src="{{ asset('uploaded_images/fukuju.jpg') }}" alt=""></a></div>
        <div><a href="https://www.google.com"><img class="desk-card-user-icon" src="{{ asset('user_icon/1.png') }}" alt=""></a></div>
        <div>
            <div class="user-name"><h3>kotobuki</h3></div>
            <div class="user-message letter"><h5>aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaabbbbb</h5></div>
        </div>
    </div>
    <div class="desk-card float">
        <div class="category-tag-movie mouse-hover-transparent"><a href="https://www.google.com"><h4>動画</h4></a></div>
        <div class="desk-card-image-area"><a href="https://www.google.com"><img class="desk-card-image mouse-hover-expansion" src="{{ asset('uploaded_images/3.png') }}" alt=""></a></div>
        <div><a href="https://www.google.com"><img class="desk-card-user-icon" src="{{ asset('user_icon/1.png') }}" alt=""></a></div>
        <div>
            <div class="user-name"><h3>kotobuki</h3></div>
            <div class="user-message letter"><h5>aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaabbbbb</h5></div>
        </div>
    </div>
    <div class="desk-card float">
        <div class="category-tag-illust mouse-hover-transparent"><a href="https://www.google.com"><h4>イラスト</h4></a></div>
        <div class="desk-card-image-area"><a href="https://www.google.com"><img class="desk-card-image mouse-hover-expansion" src="{{ asset('uploaded_images/1.jpg') }}" alt=""></a></div>
        <div><a href="https://www.google.com"><img class="desk-card-user-icon" src="{{ asset('user_icon/1.png') }}" alt=""></a></div>
        <div>
            <div class="user-name"><h3>kotobuki</h3></div>
            <div class="user-message letter"><h5>aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaabbbbb</h5></div>
        </div>
    </div>
    <div class="desk-card float">
        <div class="category-tag-music mouse-hover-transparent"><a href="https://www.google.com"><h4>音楽</h4></a></div>
        <div class="desk-card-image-area"><a href="https://www.google.com"><img class="desk-card-image mouse-hover-expansion" src="{{ asset('uploaded_images/2.jpg') }}" alt=""></a></div>
        <div><a href="https://www.google.com"><img class="desk-card-user-icon" src="{{ asset('user_icon/1.png') }}" alt=""></a></div>
        <div>
            <div class="user-name"><h3>kotobuki</h3></div>
            <div class="user-message letter"><h5>aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaabbbbb</h5></div>
        </div>
    </div>
    <div class="desk-card float">
        <div class="category-tag-movie mouse-hover-transparent"><a href="https://www.google.com"><h4>動画</h4></a></div>
        <div class="desk-card-image-area"><a href="https://www.google.com"><img class="desk-card-image mouse-hover-expansion" src="{{ asset('uploaded_images/3.png') }}" alt=""></a></div>
        <div><a href="https://www.google.com"><img class="desk-card-user-icon" src="{{ asset('user_icon/1.png') }}" alt=""></a></div>
        <div>
            <div class="user-name"><h3>kotobuki</h3></div>
            <div class="user-message letter"><h5>aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaabbbbb</h5></div>
        </div>
    </div>
    <div class="desk-card float">
        <div class="category-tag-illust mouse-hover-transparent"><a href="https://www.google.com"><h4>イラスト</h4></a></div>
        <div class="desk-card-image-area"><a href="https://www.google.com"><img class="desk-card-image mouse-hover-expansion" src="{{ asset('uploaded_images/1.jpg') }}" alt=""></a></div>
        <div><a href="https://www.google.com"><img class="desk-card-user-icon" src="{{ asset('user_icon/1.png') }}" alt=""></a></div>
        <div>
            <div class="user-name"><h3>kotobuki</h3></div>
            <div class="user-message letter"><h5>aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaabbbbb</h5></div>
        </div>
    </div>
    <div class="desk-card float">
        <div class="category-tag-music mouse-hover-transparent"><a href="https://www.google.com"><h4>音楽</h4></a></div>
        <div class="desk-card-image-area"><a href="/show_post"><img class="desk-card-image mouse-hover-expansion" src="{{ asset('uploaded_images/fukuju.jpg') }}" alt=""></a></div>
        <div><a href="https://www.google.com"><img class="desk-card-user-icon" src="{{ asset('user_icon/1.png') }}" alt=""></a></div>
        <div>
            <div class="user-name"><h3>kotobuki</h3></div>
            <div class="user-message letter"><h5>aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaabbbbb</h5></div>
        </div>
    </div>
    <div class="desk-card float">
        <div class="category-tag-movie mouse-hover-transparent"><a href="https://www.google.com"><h4>動画</h4></a></div>
        <div class="desk-card-image-area"><a href="https://www.google.com"><img class="desk-card-image mouse-hover-expansion" src="{{ asset('uploaded_images/2.jpg') }}" alt=""></a></div>
        <div><a href="https://www.google.com"><img class="desk-card-user-icon" src="{{ asset('user_icon/1.png') }}" alt=""></a></div>
        <div>
        <div class="user-name"><h3>kotobuki</h3></div>
            <div class="user-message letter"><h5>aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaabbbbb</h5></div>
        </div>
    </div>
    <div class="desk-card float">
        <div class="category-tag-illust mouse-hover-transparent"><a href="https://www.google.com"><h4>イラスト</h4></a></div>
        <div class="desk-card-image-area"><a href="https://www.google.com"><img class="desk-card-image mouse-hover-expansion" src="{{ asset('uploaded_images/1.jpg') }}" alt=""></a></div>
        <div><a href="https://www.google.com"><img class="desk-card-user-icon" src="{{ asset('user_icon/1.png') }}" alt=""></a></div>
        <div>
            <div class="user-name"><h3>kotobuki</h3></div>
            <div class="user-message letter"><h5>aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaabbbbb</h5></div>
        </div>
    </div>
    <div class="desk-card float">
        <div class="category-tag-music mouse-hover-transparent"><a href="https://www.google.com"><h4>音楽</h4></a></div>
        <div class="desk-card-image-area"><a href="https://www.google.com"><img class="desk-card-image mouse-hover-expansion" src="{{ asset('uploaded_images/2.jpg') }}" alt=""></a></div>
        <div><a href="https://www.google.com"><img class="desk-card-user-icon" src="{{ asset('user_icon/1.png') }}" alt=""></a></div>
        <div>
            <div class="user-name"><h3>kotobuki</h3></div>
            <div class="user-message letter"><h5>aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaabbbbb</h5></div>
        </div>
    </div>
    <div class="desk-card float">
        <div class="category-tag-movie mouse-hover-transparent"><a href="https://www.google.com"><h4>動画</h4></a></div>
        <div class="desk-card-image-area"><a href="https://www.google.com"><img class="desk-card-image mouse-hover-expansion" src="{{ asset('uploaded_images/3.png') }}" alt=""></a></div>
        <div><a href="https://www.google.com"><img class="desk-card-user-icon" src="{{ asset('user_icon/1.png') }}" alt=""></a></div>
        <div>
            <div class="user-name"><h3>kotobuki</h3></div>
            <div class="user-message letter"><h5>aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaabbbbb</h5></div>
        </div>
    </div>
    <div class="desk-card float">
        <div class="category-tag-illust mouse-hover-transparent"><a href="https://www.google.com"><h4>イラスト</h4></a></div>
        <div class="desk-card-image-area"><a href="https://www.google.com"><img class="desk-card-image mouse-hover-expansion" src="{{ asset('uploaded_images/1.jpg') }}" alt=""></a></div>
        <div><a href="https://www.google.com"><img class="desk-card-user-icon" src="{{ asset('user_icon/1.png') }}" alt=""></a></div>
        <div>
            <div class="user-name"><h3>kotobuki</h3></div>
            <div class="user-message letter"><h5>aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaabbbbb</h5></div>
        </div>
    </div> --}}
</div>

{{-- <p style="align-items: center"> <  1  2  3  4  5  6  ></p> --}}
<div class="pagenate">
    {{ $paginate->links() }}
</div>

@endsection
