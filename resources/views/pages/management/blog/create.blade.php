@section('title', "MTMKay-Blogs Creation")
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Blog Post') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

            @if(\Illuminate\Support\Facades\Session::has('blog'))
                <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                    @include('pages.management.blog.partials.create-blog-information')
                </div>
            @else
                <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                    @include('pages.management.blog.partials.image')
                </div>
            @endif
        </div>
    </div>
</x-app-layout>





