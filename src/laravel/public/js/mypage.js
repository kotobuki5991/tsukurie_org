'use strict';

////////////////////////////////////////////
// プロフィール編集ページ
////////////////////////////////////////////

// 画像アップロードフォーム
// 選択した画像を半透明で表示させる

let upload_img_area = document.getElementById('upload-img-area');
let show_selected_img = document.getElementById('show-selected-img');
let select_upload_img_buttotn = document.getElementById('select-upload-img');

// アップロードできるファイルの拡張子を指定
const allow_exts = new Array('jpg', 'jpeg', 'png');

const handleFileSelect = (event) => {
    let selected_file = select_upload_img_buttotn.files[0];
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
        show_selected_img.src = event.target.result
    }
}

select_upload_img_buttotn.addEventListener('change', handleFileSelect);



// アイコン選択////////////////////
// タスク 冗長なので短くする
let show_selected_user_icon_area = document.getElementById('show-selected-user-icon-area');
let show_selected_user_icon = document.getElementById('show-selected-user-icon');
let select_upload_user_icon_button = document.getElementById('select-upload-user-icon');


const handleIconSelect = (event) => {
    let selected_file = select_upload_user_icon_button.files[0];
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
        show_selected_user_icon.src = event.target.result
    }
}


select_upload_user_icon_button.addEventListener('change', handleIconSelect);

// 入力欄追加ボタン
let used_item_form_number = 1;

function addForm() {
    // 使用機材入力欄は最大10個まで
    if(used_item_form_number < 10 ){
        let used_item_form = document.getElementById('used-items-form');

        let add_form = used_item_form.cloneNode(true);

        // 入力欄はused_item_form_number-(フォームNo)で位置を判別
        used_item_form_number++ ;
        add_form.classList = 'posted-desk-card-used-items  used_item_form_number-' + used_item_form_number;

        console.log('posted-desk-card-used-items  used_item_form_number-' + used_item_form_number);

        let parent = document.getElementById('used-items-form-area');
        parent.appendChild(add_form);

    }
}

  //入力欄削除ボタン

function removeForm() {
    // 使用機材入力欄は最低1個より多く
    if(used_item_form_number > 1 ){
        let used_item_form = document.getElementById('used-items-form');

        // 入力欄はused_item_form_number-(フォームNo)で位置を判別
        used_item_form.classList = 'posted-desk-card-used-items  used_item_form_number-' + used_item_form_number;

        console.log('posted-desk-card-used-items  used_item_form_number-' + used_item_form_number);

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


////////////////////////////////////////////
// アカウント削除ページ
////////////////////////////////////////////

let delete_button = document.getElementById('account-delete-button');

if( delete_button != null ){
    delete_button.addEventListener('submit', (event) => {
        if( !confirm('本当に削除しますか？') ){
            event.preventDefault();
        }
    });
}



