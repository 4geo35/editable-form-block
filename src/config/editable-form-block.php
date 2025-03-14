<?php

return [
    "buttonTitle" => "Форма обратной связи",
    "adminComponent" => "efb-request-form",
    "webComponent" => "efb::types.request-form",
    "expandRender" => [
        "class" => \GIS\EditableFormBlock\Facades\FormBlockRenderActions::class,
        "method" => "expandFormBlockRecord",
    ],

    // Admin
    "customFormBlockRecordModel" => null,
    "customFormBlockObserverModel" => null,

    // Components
    "customRequestFormComponent" => null,

    // Templates
    "templates" => [
        "request-form-record" => \GIS\EditableFormBlock\Templates\RequestFormRecord::class
    ],
];
