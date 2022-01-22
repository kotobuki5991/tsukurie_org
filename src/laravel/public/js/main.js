'use strict';


function copyToClipboard() {
    var url = document.getElementById('url-to-copy').innerHTML;

    navigator.clipboard.writeText(url)
    .then(() => {
        alert("URLをクリップボードにコピーしました。")
    })
    .catch(err => {
        alert('すみません、コピーに失敗しました。', err);
    })

}

var submit = document.getElementById('contact-form');

//タスク メール送信に成功したかどうか確認、成功の場合は成功、失敗の場合は失敗の表示、
//タスク submitすると画面遷移してしまい、alertが表示されない
if( submit != null ){
    submit.addEventListener('submit', function(event){
        if (confirm('本当に送信しますか？')){
            event.method = 'post';
            alert('ありがとうございます、送信が完了しました!');
            event.submit();
        }else{
            event.preventDefault();
        }
    });
}





