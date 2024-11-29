<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Blog Management') }}
        </h2>
    </x-slot>

    <div class="pt-4 max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="flex flex-row gap-3">
            <div class="basis-1/4 flex-auto">
                <x-input-label for="category" :value="__('Filter by Category')" />
                <select id="countries" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option selected>Choose a category</option>
                    @foreach($categories as $category)
                        <option value="{{$category->slug}}">{{$category->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="basis-1/4 flex-auto">
                <x-input-label for="category" :value="__('Filter by Tags')" />
                <select id="category" name="category" onchange="filterByCategory()" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option selected>Choose a tag</option>
                    @foreach($tags as $tag)
                        <option value="{{$tag->slug}}">{{$tag->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="basis-1/4 flex-auto">
                <x-input-label for="category" :value="__('Filter Status')" />
                <select id="status" name="status" onchange="filterByStatus()" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option selected>Choose a status</option>
                    <option value="PENDING">PENDING</option>
                    <option value="APPROVED">APPROVED</option>
                    <option value="REJECTED">REJECTED</option>
                </select>
            </div>
            <div class="basis-1/4 flex-auto">
                <x-input-label for="category" :value="__('Sort')" />
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
        <div  class="max-w-7xl mx-auto sm:px-6 lg:px-8 flex flex-row flex-wrap h-full gap-3">
                @foreach($blogs as $key => $blog)
                   <div class="bg-white shadow-sm sm:rounded-lg basis-1/4 flex-auto">
                       <a href="{{route('show.blog', ['slug'=> $blog->slug])}}">
                           <div class="relative flex flex-col my-6 bg-white shadow-sm   border-slate-200 rounded-lg w-96">
                               <div class="relative h-56 m-2.5 overflow-hidden text-white rounded-md">
                                   <img src="https://images.unsplash.com/photo-1522202176988-66273c2fd55f?ixlib=rb-4.0.3&amp;ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&amp;auto=format&amp;fit=crop&amp;w=1471&amp;q=80" alt="card-image" />
                               </div>
                               <div class="p-4">
                                   <div class="flex flex-row gap-4 justify-between">
                                       <div class="mb-4 rounded-full bg-blue-800 py-0.5 px-2.5 border border-transparent text-xs text-white transition-all shadow-sm w-1/2 text-center">
                                           {{$blog->category->name}}
                                       </div>
                                       @if($blog->blog_state == \App\Constant\BlogState::PENDING)
                                           <div class="mb-4 rounded-full bg-sky-400 py-0.5 px-2.5 border border-transparent text-xs text-white transition-all shadow-sm w-1/4 text-center">
                                               {{$blog->blog_state}}
                                           </div>
                                       @elseif($blog->blog_state = \App\Constant\BlogState::APPROVED)
                                           <div class="mb-4 rounded-full bg-green-700 py-0.5 px-2.5 border border-transparent text-xs text-white transition-all shadow-sm w-1/4 text-center">
                                               {{$blog->blog_state}}
                                           </div>
                                       @elseif($blog->blog_state = \App\Constant\BlogState::REJECTED)
                                           <div class="mb-4 rounded-full bg-red-700 py-0.5 px-2.5 border border-transparent text-xs text-white transition-all shadow-sm w-1/4 text-center">
                                               {{$blog->blog_state}}
                                           </div>
                                       @endif
                                   </div>
                                   <h6 class="mb-2 text-slate-800 text-xl font-semibold">
                                       {{$blog->title}}
                                   </h6>
                                   <p class="text-slate-600 leading-normal font-light">
                                       {{substr($blog->description, 0, 100)}}...
                                   </p>
                               </div>

                               <div class="flex items-center justify-between p-4">
                                   <div class="flex items-center">
                                       <img
                                           alt="Tania Andrew"
                                           src="https://images.unsplash.com/photo-1633332755192-727a05c4013d?ixlib=rb-1.2.1&amp;ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&amp;auto=format&amp;fit=crop&amp;w=1480&amp;q=80"
                                           class="relative inline-block h-8 w-8 rounded-full"
                                       />
                                       <div class="flex flex-col ml-3 text-sm">
                                           <span class="text-slate-800 font-semibold">{{\Illuminate\Support\Facades\Auth::user()->name}}</span>
                                           <span class="text-slate-600">{{$blog->created_at->format('D, d M Y')}}</span>
                                       </div>
                                   </div>
                               </div>
                           </div>
                       </a>
                   </div>
               @endforeach
         </div>
    </div>

    @if(($blogs->count() > 0))
        <div class="flex justify-center mb-4 pb-4">
            <nav aria-label="Page navigation example">
                <ul class="flex items-center -space-x-px h-10 text-base">
                    <li  class="{{$blogs->currentPage() == 1 ? 'page-item disabled':'page-item'}}">
                        <a href="{{route('manage-blogs', ['page' =>$blogs->currentPage() - 1])}}" class="{{$blogs->currentPage() == 1? 'cursor-not-allowed flex items-center justify-center px-4 h-10 ms-0 leading-tight text-gray-500 bg-white border border-e-0 border-gray-300 rounded-s-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white':'flex items-center justify-center px-4 h-10 ms-0 leading-tight text-gray-500 bg-white border border-e-0 border-gray-300 rounded-s-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white'}}">
                            <span class="sr-only">Previous</span>
                            <svg class="w-3 h-3 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 1 1 5l4 4"/>
                            </svg>
                        </a>
                    </li>
                    @for($i = 1; $i <= $blogs->lastPage(); $i++)
                        <li>
                            <a href="{{route('manage-blogs', ['page' => $i])}}" class="{{$blogs->currentPage() == $i ?'flex items-center justify-center px-4 h-10 leading-tight text-white bg-blue-800 border border-blue-800 hover:bg-blue-800 hover:text-white dark:bg-blue-800 dark:border-blue-800 dark:text-white dark:hover:bg-blue-800 dark:hover:text-white' : 'flex items-center justify-center px-4 h-10 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white'}}">
                                {{$i}}
                            </a>
                        </li>
                    @endfor

                    <li class="{{$blogs->currentPage() == $blogs->lastPage() ? 'page-item disabled': 'page-item'}}">
                        <a href="{{route('manage-blogs', ['page' =>$blogs->currentPage() + 1])}}" class="{{$blogs->currentPage() == $blogs->lastPage() ? 'cursor-not-allowed flex items-center justify-center px-4 h-10 leading-tight text-gray-500 bg-white border border-gray-300 rounded-e-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white'
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

    $("#category").on('change', function (e){
        console.log(e.target.value)
    })

    let filterByCategory = function (e){
        console.log($(this).val());
    }

    let filterByStatus = function (){

    }

    let sortBlogBy = function (){

    }
</script>
