@extends('layouts.main')

@section('page-title', __('Edit User'))

@section('title', __('Edit User'))
@section('parent', __('Control Panel'))
@section('pointer', __('H.R'))
@section('parent-link', route('users.index'))
@section('pointer-link', route('users.edit', Crypt::encrypt($user->id)))

@section('styles')

@endsection

@section('content')
    <div class="col-md-12 col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">{{ __('Edit ') . $user->fname . __(' user') }}</h4>
            </div>

            <div class="card-body">

                <x-alert-component />

                <livewire:users.edit :user="$user" />

            </div>
        </div>
    </div>
@endsection

@section('scripts')

@endsection
