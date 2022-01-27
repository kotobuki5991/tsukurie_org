{{-- @extends('/layouts.main_layout') --}}
@extends('/layouts.mypage_layout')

{{-- @section('title', 'つくりえ -○○のマイページ-') --}}
{{-- <title>つくりえ -{{ $user_name }}のマイページトップ-</title> --}}
<title>つくりえ -{{ $profile->profile_name}}のマイページトップ-</title>
@section('add_css')
{{-- タスク ファイル読み込みをasset()で行う --}}
<link rel="stylesheet" href="{{ asset('/css/show_post.css') }}">
<link rel="stylesheet" href="{{ asset('/css/mypage.css') }}">
@endsection

{{-- ページ名 --}}
{{-- @section('page_name', 'のマイページ') --}}
@section('page_name')
<h2 class="letter">{{ $profile->profile_name }}のマイページ</h2>
@endsection

{{-- メインコンテンツ --}}
@section('main_block')
    <div class="main-block">
        <div class="posted-desk-card float">
            <div class="posted-deck-category-tag-music mouse-hover-transparent">
                <a href="https://www.google.com"><h4 class="letter">{{ $profile->creator_type->creator_type }}</h4></a>
            </div>
            <div><img class="posted-desk-card-image" src="{{ asset('/uploaded_images/1.jpg') }}" alt=""></div>
            <div class="posted-desk-card-imgdiv">
                <img class="posted-desk-card-icon" src="{{ asset('/user_icon/1.png') }}" alt="">
                <h2 class="posted-desc-card-username">{{ $profile->profile_name }}</h2>
            </div>
            <div class="posted-desk-card-profiles">
                <div class="posted-desk-card-message"><p>{!! nl2br(e($profile->message)) !!}</p>
                </div>

                <div class="using-items">
                    <h3>使用機材</h3>
                </div>

                <div class="posted-desk-card-used-items-area">
                    <div class="posted-desk-card-used-items">
                        <img class="posted-used-items-icon" src="{{ asset('item_icon/audioif_icon.png') }}">
                        <div class="posted-used-items-exp">
                            <h3>aaaaaaaaa</h3>
                            <div class="posted-used-items-url">
                                <input class="copy-url sink-button mouse-hover-pointer" type="button" value="Copy" onclick="copyToClipboard()">
                                <figure id="url-to-copy">https://www.soundhouse.co.jp/</figure>
                            </div>
                        </div>
                    </div>
                    <div class="posted-desk-card-used-items">
                        <img class="posted-used-items-icon" src="{{ asset('item_icon/bass_icon.png') }}">
                        <div class="posted-used-items-exp">
                            <h3>aaaaaaaaa</h3>
                            <div class="posted-used-items-url">
                                {{--
                                    copyTocripBoadの引数に、ユーザーのidを渡す。figureタグのidを、url-to-copy-[ユーザーid]にして、jsでどのfigureをコピーするか判別する。
                                    --}}
                                <input class="copy-url sink-button mouse-hover-pointer" type="button" value="Copy" onclick="copyToClipboard()">
                                <figure id="url-to-copy">https://google.com</figure>
                            </div>
                        </div>
                    </div>
                    <div class="posted-desk-card-used-items">
                        <img class="posted-used-items-icon" src="{{ asset('item_icon/headphones_icon.png') }}">
                        <div class="posted-used-items-exp">
                            <h3>aaaaaaaaa</h3>
                            <div class="posted-used-items-url">
                                <input class="copy-url sink-button mouse-hover-pointer" type="button" value="Copy" onclick="copyToClipboard()">
                                <figure id="url-to-copy">https://www.soundhouse.co.jp/</figure>
                            </div>
                        </div>
                    </div>
                    <div class="posted-desk-card-used-items">
                        <img class="posted-used-items-icon" src="{{ asset('item_icon/strings_icon.png') }}">
                        <div class="posted-used-items-exp">
                            <h3>aaaaaaaaa</h3>
                            <div class="posted-used-items-url">
                                {{--
                                    copyTocripBoadの引数に、ユーザーのidを渡す。figureタグのidを、url-to-copy-[ユーザーid]にして、jsでどのfigureをコピーするか判別する。
                                    --}}
                                <input class="copy-url sink-button mouse-hover-pointer" type="button" value="Copy" onclick="copyToClipboard()">
                                <figure id="url-to-copy">https://google.com</figure>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
