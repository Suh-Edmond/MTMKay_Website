<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl flex flex-row gap-1 mx-auto sm:px-6 lg:px-8 flex-wrap">
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-2 w-full">
                <div class="basis-1/4  sm:px-6 lg:px-8 bg-white overflow-hidden shadow-sm sm:rounded-lg py--5 cursor-pointer" >
                    <a href="{{route('manage-programs')}}">
                        <div class="flex justify-center pt-5 mt-3"><img src="{{asset('img/company/programs.png')}}" height="100px" width="100px"></div>
                        <div class="flex justify-between flex-row">
                            <div class="p-6 text-gray-900 text-center font-bold text-xl">
                                Programs
                            </div>
                            <div class="p-6 text-gray-900 text-center font-bold text-xl">
                                {{$programCount}}
                            </div>
                        </div>
                    </a>
                </div>
                <div class="basis-1/4  sm:px-6 lg:px-8 bg-white overflow-hidden shadow-sm sm:rounded-lg cursor-pointer" >
                    <a href="{{route('manage-students')}}">
                        <div class="flex justify-center pt-5"><img src="{{asset('img/company/graduation-hat.png')}}" height="120px" width="120px"></div>
                        <div class="flex justify-between flex-row">
                            <div class="p-6 text-gray-900 text-center font-bold text-xl">
                                Enrollments
                            </div>
                            <div class="p-6 text-gray-900 text-center font-bold text-xl">
                                {{$studentsCount}}
                            </div>
                        </div>
                    </a>
                </div>
                <div class="basis-1/4  sm:px-6 lg:px-8 bg-white overflow-hidden shadow-sm sm:rounded-lg cursor-pointer" href="{{route('manage-blogs')}}">
                    <a href="{{route('manage-blogs')}}">
                        <div class="flex justify-center pt-5"><img src="{{asset('img/blog/blog-icon.png')}}" height="120px" width="120px"></div>
                        <div class="flex justify-between flex-row">
                            <div class="p-6 text-gray-900 text-center font-bold text-xl">
                                Blogs
                            </div>
                            <div class="p-6 text-gray-900 text-center font-bold text-xl">
                                {{ $blogCount }}
                            </div>
                        </div>
                    </a>
                </div>
                <div class="basis-1/4  sm:px-6 lg:px-8 bg-white overflow-hidden shadow-sm sm:rounded-lg cursor-pointer" href="{{route('manage.subscribers')}}">
                    <a href="{{route('manage.subscribers')}}">
                        <div class="flex justify-center pt-5"><img src="{{asset('img/company/subscriber.png')}}" height="120px" width="120px"></div>
                        <div class="flex justify-between flex-row">
                            <div class="p-6 text-gray-900 text-center font-bold text-xl">
                                Subscribers
                            </div>
                            <div class="p-6 text-gray-900 text-center font-bold text-xl">
                                {{ $subscribersCount }}
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
     </div>
</x-app-layout>
