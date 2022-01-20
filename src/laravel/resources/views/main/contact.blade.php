@extends('layouts.main_layout')

@section('title', 'つくりえ -お問合せ-')

@section('add_css')
<link rel="stylesheet" href="css/contact.css">
@endsection

{{-- ページ名 --}}
@section('page_name', 'お問合せ')


{{-- メインコンテンツ --}}
@section('main_contents')
<div class="contact-form">
    <form>
        @csrf
        {{--タスク 登録していないユーザーからの問い合わせの場合、ゲストさんとする。 --}}
        <input type="hidden" name="contact-title" value="【つくりえ】○○さんからの問い合わせ">
        <input class="contact-message" type="text" value="機能追加のご要望、">
        <input type="submit" value="送信">
    </form>
</div>

<div class="posted-back-to-top">
    <a class="letter" href="/">トップへ戻る</a>
</div>
@endsection

@section('add_script')
<script src="js/main.js"></script>
@endsection
