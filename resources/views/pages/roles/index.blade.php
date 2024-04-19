@extends('layouts.main')

@section('page-title', __('Roles'))

@section('title', __('Roles'))
@section('parent', __('Control Panel'))
@section('pointer', __('C.M'))
@section('parent-link', route('roles.index'))
@section('pointer-link', route('roles.index'))

@section('styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('cpanel/app-assets/css/core/menu/menu-types/vertical-menu.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('cpanel/app-assets/css/plugins/forms/form-validation.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('cpanel/app-assets/css/pages/app-role.css') }}">

    <link rel="stylesheet" type="text/css" href="{{ asset('cpanel/assets/css/style.css') }}">
@endsection

@section('content')
    <div class="content-wrapper container-xxl p-0">
        <div class="content-header row">
        </div>
        <div class="content-body">

            <livewire:roles.index />

        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('cpanel/app-assets/js/scripts/pages/app-role-list.js') }}"></script>
@endsection
