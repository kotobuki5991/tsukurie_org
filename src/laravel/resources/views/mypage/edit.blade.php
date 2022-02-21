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

<div id="modal-window" class="modal-window">
    <div id="modal-content" class="modal-content">
        <input id='scal' type='range' value='' min='10' max='400' oninput="scaling(value)" style='width: 300px;'><br>
        <canvas id='cvs' class="cvs" width="1540px" height="1028px"></canvas><br>
        <div class="crop-button"><input class="button sink-button mouse-hover-pointer" type="button" value="トリミング" onclick='cropAndSetImage()'><br></div>
        <canvas id='out' class="out" width='1400px' height='934px'></canvas>
    </div>
</div>

{{-- メインコンテンツ --}}
    @section('main_block')
    <div class="main-block">
        {{-- タスク エラー表示なおす --}}
        @if (count($errors) > 0)
            @foreach ($errors->all() as $error)
            <p class="error-msg">{{ $error }}</p>
            @endforeach
        @endif

        <form id="update-form" action="{{ asset('/mypage/update') }}" method="post" enctype="multipart/form-data">
            @csrf

            <div class="posted-desk-card float">
                <div id="creator-type-tag">
                    @switch($profile["creator_type"])
                    @case('音楽')
                    <div id="creator-type" class="posted-deck-category-tag music-tag mouse-hover-transparent">
                        <a href="{{ route('/search', ['creator_type' => 1]) }}"><h4>{{ $profile["creator_type"] }}</h4></a>
                    </div>
                    @break
                    @case('イラスト')
                        <div id="creator-type" class="posted-deck-category-tag illust-tag mouse-hover-transparent">
                            <a href="{{ route('/search', ['creator_type' => 2]) }}"><h4>{{ $profile["creator_type"] }}</h4></a>
                        </div>
                        @break
                    @case('動画')
                        <div id="creator-type" class="posted-deck-category-tag movie-tag mouse-hover-transparent">
                            <a href="{{ route('/search', ['creator_type' => 3]) }}"><h4>{{ $profile["creator_type"] }}</h4></a>
                        </div>
                        @break
                    @case('未選択')
                        <div id="creator-type" class="posted-deck-category-tag unselected-tag mouse-hover-transparent">
                            <a href="{{ route('/search', ['creator_type' => 4]) }}"><h4>{{ $profile["creator_type"] }}</h4></a>
                        </div>
                    @break
                    @default
                    @endswitch
                </div>

                <div id="upload-img-area" class="upload-img-area">
                    <img id="show-selected-img" class="show-selected-img"
                    src="{{ $profile["top_image"] ?: asset('/uploaded_images/1.jpg')  }}" alt="">
                    {{-- メイン画像選択ボタン --}}
                    <input id="select-upload-img" class="select-upload-img" type="file" name="top_image" accept=".jpg, .jpeg, .png" onchange="load_img(this)">
                    <input id="croped-base64-profile-icon" name="croped_base64_profile_icon" type="hidden">
                </div>

                <div class="upload-user-info">
                    <div id="show-selected-user-icon-area" class="show-selected-user-icon-area">
                        <img id="show-selected-user-icon" class="show-selected-user-icon"
                        src="{{ $profile["profile_icon"] ?: asset('/images/default_user_icon.jpeg') }}" alt="">
                    </div>
                    <input class="myprofile-edit-username" type="text" name="profile_name" placeholder="クリエイター名を入力" value="{{ $profile["profile_name"] }}">
                    <select id="select-creator-type" class="select-creator-type" name="creator_type_id" onchange="changeCreatorType(this)">
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
                        {{-- <textarea name="message" placeholder="ここにメッセージを入力">{!! nl2br(e($profile["message"])) !!}</textarea> --}}
                        <textarea name="message" placeholder="ここにメッセージを入力">{!! e($profile["message"]) !!}</textarea>
                    </div>
                    <div class="using-items">
                        <h3>使用機材</h3>
                    </div>
                    {{-- ＋ボタンで追加できるフォーム --}}
                    <div id="used-items-form-area" class="posted-desk-card-used-items-area">

                        <?php $count_equipment_form = 0 ?>
                        @for ($i = 1; $i <= 10; $i++)
                            {{-- 登録済みの機材数分だけ入力フォームを追加 --}}
                            @if ( isset($profile["equipment_id_" . $i]) )
                                <div id="used-items-form-{{ $i }}" class="posted-desk-card-used-items">
                                    <select class="select-items-logo" name="equipment_id_{{ $i }}" onchange="changeSelectForUsedItem(this)">
                                        <option value="">カテゴリ</option>
                                        {{-- クリエイタータイプが音楽の場合 --}}
                                        @if ( $profile["creator_type"] == '音楽' )
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
                                            <option value="12" {{ $profile["equipment_id_" . $i] == 12 ? 'selected' : null}}>OS</option>
                                            <option value="13" {{ $profile["equipment_id_" . $i] == 13 ? 'selected' : null}}>monitor</option>
                                            <option value="24" {{ $profile["equipment_id_" . $i] == 24 ? 'selected' : null}}>MIDI keyboard</option>
                                        {{-- イラストの場合 --}}
                                        @elseif ( $profile["creator_type"] == 'イラスト' )
                                            <option value="14" {{ $profile["equipment_id_" . $i] == 14 ? 'selected' : null}}>illust soft</option>
                                            <option value="15" {{ $profile["equipment_id_" . $i] == 15 ? 'selected' : null}}>tablet</option>
                                            <option value="16" {{ $profile["equipment_id_" . $i] == 16 ? 'selected' : null}}>OS</option>
                                            <option value="17" {{ $profile["equipment_id_" . $i] == 17 ? 'selected' : null}}>moitor</option>
                                        {{-- 動画の場合 --}}
                                        @elseif ( $profile["creator_type"] == '動画' )
                                            <option value="18" {{ $profile["equipment_id_" . $i] == 18 ? 'selected' : null}}>movie soft</option>
                                            <option value="19" {{ $profile["equipment_id_" . $i] == 19 ? 'selected' : null}}>illust soft</option>
                                            <option value="20" {{ $profile["equipment_id_" . $i] == 20 ? 'selected' : null}}>camera</option>
                                            <option value="21" {{ $profile["equipment_id_" . $i] == 21 ? 'selected' : null}}>tablet</option>
                                            <option value="22" {{ $profile["equipment_id_" . $i] == 22 ? 'selected' : null}}>OS</option>
                                            <option value="23" {{ $profile["equipment_id_" . $i] == 23 ? 'selected' : null}}>moitor</option>
                                        @endif
                                    </select>
                                    <div class="myprofile-edit-used-items-exp">
                                        <select id="equipment_maker_id_{{ $i }}" class="myprofile-edit-used-items" name="equipment_maker_id_{{ $i }}">
                                            <option value="">使用機材を選択</option>
                                            @switch($profile["equipment_id_" . $i])
                                                {{-- ここから音楽 --}}
                                                @case('1')
                                                    <option {{ $profile["equipment_maker_id_{$i}"] == 7 ? 'selected' : null }} value="7">Ample Guitar (Ample Sound)</option>
                                                    <option {{ $profile["equipment_maker_id_{$i}"] == 4 ? 'selected' : null }} value="4">Electri6ity (Vir2)</option>
                                                    <option {{ $profile["equipment_maker_id_{$i}"] == 12 ? 'selected' : null }} value="12">GD-6 Acoustic Guitar (Acousticsamples)</option>
                                                    <option {{ $profile["equipment_maker_id_{$i}"] == 1 ? 'selected' : null }} value="1">Hammingbird (Prominy)</option>
                                                    <option {{ $profile["equipment_maker_id_{$i}"] == 13 ? 'selected' : null }} value="13">IRON (UJAM)</option>
                                                    <option {{ $profile["equipment_maker_id_{$i}"] == 8 ? 'selected' : null }} value="8">Junk Guitar (Fujiya Instruments)</option>
                                                    <option {{ $profile["equipment_maker_id_{$i}"] == 3 ? 'selected' : null }} value="3">LPC Electric Distortion and Clean Guitar (Prominy)</option>
                                                    <option {{ $profile["equipment_maker_id_{$i}"] == 6 ? 'selected' : null }} value="6">RealGuitar (MusicLab)</option>
                                                    <option {{ $profile["equipment_maker_id_{$i}"] == 9 ? 'selected' : null }} value="9">SampleTank (IK Multimedia)</option>
                                                    <option {{ $profile["equipment_maker_id_{$i}"] == 2 ? 'selected' : null }} value="2">SC Electric Guitar (Prominy)</option>
                                                    <option {{ $profile["equipment_maker_id_{$i}"] == 5 ? 'selected' : null }} value="5">Session Guitarist (Native Instruments)</option>
                                                    <option {{ $profile["equipment_maker_id_{$i}"] == 10 ? 'selected' : null }} value="10">Strategy (Acousticsamples)</option>
                                                    <option {{ $profile["equipment_maker_id_{$i}"] == 11 ? 'selected' : null }} value="11">Sunbird (Acousticsamples)</option>
                                                    <option {{ $profile["equipment_maker_id_{$i}"] == 15 ? 'selected' : null }} value="15">その他</option>
                                                    <option {{ $profile["equipment_maker_id_{$i}"] == 14 ? 'selected' : null }} value="14">生演奏</option>
                                                    @break
                                                @case('2')
                                                    <option {{ $profile["equipment_maker_id_{$i}"] == 25 ? 'selected' : null }} value="25">Ample Bass PⅡ(Ample Sound)</option>
                                                    <option {{ $profile["equipment_maker_id_{$i}"] == 28 ? 'selected' : null }} value="28">Bass Slapper (Waves)</option>
                                                    <option {{ $profile["equipment_maker_id_{$i}"] == 18 ? 'selected' : null }} value="18">EZbass (Toontrack)</option>
                                                    <option {{ $profile["equipment_maker_id_{$i}"] == 19 ? 'selected' : null }} value="19">Modern Bass (Ilya Efimov)</option>
                                                    <option {{ $profile["equipment_maker_id_{$i}"] == 17 ? 'selected' : null }} value="17">MODO BASS (IK Multimedia)</option>
                                                    <option {{ $profile["equipment_maker_id_{$i}"] == 26 ? 'selected' : null }} value="26">Organic Fingered Bass (Fujiya Instruments)</option>
                                                    <option {{ $profile["equipment_maker_id_{$i}"] == 27 ? 'selected' : null }} value="27">Organic Picked Bass (Fujiya Instruments)</option>
                                                    <option {{ $profile["equipment_maker_id_{$i}"] == 22 ? 'selected' : null }} value="22">Scabee Pre Bass (Native Instruments)</option>
                                                    <option {{ $profile["equipment_maker_id_{$i}"] == 23 ? 'selected' : null }} value="23">Scarbee Jay-Bass (Native Instruments)</option>
                                                    <option {{ $profile["equipment_maker_id_{$i}"] == 21 ? 'selected' : null }} value="21">Scarbee MM Bass (Native Instruments)</option>
                                                    <option {{ $profile["equipment_maker_id_{$i}"] == 24 ? 'selected' : null }} value="24">Scarbee Rickenbacker Bass (Native Instruments)</option>
                                                    <option {{ $profile["equipment_maker_id_{$i}"] == 29 ? 'selected' : null }} value="29">SR5 (Prominy)</option>
                                                    <option {{ $profile["equipment_maker_id_{$i}"] == 16 ? 'selected' : null }} value="16">Trilian (SPECTRASONICS)</option>
                                                    <option {{ $profile["equipment_maker_id_{$i}"] == 20 ? 'selected' : null }} value="20">Virtual Bassist Rowdy (UJAM)</option>
                                                    <option {{ $profile["equipment_maker_id_{$i}"] == 31 ? 'selected' : null }} value="31">その他</option>
                                                    <option {{ $profile["equipment_maker_id_{$i}"] == 30 ? 'selected' : null }} value="30">生演奏</option>
                                                    @break
                                                @case('3')
                                                    <option {{ $profile["equipment_maker_id_{$i}"] == 32 ? 'selected' : null }} value="32">Addictive Keys (XLN Audio)</option>
                                                    <option {{ $profile["equipment_maker_id_{$i}"] == 35 ? 'selected' : null }} value="35">EZ Keys (Toontrack)</option>
                                                    <option {{ $profile["equipment_maker_id_{$i}"] == 41 ? 'selected' : null }} value="41">Grand Rhapsody Piano (Waves)</option>
                                                    <option {{ $profile["equipment_maker_id_{$i}"] == 33 ? 'selected' : null }} value="33">IvoryⅡ (Synthogy)</option>
                                                    <option {{ $profile["equipment_maker_id_{$i}"] == 40 ? 'selected' : null }} value="40">Keyscape (Spectrasonics)</option>
                                                    <option {{ $profile["equipment_maker_id_{$i}"] == 37 ? 'selected' : null }} value="37">NAlicia's Key (Native Instruments)</option>
                                                    <option {{ $profile["equipment_maker_id_{$i}"] == 34 ? 'selected' : null }} value="34">Pianoteq 6 (Modartt)</option>
                                                    <option {{ $profile["equipment_maker_id_{$i}"] == 42 ? 'selected' : null }} value="42">Ravenscroft 275 (Ⅵ Labs)</option>
                                                    <option {{ $profile["equipment_maker_id_{$i}"] == 39 ? 'selected' : null }} value="39">The Giant (Native Instruments)</option>
                                                    <option {{ $profile["equipment_maker_id_{$i}"] == 36 ? 'selected' : null }} value="36">The Grandeur (Native Instruments)</option>
                                                    <option {{ $profile["equipment_maker_id_{$i}"] == 38 ? 'selected' : null }} value="38">The Meverick (Native Instruments)</option>
                                                    <option {{ $profile["equipment_maker_id_{$i}"] == 43 ? 'selected' : null }} value="43">その他</option>
                                                    @break
                                                @case('4')
                                                    <option {{ $profile["equipment_maker_id_{$i}"] == 51 ? 'selected' : null }}  value="51">Chamber Strings (Spitfire)</option>
                                                    <option {{ $profile["equipment_maker_id_{$i}"] == 49 ? 'selected' : null }}  value="49">CINEMATIC STRINGS (CINEMATIC STUDIO SERIES)</option>
                                                    <option {{ $profile["equipment_maker_id_{$i}"] == 46 ? 'selected' : null }}  value="46">Hollywood Strings (EastWest)</option>
                                                    <option {{ $profile["equipment_maker_id_{$i}"] == 48 ? 'selected' : null }}  value="48">LA SCORING STRINGS (Audiobro)</option>
                                                    <option {{ $profile["equipment_maker_id_{$i}"] == 54 ? 'selected' : null }}  value="54">Miroslav Philharmonik (IK Multimedia)</option>
                                                    <option {{ $profile["equipment_maker_id_{$i}"] == 50 ? 'selected' : null }}  value="50">Orchestral Companion Strings (SONiVOX)</option>
                                                    <option {{ $profile["equipment_maker_id_{$i}"] == 53 ? 'selected' : null }}  value="53">Orchestral Essentials (PROJECT SAM)</option>
                                                    <option {{ $profile["equipment_maker_id_{$i}"] == 44 ? 'selected' : null }}  value="44">SessionStrings (Native Instruments)</option>
                                                    <option {{ $profile["equipment_maker_id_{$i}"] == 45 ? 'selected' : null }}  value="45">Symphonic Orchestra (EastWest)</option>
                                                    <option {{ $profile["equipment_maker_id_{$i}"] == 52 ? 'selected' : null }}  value="52">Symphonic Strings (Spitfire)</option>
                                                    <option {{ $profile["equipment_maker_id_{$i}"] == 47 ? 'selected' : null }}  value="47">Vienna (Vienna Instruments)</option>
                                                    <option {{ $profile["equipment_maker_id_{$i}"] == 55 ? 'selected' : null }}  value="55">その他</option>
                                                    @break
                                                @case('5')
                                                    <option {{ $profile["equipment_maker_id_{$i}"] == 65 ? 'selected' : null }} value="65">Avenger (Vengeance)</option>
                                                    <option {{ $profile["equipment_maker_id_{$i}"] == 68 ? 'selected' : null }} value="68">Falcon (UVI)</option>
                                                    <option {{ $profile["equipment_maker_id_{$i}"] == 57 ? 'selected' : null }} value="57">Hybrid3 (Air Music Technology)</option>
                                                    <option {{ $profile["equipment_maker_id_{$i}"] == 60 ? 'selected' : null }} value="60">Massive (Native Instruments)</option>
                                                    <option {{ $profile["equipment_maker_id_{$i}"] == 64 ? 'selected' : null }} value="64">Nexus2 (reFX)</option>
                                                    <option {{ $profile["equipment_maker_id_{$i}"] == 63 ? 'selected' : null }} value="63">Omnisphere2 (Spectrasonics)</option>
                                                    <option {{ $profile["equipment_maker_id_{$i}"] == 58 ? 'selected' : null }} value="58">Pigments (Aituria)</option>
                                                    <option {{ $profile["equipment_maker_id_{$i}"] == 59 ? 'selected' : null }} value="59">Serum (Xfer)</option>
                                                    <option {{ $profile["equipment_maker_id_{$i}"] == 61 ? 'selected' : null }} value="61">Spire (Reveal Sound)</option>
                                                    <option {{ $profile["equipment_maker_id_{$i}"] == 62 ? 'selected' : null }} value="62">Sylenth1 (Lennar Digital)</option>
                                                    <option {{ $profile["equipment_maker_id_{$i}"] == 66 ? 'selected' : null }} value="66">SynthMaster (KV331)</option>
                                                    <option {{ $profile["equipment_maker_id_{$i}"] == 67 ? 'selected' : null }} value="67">SynthMaster One (KV331)</option>
                                                    <option {{ $profile["equipment_maker_id_{$i}"] == 56 ? 'selected' : null }} value="56">Xpand!2 (Air Music Technology)</option>
                                                    <option {{ $profile["equipment_maker_id_{$i}"] == 69 ? 'selected' : null }} value="69">その他</option>
                                                    @break
                                                @case('6')
                                                    <option {{ $profile["equipment_maker_id_{$i}"] == 70 ? 'selected' : null }} value="70">Addictive Drums (XLN Audio)</option>
                                                    <option {{ $profile["equipment_maker_id_{$i}"] == 73 ? 'selected' : null }} value="73">Battery (Native Instruments)</option>
                                                    <option {{ $profile["equipment_maker_id_{$i}"] == 71 ? 'selected' : null }} value="71">BFD3 (FXpansion)</option>
                                                    <option {{ $profile["equipment_maker_id_{$i}"] == 76 ? 'selected' : null }} value="76">EZ Drummer (Toontrack)</option>
                                                    <option {{ $profile["equipment_maker_id_{$i}"] == 77 ? 'selected' : null }} value="77">Groove Agent (Steinberg)</option>
                                                    <option {{ $profile["equipment_maker_id_{$i}"] == 78 ? 'selected' : null }} value="78">KICK2 (Sonic Academy)</option>
                                                    <option {{ $profile["equipment_maker_id_{$i}"] == 75 ? 'selected' : null }} value="75">SSD5 (Steven Slate Drums)</option>
                                                    <option {{ $profile["equipment_maker_id_{$i}"] == 74 ? 'selected' : null }} value="74">Studio Drummer (Native Instruments)</option>
                                                    <option {{ $profile["equipment_maker_id_{$i}"] == 79 ? 'selected' : null }} value="79">Stylus (Spectrasonics)</option>
                                                    <option {{ $profile["equipment_maker_id_{$i}"] == 72 ? 'selected' : null }} value="72">SUPERIOR DRUMMER (Toontrack)</option>
                                                    <option {{ $profile["equipment_maker_id_{$i}"] == 80 ? 'selected' : null }} value="80">その他</option>
                                                    @break
                                                @case('7')
                                                    <option {{ $profile["equipment_maker_id_{$i}"] == 89 ? 'selected' : null }} value="89">A.O.M.</option>
                                                    <option {{ $profile["equipment_maker_id_{$i}"] == 91 ? 'selected' : null }} value="91">Brainworx</option>
                                                    <option {{ $profile["equipment_maker_id_{$i}"] == 88 ? 'selected' : null }} value="88">EVENTIDE</option>
                                                    <option {{ $profile["equipment_maker_id_{$i}"] == 83 ? 'selected' : null }} value="83">FabFilter</option>
                                                    <option {{ $profile["equipment_maker_id_{$i}"] == 90 ? 'selected' : null }} value="90">IK Multimedia</option>
                                                    <option {{ $profile["equipment_maker_id_{$i}"] == 82 ? 'selected' : null }} value="82">iZotepe</option>
                                                    <option {{ $profile["equipment_maker_id_{$i}"] == 92 ? 'selected' : null }} value="92">Nugen Audio</option>
                                                    <option {{ $profile["equipment_maker_id_{$i}"] == 87 ? 'selected' : null }} value="87">OVERLOUD</option>
                                                    <option {{ $profile["equipment_maker_id_{$i}"] == 85 ? 'selected' : null }} value="85">SLATE DIGITAL</option>
                                                    <option {{ $profile["equipment_maker_id_{$i}"] == 84 ? 'selected' : null }} value="84">SONNOX OXFORD</option>
                                                    <option {{ $profile["equipment_maker_id_{$i}"] == 86 ? 'selected' : null }} value="86">TC ELECTRONIC</option>
                                                    <option {{ $profile["equipment_maker_id_{$i}"] == 81 ? 'selected' : null }} value="81">waves</option>
                                                    <option {{ $profile["equipment_maker_id_{$i}"] == 93 ? 'selected' : null }} value="93">その他</option>
                                                    @break
                                                @case('8')
                                                    <option {{ $profile["equipment_maker_id_{$i}"] == 100 ? 'selected' : null }} value="100">AKG</option>
                                                    <option {{ $profile["equipment_maker_id_{$i}"] == 98 ? 'selected' : null }} value="98">Audio-Technica</option>
                                                    <option {{ $profile["equipment_maker_id_{$i}"] == 96 ? 'selected' : null }} value="96">AUDIX</option>
                                                    <option {{ $profile["equipment_maker_id_{$i}"] == 103 ? 'selected' : null }} value="103">Behringer</option>
                                                    <option {{ $profile["equipment_maker_id_{$i}"] == 99 ? 'selected' : null }} value="99">Blue</option>
                                                    <option {{ $profile["equipment_maker_id_{$i}"] == 102 ? 'selected' : null }} value="102">MXL</option>
                                                    <option {{ $profile["equipment_maker_id_{$i}"] == 97 ? 'selected' : null }} value="97">RODE</option>
                                                    <option {{ $profile["equipment_maker_id_{$i}"] == 95 ? 'selected' : null }} value="95">SENNHEISER</option>
                                                    <option {{ $profile["equipment_maker_id_{$i}"] == 94 ? 'selected' : null }} value="94">Shure</option>
                                                    <option {{ $profile["equipment_maker_id_{$i}"] == 101 ? 'selected' : null }} value="101">SONY</option>
                                                    <option {{ $profile["equipment_maker_id_{$i}"] == 276 ? 'selected' : null }} value="276">その他</option>
                                                    @break
                                                @case('9')
                                                    <option {{ $profile["equipment_maker_id_{$i}"] == 109 ? 'selected' : null }} value="109">AIAIAI</option>
                                                    <option {{ $profile["equipment_maker_id_{$i}"] == 107 ? 'selected' : null }} value="107">AKG</option>
                                                    <option {{ $profile["equipment_maker_id_{$i}"] == 106 ? 'selected' : null }} value="106">Audio Technica</option>
                                                    <option {{ $profile["equipment_maker_id_{$i}"] == 111 ? 'selected' : null }} value="111">beyerdynamic</option>
                                                    <option {{ $profile["equipment_maker_id_{$i}"] == 110 ? 'selected' : null }} value="110">CLASSIC PRO</option>
                                                    <option {{ $profile["equipment_maker_id_{$i}"] == 113 ? 'selected' : null }} value="113">DIRECT SOUND</option>
                                                    <option {{ $profile["equipment_maker_id_{$i}"] == 114 ? 'selected' : null }} value="114">PHONON</option>
                                                    <option {{ $profile["equipment_maker_id_{$i}"] == 112 ? 'selected' : null }} value="112">SENNHEISER</option>
                                                    <option {{ $profile["equipment_maker_id_{$i}"] == 108 ? 'selected' : null }} value="108">SHURE</option>
                                                    <option {{ $profile["equipment_maker_id_{$i}"] == 115 ? 'selected' : null }} value="115">Shure</option>
                                                    <option {{ $profile["equipment_maker_id_{$i}"] == 104 ? 'selected' : null }} value="104">SONY</option>
                                                    <option {{ $profile["equipment_maker_id_{$i}"] == 105 ? 'selected' : null }} value="105">YAMAHA</option>
                                                    <option {{ $profile["equipment_maker_id_{$i}"] == 277 ? 'selected' : null }} value="277">その他</option>
                                                    @break
                                                @case('10')
                                                    <option {{ $profile["equipment_maker_id_{$i}"] == 123 ? 'selected' : null }} value="123">Ableton Live</option>
                                                    <option {{ $profile["equipment_maker_id_{$i}"] == 116 ? 'selected' : null }} value="116">BitWig Studio</option>
                                                    <option {{ $profile["equipment_maker_id_{$i}"] == 121 ? 'selected' : null }} value="121">Cakewalke</option>
                                                    <option {{ $profile["equipment_maker_id_{$i}"] == 126 ? 'selected' : null }} value="126">Cubase</option>
                                                    <option {{ $profile["equipment_maker_id_{$i}"] == 118 ? 'selected' : null }} value="118">Digital Performer</option>
                                                    <option {{ $profile["equipment_maker_id_{$i}"] == 122 ? 'selected' : null }} value="122">FL Studio</option>
                                                    <option {{ $profile["equipment_maker_id_{$i}"] == 124 ? 'selected' : null }} value="124">Logic</option>
                                                    <option {{ $profile["equipment_maker_id_{$i}"] == 120 ? 'selected' : null }} value="120">Pro Tools</option>
                                                    <option {{ $profile["equipment_maker_id_{$i}"] == 119 ? 'selected' : null }} value="119">Reaper</option>
                                                    <option {{ $profile["equipment_maker_id_{$i}"] == 117 ? 'selected' : null }} value="117">Reason</option>
                                                    <option {{ $profile["equipment_maker_id_{$i}"] == 125 ? 'selected' : null }} value="125">Studio One</option>
                                                    <option {{ $profile["equipment_maker_id_{$i}"] == 278 ? 'selected' : null }} value="278">その他</option>
                                                    @break
                                                @case('11')
                                                    <option {{ $profile["equipment_maker_id_{$i}"] == 145 ? 'selected' : null }} value="145">Antelope Audio</option>
                                                    <option {{ $profile["equipment_maker_id_{$i}"] == 142 ? 'selected' : null }} value="142">Audient</option>
                                                    <option {{ $profile["equipment_maker_id_{$i}"] == 140 ? 'selected' : null }} value="140">Behringer</option>
                                                    <option {{ $profile["equipment_maker_id_{$i}"] == 141 ? 'selected' : null }} value="141">Focusrite</option>
                                                    <option {{ $profile["equipment_maker_id_{$i}"] == 146 ? 'selected' : null }} value="146">Native Instruments</option>
                                                    <option {{ $profile["equipment_maker_id_{$i}"] == 139 ? 'selected' : null }} value="139">RME</option>
                                                    <option {{ $profile["equipment_maker_id_{$i}"] == 143 ? 'selected' : null }} value="143">Roland</option>
                                                    <option {{ $profile["equipment_maker_id_{$i}"] == 138 ? 'selected' : null }} value="138">Steinberg</option>
                                                    <option {{ $profile["equipment_maker_id_{$i}"] == 144 ? 'selected' : null }} value="144">Universal Audio</option>
                                                    <option {{ $profile["equipment_maker_id_{$i}"] == 279 ? 'selected' : null }} value="279">その他</option>
                                                    @break
                                                @case('12')
                                                    <option {{ $profile["equipment_maker_id_{$i}"] == 147 ? 'selected' : null }} value="147">Mac</option>
                                                    <option {{ $profile["equipment_maker_id_{$i}"] == 148 ? 'selected' : null }} value="148">Windows</option>
                                                    <option {{ $profile["equipment_maker_id_{$i}"] == 280 ? 'selected' : null }} value="280">その他</option>
                                                    @break
                                                @case('13')
                                                    <option {{ $profile["equipment_maker_id_{$i}"] == 151 ? 'selected' : null }} value="151">Acer</option>
                                                    <option {{ $profile["equipment_maker_id_{$i}"] == 149 ? 'selected' : null }} value="149">Apple</option>
                                                    <option {{ $profile["equipment_maker_id_{$i}"] == 162 ? 'selected' : null }} value="162">ASUS</option>
                                                    <option {{ $profile["equipment_maker_id_{$i}"] == 150 ? 'selected' : null }} value="150">BenQ</option>
                                                    <option {{ $profile["equipment_maker_id_{$i}"] == 154 ? 'selected' : null }} value="154">Dell</option>
                                                    <option {{ $profile["equipment_maker_id_{$i}"] == 160 ? 'selected' : null }} value="160">EIZO</option>
                                                    <option {{ $profile["equipment_maker_id_{$i}"] == 159 ? 'selected' : null }} value="159">hp</option>
                                                    <option {{ $profile["equipment_maker_id_{$i}"] == 163 ? 'selected' : null }} value="163">I-O DATA</option>
                                                    <option {{ $profile["equipment_maker_id_{$i}"] == 158 ? 'selected' : null }} value="158">iiyama</option>
                                                    <option {{ $profile["equipment_maker_id_{$i}"] == 165 ? 'selected' : null }} value="165">JAPANNEXT</option>
                                                    <option {{ $profile["equipment_maker_id_{$i}"] == 161 ? 'selected' : null }} value="161">LG Electronics</option>
                                                    <option {{ $profile["equipment_maker_id_{$i}"] == 156 ? 'selected' : null }} value="156">MouseComputer</option>
                                                    <option {{ $profile["equipment_maker_id_{$i}"] == 152 ? 'selected' : null }} value="152">MSI</option>
                                                    <option {{ $profile["equipment_maker_id_{$i}"] == 157 ? 'selected' : null }} value="157">NEC</option>
                                                    <option {{ $profile["equipment_maker_id_{$i}"] == 164 ? 'selected' : null }} value="164">Philips</option>
                                                    <option {{ $profile["equipment_maker_id_{$i}"] == 153 ? 'selected' : null }} value="153">SHARP</option>
                                                    <option {{ $profile["equipment_maker_id_{$i}"] == 155 ? 'selected' : null }} value="155">SONY</option>
                                                    <option {{ $profile["equipment_maker_id_{$i}"] == 281 ? 'selected' : null }} value="281">その他</option>
                                                    @break
                                                @case('24')
                                                    <option {{ $profile["equipment_maker_id_{$i}"] == 129 ? 'selected' : null }} value="129">Aシリーズ (Roland)</option>
                                                    <option {{ $profile["equipment_maker_id_{$i}"] == 134 ? 'selected' : null }} value="134">ImpactLXシリーズ (Nektar)</option>
                                                    <option {{ $profile["equipment_maker_id_{$i}"] == 131 ? 'selected' : null }} value="131">iRigKeysシリーズ (IK Multimedia)</option>
                                                    <option {{ $profile["equipment_maker_id_{$i}"] == 275 ? 'selected' : null }} value="275">KeyLABシリーズ (Arturia)</option>
                                                    <option {{ $profile["equipment_maker_id_{$i}"] == 137 ? 'selected' : null }} value="137">KeyLABシリーズ (Arturia)</option>
                                                    <option {{ $profile["equipment_maker_id_{$i}"] == 130 ? 'selected' : null }} value="130">KeyStationシリーズ (M-Audio)</option>
                                                    <option {{ $profile["equipment_maker_id_{$i}"] == 128 ? 'selected' : null }} value="128">Komplete Kontrolシリーズ (Native Instruments)</option>
                                                    <option {{ $profile["equipment_maker_id_{$i}"] == 135 ? 'selected' : null }} value="135">Launchkeyシリーズ (Novation)</option>
                                                    <option {{ $profile["equipment_maker_id_{$i}"] == 127 ? 'selected' : null }} value="127">MicroKeyシリーズ (KORG)</option>
                                                    <option {{ $profile["equipment_maker_id_{$i}"] == 132 ? 'selected' : null }} value="132">MOTIFシリーズ (YAMAHA)</option>
                                                    <option {{ $profile["equipment_maker_id_{$i}"] == 133 ? 'selected' : null }} value="133">PROシリーズ (Roland)</option>
                                                    <option {{ $profile["equipment_maker_id_{$i}"] == 136 ? 'selected' : null }} value="136">Qシリーズ (Alesis)</option>
                                                    <option {{ $profile["equipment_maker_id_{$i}"] == 292 ? 'selected' : null }} value="292">その他</option>
                                                    @break
                                                @case('14')
                                                    <option {{ $profile["equipment_maker_id_{$i}"] == 175 ? 'selected' : null }} value="175">Adobe Fresco</option>
                                                    <option {{ $profile["equipment_maker_id_{$i}"] == 171 ? 'selected' : null }} value="171">Adobe Illustrator</option>
                                                    <option {{ $profile["equipment_maker_id_{$i}"] == 174 ? 'selected' : null }} value="174">Adobe Photoshop</option>
                                                    <option {{ $profile["equipment_maker_id_{$i}"] == 166 ? 'selected' : null }} value="166">CLIP STUDIO PAINT</option>
                                                    <option {{ $profile["equipment_maker_id_{$i}"] == 167 ? 'selected' : null }} value="167">Corel Painter</option>
                                                    <option {{ $profile["equipment_maker_id_{$i}"] == 179 ? 'selected' : null }} value="179">ibis paint</option>
                                                    <option {{ $profile["equipment_maker_id_{$i}"] == 177 ? 'selected' : null }} value="177">Krita</option>
                                                    <option {{ $profile["equipment_maker_id_{$i}"] == 168 ? 'selected' : null }} value="168">MediBang Paint</option>
                                                    <option {{ $profile["equipment_maker_id_{$i}"] == 169 ? 'selected' : null }} value="169">openCanvas</option>
                                                    <option {{ $profile["equipment_maker_id_{$i}"] == 170 ? 'selected' : null }} value="170">PaintShop Pro</option>
                                                    <option {{ $profile["equipment_maker_id_{$i}"] == 178 ? 'selected' : null }} value="178">Paintstorm Studio</option>
                                                    <option {{ $profile["equipment_maker_id_{$i}"] == 173 ? 'selected' : null }} value="173">Procreate</option>
                                                    <option {{ $profile["equipment_maker_id_{$i}"] == 172 ? 'selected' : null }} value="172">SAI</option>
                                                    <option {{ $profile["equipment_maker_id_{$i}"] == 282 ? 'selected' : null }} value="282">その他</option>
                                                    @break
                                                @case('15')
                                                    <option {{ $profile["equipment_maker_id_{$i}"] == 189 ? 'selected' : null }} value="189">ARTISUL</option>
                                                    <option {{ $profile["equipment_maker_id_{$i}"] == 188 ? 'selected' : null }} value="188">GAOMON</option>
                                                    <option {{ $profile["equipment_maker_id_{$i}"] == 186 ? 'selected' : null }} value="186">Hanvon Ugee</option>
                                                    <option {{ $profile["equipment_maker_id_{$i}"] == 187 ? 'selected' : null }} value="187">HUION</option>
                                                    <option {{ $profile["equipment_maker_id_{$i}"] == 181 ? 'selected' : null }} value="181">iPad</option>
                                                    <option {{ $profile["equipment_maker_id_{$i}"] == 182 ? 'selected' : null }} value="182">iPad Air</option>
                                                    <option {{ $profile["equipment_maker_id_{$i}"] == 183 ? 'selected' : null }} value="183">iPad Pro</option>
                                                    <option {{ $profile["equipment_maker_id_{$i}"] == 190 ? 'selected' : null }} value="190">RAYWOOD</option>
                                                    <option {{ $profile["equipment_maker_id_{$i}"] == 184 ? 'selected' : null }} value="184">Surface</option>
                                                    <option {{ $profile["equipment_maker_id_{$i}"] == 185 ? 'selected' : null }} value="185">Wacom</option>
                                                    <option {{ $profile["equipment_maker_id_{$i}"] == 180 ? 'selected' : null }} value="180">Xiaomi Pad</option>
                                                    <option {{ $profile["equipment_maker_id_{$i}"] == 283 ? 'selected' : null }} value="283">その他</option>
                                                    @break
                                                @case('16')
                                                    <option {{ $profile["equipment_maker_id_{$i}"] == 191 ? 'selected' : null }} value="191">Mac</option>
                                                    <option {{ $profile["equipment_maker_id_{$i}"] == 192 ? 'selected' : null }} value="192">Windows</option>
                                                    <option {{ $profile["equipment_maker_id_{$i}"] == 284 ? 'selected' : null }} value="284">その他</option>
                                                    @break
                                                @case('17')
                                                    <option {{ $profile["equipment_maker_id_{$i}"] == 195 ? 'selected' : null }} value="195">Acer</option>
                                                    <option {{ $profile["equipment_maker_id_{$i}"] == 193 ? 'selected' : null }} value="193">Apple</option>
                                                    <option {{ $profile["equipment_maker_id_{$i}"] == 206 ? 'selected' : null }} value="206">ASUS</option>
                                                    <option {{ $profile["equipment_maker_id_{$i}"] == 194 ? 'selected' : null }} value="194">BenQ</option>
                                                    <option {{ $profile["equipment_maker_id_{$i}"] == 198 ? 'selected' : null }} value="198">Dell</option>
                                                    <option {{ $profile["equipment_maker_id_{$i}"] == 204 ? 'selected' : null }} value="204">EIZO</option>
                                                    <option {{ $profile["equipment_maker_id_{$i}"] == 203 ? 'selected' : null }} value="203">hp</option>
                                                    <option {{ $profile["equipment_maker_id_{$i}"] == 207 ? 'selected' : null }} value="207">I-O DATA</option>
                                                    <option {{ $profile["equipment_maker_id_{$i}"] == 202 ? 'selected' : null }} value="202">iiyama</option>
                                                    <option {{ $profile["equipment_maker_id_{$i}"] == 209 ? 'selected' : null }} value="209">JAPANNEXT</option>
                                                    <option {{ $profile["equipment_maker_id_{$i}"] == 205 ? 'selected' : null }} value="205">LG Electronics</option>
                                                    <option {{ $profile["equipment_maker_id_{$i}"] == 200 ? 'selected' : null }} value="200">MouseComputer</option>
                                                    <option {{ $profile["equipment_maker_id_{$i}"] == 196 ? 'selected' : null }} value="196">MSI</option>
                                                    <option {{ $profile["equipment_maker_id_{$i}"] == 201 ? 'selected' : null }} value="201">NEC</option>
                                                    <option {{ $profile["equipment_maker_id_{$i}"] == 208 ? 'selected' : null }} value="208">Philips</option>
                                                    <option {{ $profile["equipment_maker_id_{$i}"] == 197 ? 'selected' : null }} value="197">SHARP</option>
                                                    <option {{ $profile["equipment_maker_id_{$i}"] == 199 ? 'selected' : null }} value="199">SONY</option>
                                                    <option {{ $profile["equipment_maker_id_{$i}"] == 285 ? 'selected' : null }} value="285">その他</option>
                                                    @break
                                                @case('18')
                                                    <option {{ $profile["equipment_maker_id_{$i}"] == 219 ? 'selected' : null }} value="219">Adobe After Effects</option>
                                                    <option {{ $profile["equipment_maker_id_{$i}"] == 222 ? 'selected' : null }} value="222">Adobe Character Animator</option>
                                                    <option {{ $profile["equipment_maker_id_{$i}"] == 211 ? 'selected' : null }} value="211">Adobe Premiere Pro</option>
                                                    <option {{ $profile["equipment_maker_id_{$i}"] == 215 ? 'selected' : null }} value="215">AviUtl</option>
                                                    <option {{ $profile["equipment_maker_id_{$i}"] == 221 ? 'selected' : null }} value="221">Blender</option>
                                                    <option {{ $profile["equipment_maker_id_{$i}"] == 213 ? 'selected' : null }} value="213">Corel VideoStudio</option>
                                                    <option {{ $profile["equipment_maker_id_{$i}"] == 212 ? 'selected' : null }} value="212">DaVinci Resolve</option>
                                                    <option {{ $profile["equipment_maker_id_{$i}"] == 220 ? 'selected' : null }} value="220">FinalCut Pro</option>
                                                    <option {{ $profile["equipment_maker_id_{$i}"] == 216 ? 'selected' : null }} value="216">iMovie</option>
                                                    <option {{ $profile["equipment_maker_id_{$i}"] == 217 ? 'selected' : null }} value="217">Lightworks</option>
                                                    <option {{ $profile["equipment_maker_id_{$i}"] == 214 ? 'selected' : null }} value="214">Pinnacle Studio</option>
                                                    <option {{ $profile["equipment_maker_id_{$i}"] == 210 ? 'selected' : null }} value="210">PowerDirector</option>
                                                    <option {{ $profile["equipment_maker_id_{$i}"] == 218 ? 'selected' : null }} value="218">VEGAS</option>
                                                    <option {{ $profile["equipment_maker_id_{$i}"] == 286 ? 'selected' : null }} value="286">その他</option>
                                                    @break
                                                @case('19')
                                                    <option {{ $profile["equipment_maker_id_{$i}"] == 232 ? 'selected' : null }} value="232">Adobe Fresco</option>
                                                    <option {{ $profile["equipment_maker_id_{$i}"] == 228 ? 'selected' : null }} value="228">Adobe Illustrator</option>
                                                    <option {{ $profile["equipment_maker_id_{$i}"] == 231 ? 'selected' : null }} value="231">Adobe Photoshop</option>
                                                    <option {{ $profile["equipment_maker_id_{$i}"] == 223 ? 'selected' : null }} value="223">CLIP STUDIO PAINT</option>
                                                    <option {{ $profile["equipment_maker_id_{$i}"] == 224 ? 'selected' : null }} value="224">Corel Painter</option>
                                                    <option {{ $profile["equipment_maker_id_{$i}"] == 236 ? 'selected' : null }} value="236">ibis paint</option>
                                                    <option {{ $profile["equipment_maker_id_{$i}"] == 234 ? 'selected' : null }} value="234">Krita</option>
                                                    <option {{ $profile["equipment_maker_id_{$i}"] == 225 ? 'selected' : null }} value="225">MediBang Paint</option>
                                                    <option {{ $profile["equipment_maker_id_{$i}"] == 226 ? 'selected' : null }} value="226">openCanvas</option>
                                                    <option {{ $profile["equipment_maker_id_{$i}"] == 227 ? 'selected' : null }} value="227">PaintShop Pro</option>
                                                    <option {{ $profile["equipment_maker_id_{$i}"] == 235 ? 'selected' : null }} value="235">Paintstorm Studio</option>
                                                    <option {{ $profile["equipment_maker_id_{$i}"] == 230 ? 'selected' : null }} value="230">Procreate</option>
                                                    <option {{ $profile["equipment_maker_id_{$i}"] == 229 ? 'selected' : null }} value="229">SAI</option>
                                                    <option {{ $profile["equipment_maker_id_{$i}"] == 287 ? 'selected' : null }} value="287">その他</option>
                                                    @break
                                                @case('20')
                                                    <option {{ $profile["equipment_maker_id_{$i}"] == 240 ? 'selected' : null }} value="240">Canon</option>
                                                    <option {{ $profile["equipment_maker_id_{$i}"] == 244 ? 'selected' : null }} value="244">FUJIFILM</option>
                                                    <option {{ $profile["equipment_maker_id_{$i}"] == 239 ? 'selected' : null }} value="239">JVC KENWOOD</option>
                                                    <option {{ $profile["equipment_maker_id_{$i}"] == 241 ? 'selected' : null }} value="241">Nikon</option>
                                                    <option {{ $profile["equipment_maker_id_{$i}"] == 242 ? 'selected' : null }} value="242">OLYMPUS</option>
                                                    <option {{ $profile["equipment_maker_id_{$i}"] == 238 ? 'selected' : null }} value="238">Panasonic</option>
                                                    <option {{ $profile["equipment_maker_id_{$i}"] == 243 ? 'selected' : null }} value="243">PENTAX</option>
                                                    <option {{ $profile["equipment_maker_id_{$i}"] == 237 ? 'selected' : null }} value="237">SONY</option>
                                                    <option {{ $profile["equipment_maker_id_{$i}"] == 288 ? 'selected' : null }} value="288">その他</option>
                                                    @break
                                                @case('21')
                                                    <option {{ $profile["equipment_maker_id_{$i}"] == 254 ? 'selected' : null }} value="254">ARTISUL</option>
                                                    <option {{ $profile["equipment_maker_id_{$i}"] == 253 ? 'selected' : null }} value="253">GAOMON</option>
                                                    <option {{ $profile["equipment_maker_id_{$i}"] == 251 ? 'selected' : null }} value="251">Hanvon Ugee</option>
                                                    <option {{ $profile["equipment_maker_id_{$i}"] == 252 ? 'selected' : null }} value="252">HUION</option>
                                                    <option {{ $profile["equipment_maker_id_{$i}"] == 246 ? 'selected' : null }} value="246">iPad</option>
                                                    <option {{ $profile["equipment_maker_id_{$i}"] == 247 ? 'selected' : null }} value="247">iPad Air</option>
                                                    <option {{ $profile["equipment_maker_id_{$i}"] == 248 ? 'selected' : null }} value="248">iPad Pro</option>
                                                    <option {{ $profile["equipment_maker_id_{$i}"] == 255 ? 'selected' : null }} value="255">RAYWOOD</option>
                                                    <option {{ $profile["equipment_maker_id_{$i}"] == 249 ? 'selected' : null }} value="249">Surface</option>
                                                    <option {{ $profile["equipment_maker_id_{$i}"] == 250 ? 'selected' : null }} value="250">Wacom</option>
                                                    <option {{ $profile["equipment_maker_id_{$i}"] == 245 ? 'selected' : null }} value="245">Xiaomi Pad</option>
                                                    <option {{ $profile["equipment_maker_id_{$i}"] == 289 ? 'selected' : null }} value="289">その他</option>
                                                    @break
                                                @case('22')
                                                    <option {{ $profile["equipment_maker_id_{$i}"] == 256 ? 'selected' : null }} value="256">Mac</option>
                                                    <option {{ $profile["equipment_maker_id_{$i}"] == 257 ? 'selected' : null }} value="257">Windows</option>
                                                    <option {{ $profile["equipment_maker_id_{$i}"] == 290 ? 'selected' : null }} value="290">その他</option>
                                                    @break
                                                @case('23')
                                                    <option {{ $profile["equipment_maker_id_{$i}"] == 260 ? 'selected' : null }} value="260">Acer</option>
                                                    <option {{ $profile["equipment_maker_id_{$i}"] == 258 ? 'selected' : null }} value="258">Apple</option>
                                                    <option {{ $profile["equipment_maker_id_{$i}"] == 271 ? 'selected' : null }} value="271">ASUS</option>
                                                    <option {{ $profile["equipment_maker_id_{$i}"] == 259 ? 'selected' : null }} value="259">BenQ</option>
                                                    <option {{ $profile["equipment_maker_id_{$i}"] == 263 ? 'selected' : null }} value="263">Dell</option>
                                                    <option {{ $profile["equipment_maker_id_{$i}"] == 269 ? 'selected' : null }} value="269">EIZO</option>
                                                    <option {{ $profile["equipment_maker_id_{$i}"] == 268 ? 'selected' : null }} value="268">hp</option>
                                                    <option {{ $profile["equipment_maker_id_{$i}"] == 272 ? 'selected' : null }} value="272">I-O DATA</option>
                                                    <option {{ $profile["equipment_maker_id_{$i}"] == 267 ? 'selected' : null }} value="267">iiyama</option>
                                                    <option {{ $profile["equipment_maker_id_{$i}"] == 274 ? 'selected' : null }} value="274">JAPANNEXT</option>
                                                    <option {{ $profile["equipment_maker_id_{$i}"] == 270 ? 'selected' : null }} value="270">LG Electronics</option>
                                                    <option {{ $profile["equipment_maker_id_{$i}"] == 265 ? 'selected' : null }} value="265">MouseComputer</option>
                                                    <option {{ $profile["equipment_maker_id_{$i}"] == 261 ? 'selected' : null }} value="261">MSI</option>
                                                    <option {{ $profile["equipment_maker_id_{$i}"] == 266 ? 'selected' : null }} value="266">NEC</option>
                                                    <option {{ $profile["equipment_maker_id_{$i}"] == 273 ? 'selected' : null }} value="273">Philips</option>
                                                    <option {{ $profile["equipment_maker_id_{$i}"] == 262 ? 'selected' : null }} value="262">SHARP</option>
                                                    <option {{ $profile["equipment_maker_id_{$i}"] == 264 ? 'selected' : null }} value="264">SONY</option>
                                                    <option {{ $profile["equipment_maker_id_{$i}"] == 291 ? 'selected' : null }} value="291">その他</option>
                                                    @break
                                                @default
                                            @endswitch

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

                        {{-- 上のフォームが0個の場合、デフォルトのフォームを１つ表示する --}}
                        @if ( $count_equipment_form == 0 )
                        <div id="used-items-form-1" class="posted-desk-card-used-items">
                            <select class="select-items-logo" name="equipment_id_1" onchange="changeSelectForUsedItem(this)">
                                <option value="">カテゴリ</option>
                                {{-- クリエイタータイプが音楽の場合 --}}
                                @if ( $profile["creator_type"] == '音楽' )
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
                                <option value="12">OS</option>
                                <option value="13">monitor</option>
                                <option value="24">MIDI keyboard</option>
                                {{-- イラストの場合 --}}
                                @elseif( $profile["creator_type"] == 'イラスト' )
                                <option value="14">illust soft</option>
                                <option value="15">tablet</option>
                                <option value="16">OS</option>
                                <option value="17">moitor</option>
                                {{-- 動画の場合 --}}
                                @elseif( $profile["creator_type"] == '動画' )
                                <option value="18">movie soft</option>
                                <option value="19">illust soft</option>
                                <option value="20">camera</option>
                                <option value="21">tablet</option>
                                <option value="22">OS</option>
                                <option value="23">moitor</option>
                                @endif
                            </select>
                            <div class="myprofile-edit-used-items-exp">
                                <select id="equipment_maker_id_1" class="myprofile-edit-used-items" name="equipment_maker_id_1">
                                    <option value="">使用機材を選択</option>
                                </select>
                                <div class="myprofile-edit-items-url">
                                    <input type="text" value="" name="equipment_url_1" placeholder="使用機材のURLを入力">
                                </div>
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
                <input class="add-button sink-button circle-button mouse-hover-pointer" type="button" onclick="addForm()" value="+">
                <input class="remove-button sink-button circle-button mouse-hover-pointer" type="button" onclick="removeForm()" value="-">
            </div>
            <div class="publish-radio-button">
                <input name="publish_flag" type="radio" value="1" {{ $profile["publish_flag"] == 1 ? 'checked' : null}}>プロフィールを公開
                <input name="publish_flag" type="radio" value="0" {{ $profile["publish_flag"] == 0 ? 'checked' : null}}>非公開
            </div>
            <input id="update-button" class="myprofile-edit-submit sink-button mouse-hover-pointer" type="button" value="更新" onclick="blockDoubleSubmit(this)">
        </form>
    </div>

