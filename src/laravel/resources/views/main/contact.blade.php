@extends('layouts.main_layout')

@section('title', 'つくりえ -お問合せ-')

@section('add_css')
<link rel="stylesheet" href="{{ asset('css/contact.css') }}">
@endsection

{{-- ページ名 --}}
@section('page_name', 'お問い合せ')


{{-- メインコンテンツ --}}
@section('main_contents')
<div class="contact-form-erea">
    <form id="contact-form" method="post" action="{{ asset('contact') }}">
        @csrf
        {{--タスク 登録していないユーザーからの問い合わせの場合、ゲストさんとする。 --}}
        <input type="hidden" name="contact-title" value="【つくりえ】○○さんからの問い合わせ">
        <div class="contact-parts">
            <textarea class="contact-message" name="contact-message" cols="60" rows="30" >機能追加のご要望や、改善点、感想などをご記入ください。</textarea>
            <input id="contact-submit" class="contact-submit"  type="submit" value="送信">
        </div>
    </form>
</div>

<div class="posted-back-to-top">
    <a class="letter" href="{{ asset('/') }}">トップへ戻る</a>
</div>
@endsection

@section('add_script')
<script src="{{ asset('js/main.js') }}"></script>
@endsection
