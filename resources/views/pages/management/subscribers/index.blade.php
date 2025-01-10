@section('title', "MTMKay-Subscribers")
<x-app-layout >
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{__('Subscribers Management')}}
        </h2>
    </x-slot>

    <div class="pt-4 max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="flex flex-row gap-3">

            <div class="basis-1/4 flex-auto">
                <x-input-label for="category" :value="__('Filter Status')" />
                <select id="status" name="status" onchange="filterByStatus()" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option selected>Choose a status</option>
                    <option value="ACTIVE">Active</option>
                    <option value="IN_ACTIVE">In Active</option>
                </select>
            </div>
            <div class="basis-1/4 flex-auto">
                <x-input-label for="sort" :value="__('Sort')" />
                <select id="sort" name="sort" onchange="sortBlogBy()" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option selected>Choose sort</option>
                    <option value="DATE_DESC">Newest First</option>
                    <option value="DATE_ASC">Oldest First</option>
                    <option value="NAME">Name</option>
                </select>
            </div>
        </div>
    </div>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden sm:rounded-lg">
                <div>
                    <table class=" bg-white border-collapse w-full">
                        <thead>
                        <tr>
                            <th class="bg-blue-800 text-white border text-center px-3 py-2">S/N</th>
                            <th class="bg-blue-800 text-white border text-center px-4 py-2">Email</th>
                            <th class="bg-blue-800 text-white border text-center px-4 py-2">Status</th>
                            <th class="bg-blue-800 text-white border text-center px-2 py-2">Subscription Date</th>
                         </tr>
                        </thead>
                        <tbody>
                        @foreach($subscribers as $key => $value)
                            <tr class="hover:bg-gray-100 focus:bg-gray-300 active:bg-gray-400"  tabindex="0">
                                <td class="border px-3 py-4 text-center">{{$key+1}}</td>
                                <td class="border px-4 py-4 text-center">{{$value->email}}</td>
                                <td class="{{$value->is_active ? 'border px-4 py-4 text-center text-green-700':'border px-4 py-4 text-center text-red-600'}}">{{$value->is_active ? 'Active':'In Active'}}</td>
                                <td class="border px-4 py-4 text-center">{{$value->created_at->format('D, d M Y') }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    @if(count($subscribers) == 0)
                        <h3 class="text-lg font-medium text-gray-900 p-5 text-center my-5">
                            Oops! No Subscriptions found
                        </h3>
                    @endif
                </div>

                @if(($subscribers->count() > 0))
                    <div class="m-4 flex justify-between">
                        <p class="font-bold">Total Subscribers: {{$subscribers->total()}}</p>
                        <nav aria-label="Page navigation example">
                            <ul class="flex items-center -space-x-px h-10 text-base">
                                <li  class="{{$subscribers->currentPage() == 1 ? 'page-item disabled':'page-item'}}">
                                    <a href="{{route('manage.subscribers', ['page' =>$subscribers->currentPage() - 1])}}" class="{{$subscribers->currentPage() == 1? 'cursor-not-allowed flex items-center justify-center px-4 h-10 ms-0 leading-tight text-gray-500 bg-white border border-e-0 border-gray-300 rounded-s-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white':'flex items-center justify-center px-4 h-10 ms-0 leading-tight text-gray-500 bg-white border border-e-0 border-gray-300 rounded-s-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white'}}">
                                        <span class="sr-only">Previous</span>
                                        <svg class="w-3 h-3 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 1 1 5l4 4"/>
                                        </svg>
                                    </a>
                                </li>
                                @for($i = 1; $i <= $subscribers->lastPage(); $i++)
                                    <li>
                                        <a href="{{route('manage.subscribers', ['page' => $i])}}" class="{{$subscribers->currentPage() == $i ?'flex items-center justify-center px-4 h-10 leading-tight text-white bg-blue-800 border border-blue-800 hover:bg-blue-800 hover:text-white dark:bg-blue-800 dark:border-blue-800 dark:text-white dark:hover:bg-blue-800 dark:hover:text-white' : 'flex items-center justify-center px-4 h-10 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white'}}">
                                            {{$i}}
                                        </a>
                                    </li>
                                @endfor

                                <li class="{{$subscribers->currentPage() == $subscribers->lastPage() ? 'page-item disabled': 'page-item'}}">
                                    <a href="{{route('manage.subscribers', ['page' =>$subscribers->currentPage() + 1])}}" class="{{$subscribers->currentPage() == $subscribers->lastPage() ? 'cursor-not-allowed flex items-center justify-center px-4 h-10 leading-tight text-gray-500 bg-white border border-gray-300 rounded-e-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white'
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



</x-app-layout>

<script>
    $(document).ready(function() {

        $('#status').on('change', function (e){
            let url = new URL(location.href);
            let searchParams = new URLSearchParams(url.search);


            searchParams.set('filter', e.target.value)

            url.search = searchParams.toString();

            location.href = url

        })


        $('#sort').on('change', function (e){
            let url = new URL(location.href);
            let searchParams = new URLSearchParams(url.search);


            searchParams.set('sort', e.target.value)

            url.search = searchParams.toString();

            location.href = url

        })



    })
</script>







