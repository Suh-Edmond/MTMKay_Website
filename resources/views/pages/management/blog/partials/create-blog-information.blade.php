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

        <form method="post"
              action="{{ route('manage-blogs.store', ['slug' => $blog->slug ?? $blog->slug ?? '']) }}"
              class="mt-6 space-y-6">
            @csrf

            <div class="grow">
                <x-input-label for="title" :value="__('Title')"/>
                <x-text-input id="title" name="title" type="text" class="mt-1 block w-full"
                              :value="old('title',$blog->title ?? '')" required autocomplete="title"/>
                <x-input-error class="mt-2" :messages="$errors->get('title')"/>
            </div>

            <div class="grow">
                <x-input-label for="category" :value="__('Category')"/>
                <select id="category_id" name="category_id"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    @foreach($categories as $category)
                        <option
                            value="{{$category->id}}" {{$blog->category_id ?? '' === $category->id ? 'selected': ''}} >{{$category->name}}</option>
                    @endforeach
                </select>
                <x-input-error class="mt-2" :messages="$errors->get('category_id')"/>
            </div>

            <div class="grow">
                <x-input-label for="tag_id" :value="__('Tags')"/>
                <select id="tag_id" name="tag_id[]" multiple
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    @foreach($tags as $tag)
                        <option
                            value="{{$tag->id}}" {{$tag->checkIfBlogHasTag($tag, $blog) ? 'selected': ''}}>{{$tag->name}}</option>
                    @endforeach
                </select>
            </div>


            <div class="grow">
                <x-input-label for="blog_state" :value="__('Status')"/>
                <select id="blog_state" name="blog_state"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option
                        value="PENDING" {{$blog !== null && $blog->blog_state == 'PENDING' ? 'selected':''}}>
                        PENDING
                    </option>
                    <option value="APPROVED" {{$blog !== null && $blog->blog_state   == 'APPROVED' ? 'selected':''}}>
                        APPROVED
                    </option>
                    <option value="REJECTED" {{$blog !== null && $blog->blog_state  == 'REJECTED' ? 'selected':''}}>
                        REJECTED
                    </option>
                </select>
                <x-input-error class="mt-2" :messages="$errors->get('blog_state')"/>
            </div>


            <div>
                <x-input-label for="description" :value="__('Description')"/>
                <textarea id="description" name="description" rows="4"
                          class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">{{$blog->description ?? ''}} </textarea>
                <x-input-error class="mt-2" :messages="$errors->get('description')"/>
            </div>

{{--            <div>--}}
{{--                @include('pages.management.blog.partials.text-editor')--}}
{{--            </div>--}}


            <div class="flex flex-row justify-between">
                <div class="flex items-center gap-4">
                    <x-primary-button>{{ __('Save') }}</x-primary-button>
                    <x-auth-session-status :status="session('status')"
                                           x-data="{ show: true }"
                                           x-show="show"
                                           x-transition
                                           x-init="setTimeout(() => show = false, 2000)">
                    </x-auth-session-status>
                </div>
            </div>
        </form>
    </section>
</div>

<script></script>
