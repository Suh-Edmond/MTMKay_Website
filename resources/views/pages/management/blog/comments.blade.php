<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Comments for {{ $blog->title }}
        </h2>
    </x-slot>

    <div class="pt-4 max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="flex flex-row gap-3">
            <div class="basis-1/4 flex-auto">
                <x-input-label for="status" :value="__('Filter Status')" />
                <select id="status" name="status"  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option selected>Choose a status</option>
                    <option value="PENDING">PENDING</option>
                    <option value="APPROVED">APPROVED</option>
                    <option value="REJECTED">REJECTED</option>
                </select>
            </div>
            <div class="basis-1/4 flex-auto">
                <x-input-label for="sort" :value="__('Sort')" />
                <select id="sort" name="sort"  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
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
            @foreach($comments as $comment)
                <div class="mb-lg-5 mt-4 border rounded-md p-5  flex-auto">
                    <div class="flex justify-between">
                        <x-input-label for="name" :value="__('Comment detail')" />

                        @if($comment->status == \App\Constant\BlogState::PENDING)
                            <div class="flex gap-4">
                                <div class="mb-4 rounded-full bg-green-700 py-0.5 px-2.5 border border-transparent text-xs text-white transition-all shadow-sm w-full text-center cursor-pointer" data-modal-target="default-modal" data-modal-toggle="default-modal">
                                    APPROVE
                                </div>
                                <x-primary-button
                                    class="mb-4 rounded-full bg-green-700 py-0.5 px-2.5 border border-transparent text-xs text-white transition-all shadow-sm w-full text-center cursor-pointer"
                                    x-data=""
                                    x-on:click.prevent="$dispatch('open-modal', 'confirm-blog-state-change{{$comment->id}}', {name:'APPROVE'})"
                                >{{ __('APPROVE') }}</x-primary-button>


                                @include('pages.management.blog.blog-status-confirmation-modal')

                                <div class="mb-4 rounded-full bg-red-700 py-0.5 px-2.5 border border-transparent text-xs text-white transition-all shadow-sm w-full text-center cursor-pointer" data-modal-target="default-modal" data-modal-toggle="default-modal">
                                    REJECT
                                </div>
                            </div>
                        @elseif($comment->status == \App\Constant\BlogState::APPROVED)
                            <div class="mb-4 rounded-full bg-green-700 py-0.5 px-2.5 border border-transparent text-xs text-white transition-all shadow-sm w-full text-center cursor-pointer">
                                {{$comment->status}}
                            </div>
                        @elseif($comment->status == \App\Constant\BlogState::REJECTED)
                            <div class="mb-4 rounded-full bg-red-700 py-0.5 px-2.5 border border-transparent text-xs text-white transition-all shadow-sm w-full text-center cursor-pointer">
                                {{$comment->status}}
                            </div>
                        @endif
                    </div>
                    <div class="grow my-4">
                        <x-input-label for="name" :value="__('Name')" />
                        <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="$comment->name" required   autocomplete="name" disabled />
                    </div>
                    <div class="grow my-4">
                        <x-input-label for="email" :value="__('Email')" />
                        <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" :value="$comment->email" required   autocomplete="email" disabled />
                    </div>
                    @if($comment->status == \App\Constant\BlogState::PENDING)
                        <div class="grow my-4">
                            <x-input-label for="category" :value="__('Status')" />
                            <select   disabled class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option value="PENDING" {{$comment->status == 'PENDING'? 'selected':''}}>PENDING</option>
                                <option value="APPROVED" {{$comment->status == 'APPROVED'? 'selected':''}}>APPROVED</option>
                                <option value="REJECTED" {{$comment->status == 'REJECTED'? 'selected':''}} >REJECTED</option>
                            </select>
                        </div>
                    @endif
                    <div class="grow my-4">
                        <x-input-label for="subject" :value="__('Subject')" />
                        <x-text-input id="subject" name="subject" type="text" class="mt-1 block w-full" :value="$comment->subject" required   autocomplete="subject" disabled />
                    </div>
                    <div>
                        <x-input-label for="message" :value="__('Message')" />
                        <textarea id="description" name="description"  disabled rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" >{{$comment->message}}</textarea>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    @if(($comments->count() > 0))
        <div class="flex justify-center mb-4 pb-4">
            <nav aria-label="Page navigation example">
                <ul class="flex items-center -space-x-px h-10 text-base">
                    <li  class="{{$comments->currentPage() == 1 ? 'page-item disabled':'page-item'}}">
                        <a href="{{route('show.blog.comments', ['page' =>$comments->currentPage() - 1, 'slug'  => $blog->slug])}}" class="{{$comments->currentPage() == 1? 'cursor-not-allowed flex items-center justify-center px-4 h-10 ms-0 leading-tight text-gray-500 bg-white border border-e-0 border-gray-300 rounded-s-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white':'flex items-center justify-center px-4 h-10 ms-0 leading-tight text-gray-500 bg-white border border-e-0 border-gray-300 rounded-s-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white'}}">
                            <span class="sr-only">Previous</span>
                            <svg class="w-3 h-3 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 1 1 5l4 4"/>
                            </svg>
                        </a>
                    </li>
                    @for($i = 1; $i <= $comments->lastPage(); $i++)
                        <li>
                            <a href="{{route('show.blog.comments', ['page' => $i, 'slug'  => $blog->slug])}}" class="{{$comments->currentPage() == $i ?'flex items-center justify-center px-4 h-10 leading-tight text-white bg-blue-800 border border-blue-800 hover:bg-blue-800 hover:text-white dark:bg-blue-800 dark:border-blue-800 dark:text-white dark:hover:bg-blue-800 dark:hover:text-white' : 'flex items-center justify-center px-4 h-10 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white'}}">
                                {{$i}}
                            </a>
                        </li>
                    @endfor

                    <li class="{{$comments->currentPage() == $comments->lastPage() ? 'page-item disabled': 'page-item'}}">
                        <a href="{{route('show.blog.comments', ['page' =>$comments->currentPage() + 1, 'slug'  => $blog->slug])}}" class="{{$comments->currentPage() == $comments->lastPage() ? 'cursor-not-allowed flex items-center justify-center px-4 h-10 leading-tight text-gray-500 bg-white border border-gray-300 rounded-e-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white'
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
</x-app-layout>


<script>

    let applyParams = function(sort, filtr, layt) {
        let url = new URL(location.href);
        let searchParams = new URLSearchParams(url.search);
        searchParams.set('filter', filtr);
        searchParams.set('sort', sort);
        searchParams.set('layout', layt);
        url.search = searchParams.toString();

        location.href = url
    }


    $(document).ready(function() {

        $('#status').on('change', function (e){
            let url = new URL(location.href);
            let searchParams = new URLSearchParams(url.search);

            console.log(e.target.value)
            searchParams.set('filter', e.target.value)

            url.search = searchParams.toString();

            location.href = url

        })

        $('#sort').on('change', function (e){
            let url = new URL(location.href);
            let searchParams = new URLSearchParams(url.search);

            console.log(e.target.value)
            searchParams.set('sort', e.target.value)

            url.search = searchParams.toString();

            location.href = url

        })

    })
</script>