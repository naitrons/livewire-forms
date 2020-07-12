<div class="mb-3">
    <label for="{{ $field->name }}" class="block text-sm font-medium leading-5 text-gray-700 mb-2">{{ $field->label }}</label>
    <div class="relative">
        @foreach($field->options as $value => $label)
            <div class="mt-1 flex items-center">
                <input
                    id="{{ $field->name . '.' . $loop->index }}"
                    type="radio"
                    class="form-radio h-4 w-4 text-black transition duration-150 ease-in-out @error($field->key) border-red-300 text-red-900 placeholder-red-300 focus:border-red-300 @enderror"
                    value="{{ $value }}"
                    wire:model.lazy="{{ $field->key }}">

                <label class="form-check-label ml-2" for="{{ $field->name . '.' . $loop->index }}">
                    {{ $label }}
                </label>
            </div>
        @endforeach
    </div>
    @include('livewire-forms::fields.error-help')
</div>