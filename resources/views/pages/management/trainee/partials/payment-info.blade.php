<section class="space-y-6">
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Payment Information') }}
        </h2>

        <div class="my-4 flex flex-col justify-start items-start">
            <div class="flex flex-col justify-between items-start">
                <x-input-label for="cost" :value="__('Payment Status')" />
                <p class="my-2 text-gray-800 font-bold">
                    @if($enrollment->has_completed_payment)
                        <span class="text-green-700">COMPLETED</span>
                    @else
                        <span class="text-yellow-500">IN COMPLETE</span>
                    @endif
                </p>
            </div>
        </div>

        <A class="mt-1 text-sm text-gray-600">
            {{ __('You can click on the button below to view the payment details of this trainee') }}
        </A>


    </header>

    <div class="flex flex-col">
        <a href="{{route('manage-students.view.payments', ['slug' => $enrollment->slug])}}" class="flex justify-start">
            <x-primary-button>{{ __('View Payments') }}</x-primary-button>
        </a>

    </div>


</section>
