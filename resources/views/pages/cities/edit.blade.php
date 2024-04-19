@extends('layouts.main')

@section('page-title', __('Edit City'))

@section('title', __('Edit City'))
@section('parent', __('Control Panel'))
@section('pointer', __('C.M'))
@section('parent-link', route('cities.index'))
@section('pointer-link', route('cities.edit', Crypt::encrypt($city->id)))

@section('styles')

@endsection

@section('content')
    <div class="col-md-12 col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">
                    {{ __('Edit ') . app()->getLocale() == 'ar' ? $city->name_ar : $city->name_en . __(' city') }}</h4>
            </div>

            <div class="card-body">

                <x-alert-component />

                <livewire:cities.edit :city="$city" />

            </div>
        </div>
    </div>
@endsection

@section('scripts')

@endsection
