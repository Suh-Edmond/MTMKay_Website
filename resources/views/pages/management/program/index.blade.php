@section('title', "MTMKay-Programs")
<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Program Management') }}
            </h2>
            <a href="{{route('manage-programs.create')}}">
                <x-primary-button id="addOutline">{{ __('Add Program') }}</x-primary-button>
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div  class="max-w-7xl mx-auto  flex flex-row gap-4 mx-auto sm:px-6 lg:px-8 ">
            @foreach($programs as $key => $program)
                <div class="basis-1/4  bg-white shadow-sm sm:rounded-lg flex-grow ">
                    <img src="{{asset($program->getImagePath($program, $program->image_path))}}"  width="100%" height="100%">
                    <div class="flex justify-start text-blue-800">
                        <div class="p-6 text-blue-800 text-start font-bold text-xl cursor-pointer ">
                             <a href="{{route('show.program', ['slug' => $program->slug])}}"><span class="hover:text-blue-800 click:text-blue-800 text-blue-800">{{$program->title}}</span></a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

    </div>
</x-app-layout>
