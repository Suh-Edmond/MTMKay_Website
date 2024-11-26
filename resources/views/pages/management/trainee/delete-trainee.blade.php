
<x-modal name="confirm-trainee-deletion{{$value->slug}}" :show="$errors->userDeletion->isNotEmpty()" focusable>
    <form method="post" action="{{ route('trainee.destroy', ['slug'=> $value->slug]) }} " class="p-6">
        @csrf
        @method('delete')

        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Are you sure you want to delete this trainee?') }}
        </h2>

        <h3 class="text-lg font-medium text-gray-900">
            Name: {{ $value->user }}
        </h3>

        <p class="mt-1 text-sm text-gray-600">
            {{ __("This will delete all information relating to this trainee") }}
        </p>



        <div class="mt-6 flex justify-end">
            <x-secondary-button x-on:click="$dispatch('close')">
                {{ __('Cancel') }}
            </x-secondary-button>

            <x-danger-button class="ms-3">
                {{ __('Delete Trainee') }}
            </x-danger-button>
        </div>
    </form>
</x-modal>
