@extends('layouts.main_layout')

@section('title', 'つくりえ -お問合せ-')

@section('add_css')
<link rel="stylesheet" href="{{ asset('css/contact.css') }}">
@endsection

{{-- メインコンテンツ --}}
@section('main_contents')
    <div class="conrainer">
    <div class="card">
        <div class="card-body">
            お問合せを送信しました。
        </div>
    </div>
    </div>
    <div class="posted-back-to-top">
        <a class="letter" href="{{ asset('/') }}">トップへ戻る</a>
    </div>
@endsection

@section('add_script')
<script src="{{ asset('js/main.js') }}"></script>
@endsection
