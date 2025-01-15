<div class="max-w-full">
    <section>
        <div class="flex justify-between">
            <header class="flex flex-row ">
                <h2 class="text-lg font-medium text-gray-900">
                    {{ __('Program Outline') }}
                </h2>
                @if (session('status') === 'Program outline save successfully' || session('status') === 'Program outline deleted successfully')
                    <x-auth-session-status :status="session('status')"
                                           x-data="{ show: true }"
                                           x-show="show"
                                           x-init="setTimeout(() => show = false, 2000)" class="ml-4 pt-2">
                    </x-auth-session-status>
                @endif
            </header>

            @if(request()->routeIs('show.program') && count($programOutlines) == 0)
                <x-primary-button id="addOutline" x-data="add-program-outline-modal"
                                  x-on:click.prevent="$dispatch('open-modal', 'add-program-outline-modal">{{ __('Add Outline') }}</x-primary-button>
            @elseif(request()->routeIs('program.create.outline.view'))
                <x-primary-button id="addOutline" x-data="add-program-outline-modal"
                                  x-on:click.prevent="$dispatch('open-modal', 'add-program-outline-modal')">{{ __('Add Outline') }}</x-primary-button>
            @else
                <a href="{{route('program.create.outline.view', ['slug' => $program->slug])}}">
                    <x-secondary-button>{{ __('View more') }}</x-secondary-button>
                </a>
            @endif
        </div>
        @if(isset($programOutlines))
           @include('pages.management.program.partials.list-outline')
            @if(count($programOutlines) >= 1 && request()->routeIs('program.create.outline.view'))
                <a href="{{route('manage-programs')}}"
                   class="flex flex-row justify-end">
                    <button
                        class='inline-flex items-center px-4 py-2 bg-blue-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 focus:bg-blue-700 active:bg-blue-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150'>{{ __('Finish') }}</button>
                </a>
            @endif
        @endif

        @include('pages.management.program.partials.add-outline-form')
    </section>
</div>
<script>

</script>

