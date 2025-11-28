<?php

namespace App\Observers;

use App\Models\Page;

class PageObserver
{
    /**
     * Handle the Page "saving" event (avant create ou update)
     */
    public function saving(Page $page): void
    {
        // Forcer ordre_menu >= 0
        if ($page->ordre_menu < 0) {
            $page->ordre_menu = 0;
        }

        // Empêcher qu'une page soit son propre parent (seulement pour les pages existantes)
        if ($page->exists && $page->parent_id === $page->id) {
            throw new \InvalidArgumentException('Une page ne peut pas être son propre parent.');
        }
    }

    /**
     * Handle the Page "created" event.
     */
    public function created(Page $page): void
    {
        //
    }

    /**
     * Handle the Page "updated" event.
     */
    public function updated(Page $page): void
    {
        //
    }

    /**
     * Handle the Page "deleted" event.
     */
    public function deleted(Page $page): void
    {
        //
    }

    /**
     * Handle the Page "restored" event.
     */
    public function restored(Page $page): void
    {
        //
    }

    /**
     * Handle the Page "force deleted" event.
     */
    public function forceDeleted(Page $page): void
    {
        //
    }
}
