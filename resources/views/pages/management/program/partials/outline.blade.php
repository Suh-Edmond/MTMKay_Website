<div class="max-w-full">
    <section>
        <div class="flex justify-between">
            <header class="flex flex-row ">
                <h2 class="text-lg font-medium text-gray-900">
                    {{ __('Program Outline') }}
                </h2>
                @if (session('status') === 'Program outline save successfully' || session('status') === 'Program outline deleted successfully')
                    <x-auth-session-status :status="session('status')" x-data="{ show: true }"
                                           x-show="show"
                                           x-transition
                                           x-init="setTimeout(() => show = false, 2000)" class="ml-4 pt-2">
                    </x-auth-session-status>
                @endif
            </header>
            <x-primary-button id="addOutline">{{ __('Add Outline') }}</x-primary-button>
        </div>
        @foreach($program->programOutlines ?? [] as $outline)
            <div class="my-5">
                <div class="flex justify-between">
                    <x-input-label for="period" value="{{$outline->period}}" />
                    <div class="flex justify-between gap-5">
                        <x-dropdown align="right" width="48">
                            <x-slot name="trigger">
                                <i class="fa fa-info-circle text-blue-800 cursor-pointer"></i>
                            </x-slot>

                            <x-slot name="content">
                                <x-dropdown-link class="cursor-pointer" x-data=""
                                                 x-on:click.prevent="$dispatch('open-modal', 'edit-outline{{$outline->id}}')">
                                    <span><i class="fa fa-pencil text-blue-800 cursor-pointer mr-5"></i></span> {{ __('Edit') }}
                                </x-dropdown-link>

                                <x-dropdown-link  x-data=""
                                                  x-on:click.prevent="$dispatch('open-modal', 'delete-outline{{$outline->id}}')" class="text-red-600 cursor-pointer">
                                    <i class="fa fa-trash text-red-600 cursor-pointer mr-5"></i>{{ __('Delete') }}
                                </x-dropdown-link>
                            </x-slot>
                        </x-dropdown>
                    </div>
                </div>
                <x-text-input id="topic" name="topic" type="text" class="mt-1 block w-full" disabled :value="old('topic', $outline->topic)" required   autocomplete="topic" />
                <x-input-error class="mt-2" :messages="$errors->get('topic')" />
            </div>
            @include('pages.management.program.partials.delete-outline')
            @include('pages.management.program.partials.edit-outline')
        @endforeach
        <form method="post" action="{{ route('program.create.outline', ['slug' => $program->slug ?? '']) }}" class="mt-6 space-y-6 ">
            @csrf
            <div id="add-outline-form" style="display: none" >
                <div class="basis-1/4 flex-auto">
                    <x-input-label for="period" :value="__('Period')" />
                    <select id="period" name="period"  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option selected>Choose period</option>
                        @foreach($quarters ?? [] as $key => $quarter)
                            <option value="{{$quarter}}">{{$quarter}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mt-4">
                    <x-input-label for="topic" value="Topic" />
                    <x-text-input id="topic" name="topic" type="text" class="mt-1 block w-full"   :value="old('topic')" required   autocomplete="topic" />
                    <x-input-error class="mt-2" :messages="$errors->get('topic')" />
                </div>

                <div class="flex items-center gap-4 mb-3 mt-4">
                    <x-primary-button>{{ __('Save') }}</x-primary-button>
                </div>
            </div>
        </form>
    </section>
</div>


