<select id="equipment_maker_id_{{ $ajax_param['select_tag_id'] }}" class="myprofile-edit-used-items" name="equipment_maker_id_{{ $ajax_param['select_tag_id'] }}">
    {{-- Profilecontrollerでequipment_idでeequipment_makerから検索して、結果から選択肢を探す --}}
    <option value="">使用機材を選択</option>
    @foreach ($ajax_param['equipment_makers'] as $equipment_maker)
    <option value="{{ $equipment_maker->id }}">{{ $equipment_maker->equipment_maker }}</option>
    @endforeach
</select>
