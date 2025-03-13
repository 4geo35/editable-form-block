<?php

namespace GIS\EditableFormBlock\Interfaces;

use ArrayAccess;
use JsonSerializable;
use Stringable;
use GIS\EditableBlocks\Interfaces\ShouldBlockItemInterface;
use GIS\Fileable\Interfaces\ShouldImageInterface;
use Illuminate\Contracts\Broadcasting\HasBroadcastChannel;
use Illuminate\Contracts\Queue\QueueableEntity;
use Illuminate\Contracts\Routing\UrlRoutable;
use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Contracts\Support\CanBeEscapedWhenCastToString;
use Illuminate\Contracts\Support\Jsonable;

interface FormBlockRecordInterface extends Arrayable, ArrayAccess, CanBeEscapedWhenCastToString,
    HasBroadcastChannel, Jsonable, JsonSerializable, QueueableEntity, Stringable, UrlRoutable, ShouldImageInterface, ShouldBlockItemInterface
{

}
