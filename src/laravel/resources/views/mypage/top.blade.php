{{-- @extends('/layouts.main_layout') --}}
@extends('/layouts.mypage_layout')

{{-- @section('title', 'つくりえ -○○のマイページ-') --}}
{{-- <title>つくりえ -{{ $user_name }}のマイページトップ-</title> --}}
<title>つくりえ -{{ $profile["profile_name"] }}のマイページトップ-</title>
@section('add_css')
{{-- タスク ファイル読み込みをasset()で行う --}}
<link rel="stylesheet" href="{{ asset('/css/show_post.css') }}">
<link rel="stylesheet" href="{{ asset('/css/mypage.css') }}">
@endsection

{{-- ページ名 --}}
{{-- @section('page_name', 'のマイページ') --}}
@section('page_name')
<h2 class="letter">{{ $profile["profile_name"] }}のマイページ</h2>
@endsection

{{-- メインコンテンツ --}}
@section('main_block')
    <div class="main-block">
        <div class="posted-desk-card float">
            <div class="posted-deck-category-tag-music mouse-hover-transparent">
                <a href="https://www.google.com"><h4 class="letter">{{ $profile["creator_type"] }}</h4></a>
            </div>
            <div><img class="posted-desk-card-image" src="{{ $profile["top_image"] }}" alt=""></div>
            <div class="posted-desk-card-imgdiv">
                {{-- <img class="posted-desk-card-icon" src="{{ $profile["profile_icon"] }}" alt=""> --}}
                <img class="posted-desk-card-icon" src="{{ $profile["profile_icon"] }}" alt="">
                <h2 class="posted-desc-card-username">{{ $profile["profile_name"] }}</h2>
            </div>
            <div class="posted-desk-card-profiles">
                <div class="posted-desk-card-message"><p>{!! nl2br(e($profile["message"])) !!}</p>
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
@endsection
