@extends('layouts.main')

@section('page-title', __('Add Role'))

@section('title', __('Add Role'))
@section('parent', __('Control Panel'))
@section('pointer', __('C.M'))
@section('parent-link', route('roles.index'))
@section('pointer-link', route('roles.create'))

@section('styles')

@endsection

@section('content')
    <div class="col-md-12 col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">{{ __('Add new role') }}</h4>
            </div>

            <div class="card-body">

            <x-alert-component />

                <livewire:roles.create />

            </div>
        </div>
    </div>
@endsection

@section('scripts')

@endsection
