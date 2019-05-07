<form method="POST" action="{{ $edit ? route('profile.update', ['profile' => $profile, 'wizard' => $in_wizard]) : route('profile.store') }}" class="user">
    @csrf
    @if ($edit)
        @method('PATCH')
    @endif

    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="first_name">{{ __('First Name') }}<span class="text-danger">*</span></label>
            <input id="first_name" type="text" class="form-control{{ $errors->has('first_name') ? ' is-invalid' : '' }}" name="first_name" value="{{ old('first_name', $profile->first_name ?? null) }}" required autofocus>

            @if ($errors->has('first_name'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('first_name') }}</strong>
                </span>
            @endif
        </div>

        <div class="form-group col-md-6">
            <label for="last_name">{{ __('Last Name') }}<span class="text-danger">*</span></label>
            <input id="last_name" type="text" class="form-control{{ $errors->has('last_name') ? ' is-invalid' : '' }}" name="last_name" value="{{ old('last_name', $profile->last_name ?? null) }}" required>

            @if ($errors->has('last_name'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('last_name') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="birthday">{{ __('Birthday') }}<span class="text-danger">*</span></label>
            <input id="birthday" type="date" class="form-control{{ $errors->has('birthday') ? ' is-invalid' : '' }}" name="birthday" value="{{ old('birthday', $profile->birthday ? $profile->birthday->toDateString() : null) }}" required>

            @if ($errors->has('birthday'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('birthday') }}</strong>
                </span>
            @endif
        </div>

        <div class="form-group col-6 col-md-3">
            <label for="tshirt_gender">{{ __('T-shirt') }}<span class="text-danger">*</span></label>
            <select id="tshirt_gender" class="form-control{{ $errors->has('tshirt_gender') ? ' is-invalid' : '' }}" name="tshirt_gender" required>
                <option value="M" {{ old('tshirt_gender', $profile->tshirt_gender ?? null) == "M" ? 'selected' : '' }}>{{ __('Man')}}</option>
                <option value="F" {{ old('tshirt_gender', $profile->tshirt_gender ?? null) == "F" ? 'selected' : '' }}>{{ __('Woman')}}</option>
            </select>

            @if ($errors->has('tshirt_gender'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('tshirt_gender') }}</strong>
                </span>
            @endif
        </div>

        <div class="form-group col-6 col-md-3">
            <label for="tshirt_size">{{ __('Size') }}<span class="text-danger">*</span></label>
            <select id="tshirt_size" class="form-control{{ $errors->has('tshirt_size') ? ' is-invalid' : '' }}" name="tshirt_size" required>
                <option value="xs"  {{ old('tshirt_size', $profile->tshirt_size ?? null) == "xs" ? 'selected' : '' }}>XS</option>
                <option value="s" {{ old('tshirt_size', $profile->tshirt_size ?? null) == "s" ? 'selected' : '' }}>S</option>
                <option value="m" {{ old('tshirt_size', $profile->tshirt_size ?? null) == "m" ? 'selected' : '' }}>M</option>
                <option value="l" {{ old('tshirt_size', $profile->tshirt_size ?? null) == "l" ? 'selected' : '' }}>L</option>
                <option value="xl" {{ old('tshirt_size', $profile->tshirt_size ?? null) == "xl" ? 'selected' : '' }}>XL</option>
                <option value="xxl" {{ old('tshirt_size', $profile->tshirt_size ?? null) == "xxl" ? 'selected' : '' }}>XXL</option>
            </select>

            @if ($errors->has('tshirt_size'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('tshirt_size') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="form-group">
        <label for="thoroughfare">{{ __('Street Address') }}</label>
        <input id="thoroughfare" type="text" class="form-control{{ $errors->has('thoroughfare') ? ' is-invalid' : '' }}" name="thoroughfare" value="{{ old('thoroughfare', $profile->thoroughfare ?? null) }}">

        @if ($errors->has('thoroughfare'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('thoroughfare') }}</strong>
            </span>
        @endif
    </div>

    <div class="form-group">
        <label for="premise">{{ __('Appt / Box Number') }}</label>
        <input id="premise" type="text" class="form-control{{ $errors->has('premise') ? ' is-invalid' : '' }}" name="premise" value="{{ old('premise', $profile->premise ?? null) }}">

        @if ($errors->has('premise'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('premise') }}</strong>
            </span>
        @endif
    </div>

    <div class="form-row">
        <div class="form-group col-sm-4 col-md-3">
            <label for="postal_code">{{ __('Postal Code') }}</label>
            <input id="postal_code" type="text" class="form-control{{ $errors->has('postal_code') ? ' is-invalid' : '' }}" name="postal_code" value="{{ old('postal_code', $profile->postal_code ?? null) }}" >

            @if ($errors->has('postal_code'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('postal_code') }}</strong>
                </span>
            @endif
        </div>

        <div class="form-group col-sm-8 col-md-4">
            <label for="locality">{{ __('City') }}</label>
            <input id="locality" type="text" class="form-control{{ $errors->has('locality') ? ' is-invalid' : '' }}" name="locality" value="{{ old('locality', $profile->locality ?? null) }}" >

            @if ($errors->has('locality'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('locality') }}</strong>
                </span>
            @endif
        </div>

        <div class="form-group col-12 col-md-5">
            <label for="country">{{ __('Country') }}<span class="text-danger">*</span></label>
            <input id="country" type="text" class="form-control{{ $errors->has('country') ? ' is-invalid' : '' }}" name="country" value="{{ old('country', $profile->country ?? null) }}" required>

            @if ($errors->has('country'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('country') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="form-group">
        <label for="administrative_area">{{ __('State / Province / Region') }}</label>
        <input id="administrative_area" type="text" class="form-control{{ $errors->has('administrative_area') ? ' is-invalid' : '' }}" name="administrative_area" value="{{ old('administrative_area', $profile->administrative_area ?? null) }}">

        @if ($errors->has('administrative_area'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('administrative_area') }}</strong>
            </span>
        @endif
    </div>

    <div class="form-group">
        <label for="phone">{{ __('Phone') }}</label>
        <input id="phone" type="tel" class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}" name="phone" value="{{ old('phone', $profile->phone ?? null) }}">

        @if ($errors->has('phone'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('phone') }}</strong>
            </span>
        @endif
    </div>

    <div class="form-group row flex-row-reverse align-items-center justify-content-start pt-3">
        @if($in_wizard)
            <div class="col-sm-8 pb-3 pb-sm-0">
                <button type="submit" class="btn btn-primary btn-block">
                    <i class="fas fa-angle-right"></i>
                    {{  $edit ? __('Edit') : __('Create') }}
                </button>
            </div>
            @if (!$first_profile)
                @if ($edit)
                    <div class="col-sm-4">
                        <a href="{{ route("profile.delete", ['profile' => $profile])}}" class="btn btn-danger btn-block" role="button">
                            <i class="fas fa-trash-alt"></i> {{  __('Remove') }}
                        </a>
                    </div>
                @else
                    <div class="col-sm-4">
                        <a href="{{ route('home') }}" class="btn btn-light btn-block" role="button">
                            <i class="fas fa-times"></i> {{  __('Cancel') }}
                        </a>
                    </div>
                @endif
            @endif
        @else
            <div class="col-sm-8 pb-3 pb-sm-0">
                <button type="submit" class="btn btn-primary btn-block">
                    <i class="fas fa-edit"></i> {{  __('Edit') }}
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
