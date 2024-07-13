@extends('errors::minimal')

@section('title', __('Forbidden'))
@section('code', '403')
@section('message_1', __($exception->getMessage() ?: 'Forbidden: Access is denied.'))
@section('message_2', __($exception->getMessage() ?: 'You do not have permission to view this directory or page using the credentials that you supplied'))
