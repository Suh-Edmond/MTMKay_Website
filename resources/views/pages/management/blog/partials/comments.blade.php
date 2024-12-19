@section('title', "MTMKay-Blog Comments")
<div class="max-w-full">
    <section>
        <div class="flex justify-between">
            <header class="flex flex-row ">
                <h2 class="text-lg font-medium text-gray-900">
                    {{ __('Blog Comments') }}
                </h2>
                @if(session('status') == 'Comment remove successfully')
                    <x-auth-session-status :status="session('status')" x-data="{ show: true }"
                                           x-show="show"
                                           x-init="setTimeout(() => show = false, 3000)" class="pt-1 pl-5">
                    </x-auth-session-status>
                @endif
            </header>

            <div>
                @if(session('status') == "Comment saved successfully")
                    <x-auth-session-status :status="session('status')"
                                           x-data="{ show: true }"
                                           x-show="show"
                                           x-init="setTimeout(() => show = false, 3000)">
                    </x-auth-session-status>
                @endif
                @if(request()->routeIs('show.blog') && count($comments) == 0)
                    <x-auth-session-status :status="'No comments available for this blog'" x-data="{ show: true }"
                                           x-show="show"
                                           x-init="setTimeout(() => show = false, 3000)">
                    </x-auth-session-status>
                    <x-primary-button
                        x-data=""
                        x-on:click.prevent="$dispatch('open-modal', 'add-comment-modal', {name:'ADD'})"
                    >{{ __('Add Comment') }}</x-primary-button>
                @else
                    <a href="{{route('show.blog.comments', ['slug' =>$blog->slug])}}" class="'flex items-center h-10 '}}">
                        <x-secondary-button>View more</x-secondary-button>
                    </a>
                @endif
            </div>
        </div>
        @foreach($comments as $comment)
            <div class="mb-lg-5 mt-4 border rounded-md p-5">
                <div class="flex justify-between">
                    <x-input-label for="name" :value="__('Comment detail')" />

                    @if($comment->status == \App\Constant\BlogState::PENDING)
                        <div class="flex gap-4">
                            <x-dropdown align="right" width="48">
                                <x-slot name="trigger">
                                    <span><i class="fa fa-info-circle text-blue-800 cursor-pointer  "></i></span>
                                </x-slot>

                                <x-slot name="content">
                                    <x-dropdown-link x-data="edit_comment{{$comment->id ?? ''}}"
                                                     x-on:click.prevent="$dispatch('open-modal', 'add-update-comment-modal{{$comment->id}}')" class="cursor-pointer">
                                        <span><i class="fa fa-pencil text-blue-800 cursor-pointer  mr-5"></i>{{ __('Edit Comment') }}</span>
                                    </x-dropdown-link>

                                    <x-dropdown-link x-data="approve-blog-state{{$comment->id}}"
                                                     x-on:click.prevent="$dispatch('open-modal', 'approve-blog-state{{$comment->id}}', {name:'APPROVE'})" class="cursor-pointer">
                                        <span><i class="fa fa-check text-green-700 cursor-pointer mr-5 "></i>{{ __('Approve comment') }}</span>
                                    </x-dropdown-link>

                                    <x-dropdown-link x-data="reject-blog-state-change{{$comment->id}}"
                                                     x-on:click.prevent="$dispatch('open-modal', 'reject-blog-state-change{{$comment->id}}', {name:'REJECT'})" class="cursor-pointer">
                                        <span><i class="fa fa-close text-yellow-500 cursor-pointer mr-5 "></i>{{ __('Reject comment') }}</span>
                                    </x-dropdown-link>

                                    <x-dropdown-link x-data="delete-blog-comment{{$comment->id}}"
                                                     x-on:click.prevent="$dispatch('open-modal', 'delete-blog-comment{{$comment->id}}', {name:'DELETE'})" class="cursor-pointer text-red-600">
                                        <span><i class="fa fa-trash text-red-600 cursor-pointer mr-5 "></i>{{ __('Delete comment') }}</span>
                                    </x-dropdown-link>
                                </x-slot>
                            </x-dropdown>

                            @include('pages.management.blog.partials.create-comment-form')
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
                    <x-input-label for="name" :value="__('Name')" /> <span><label class="font-medium">{{$comment->name}}</label></span>
                </div>
                <div class="grow my-4">
                    <x-input-label for="email" :value="__('Email')" /> <span><label class="font-medium">{{$comment->email}}</label></span>
                </div>
                @if($comment->status == \App\Constant\BlogState::PENDING)
                    <div class="grow my-4">
                        <x-input-label for="email" :value="__('Status')" /> <span><label class="font-medium text-lowercase text-sky-400">{{$comment->status}}</label></span>
                    </div>
                @endif
                <div class="grow my-4">
                    <x-input-label for="subject" :value="__('Subject')" /> <span><label class="font-medium">{{$comment->subject}}</label></span>
                </div>
                <div>
                    <x-input-label for="message" :value="__('Message')" /><span><p class="font-medium">{!! $comment->message !!}</p></span>
                </div>
            </div>
        @endforeach
    </section>
</div>

@include('pages.management.blog.partials.create-comment-form')


