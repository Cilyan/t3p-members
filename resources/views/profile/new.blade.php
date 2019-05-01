@extends('layouts.wizard')

@section('wizard_content')
    @component('layouts.stepper', ['step' => 3])
    @endcomponent

    <div class="text-center mb-5">
        <h1 class="h4 text-gray-900 mb-4">@lang('Create your participant profile')</h1>
        <p>
            @lang('Tell us about you. This profile is for one participant. You will be able to add more participants later if you need so.')
        </p>
    </div>

    @include('profile._form')
@endsection
