@section('title', "MTMKay-Blog Image Upload")
<x-app-layout>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                @include('pages.management.blog.partials.image')
            </div>
        </div>
    </div>
</x-app-layout>

<script>
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
