
<section >
    <x-modal name="fee-payment{{$value->id}}" :show="$errors->userDeletion->isNotEmpty()" focusable :data="$value" :maxWidth="$value->has_completed_payment?'md':'2xl'">

        @if($value->has_completed_payment)

            <div class="m-4">
                <h2 class="text-lg font-medium text-gray-900 flex justify-center">
                    {{ __('Payment Completed!!!') }}
                </h2>

                <h3 class="my-3 text-lg font-medium text-gray-900 flex justify-center">
                    Trainee: {{ $value->user->name ?? '' }}
                </h3>

                <p class="my-3 text-sm text-gray-600 flex justify-center">
                    {{ __("Trainee Already Completed Payment") }}
                </p>

                <div class="mt-6 flex justify-end">
                    <x-secondary-button x-on:click="$dispatch('close')">
                        {{ __('Close') }}
                    </x-secondary-button>
                </div>
            </div>
        @else
            <div class="flex justify-center my-3">
                <h2 class="text-lg font-medium text-gray-900">
                    {{ __('Make Program Payment') }}
                </h2>
            </div>
            <form method="post" action="{{ route('trainee.make_payment', ['slug'=> $value->slug, 'programSlug' => $value->trainingSlot->program->slug ?? '']) }} " class="mx-5">
                @csrf
                <div class="my-5 mx-5">
                    <x-input-label for="program" :value="__('Trainee')" />
                    <x-text-input id="trainee" name="trainee" type="text" class="mt-1 block w-full" :value="$value->user->name ?? ''" disabled />
                </div>

                <div class="my-5 mx-5">
                    <x-input-label for="program" :value="__('Program')" />
                    <x-text-input id="program" name="program" type="text" class="mt-1 block w-full" :value="$value->trainingSlot->program->title ?? ''" disabled />
                </div>

                <div class="my-5 mx-5">
                    <x-input-label for="amount" :value="__('Program Cost')" />
                    <x-text-input id="program_cost" name="program_cost" type="number" class="mt-1 block w-full" :value="$value->trainingSlot->program->cost ?? ''" disabled  />
                    <x-input-error class="mt-2" :messages="$errors->get('name')" />
                </div>

                <div class="my-5 mx-5">
                    <x-input-label for="amount" :value="__('Balance')" />
                    <x-text-input id="balance" name="balance" type="number" class="mt-1 block w-full" :value="$value->getTotalEnrollmentPayment($value, $value->trainingSlot->program ?? '')" disabled  />
                    <x-input-error class="mt-2" :messages="$errors->get('balance')" />
                </div>

                <div class="my-5 mx-5">
                    <x-input-label for="name" :value="__('Amount Deposited')" />
                    <x-text-input id="amount_deposited" name="amount_deposited" type="number" class="mt-1 block w-full" :value="old('amount_deposited', $value->amount_deposited)" required autofocus autocomplete="amount_deposited" />
                    <x-input-error class="mt-2" :messages="$errors->get('amount_deposited')" />
                </div>

                <div class="my-5 mx-5">
                    <x-input-label for="amount" :value="__('Payment Date')" />
                    <x-text-input id="payment_date" name="payment_date" type="date" class="mt-1 block w-full" :value="old('payment_date', \Carbon\Carbon::now()->format('yyyy/mm/dd'))" autofocus  required/>
                    <x-input-error class="mt-2" :messages="$errors->get('payment_date')" />
                </div>

                <div class="mt-6 flex justify-end mb-5 py-4 mx-5" >
                    <x-secondary-button x-on:click="$dispatch('close')">
                        {{ __('Cancel') }}
                    </x-secondary-button>

                    <x-primary-button class="ms-3">
                        {{ __('Make Payment') }}
                    </x-primary-button>
                </div>
            </form>
        @endif
    </x-modal>
</section>

