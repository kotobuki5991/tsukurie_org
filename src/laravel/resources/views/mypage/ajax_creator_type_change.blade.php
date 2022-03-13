@switch($ajax_param["equipment_type_id"])
@case(1)
<div id="creator-type" class="posted-deck-category-tag music-tag mouse-hover-transparent">
    <a class="letter-title" href="{{ route('/search', ['creator_type' => 1]) }}"><h4>音楽</h4></a>
</div>
@break
@case(2)
    <div id="creator-type" class="posted-deck-category-tag illust-tag mouse-hover-transparent">
        <a class="letter-title" href="{{ route('/search', ['creator_type' => 2]) }}"><h4>イラスト</h4></a>
    </div>
    @break
@case(3)
    <div id="creator-type" class="posted-deck-category-tag movie-tag mouse-hover-transparent">
        <a class="letter-title" href="{{ route('/search', ['creator_type' => 3]) }}"><h4>動画</h4></a>
    </div>
    @break
@case(4)
    <div id="creator-type" class="posted-deck-category-tag unselected-tag mouse-hover-transparent">
        <a class="letter-title" href="{{ route('/search', ['creator_type' => 4]) }}"><h4>未選択</h4></a>
    </div>
@break
@default
@endswitch
