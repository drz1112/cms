@extends('errors::minimal')

@section('title', __('Unauthorized'))
@section('code', '401')
@section('message_1', __('Unauthorized: Access is denied due to invalid credentials'))
@section('message_2', __('You dont have permission to view this directory or page using the credentials that you supplied'))
