@extends('layouts.main')

@section('page-title', __('Add Category'))

@section('title', __('Add Category'))
@section('parent', __('Control Panel'))
@section('pointer', __('C.M'))
@section('parent-link', route('categories.index'))
@section('pointer-link', route('categories.create'))

@section('styles')

@endsection

@section('content')
    <div class="col-md-12 col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">{{ __('Add new category') }}</h4>
            </div>

            <div class="card-body">

            <x-alert-component />

                <livewire:categories.create />

            </div>
        </div>
    </div>
@endsection

@section('scripts')

@endsection
