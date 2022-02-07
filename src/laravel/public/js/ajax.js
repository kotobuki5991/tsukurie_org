// ページの一部だけをreloadする方法
// Ajaxを使う方法
// XMLHttpRequestを使ってAjaxで更新
function ajaxUpdate(url, element) {

    // urlを加工し、キャッシュされないurlにする。
    // url = url + '?ver=' + new Date().getTime();

    // ajaxオブジェクト生成
    var ajax = new XMLHttpRequest;

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
    var idx = selected_item.selectedIndex;
    let id = selected_item.name.replace('equipment_id_','');
    let value = selected_item.options[idx].value || 'empty'; // 選択されている値
    // if (value === "" || value === null || value === undefined) return;

    var url = "/mypage/ajax_selecttag_foredit";
    let url_with_param = url + '/' + value + '/' + id;

    console.log(url_with_param);
    // 変更対象のselectタグを取得
    var select_for_change = document.getElementById('equipment_maker_id_' + id);
    console.log(select_for_change);

    ajaxUpdate(url_with_param, select_for_change);

}


// window.addEventListener('load', function () {

//     var url = "ajax.html";

//     var div = document.getElementById('ajaxreload');

//     setTimeout(function () {
//         ajaxUpdate(url, div);
//     }, 5000);

// });
