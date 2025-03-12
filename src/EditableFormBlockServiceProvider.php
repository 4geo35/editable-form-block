<?php

namespace GIS\EditableFormBlock;

use Illuminate\Support\ServiceProvider;

class EditableFormBlockServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        // Views
        $this->loadViewsFrom(__DIR__ . "/resources/views", "efb");

        // Livewire
        $this->addLivewireComponents();

        // Конфиг
        $this->expandConfiguration();
    }

    public function register(): void
    {
        // Config
        $this->mergeConfigFrom(__DIR__ . "/config/editable-form-block.php", "editable-form-block");
    }

    protected function addLivewireComponents(): void
    {

    }

    protected function expandConfiguration(): void
    {
        $eb = app()->config["editable-blocks"];

        $types = $eb["availableTypes"];
        $types["requestForm"] = [
            "title" => config("editable-form-block.buttonTitle"),
            "admin" => "eb-image-text",
            "render" => "eb::types.image-text",
        ];
        app()->config["editable-blocks.availableTypes"] = $types;
    }
}
