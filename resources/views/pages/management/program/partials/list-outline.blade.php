@if(request()->routeIs('show.program'))
    @foreach($firstThreeOutlines as $outline)
        <div class="my-5 border-2 p-3 rounded-md">
            <div class="flex justify-between">
                <x-input-label for="period" value="{{$outline->period}}" />
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <span><i class="fa fa-info-circle text-blue-800 cursor-pointer  "></i></span>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link x-data="edit_outline{{$outline->id ?? ''}}"
                                         x-on:click.prevent="$dispatch('open-modal', 'edit_outline{{$outline->id ?? ''}}')" class="cursor-pointer">
                            <span><i class="fa fa-pencil text-blue-800 cursor-pointer  mr-5"></i>{{ __('Edit') }}</span>
                        </x-dropdown-link>

                        <x-dropdown-link x-data="delete_outline{{$outline->id ?? ''}}"
                                         x-on:click.prevent="$dispatch('open-modal', 'delete_outline{{$outline->id ?? ''}}')" class="cursor-pointer">
                            <span><i class="fa fa-trash text-red-600 cursor-pointer mr-5 "></i>{{ __('Delete') }}</span>
                        </x-dropdown-link>
                    </x-slot>
                </x-dropdown>
            </div>
            <div>{!! $outline->topic !!}</div>
        </div>
        @include('pages.management.program.partials.delete-outline')
        @include('pages.management.program.partials.edit-outline')
    @endforeach
@else
    @foreach($programOutlines as $outline)
        <div class="my-5 border-2 p-3 rounded-md">
            <div class="flex justify-between">
                <x-input-label for="period" value="{{$outline->period}}" />
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <span><i class="fa fa-info-circle text-blue-800 cursor-pointer  "></i></span>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link x-data="edit_outline{{$outline->id ?? ''}}"
                                         x-on:click.prevent="$dispatch('open-modal', 'edit_outline{{$outline->id ?? ''}}')" class="cursor-pointer">
                            <span><i class="fa fa-pencil text-blue-800 cursor-pointer  mr-5"></i>{{ __('Edit') }}</span>
                        </x-dropdown-link>

                        <x-dropdown-link x-data="delete_outline{{$outline->id ?? ''}}"
                                         x-on:click.prevent="$dispatch('open-modal', 'delete_outline{{$outline->id ?? ''}}')" class="cursor-pointer">
                            <span><i class="fa fa-trash text-red-600 cursor-pointer mr-5 "></i>{{ __('Delete') }}</span>
                        </x-dropdown-link>
                    </x-slot>
                </x-dropdown>
            </div>
            <div>{!! $outline->topic !!}</div>
        </div>
        @include('pages.management.program.partials.delete-outline')
        @include('pages.management.program.partials.edit-outline')
    @endforeach
@endif
