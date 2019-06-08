<li class="nav-item dropdown">
    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
        <img src="https://robohash.org/{{ Auth::user()->email }}?gravatar=yes&amp;set=set4&amp;size=64x64" style="vertical-align: middle; width: 32px; height: 32px;  border-radius: 50%;">
        {{ Auth::user()->name }} <span class="caret"></span>
    </a>

    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
        <a class="dropdown-item" href="{{ route('home') }}">{{ __('Home') }}</a>
        <a class="dropdown-item" href="{{ route('account') }}">{{ __('Account') }}</a>
        <div class="dropdown-divider"></div>
        @if (Gate::allows('is-admin'))
            <a class="dropdown-item" href="{{ route('admin.home') }}">{{ __('Administration') }}</a>
            <div class="dropdown-divider"></div>
        @endif
        <a class="dropdown-item" href="{{ route('logout') }}"
           onclick="event.preventDefault();
                         document.getElementById('logout-form').submit();">
            {{ __('Logout') }}
        </a>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
    </div>
</li>
