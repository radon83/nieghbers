@extends('layouts.main')

@section('page-title', __('Edit Category'))

@section('title', __('Edit Category'))
@section('parent', __('Control Panel'))
@section('pointer', __('C.M'))
@section('parent-link', route('categories.index'))
@section('pointer-link', route('categories.edit', Crypt::encrypt($category->id)))

@section('styles')

@endsection

@section('content')
    <div class="col-md-12 col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">
                    {{ __('Edit ') . app()->getLocale() == 'ar' ? $category->name_ar : $category->name_en . __(' category') }}</h4>
            </div>

            <div class="card-body">

                <x-alert-component />

                <livewire:categories.edit :category="$category" />

            </div>
        </div>
    </div>
@endsection

@section('scripts')

@endsection
