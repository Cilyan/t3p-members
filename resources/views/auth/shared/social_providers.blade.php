<div class="row">
    <div class="col-sm pb-4 pb-sm-0">
        <a href="{{ route('login.social', ['provider' => 'google']) }}" class="btn btn-google btn-block" role="button">
            <i class="fab fa-google"></i> @lang('Sign in with Google')
        </a>
    </div>
    <div class="col-sm">
        <a href="{{ route('login.social', ['provider' => 'facebook']) }}" class="btn btn-fcbk btn-block" role="button">
            <i class="fab fa-facebook-f"></i> @lang('Sign in with Facebook')
        </a>
    </div>
</div>
