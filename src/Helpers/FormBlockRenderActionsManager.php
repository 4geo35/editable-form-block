<?php

namespace GIS\EditableFormBlock\Helpers;

use GIS\EditableFormBlock\Interfaces\FormBlockRecordInterface;

class FormBlockRenderActionsManager
{
    public function expandFormBlockRecord(FormBlockRecordInterface $record): void
    {
        $record->load("image");
    }
}
