<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto  flex flex-row gap-4 mx-auto sm:px-6 lg:px-8">
            <div class="basis-1/4 grow sm:px-6 lg:px-8 bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 text-center font-bold text-xl">
                    Programs
                </div>
                <div class="p-6 text-gray-900 text-center font-bold text-xl">
                    {{$programCount}}
                </div>
            </div>
            <div class="basis-1/4 grow sm:px-6 lg:px-8 bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 text-center font-bold text-xl">
                    Enrollments
                </div>
                <div class="p-6 text-gray-900 text-center font-bold text-xl">
                    {{$studentsCount}}
                </div>
            </div>
            <div class="basis-1/4 grow sm:px-6 lg:px-8 bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 text-center font-bold text-xl">
                    Blogs
                </div>
                <div class="p-6 text-gray-900 text-center font-bold text-xl">
                    {{ $blogCount }}
                </div>
            </div>
        </div>
     </div>
</x-app-layout>
