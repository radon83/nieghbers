@extends('layouts.main')

@section('page-title', __('Edit Role'))

@section('title', __('Edit Role'))
@section('parent', __('Control Panel'))
@section('pointer', __('C.M'))
@section('parent-link', route('roles.index'))
@section('pointer-link', route('roles.edit', Crypt::encrypt($role->id)))

@section('styles')

@endsection

@section('content')
    <div class="col-md-12 col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">{{ __('Edit ') . $role->name . __(' role') }}</h4>
            </div>

            <div class="card-body">

                <x-alert-component />

                <livewire:roles.edit :role="$role" />

            </div>
        </div>
    </div>
@endsection

@section('scripts')

@endsection
