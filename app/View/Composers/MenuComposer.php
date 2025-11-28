<?php

namespace App\View\Composers;

use App\Models\Page;
use Illuminate\View\View;

class MenuComposer
{
    /**
     * Bind data to the view.
     *
     * @param  \Illuminate\View\View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $menuPages = Page::menuItems()->get();

        $view->with('menuPages', $menuPages);
    }
}
