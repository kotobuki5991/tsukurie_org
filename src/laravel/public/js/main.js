'use strict';

let submit = document.getElementById('contact-form');

//メール送信確認
if( submit != null ){
    submit.addEventListener('submit', (event) => {
        if (confirm('本当に送信しますか？')){
            event.method = 'post';
            event.submit();
        }else{
            event.preventDefault();
        }
    });
}



