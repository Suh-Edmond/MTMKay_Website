<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Enrollment Management') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div>
                    <table class="shadow-xs bg-white border-collapse">
                        <thead>
                        <tr>
                            <th class="bg-blue-800 text-white border text-center px-4 py-4">S/N</th>
                            <th class="bg-blue-800 text-white border text-center px-4 py-4">Name</th>
                            <th class="bg-blue-800 text-white border text-center px-4 py-4">Email</th>
                            <th class="bg-blue-800 text-white border text-center px-4 py-4">Program</th>
                            <th class="bg-blue-800 text-white border text-center px-4 py-4">Enrollment Date</th>
                            <th class="bg-blue-800 text-white border text-center px-4 py-4">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($trainees as $key => $value)
                            <tr class="hover:bg-gray-100 focus:bg-gray-300 active:bg-gray-400"  tabindex="0">
                                <td class="border px-8 py-4">{{$key+1}}</td>
                                <td class="border px-8 py-4">{{$value->user->name}}</td>
                                <td class="border px-8 py-4">{{$value->user->email}}</td>
                                <td class="border px-8 py-4">{{$value->program->title}}</td>
                                <td class="border px-8 py-4">{{$value->enrollment_date ?? $value->user->enrollment_date->format('D, d M Y') }}</td>
                                <td class="border px-8 py-4 text-center cursor-pointer">
                                    <x-dropdown align="right" width="48">
                                        <x-slot name="trigger">
                                            <span><i class="fa fa-bars"></i></span>
                                        </x-slot>
                                        <x-slot name="content">
                                            <x-dropdown-link x-on:click.prevent="$dispatch('open-modal', 'fee-payment{{$value->slug}}', {{$value}})">
                                                {{ __('Make Payment') }}
                                            </x-dropdown-link>
                                            <x-dropdown-link  class="text-red-600" x-on:click.prevent="$dispatch('open-modal', 'confirm-trainee-deletion{{$value->slug}}', {{$value}})">
                                                {{ __('Remove') }}
                                            </x-dropdown-link>
                                        </x-slot>
                                    </x-dropdown>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>

                @if(($trainees->count() > 0))
                    <div class="m-4 flex justify-end">
                    <nav aria-label="Page navigation example">
                        <ul class="flex items-center -space-x-px h-10 text-base">
                            <li  class="{{$trainees->currentPage() == 1 ? 'page-item disabled':'page-item'}}">
                                <a href="{{route('manage-students', ['page' =>$trainees->currentPage() - 1])}}" class="{{$trainees->currentPage() == 1? 'cursor-not-allowed flex items-center justify-center px-4 h-10 ms-0 leading-tight text-gray-500 bg-white border border-e-0 border-gray-300 rounded-s-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white':'flex items-center justify-center px-4 h-10 ms-0 leading-tight text-gray-500 bg-white border border-e-0 border-gray-300 rounded-s-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white'}}">
                                    <span class="sr-only">Previous</span>
                                    <svg class="w-3 h-3 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 1 1 5l4 4"/>
                                    </svg>
                                </a>
                            </li>
                            @for($i = 1; $i <= $trainees->lastPage(); $i++)
                            <li>
                                <a href="{{route('manage-students', ['page' => $i])}}" class="{{$trainees->currentPage() == $i ?'flex items-center justify-center px-4 h-10 leading-tight text-white bg-blue-800 border border-blue-800 hover:bg-blue-800 hover:text-white dark:bg-blue-800 dark:border-blue-800 dark:text-white dark:hover:bg-blue-800 dark:hover:text-white' : 'flex items-center justify-center px-4 h-10 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white'}}">
                                    {{$i}}
                                </a>
                            </li>
                            @endfor

                            <li class="{{$trainees->currentPage() == $trainees->lastPage() ? 'page-item disabled': 'page-item'}}">
                                <a href="{{route('manage-students', ['page' =>$trainees->currentPage() + 1])}}" class="{{$trainees->currentPage() == $trainees->lastPage() ? 'cursor-not-allowed flex items-center justify-center px-4 h-10 leading-tight text-gray-500 bg-white border border-gray-300 rounded-e-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white'
:'flex items-center justify-center px-4 h-10 leading-tight text-gray-500 bg-white border border-gray-300 rounded-e-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white'}}">
                                    <span class="sr-only">Next</span>
                                    <svg class="w-3 h-3 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                                    </svg>
                                </a>
                            </li>
                        </ul>
                    </nav>

                </div>
                @endif
            </div>
        </div>
    </div>

    @include('pages.management.trainee.delete-trainee')
    @include('pages.management.trainee.payment')
</x-app-layout>








