<?php

namespace App\View\Components;

use App\Settings\SiteSettings;
use Illuminate\View\Component;

class AppLayout extends Component
{
    protected SiteSettings $site;

    public function __construct(SiteSettings $site) {
        $this->site = $site;
    }

    /**
     * Get the view / contents that represents the component.
     *
     * @return \Illuminate\View\View
     */
    public function render()
    {
        return view('layouts.app')->with('site', $this->site);
    }
}
