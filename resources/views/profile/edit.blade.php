@extends('layouts.wizard')

@section('wizard_content')
    @if ($in_wizard)
        @component('layouts.stepper', ['step' => 3])
        @endcomponent
    @endif

    <div class="text-center mb-5">
        <h1 class="h4 text-gray-900 mb-4">
            @if($edit)
                @lang('Edit your participant profile')
            @else
                @lang('Create your participant profile')
            @endif
            </h1>
        <p>
            @lang('Tell us about you. This profile is for one participant. You will be able to add more participants later if you need so.')
        </p>
    </div>

    @include('profile._form')
@endsection
