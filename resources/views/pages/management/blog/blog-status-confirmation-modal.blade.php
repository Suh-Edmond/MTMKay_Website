<x-modal name="approve-blog-state{{$comment->id}}" :show="$errors->userDeletion->isNotEmpty()" focusable x-data="name">
    <form method="post" action="{{ route('show.blog.comments.update.status', ['slug' => $comment->slug, 'status' => \App\Constant\BlogState::APPROVED]) }}" class="p-6" >
        @csrf
        @method('put')

        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Are you sure you want to approve this comment?') }}
        </h2>


        <p class="mt-1 text-sm text-gray-600">
            Name: {{ $comment->name }}
        </p>
        <p class="mt-1 text-sm text-gray-600">
            Subject: {{ $comment->subject }}
        </p>


        <div class="mt-6 flex justify-end">
            <x-secondary-button x-on:click="$dispatch('close')">
                {{ __('Cancel') }}
            </x-secondary-button>

            <x-primary-button class="ms-3">
                {{ __('Approve') }}
            </x-primary-button>
        </div>
    </form>
</x-modal>

<x-modal name="reject-blog-state-change{{$comment->id}}" :show="$errors->userDeletion->isNotEmpty()" focusable x-data="name">
    <form method="post" action="{{ route('show.blog.comments.update.status', ['slug' => $comment->slug, 'status' => \App\Constant\BlogState::REJECTED]) }}" class="p-6" >
        @csrf
        @method('put')

        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Are you sure you want to Reject this Comment?') }}
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
                {{ __('Reject') }}
            </x-danger-button>
        </div>
    </form>
</x-modal>


<x-modal name="delete-blog-comment{{$comment->id}}" :show="$errors->userDeletion->isNotEmpty()" focusable x-data="name">
    <form method="post" action="{{ route('show.blog.comments.delete', ['slug' => $comment->slug]) }}" class="p-6" >
        @csrf
        @method('delete')

        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Are you sure you want to Delete this Comment?') }}
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
                {{ __('Delete') }}
            </x-danger-button>
        </div>
    </form>
</x-modal>






