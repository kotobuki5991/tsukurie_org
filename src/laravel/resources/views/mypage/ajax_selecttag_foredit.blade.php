{{-- <select id="equipment_maker_id_{{ $i }}" class="myprofile-edit-used-items" name="equipment_maker_id_{{ $i }}"> --}}
<select id="equipment_maker_id_{{ $ajax_param['id'] }}" class="myprofile-edit-used-items" name="equipment_maker_id_{{ $ajax_param['id'] }}">
    {{-- 初期値入れ方考える --}}
    {{-- ギター用 --}}
    @if ($ajax_param['equipment_id'] == 1)
        <option value="">ギター用</option>
        <option value="">プラグイン・実機選択</option>
        <option value="1">waves</option>
        <option value="2">trillian</option>
    {{-- ベース用 --}}
    @elseif($ajax_param['equipment_id'] == 2)
        <option value="">ベース用</option>
        <option value="">プラグイン・実機選択</option>
        <option value="1">waves</option>
        <option value="2">trillian</option>
    {{-- ピアノ用 --}}
    @elseif($ajax_param['equipment_id'] == 3)
        <option value="">ピアノ用</option>
        <option value="">プラグイン・実機選択</option>
        <option value="1">waves</option>
        <option value="2">trillian</option>
    {{-- ストリングス用 --}}
    @elseif($ajax_param['equipment_id'] == 2)
        <option value="">ベース用</option>
        <option value="">プラグイン・実機選択</option>
        <option value="1">waves</option>
        <option value="2">trillian</option>
    {{-- シンセ用 --}}
    @elseif($ajax_param['equipment_id'] == 3)
        <option value="">ピアノ用</option>
        <option value="">プラグイン・実機選択</option>
        <option value="1">waves</option>
        <option value="2">trillian</option>
    {{-- ベース用 --}}
    @elseif($ajax_param['equipment_id'] == 2)
        <option value="">ベース用</option>
        <option value="">プラグイン・実機選択</option>
        <option value="1">waves</option>
        <option value="2">trillian</option>
    {{-- ピアノ用 --}}
    @elseif($ajax_param['equipment_id'] == 3)
        <option value="">ピアノ用</option>
        <option value="">プラグイン・実機選択</option>
        <option value="1">waves</option>
        <option value="2">trillian</option>
    {{-- ベース用 --}}
    @elseif($ajax_param['equipment_id'] == 2)
        <option value="">ベース用</option>
        <option value="">プラグイン・実機選択</option>
        <option value="1">waves</option>
        <option value="2">trillian</option>
    {{-- ピアノ用 --}}
    @elseif($ajax_param['equipment_id'] == 3)
        <option value="">ピアノ用</option>
        <option value="">プラグイン・実機選択</option>
        <option value="1">waves</option>
        <option value="2">trillian</option>
    {{-- ベース用 --}}
    @elseif($ajax_param['equipment_id'] == 2)
        <option value="">ベース用</option>
        <option value="">プラグイン・実機選択</option>
        <option value="1">waves</option>
        <option value="2">trillian</option>
    {{-- ピアノ用 --}}
    @elseif($ajax_param['equipment_id'] == 3)
        <option value="">ピアノ用</option>
        <option value="">プラグイン・実機選択</option>
        <option value="1">waves</option>
        <option value="2">trillian</option>
    {{-- ベース用 --}}
    @elseif($ajax_param['equipment_id'] == 2)
        <option value="">ベース用</option>
        <option value="">プラグイン・実機選択</option>
        <option value="1">waves</option>
        <option value="2">trillian</option>
    {{-- ピアノ用 --}}
    @elseif($ajax_param['equipment_id'] == 3)
        <option value="">ピアノ用</option>
        <option value="">プラグイン・実機選択</option>
        <option value="1">waves</option>
        <option value="2">trillian</option>
    @endif
</select>
