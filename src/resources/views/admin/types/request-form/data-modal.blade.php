<x-tt::modal.dialog wire:model="displayData">
    <x-slot name="title">
        {{ $itemId ? "Редактировать элемент" : "Добавить элемент" }}
    </x-slot>
    <x-slot name="content">
        <form wire:submit.prevent="{{ $itemId ? 'update' : 'store' }}"
              class="space-y-indent-half"
              id="formRequestBlockDataForm-{{ $block->id }}">
            <div>
                <label for="requestFormTitle-{{ $block->id }}" class="inline-block mb-2">
                    Заголовок <span class="text-danger">*</span>
                </label>
                <input type="text" id="requestFormTitle-{{ $block->id }}"
                       class="form-control {{ $errors->has("title") ? "border-danger" : "" }}"
                       required
                       wire:loading.attr="disabled"
                       wire:model="title">
                <x-tt::form.error name="title"/>
            </div>

            <div>
                <label for="requestFormType-{{ $block->id }}" class="inline-block mb-2">
                    Форма <span class="text-danger">*</span>
                </label>
                <select id="requestFormType-{{ $block->id }}"
                        class="form-select {{ $errors->has('formType') }}" aria-label="Форма"
                        required
                        wire:loading.attr="disabled"
                        wire:model="formType">
                    <option value="">-- Выберите --</option>
                    @foreach($formList as $item)
                        <option value="{{ $item->key }}">{{ $item->title }}</option>
                    @endforeach
                </select>
                <x-tt::form.error name="formType" />
            </div>

            <div class="form-check">
                <input type="checkbox" class="form-check-input" id="requestFormModal-{{ $block->id }}"
                       wire:model.live="useModal">
                <label for="requestFormModal-{{ $block->id }}" class="form-check-label">
                    Использовать модальное окно
                </label>
            </div>

            @if ($useModal)
                <div>
                    <label for="requestFormButton-{{ $block->id }}" class="inline-block mb-2">
                        Текст кнопки вызова формы
                    </label>
                    <input type="text" id="requestFormButton-{{ $block->id }}"
                           class="form-control {{ $errors->has("buttonText") ? "border-danger" : "" }}"
                           wire:loading.attr="disabled"
                           wire:model="buttonText">
                    <x-tt::form.error name="buttonText"/>
                </div>
            @endif

            <div>
                <label for="requestFormImage-{{ $block->id }}" class="inline-block mb-2">Изображение</label>
                <input type="file" id="requestFormImage-{{ $block->id }}"
                       class="form-control {{ $errors->has('image') ? 'border-danger' : '' }}"
                       wire:loading.attr="disabled"
                       wire:model.lazy="image">
                <x-tt::form.error name="image" />
                @include("tt::admin.delete-image-button")
            </div>

            <div>
                <label for="requestFormDescription-{{ $block->id }}" class="flex justify-start items-center mb-2">
                    Описание
                    @include("tt::admin.description-button", ["id" => "requestFormHidden-{$block->id}"])
                </label>
                @include("tt::admin.description-info", ["id" => "requestFormHidden-{$block->id}"])
                <textarea id="requestFormDescription-{{ $block->id }}" class="form-control !min-h-52 {{ $errors->has('description') ? 'border-danger' : '' }}"
                          rows="10"
                          wire:model.live="description">
                        {{ $description }}
                    </textarea>
                <x-tt::form.error name="description" />

                <div class="prose prose-sm mt-indent-half">
                    {!! \Illuminate\Support\Str::markdown($description) !!}
                </div>
            </div>

            <div class="flex items-center space-x-indent-half">
                <button type="button" class="btn btn-outline-dark" wire:click="closeData">
                    Отмена
                </button>
                <button type="submit" form="formRequestBlockDataForm-{{ $block->id }}" class="btn btn-primary"
                        wire:loading.attr="disabled">
                    {{ $itemId ? "Обновить" : "Добавить" }}
                </button>
            </div>
        </form>
    </x-slot>
</x-tt::modal.dialog>
