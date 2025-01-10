<x-guest-nav-layout>
    <h3 class="flex justify-center my-3 font-bold">{{$message}}</h3>

    <div class="flex justify-start my-3">
        <label><span class="font-bold">Your Email:</span> <span class="mx-2 my-2">{{$subscriber->email}}</span></label>
    </div>
    @if($subscriber->is_active)
    <div class="flex justify-start my-3">
        <a href="{{$link_training_programs}}">
            <x-primary-button>
                Visit our Training Programs
            </x-primary-button>
        </a>
    </div>
    @endif

    @if(!$subscriber->is_active)
        <div class="my-5">
            <a href="{{$resubscribe_link}}">
                <x-primary-button>
                    Click to Subscribe again
                </x-primary-button>
            </a>
        </div>
    @endif
</x-guest-nav-layout>

