@if ($item->recordable->description)
    <div class="prose max-w-none prose-p:leading-6 mb-indent-half">{!! $item->recordable->markdown !!}</div>
@endif
