@extends('layouts.main')

@section('page-title', __('Add User'))

@section('title', __('Add User'))
@section('parent', __('Control Panel'))
@section('pointer', __('H.R'))
@section('parent-link', route('users.index'))
@section('pointer-link', route('users.create'))

@section('styles')

@endsection

@section('content')
    <div class="col-md-12 col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">{{ __('Add new user') }}</h4>
            </div>

            <div class="card-body">

            <x-alert-component />

                <livewire:users.create />

            </div>
        </div>
    </div>
@endsection

@section('scripts')

@endsection
