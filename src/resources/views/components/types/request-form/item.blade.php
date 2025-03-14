@props(["item", "index"])
@php($hasImage = $item->recordable->image_id)
@php($useModal = $item->recordable->use_modal)
<div>
    @if ($useModal)
        @if ($hasImage)
            <div class="row">
                <div class="col w-full lg:w-1/2 ml-auto order-last {{ $index % 2 > 0 ? 'lg:order-first' : 'lg:order-last' }}">
                    @include("efb::web.types.request-form.includes.title")
                    @include("efb::web.types.request-form.includes.description")
                    @include("efb::web.types.request-form.includes.form-button")
                </div>
                <div class="col w-full lg:w-1/2 relative mb-indent-half lg:mb-0">
                    @include("efb::web.types.request-form.includes.button-image")
                </div>
            </div>
        @else
            <div class="w-full lg:w-8/12">
                @include("efb::web.types.request-form.includes.title")
                @include("efb::web.types.request-form.includes.description")
                @include("efb::web.types.request-form.includes.form-button")
            </div>
        @endif
    @else
        Without modal
    @endif
</div>
