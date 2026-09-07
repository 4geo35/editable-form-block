@props(["block", "isFullPage" => true])
@if ($block->items->count())
    @php($hasTitle = (bool) $block->render_title)
    @if ($block->render_title)
        <x-tt::h2 class="mb-indent-half">{{ $block->render_title }}</x-tt::h2>
    @endif
    <div {{ $attributes->merge(["class" => "flex flex-col gap-indent"]) }}>
        @foreach($block->items as $index => $item)
            @if ($isFullPage) <x-efb::types.request-form.item :$item :$index :$isFullPage :$hasTitle />
            @else <x-efb::types.request-form.two-thirds-item :$item :$index :$isFullPage :$hasTitle />
            @endif
        @endforeach
    </div>
@endif
