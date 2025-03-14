@if ($item->recordable->description)
    <div class="prose max-w-none mb-indent-half">{!! $item->recordable->markdown !!}</div>
@endif
