@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="mb-5">
        <h1 class="h3 mb-4 text-gray-600">@lang('Accounts')</h1>
    </div>
    <div class="row justify-content-center">
        
        <livewire:admin.accounts-table />
        
    </div>
</div>
@endsection
