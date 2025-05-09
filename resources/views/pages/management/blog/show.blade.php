@section('title', "MTMKay-Blogs Details")

<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-row">
            <a href="{{route('manage-blogs')}}">
                <button id="goBack" class="text-blue-800 text-xl">
                    <span><i class="fa fa-arrow-left px-5"></i></span>
                </button>
            </a>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Blog Detail') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                @include('pages.management.blog.partials.update-image')
            </div>

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                @include('pages.management.blog.partials.information')
            </div>

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                @include('pages.management.blog.partials.comments')
            </div>

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                @include('pages.management.blog.partials.delete-blog')
            </div>
        </div>
    </div>
</x-app-layout>

<script>
    $('#goBack').on('click', function (e){
        history.back();
    })

    $(function () {
        $(document).ready(function () {

            $('#imageUploadForm').ajaxForm({
                beforeSend: function () {
                    var percentage = '0';
                },
                uploadProgress: function (event, position, total, percentComplete) {

                    var percentage = percentComplete;
                    $('.progress .progress-bar').css("width", percentage+'%', function() {
                        return $(this).attr("aria-valuenow", percentage) + "%";
                    })

                },
                complete: function (xhr) {
                    $modal.modal('hide');
                    window.location.reload();
                }
            });
        });
    });
</script>





