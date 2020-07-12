<div>
    <label for="{{ $field->name }}" class="block text-sm font-medium leading-5 text-gray-700">{{ $field->label }}</label>
    <div class="mt-1 relative rounded-md shadow-sm">
        <select
            id="{{ $field->name }}"
            class="form-select relative block w-full rounded-none rounded-t-md bg-transparent focus:z-10 transition ease-in-out duration-150 sm:text-sm sm:leading-5 @error($field->key) border-red-300 text-red-900 placeholder-red-300 focus:border-red-300 focus:shadow-outline-red @enderror"
            wire:model.lazy="{{ $field->key }}">

            <option value="">{{ $field->placeholder }}</option>

            @foreach($field->options as $value => $label)
                <option value="{{ $value }}">{{ $label }}</option>
            @endforeach
        </select>
    </div>
    @include('livewire-forms::fields.error-help')
</div>
