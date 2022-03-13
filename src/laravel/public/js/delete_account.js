'use strict';

let delete_button = document.getElementById('account-delete-button');

if( delete_button != null ){
    delete_button.addEventListener('submit', (event) => {
        if( !confirm('本当に削除しますか？') ){
            event.preventDefault();
        }
    });
}
