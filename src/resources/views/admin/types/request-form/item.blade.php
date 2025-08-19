@php($hasImage = $item->recordable->image_id)

@if ($item->recordable->use_modal)
    @if ($hasImage)
        <div class="row">
            <div class="col w-full lg:w-1/2">
                @include("efb::admin.types.request-form.includes.image-button")
            </div>
            <div class="col w-full lg:w-1/2">
                @include("efb::admin.types.request-form.includes.title")
                @include("efb::admin.types.request-form.includes.description")
                @include("efb::admin.types.request-form.includes.form-button")
            </div>
        </div>
    @else
        <div>
            @include("efb::admin.types.request-form.includes.title")
            @include("efb::admin.types.request-form.includes.description")
            @include("efb::admin.types.request-form.includes.form-button")
        </div>
    @endif
@else
    <div class="rounded-base bg-primary/25 p-indent {{ $hasImage ? "mt-indent-double" : "" }}">
        @if ($hasImage)
            <div class="row">
                <div class="col w-4/12 ml-auto">
                    @include("efb::admin.types.request-form.includes.image")
                </div>
                <div class="col w-5/12 mx-auto">
                    @include("efb::admin.types.request-form.includes.title")
                    @include("efb::admin.types.request-form.includes.description")
                    @include("efb::admin.types.request-form.includes.form-place")
                </div>
            </div>
        @else
            <div class="w-10/12 mx-auto">
                @include("efb::admin.types.request-form.includes.title")
                @include("efb::admin.types.request-form.includes.description")
                @include("efb::admin.types.request-form.includes.form-place")
            </div>
        @endif
    </div>
@endif
