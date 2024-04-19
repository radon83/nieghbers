@extends('layouts.main')

@section('page-title', __('Add Admin'))

@section('title', __('Add Admin'))
@section('parent', __('Control Panel'))
@section('pointer', __('H.R'))
@section('parent-link', route('admins.index'))
@section('pointer-link', route('admins.create'))

@section('styles')

@endsection

@section('content')
    <div class="col-md-12 col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">{{ __('Add new admin') }}</h4>
            </div>

            <div class="card-body">

            <x-alert-component />

                <livewire:admins.create />

            </div>
        </div>
    </div>
@endsection

@section('scripts')

@endsection
