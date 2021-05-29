<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\Support\Facades\App;

class LangDropdown extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $supported_locales = config("localized-routes.supported-locales");
        $current_locale = App::currentLocale();
        return view(
            'components.lang-dropdown',
            compact('supported_locales', 'current_locale')
        );
    }
}
