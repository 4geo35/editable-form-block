<?php

namespace GIS\EditableFormBlock;

use GIS\EditableFormBlock\Livewire\Admin\Types\RequestFormWire;
use Illuminate\Support\ServiceProvider;
use Livewire\Livewire;

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
        // Types
        $component = config("editable-form-block.customRequestFormComponent");
        Livewire::component(
            "efb-request-form",
            $component ?? RequestFormWire::class
        );
    }

    protected function expandConfiguration(): void
    {
        $eb = app()->config["editable-blocks"];

        $types = $eb["availableTypes"];
        $types["requestForm"] = [
            "title" => config("editable-form-block.buttonTitle"),
            "admin" => config("editable-form-block.adminComponent"),
            "render" => config("editable-form-block.webComponent"),
        ];
        app()->config["editable-blocks.availableTypes"] = $types;
    }
}
