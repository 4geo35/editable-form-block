@props(["item", "index"])
@php($hasImage = $item->recordable->image_id)
@php($useModal = $item->recordable->use_modal)
<div class="">
    @if ($useModal)
        @if ($hasImage)
            <div class="row">
                <div class="col w-full lg:w-1/2 ml-auto order-last {{ $index % 2 > 0 ? 'lg:order-first' : 'lg:order-last' }}">
                    <div class="h-full flex flex-col justify-center mb-indent-half xl:w-[525px] mx-auto">
                        <h3 class="text-3xl xs:text-4xl lg:text-5xl font-bold mb-indent-half">{{ $item->title }}</h3>
                        @include("efb::web.types.request-form.includes.description")
                        @include("efb::web.types.request-form.includes.form-button")
                    </div>
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
        <div class="rounded-base bg-primary/25 py-indent-double px-indent {{ $hasImage ? 'mt-indent-double' : '' }}">
            @if ($hasImage)
                <div class="row">
                    <div class="col w-full lg:w-4/12 ml-auto">
                        @include("efb::web.types.request-form.includes.image")
                    </div>
                    <div class="col w-full lg:w-8/12 xl:w-6/12 2xl:w-5/12 mx-auto">
                        @include("efb::web.types.request-form.includes.title")
                        @include("efb::web.types.request-form.includes.description")
                        @include("efb::web.types.request-form.includes.form")
                    </div>
                </div>
            @else
                <div class="w-10/12 mx-auto">
                    @include("efb::web.types.request-form.includes.title")
                    @include("efb::web.types.request-form.includes.description")
                    @include("efb::web.types.request-form.includes.form")
                </div>
            @endif
        </div>
    @endif
</div>
