<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Program Detail') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
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
            </div>

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-full">
                    <section>
                        <header>
                            <h2 class="text-lg font-medium text-gray-900">
                                {{ __('Profile Information') }}
                            </h2>

                            <p class="mt-1 text-sm text-gray-600">
                                {{ __("Update program Information.") }}
                            </p>
                        </header>

                        <form method="post" action="{{ route('program.update.information', ['slug' => $program->slug]) }}" class="mt-6 space-y-6">
                            @csrf
                            @method('put')


                            <div class="flex gap-4">
                                <div class="grow">
                                    <x-input-label for="title" :value="__('Title')" />
                                    <x-text-input id="title" name="title" type="text" class="mt-1 block w-full" :value="old('title', $program->title)" required   autocomplete="title" />
                                    <x-input-error class="mt-2" :messages="$errors->get('title')" />
                                </div>

                                <div class="grow">
                                    <x-input-label for="trainer_name" :value="__('Trainer Name')" />
                                    <x-text-input id="trainer_name" name="trainer_name" type="text" class="mt-1 block w-full" :value="old('trainer_name', $program->trainer_name)" required   autocomplete="trainer_name" />
                                    <x-input-error class="mt-2" :messages="$errors->get('trainer_name')" />
                                </div>
                            </div>

                            <div class="flex gap-4">
                                <div class="grow">
                                    <x-input-label for="duration" :value="__('Duration')" />
                                    <x-text-input id="duration" name="duration" type="number" class="mt-1 block w-full" :value="old('duration', $program->duration)" required   autocomplete="duration" />
                                    <x-input-error class="mt-2" :messages="$errors->get('duration')" />
                                </div>

                                <div class="grow">
                                    <x-input-label for="available_seats" :value="__('Available Seats')" />
                                    <x-text-input id="available_seats" name="available_seats" type="number" class="mt-1 block w-full" :value="old('available_seats', $program->available_seats)" required   autocomplete="available_seats" />
                                    <x-input-error class="mt-2" :messages="$errors->get('available_seats')" />
                                </div>
                            </div>

                            <div>
                                <x-input-label for="cost" :value="__('Cost')" />
                                <x-text-input id="cost" name="cost" type="number" class="mt-1 block w-full" :value="old('cost', $program->cost)" required   autocomplete="cost" />
                                <x-input-error class="mt-2" :messages="$errors->get('cost')" />
                            </div>

                            <div>
                                <x-input-label for="objective" :value="__('Objective')" />
                                <textarea id="objective" name="objective" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" >{{$program->objective}}</textarea>
                                <x-input-error class="mt-2" :messages="$errors->get('objective')" />
                            </div>

                            <div>
                                <x-input-label for="eligibility" :value="__('Eligibility')" />
                                <textarea id="eligibility" name="eligibility" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" >{{$program->eligibility}}</textarea>

                                <x-input-error class="mt-2" :messages="$errors->get('eligibility')" />
                            </div>

                            <div>
                                <x-input-label for="training_resources" :value="__('Resources')" />
                                <textarea id="training_resources" name="training_resources" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" >{{$program->training_resources}}</textarea>

                                <x-input-error class="mt-2" :messages="$errors->get('training_resources')" />
                            </div>


                            <div class="flex items-center gap-4">
                                <x-primary-button>{{ __('Save') }}</x-primary-button>

                                @if (session('status') === 'program information updated successfully')
                                    <p
                                        x-data="{ show: true }"
                                        x-show="show"
                                        x-transition
                                        x-init="setTimeout(() => show = false, 2000)"
                                        class="text-sm text-gray-600"
                                    >{{ __('Saved.') }}</p>
                                @endif
                            </div>
                        </form>
                    </section>
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-full">
                    <section>
                        <div class="flex justify-between">
                            <header>
                                <h2 class="text-lg font-medium text-gray-900">
                                    {{ __('Program Outline') }}
                                </h2>
                            </header>
                        </div>
                        <form method="post" action="{{ route('program.update.outline', ['slug' => $program->slug]) }}" class="mt-6 space-y-6 ">
                            @csrf
                            @method('put')
                            @foreach($program->programOutlines as $outline)
                                <div>
                                    <x-input-label for="period" value="{{$outline->period}}" />
                                    <x-text-input id="topic" name="topic" type="text" class="mt-1 block w-full" disabled :value="old('topic', $outline->topic)" required   autocomplete="topic" />
                                    <x-text-input id="slug" name="slug" type="text" class="mt-1 block w-full hidden" :value="old('slug', $outline->slug)" required   autocomplete="slug" />
                                    <x-input-error class="mt-2" :messages="$errors->get('topic')" />
                                </div>
                            @endforeach
{{--                            <div class="flex items-center gap-4 mb-3">--}}
{{--                                <x-primary-button>{{ __('Save') }}</x-primary-button>--}}
{{--                                @if (session('status') === 'program outline updated successfully')--}}
{{--                                    <p--}}
{{--                                        x-data="{ show: true }"--}}
{{--                                        x-show="show"--}}
{{--                                        x-transition--}}
{{--                                        x-init="setTimeout(() => show = false, 2000)"--}}
{{--                                        class="text-sm text-gray-600"--}}
{{--                                    >{{ __('Saved.') }}</p>--}}
{{--                                @endif--}}
{{--                            </div>--}}
                        </form>
                    </section>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>





