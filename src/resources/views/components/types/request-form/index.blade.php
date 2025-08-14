@props(["block", "isFullPage" => true])
@if ($block->items->count())
    @if ($block->render_title)
        <x-tt::h2 class="mb-indent-half">{{ $block->render_title }}</x-tt::h2>
    @endif
    <div {{ $attributes->merge(["class" => "flex flex-col gap-indent"]) }}>
        @foreach($block->items as $index => $item)
            @if ($isFullPage) <x-efb::types.request-form.item :item="$item" :index="$index" :is-full-page="$isFullPage" />
            @else <x-efb::types.request-form.two-thirds-item :item="$item" :index="$index" :is-full-page="$isFullPage" />
            @endif
        @endforeach
    </div>
@endif
