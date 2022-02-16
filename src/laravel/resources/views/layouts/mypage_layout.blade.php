@extends('/layouts.main_layout')

@section('title', 'つくりえ -○○のマイページ-')
@section('add_css')
{{-- タスク ファイル読み込みをasset()で行う --}}
<link rel="stylesheet" href="{{ asset('/css/show_post.css') }}">
<link rel="stylesheet" href="{{ asset('/css/mypage.css') }}">
@endsection

{{-- ページ名 --}}
@section('page_name', '○○○のマイページ')


{{-- メインコンテンツ --}}
@section('main_contents')
{{-- mypage共通部品1 --}}
<div class="main-contents">

    <div class="left-block">
        <ul class="mypage-links">
            <li><a href="{{ asset('/mypage/top') }}" class="letter">マイページトップ</a></li>
            <li><a href="{{ asset('/mypage/top') }}" class="letter">ログイン情報変更</a></li>
            <li><a href="{{ asset('/mypage/edit') }}" class="letter">プロフィール編集</a></li>
            <li><a href="{{ asset('/mypage/delete_account') }}" class="letter">アカウント削除</a></li>
        </ul>
    </div>
{{-- mypage共通部品1 --}}

@yield('main_block')

{{-- mypage共通部品2 --}}
    <div class="right-block"></div>
</div>
<div class="posted-back-to-top">
    <a class="letter" href="{{ asset('/') }}">トップへ戻る</a>
</div>
@endsection

@section('add_script')
<script src="{{ asset('js/main.js') }}"></script>
{{-- <script src="{{ asset('js/mypage.js') }}"></script> --}}
@endsection
