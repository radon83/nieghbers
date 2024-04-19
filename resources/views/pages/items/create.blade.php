@extends('layouts.main')

@section('page-title', __('Add Item'))

@section('title', __('Add Item'))
@section('parent', __('Control Panel'))
@section('pointer', __('C.M'))
@section('parent-link', route('items.index'))
@section('pointer-link', route('items.create'))

@section('styles')

@endsection

@section('content')
    <div class="col-md-12 col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">{{ __('Add new item') }}</h4>
            </div>

            <div class="card-body">

                <x-alert-component />

                <livewire:items.create />

            </div>
        </div>
    </div>
@endsection

@section('scripts')

@endsection
