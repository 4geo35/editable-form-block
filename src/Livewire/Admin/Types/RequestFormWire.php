<?php

namespace GIS\EditableFormBlock\Livewire\Admin\Types;

use GIS\EditableBlocks\Traits\CheckBlockAuthTrait;
use GIS\EditableBlocks\Traits\EditBlockTrait;
use GIS\EditableFormBlock\Interfaces\FormBlockRecordInterface;
use GIS\EditableFormBlock\Models\FormBlockRecord;
use Illuminate\View\View;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;

class RequestFormWire extends Component
{
    use EditBlockTrait, CheckBlockAuthTrait;

    public bool $displayData = false;
    public bool $displayDelete = false;

    public int|null $itemId = null;
    public string $formType = "";
    public string $title = "";
    public string $description = "";
    public TemporaryUploadedFile|null $image = null;
    public string|null $imageUrl = null;
    public bool $useModal = false;

    public function rules(): array
    {
        return [
            "title" => ["required", "string", "max:150"],
            "description" => ["nullable", "string"],
            "image" => ["nullable", "image"],
            "formType" => ["required", "string"],
        ];
    }

    public function validationAttributes(): array
    {
        return [
            "title" => "Заголовок",
            "description" => "Описание",
            "image" => "Изображение",
            "formType" => "Форма"
        ];
    }

    public function render(): View
    {
        $items = $this->block->items()->with("recordable")->orderBy("priority")->get();
        return view('efb::livewire.admin.types.request-form-wire', compact('items'));
    }

    public function closeData(): void
    {
        $this->resetFields();
        $this->displayData = false;
    }

    public function showCreate(): void
    {
        $this->resetFields();
        if (! $this->checkAuth("create")) { return; }
        $this->displayData = true;
    }

    public function store(): void
    {
        if (! $this->checkAuth("create")) { return; }
        $this->validate();

        $formRecordModelClass = config("editable-form-block.customFormBlockRecordModel") ?? FormBlockRecord::class;
        $record = $formRecordModelClass::create([
            "description" => $this->description,
            "type" => $this->formType,
            "use_modal" => $this->useModal ? now() : null,
        ]);
        /**
         * @var FormBlockRecordInterface $record
         */
        $record->livewireImage($this->image);
        $record->item()->create([
            "title" => $this->title,
            "block_id" => $this->block->id,
        ]);

        $this->closeData();
        session()->flash("item-{$this->block->id}-success", "Элемент успешно добавлен");
    }

    public function showEdit(int $id): void
    {
        $this->resetFields();
        $this->itemId = $id;
        $item = $this->findItem();
        if (! $item) { return; }
        if (! $this->checkAuth("update", true)) { return; }
        $record = $item->recordable;

        $this->title = $item->title;
        $this->description = $record->description;
        if ($record->image_id) {
            $record->load("image");
            $this->imageUrl = $record->image->storage;
        } else $this->imageUrl = null;
        $this->useModal = ! empty($record->use_modal);
        $this->formType = $record->type;
        $this->displayData = true;
    }

    public function update(): void
    {
        $item = $this->findItem();
        if (! $item) { return; }
        if (! $this->checkAuth("update", true)) { return; }
        $record = $item->recordable;
        /**
         * @var FormBlockRecordInterface $record
         */
        $this->validate();
        $record->update([
            "description" => $this->description,
            "type" => $this->formType,
            "use_modal" => $this->useModal ? now() : null,
        ]);
        $record->livewireImage($this->image);
        $item->update([
            "title" => $this->title,
        ]);

        $this->closeData();
        session()->flash("item-{$this->block->id}-success", "Элемент успешно обновлен");
    }

    protected function resetFields(): void
    {
        $this->reset("itemId", "formType", "title", "description", "image", "imageUrl");
    }
}
