@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card shadow mt-4">
                <div class="card-header">
                    <h6 class="my-1 font-weight-bold">
                        @lang('Participant')
                    </h6>
                </div>

                <div class="card-body">
                    @include('profile._form')
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
