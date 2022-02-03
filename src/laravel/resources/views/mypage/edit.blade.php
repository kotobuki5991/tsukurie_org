@extends('/layouts.mypage_layout')

@section('title', 'つくりえ -プロフィール編集-')
@section('add_css')

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
        {{-- タスク エラー表示なおす --}}
        @if (count($errors) > 0)
            @foreach ($errors->all() as $error)
            <p>{{ $error }}</p>
            @endforeach
        @endif
        <form id="update-form" action="{{ asset('/mypage/update') }}" method="post" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="user_id" value="{{ $profile["user_id"] }}">
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
                @case('未選択')
                    <div class="posted-deck-category-tag unselected-tag mouse-hover-transparent">
                        <a href="{{ route('/search', ['creator_type' => 4]) }}"><h4>{{ $profile["creator_type"] }}</h4></a>
                    </div>
                @break
                @default
                @endswitch

                {{-- <div class="posted-deck-category-tag-music mouse-hover-transparent">
                    <a href="https://www.google.com"><h4 class="letter">{{ $profile["creator_type"] }}</h4></a>
                </div> --}}
                <div id="upload-img-area" class="upload-img-area">
                    <img id="show-selected-img" class="show-selected-img"
                    src="{{ $profile["top_image"] ?: asset('/uploaded_images/1.jpg')  }}" alt="">
                    {{-- メイン画像選択ボタン --}}
                    <input id="select-upload-img" class="select-upload-img" type="file" name="top_image" accept=".jpg, .jpeg, .png">
                </div>
                <div class="upload-user-info">
                    <div id="show-selected-user-icon-area" class="show-selected-user-icon-area">
                        <img id="show-selected-user-icon" class="show-selected-user-icon"
                        src="{{ $profile["profile_icon"] ?: asset('/images/default_user_icon.jpeg') }}" alt="">
                    </div>
                    <input class="myprofile-edit-username" type="text" name="profile_name" placeholder="クリエイター名を入力" value="{{ $profile["profile_name"] }}">
                    <select id="select-creator-type" class="select-creator-type" name="creator_type_id">
                        {{-- <option value="">クリエイター種別を選択</option> --}}
                        <option value="4" {{ $profile["creator_type"] == '未選択' ? 'selected' : null}}>クリエイター種別選択</option>
                        <option value="1" {{ $profile["creator_type"] == '音楽' ? 'selected' : null}}>音楽</option>
                        <option value="2" {{ $profile["creator_type"] == 'イラスト' ? 'selected' : null}}>イラスト</option>
                        <option value="3" {{ $profile["creator_type"] == '動画' ? 'selected' : null}}>動画</option>
                    </select>
                </div>
                <div id="select-upload-user-icon-button" class="select-upload-user-icon-button">
                    {{-- ユーザーアイコン選択ボタン --}}
                    <input id="select-upload-user-icon" class="select-upload-user-icon" type="file" name="profile_icon" accept=".jpg, .jpeg, .png">
                </div>

                <div class="posted-desk-card-profiles">
                    <div class="myprofile-edit-message">
                        <textarea name="message" placeholder="ここにメッセージを入力">{!! nl2br(e($profile["message"])) !!}</textarea>
                    </div>
                    <div class="using-items">
                        <h3>使用機材</h3>
                    </div>
                    {{-- ＋ボタンで追加できるフォーム --}}
                    <div id="used-items-form-area" class="posted-desk-card-used-items-area">


                        {{-- 下のフォームが0個の場合、デフォルトのフォームを１つ表示する --}}
                        <?php $count_equipment_form = 0 ?>
                        @for ($i = 1; $i <= 10; $i++)
                            @if ( isset($profile["equipment_id_" . $i]) )
                                <div id="used-items-form-{{ $i }}" class="posted-desk-card-used-items">
                                    <select class="select-items-logo" name="equipment_id_{{ $i }}">
                                        <option value="">カテゴリ</option>
                                        <option value="1" {{ $profile["equipment_id_" . $i] == 1 ? 'selected' : null}}>guitar</option>
                                        <option value="2" {{ $profile["equipment_id_" . $i] == 2 ? 'selected' : null}}>bass</option>
                                        <option value="3" {{ $profile["equipment_id_" . $i] == 3 ? 'selected' : null}}>piano</option>
                                        <option value="4" {{ $profile["equipment_id_" . $i] == 4 ? 'selected' : null}}>strings</option>
                                        <option value="5" {{ $profile["equipment_id_" . $i] == 5 ? 'selected' : null}}>synth</option>
                                        <option value="6" {{ $profile["equipment_id_" . $i] == 6 ? 'selected' : null}}>drum</option>
                                        <option value="7" {{ $profile["equipment_id_" . $i] == 7 ? 'selected' : null}}>mix/master</option>
                                        <option value="8" {{ $profile["equipment_id_" . $i] == 8 ? 'selected' : null}}>mic</option>
                                        <option value="9" {{ $profile["equipment_id_" . $i] == 9 ? 'selected' : null}}>headphones</option>
                                        <option value="10" {{ $profile["equipment_id_" . $i] == 10 ? 'selected' : null}}>daw</option>
                                        <option value="11" {{ $profile["equipment_id_" . $i] == 11 ? 'selected' : null}}>audioI/F</option>
                                    </select>
                                    <div class="myprofile-edit-used-items-exp">
                                        <select class="myprofile-edit-used-items" name="equipment_maker_id_{{ $i }}">
                                            {{-- 初期値入れ方考える --}}
                                            {{-- 初期値入れ方考える --}}
                                            {{-- 初期値入れ方考える --}}
                                            {{-- 初期値入れ方考える --}}
                                            {{-- 初期値入れ方考える --}}
                                            {{-- 初期値入れ方考える --}}
                                            {{-- 初期値入れ方考える --}}
                                            {{-- 初期値入れ方考える --}}
                                            <option value="">プラグイン・実機選択</option>
                                            <option value="1">waves</option>
                                            <option value="2">trillian</option>
                                            {{-- 初期値入れ方考える --}}
                                            {{-- 初期値入れ方考える --}}
                                            {{-- 初期値入れ方考える --}}
                                            {{-- 初期値入れ方考える --}}
                                            {{-- 初期値入れ方考える --}}
                                            {{-- 初期値入れ方考える --}}
                                            {{-- 初期値入れ方考える --}}
                                        </select>
                                        <div class="myprofile-edit-items-url">
                                            <input type="text" value="" name="equipment_url_{{ $i }}"
                                            placeholder="使用機材のURLを入力" value={{ $profile["equipment_url_" . $i] }}>
                                        </div>
                                    </div>
                                </div>
                                <?php $count_equipment_form++ ?>
                            @endif
                        @endfor
                        {{--  --}}
                        {{--  --}}
                        {{-- デフォルトで最低１個はフォームを表示 --}}
                        @if ( $count_equipment_form == 0 )
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
                        @endif
                        {{--  --}}
                        {{--  --}}
                        {{--  --}}
                    </div>
                </div>
                <input class="add-button sink-button circle-button mouse-hover-pointer" type="button" onclick="addForm()" value="+">
                <input class="remove-button sink-button circle-button mouse-hover-pointer" type="button" onclick="removeForm()" value="-">
            </div>
            <div class="publish-radio-button">
                <input name="publish_flag" type="radio" value="1" {{ $profile["publish_flag"] == 1 ? 'checked' : null}}>プロフィールを公開
                <input name="publish_flag" type="radio" value="0" {{ $profile["publish_flag"] == 0 ? 'checked' : null}}>非公開
            </div>
            <input id="update-button" class="myprofile-edit-submit sink-button mouse-hover-pointer" type="button" value="更新">
        </form>
    </div>

@endsection

@section('add_script_mypage')
<script src="{{ asset('js/mypage.js') }}"></script>

@endsection
