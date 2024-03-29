'use strict';

////////////////////////////////////////////
// プロフィール編集ページ
////////////////////////////////////////////

// モーダルウィンドウ関連
// トップ画像用
let modal_window = document.getElementById('modal-window');

function openModalWindow(){
    modal_window.style.display = 'block';
}

function closeModalWindow(){
    modal_window.style.display = 'none';
}


// 画像アップロードフォーム
// 選択した画像を半透明で表示させる

let upload_img_area = document.getElementById('upload-img-area');
let show_selected_img = document.getElementById('show-selected-img');
let select_upload_img_buttotn = document.getElementById('select-upload-img');

let select_upload_user_icon_area = document.getElementById('select-upload-user-icon-button');
let show_selected_user_icon = document.getElementById('show-selected-user-icon');
let select_upload_user_icon_button = document.getElementById('select-upload-user-icon');

// アップロードできるファイルの拡張子を指定
const allow_exts = new Array('jpg', 'jpeg', 'png');


const handleFileSelect = (img, select_tag) => {
    let selected_file = select_tag.files[0];
    // ファイルが選択されていなければ処理しない

    if (selected_file == undefined) return;
    let selected_file_name = selected_file.name;

    // 拡張子を取得（.で区切った配列の最後の要素が拡張子）
    let selected_file_ext = selected_file_name.split('.').slice(-1)[0];
    // ファイルの拡張子がallow_extsと一致しない場合
    if( allow_exts.indexOf(selected_file_ext) === -1 ){
        alert('アップロードできる画像ファイルの拡張子はjpg、jpeg、pngです。');
        return;
    }
    // 画像を表示するimgタグのsrc要素を選択したファイル名に変更
    let fileReader = new FileReader();

    fileReader.readAsDataURL(selected_file);

    fileReader.onload = (event) => {
        img.src = event.target.result;
        console.log('loadImg mypage.js');
        loadImg(img.src);
    }
    openModalWindow();
}

function handleTopImgFileSelect (){
    // console.log('aaaaa');
    handleFileSelect(show_selected_img, select_upload_img_buttotn);
}
function handleUserIconFileSelect (){
    // console.log('aaaaa');
    handleFileSelect(show_selected_user_icon, select_upload_user_icon_button);
}

select_upload_img_buttotn.addEventListener('change', handleTopImgFileSelect);
select_upload_user_icon_button.addEventListener('change', handleUserIconFileSelect);


// アイコン選択////////////////////
// タスク 冗長なので短くする
let show_selected_user_icon_area = document.getElementById('show-selected-user-icon-area');

// グローバル変数、creator_type変更時にリセット
var used_item_form_number;
// 入力欄追加ボタン
if( document.getElementById("used-items-form-area").childElementCount == 0 ){
    used_item_form_number = 1;
}else{
    used_item_form_number = document.getElementById("used-items-form-area").childElementCount;
}


function addForm() {
    // 使用機材入力欄は最大10個まで
    if(used_item_form_number < 10 ){

        let used_item_form = document.getElementById('used-items-form-' + used_item_form_number);

        let add_form = used_item_form.cloneNode(true);

        // 入力欄はdivのidであるused_item_form_number-(フォームNo)で位置を判別
        used_item_form_number++ ;
        add_form.id = 'used-items-form-' + used_item_form_number; //id加算

        let add_form_child = add_form.childNodes;

        // 使用機材のロゴ画像選択用setectタグ取得
        add_form_child[1].name = 'equipment_id_' + used_item_form_number;
        // 初期値（カテゴリを選択）を選択した状態にする
        add_form_child[1].selectedIndex = 0;
        // 使用機材のメーカー、urlフォームを含むdiv取得
        let g_child_add_form = add_form_child[3].childNodes;
        // 使用機材メーカー選択selectタグのname属性の数値加算
        g_child_add_form[1].name = 'equipment_maker_id_' + used_item_form_number;
        g_child_add_form[1].name = 'equipment_maker_id_' + used_item_form_number;
        g_child_add_form[1].id = 'equipment_maker_id_' + used_item_form_number;
        g_child_add_form[1].selectedIndex = 0;

        // 機材のメーカー選択selectタグを初期化
        g_child_add_form[1].innerHTML = '';

        // url入力用textタグ取得
        let input_url_tag = g_child_add_form[3].childNodes;
        input_url_tag[1].name = 'equipment_url_' + used_item_form_number;
        input_url_tag[1].value = '';

        let parent = document.getElementById('used-items-form-area');
        parent.appendChild(add_form);
    }
}

//入力欄削除ボタン
function removeForm() {
    // 使用機材入力欄は最低1個より多く
    if(used_item_form_number > 1 ){
        let used_item_form = document.getElementById('used-items-form-' + used_item_form_number);

        // 入力欄はused_item_form_number-(フォームNo)で位置を判別
        // used_item_form.classList = 'posted-desk-card-used-items  used_item_form_number-' + used_item_form_number;

        let parent = document.getElementById('used-items-form-area');
        parent.removeChild(used_item_form);

        used_item_form_number-- ;
    }
}


let update_form = document.getElementById('update-form');
let update_button = document.getElementById('update-button');

if ( update_button != null ){
    update_button.addEventListener('click', (event) => {
        update_form.submit();
    });
}


