@extends('layouts.main')

@section('page-title', __('Add City'))

@section('title', __('Add City'))
@section('parent', __('Control Panel'))
@section('pointer', __('C.M'))
@section('parent-link', route('cities.index'))
@section('pointer-link', route('cities.create'))

@section('styles')

@endsection

@section('content')
    <div class="col-md-12 col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">{{ __('Add new city') }}</h4>
            </div>

            <div class="card-body">

            <x-alert-component />

                <livewire:cities.create />

            </div>
        </div>
    </div>
@endsection

@section('scripts')

@endsection
