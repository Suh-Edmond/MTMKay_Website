@section('title', "MTMKay-Program details")
<x-app-layout>
    <x-slot name="header">

        <div class="flex flex-row">
            <a href="{{route('manage-programs')}}" >
                <button id="goBack" class="text-blue-800 text-xl">
                    <span><i class="fa fa-arrow-left px-5"></i></span>
                </button>
            </a>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Program Detail') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                @include('pages.management.program.partials.image')
            </div>

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                @include('pages.management.program.partials.information')
            </div>

            @if(isset($program))
                <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                    @include('pages.management.program.partials.outline')
                </div>

                <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                    @include('pages.management.program.partials.training_slot')
                </div>

                <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                    @include('pages.management.program.partials.delete-program')
                </div>
            @endif
        </div>
    </div>
</x-app-layout>
<script>
    $('#goBack').on('click', function (e){
        history.back();
    })

    $('#addOutline').on('click', function (e){
        $('#add-outline-form').show();
    })
</script>





