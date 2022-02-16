@extends('/layouts.mypage_layout')

@section('title', 'つくりえ -アカウント削除-')
@section('add_css')
{{-- タスク ファイル読み込みをasset()で行う --}}
<link rel="stylesheet" href="{{ asset('/css/show_post.css') }}">
<link rel="stylesheet" href="{{ asset('/css/mypage.css') }}">
@endsection

{{-- ページ名 --}}
@section('page_name')
<h2 class="letter">アカウント削除</h2>
@endsection


{{-- メインコンテンツ --}}
@section('main_block')
<div class="main-block">
    <div class="delete-explanation-area">
        <h2 class="delete-explanation">注意!!</h2>
        <p class="delete-explanation">&nbsp;&nbsp;アカウントを削除した場合、再度マイページをご利用いただくには再登録が必要です。<br>
        &nbsp;&nbsp;画面下部の「アカウント削除」ボタンをクリックすると確認のポップアップが表示され、OKを選択することで削除が実行されます。<br>
        ※意図しない削除を行なってしまった場合は、画面右上のお問い合せから、登録メールアドレスを記入の上ご連絡ください。
        </p>
    </div>
    <form id="account-delete-button" action="{{ asset('/mypage/destroy_account') }}" method="post">
        @csrf
        <input class="account-delete-submit sink-button mouse-hover-pointer" type="submit" value="アカウント削除">
    </form>
</div>
@endsection

@section('add_optional_script')
<script>
    let delete_button = document.getElementById('account-delete-button');
    console.log(delete_button);
    if( delete_button != null ){
        delete_button.addEventListener('submit', (event) => {
            if( !confirm('本当に削除しますか？') ){
                event.preventDefault();
            }
        });
    }
</script>

@endsection

