'use strict';

const url_copy_buttons = document.querySelectorAll('.copy-url');

if (url_copy_buttons) {

    // コピー対象のfigureのid用
    let figure_num = 1;
    let urls = new Array();

    url_copy_buttons.forEach( () => {
        urls.push(document.getElementById('url-to-copy-' + figure_num).innerHTML);
        figure_num++;
    });

    for (let i = 0; i < url_copy_buttons.length; i++){
        url_copy_buttons[i].addEventListener('click',() => {
            // alert('click');
            copyToClipboard(urls[i]);
        });
    }

    function copyToClipboard(copied_url) {
        // let copied_url = document.getElementById('url-to-copy-' + i).innerHTML;
        // console.log(copied_url);
        navigator.clipboard.writeText(copied_url)
        .then(() => {
            alert("URLをクリップボードにコピーしました。")
        })
        .catch(err => {
            alert('すみません、コピーに失敗しました。', err);
        })
    }

}
