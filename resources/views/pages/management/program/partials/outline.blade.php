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
