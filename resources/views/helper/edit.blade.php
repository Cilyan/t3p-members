@extends('layouts.wizard')

@section('wizard_content')
    @if ($in_wizard)
        @component('layouts.stepper', ['step' => 4])
        @endcomponent
    @endif

    <div class="text-center mb-5">
        <h1 class="h4 text-gray-900 mb-4">
            @if($edit)
                @lang('Edit your helper profile')
            @else
                @lang('Register as Helper')
            @endif
        </h1>
        <p>
            @lang('Thanks for being awesome and registering yourself to help us in the <strong>:edition</strong> edition.', ['edition' => $edition->id])
            @lang('In order to properly organize, we need a few more information.')
            @lang('Please note that the driving license is important for us to declare at the prefecture. Fill the field if you can.')
        </p>
    </div>

    @include('helper._form')
@endsection
