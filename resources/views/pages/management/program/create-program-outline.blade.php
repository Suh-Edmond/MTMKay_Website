@section('title', "MTMKay-Program Creation")
<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-row gap-2">
            <a href="{{route('show.program', ['slug' => $program->slug])}}" >
                <button id="goBack" class="text-blue-800 text-xl">
                    <span><i class="fa fa-arrow-left px-5"></i></span>
                </button>
            </a>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Add Program Outline') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                @include('pages.management.program.partials.outline')
            </div>
        </div>
    </div>
</x-app-layout>
<script>
    $('#addOutline').on('click', function (e){
        $('#add-outline-form').show();
    })

    $('#goBack').on('click', function (e){
        history.back();
    })
</script>
