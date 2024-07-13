@extends('errors::minimal')

@section('title', __('Server Error'))
@section('code', '500')
@section('message_1', __('Internal Server Error'))
@section('message_2', __('The website is currently unaivailable. Try again later or contact the developer.'))
