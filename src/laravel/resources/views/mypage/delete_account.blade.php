@extends('/layouts.mypage_layout')

@section('title', 'つくりえ -プロフィール編集-')
@section('add_css')
{{-- タスク ファイル読み込みをasset()で行う --}}
<link rel="stylesheet" href="{{ asset('/css/show_post.css') }}">
<link rel="stylesheet" href="{{ asset('/css/mypage.css') }}">
@endsection

{{-- ページ名 --}}
@section('page_name', 'プロフィール編集')


{{-- メインコンテンツ --}}
    @section('main_block')
    <div class="main-block">
        <div class="delete-explanation-area"></div>
        <form action="{{ asset('/mypage/top') }}" method="post">
            @csrf
            <input class="myprofile-edit-submit sink-button mouse-hover-pointer" type="submit" value="更新">
        </form>
    </div>

@endsection

@section('add_script_mypage')
<script src="{{ asset('js/mypage_edit.js') }}"></script>

@endsection
