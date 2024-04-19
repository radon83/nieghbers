@extends('layouts.main')

@section('page-title', __('Edit Place'))

@section('title', __('Edit Place'))
@section('parent', __('Control Panel'))
@section('pointer', __('C.M'))
@section('parent-link', route('places.index'))
@section('pointer-link', route('places.edit', Crypt::encrypt($place->id)))

@section('styles')

@endsection

@section('content')
    <div class="col-md-12 col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">
                    {{ __('Edit ') . app()->getLocale() == 'ar' ? $place->name_ar : $place->name_en . __(' place') }}</h4>
            </div>

            <div class="card-body">

                <x-alert-component />

                <livewire:places.edit :place="$place" />

            </div>
        </div>
    </div>
@endsection

@section('scripts')

@endsection
