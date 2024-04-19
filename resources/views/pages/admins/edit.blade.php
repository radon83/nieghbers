@extends('layouts.main')

@section('page-title', __('Edit Admin'))

@section('title', __('Edit Admin'))
@section('parent', __('Control Panel'))
@section('pointer', __('H.R'))
@section('parent-link', route('admins.index'))
@section('pointer-link', route('admins.edit', Crypt::encrypt($admin->id)))

@section('styles')

@endsection

@section('content')
    <div class="col-md-12 col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">{{ __('Edit ') . $admin->fname . __(' admin') }}</h4>
            </div>

            <div class="card-body">

                <x-alert-component />

                <livewire:admins.edit :admin="$admin" />

            </div>
        </div>
    </div>
@endsection

@section('scripts')

@endsection