@endsection

@section('add_script')
<script>
    function blockDoubleSubmit(btn){
        btn.disabled=true;
    }
</script>
<script>

</script>
<script src="{{ asset('js/mypage.js') }}"></script>
<script type="text/javascript" src="{{ asset( 'js/ajax.js') }}" ></script>

<script>
    let cropedImageURL = "";
    let top_img_tag = document.getElementById('show-selected-img');
    let upload_img = document.getElementById('croped-base64-profile-icon');

    const cvs = document.getElementById( 'cvs' );
    const cw = cvs.width;
    const ch = cvs.height;
    const out = document.getElementById( 'out' );
    const oh = out.height;
    const ow = out.width;

    let ix = 0;    // 中心座標
    let iy = 0;
    let v = 1.0;   // 拡大縮小率
    const img  = new Image();
    img.onload = function( _ev ){   // 画像が読み込まれた
        ix = img.width  / 2;
        iy = img.height / 2;
        let scl = parseInt( cw / img.width * 100 );
        document.getElementById( 'scal' ).value = scl;
        scaling( scl );
    }
    function load_img( _url ){  // 画像の読み込み
        // ファイルが選択されていなければなにもしない
        if ( !_url || select_upload_img_buttotn.files[0] == undefined) return;
        img.src = (_url)
    }

    load_img();
    function scaling( _v ) {        // スライダーが変わった
        v = parseInt( _v ) * 0.01;
        draw_canvas( ix, iy );      // 画像更新
    }

    function draw_canvas( _x, _y ){     // 画像更新
        const ctx = cvs.getContext( '2d' );
        ctx.fillStyle = 'rgb(200, 200, 200)';
        ctx.fillRect( 0, 0, cw, ch );   // 背景を塗る
        ctx.drawImage( img,
            0, 0, img.width, img.height,
            (cw/2)-_x*v, (ch/2)-_y*v, img.width*v, img.height*v,
        );
        ctx.strokeStyle = 'rgba(200, 0, 0, 0.8)';
        ctx.strokeRect( (cw-ow)/2, (ch-oh)/2, ow, oh ); // 赤い枠
    }

    function crop_img(){                // 画像切り取り
        const ctx = out.getContext( '2d' );
        ctx.fillStyle = 'rgb(200, 200, 200)';
        ctx.fillRect( 0, 0, ow, oh );    // 背景を塗る
        ctx.drawImage( img,
            0, 0, img.width, img.height,
            (ow/2)-ix*v, (oh/2)-iy*v, img.width*v, img.height*v,
        );
    }

    // 切り抜いた画像をimgタグに表示

    function toDataURL(){
        cropedImageURL = out.toDataURL();
    }

    function decodeImage(){
        cropedImageURL
    }

    function setURLtoImage(){
        top_img_tag.src = cropedImageURL;
        // type=hiddenのvalueにアップロード用のbase64エンコードimgを登録
        upload_img.value = cropedImageURL;
        console.log(upload_img.value);
    }

    function cropAndSetImage(){
        crop_img();
        toDataURL();
        setURLtoImage();
        closeModalWindow(); //mypage.jsに定義
    }

    let mouse_down = false;      // canvas ドラッグ中フラグ
    let sx = 0;                  // canvas ドラッグ開始位置
    let sy = 0;
    cvs.ontouchstart =
    cvs.onmousedown = function ( _ev ){     // canvas ドラッグ開始位置
        mouse_down = true;
        sx = _ev.pageX;
        sy = _ev.pageY;
        return false; // イベントを伝搬しない
    }
    cvs.ontouchend =
    cvs.onmouseout =
    cvs.onmouseup = function ( _ev ){       // canvas ドラッグ終了位置
        if ( mouse_down == false ) return;
        mouse_down = false;
        draw_canvas( ix += (sx-_ev.pageX)/v, iy += (sy-_ev.pageY)/v );
        return false; // イベントを伝搬しない
    }
    cvs.ontouchmove =
    cvs.onmousemove = function ( _ev ){     // canvas ドラッグ中
        if ( mouse_down == false ) return;
        draw_canvas( ix + (sx-_ev.pageX)/v, iy + (sy-_ev.pageY)/v );
        return false; // イベントを伝搬しない
    }
    cvs.onmousewheel = function ( _ev ){    // canvas ホイールで拡大縮小
        let scl = parseInt( parseInt( document.getElementById( 'scal' ).value ) + _ev.wheelDelta * 0.05 );
        if ( scl < 10  ) scl = 10;
        if ( scl > 400 ) scl = 400;
        document.getElementById( 'scal' ).value = scl;
        scaling( scl );
        return false; // イベントを伝搬しない
    }
</script>
@endsection
