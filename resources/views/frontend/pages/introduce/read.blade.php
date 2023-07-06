@extends('frontend.layout_blog')
@section('title')
    {{ isset($name)  ? "$name Plican" : "Tin Tức" }}
@endsection
@section("data-view")
Giới thiệu
@endsection