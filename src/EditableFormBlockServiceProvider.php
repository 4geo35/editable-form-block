<?php

namespace GIS\EditableFormBlock;

use GIS\EditableFormBlock\Helpers\FormBlockRenderActionsManager;
use GIS\EditableFormBlock\Livewire\Admin\Types\RequestFormWire;
use GIS\EditableFormBlock\Models\FormBlockRecord;
use GIS\EditableFormBlock\Observers\FormBlockRecordObserver;
use GIS\Fileable\Traits\ExpandTemplatesTrait;
use Illuminate\Support\ServiceProvider;
use Livewire\Livewire;

class EditableFormBlockServiceProvider extends ServiceProvider
{
    use ExpandTemplatesTrait;
    public function boot(): void
    {
        // Views
        $this->loadViewsFrom(__DIR__ . "/resources/views", "efb");

        // Livewire
        $this->addLivewireComponents();

        // Конфиг
        $this->expandConfiguration();

        // Observers
        $formRecordClass = config("editable-form-block.customFormBlockRecordModel") ?? FormBlockRecord::class;
        $formRecordObserverClass = config("editable-form-block.customFormBlockObserverModel") ?? FormBlockRecordObserver::class;
        $formRecordClass::observe($formRecordObserverClass);
    }

    public function register(): void
    {
        // migrations
        $this->loadMigrationsFrom(__DIR__ . "/database/migrations");

        // Config
        $this->mergeConfigFrom(__DIR__ . "/config/editable-form-block.php", "editable-form-block");

        // Facades
        $this->initFacades();
    }

    protected function initFacades(): void
    {
        $this->app->singleton("form-block-render-actions", function () {
            $formBlockRenderActionsManager = config("editable-form-block.customBlockRenderActionsManager") ?? FormBlockRenderActionsManager::class;
            return new $formBlockRenderActionsManager;
        });
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
        $efb = app()->config["editable-form-block"];
        $this->expandTemplates($efb);

        $types = $eb["availableTypes"];
        $types["requestForm"] = [
            "title" => config("editable-form-block.buttonTitle"),
            "admin" => config("editable-form-block.adminComponent"),
            "render" => config("editable-form-block.webComponent"),
        ];
        app()->config["editable-blocks.availableTypes"] = $types;

        $render = $eb["expandRender"];
        $render["expandFormBlockRecord"] = config("editable-form-block.expandRender");
        app()->config["editable-blocks.expandRender"] = $render;
    }
}
