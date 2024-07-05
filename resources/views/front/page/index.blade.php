@extends('front/layout.template')
@section('content')
    @include('front/page/section.main-featured-services')
    @include('front/page/section.main-about')
    {{-- @include('front/page/section.main-skill') --}}
    {{-- @include('front/page/section.main-stats') --}}
    @include('front/page/section.main-clients')
    @include('front/page/section.main-services')
    @include('front/page/section.main-testimonial')
    @include('front/page/section.main-portofolio')
    @include('front/page/section.main-team')
    @include('front/page/section.main-price')
    @include('front/page/section.main-faq')
    @include('front/page/section.main-contact')
@endsection
