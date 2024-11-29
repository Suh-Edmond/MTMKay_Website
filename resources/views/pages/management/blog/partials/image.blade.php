<div class="max-w-xl">
    <section>
        <header>
            <h2 class="text-lg font-medium text-gray-900">
                {{ __('Blog Images') }}
            </h2>

            <p class="mt-1 text-sm text-gray-600">
                {{ __("Provide blog images. Maximum of four (04)") }}
            </p>
        </header>
        @if(isset($blog))
            <div class="flex gap-4">
                @foreach(session('blog')->blogImages as $image)
                    <div class="bg-white shadow-sm sm:rounded-lg">
                        <img src="{{ asset($image->file_path) }}"  >
                    </div>
                @endforeach
            </div>
        @endif
        <div class="w-full">
            <form method="post" action="{{ route('manage-blogs.upload-images', ['slug' => session('blog')->slug ?? '']) }}" class="mt-6 space-y-6"  enctype="multipart/form-data">
                @csrf

                <div>
                    <x-input-label for="files" :value="__('Blog Images')" />
                    <x-text-input id="files" multiple name="files[]" type="file" class="mt-1 block w-full" :value="old('files')" required    />
                    <x-input-error class="mt-2" :messages="$errors->get('files')" />
                </div>

                <div class="flex items-center gap-4">
                    <x-primary-button>{{ __('Save') }}</x-primary-button>

                    @if (session('status') === 'blog images updated successfully')
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
