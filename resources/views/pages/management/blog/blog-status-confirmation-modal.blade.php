<x-modal name="confirm-blog-state-change{{$comment->id}}" :show="$errors->userDeletion->isNotEmpty()" focusable>
    <form method="post" action="{{ route('profile.destroy') }}" class="p-6">
        @csrf
        @method('delete')

        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Are you sure you want to delete your account?') }}
        </h2>


        <h2 class="text-lg font-medium text-gray-900">
            {{ $comment->name }}
        </h2>
        <p class="mt-1 text-sm text-gray-600">
            {{ $comment->subject }}
        </p>


        <div class="mt-6 flex justify-end">
            <x-secondary-button x-on:click="$dispatch('close')">
                {{ __('Cancel') }}
            </x-secondary-button>

            <x-danger-button class="ms-3">
                {{ __('Approve') }}
            </x-danger-button>
        </div>
    </form>
</x-modal>
