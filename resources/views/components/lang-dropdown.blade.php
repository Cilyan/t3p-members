<ul class="navbar-nav flex-row mr-3">
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="dropdown-langs" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <span class="flag-icon flag-icon-{{ __('locale.flag') }}"> </span>
        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdown-langs">
            @foreach ($supported_locales as $locale)
                @if ($locale != $current_locale)
                    <a class="dropdown-item" href="{{ Route::localizedUrl($locale) }}"><span class="flag-icon flag-icon-{{ __('locale.flag', [], $locale) }}"> </span> @lang('locale.name', [], $locale)</a>
                @endif
            @endforeach
        </div>
    </li>
</ul>