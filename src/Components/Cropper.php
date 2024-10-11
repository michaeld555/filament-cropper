<?php

namespace Michaeld555\FilamentCropper\Components;

use Closure;
use Filament\Forms\Components\FileUpload;
use Michaeld555\FilamentCropper\Concerns\CanGenerateThumbnail;
use Michaeld555\FilamentCropper\Concerns\CanRotateImage;
use Michaeld555\FilamentCropper\Concerns\CanFlipImage;
use Michaeld555\FilamentCropper\Concerns\CanZoomImage;
use Michaeld555\FilamentCropper\Concerns\HasAspectRatio;
use Michaeld555\FilamentCropper\Concerns\HasViewMode;
use Michaeld555\FilamentCropper\Values\DragMode;


class Cropper extends FileUpload
{
    use CanFlipImage, CanRotateImage, CanZoomImage, HasViewMode, HasAspectRatio, CanGenerateThumbnail;

    protected string $view = 'filament-cropper::components.cropper';

    protected string|Closure|null $imageResizeTargetHeight = '400';

    protected string|Closure|null $imageResizeTargetWidth = '400';

    protected string|Closure|null $modalSize = '6xl';

    protected string|Closure|null $modalHeading = 'Manage Image';

    protected DragMode|Closure $dragMode;

    public function getAcceptedFileTypes(): ?array
    {
        if ( parent::getAcceptedFileTypes() == null){
            $this->acceptedFileTypes([
                "image/png", " image/gif", "image/jpeg"
            ]);
        }
        return parent::getAcceptedFileTypes();
    }

    public function modalSize(string|Closure|null $modalSize): static
    {
        $this->modalSize = $modalSize;

        return $this;
    }

    public function getModalSize(): ?string
    {
        return $this->evaluate($this->modalSize);
    }

    public function modalHeading(string|Closure|null $modalHeading): static
    {
        $this->modalHeading = $modalHeading;

        return $this;
    }

    public function getModalHeading(): ?string
    {
        return $this->evaluate($this->modalHeading);
    }



    public function dragMode(DragMode|Closure $dragMode): static
    {
        $this->dragMode = $dragMode;
        return $this;
    }

    public function getDragMode(): DragMode
    {
        if (empty($this->dragMode)) {
            return DragMode::NONE;
        }
        return $this->evaluate($this->dragMode);
    }



}
