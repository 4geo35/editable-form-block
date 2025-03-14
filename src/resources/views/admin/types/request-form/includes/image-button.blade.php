@php($fileName = $item->recordable->image->file_name)
<a href="{{ route('thumb-img', ['template' => 'original', 'filename' => $item->recordable->image->file_name]) }}"
   target="_blank" class="block mr-indent mb-indent basis-auto shrink-0">
    <picture class="not-prose">
        <source media="(min-width: 1024px)" srcset="{{ route('thumb-img', ['template' => 'image-text-record', 'filename' => $fileName]) }}">
        <source media="(min-width: 480px)" srcset="{{ route('thumb-img', ['template' => 'image-text-record-tablet', 'filename' => $fileName]) }}">
        <img src="{{ route('thumb-img', ['template' => 'image-text-record-mobile', 'filename' => $fileName]) }}" alt="" class="rounded-base">
    </picture>
</a>
