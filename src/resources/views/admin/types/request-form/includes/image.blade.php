@php($fileName = $item->recordable->image->file_name)
<a href="{{ route('thumb-img', ['template' => 'original', 'filename' => $item->recordable->image->file_name]) }}"
   target="_blank" class="block mr-indent mb-indent basis-auto shrink-0 -mt-18 inline-block">
    <picture class="not-prose">
        <img src="{{ route('thumb-img', ['template' => 'request-form-record', 'filename' => $fileName]) }}" alt="" class="rounded-base">
    </picture>
</a>
