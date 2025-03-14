<?php

return [
    "buttonTitle" => "Форма обратной связи",
    "adminComponent" => "efb-request-form",
    "webComponent" => "efb::types.request-form",

    // Admin
    "customFormBlockRecordModel" => null,

    // Components
    "customRequestFormComponent" => null,

    // Templates
    "templates" => [
        "request-form-record" => \GIS\EditableFormBlock\Templates\RequestFormRecord::class
    ],
];
