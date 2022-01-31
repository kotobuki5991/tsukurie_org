@extends('layouts.main_layout')

@section('title', 'つくりえ -○○のつくえ-')
@section('add_css')
<link rel="stylesheet" href="{{ asset('css/show_post.css') }}">
@endsection

{{-- ページ名 --}}
@section('page_name')
<h2 class="letter">{{ $profile["user_name"] }}のつくえ</h2>
@endsection


{{-- メインコンテンツ --}}
@section('main_contents')
<div class="main-contents">

    <div class="left-block"></div>

    <div class="main-block">
        <div class="posted-desk-card float">
            @switch($profile["creator_type"])
            @case('音楽')
                <div class="posted-deck-category-tag music-tag mouse-hover-transparent">
                    <a href="{{ route('/search', ['creator_type' => 1]) }}"><h4>{{ $profile["creator_type"] }}</h4></a>
                </div>
                @break
            @case('イラスト')
                <div class="posted-deck-category-tag illust-tag mouse-hover-transparent">
                    <a href="{{ route('/search', ['creator_type' => 2]) }}"><h4>{{ $profile["creator_type"] }}</h4></a>
                </div>
                @break
            @case('動画')
                <div class="posted-deck-category-tag movie-tag mouse-hover-transparent">
                    <a href="{{ route('/search', ['creator_type' => 3]) }}"><h4>{{ $profile["creator_type"] }}</h4></a>
                </div>
                @break
            @default
            {{-- タスク 未選択タグを準備 --}}
            @endswitch


            {{-- <div class="posted-deck-category-tag-music mouse-hover-transparent">
                <a href="https://www.google.com"><h4 class="letter">{{ $profile["creator_type"] }}</h4></a>
            </div> --}}
            <div><img class="posted-desk-card-image" src="{{ $profile["top_image"] ?: asset('/uploaded_images/1.jpg')  }}" alt=""></div>
            <div class="posted-desk-card-imgdiv">
                <img class="posted-desk-card-icon" src="{{ $profile["profile_icon"] ?: asset('/images/default_user_icon.jpeg') }}" alt="">
                <h2 class="posted-desc-card-username">{{ $profile["profile_name"] ?: 'クリエイター名未設定' }}</h2>
            </div>
            <div class="posted-desk-card-profiles">
                <div class="posted-desk-card-message">
                    <p>{!! nl2br(e($profile["message"])) ?: e('説明文が未記入です。') !!}</p>
                </div>

                <div class="using-items">
                    <h3>使用機材</h3>
                </div>

                <div class="posted-desk-card-used-items-area">
                @for ($i = 1; $i <= 10; $i++)
                    @if ( isset($profile["equipment_type_icon_path_$i" ]) && isset($profile["equipment_maker_$i" ]) )
                    <div class="posted-desk-card-used-items">
                        <img class="posted-used-items-icon" src="{{ asset($profile["equipment_type_icon_path_$i"]) }}">
                        <div class="posted-used-items-exp">
                            <h5 >{{ $profile["equipment_maker_$i"] }}</h5>
                            <div class="posted-used-items-url">
                                <input class="copy-url sink-button mouse-hover-pointer" type="button" value="Copy" onclick="copyToClipboard()">
                                <figure id="url-to-copy">{{ isset($profile["equipment_url_$i"]) ? asset($profile["equipment_url_$i"]) : '' }}</figure>
                            </div>
                        </div>
                    </div>
                    @endif
                @endfor
                </div>
            </div>
        </div>
    </div>

    <div class="right-block"></div>
</div>
<div class="posted-back-to-top">
    <a class="letter" href="/">トップへ戻る</a>
</div>
@endsection

@section('add_script')
<script src="{{ asset('js/main.js') }}"></script>
@endsection
