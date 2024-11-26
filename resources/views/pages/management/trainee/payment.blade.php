
<section>
    <x-modal name="fee-payment" :show="$errors->userDeletion->isNotEmpty()" focusable :data="$value">

        <div class="flex justify-center my-3">
            <h2 class="text-lg font-medium text-gray-900">
                {{ __('Make Program Payment') }}
            </h2>
        </div>


        <form method="post" action="{{ route('trainee.make_payment', ['slug'=> $value->slug]) }} " class="p-6">
            @csrf
            <div class="my-5">
                <x-input-label for="program" :value="__('Trainee')" />
                <x-text-input id="trainee" name="trainee" type="text" class="mt-1 block w-full" :value="$value->user->name" disabled />
            </div>

            <div class="my-5">
                <x-input-label for="program" :value="__('Program')" />
                <x-text-input id="program" name="program" type="text" class="mt-1 block w-full" :value="$value->program->title" disabled />
            </div>

            <div class="my-5">
                <x-input-label for="amount" :value="__('Program Cost')" />
                <x-text-input id="program_cost" name="program_cost" type="number" class="mt-1 block w-full" :value="$value->program->cost" disabled  />
                <x-input-error class="mt-2" :messages="$errors->get('name')" />
            </div>

            <div class="my-5">
                <x-input-label for="name" :value="__('Amount Deposited')" />
                <x-text-input id="amount_deposited" name="amount_deposited" type="number" class="mt-1 block w-full" :value="old('amount_deposited', $value->amount_deposited)" required autofocus autocomplete="amount_deposited" />
                <x-input-error class="mt-2" :messages="$errors->get('amount_deposited')" />
            </div>

            <div class="my-5">
                <x-input-label for="amount" :value="__('Payment Date')" />
                <x-text-input id="payment_date" name="payment_date" type="date" class="mt-1 block w-full" :value="old('payment_date', \Carbon\Carbon::now()->format('yyyy/mm/dd'))" autofocus  required/>
                <x-input-error class="mt-2" :messages="$errors->get('payment_date')" />
            </div>

            <div class="mt-6 flex justify-end mb-5 py-4" >
                <x-secondary-button x-on:click="$dispatch('close')">
                    {{ __('Cancel') }}
                </x-secondary-button>

                <x-danger-button class="ms-3">
                    {{ __('Make Payment') }}
                </x-danger-button>
            </div>
        </form>
    </x-modal>
</section>

