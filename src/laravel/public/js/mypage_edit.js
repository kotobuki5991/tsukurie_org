'use strict';

// プロフィール編集ページの入力欄追加ボタン

// 入力欄取得
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

  // タスク プロフィール編集ページの入力欄を消す必要がある(全て空欄の場合と、ボタンを押された場合)

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
