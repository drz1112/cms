@extends('front/layout.template')
@section('content')
    @if ($settinglayout->section_1_activation)
        @include('front/page/section.main-featured-services')
    @endif
    @if ($settinglayout->section_2_activation)
        @include('front/page/section.main-about')
    @endif
    @if ($settinglayout->section_3_activation)
        @include('front/page/section.main-clients')
    @endif
    @if ($settinglayout->section_4_activation)
        @include('front/page/section.main-services')
    @endif
    @if ($settinglayout->banner_2_activation)
        @include('front/page/section.main-testimonial')
    @endif
    @if ($settinglayout->section_5_activation)
        @include('front/page/section.main-portofolio')
    @endif
    @if ($settinglayout->section_6_activation)
        @include('front/page/section.main-team')
    @endif
    @if ($settinglayout->section_7_activation)
        @include('front/page/section.main-faq')
    @endif
    @if ($settinglayout->section_8_activation)
        @include('front/page/section.main-contact')
    @endif
@endsection
