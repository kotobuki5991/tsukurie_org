@extends('layouts.main_layout')

@section('title', 'つくりえ -トップページ-')

{{-- ページ名 --}}
@section('page_name', '検索結果')

{{-- 検索ボックス --}}
@section('search_box')
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
            <input class="search-select-submit sink-button" type="submit" value="検索">
        </form>
    </div>
</div>
@endsection

{{-- メインコンテンツ --}}
@section('main_contents')
<div class="show-cards-area">
    <div class="desk-card float">
        <div class="category-tag-music mouse-hover-transparent"><a href="https://www.google.com"><h4>音楽</h4></a></div>
        <div class="desk-card-image-area"><a href="/show_post"><img class="desk-card-image mouse-hover-expansion" src="{{ asset('uploaded_images/fukuju.jpg') }}" alt=""></a></div>
        <div><a href="https://www.google.com"><img class="desk-card-icon" src="{{ asset('user_icon/1.png') }}" alt=""></a></div>
        <div>
            <div class="user-name"><h3>kotobuki</h3></div>
            <div class="user-message letter"><h5>aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaabbbbb</h5></div>
        </div>
    </div>
    <div class="desk-card float">
        <div class="category-tag-movie mouse-hover-transparent"><a href="https://www.google.com"><h4>動画</h4></a></div>
        <div class="desk-card-image-area"><a href="https://www.google.com"><img class="desk-card-image mouse-hover-expansion" src="{{ asset('uploaded_images/3.png') }}" alt=""></a></div>
        <div><a href="https://www.google.com"><img class="desk-card-icon" src="{{ asset('user_icon/1.png') }}" alt=""></a></div>
        <div>
            <div class="user-name"><h3>kotobuki</h3></div>
            <div class="user-message letter"><h5>aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaabbbbb</h5></div>
        </div>
    </div>
    <div class="desk-card float">
        <div class="category-tag-illust mouse-hover-transparent"><a href="https://www.google.com"><h4>イラスト</h4></a></div>
        <div class="desk-card-image-area"><a href="https://www.google.com"><img class="desk-card-image mouse-hover-expansion" src="{{ asset('uploaded_images/1.jpg') }}" alt=""></a></div>
        <div><a href="https://www.google.com"><img class="desk-card-icon" src="{{ asset('user_icon/1.png') }}" alt=""></a></div>
        <div>
            <div class="user-name"><h3>kotobuki</h3></div>
            <div class="user-message letter"><h5>aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaabbbbb</h5></div>
        </div>
    </div>
    <div class="desk-card float">
        <div class="category-tag-music mouse-hover-transparent"><a href="https://www.google.com"><h4>音楽</h4></a></div>
        <div class="desk-card-image-area"><a href="https://www.google.com"><img class="desk-card-image mouse-hover-expansion" src="{{ asset('uploaded_images/2.jpg') }}" alt=""></a></div>
        <div><a href="https://www.google.com"><img class="desk-card-icon" src="{{ asset('user_icon/1.png') }}" alt=""></a></div>
        <div>
            <div class="user-name"><h3>kotobuki</h3></div>
            <div class="user-message letter"><h5>aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaabbbbb</h5></div>
        </div>
    </div>
    <div class="desk-card float">
        <div class="category-tag-movie mouse-hover-transparent"><a href="https://www.google.com"><h4>動画</h4></a></div>
        <div class="desk-card-image-area"><a href="https://www.google.com"><img class="desk-card-image mouse-hover-expansion" src="{{ asset('uploaded_images/3.png') }}" alt=""></a></div>
        <div><a href="https://www.google.com"><img class="desk-card-icon" src="{{ asset('user_icon/1.png') }}" alt=""></a></div>
        <div>
            <div class="user-name"><h3>kotobuki</h3></div>
            <div class="user-message letter"><h5>aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaabbbbb</h5></div>
        </div>
    </div>
    <div class="desk-card float">
        <div class="category-tag-illust"><a href="https://www.google.com"><h4>イラスト</h4></a></div>
        <div class="desk-card-image-area"><a href="https://www.google.com"><img class="desk-card-image mouse-hover-expansion" src="{{ asset('uploaded_images/1.jpg') }}" alt=""></a></div>
        <div><a href="https://www.google.com"><img class="desk-card-icon" src="{{ asset('user_icon/1.png') }}" alt=""></a></div>
        <div>
            <div class="user-name"><h3>kotobuki</h3></div>
            <div class="user-message letter"><h5>aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaabbbbb</h5></div>
        </div>
    </div>
    <div class="desk-card float">
        <div class="category-tag-music mouse-hover-transparent"><a href="https://www.google.com"><h4>音楽</h4></a></div>
        <div class="desk-card-image-area"><a href="/show_post"><img class="desk-card-image mouse-hover-expansion" src="{{ asset('uploaded_images/fukuju.jpg') }}" alt=""></a></div>
        <div><a href="https://www.google.com"><img class="desk-card-icon" src="{{ asset('user_icon/1.png') }}" alt=""></a></div>
        <div>
            <div class="user-name"><h3>kotobuki</h3></div>
            <div class="user-message letter"><h5>aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaabbbbb</h5></div>
        </div>
    </div>
    <div class="desk-card float">
        <div class="category-tag-movie mouse-hover-transparent"><a href="https://www.google.com"><h4>動画</h4></a></div>
        <div class="desk-card-image-area"><a href="https://www.google.com"><img class="desk-card-image mouse-hover-expansion" src="{{ asset('uploaded_images/2.jpg') }}" alt=""></a></div>
        <div><a href="https://www.google.com"><img class="desk-card-icon" src="{{ asset('user_icon/1.png') }}" alt=""></a></div>
        <div>
        <div class="user-name"><h3>kotobuki</h3></div>
            <div class="user-message letter"><h5>aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaabbbbb</h5></div>
        </div>
    </div>
    <div class="desk-card float">
        <div class="category-tag-illust"><a href="https://www.google.com"><h4>イラスト</h4></a></div>
        <div class="desk-card-image-area"><a href="https://www.google.com"><img class="desk-card-image mouse-hover-expansion" src="{{ asset('uploaded_images/1.jpg') }}" alt=""></a></div>
        <div><a href="https://www.google.com"><img class="desk-card-icon" src="{{ asset('user_icon/1.png') }}" alt=""></a></div>
        <div>
            <div class="user-name"><h3>kotobuki</h3></div>
            <div class="user-message letter"><h5>aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaabbbbb</h5></div>
        </div>
    </div>
    <div class="desk-card float">
        <div class="category-tag-music mouse-hover-transparent"><a href="https://www.google.com"><h4>音楽</h4></a></div>
        <div class="desk-card-image-area"><a href="https://www.google.com"><img class="desk-card-image mouse-hover-expansion" src="{{ asset('uploaded_images/2.jpg') }}" alt=""></a></div>
        <div><a href="https://www.google.com"><img class="desk-card-icon" src="{{ asset('user_icon/1.png') }}" alt=""></a></div>
        <div>
            <div class="user-name"><h3>kotobuki</h3></div>
            <div class="user-message letter"><h5>aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaabbbbb</h5></div>
        </div>
    </div>
    <div class="desk-card float">
        <div class="category-tag-movie mouse-hover-transparent"><a href="https://www.google.com"><h4>動画</h4></a></div>
        <div class="desk-card-image-area"><a href="https://www.google.com"><img class="desk-card-image mouse-hover-expansion" src="{{ asset('uploaded_images/3.png') }}" alt=""></a></div>
        <div><a href="https://www.google.com"><img class="desk-card-icon" src="{{ asset('user_icon/1.png') }}" alt=""></a></div>
        <div>
            <div class="user-name"><h3>kotobuki</h3></div>
            <div class="user-message letter"><h5>aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaabbbbb</h5></div>
        </div>
    </div>
    <div class="desk-card float">
        <div class="category-tag-illust"><a href="https://www.google.com"><h4>イラスト</h4></a></div>
        <div class="desk-card-image-area"><a href="https://www.google.com"><img class="desk-card-image mouse-hover-expansion" src="{{ asset('uploaded_images/1.jpg') }}" alt=""></a></div>
        <div><a href="https://www.google.com"><img class="desk-card-icon" src="{{ asset('user_icon/1.png') }}" alt=""></a></div>
        <div>
            <div class="user-name"><h3>kotobuki</h3></div>
            <div class="user-message letter"><h5>aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaabbbbb</h5></div>
        </div>
    </div>
</div>

<p style="align-items: center"> <  1  2  3  4  5  6  ></p>

@endsection
