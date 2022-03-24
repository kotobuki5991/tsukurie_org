'use strict';

ScrollReveal().reveal('.float', {
    duration: 300, // アニメーションの完了にかかる時間
    viewFactor: 0.2, // 0~1,どれくらい見えたら実行するか
    reset: false,   // 何回もアニメーション表示するか
    distance: '30px',
    origin: 'bottom',
  });

// アカウントメニュー
const movile_account_footer_menu = document.querySelector('.account-menu');
const movile_account_footer_menu_detail = document.querySelector('.footer-account-menu');
const movile_account_footer_menu_close = document.querySelector('.close-footer-account-menu');
if (movile_account_footer_menu){
    // クリックで詳細メニュー表示
    movile_account_footer_menu.addEventListener('click', changeAccountMenuVisibility);
    movile_account_footer_menu_close.addEventListener('click', changeAccountMenuVisibility);

    function changeAccountMenuVisibility(){
        if (movile_account_footer_menu_detail.classList.contains('open')){
            movile_account_footer_menu_detail.classList.remove('open')
        }else{
            movile_account_footer_menu_detail.classList.add('open');
        }
    };

}





