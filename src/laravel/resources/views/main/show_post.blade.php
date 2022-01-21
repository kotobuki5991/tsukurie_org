@extends('layouts.main_layout')

@section('title', 'つくりえ -○○のつくえ-')
@section('add_css')
<link rel="stylesheet" href="css/show_post.css">
@endsection

{{-- ページ名 --}}
@section('page_name', '○○○のつくえ')


{{-- メインコンテンツ --}}
@section('main_contents')
<div class="main-contents">

    <div class="left-block"></div>

    <div class="main-block">
        <div class="posted-desk-card float">
            <div class="posted-deck-category-tag-music"><a href="https://www.google.com"><h4 class="letter">音楽</h4></a></div>
            <div><img class="posted-desk-card-image" src="uploaded_images/1.jpg" alt=""></div>
            <div class="posted-desk-card-imgdiv">
                <img class="posted-desk-card-icon" src="user_icon/1.png" alt="">
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
                        <img class="posted-used-items-icon" src="item_icon/audioif_icon.png">
                        <div class="posted-used-items-exp">
                            <h3>aaaaaaaaa</h3>
                            <div class="posted-used-items-url">
                                <input class="copy-url sink-button" type="button" value="Copy" onclick="copyToClipboard()">
                                <figure id="url-to-copy">https://www.soundhouse.co.jp/</figure>
                            </div>
                        </div>
                    </div>
                    <div class="posted-desk-card-used-items">
                        <img class="posted-used-items-icon" src="item_icon/bass_icon.png">
                        <div class="posted-used-items-exp">
                            <h3>aaaaaaaaa</h3>
                            <div class="posted-used-items-url">
                                {{--
                                    copyTocripBoadの引数に、ユーザーのidを渡す。figureタグのidを、url-to-copy-[ユーザーid]にして、jsでどのfigureをコピーするか判別する。
                                    --}}
                                <input class="copy-url sink-button" type="button" value="Copy" onclick="copyToClipboard()">
                                <figure id="url-to-copy">https://google.com</figure>
                            </div>
                        </div>
                    </div>
                    <div class="posted-desk-card-used-items">
                        <img class="posted-used-items-icon" src="item_icon/headphones_icon.png">
                        <div class="posted-used-items-exp">
                            <h3>aaaaaaaaa</h3>
                            <div class="posted-used-items-url">
                                <input class="copy-url sink-button" type="button" value="Copy" onclick="copyToClipboard()">
                                <figure id="url-to-copy">https://www.soundhouse.co.jp/</figure>
                            </div>
                        </div>
                    </div>
                    <div class="posted-desk-card-used-items">
                        <img class="posted-used-items-icon" src="item_icon/strings_icon.png">
                        <div class="posted-used-items-exp">
                            <h3>aaaaaaaaa</h3>
                            <div class="posted-used-items-url">
                                {{--
                                    copyTocripBoadの引数に、ユーザーのidを渡す。figureタグのidを、url-to-copy-[ユーザーid]にして、jsでどのfigureをコピーするか判別する。
                                    --}}
                                <input class="copy-url sink-button" type="button" value="Copy" onclick="copyToClipboard()">
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
    <a class="letter" href="/">トップへ戻る</a>
</div>
@endsection

@section('add_script')
<script src="js/main.js"></script>
@endsection
