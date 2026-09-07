@if ($item->title)
    @if ($hasTitle)
        <x-tt::h3 class="mb-indent-half">{{ $item->title }}</x-tt::h3>
    @else
        <x-tt::h2 class="mb-indent-half">{{ $item->title }}</x-tt::h2>
    @endif
@endif
