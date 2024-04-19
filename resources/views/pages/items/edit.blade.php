@extends('layouts.main')

@section('page-title', __('Edit Item'))

@section('title', __('Edit Item'))
@section('parent', __('Control Panel'))
@section('pointer', __('C.M'))
@section('parent-link', route('items.index'))
@section('pointer-link', route('items.edit', Crypt::encrypt($item->id)))

@section('styles')

@endsection

@section('content')
    <div class="col-md-12 col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">
                    {{ __('Edit ') . app()->getLocale() == 'ar' ? $item->name_ar : $item->name_en . __(' item') }}</h4>
            </div>

            <div class="card-body">

                <x-alert-component />

                <livewire:items.edit :item="$item" />

            </div>
        </div>
    </div>
@endsection

@section('scripts')

@endsection
