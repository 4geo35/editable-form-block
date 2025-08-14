@props(["item", "index", "isFullPage" => true])
@php($hasImage = $item->recordable->image_id)
@php($useModal = $item->recordable->use_modal)
<div class="">
    @if ($useModal)
        @if ($hasImage)
            @include("efb::web.types.request-form.includes.button-image")
            <h3 class="text-3xl xs:text-4xl lg:text-5xl font-bold mb-indent-half">{{ $item->title }}</h3>
            @include("efb::web.types.request-form.includes.description")
            @include("efb::web.types.request-form.includes.form-button")
        @else
            @include("efb::web.types.request-form.includes.title")
            @include("efb::web.types.request-form.includes.description")
            @include("efb::web.types.request-form.includes.form-button")
        @endif
    @else
        <div class="rounded-base bg-primary/25 py-indent-double px-indent {{ $hasImage ? 'mt-indent-double' : '' }}">
            @if ($hasImage)
                @include("efb::web.types.request-form.includes.image")
                @include("efb::web.types.request-form.includes.title")
                @include("efb::web.types.request-form.includes.description")
                @include("efb::web.types.request-form.includes.form")
            @else
                @include("efb::web.types.request-form.includes.title")
                @include("efb::web.types.request-form.includes.description")
                @include("efb::web.types.request-form.includes.form")
            @endif
        </div>
    @endif
</div>
