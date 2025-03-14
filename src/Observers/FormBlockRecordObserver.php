<?php

namespace GIS\EditableFormBlock\Observers;
use GIS\EditableFormBlock\Interfaces\FormBlockRecordInterface;

class FormBlockRecordObserver
{
    public function updated(FormBlockRecordInterface $record): void
    {
        $item = $record->item;
        if (! $item) { return; }
        $item->touch();
    }
}
