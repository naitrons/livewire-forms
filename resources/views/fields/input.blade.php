<div class="mb-3">
    <label for="{{ $field->name }}" class="block text-sm font-medium leading-5 text-gray-700 mb-2">{{ $field->label }}</label>
    <div class="relative rounded-md shadow-sm">
        <input
            id="{{ $field->name }}"
            type="{{ $field->input_type }}"
            class="form-input block w-full pr-10  sm:text-sm sm:leading-5 @error($field->key) border-red-300 text-red-900 placeholder-red-300 focus:border-red-300 focus:shadow-outline-red @enderror"
            autocomplete="{{ $field->autocomplete }}"
            placeholder="{{ $field->placeholder }}"
            wire:model.lazy="{{ $field->key }}"
        >
    </div>
    @include('livewire-forms::fields.error-help')
</div>