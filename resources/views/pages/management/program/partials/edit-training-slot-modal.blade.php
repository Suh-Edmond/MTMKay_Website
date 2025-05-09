<x-modal name="update-training-slot-modal{{$value->id}}" :show="$errors->slotCreation->isNotEmpty()" focusable x-data="update-training-slot-modal">
   <div class="p-6">
       <form method="post" action="{{ route('manage.training.slot.update', ['slug' => $value->slug]) }}" >
           @csrf
           @method('PUT')

           <h2 class="text-lg font-medium text-gray-900">
               {{ __('Edit Training Slot') }}
           </h2>

           <p class="mt-1 text-sm text-gray-600">
               {{ __("Update Information below for a training slot.") }}
           </p>


           <div class="grow my-4">
               <x-input-label for="title" :value="__('Name')"/>
               <x-text-input id="name" name="name" type="text" class="mt-1 block w-full"
                             :value="old('name')?? $value->name" required autocomplete="name"/>
               <x-input-error class="mt-2" :messages="$errors->slotCreation->get('name')"/>
           </div>

           <div class="grow my-4">
               <x-input-label for="start_time" :value="__('Start Time')"/>
               <x-text-input id="start_time" name="start_time" type="time" class="mt-1 block w-full"
                             :value="old($value->start_time) ?? $value->start_time" required autocomplete="start_time"/>
               <x-input-error class="mt-2" :messages="$errors->slotCreation->get('start_time')"/>
           </div>

           <div class="grow my-4">
               <x-input-label for="end_time" :value="__('End Time')"/>
               <x-text-input id="end_time" name="end_time" type="time" class="mt-1 block w-full"
                             :value="old($value->end_time) ?? $value->end_time" required autocomplete="end_time"/>
               <x-input-error class="mt-2" :messages="$errors->slotCreation->get('end_time')"/>
           </div>

           <div class="grow my-4">
               <x-input-label for="available_seats" :value="__('Available Seats')"/>
               <x-text-input id="available_seats" name="available_seats" type="number" class="mt-1 block w-full"
                             :value="old($value->available_seats) ?? $value->available_seats" required autocomplete="available_seats"/>
               <x-input-error class="mt-2" :messages="$errors->slotCreation->get('available_seats')"/>
           </div>

           <div class="mt-6 flex justify-end">
               <x-secondary-button x-on:click="$dispatch('close')">
                   {{ __('Cancel') }}
               </x-secondary-button>

               <x-primary-button class="ms-3">
                   {{ __('Save') }}
               </x-primary-button>
           </div>
       </form>
   </div>
</x-modal>
