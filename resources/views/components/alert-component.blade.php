<div class="alert @if (! session()->has('message')) hidden @endif alert-{{ session('status') ? 'success' : 'danger' }}"
    role="alert">
    <h4 class="alert-heading"> {{ session('status') ? __('Success') : __('Failed') }} </h4>
    <div class="alert-body">
        {{ session('status') ? session('message') : __('Somthing went wrong, please try again later!') }}
    </div>
</div>
