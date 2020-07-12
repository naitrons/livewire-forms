<div>
    <div class="shadow sm:rounded-md sm:overflow-hidden">
        <div class="px-4 py-5 bg-white sm:p-6">
            @foreach($fields as $field)
                @if($field->view)
                    @include($field->view)
                @else
                    @include('livewire-forms::fields.' . $field->type)
                @endif
            @endforeach

            <div class="mt-4">
                <button class="inline-flex justify-center py-2 px-4 border border-transparent text-sm leading-5 font-medium rounded-md text-white bg-black hover:bg-black focus:outline-none focus:border-black focus:shadow-outline-indigo active:bg-black transition duration-150 ease-in-ou" wire:click="saveAndStay">{{ __('Save') }}</button>
                <button class="inline-flex justify-center py-2 px-4 border border-transparent text-sm leading-5 font-medium rounded-md text-white bg-black hover:bg-black focus:outline-none focus:border-black focus:shadow-outline-indigo active:bg-black transition duration-150 ease-in-ou" wire:click="saveAndGoBack">{{ __('Save & Go Back') }}</button>
            </div>
        </div>
    </div>

    @push('scripts')
    <script>
        // Code is inspired by Pastor Ryan Hayden
        // https://github.com/livewire/livewire/issues/106
        // Thank you, sir!
        document.addEventListener('DOMContentLoaded', function() {
            document.querySelectorAll('input[type="file"]').forEach(file => {
                file.addEventListener('input', event => {
                    let form_data = new FormData();
                    form_data.append('component', @json(get_class($this)));
                    form_data.append('field_name', file.id);

                    for (let i = 0; i < event.target.files.length; i++) {
                        form_data.append('files[]', event.target.files[i]);
                    }

                    axios.post('{{ route('livewire-forms.file-upload') }}', form_data, {
                            headers: {
                                'Content-Type': 'multipart/form-data'
                            }
                        }).then(response => {
                        window.livewire.emit('fileUpdate', response.data.field_name, response.data.uploaded_files);
                    });
                })
            });
        });

    </script>
    @endpush
