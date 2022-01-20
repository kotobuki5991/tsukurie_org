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




// 指定の要素.addEventListener('mouseover', function() {
//   // マウスが要素に乗った際の処理
// });
