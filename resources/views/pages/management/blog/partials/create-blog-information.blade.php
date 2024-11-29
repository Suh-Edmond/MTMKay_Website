<div class="max-w-full">
    <section>
        <header>
            <h2 class="text-lg font-medium text-gray-900">
                {{ __('Blog Information') }}
            </h2>

            <p class="mt-1 text-sm text-gray-600">
                {{ __("Provide blog Information.") }}
            </p>
        </header>

        <form method="post" action="{{ route('manage-blogs.store') }}" class="mt-6 space-y-6">
            @csrf

            <div class="grow">
                <x-input-label for="title" :value="__('Title')" />
                <x-text-input id="title" name="title" type="text" class="mt-1 block w-full" :value="old('title')" required   autocomplete="title" />
                <x-input-error class="mt-2" :messages="$errors->get('title')" />
            </div>

            <div class="grow">
                <x-input-label for="category" :value="__('Category')" />
                <select id="category_id" name="category_id"  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    @foreach($categories as $category)
                        <option value="{{$category->id}}" >{{$category->name}}</option>
                    @endforeach
                </select>
                <x-input-error class="mt-2" :messages="$errors->get('category_id')" />
            </div>

            <div class="grow">
                <x-input-label for="tag_id" :value="__('Tags')" />
                <select id="tag_id" name="tag_id[]" multiple  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    @foreach($tags as $tag)
                        <option value="{{$tag->id}}"  >{{$tag->name}}</option>
                    @endforeach
                </select>
            </div>

            <div class="grow">
                <x-input-label for="blog_state" :value="__('Status')" />
                <select id="blog_state" name="blog_state"  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option value="PENDING" >PENDING</option>
                    <option value="APPROVED" >APPROVED</option>
                    <option value="REJECTED" >REJECTED</option>
                </select>
                <x-input-error class="mt-2" :messages="$errors->get('blog_state')" />
            </div>


            <div>
                <x-input-label for="description" :value="__('Description')" />
                <textarea id="description" name="description" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" > </textarea>
                <x-input-error class="mt-2" :messages="$errors->get('description')" />
            </div>




            <div class="flex items-center gap-4">
                <x-primary-button>{{ __('Save') }}</x-primary-button>

                @if (session('status') === 'blog information created successfully')
                    <p
                        x-data="{ show: true }"
                        x-show="show"
                        x-transition
                        x-init="setTimeout(() => show = false, 2000)"
                        class="text-sm text-gray-600"
                    >{{ __('Saved.') }}</p>
                @endif
            </div>
        </form>
    </section>
</div>

<script></script>
