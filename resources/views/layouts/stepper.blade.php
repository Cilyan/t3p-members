@php
    $progress = ($step - 1) * 25.0 + 12.5;
    if ($step > 4) {
        $progress = 100;
    }
@endphp
<div class="stepper-steps my-3">
    <div class="stepper-progress">
        <div class="stepper-progress-line" style="width: {{$progress}}%;"></div>
    </div>
    <!-- {{ $step }} -->
    <div class="stepper-step{{ $step == 1 ? ' active' : ''}}{{ $step > 1 ? ' activated' : ''}}">
        <div class="stepper-step-icon"><i class="fa fa-user"></i></div>
        <p>@lang('Register')</p>
    </div>
    <div class="stepper-step{{ $step == 2 ? ' active' : ''}}{{ $step > 2 ? ' activated' : ''}}">
        <div class="stepper-step-icon"><i class="fas fa-envelope"></i></div>
        <p>@lang('Verify')</p>
    </div>
    <div class="stepper-step{{ $step == 3 ? ' active' : ''}}{{ $step > 3 ? ' activated' : ''}}">
        <div class="stepper-step-icon"><i class="fas fa-address-card"></i></div>
        <p>@lang('Participant')</p>
    </div>
    <div class="stepper-step{{ $step == 4 ? ' active' : ''}}{{ $step > 4 ? ' activated' : ''}}">
        <div class="stepper-step-icon"><i class="fas fa-life-ring"></i></div>
        <p>@lang('Helper')</p>
    </div>
</div>
