<?php

return [
    "availableTypes" => [
        "requestForm" => [
            "title" => "Форма обратной связи",
            "admin" => "efb-request-form",
            "render" => "efb::types.request-form",
        ],
    ],

    "expandRender" => [
        "expandFormBlockRecord" => [
            "class" => \GIS\EditableFormBlock\Facades\FormBlockRenderActions::class,
            "method" => "expandFormBlockRecord",
        ],
    ],

    // Admin
    "customFormBlockRecordModel" => null,
    "customFormBlockObserverModel" => null,

    // Components
    "customRequestFormComponent" => null,

    // Templates
    "templates" => [
        "request-form-record" => \GIS\EditableFormBlock\Templates\RequestFormRecord::class,
        "request-form-record-tablet" => \GIS\EditableFormBlock\Templates\RequestFormRecordTablet::class,
        "request-form-record-mobile" => \GIS\EditableFormBlock\Templates\RequestFormRecordMobile::class,

        "request-form-record-two-thirds" => \GIS\EditableFormBlock\Templates\RequestFormRecordTwoThirds::class,
    ],
];
