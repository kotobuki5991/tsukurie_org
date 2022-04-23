// ページの一部だけをreloadする方法
// Ajaxを使う方法
// XMLHttpRequestを使ってAjaxで更新
function ajaxUpdate(url, element) {

    // urlを加工し、キャッシュされないurlにする。
    // url = url + '?ver=' + new Date().getTime();

    // ajaxオブジェクト生成
    let ajax = new XMLHttpRequest;

    // ajax通信open
    ajax.open('GET', url, true);

    // ajax返信時の処理
    ajax.onload = function () {
        // ajax返信から得たHTMLでDOM要素を更新
        element.innerHTML = ajax.responseText;
    };

    // ajax開始
    ajax.send(null);
}

function changeSelectForUsedItem(selected_item){
    let idx = selected_item.selectedIndex;
    let id = selected_item.name.replace('equipment_id_','');
    let value = selected_item.options[idx].value || 'empty'; // 選択されている値

    let url = "/mypage/ajax_selecttag_foredit";
    let url_with_param = url + '/' + value + '/' + id;

    console.log(url_with_param);
    // 変更対象のselectタグを取得
    let select_for_change = document.getElementById('equipment_maker_id_' + id);
    console.log(select_for_change);

    ajaxUpdate(url_with_param, select_for_change);

}





// クリエイターカテゴリ変更で、クリエイタータグと機材選択selectを変更
function changeCreatorType(creator_type){
    let idx = creator_type.selectedIndex;
    let value = creator_type.options[idx].value || 'empty'; // 選択されている値

    // 変更後の出力部品のurl
    let url = "/mypage/ajax_creator_type_change";
    let url_with_param = url + '/' + value;

    console.log(url_with_param);
    // 変更対象のdivタグを取得
    let creator_tag_for_change = document.getElementById('creator-type-tag');
    console.log(creator_tag_for_change);

    ajaxUpdate(url_with_param, creator_tag_for_change);

    // 変更対象のdivタグを取得
    url = "/mypage/ajax_used_item_form_change";
    url_with_param = url + '/' + value;

    let used_items_form_for_change = document.getElementById('used-items-form-area');
    console.log(used_items_form_for_change);

    ajaxUpdate(url_with_param, used_items_form_for_change);

    // mypage.jsのフォームの個数カウンターをリセット
    used_item_form_number = 1;

}



