@extends('layouts.main')

@section('page-title', __('Add Place'))

@section('title', __('Add Place'))
@section('parent', __('Control Panel'))
@section('pointer', __('C.M'))
@section('parent-link', route('places.index'))
@section('pointer-link', route('places.create'))

@section('styles')

@endsection

@section('content')
    <div class="col-md-12 col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">{{ __('Add new place') }}</h4>
            </div>

            <div class="card-body">

            <x-alert-component />

                <livewire:places.create />

            </div>
        </div>
    </div>
@endsection

@section('scripts')

@endsection
