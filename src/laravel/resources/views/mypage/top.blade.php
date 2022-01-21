@extends('/layouts.main_layout')

@section('title', 'つくりえ -○○のマイページ-')
@section('add_css')
{{-- タスク ファイル読み込みをasset()で行う --}}
<link rel="stylesheet" href="{{ asset('/css/show_post.css') }}">
<link rel="stylesheet" href="{{ asset('/css/mypage.css') }}">
@endsection

{{-- ページ名 --}}
@section('page_name', '○○○のマイページ')


{{-- メインコンテンツ --}}
@section('main_contents')
<div class="main-contents">

    <div class="left-block">
        <ul class="mypage-links">
            <li><a href="{{ asset('/mypage/top') }}" class="letter">マイページトップ</a></li>
            <li><a href="{{ asset('/mypage/top') }}" class="letter">ログイン情報変更</a></li>
            <li><a href="{{ asset('/mypage/edit') }}" class="letter">プロフィール編集</a></li>
            <li><a href="{{ asset('/mypage/top') }}" class="letter">アカウント削除</a></li>
        </ul>

    </div>

    <div class="main-block">
        <div class="posted-desk-card float">
            <div class="posted-deck-category-tag-music"><a href="https://www.google.com"><h4 class="letter">音楽</h4></a></div>
            <div><img class="posted-desk-card-image" src="{{ asset('/uploaded_images/1.jpg') }}" alt=""></div>
            <div class="posted-desk-card-imgdiv">
                <img class="posted-desk-card-icon" src="{{ asset('/user_icon/1.png') }}" alt="">
                <h2 class="posted-desc-card-username">kotobuki</h2>
            </div>
            <div class="posted-desk-card-profiles">
                <div class="posted-desk-card-message"><p>aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa
                    aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa</p>
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
                                <input class="copy-url" type="button" value="Copy" onclick="copyToClipboard()">
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
                                <input class="copy-url" type="button" value="Copy" onclick="copyToClipboard()">
                                <figure id="url-to-copy">https://google.com</figure>
                            </div>
                        </div>
                    </div>
                    <div class="posted-desk-card-used-items">
                        <img class="posted-used-items-icon" src="{{ asset('item_icon/headphones_icon.png') }}">
                        <div class="posted-used-items-exp">
                            <h3>aaaaaaaaa</h3>
                            <div class="posted-used-items-url">
                                <input class="copy-url" type="button" value="Copy" onclick="copyToClipboard()">
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
                                <input class="copy-url" type="button" value="Copy" onclick="copyToClipboard()">
                                <figure id="url-to-copy">https://google.com</figure>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="right-block"></div>
</div>
<div class="posted-back-to-top">
    <a class="letter" href="{{ asset('/') }}">トップへ戻る</a>
</div>
@endsection

@section('add_script')
<script src="{{ asset('js/main.js') }}"></script>
@endsection
