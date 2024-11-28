<div class="max-w-xl">
    <section>
        <header>
            <h2 class="text-lg font-medium text-gray-900">
                {{ __('Blog Images') }}
            </h2>
        </header>
        <div class="flex gap-4">
            @foreach($blog->blogImages as $image)
                <div class="bg-white shadow-sm sm:rounded-lg">
                    <img src="{{ asset($image->file_path) }}"  >
                </div>
            @endforeach
        </div>
    </section>
</div>
