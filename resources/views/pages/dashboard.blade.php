@extends('layouts.main')

@section('page-title', __('Dashboard'))

@section('title', __('Dashboard'))
@section('parent', __('Control Panel'))
@section('pointer', __('Pages'))
@section('parent-link', route('control.panel'))
@section('pointer-link', route('control.panel'))

