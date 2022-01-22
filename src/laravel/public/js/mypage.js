'use strict';

////////////////////////////////////////////
// プロフィール編集ページ
////////////////////////////////////////////

// 入力欄追加ボタン
var used_item_form_number = 1;

function addForm() {
    // 使用機材入力欄は最大10個まで
    if(used_item_form_number < 10 ){
        var used_item_form = document.getElementById('used-items-form');

        var add_form = used_item_form.cloneNode(true);

        // 入力欄はused_item_form_number-(フォームNo)で位置を判別
        used_item_form_number++ ;
        add_form.classList = 'posted-desk-card-used-items  used_item_form_number-' + used_item_form_number;

        console.log('posted-desk-card-used-items  used_item_form_number-' + used_item_form_number);

        var parent = document.getElementById('used-items-form-area');
        parent.appendChild(add_form);

    }
  }

  //入力欄削除ボタン

  function removeForm() {
    // 使用機材入力欄は最低1個より多く
    if(used_item_form_number > 1 ){
        var used_item_form = document.getElementById('used-items-form');

        // 入力欄はused_item_form_number-(フォームNo)で位置を判別
        used_item_form.classList = 'posted-desk-card-used-items  used_item_form_number-' + used_item_form_number;

        console.log('posted-desk-card-used-items  used_item_form_number-' + used_item_form_number);

        var parent = document.getElementById('used-items-form-area');
        parent.removeChild(used_item_form);

        used_item_form_number-- ;
    }
  }

////////////////////////////////////////////
// アカウント削除ページ
////////////////////////////////////////////

var delete_button = document.getElementById('account-delete-button');

if( delete_button != null ){
    delete_button.addEventListener('submit', (event) => {
        // // enterキーは無効化
        // if( event.key = 'Enter'){
        //     event.preventDefault();
        // }

        if( confirm('本当に削除しますか？') ){
            console.log(event);
            event.submit();
        }else{
            event.preventDefault();
        }
    });
}



