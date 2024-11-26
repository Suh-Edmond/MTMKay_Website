<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Blog Management') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div  class="max-w-7xl mx-auto  flex  gap-4 flex-wrap  ">
            @foreach($blogs as $key => $blog)
                <div class="bg-white shadow-sm sm:rounded-lg min-w-96">
                    <img src="{{asset($blog->getSingleBlogImage($blog->id))}}"  width="100%" height="100%">
                    <div class="flex justify-start text-blue-800">
                        <div class="p-6 text-blue-800 text-start font-bold text-xl cursor-pointer ">
                            <a href="{{route('show.blog', ['slug' => $blog->slug])}}"><span class="hover:text-blue-800 click:text-blue-800 text-blue-800 text-wrap">{{$blog->title}}</span></a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-app-layout>
