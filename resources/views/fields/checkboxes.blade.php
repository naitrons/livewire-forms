<div class="form-group row">
    <label for="{{ $field->name }}" class="block text-sm font-medium leading-5 text-gray-700">
       {{ $field->label }}
    </label>

    <div class="col-md">
        @foreach($field->options as $value => $label)
            <div class="form-check">
                <input
                    id="{{ $field->name . '.' . $loop->index }}"
                    type="checkbox"
                    class="form-check-input @error($field->key) is-invalid @enderror"
                    value="{{ $value }}"
                    wire:model.lazy="{{ $field->key }}">

                <label class="form-check-label" for="{{ $field->name . '.' . $loop->index }}">
                    {{ $label }}
                </label>
            </div>
        @endforeach

        @include('livewire-forms::fields.error-help')
    </div>
</div>
