<div class="row">
    <div class="col-md-6 mb-3">
        <a href="{{ route('login.social', ['provider' => 'google']) }}" class="btn btn-google btn-user btn-block">
            <i class="fab fa-google fa-fw"></i> @lang('Sign in with Google')
        </a>
    </div>
    <div class="col-md-6 mb-3">
        <a href="{{ route('login.social', ['provider' => 'facebook']) }}" class="btn btn-fcbk btn-user btn-block">
            <i class="fab fa-facebook-f fa-fw"></i> @lang('Sign in with Facebook')
        </a>
    </div>
    <div class="col-md-6 mb-0 offset-md-3">
        <a href="{{ route('login.social', ['provider' => 'microsoft']) }}" class="btn btn-microsoft btn-user btn-block">
            <i class="fab fa-windows fa-fw"></i> @lang('Sign in with Microsoft')
        </a>
    </div>
</div>
