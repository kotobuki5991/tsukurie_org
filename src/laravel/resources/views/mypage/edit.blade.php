@extends('/layouts.mypage_layout')

@section('title', 'つくりえ -プロフィール編集-')
@section('add_css')
{{-- タスク ファイル読み込みをasset()で行う --}}
<link rel="stylesheet" href="{{ asset('/css/show_post.css') }}">
<link rel="stylesheet" href="{{ asset('/css/mypage.css') }}">
@endsection

{{-- ページ名 --}}
@section('page_name', 'プロフィール編集')


{{-- メインコンテンツ --}}
    @section('main_block')
    <div class="main-block">
        <form id="update-form" action="{{ asset('/mypage/top') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="posted-desk-card float">
                <div class="posted-deck-category-tag-music mouse-hover-transparent"><a href="https://www.google.com"><h4 class="letter">音楽</h4></a></div>
                <div id="upload-img-area" class="upload-img-area">
                    {{-- <img class="posted-desk-card-image" src="{{ asset('/uploaded_images/1.jpg') }}" alt=""> --}}
                    <img id="show-selected-img" class="show-selected-img" src="{{ asset('/uploaded_images/1.jpg') }}" alt="">
                    {{-- メイン画像選択ボタン --}}
                    <input id="select-upload-img" class="select-upload-img" type="file" name="" accept=".jpg, .jpeg, .png">
                    {{-- メイン画像選択ボタン --}}
                    {{-- メイン画像選択ボタン --}}
                </div>
                <div class="upload-user-info">
                    {{-- ユーザーアイコン選択ボタン --}}
                    {{-- <input class="upload-img-form" type="file" name="" enctype="multipart/form-data"> --}}
                    {{-- ユーザーアイコン選択ボタン --}}
                    {{-- ユーザーアイコン選択ボタン --}}
                    <div id="show-selected-user-icon-area" class="show-selected-user-icon-area">
                        {{-- <img class="uploaded-user-icon" src="{{ asset('/user_icon/1.png') }}" alt=""> --}}
                        <img id="show-selected-user-icon" class="show-selected-user-icon" src="{{ asset('/images/default_user_icon.jpeg') }}" alt="">
                    </div>
                    <input class="myprofile-edit-username" type="text" value="kotobuki">
                    <select id="select-creator-type" class="select-creator-type">
                        <option value="">クリエイター種別を選択</option>
                        <option value="music">音楽</option>
                        <option value="illust">イラスト</option>
                        <option value="movie">動画</option>
                    </select>
                    {{-- <h2 class="posted-desc-card-username">kotobuki</h2> --}}
                </div>
                <div id="select-upload-user-icon-button" class="select-upload-user-icon-button">
                    <input id="select-upload-user-icon" class="select-upload-user-icon" type="file" name="" accept=".jpg, .jpeg, .png">
                </div>

                <div class="posted-desk-card-profiles">
                    <div class="myprofile-edit-message"><textarea>aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa
                        aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa</textarea>
                    </div>

                    <div class="using-items">
                        <h3>使用機材</h3>
                    </div>
                    {{-- ＋ボタンで追加できるフォーム --}}
                    <div id="used-items-form-area" class="posted-desk-card-used-items-area">
                        <div id="used-items-form" class="posted-desk-card-used-items  used_item_form_number-1">
                            <select id="select-items-logo" class="select-items-logo">
                                <option value="">カテゴリ</option>
                                <option value="">guitar</option>
                                <option value="">bass</option>
                                <option value="">piano</option>
                                <option value="">strings</option>
                                <option value="">synth</option>
                                <option value="">drum</option>
                                <option value="">mix/master</option>
                                <option value="">mic</option>
                                <option value="">headphones</option>
                                <option value="">daw</option>
                                <option value="">audioI/F</option>
                            </select>
                            {{-- <img class="posted-used-items-icon" src="{{ asset('item_icon/audioif_icon.png') }}"> --}}
                            <div class="myprofile-edit-used-items-exp">
                                <select class="myprofile-edit-used-items">
                                    <option value="">プラグイン・実機選択</option>
                                    <option value="waves">waves</option>
                                    <option value="trillian">trillian</option>
                                </select>
                                <div class="myprofile-edit-items-url">
                                    <input type="text" value="https://www.soundhouse.co.jp/">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <input class="add-button sink-button circle-button mouse-hover-pointer" type="button" onclick="addForm()" value="+">
                <input class="remove-button sink-button circle-button mouse-hover-pointer" type="button" onclick="removeForm()" value="-">
            </div>
            <input id="update-button" class="myprofile-edit-submit sink-button mouse-hover-pointer" type="button" value="更新">
        </form>
    </div>

@endsection

@section('add_script_mypage')
<script src="{{ asset('js/mypage.js') }}"></script>

@endsection
