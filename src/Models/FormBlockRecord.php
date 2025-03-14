<?php

namespace GIS\EditableFormBlock\Models;

use GIS\EditableBlocks\Traits\ShouldBlockItem;
use GIS\EditableFormBlock\Interfaces\FormBlockRecordInterface;
use GIS\Fileable\Traits\ShouldImage;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class FormBlockRecord extends Model implements FormBlockRecordInterface
{
    use ShouldBlockItem, ShouldImage;

    protected $fillable = [
        "description",
        "type",
        "use_modal",
        "button_text",
    ];

    public function getMarkdownAttribute(): ?string
    {
        $value = $this->description;
        if (! $value) return $value;
        return Str::markdown($value);
    }
}
