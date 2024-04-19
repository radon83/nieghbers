@extends('layouts.main')

@section('page-title', __('Cities'))

@section('title', __('Cities'))
@section('parent', __('Control Panel'))
@section('pointer', __('C.M'))
@section('parent-link', route('cities.index'))
@section('pointer-link', route('cities.index'))

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

            <livewire:cities.index />

        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('cpanel/app-assets/js/scripts/pages/app-city-list.js') }}"></script>
@endsection
