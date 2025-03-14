@php
    $componentName = \GIS\RequestForm\Facades\FormActions::getComponentByKey($item->recordable->type);
    $prefix = $postfix = "block-{$item->block->id}";
@endphp

<livewire:dynamic-component :component="$componentName"
                            :prefix="$prefix" :postfix="$postfix" />
