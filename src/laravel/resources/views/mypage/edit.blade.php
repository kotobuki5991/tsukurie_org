@extends('/layouts.mypage_layout')

@section('title', 'つくりえ -プロフィール編集-')
@section('add_css')
{{-- タスク ファイル読み込みをasset()で行う --}}
<link rel="stylesheet" href="{{ asset('/css/show_post.css') }}">
<link rel="stylesheet" href="{{ asset('/css/mypage.css') }}">
@endsection

{{-- ページ名 --}}
@section('page_name')
<h2 class="letter">プロフィール編集</h2>
@endsection


{{-- メインコンテンツ --}}
    @section('main_block')
    <div class="main-block">
        @if (count($errors) > 0)
            @foreach ($errors->all() as $error)
            <p>{{ $error }}</p>
            @endforeach
        @endif
        <form id="update-form" action="{{ asset('/mypage/update') }}" method="post" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="user_id" value="{{ $user_id }}">
            <div class="posted-desk-card float">
                <div class="posted-deck-category-tag-music mouse-hover-transparent"><a href="https://www.google.com"><h4 class="letter">音楽</h4></a></div>
                <div id="upload-img-area" class="upload-img-area">
                    {{-- <img class="posted-desk-card-image" src="{{ asset('/uploaded_images/1.jpg') }}" alt=""> --}}
                    <img id="show-selected-img" class="show-selected-img" src="{{ asset('/uploaded_images/1.jpg') }}" alt="">
                    {{-- メイン画像選択ボタン --}}
                    <input id="select-upload-img" class="select-upload-img" type="file" name="top_image" accept=".jpg, .jpeg, .png">
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
                    <input class="myprofile-edit-username" type="text" value="" name="profile_name" placeholder="クリエイター名を入力">
                    <select id="select-creator-type" class="select-creator-type" name="creatortype_id">
                        <option value="">クリエイター種別を選択</option>
                        <option value="1">音楽</option>
                        <option value="2">イラスト</option>
                        <option value="3">動画</option>
                    </select>
                    {{-- <h2 class="posted-desc-card-username">kotobuki</h2> --}}
                </div>
                <div id="select-upload-user-icon-button" class="select-upload-user-icon-button">
                    <input id="select-upload-user-icon" class="select-upload-user-icon" type="file" name="profile_icon" accept=".jpg, .jpeg, .png">
                </div>

                <div class="posted-desk-card-profiles">
                    <div class="myprofile-edit-message">
                        <textarea name="message" placeholder="ここにメッセージを入力"></textarea>
                    </div>
                    <div class="using-items">
                        <h3>使用機材</h3>
                    </div>
                    {{-- ＋ボタンで追加できるフォーム --}}
                    <div id="used-items-form-area" class="posted-desk-card-used-items-area">
                        <div id="used-items-form-1" class="posted-desk-card-used-items">
                            <select class="select-items-logo" name="equipment_id_1">
                                <option value="">カテゴリ</option>
                                <option value="1">guitar</option>
                                <option value="2">bass</option>
                                <option value="3">piano</option>
                                <option value="4">strings</option>
                                <option value="5">synth</option>
                                <option value="6">drum</option>
                                <option value="7">mix/master</option>
                                <option value="8">mic</option>
                                <option value="9">headphones</option>
                                <option value="10">daw</option>
                                <option value="11">audioI/F</option>
                            </select>
                            <div class="myprofile-edit-used-items-exp">
                                <select class="myprofile-edit-used-items" name="equipment_maker_id_1">
                                    <option value="">プラグイン・実機選択</option>
                                    <option value="1">waves</option>
                                    <option value="2">trillian</option>
                                </select>
                                <div class="myprofile-edit-items-url">
                                    <input type="text" value="" name="equipment_url_1" placeholder="使用機材のURLを入力">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <input class="add-button sink-button circle-button mouse-hover-pointer" type="button" onclick="addForm()" value="+">
                <input class="remove-button sink-button circle-button mouse-hover-pointer" type="button" onclick="removeForm()" value="-">
            </div>
            <div class="publish-radio-button">
                <input name="publish_flag" type="radio" value="1">プロフィールを公開
                <input name="publish_flag" type="radio" value="0" checked>非公開
            </div>
            <input id="update-button" class="myprofile-edit-submit sink-button mouse-hover-pointer" type="button" value="更新">
        </form>
    </div>

@endsection

@section('add_script_mypage')
<script src="{{ asset('js/mypage.js') }}"></script>

@endsection
