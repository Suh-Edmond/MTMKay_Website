<div class="max-w-xl">
    <section>
        <header>
            <h2 class="text-lg font-medium text-gray-900">
                {{ __('Program Image') }}
            </h2>

            <p class="mt-1 text-sm text-gray-600">
                {{ __("Update the program image.") }}
            </p>
        </header>
        <div class="grow w-3/4">
            <img src="{{ asset($program->getImagePath($program, $program->image_path)) }}" width="100%" height="100px">
        </div>
        <div>
            <form method="post" action="{{ route('program.update.image', ['slug' => $program->slug]) }}" class="mt-6 space-y-6"  enctype="multipart/form-data">
                @csrf
                @method('put')

                <div>
                    <x-input-label for="image_path" :value="__('Program Image')" />
                    <x-text-input id="image_path" name="image_path" type="file" class="mt-1 block w-full" :value="old('image_path', $program->image_path)" required    />
                    <x-input-error class="mt-2" :messages="$errors->get('image_path')" />
                </div>

                <div class="flex items-center gap-4">
                    <x-primary-button>{{ __('Save') }}</x-primary-button>

                    @if (session('status') === 'program image updated successfully')
                        <p
                            x-data="{ show: true }"
                            x-show="show"
                            x-transition
                            x-init="setTimeout(() => show = false, 3000)"
                            class="text-sm text-gray-600"
                        >{{ __('Saved.') }}</p>
                    @endif
                </div>
            </form>
        </div>
    </section>
</div>