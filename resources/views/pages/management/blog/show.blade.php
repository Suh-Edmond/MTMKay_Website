@section('title', "MTMKay-Blogs Details")

<x-app-layout>
    <x-slot name="header">
        <a href="#">
            <button id="goBack" class="text-blue-800 text-xl">
                <span><i class="fa fa-arrow-left px-5"></i></span>
            </button>
        </a>
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Blog Detail') }}
        </h2>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                @include('pages.management.blog.partials.image')
            </div>

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                @include('pages.management.blog.partials.information')
            </div>

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                @include('pages.management.blog.partials.comments')
            </div>
        </div>
    </div>
</x-app-layout>





