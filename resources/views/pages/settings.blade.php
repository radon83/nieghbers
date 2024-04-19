@extends('layouts.main')

@section('page-title', __('Settings'))

@section('title', __('Settings'))
@section('parent', __('Control Panel'))
@section('pointer', __('Settings'))
@section('parent-link', route('settings.index'))
@section('pointer-link', route('settings.index'))

@section('styles')

@endsection

@section('content')
    <div class="col-md-12 col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">
                    {{ __('Manage Settings') }}</h4>
            </div>

            <div class="card-body">

                <x-alert-component />

                <livewire:settings />

            </div>
        </div>
    </div>
@endsection

@section('scripts')

@endsection
