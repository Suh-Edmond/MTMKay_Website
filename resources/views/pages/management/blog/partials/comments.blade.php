@section('title', "MTMKay-Blog Comments")
<div class="max-w-full">
    <section>
        <div class="flex justify-between">
            <header>
                <div class="flex   justify-between">
                    <h2 class="text-lg font-medium text-gray-900">
                        {{ __('Blog Comments') }}
                    </h2>
                    @if(session('status') == 'Comment remove successfully')
                        <x-auth-session-status :status="session('status')" class="pt-1 pl-5">

                        </x-auth-session-status>
                    @endif
                </div>
            </header>

            @if(count($comments) > 0)
                <a href="{{route('show.blog.comments', ['slug' =>$blog->slug])}}" class="'flex items-center px-4 h-10  text-blue-800 '}}">
                    <span class="text-blue-800">View more</span>
                </a>
            @else
                <x-auth-session-status :status="'No comments available for this blog'">

                </x-auth-session-status>
            @endif
        </div>
        @foreach($comments as $comment)
            <div class="mb-lg-5 mt-4 border rounded-md p-5">
                <div class="flex justify-between">
                    <x-input-label for="name" :value="__('Comment detail')" />

                    @if($comment->status == \App\Constant\BlogState::PENDING)
                        <div class="flex gap-4">

                            <x-primary-button
                                class="mb-4 rounded-full bg-primary-700 py-0.5 px-2.5 border border-transparent text-xs text-white transition-all shadow-sm w-full text-center cursor-pointer
                                    hover:bg-primary-700 focus:bg-primary-700 active:bg-primary-900"
                                x-data="APPROVE"
                                x-on:click.prevent="$dispatch('open-modal', 'approve-blog-state{{$comment->id}}', {name:'APPROVE'})"
                            >{{ __('APPROVE') }}</x-primary-button>

                            <x-warning-button
                                class="mb-4 rounded-full bg-yellow-500 py-0.5 px-2.5 border border-transparent text-xs text-white transition-all shadow-sm w-full text-center cursor-pointer"

                                x-data=""
                                x-on:click.prevent="$dispatch('open-modal', 'reject-blog-state-change{{$comment->id}}', {name:'REJECT'})"
                            >{{ __('REJECT') }}</x-warning-button>

                            <x-danger-button
                                class="mb-4 rounded-full bg-green-700 py-0.5 px-2.5 border border-transparent text-xs text-white transition-all shadow-sm w-full text-center cursor-pointer"
                                x-data=""
                                x-on:click.prevent="$dispatch('open-modal', 'delete-blog-comment{{$comment->id}}', {name:'DELETE'})"
                            >{{ __('DELETE') }}</x-danger-button>


                            @include('pages.management.blog.blog-status-confirmation-modal')


                        </div>
                    @elseif($comment->status == \App\Constant\BlogState::APPROVED)
                        <div class="mb-4 rounded-full bg-green-700 py-0.5 px-2.5 border border-transparent text-xs text-white transition-all shadow-sm  text-center cursor-pointer">
                            {{$comment->status}}
                        </div>
                    @elseif($comment->status == \App\Constant\BlogState::REJECTED)
                        <div class="mb-4 rounded-full bg-red-700 py-0.5 px-2.5 border border-transparent text-xs text-white transition-all shadow-sm text-center cursor-pointer">
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
    </section>
</div>
