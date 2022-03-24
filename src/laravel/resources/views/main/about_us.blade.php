@extends('layouts.main_layout')

@section('title', 'つくりえとは？')

@section('add_css')
<link rel="stylesheet" href="{{ asset('css/contact.css') }}">
@endsection

{{-- ページ名 --}}
@section('page_name')
<h2 class="letter-title ">つくりえとは？</h2>
@endsection


{{-- メインコンテンツ --}}
@section('main_contents')
<p>準備中です</p>

<div class="posted-back-to-top">
    <a class="letter-title" href="{{ asset('/') }}">トップへ戻る</a>
</div>
@endsection

