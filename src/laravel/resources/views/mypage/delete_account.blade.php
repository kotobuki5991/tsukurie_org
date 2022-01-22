@extends('/layouts.mypage_layout')

@section('title', 'つくりえ -アカウント削除-')
@section('add_css')
{{-- タスク ファイル読み込みをasset()で行う --}}
<link rel="stylesheet" href="{{ asset('/css/show_post.css') }}">
<link rel="stylesheet" href="{{ asset('/css/mypage.css') }}">
@endsection

{{-- ページ名 --}}
@section('page_name', 'アカウント削除')


{{-- メインコンテンツ --}}
    @section('main_block')
    <div class="main-block">
        <div class="delete-explanation-area">
            <h2 class="delete-explanation">注意!!</h2>
            <p class="delete-explanation">&nbsp;&nbsp;アカウントを削除した場合、再度マイページをご利用いただくには再登録が必要です。また、過去に削除されたアカウントを復活することはできませんのでご注意ください。<br>
            &nbsp;&nbsp;画面下部の「アカウント削除」ボタンを押下すると確認のポップアップが表示され、OKを選択することで削除が実行されます。
            </p>
        </div>
        <form id="account-delete-button" action="{{ asset('/') }}" method="post">
            @csrf
            <input class="account-delete-submit sink-button mouse-hover-pointer" type="submit" value="アカウント削除">
            {{-- タスク ここにinput type hiddenで削除する対象のuseridを置いておく --}}
        </form>
    </div>

@endsection

