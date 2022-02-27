'use strict';

ScrollReveal().reveal('.float', {
    duration: 300, // アニメーションの完了にかかる時間
    viewFactor: 0.2, // 0~1,どれくらい見えたら実行するか
    reset: false,   // 何回もアニメーション表示するか
    distance: '30px',
    origin: 'bottom',
  });

// スマホ用（限界以上のスクロール時の背景色設定）
// document.addEventListener("scroll", function (e) {
//     // ここでスクロール位置によって背景色を変更
//     document.body.style.backgroundColor = "bisque";
// }, false);
