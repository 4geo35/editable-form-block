@php
    $componentName = \GIS\RequestForm\Facades\FormActions::getComponentByKey($item->recordable->type);
    $prefix = $postfix = "block-{$item->block->id}";
@endphp

<div>
    <button type="button" class="btn btn-primary" x-data
            @click="$dispatch('show-request-form', { key: 'call-request', place : 'Блок {{ $item->block->render_title ? $item->block->render_title : $item->block->title }}, {{ $item->title }}'})">
        {{ $item->recordable->button_text ? $item->recordable->button_text : "Заказать" }}
    </button>
</div>

@push("modals")
    <livewire:dynamic-component :component="$componentName" :modal="true"
                                :prefix="$prefix" :postfix="$postfix" />
@endpush
