<?php

namespace GIS\EditableFormBlock\Facades;

use GIS\EditableFormBlock\Helpers\FormBlockRenderActionsManager;
use GIS\EditableFormBlock\Interfaces\FormBlockRecordInterface;
use Illuminate\Support\Facades\Facade;

/**
 * @method static void expandFormBlockRecord(FormBlockRecordInterface $record)
 *
 * @see FormBlockRenderActionsManager
 */
class FormBlockRenderActions extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return "form-block-render-actions";
    }
}
