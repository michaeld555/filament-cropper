<?php

namespace Michaeld555\FilamentCropper\Concerns;

use Closure;
use Michaeld555\FilamentCropper\Values\ViewMode;

trait HasViewMode
{
    protected ViewMode|Closure $viewMode;

    public function viewMode(ViewMode|Closure $viewMode): static
    {
        $this->viewMode = $viewMode;
        return $this;
    }

    public function getViewMode(): ViewMode
    {
        if (empty($this->viewMode)) {
            return ViewMode::FIT_FILL_CANVAS;
        }
        return $this->evaluate($this->viewMode);
    }
}
