@extends('layouts.main_layout')

{{-- タスク ユーザー名を表示 --}}
@section('title')つくりえ -{{ $profile["profile_name"] }}のつくえ-@endsection

@section('add_css')
<link rel="stylesheet" href="{{ asset('css/show_post.css') }}">
@endsection

{{-- ページ名 --}}
@section('page_name')
<h2 class="letter-title">{{ $profile["user_name"] }}のつくえ</h2>
@endsection


{{-- メインコンテンツ --}}
@section('main_contents')
<div class="main-contents">

    @if (!$isMobile)
    <div class="left-block"></div>
    @endif

    <div class="main-block">
        <div class="posted-desk-card float">
            @switch($profile["creator_type"])
            @case('音楽')
                <div class="posted-deck-category-tag music-tag mouse-hover-transparent">
                    <a class="letter-title" href="{{ route('/search', ['creator_type' => 1]) }}"><h4>{{ $profile["creator_type"] }}</h4></a>
                </div>
                @break
            @case('イラスト')
                <div class="posted-deck-category-tag illust-tag mouse-hover-transparent">
                    <a class="letter-title" href="{{ route('/search', ['creator_type' => 2]) }}"><h4>{{ $profile["creator_type"] }}</h4></a>
                </div>
                @break
            @case('動画')
                <div class="posted-deck-category-tag movie-tag mouse-hover-transparent">
                    <a class="letter-title" href="{{ route('/search', ['creator_type' => 3]) }}"><h4>{{ $profile["creator_type"] }}</h4></a>
                </div>
                @break
            @case('未選択')
                <div class="posted-deck-category-tag unselected-tag mouse-hover-transparent">
                    <a class="letter-title" href="{{ route('/search', ['creator_type' => 4]) }}"><h4>{{ $profile["creator_type"] }}</h4></a>
                </div>
                @break
            @default

            @endswitch

            <div><img class="posted-desk-card-image" src="{{ $profile["top_image"] ?: asset('/uploaded_images/1.jpg')  }}" alt=""></div>
            <div class="posted-desk-card-imgdiv">
                <img class="posted-desk-card-icon" src="{{ $profile["profile_icon"] ?: asset('/images/default_user_icon.jpeg') }}" alt="">
                @if (!$isMobile)
                <h2 class="posted-desc-card-username letter-title">{{ $profile["profile_name"] ?: 'クリエイター名未設定' }}</h2>
                @elseif ($isMobile)
                <h3 class="posted-desc-card-username letter-title">{{ $profile["profile_name"] ?: 'クリエイター名未設定' }}</h3>
                @endif
            </div>
            <div class="posted-desk-card-profiles">
                <div class="posted-desk-card-message">
                    <p>{!! nl2br(e($profile["message"])) ?: e('説明文が未記入です。') !!}</p>
                </div>

                <div class="using-items">
                    <h3 class="letter-title">使用機材</h3>
                </div>

                <div class="posted-desk-card-used-items-area">
                @for ($i = 1; $i <= 10; $i++)
                    @if ( isset($profile["equipment_type_icon_path_$i" ]) && isset($profile["equipment_maker_$i" ]) )
                    <div class="posted-desk-card-used-items">
                        <img class="posted-used-items-icon" src="{{ asset($profile["equipment_type_icon_path_$i"]) }}">
                        <div class="posted-used-items-exp">
                            <div class="posted-used-items-exp-maker-area">
                                <h5 class="letter-title">{{ $profile["equipment_maker_$i"] }}</h5>
                            </div>
                            <div class="posted-used-items-url">
                                @if ($isMobile)
                                <button id="url-to-copy-button{{ "-{$i}" }}" class="copy-url sink-button mouse-hover-pointer button-style" value=""  type="button"
                                onclick="abc(this.id)"></button>
                                @else
                                <button id="url-to-copy-button{{ "-{$i}" }}" class="copy-url sink-button mouse-hover-pointer button-style" value=""  type="button"
                                onclick=""></button>
                                @endif
                                <figure id="url-to-copy{{ "-{$i}" }}">{{ isset($profile["equipment_url_{$i}"]) ? asset($profile["equipment_url_{$i}"]) : '' }}</figure>
                            </div>
                        </div>
                    </div>
                    @endif
                @endfor
                </div>
            </div>
        </div>
    </div>
    @if (!$isMobile)
    <div class="right-block"></div>
    @endif
</div>
<div class="posted-back-to-top">
    <a class="letter-title" href="/">トップへ戻る</a>
</div>
@endsection

@section('add_script')
<script src="{{ asset('js/main.js') }}"></script>
@if ($isMobile)
<script>
    function abc (num){
        copy_url = (document.getElementById('url-to-copy' + num.replace('url-to-copy-button','')).innerHTML);
        // console.log(copy_url);
        navigator.clipboard.writeText(copy_url)
        .then(() => {
            alert("URLをクリップボードにコピーしました。")
        })
        .catch(err => {
            alert('すみません、コピーに失敗しました。', err);
        })
    }
</script>
@else
<script src="{{ asset('js/copy_url.js') }}"></script>
@endif
@endsection
