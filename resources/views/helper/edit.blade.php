@extends('layouts.app')

@section('content')
<div class="container">
    @if (session('from-profile-creation'))
        <div class="row justify-content-center mb-4">
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex w-100 align-items-center justify-content-between">
                            <p class="mb-0 font-weight-bold">{{ __('Fill the form below to subscribe as helper for the :edition edition', ['edition' => '2019']) }}</p>
                            <a href="{{ route('profile.show', ['profile' => $profile]) }}" class='btn btn-primary'><i class="fas fa-clock"></i> {{ __('Later') }}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header">{{ __('Helper Profile') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ $edit ? route('helper.update', ['helper' => $helper]) : route('helper.store', ['profile' => $profile, 'edition' => $edition]) }}">
                        @csrf
                        @if ($edit)
                            @method('PATCH')
                        @endif

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="phone">{{ __('Phone') }}</label>
                                <input id="phone" type="text" class="form-control" name="phone" value="{{ $profile->phone }}" disabled>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="phone_provider">{{ __('Phone Operator') }}
                                    @if ($profile->phone)
                                        <span class="text-danger">*</span>
                                    @endif
                                </label>
                                <input id="phone_provider" type="text" class="form-control{{ $errors->has('phone_provider') ? ' is-invalid' : '' }}" name="phone_provider" value="{{ old('phone_provider', $helper->phone_provider ?? null) }}" {{ $profile->phone ? 'required' : 'disabled' }}>

                                @if ($errors->has('phone_provider'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('phone_provider') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-check mt-2">
                            <input id="legal_age" type="hidden" name="legal_age" value="0">
                            <input id="legal_age" type="checkbox" class="form-check-input{{ $errors->has('legal_age') ? ' is-invalid' : '' }}" name="legal_age" value="1" {{ old('legal_age', $helper->legal_age ?? false) ? 'checked' : '' }}>
                            <label class="form-check-label" for="legal_age">
                                {{  __('I will be of legal age at the date of the trail') }}
                            </label>
                            @if ($errors->has('legal_age'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('legal_age') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="form-check mb-2">
                            <input id="first_responder" type="hidden" name="first_responder" value="0">
                            <input id="first_responder" type="checkbox" class="form-check-input{{ $errors->has('first_responder') ? ' is-invalid' : '' }}" name="first_responder" value="1" {{ old('first_responder', $helper->first_responder ?? null) ? 'checked' : '' }}>
                            <label class="form-check-label" for="first_responder">
                                {{  __('I have a valid first responder diploma') }}
                            </label>
                            @if ($errors->has('first_responder'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('first_responder') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="driving_license">
                                    {{ __('Driving License ID') }}
                                    <a href="#" class="text-danger" data-toggle="tooltip" title="@lang("The driver's license number, if you have one, is required for declaration to the prefecture. Please fill it if you can.")"><i class="fas fa-question-circle"></i></a>
                                </label>
                                <input id="driving_license" type="text" class="form-control{{ $errors->has('driving_license') ? ' is-invalid' : '' }}" name="driving_license" value="{{ old('driving_license', $helper->driving_license ?? null) }}">

                                @if ($errors->has('driving_license'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('driving_license') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group col-md-6">
                                <label for="driving_license_location">{{ __('Driving License Delivery Location') }}</label>
                                <input id="driving_license_location" type="text" class="form-control{{ $errors->has('driving_license_location') ? ' is-invalid' : '' }}" name="driving_license_location" value="{{ old('driving_license_location', $helper->driving_license_location ?? null) }}">

                                @if ($errors->has('driving_license_location'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('driving_license_location') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-check mt-2">
                            <input id="sleep_day_before" type="hidden" name="sleep_day_before" value="0">
                            <input id="sleep_day_before" type="checkbox" class="form-check-input{{ $errors->has('sleep_day_before') ? ' is-invalid' : '' }}" name="sleep_day_before" value="1" {{ old('sleep_day_before', $helper->sleep_day_before ?? null) ? 'checked' : '' }}>
                            <label class="form-check-label" for="sleep_day_before">
                                {{  __('I will sleep on the spot the day before') }}
                            </label>
                            @if ($errors->has('sleep_day_before'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('sleep_day_before') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="housing">{{ __('Housing (info/request)') }}</label>
                            <input id="housing" type="text" class="form-control{{ $errors->has('housing') ? ' is-invalid' : '' }}" name="housing" value="{{ old('housing', $helper->housing ?? null) }}">

                            @if ($errors->has('housing'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('housing') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="form-check mt-2">
                            <input id="day_before_meal" type="hidden" name="day_before_meal" value="0">
                            <input id="day_before_meal" type="checkbox" class="form-check-input{{ $errors->has('day_before_meal') ? ' is-invalid' : '' }}" name="day_before_meal" value="1" {{ old('day_before_meal', $helper->day_before_meal ?? null) ? 'checked' : '' }}>
                            <label class="form-check-label" for="day_before_meal">
                                {{  __('I will be taking the meal the day before') }}
                            </label>
                            @if ($errors->has('day_before_meal'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('day_before_meal') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="form-check mb-2">
                            <input id="after_event_meal" type="hidden" name="after_event_meal" value="0">
                            <input id="after_event_meal" type="checkbox" class="form-check-input{{ $errors->has('after_event_meal') ? ' is-invalid' : '' }}" name="after_event_meal" value="1" {{ old('after_event_meal', $helper->after_event_meal ?? null) ? 'checked' : '' }}>
                            <label class="form-check-label" for="after_event_meal">
                                {{  __('I will participate to the after-event meal') }}
                            </label>
                            @if ($errors->has('after_event_meal'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('after_event_meal') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="prefered_activity">{{ __('Prefered Activity') }}</label>
                            <select id="prefered_activity" class="form-control{{ $errors->has('prefered_activity') ? ' is-invalid' : '' }}" name="prefered_activity">
                                <option value="any"  {{ old('prefered_activity', $helper->prefered_activity ?? null) == "any" ? 'selected' : '' }}>@lang("Any")</option>
                                <option value="welcoming" {{ old('prefered_activity', $helper->prefered_activity ?? null) == "welcoming" ? 'selected' : '' }}>@lang("Welcoming")</option>
                                <option value="way_directions" {{ old('prefered_activity', $helper->prefered_activity ?? null) == "way_directions" ? 'selected' : '' }}>@lang("Showing the directions")</option>
                                <option value="beaconing" {{ old('prefered_activity', $helper->prefered_activity ?? null) == "beaconing" ? 'selected' : '' }}>@lang("Beaconing / Unbeaconing")</option>
                                <option value="organisation" {{ old('prefered_activity', $helper->prefered_activity ?? null) == "organisation" ? 'selected' : '' }}>@lang("Organisation")</option>
                                <option value="refreshment_booth" {{ old('prefered_activity', $helper->prefered_activity ?? null) == "refreshment_booth" ? 'selected' : '' }}>@lang("Refreshment booth & Food")</option>
                                <option value="opener_closer" {{ old('prefered_activity', $helper->prefered_activity ?? null) == "opener_closer" ? 'selected' : '' }}>@lang("Opener / Closer")</option>
                            </select>

                            @if ($errors->has('prefered_activity'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('prefered_activity') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="prefered_sector">{{ __('Prefered Sector') }}</label>
                            <select id="prefered_sector" class="form-control{{ $errors->has('prefered_sector') ? ' is-invalid' : '' }}" name="prefered_sector">
                                <option value="any"  {{ old('prefered_sector', $helper->prefered_sector ?? null) == "any" ? 'selected' : '' }}>@lang("Any")</option>
                                <option value="augirein" {{ old('prefered_sector', $helper->prefered_sector ?? null) == "augirein" ? 'selected' : '' }}>Augirein</option>
                                <option value="arbas" {{ old('prefered_sector', $helper->prefered_sector ?? null) == "arbas" ? 'selected' : '' }}>Arbas</option>
                            </select>
                            @if ($errors->has('prefered_sector'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('prefered_sector') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="comment">{{ __('Other comments') }}</label>
                            <textarea class="form-control" id="comment" rows="4"  class="form-control{{ $errors->has('comment') ? ' is-invalid' : '' }}" name="comment">{{ old('comment', $helper->comment ?? null) }}</textarea>

                            @if ($errors->has('comment'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('comment') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="form-group row">
                            @if($edit)
                                <div class="col-md-6 pb-3 pb-md-0">
                                    <button type="submit" class="btn btn-primary btn-block">
                                        <i class="fas fa-edit"></i> {{  __('Edit') }}
                                    </button>
                                </div>
                                <div class="col-6 col-md-3">
                                    <a href="{{ route('profile.show', ['profile' => $profile]) }}" class="btn btn-light btn-block" role="button">
                                        <i class="fas fa-times"></i> {{  __('Cancel') }}
                                    </a>
                                </div>
                                <div class="col-6 col-md-3">
                                    <a href="{{ route("helper.delete", ['helper' => $helper])}}" class="btn btn-danger btn-block" role="button">
                                        <i class="fas fa-trash-alt"></i> {{  __('Remove') }}
                                    </a>
                                </div>
                            @else
                                <div class="col-sm-8 pb-3 pb-sm-0">
                                    <button type="submit" class="btn btn-primary btn-block">
                                        <i class="fas fa-plus"></i> {{  __('Add') }}
                                    </button>
                                </div>
                                <div class="col-sm-4">
                                    <a href="{{ route('profile.show', ['profile' => $profile]) }}" class="btn btn-light btn-block" role="button">
                                        <i class="fas fa-times"></i> {{  __('Cancel') }}
                                    </a>
                                </div>
                            @endif
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
