@if (session('status-error') || session('status') || session('resent') || session('verified'))
<div class="container">
        @if (session('status-error'))
            <div class="alert alert-danger alert-dismissible fade show my-2" role="alert">
                {{ session('status-error') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        @if (session('status'))
            <div class="alert alert-success alert-dismissible fade show my-2" role="alert">
                {{ session('status') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        @if (session('resent'))
            <div class="alert alert-success alert-dismissible fade show my-2" role="alert">
                @lang('A fresh verification link has been sent to your email address.')
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        @if (session('verified'))
            <div class="alert alert-success alert-dismissible fade show my-2" role="alert">
                @lang('Your email address has been verified.')
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
    </div>
@endif
