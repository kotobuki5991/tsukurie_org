<div id="used-items-form-1" class="posted-desk-card-used-items">
    <select class="select-items-logo" name="equipment_id_1" onchange="changeSelectForUsedItem(this)">
        <option value="">カテゴリ</option>
        {{-- クリエイタータイプが音楽の場合 --}}
        @if ( $ajax_param["equipment_type_id"] == 1 )
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
        @elseif ( $ajax_param["equipment_type_id"] == 2)
            <option value="14">illust soft</option>
            <option value="15">tablet</option>
            <option value="16">OS</option>
            <option value="17">moitor</option>
        {{-- 動画の場合 --}}
        @elseif ( $ajax_param["equipment_type_id"] == 3 )
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
            <input type="text" value="" name="equipment_url_1"
            placeholder="使用機材のURLを入力" value="">
        </div>
    </div>
</div>
