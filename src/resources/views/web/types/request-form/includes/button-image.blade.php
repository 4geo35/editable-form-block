@php($fileName = $item->recordable->image->file_name)
<a href="{{ route('thumb-img', ['template' => 'original', 'filename' => $fileName]) }}"
   data-fslightbox="lightbox-{{ $item->id }}" class="sticky top-0">
    <picture class="not-prose">
        <source media="(min-width: 1024px)" srcset="{{ route('thumb-img', ['template' => 'image-text-record', 'filename' => $fileName]) }}">
        <source media="(min-width: 480px)" srcset="{{ route('thumb-img', ['template' => 'image-text-record-tablet', 'filename' => $fileName]) }}">
        <img src="{{ route('thumb-img', ['template' => 'image-text-record-mobile', 'filename' => $fileName]) }}" alt="" class="rounded-base">
    </picture>
</a>
