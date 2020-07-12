<div class="form-group row">
    <label for="{{ $field->name }}" class="block text-sm font-medium leading-5 text-gray-700">
       {{ $field->label }}
    </label>

    <div class="col-md">
        <textarea
            id="{{ $field->name }}"
            rows="{{ $field->textarea_rows }}"
            class="form-control @error($field->key) is-invalid @enderror"
            placeholder="{{ $field->placeholder }}"
            wire:model.lazy="{{ $field->key }}"></textarea>

        @include('livewire-forms::fields.error-help')
    </div>
</div>
