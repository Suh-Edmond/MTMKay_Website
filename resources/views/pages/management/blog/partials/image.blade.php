<div class="max-w-7xl">
    <section>
        <header>
            <h2 class="text-lg font-medium text-gray-900">
                {{ __('Blog Images') }}
            </h2>

            <p class="mt-1 text-sm text-gray-600 mb-5">
                {{ __("Provide blog images. Maximum of four (04)") }}
            </p>
        </header>
        @if(isset($blog))
            <div class="flex gap-4">
                @foreach($blog->blogImages as $image)
                    <div class="bg-white shadow-sm sm:rounded-lg cursor-pointer" >
                        <img src="{{ asset($blog->getImagePath($blog, $image->file_path)) }}" alt="Blog Image" width="250px" height="250px" >
                    </div>
                @endforeach
            </div>
        @endif
        <div class="w-full">
            <form method="post" action="{{ route('manage-blogs.upload-images', ['slug' => $blog->slug ?? '']) }}" class="mt-6 space-y-6"  enctype="multipart/form-data" id="imageUploadForm">
                @csrf

                <div class="w-full">
                    <x-input-label for="files" :value="__('Blog Images')" />
                    <x-text-input id="files" multiple name="files[]" type="file" class="mt-1 block w-full border" :value="old('files')" required    />
                    <x-input-error class="mt-2" :messages="$errors->get('files')" />
                </div>

                <div class="progress mt-3 w-full">
                    <div class="progress-bar progress-bar-striped progress-bar-animated bg-success" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%"></div>
                </div>

                <div class="flex flex-row justify-between">
                    <div class="flex items-center gap-4">
                        <x-primary-button>{{ __('Save') }}</x-primary-button>

                        <x-auth-session-status :status="session('status')"  x-data="{ show: true }"
                                               x-show="show"
                                               x-transition
                                               x-init="setTimeout(() => show = false, 2000)">
                        </x-auth-session-status>
                    </div>
                </div>
            </form>
        </div>
    </section>
</div>
