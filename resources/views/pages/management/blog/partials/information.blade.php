<div class="max-w-full">
    <section>
        <header>
            <h2 class="text-lg font-medium text-gray-900">
                {{ __('Blog Information') }}
            </h2>

            <p class="mt-1 text-sm text-gray-600">
                {{ __("Update blog Information.") }}
            </p>
        </header>

        <form method="post" action="{{ route('blog.update.information', ['slug' => $blog->slug]) }}" class="mt-6 space-y-6">
            @csrf
            @method('put')

            <div class="grow">
                <x-input-label for="title" :value="__('Title')" />
                <x-text-input id="title" name="title" type="text" class="mt-1 block w-full" :value="old('title', $blog->title)" required   autocomplete="title" />
                <x-input-error class="mt-2" :messages="$errors->get('title')" />
            </div>

            <div class="grow">
                <x-input-label for="category" :value="__('Category')" />
                <select id="category_id" name="category_id"  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    @foreach($categories as $category)
                        <option value="{{$category->id}}" {{$category->id === $blog->category->id ? 'selected':''}}>{{$category->name}}</option>
                    @endforeach
                </select>
            </div>

            <div class="grow">
                <x-input-label for="blog_state" :value="__('Status')" />
                <select id="blog_state" name="blog_state"  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option value="PENDING" {{$blog->blog_status === 'PENDING'? 'selected':''}}>PENDING</option>
                    <option value="APPROVED" {{$blog->blog_status === 'APPROVED'? 'selected':''}}>APPROVED</option>
                    <option value="REJECTED" {{$blog->blog_status === 'REJECTED'? 'selected':''}}>REJECTED</option>
                </select>
            </div>

            <div>
                <x-input-label for="tags" :value="__('Tags')" />
                <div class="flex gap-3">
                    @foreach($blog->tags as $tag)
                        <div id="chip" class="relative rounded-full flex items-center bg-cyan-600 py-0.5 pl-2.5 pr-8 border border-transparent text-sm text-white transition-all shadow-sm">
                            {{$tag->name}}

                            <button
                                class="flex items-center justify-center transition-all p-1 rounded-md text-white hover:bg-white/10 active:bg-white/10 absolute top-0.5 right-0.5"
                                type="button"
                                onclick="removeTag({{$tag}})"
                            >
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" class="w-4 h-4">
                                    <path d="M5.28 4.22a.75.75 0 0 0-1.06 1.06L6.94 8l-2.72 2.72a.75.75 0 1 0 1.06 1.06L8 9.06l2.72 2.72a.75.75 0 1 0 1.06-1.06L9.06 8l2.72-2.72a.75.75 0 0 0-1.06-1.06L8 6.94 5.28 4.22Z" />
                                </svg>
                            </button>
                        </div>
                    @endforeach
                </div>
            </div>




            <div>
                <x-input-label for="description" :value="__('Description')" />
                <textarea id="description" name="description" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" >{{$blog->description}}</textarea>
                <x-input-error class="mt-2" :messages="$errors->get('description')" />
            </div>




            <div class="flex items-center gap-4">
                <x-primary-button>{{ __('Save') }}</x-primary-button>

                @if (session('status') === 'blog information updated successfully')
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
