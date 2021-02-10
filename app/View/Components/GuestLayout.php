<?php

namespace App\View\Components;

use App\Settings\SiteSettings;
use Illuminate\View\Component;

class GuestLayout extends Component
{
    protected SiteSettings $site;

    public function __construct(SiteSettings $sites) {
        $this->site = $sites;
    }
    /**
     * Get the view / contents that represents the component.
     *
     * @return \Illuminate\View\View
     */
    public function render()
    {
        return view('layouts.guest')->with('site', $this->site);
    }
}
