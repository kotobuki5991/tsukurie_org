@extends('layouts.main_layout')

@section('title', '投稿ページ')
@section('add_css')
<link rel="stylesheet" href="css/show_post.css">
@endsection

{{-- ページ名 --}}
@section('page_name', '○○○さんのつくえ')


{{-- メインコンテンツ --}}
@section('main_contents')
<div class="posted-desk-card">
    <div><img class="posted-desk-card-image" src="uploaded_images/1.jpg" alt=""></div>


</div>
<div class="posted-back-to-top">
    <a class="letter" href="/">トップへ戻る</a>
</div>

@endsection
