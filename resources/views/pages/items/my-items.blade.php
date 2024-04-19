@extends('layouts.main')

@section('page-title', __('Items'))

@section('title', __('Items'))
@section('parent', __('Control Panel'))
@section('pointer', __('C.M'))
@section('parent-link', route('items.index'))
@section('pointer-link', route('items.index'))

@section('styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('cpanel/app-assets/css/core/menu/menu-types/vertical-menu.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('cpanel/app-assets/css/plugins/forms/form-validation.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('cpanel/app-assets/css/pages/app-user.css') }}">

    <link rel="stylesheet" type="text/css" href="{{ asset('cpanel/assets/css/style.css') }}">
@endsection

@section('content')
    <div class="content-wrapper container-xxl p-0">
        <div class="content-header row">
        </div>
        <div class="content-body">

            <livewire:items.own />

        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('cpanel/app-assets/js/scripts/pages/app-item-list.js') }}"></script>
@endsection
